<?php

namespace App\Http\Controllers\Package;

use App\Model\PackagePrice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageDeleteController extends Controller
{
    public function deletePackage(PackagePrice $package){
        $package->is_deleted = 1;
        $package->update();
        return response()->json([
            "message" => "Package Deleted Successfully.",
            "data" => $package
        ]); 
    }
}
