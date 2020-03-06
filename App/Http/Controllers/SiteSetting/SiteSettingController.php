<?php

namespace App\Http\Controllers\SiteSetting;

use App\Model\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Models\SiteSettingRepo;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view(default_template() . '.pages.siteSetting.index');
    }

    /**
     * Sitesetting table data with sort and search
     *
     * @param Request $request
     * @return json
     */
    public function siteSettingTable(Request $request)
    {
        // return response()->json(SiteSetting::where('is_deleted', 0)->get());

        $model = SiteSetting::where('is_deleted', 0);
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


    // Return add modal
    public function addModal()
    {
        return view(default_template() . '.pages.siteSetting.modal.add_site_setting');
    }

    /**
     * Add new Sitesetting
     *
     * @param SiteSettingRepo $repo
     * @param Request $request
     * @return response
     */
    public function addSiteSetting(SiteSettingRepo $repo, Request $request)
    {
        $rules = validation_value('sitesetting_form');
        $this->validate($request, $rules);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $repo->save($add);
        if (!$repo) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Added Successfully!']);
    }

    // Return edit modal
    public function editModal(int $id, Request $request)
    {
        $setting = Sitesetting::find($id);
        return view(default_template() . '.pages.siteSetting.modal.edit_site_setting', compact('setting'));
    }

    /**
     * Update selected sitesetting
     *
     * @param SiteSettingRepo $repo
     * @param Request $request
     * @param integer $id
     * @return response
     */
    public function updateSiteSetting(SiteSettingRepo $repo, Request $request, int $id)
    {
        $request->validate([
            'code' => 'required',
            'value' => 'required',
        ]);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $repo->update($id, $add);
        if (!$repo):
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Softdelete selected sitesetting
     *
     * @param SiteSettingRepo $repo
     * @param integer $id
     * @return void
     */
    public function deleteSiteSetting(SiteSettingRepo $repo, int $id)
    {
        // $sitesetting = SiteSetting::find($id);
        // $sitesetting->is_deleted = 1;
        // $sitesetting->deleted_at = date('Y-m-d H:i:s');
        // $sitesetting->userd_id = auth()->id();
        $repo->softDelete($id);
    }


    public function exportFile($type)
    {
        $siteSettings = SiteSetting::where('is_deleted', 0)->get()->toArray();
        return \Excel::create('export_demo', function ($excel) use ($siteSettings) {
            $excel->sheet('site_setting', function ($sheet) use ($siteSettings) {
                $sheet->fromArray($siteSettings);
            });
        })->download($type);
    }
}
