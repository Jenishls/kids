<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\Member;
use Illuminate\Http\Request;
use App\Repo\Models\UserRepo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $user;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['string', 'unique:users'],
          //  'mobile_no' => ['required','string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd("here");
        \DB::beginTransaction();
        try {
            $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'username' => $data['username'],
                    'mobile_no' => $data['mobile_no'],
                    'password' => Hash::make($data['password']),
                    'is_locked' => 1,
                    'userc_id' => 1,
                ]);
            $full_name = explode(' ', $user->name);

         //   dd($full_name);
            $fname = NULL;
            $mname = NULL;
            $lname = NULL;
            if (count($full_name) > 2) {
                $fname = $full_name[0];
                $mname = $full_name[1];
                $lname = $full_name[2];
            } elseif (count($full_name) == 2) {
                $fname = $full_name[0];
                $lname = $full_name[1];
            } else {
                $fname = $full_name[0];
            }

            if(array_key_exists("client",$data)){
                $checkClient = Client::where("email",$user->email)->first();
                if ($checkClient){
                    $checkClient->update([
                        'email' => $user->email,
                        'user_id' => $user->id,
                        'fname' => $fname,
                        'mname' => $mname,
                        'lname' => $lname,
                        'phone_no' => $user->mobile_no,
                    ]);
                }else{
                 Client::updateOrCreate([
                    'email' => $user->email,
                    'user_id' => $user->id,
                    'fname' => $fname,
                    'mname' => $mname,
                    'lname' => $lname,
                    'phone_no' => $user->mobile_no,
                ]);
                }
            }else{
                Member::create([
                    'user_id' => $user->id,
                    'first_name' => $fname,
                    'middle_name' => $mname,
                    'last_name' => $lname,
                    'personal_email' => $user->email,
                    'mobile_no' => $user->mobile_no,
                ]);
            }
            DB::commit();
            return $user;
        }catch (\Exception $e) {
            DB::rollback();
            return response(["message" => $e->getMessage()], 500);
        }
    }
}
