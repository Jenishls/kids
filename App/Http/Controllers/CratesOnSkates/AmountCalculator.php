<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ExtrasStreetLevel;
use App\Model\PackagePrice;
use App\Model\Product;
use Carbon\Carbon;

class AmountCalculator extends CouponController
{
    protected $rentDays = 1;

    protected function getPackage($packageID){
        return PackagePrice::find($packageID);
    }

    public function totalRentalDays($pickupDate, $deliveryDate){
        return Carbon::parse($pickupDate)->diffInDays($deliveryDate);
    }

    protected function getAddons(Request $request){
        $products = [];
        if($request->product){
            $products = $this->formatter($request);
            $products = array_filter($products, function($product) use($request){
                return $product['product'] != $request->extra_products;
            });
        }
        //Add addons
        if($request->has('extra_products')){
            $products[] = [
                "product" => $request->extra_products,
                "quantity" => (int)$request->extra_product_quantity,
                "addon" => $request->extra_addon
            ];
        }
        $productArray = [];
        foreach($products as $key => $productDetailArray){
            $p = Product::with(['thumb', 'inventory'])->where('id', $productDetailArray['product'])->first();
            $p['user_quantity'] = $productDetailArray['quantity'];
            $p['addon'] = $productDetailArray['addon'];
            array_push($productArray, $p);
        }

        return $productArray;
    }

    protected function calculateSubTotal($packagePrice, $addons){
        if($addons){
            foreach($addons as $product){
                $packagePrice += $product->user_quantity * (int)$product->inventory->price * ($product->is_rental ? $this->rentDays : 1);
            }
        }
        return $packagePrice;
    }

    protected function calculateAlaCarteSubTotal($addons){    
        return array_reduce($addons, function($subTotal, $product){
            return $subTotal+= $product->user_quantity * (int)$product->inventory->price * ($product->is_rental ? $this->rentDays : 1);
        }, 0);
    }

    protected function calculateExtrasAmount(Request $request) : int{
        return array_reduce(array_unique($request->input('extras', [])), function($total, $iterator){
            $option = ExtrasStreetLevel::find($iterator);
            $total += $option->price;
            return $total;
        }, 0);
    }

    private function formatter(Request $request){
        $temp = [];
        foreach($request->product as $key => $product){
            $temp[$key] = [
                "product" => $product,
                "quantity" => (int)$request->quantity[$key],
                "addon" => $request->addon[$key]
            ];
        }
        return $temp;
    } 

}
