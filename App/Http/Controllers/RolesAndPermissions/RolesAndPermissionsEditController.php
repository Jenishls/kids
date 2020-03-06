<?php

namespace App\Http\Controllers\RolesAndPermissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Page, Role, Permission, RolePermission, UserPermission, PagePermission};
use App\Traits\RolePermissionTrait;
use App\User;

class RolesAndPermissionsEditController extends Controller
{
    use RolePermissionTrait;

    protected $path = 'support.pages.rolesPermission.inc';
    protected $arr = [];

    /**
     * Get modals for editing current row data
     *
     * @param string $page
     * @param integer $id
     * @return view
     */
    public function get_edit_modals(string $page, int $id)
    {
        switch (trim($page)) {
            case 'page':
                $page = Page::find($id);
                return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_pages_modal', compact('page'));
            case 'role':
                $role = Role::find($id);
                return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_roles_modal', compact('role'));
            case 'permission':
                $pages = Page::where('is_deleted', 0)->get();
                $permission = Permission::find($id);
                return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_permission_modal', compact('permission', 'pages'));
            case 'rolePermission':
                $role = Role::where('id', $id)->with('permissions')->first();
                $permissions = Permission::where('is_deleted', 0)->get();
                return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_rolePermission_modal', compact('role', 'permissions'));
            case 'userPermission':
                $user = User::find($id);
                $permissions = Permission::where('is_deleted', 0)->get();
                return view(default_template() . '.pages.rolesPermission.inc.editModal.edit_userPermission_modal', compact('user', 'permissions'));

            default:
                return "Sorry";
        }
    }

    /**
     * Updates values in dashboard tabs
     *
     * @param Request $request
     * @param string $page
     * @param integer $id
     * @return void
     */
    public function update_tab_value(Request $request, string $page, int $id)
    {
        switch (trim($page)) {
            case 'page':
                $pages = Page::find($id);
                return $this->update_pages($request, $pages);
            case 'role':
                $role = Role::find($id);
                return $this->update_roles($request, $role);
            case 'permission':
                $permission = Permission::find($id);
                return $this->update_permission($request, $permission);
            case 'rolePermission':
                return $this->update_role_permission($request);
            case 'userPermission':
                return $this->update_user_permission($request);
            default:
                return "Sorry";
        }
    }
    /**
     * Delete current row
     *
     * @param string $page
     * @param integer $id
     * @return void
     */
    public function delete_tab_value(string $page, int $id)
    {
        switch (trim($page)) {
            case 'page':
                $page = Page::find($id);
                return $this->delete_page($page);
            case 'role':
                $role = Role::find($id);
                return $this->delete_role($role);
            case 'permission':
                $permission = Permission::find($id);
                return $this->delete_permission($permission);
            case 'rolePermission':
                return $this->delete_role_permission($id);
            case 'userPermission':
                return $this->delete_user_permission($id);
            default:
                return "Sorry, this cannot be deleted.";
        }
    }

