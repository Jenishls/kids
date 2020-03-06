<?php

namespace App\Http\Controllers\LookUp;

use Illuminate\Http\Request;
use App\Repo\Models\LookupRepo;
use App\Http\Controllers\Controller;
use App\Repo\Models\SectionLookupRepo;
use App\Model\Lookup\{SectionLookup, Lookup};

class LookUpController extends Controller
{
    protected $path = 'support.pages.lookUp';

    public function index()
    {
        $sections = SectionLookup::where('is_deleted', 0)->get();
        $default = $sections[0];
        return view(default_template() . ".pages.lookup.index", compact('sections', 'default'));
    }

    public function lookUpTable(int $id)
    {
        $section = SectionLookup::find($id);
        return response()->json($section);
    }

    public function lookUpList(int $id, Request $request)
    {
        // $lookup = Lookup::where('section_id', $id)->where('is_deleted', 0)->get();
        // return response()->json($lookup);
        $model = Lookup::where('section_id', $id)->distinct('code')->where('is_deleted', 0);
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
            ->select('code')->get();
        return $page;
    }


    public function addSectionModal()
    {
        return view(default_template() . '.pages.lookup.modal.add_section_modal');
    }
    /**
     * Adds new Lookup section
     *
     * @param Request $request
     * @param SectionLookup $section
     * @return response
     */
    public function addNewSection(Request $request, SectionLookupRepo $section)
    {
        $rules = validation_value('add_lookup_section');
        $this->validate($request, $rules);

        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $section->save($add);
        return $this->index();
    }

    public function editSectionModal(int $id)
    {
        $section = SectionLookup::find($id);
        return view(default_template() . '.pages.lookup.modal.edit_section_modal', compact('section'));
    }

    /**
     * Edit Lookup Section
     *
     * @param integer $id
     * @param Request $request
     * @param SectionLookupRepo $sectionRepo
     * @return action
     */
    public function editLookupSection(int $id, Request $request, SectionLookupRepo $sectionRepo)
    {
        // $rules = validation_value('edit_lookup_form');
        // $this->validate($request, $rules);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $data = array_merge($req, $arr);
        $sectionRepo->update($id, $data);
        return $this->index();
    }

    public function deleteLookupSection(int $id, SectionLookupRepo $sectionRepo)
    {
        $sectionRepo->softDelete($id);
        return $this->index();
    }

    public function addToGroup(string $group, int $id)
    {
        // dd($group, $id);
        return view(default_template() . '.pages.lookup.modal.add_lookup_to_group', compact('group', 'id'));
    }

    public function addLookupModal(int $section_id)
    {
        $section = SectionLookup::find($section_id);
        return view(default_template() . '.pages.lookup.modal.add_lookup_modal', compact('section'));
    }
    /**
     * Adds new lookup field
     *
     * @param Request $request
     * @param Lookup $lookup
     * @return response
     */
    public function addNewLookup(Request $request, LookupRepo $lookup)
    {
        $rules = validation_value('add_lookup_form');
        $this->validate($request, $rules);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $lookup->save($add);
        if (!$lookup) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Added Successfully!']);
    }

    public function editLookupModal(int $lookup_id)
    {
        $lookup = Lookup::find($lookup_id);
        return view(default_template() . '.pages.lookup.modal.edit_lookup_modal', compact('lookup'));
    }

    /**
     * Edit Selected lookup
     *
     * @param integer $lookup_id
     * @param Request $request
     * @return response
     */
    public function editLookup(int $lookup_id, Request $request, LookupRepo $lookup, Lookup $l)
    {
        $rules = validation_value('edit_lookup_form');
        $this->validate($request, $rules);
        $lkup = $l->find($lookup_id);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
            'section_id' => $lkup->section_id,
        ];
        $id = $lookup_id;
        $req = $request->except(['_token']);
        $data = array_merge($req, $arr);
        $lookup->update($id, $data);
        if (!$lookup) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }


    /**
     * Softdelete selected lookup
     *
     * @param integer $lookup_id
     * @return response
     */
    public function deleteLookup(int $lookup_id, LookupRepo $lookup)
    {
        $del = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id(),
        ];
        $id = $lookup_id;
        $lookup->doftDelete($id);
        if (!$lookup) :
            return response(['message' => 'Something went wrong while deleting!']);
        endif;
        return response(['message' => 'Deleted Successfully!']);
    }

    /**
     * Lookup child table
     *
     * @param string $name
     * @param integer $id
     * @param Request $request
     * @return response
     */
    public function lookUpChild(string $name, int $id, Request $request)
    {

        $model = Lookup::where('section_id', $id)->where('code', $name)->where('is_deleted', 0);
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];

        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $lookups = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->get();
        // $lookups = Lookup::where('section_id', $id)->where('code', $name)->where('is_deleted', 0)->get();
        return response()->json($lookups);
    }


    /**
     * Delete whole lookup group
     *
     * @param string $group
     * @return void
     */
    public function deleteLookupGroup(string $group)
    {
        dd($group);
        $lookups = Lookup::where('code', $group)->where('is_deleted', 0)->get();
        $del = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id(),
        ];
        foreach ($lookups as $lookup) {
            $lookup->update($del);
        }
        // if (!$lookup) :
        //     return response(['message' => 'Something went wrong while deleting!']);
        // endif;
        return response(['message' => 'Deleted Successfully!']);
    }
}
