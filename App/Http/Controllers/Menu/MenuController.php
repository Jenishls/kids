<?php

namespace App\Http\Controllers\Menu;

use Carbon\Carbon;
use App\Model\Icon;
use App\Model\Menu;
use App\Model\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function menulist()
    {
        $menus = Menu::where('is_deleted', 0)->get('id', 'name');
        $icons = Icon::all('icon_group', 'icon_name', 'icon_class');
        return view(default_template() . '.pages.menu.index', compact('menus', 'icons'));
    }

    /**
     * Menu table search sort pagination
     * @param Request $request
     * @return search and sort
     */
    public function menudata(Request $request)
    {
        $model = Menu::where('is_deleted', 0);
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

    /**
     * Creating new menu
     * @param Request $request
     * @return updated menu
     */
    public function menucreate(Request $request)
    {
        $rules = validation_value('menucreate');
        $this->validate($request, $rules);

        // dd($request->all());

        if ($request->parent_id !== NULL) {
            $parent_id = $request->parent_id;
        } else {
            $parent_id = NULL;
        }
        $data = $request->only(['name', 'seq', 'route', 'icon', 'icon_class']);
        $arr = [
            'is_deleted' => 0,
            'parent_id' => $parent_id,
        ];
        $updateData = array_merge($data, $arr);
        // dd($updateData);
        if (isset($request->id)) :
            $menu = Menu::find($request->id);
            $menu->update($updateData);
            return $menu;

        else :
            $menu = Menu::updateOrCreate($updateData);
            return $menu;
        endif;
    }

    public function menuput(Request $request)
    {
        return $request->all();
    }

    public function del(Request $request)
    {
        $menu = Menu::find($request->id);

        $menu->delete();
        return $menu;
    }


    public function soft_del(Request $request)
    {

        $old_data = Menu::find($request->id);
        $new_data = $old_data;
        $new_data->is_deleted = 1;

        // $this->audit($request, $old_data, $new_data);
        $old_data->delete();
        return $old_data;
    }

    /**
     * Edit Menu table
     * @param Request $request
     * @return menu table with edited value
     */
    public function edit(Request $request)
    {
        $parentMenus = Menu::where('parent_id', NULL)->where('is_deleted', 0)->get();
        $icons = Icon::where('is_deleted', 0)->get();

        if (isset($request->edit) && $request->edit == 'dialogue') :
            $menudata = Menu::find($request->id);

            // return $menudata;

            return view(default_template() . '.pages.menu.menuedit', compact('parentMenus', 'icons', 'menudata'));

        else :

            return view(default_template() . '.pages.menu.menu-add', compact('parentMenus', 'icons'));

        endif;
    }


    public function audit($request, $old_data, $new_data)
    {

        $audit_data = [
            'table_name' => 'menu',
            'table_id' => $request->id,
            'old_data' => json_encode($old_data, true),
            'new_data' => json_encode($new_data, true),
            'userc_id' => auth()->id(),
            'userc_date' => Carbon::today(),
            'userc_time' => Carbon::now()
        ];

        $audit = Audit::create($audit_data);

        return $audit;
    }

    /**
     * Delete Menu data
     * @param int $id
     * @return delete 
     */
    public function deleteMenu(Request $request, int $id)
    {

        $old_data = Menu::find($request->id);
        $new_data = $old_data;
        $new_data->is_deleted = 1;
        $old_data->delete();
        return $old_data;
    }
}
