<?php

namespace App\Traits;

use App\Model\{Page, Role, Permission, RolePermission, UserPermission};
use Illuminate\Support\Facades\Auth;

trait RolePermissionTrait
{

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function getAllPermissions()
    {

        $permissions = session('permissions', []);

        if (count($permissions)) return $permissions;

        $permissions = $this->permissions;

        $roles = $this->roles;

        foreach ($roles as $role) {
            $permissions = $permissions->merge($role->permissions);
        }

        session(['permissions' => $permissions]);

        return $permissions;
    }
    
    public function hasPermission($page, $action)
    {
        $page = Page::firstOrCreate(array('page_name' => $page));
        $permissions = $this->getAllPermissions()->filter(function ($permission) use ($page) {
            return $permission->page_id === $page->id;
        });

        foreach ($permissions as $permission) {
            $actions = explode('|', $permission->action);

            if (in_array($action, $actions)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($action)
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            $user_role[] = $role->role_name;
            if (in_array($action, $user_role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Updates permissions assigned to roles
     *
     * @param [type] $request
     * @return void
     */
    public function update_role_permission($request)
    {
        \DB::beginTransaction();
        try {
            $r_p = RolePermission::where('role_id', $request->role_id)->where('is_deleted', 0)->get();
            if(count($r_p)>0){
                if($request->role_permission){
                    $oldarray=[];
                    $newarray =[];
                    foreach($request->role_permission as $id){
                        $newarray[] = (int)$id;
                    }
                    foreach($r_p as $rp){
                        $oldarray[] = $rp->permission_id;
                    }
                    $adds = array_diff($newarray, $oldarray);
                    $dels = array_diff($oldarray, $newarray);
                    $updates = array_intersect($newarray, $oldarray);
    
                    if(count($adds)){
                        foreach($adds as $per_id){
                            $rp= new RolePermission();
                            $rp->role_id = (int)$request->role_id;
                            $rp->permission_id = $per_id;
                            $rp->userc_id = auth()->check()?auth()->id():NULL;
                            $rp->created_at = date('Y-m-d H:i:s');
                            $rp->save(); 
                        }
                    }
                    if(count($dels)){
                        foreach($dels as $del){
                            $row = RolePermission::where('role_id', $request->role_id)->where('permission_id', $del)->where('is_deleted', 0)->first();
                            $row->is_deleted = 1;
                            $row->userd_id = auth()->check()?auth()->id():NULL;
                            $row->deleted_at = date('Y-m-d H:i:s');
                            $row->save();
                        }
                    }if(count($updates)){
                        foreach($updates as $update){
                            $row = RolePermission::where('role_id', $request->role_id)->where('permission_id', $update)->where('is_deleted', 0)->first();
                            $row->updated_at = date('Y-m-d H:i:s');
                            $row->useru_id = auth()->check()?auth()->id():NULL;
                            $row->save();
                        }
                    }
                    
                }else{
                    foreach ($r_p as $rp) {
                        $rp->is_deleted = 1;
                        $rp->userd_id = auth()->check()?auth()->id():NULL;
                        $rp->deleted_at = date('Y-m-d H:i:s');
                        $rp->save();
                    } 
                }
            }else{
                foreach($request->role_permission as $rp){
                    $r_p = new RolePermission();
                    $r_p->role_id = (int)$request->role_id;
                    $r_p->permission_id = (int)$rp;
                    $r_p->userc_id = auth()->check()?auth()->id():NULL;
                    $r_p->created_at = date('Y-m-d H:i:s');
                    $r_p->save(); 
                }
            }
            \DB::commit();
        } catch(\Exception $e){
            \DB::rollback();
            return response()->json(["message" => $e->getMessage()]);
        }
    }


    /**
     * Updates permissions assigned to users
     *
     * @param [type] $request
     * @return void
     */
    public function update_user_permission($request)
    {
        \DB::beginTransaction();
        try{
            $user_per = UserPermission::where('user_id', $request->user_id)->where('is_deleted',0)->get();
            if (count($user_per)>0) {
                if ($request->user_permission) {
                    $newarray = [];
                    $oldarray = [];
                    foreach($request->user_permission as $id){
                        $newarray[] = (int)$id;
                    }
                    foreach($user_per as $up){
                        $oldarray[] = $up->permission_id;
                    }
                    $adds = array_diff($newarray, $oldarray);
                    $dels = array_diff($oldarray, $newarray);
                    $updates = array_intersect($newarray, $oldarray);
                    if (count($adds)) {
                        foreach ($adds as $add) {
                            $newup = new UserPermission();
                            $newup->user_id = $request->user_id;
                            $newup->permission_id = $add;
                            $newup->userc_id = auth()->check()?auth()->id():NULL;
                            $newup->created_at = date('Y-m-d H:i:s');
                            $newup->save();
                        }
                    }
                    if (count($updates)) {
                        foreach ($updates as $update) {
                            $up = UserPermission::where('user_id', $request->user_id)->where('permission_id', $update)->where('is_deleted', 0)->first();
                            $up->updated_at = date('Y-m-d H:i:s');
                            $up->useru_id = auth()->check()?auth()->id():NULL;
                            $up->save();
                        }
                    }
                    if (count($dels)) {
                        foreach ($dels as $delete) {
                            $up = UserPermission::where('user_id', $request->user_id)->where('permission_id', $delete)->where('is_deleted', 0)->first();
                            $up->is_deleted = 1;
                            $up->userd_id = auth()->check()?auth()->id():NULL;
                            $up->deleted_at = date('Y-m-d H:i:s');
                            $up->save();
                        }
                    }
                }else{
                    foreach($user_per as $up){
                        $up->is_deleted = 1;
                        $up->userd_id = auth()->check()?auth()->id():NULL;
                        $up->deleted_at = date('Y-m-d H:i:s');
                        $up->save();
                    }
                }
            }else{
                foreach($request->user_permission as $perm){
                    $user_per = new UserPermission();
                    $user_per->user_id = $request->user_id;
                    $user_per->permission_id = $perm;
                    $user_per->userc_id = auth()->check()?auth()->id():NULL;
                    $user_per->created_at = date('Y-m-d H:i:s');
                    $user_per->save();

                }
            }
            \DB::commit();
        }catch(\Exception $e){
            \DB::rollback();
            return response()->json(["message" => $e->getMessage()]);
        }
    }

}
