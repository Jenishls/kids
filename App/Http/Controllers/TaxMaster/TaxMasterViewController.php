<?php

namespace App\Http\Controllers\TaxMaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TaxMaster;

class TaxMasterViewController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.taxMaster.index");
    }

    public function list(Request $request)
    {
        $model = TaxMaster::where('is_deleted', 0);
        // dd($request->$model);
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
                if (count($find) > 0 && $find['value'] != '')
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return $page;
    }


    /**
     * Delete selected tax row
     * @param int $id
     * @return delete 
     */
    public function deleteTax(int $id)
    {

        $tax = TaxMaster::find($id);
        $tax->is_deleted = 1;
        $tax->deleted_at = date('Y-m-d H:i:s');
        $tax->userd_id = auth()->id();
        $tax->save();
        return $this->index();
    }
}
