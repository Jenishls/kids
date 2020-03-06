<?php

namespace App\Factory\RolesPermissionFactory;

use App\Model\{Page, Role, Permission};
use App\User;

class RolesPermissionFactory
{
    // protected $role_permission_path = 'support.pages.rolesPermission.inc';
    public function dataTableFactory(string $table)
    {
        switch ($table) {
            case 'pages':
                return Page::where('is_deleted', 0)->get();
            case 'roles':
                return Role::where('is_deleted', 0)->get();
            case 'permissions':
                return Permission::with('pages')->where('is_deleted', 0)->get();
            case 'rolePermissions':
                return Role::with('permissions')->where('is_deleted', 0)->get();
            case 'userPermissions':
                return User::with('permissions')->where('is_deleted', 0)->get();
            default:
                return 'No table found';
        };
    }

    public function givePagePath(string $name)
    {
        switch ($name) {
            case 'Pages':
                return default_template() . '.pages.rolesPermission.inc.pages_table';
            case 'Roles':
                return default_template() . '.pages.rolesPermission.inc.roles_table';
            case 'Permissions':
                return default_template() . '.pages.rolesPermission.inc.permissions_table';
            case 'Role Permissions':
                return default_template() . '.pages.rolesPermission.inc.role_permissions_table';
            case 'User Permissions':
                return default_template() . '.pages.rolesPermission.inc.user_permissions_table';
            default:
                return default_template() . '.pages.rolesPermission.inc.pages_table';
        };
    }

    public function getAddModal(string $modal)
    {
        $modal = trim($modal);
        // dd($modal);
        switch ($modal) {
            case 'Pages':
                return view(default_template() . '.pages.rolesPermission.inc.addModal.add_pages_modal');
            case 'Roles':
                return view(default_template() . '.pages.rolesPermission.inc.addModal.add_roles_modal');
            case 'Permissions':
                $pages = Page::where('is_deleted', 0)->get();
                return view(default_template() . '.pages.rolesPermission.inc.addModal.add_permission_modal', compact('pages'));
            case 'Role Permissions':
                $roles = Role::where('is_deleted', 0)->get();
                $permissions = Permission::where('is_deleted', 0)->get();
                return view(default_template() . '.pages.rolesPermission.inc.addModal.assign_role_permission', compact('roles', 'permissions'));
            case 'User Permissions':
                $users = User::where('is_deleted', 0)->get();
                $permissions = Permission::where('is_deleted', 0)->get();
                return view(default_template() . '.pages.rolesPermission.inc.addModal.assign_user_permission', compact('users', 'permissions'));
            default:
                return 'Sorry, not available currently.';
        }
    }
}
