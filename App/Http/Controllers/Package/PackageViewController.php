<?php

namespace App\Http\Controllers\Package;

use App\Model\Inventory;
use App\Model\PackagePrice;
use App\Model\PackageType;
use Illuminate\Support\Facades\File;
use Response;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageViewController extends Controller
{
    public function index(){
    	return view('supportNew.pages.package.index');
    }

    public function addPackage(){
        $inventories = Inventory::where('is_deleted', 0)->get();
        return view('supportNew.pages.package.modal.add', compact('inventories'));
    }
    
    public function editPackage(PackagePrice $package){
        return view('supportNew.pages.package.modal.edit', compact('package'));
    }
    
    public function editPackageOnly(PackagePrice $package){
        return view('supportNew.pages.package.modal.add', compact('package'));
    }
    
    public function editPackageStatus(PackagePrice $package){
        return view('supportNew.pages.package.modal.editStatus', compact('package'));
    }

    public function allPackageData(){
        return  PackagePrice::where('is_deleted', 0)->with('packageType')->orderBy('created_at', 'desc')->get();   
    }
    
    public function allInvData(){
        return  Inventory::where('is_deleted', 0)->with('color','size','product.brand','product.thumb')->get();   
    }
    
    public function searchItem(Request $request){
        $item = $request->item;
        if($item){
            return  Inventory::where('is_deleted', 0)->with('color','size','product.brand','product.thumb')
            ->with(['product'=> function ($query) use ($item) {
                $query->where('name', 'like', '%'.$item.'%');
            }])->get();   
        }
        else{
            return [];
        }
    }
    
    public function allPackageItemData(PackagePrice $package){
        return $package->packageItems->load('inventory.product.brand','inventory.product.thumb','inventory.size','inventory.color');   
    }

    public function packageDetail(PackagePrice $package){
    	return view('supportNew.pages.package.includes.detail', compact('package'));
    }

    public function allPackageType(Request $request){
        $search = $request->term;
        if($search == ''){
            $package_types = PackageType::where('is_deleted', 0)->select("id","type as name")->get();
        }else{
            $package_types = PackageType::where('is_deleted', 0)->select("id","type as name")->where('type', 'like', '%' .$search . '%')->get();
        }
        return  $package_types;
    }


    public function editPackageThumb($package){
        
        return view('supportNew.pages.package.includes.editThumb',
        [
            "package"=> $package
        ]);
    }

    public function viewPackageThumb($image)
    {
        $path = storage_path('package/images/' . $image);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
