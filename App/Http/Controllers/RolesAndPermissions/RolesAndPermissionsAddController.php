<?php

namespace App\Http\Controllers\RolesAndPermissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Page, PagePermission, Role, Permission, RolePermission, UserPermission};
use App\Factory\RolesPermissionFactory\RolesPermissionFactory;
use App\Traits\RolePermissionTrait;

class RolesAndPermissionsAddController extends Controller
{

    use RolePermissionTrait;
    protected $arr;
    public function __construct()
    {
        $this->arr = ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $this->getModals = app(RolesPermissionFactory::class);
    }

    /**
     * Modal view 
     *
     * @param string $modal
     * @return view
     */
    public function call_modal(string $modal)
    {
        return $this->getModals->getAddModal($modal);
    }

    /**
     * Stores new field in dashboard roles permission tab
     *
     * @param Request $request
     * @param [type] $tabname
     * @return void
     */
    public function store_new(Request $request, $tabname)
    {
        // $data = $request;
        switch ($tabname) {
            case 'pages':
                return $this->store_pages($request);
            case 'roles':
                return $this->store_roles($request);
            case 'permissions':
                return $this->store_permission($request);
            case 'rolePermission':
                //trait method
                return $this->update_role_permission($request);
            case 'userPermission':
                // trait method
                return $this->update_user_permission($request);
            default:
                return "Hello";
        }
    }
    /**
     * Stores new page
     *
     * @param Request $request
     * @param Page $page
     * @return reponse
     */
    public function store_pages($request)
    {
        $rules = validation_value('pages_form');
        $this->validate($request, $rules);
        $user = ['userc_id' => auth()->id()];
        $save_fields = $request->only(['page_name', 'action']);
        $save_page = array_merge($save_fields, $this->arr, $user);
        $page = new Page();
        $page->insert($save_page);
        if (!$page) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Stores new role
     *
     * @param Request $request
     * @param Role $role
     * @return response
     */
    public function store_roles($request)
    {
        $rules = validation_value('add_role_form');
        $this->validate($request, $rules);
        $user = ['userc_id' => auth()->id()];
        $save_fields = $request->only(['role_name', 'label']);
        $save_role = array_merge($save_fields, $this->arr, $user);
        $role = new Role();
        $role->insert($save_role);
        if (!$role) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Stores new permission
     *
     * @param Request $request
     * @param Permission $permission
     * @return response
     */
    public function store_permission($request)
    {
        $rules = validation_value('permission_form');
        $this->validate($request, $rules);
        $permission = new Permission();
        $permission->permission_name = $request->permission_name;
        $permission->action = $request->action;
        $permission->created_at = date('Y-m-d H:i:s');
        $permission->userc_id = auth()->check() ? auth()->id() : NULL;
        $permission->save();
        if (count($request->page_id)) {
            foreach ($request->page_id as $page) {
                $page_per = new PagePermission();
                $page_per->page_id = $page;
                $page_per->permission_id = $permission->id;
                $page_per->created_at = date('Y-m-d H:i:s');
                $page_per->userc_id = auth()->check() ? auth()->id() : NULL;
                $page_per->save();
            }
        }
        if (!$permission) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }
}
