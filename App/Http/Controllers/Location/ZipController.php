<?php

namespace App\Http\Controllers\Location;

use App\Model\ZipCode;
use App\User;
use App\Lib\Filter\ZipCodeFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZipController extends Controller
{
    public function index()
    {
        $data['states']= ZipCode::select('id','state')->where('is_deleted',0)->get()->unique(function ($item) {
                                return ucwords($item['state']);
                            });
        $data['cities']= ZipCode::select('id','city')->where('is_deleted',0)->get()->unique(function ($item) {
                                return ucwords($item['city']);
                            });
        return view(default_template() . ".pages.zip.index", compact('data'));
    }

    public function addZipModal()
    {
        return view(default_template() . '.pages.zip.modal.addZipModal');
    }

    public function editZipModal(int $id)
    {
        $location = ZipCode::find($id);
        return view(default_template() . '.pages.zip.modal.editZipModal', compact('location'));
    }

    public function zipList(Request $request)
    {
        
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;

        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query = $coupons = ZipCode::where('is_deleted', 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new ZipCodeFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        // dd($queryBuilder);
        $total = $queryBuilder->count();

        $paginatedBuilder =  $queryBuilder->limit($perPage)
            ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $paginatedBuilder->get();
        return response()->json($data);
    }

    public function storeZip(Request $request)
    {
        
        // dd($request->all());
        $rules = validation_value('zip_form');
        $this->validate($request, $rules);
        $count = count($request->city);
        if ($count >= 1) {
            foreach ($request->city as $key => $value) {
                $location = new ZipCode();
                $location->city = $request->city[$key];
                $location->county = $request->county[$key];
                $location->state = $request->state[$key];
                $location->zipcode = $request->zipcode[$key];
                $location->price = $request->price[$key];
                $location->save();
            }
        }
        // $user = User::find($id);
        return response()->json(["message" => 'Added successfully.']);

    }

    public function updateZip(Request $request, int $id)
    {
        $location = ZipCode::find($id);
        $rules = validation_value('update_zip_form');
        $this->validate($request, $rules);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        $location->update($update);
        if (!$location) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    public function deleteZip($id)
    {
        $zip = ZipCode::find($id);
        $zip->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
    }


}
