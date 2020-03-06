<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Factory\RolesPermissionFactory\RolesPermissionFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Page, Role, Permission};
use App\User;
use Illuminate\Support\Facades\Auth;

class RolesAndPermissionsViewController extends Controller
{
    // protected $path = 'support.pages.rolesPermission';
    protected $rolePermissionContainer;

    public function __construct()
    {
        $this->rolePermissionContainer = app(RolesPermissionFactory::class);
    }

    public function index()
    {
        // $hasAccess = Auth::user()->hasPermission('Roles & Permissions', 'view');
        return view(default_template() . '.pages.rolesPermission.index');
    }

    /**
     * Return Datatable View page according to route input value
     *
     * @param string $name
     * @return view
     */
    public function show_pages($name)
    {

        return view($this->rolePermissionContainer->givePagePath($name), compact('name'));
    }

    /**
     * Return Data for datatables
     *
     * @param Request $request
     * @param  String $table
     * @return Json
     */
    public function get_datatable(Request $request, string $table)
    {
        // return response()->json($this->rolePermissionContainer->dataTableFactory($table)); 
        switch ($table) {
            case 'pages':
                $model = Page::where('is_deleted', 0);
                return response()->json($this->get_table($request, $model));
            case 'roles':
                $model = Role::where('is_deleted', 0);
                return response()->json($this->get_table($request, $model));
            case 'permissions':
                $model = Permission::with('pages')->where('is_deleted', 0);
                return response()->json($this->get_table($request, $model));
            case 'rolePermissions':
                $model = Role::with('permissions')->where('is_deleted', 0);
                return response()->json($this->get_table($request, $model));
            case 'userPermissions':
                $model = User::with('permissions')->where('is_deleted', 0);
                return response()->json($this->get_table($request, $model));
            default:
                return 'No table found';
        };
    }

    /**
     * Datatable sort and search
     *
     * @param instance $request
     * @param instance $model
     * @return query
     */
    public function get_table($request, $model)
    {
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];
        if ($request->input('query')) {
            $search = $request->input('query');
            foreach ($search as $key => $value) {
                $find['row'] = $key;
                $find['value'] = $value;
            }
        }
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $page = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0)
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return $page;
    }
}