    /**
     * Update current selected PAGE data
     *
     * @param instance $request
     * @param instance $page
     * @return response
     */
    public function update_pages(Request $request, $page)
    {
        $rules = validation_value('edit_page_form');
        $this->validate($request, $rules);
        $toUpdateFields = $request->only(['page_name', 'action']);
        $page->update($toUpdateFields);
        if (!$page) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Update current selected ROLE data
     *
     * @param instance $request
     * @param instance $role
     * @return response
     */
    public function update_roles(Request $request, $role)
    {
        $rules = validation_value('role_edit_form');
        $this->validate($request, $rules);
        $toUpdateFields = $request->only(['role_name', 'label']);
        $role->update($toUpdateFields);
        if (!$role) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Update current selected PERMISSION data
     *
     * @param instance $request
     * @param integer $id
     * @return void
     */
    public function update_permission(Request $request, $permission)
    {
        $rules = validation_value('edit_permission_form');
        $this->validate($request, $rules);
        $permission->permission_name = $request->permission_name;
        $permission->action = $request->action;
        $permission->updated_at = date('Y-m-d H:i:s');
        $permission->useru_id = auth()->check() ? auth()->id() : NULL;
        $permission->save();
        $page_per = PagePermission::where('permission_id', $permission->id)->where('is_deleted', 0)->get();
        if (isset($request->page_id) && count($request->page_id)) {
            $oldarray = [];
            $newarray = [];
            foreach ($request->page_id as $id) {
                $newarray[] = (int) $id;
            }
            foreach ($page_per as $page) {
                $oldarray[] = $page->page_id;
            }
            $adds = array_diff($newarray, $oldarray);
            $dels = array_diff($oldarray, $newarray);
            $updates = array_intersect($newarray, $oldarray);

            if (count($adds)) {
                foreach ($adds as $add) {
                    $rp = new PagePermission();
                    $rp->page_id = $add;
                    $rp->permission_id = $permission->id;
                    $rp->userc_id = auth()->check() ? auth()->id() : NULL;
                    $rp->created_at = date('Y-m-d H:i:s');
                    $rp->save();
                }
            }
            if (count($dels)) {
                foreach ($dels as $del) {
                    $row = PagePermission::where('page_id', $del)->where('permission_id', $permission->id)->where('is_deleted', 0)->first();
                    $row->is_deleted = 1;
                    $row->userd_id = auth()->check() ? auth()->id() : NULL;
                    $row->deleted_at = date('Y-m-d H:i:s');
                    $row->save();
                }
            }
            if (count($updates)) {
                foreach ($updates as $update) {
                    $row = PagePermission::where('page_id', $update)->where('permission_id', $permission->id)->where('is_deleted', 0)->first();
                    $row->updated_at = date('Y-m-d H:i:s');
                    $row->useru_id = auth()->check() ? auth()->id() : NULL;
                    $row->save();
                }
            }
        } else {
            foreach ($page_per as $row) {
                $row->is_deleted = 1;
                $row->userd_id = auth()->check() ? auth()->id() : NULL;
                $row->deleted_at = date('Y-m-d H:i:s');
                $row->save();
            }
        }
    }


    /**
     * Soft Delete current selected PAGE data
     *
     * @param instance $page
     * @return response
     */
    public function delete_page($page)
    {
        $page->is_deleted = 1;
        $page->deleted_at = date('Y-m-d H:i:s');
        $page->userd_id = auth()->check() ? auth()->id() : NULL;
        $page->save();
        return response(['message' => 'successfully deleted!']);
    }

    /**
     * Soft Delete current selected ROLE data
     *
     * @param instance $role
     * @return response
     */
    public function delete_role(Role $role)
    {
        $role->is_deleted = 1;
        $role->deleted_at = date('Y-m-d H:i:s');
        $role->userd_id = auth()->check() ? auth()->id() : NULL;
        $role->save();
        return response(['message' => 'successfully deleted!']);
    }

    /**
     * Soft Delete current selected PERMISSION data
     *
     * @param instance $permission
     * @return response
     */
    public function delete_permission($permission)
    {
        $permission->is_deleted = 1;
        $permission->deleted_at = date('Y-m-d H:i:s');
        $permission->userd_id = auth()->check() ? auth()->id() : NULL;
        $permission->save();

        $pivot = PagePermission::where('permission_id', $permission->id)->where('is_deleted', 0)->get();
        foreach ($pivot as $p) {
            $p->is_deleted = 1;
            $p->deleted_at = date('Y-m-d H:i:s');
            $p->userd_id = auth()->check() ? auth()->id() : NULL;
            $p->save();
        }
        return response(['message' => 'successfully deleted!']);
    }

    /**
     * Deletes all permissions assigned to selected role
     *
     * @param int $id
     * @return void
     */
    public function delete_role_permission($id)
    {
        $rp = RolePermission::where('role_id', $id)->where('is_deleted', 0)->get();
        if (count($rp) > 0) {
            foreach ($rp as $perm) {
                $perm->is_deleted = 1;
                $perm->userd_id = auth()->check() ? auth()->id() : NULL;
                $perm->deleted_at = date('Y-m-d H:i:s');
                $perm->save();
            }
            return response()->json(["message" => 'Successfully deleted.']);
        } else {
            return response()->json(["message" => 'No permissions assigned to this role.']);
        }
    }

    /**
     * Deletes all permissions assigned to selected user
     *
     * @param string $id
     * @return response
     */
    public function delete_user_permission($id)
    {
        $user_per = UserPermission::where('user_id', $id)->where('is_deleted', 0)->get();
        if (count($user_per) > 0) {
            foreach ($user_per as $u_p) {
                $u_p->is_deleted = 1;
                $u_p->userd_id = auth()->check() ? auth()->id() : NULL;
                $u_p->deleted_at = date('Y-m-d H:i:s');
                $u_p->save();
            }
            return response()->json(["message" => 'Successfully deleted.']);
        } else {
            return response()->json(["message" => 'No permissions assigned to this user.']);
        }
    }
}
