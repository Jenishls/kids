<?php

namespace App\Http\Controllers\Package;

use App\Model\PackagePrice;
use App\Model\PackagePriceItem;
use App\Model\PackageType;
use Auth;
use DateTime;
use App\Model\File as FileUpload;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageUpdateController extends Controller
{
    public function updatePackageStatus(PackagePrice $package){
        $package->is_active = 1;
        $package->useru_id = Auth::id();
        $package->update();
        return response()->json([
            "message" => "Package Status Updated Successfully.",
            "data" => $package
        ]); 
    }
    
    
    public function updatePackage(Request $request, PackagePrice $package){
        $package_type_id = 0;
        if(is_numeric($request->package_type_id)){
            $package_type_id = $request->package_type_id;
        }
        else{
            $package_type = new PackageType;
            $package_type->type = $request->package_type_id;
            $package_type->userc_id = Auth::id();
            $package_type->save();
            $package_type_id = $package_type->id;
        }

        $date_from  = DateTime::createFromFormat('m/d/Y', $request->date_from);
        $date_to  = DateTime::createFromFormat('m/d/Y', $request->date_to);
        
        $package->package_name = $request->package_name?:$package->package_name ;
        $package->price = $request->price?:$package->price;
        $package->dis_amt = $request->dis_amt?:$package->dis_amt;
        $package->date_from = $date_from?:$package->date_from;
        $package->date_to = $date_to?:$package->date_to;
        $package->package_type_id = $package_type_id?:$package->package_type_id;
        $package->useru_id = Auth::id();
        $package->update();
        
        if($request->inv_id){
            PackagePriceItem::where('package_price_id', $package->id)->delete();
            foreach($request->inv_id as $key=>$inv)
            {
                if($inv != 0){
                    $inv_item = new PackagePriceItem;
                    $inv_item->package_price_id = $package->id;
                    $inv_item->inv_id = $inv;
                    $inv_item->quantity = $request->qty[$key];
                    $inv_item->dis_amt = $request->dis_amt_item[$key];
                    $inv_item->dis_type = $request->dis_type[$key];
                    $inv_item->dis_rate = $request->discount[$key];
                    $inv_item->userc_id = Auth::id();
                    $inv_item->save();
                }
            }
        }        

        return response()->json([
            "message" => "Package Updated Successfully.",
            "data" => $package
        ]); 
    }

    public function updateThumb(Request $request, $package){
        $fileExtension = $request->file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("package/images"))) {
            mkdir(storage_path("package/images"), 0777, true);
        }
        $request->file->move(storage_path("package/images") . DIRECTORY_SEPARATOR, $fileName);

        $check = FileUpload::where('table_id', $package)->where('table_name', "Package_Thumb")->first();

        if(!$check){
            $file = new FileUpload;
            $file->type = $fileExtension;
            $file->file_name = $fileName;
            $file->table_name = "Package_Thumb";
            $file->table_id = $package;
            $file->userc_id = Auth::id();;
            $file->save();
            return response()->json([
                "message" => "Thumbnail Added Successfully.",
                "data" => $fileName
            ]); 
        }
        else{
            $check->type = $fileExtension;
            $check->file_name = $fileName;
            $check->useru_id = Auth::id();;
            $check->update();
            return response()->json([
                "message" => "Thumbnail Updated Successfully.",
                "data" => $fileName
            ]); 
        }
    }
}
