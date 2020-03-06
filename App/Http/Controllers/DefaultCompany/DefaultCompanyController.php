<?php

namespace App\Http\Controllers\DefaultCompany;

use App\Model\BusinessHour;
use Illuminate\Http\Request;
use App\Model\DefaultCompany;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Response;

class DefaultCompanyController extends Controller
{
    public function index()
    {

        $company = DefaultCompany::get();
        $logo = DefaultCompany::where('property', 'logo')->first();
        $icons = DefaultCompany::where('property','like', 'icon_'.'%' )->where('is_deleted', 0)->orderBy('property', 'asc')->get();

        $hours = BusinessHour::where('is_deleted', 0)->get();
        // dd($hours);
        return view(default_template() . ".pages.defaultCompany.index", compact('company', 'hours', 'logo', 'icons'));
    }


    public function add_option_modal()
    {
        return view(default_template() . '.pages.defaultCompany.inc.add_option_modal');
    }

    public function DefaultCompanyList(Request $request)
    {
        $model = DefaultCompany::where('is_deleted', 0);
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
            ->where('is_deleted', 0)
            ->orderBy('property', 'asc')
            ->get();
        return response()->json($page);
    }

    public function storeDefaultCompanyProperty(Request $request)
    {
        $property = $request->property;
        if ($request->has('file')) {
            $value = upload_file($request, "/app/defaultCompany");
        } else {
            $value = $request->value;
        }
        if ($oldProperty = $this->companyProperty($property)) {
            /** Update the property value */
            $oldProperty->update(["value" => $value]);
        } else {
            $newProperty = new DefaultCompany();
            $newProperty->create([
                'property' => $property,
                'value' => $value
            ]);
        }
    }
    
    
    public function storeDefaultCompanyLogo(Request $request)
    {
        $logo = DefaultCompany::where('property','logo')->first();
        if ($request->has('file')) {
            $f = $request->file;
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;

            if (!file_exists(storage_path("default_company/images"))) {
                mkdir(storage_path("default_company/images"), 0777, true);
            }
            $f->move(storage_path("default_company/images") . DIRECTORY_SEPARATOR, $fileName);
            if($logo){
                $logo->value = $fileName;
                $logo->update();
            }
            else{
                DefaultCompany::create([
                    'property' => 'logo',
                    'value' => $fileName
                ]);
            }
            return response()->json([
                'name'          => $fileName,
            ]);;
        }
    }



    public function viewImage($image)
    {
        $path = storage_path('default_company/images/' . $image);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    
    
    private function companyProperty($property)
    {
        return DefaultCompany::where('property', $property)->first();
    }

    // add/store option
    public function store(Request $request)
    {
        $this->storeDefaultCompanyProperty($request);
    }

    // edit option modal
    public function updateOptionModal(int $id)
    {
        $defaultCompany = DefaultCompany::find($id);
        return view(default_template() . '.pages.defaultCompany.inc.editOptionModal', compact('defaultCompany'));
    }

    // edit option
    public function updateOption(int $id, Request $request)
    {
        $this->storeDefaultCompanyProperty($request);
        $defaultCompany = DefaultCompany::find($id);
        $request->validate([
            'property' => 'required',
            'value' => 'required',
        ]);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        $defaultCompany->update($update);
        if (!$defaultCompany) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }


    public function logoAddModal(Request $request)
    {
        $defaultCompany = DefaultCompany::where('property', 'logo')->first();
        return view(default_template() . '.pages.defaultCompany.inc.addLogoModal', compact('defaultCompany'));
    }

    public function updateCompanyLogo()
    {
        $this->storeDefaultCompanyProperty($request);
    }

    public function deleteOption(int $id)
    {

        $defaultCompany = DefaultCompany::find($id);
        $del = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id(),
        ];
        $defaultCompany->update($del);
        if (!$defaultCompany) :
            return response(['message' => 'Something went wrong while deleting!']);
        endif;
        return response(['message' => 'Deleted Successfully!']);
    }


    // Business hours



