<?php

namespace App\Http\Controllers\Icon;

use App\Model\Icon;
use App\Model\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IconController extends Controller
{
    public function iconlist()
    {
        $data['icons'] = Icon::all('id', 'icon_group', 'icon_name', 'icon_name', 'icon_class');

        return view(default_template() . '.pages.icon.iconlist', $data);
    }
    public function icondata(Request $request)
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
        $icons = Icon::where('is_deleted', 0)->orWhere('is_deleted', NULL)->when($request->sort, function ($q, $sort) {
            return $q->orderBy($sort['field'], $sort['sort']);
        })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0)
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return $icons;
    }


    public function iconcreate(Request $request)
    {
        $rules = validation_value('icon');
        $this->validate($request, $rules);
        $data = $request->except(['_token', 'id']);
        // dd($updateData);
        $arr = [
            'is_deleted' => 0,
        ];
        $updateData = array_merge($data, $arr);
        if (isset($request->id)) :
            // $menu = \DB::table('menus')->where('id', $request->id)->first();
            // $menu = Menu::query()->where('id', $request->id)->toSql();
            $icon = Icon::find($request->id);
            // dd($menu);


            // $this->audit($request, $menu, $updateData);
            $icon->update($updateData);
            return $icon;

        else :
            $icon = Icon::updateOrCreate($updateData);
            return $icon;
        endif;
    }

    public function iconput(Request $request)
    {
        return $request->all();
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $menus = Menu::all('id', 'parent_id', 'name');
        $icons = Icon::all('icon_group', 'icon_name', 'icon_class');

        if (isset($request->edit) && $request->edit == 'dialogue') :



            $icondata = Icon::find($request->id);
            // return $menudata;

            return view(default_template() . '.pages.icon.icon_edit', compact('menus', 'icons', 'icondata'));

        else :

            return view(default_template() . '.pages.icon.icon_add', compact('menus', 'icons'));

        endif;
    }

    /**
     * Delete Icon data
     * @param int $id
     * @return delete 
     */
    public function deleteIcon(int $id)
    {
        $icon = Icon::find($id);
        $icon->is_deleted = 1;
        $icon->userd_id = auth()->id();
        $icon->deleted_at = date('Y-m-d H:i:s');
        $icon->save();
    }
}
