<?php

namespace App\Http\Controllers\User;

use App\Filter\UserFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Repo\Models\UserRepo;
use App\User;
use App\Model\{Member, Role, Address};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class userController extends Controller
{
    protected $user;
    public function __construct(UserRepo $user)
    {
        $this->middleware('auth');
        // $this->user = $user;
    }


    public function userlist()
    {
        $roles = Role::where('is_deleted', 0)->get();
        // return view("support.pages.dashboard.section.index");
        return view(default_template() . ".pages.userControl.index", compact('roles'));
    }

    public function menu()
    {
        return view(default_template() . ".pages.system.menu");
    }

    // private function memberJoin(){
    //     User::join("members", "members.user_id", "=", "users.id")
    // }


    public function users(Request $request)
    {
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;

        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }   

        
        if(request()->has('task_id')){
            $query = User::select('users.*', DB::raw('Date(users.created_at) as created_at_date'))     
            ->when(request()->task_id, function($q, $taskID){
                $q->selectRaw("(select case when ut.id then true else false end from task_assignees as ut where ut.user_id = users.id AND ut.task_id = $taskID) as ismember");
            })
            ->where("users.is_deleted", 0);
        }
        else if(request()->has('project_id')){
            $query = User::select('users.*', DB::raw('Date(users.created_at) as created_at_date'))     
            ->when(request()->project_id, function($q, $projectId){
                $q->selectRaw("(select case when up.id then true else false end from project_members as up where up.user_id = users.id AND up.project_id = $projectId) as ismember");
            })
            ->where("users.is_deleted", 0);
        }else{
            $query = User::select("users.*")->where("users.is_deleted",0);
        }
    


        $query->when($request->sort, function ($q, $sort) use ($request) {
            if ($sort['field'] === "fullName") {
                return $q->join('members as m', 'm.user_id', 'users.id')->orderBy('last_name', $sort['sort'])->orderBy('first_name', $sort['sort']);
            }
            return $q->orderBy($sort['field'], $sort['sort']);
        });


        $queryFilter = new UserFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);

        $total = $queryBuilder->count();

        $paginatedBuilder =  $queryBuilder->limit($perPage)
            ->offset($offset);

        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];

        $data['data'] = $paginatedBuilder->get();

        return response()->json($data);
    }

    public function add_users_modal()
    {
        $roles = Role::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.rolesPermission.inc.addModal.add_user_modal', compact('roles'));
    }

    // edit user modal
    public function edit_user_modal(User $user)
    {
        $roles = Role::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_user_modal', compact('user', 'roles'));
    }

    // update/edit user info
    public function updateUser(Request $request, User $user)
    {
        $rules = validation_value('edit_users_form');
        $this->validate($request, $rules);
        //call to userRepo
        $req = $request->only(['username', 'email']);
        $m_req = $request->only(['FirstName', 'LastName', 'email', 'PhoneNumber']);

        \DB::beginTransaction();
        try {
            $user->update($user->id, $req);
            // user repo acts till here
            $user->member->update([
                'first_name' => $request->FirstName,
                'last_name' => $request->LastName,
                'personal_email' => $request->email,
                'useru_id' => $user->id,
                'mobile_no' => $request->PhoneNumber,
                'updated_at' => now()
            ]);
            // $user->roles()->sync($request->role);
            \DB::commit();
            return response(['message' => 'User info successfully update!']);
        } catch (\Exception $e) {
            \DB::rollback();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function changePassword_modal(User $user)
    {
        return view(default_template() . '.pages.rolesPermission.inc.editModal.change_password', compact('user'));
    }

    //update password 
    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        if ((!\Hash::check($request->oldPassword, $user->password))) {
            return response(['errors' => ['oldPassword' => ' Current Password doesnot match!']], 500);
        }
        $request->password = Hash::make($request->password);
        $req = $request->only(['password']);
        $user->update($req);
        if (!$user) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Your Password Successfully!']);
    }
    /**
     * 
     * Soft delete existing users
     */
    public function delete_users(User $user)
    {
        $user->is_deleted = 1;
        $user->save();
        return response(['message' => 'successfully deleted!']);
    }

    public function user_profile(int $id)
    {
        $user = User::find($id);
        $addresses = Address::where('member_id', $user->member->id)->where('is_deleted', 0)->get();
        return view(default_template() . '.pages.userControl.inc.user-profile-view', compact('user', 'addresses'));
    }



    public function store(Request $request)
    {
        $rules = validation_value('users_form');
        $this->validate($request, $rules);
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->userc_id = auth()->check() ? auth()->id() : 0;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->api_token = '';
        $user->save();

        $user->roles()->sync($request->role);
        $member = Member::create([
            'first_name' => $request->FirstName,
            'last_name' => $request->LastName,
            'personal_email' => $request->email,
            'mobile_no' => $request->PhoneNumber,
            'user_id' => $user->id,
        ]);
    }

    public function userSearch(Request $request)
    {

        $user = new User();

        $data = $user->select('name')
            ->where('name', 'like', '%' . $request->p . '%');
        orWhere('email', 'like', '%' . $request->p . '%');
        // dd($data);
        // return view($t . 'search', compact('data'));
    }

    // public function advSearch(Request $request){

    //     $user = new User()

    //     $data = $user->select('name')
    //         ->where('name', 'like', '%' . $request->p . '%');
    //     ('email', 'like', '%' . $request->p . '%');
    //     ('fullname', 'like', '%' . $request->p . '%');
    //     ('MobileNumber', 'like', '%' . $request->p . '%');
    //     ('userId', 'like', '%' . $request->p . '%');



    // }
}
