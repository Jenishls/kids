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

class PackageStoreController extends Controller
{
    public function storePackage(Request $request){
        $package_type_id = 0;
        $image_upload = "";
        \DB::beginTransaction();
        try{
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

            $date_from  = Carbon::parse($request->date_from)->format('Y-m-d H:i:s');
            $date_to  = Carbon::parse($request->date_to)->format('Y-m-d H:i:s');
            
            $package = new PackagePrice;
            $package->package_name = $request->package_name;
            $package->price = $request->price;
            $package->dis_amt = $request->dis_amt;
            $package->date_from = $date_from;
            $package->date_to = $date_to;
            $package->package_type_id = $package_type_id;
            $package->userc_id = Auth::id();
            $package->save();
            
            if($request->inv_id){
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

            if($request->package_img){
                $image_upload = $this->uploadImage($request->package_img);
                $file = new FileUpload;
                $file->type = $request->package_img->getClientOriginalExtension();;
                $file->file_name = $image_upload;
                $file->table_name = "Package_Thumb";
                $file->table_id = $package->id;
                $file->userc_id = Auth::id();;
                $file->save();
            }

            \DB::commit();
            return response()->json([
                "message" => "Package added Successfully.",
                "data" => $package
            ]); 
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }


        return response()->json([
            "message" => "Package added Successfully.",
            "data" => $package
        ]); 
    }

    public function uploadImage($file){
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("package/images"))) {
            mkdir(storage_path("package/images"), 0777, true);
        }
        $file->move(storage_path("package/images") . DIRECTORY_SEPARATOR, $fileName);
        return $fileName;
    }
}