    public function BusinessHoursList(Request $request)
    {
        $model = BusinessHour::where('is_deleted', 0);
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
        return response()->json($page);
    }

    // add hours modal

    public function addHourModal()
    {
        return view(default_template() . '.pages.defaultCompany.inc.addBusinessHourModal');
    }

    // update/edit hours modal

    public function updateHourModal(int $id)
    {
        $businessHour = BusinessHour::find($id);
        return view(default_template() . '.pages.defaultCompany.inc.editHourModal', compact('businessHour'));
    }

    // business hours store

    public function businessHourStore(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'status' => 'required',

        ]);
        $business_hours = new BusinessHour();
        $business_hours->day = $request->day;
        $business_hours->open_time = $request->open_time;
        $business_hours->close_time = $request->close_time;
        $business_hours->status = $request->status;

        $business_hours->created_at = date('Y-m-d H:i:s');
        $business_hours->save();
    }

    // edit hour
    public function updateHour(int $id, Request $request)
    {
        $businessHour = BusinessHour::find($id);
        // $request->validate([
        //     'day' => 'required',
        //     'open_time' => 'required',
        //     'close_time' => 'required',
        //     'status' => 'required',
        // ]);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        $businessHour->update($update);
        if (!$businessHour) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }


    // delete hour

    public function deleteHour(int $id)
    {

        $businessHour = BusinessHour::find($id);
        $del = [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id(),
        ];
        $businessHour->update($del);
        if (!$businessHour) :
            return response(['message' => 'Something went wrong while deleting!']);
        endif;
        return response(['message' => 'Deleted Successfully!']);
    }

    // Icon
    public function addIcon()
    {
        return view(default_template() . '.pages.defaultCompany.inc.addIconModal');
    }
    
    public function editIcon(DefaultCompany $icon)
    {
        return view(default_template() . '.pages.defaultCompany.inc.editIconModal', compact('icon'));
    }
    
    public function deleteIcon(DefaultCompany $icon)
    {
        return view(default_template() . '.pages.defaultCompany.inc.deleteIcon', compact('icon'));
    }
    
    public function getAllIcons()
    {
        return DefaultCompany::where('property','like', 'icon_'.'%' )->get();
    }

    public function storeIcon(Request $request)
    {
        $logo = DefaultCompany::where('property',$request->icon_name)->first();
        if ($request->has('icon_image')) {
            $f = $request->icon_image;
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;

            if (!file_exists(storage_path("default_company/images"))) {
                mkdir(storage_path("default_company/images"), 0777, true);
            }
            $f->move(storage_path("default_company/images") . DIRECTORY_SEPARATOR, $fileName);
            if($logo){
                return response()->json([
                    'message' => "Name Already uploaded",
                ]);
            }
            else{
                DefaultCompany::create([
                    'property' => $request->icon_name,
                    'value' => $fileName
                ]);
                return response()->json([
                    'name'          => $fileName,
                ]);
            }
        }
    }
    
    
    public function updateIcon(Request $request, DefaultCompany $icon)
    {
        if ($request->has('icon_image')) {
            $f = $request->icon_image;
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;

            if (!file_exists(storage_path("default_company/images"))) {
                mkdir(storage_path("default_company/images"), 0777, true);
            }
            $f->move(storage_path("default_company/images") . DIRECTORY_SEPARATOR, $fileName);
            $icon->value = $fileName;
            $icon->update();
            return response()->json([
                'name'          => $icon,
            ]);
        }
    }


    public function getCompanyLogo()
    {
        $checkLogo = DefaultCompany::where("property","logo")->first();
        if($checkLogo){
            $location = "default_company/images/".$checkLogo->value;

            if (file_exists(storage_path($location))) {
                return response()->file(storage_path($location));
            } else {
                throw new \Exception("File doesn't exists on the storage");
            }
        }else{
            $location = "images/noimage.png";
            if (file_exists(public_path($location))) {
                return response()->file(public_path($location));
            } else {
                throw new \Exception("File doesn't exists on the storage");
            }
        }
    }
}
