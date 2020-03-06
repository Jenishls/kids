<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Coupon;

class CouponController extends Controller
{
    
    private function getCoupon(Request $request) :?Coupon{
        return Coupon::where('code', $request->coupon_code)->first();        
    }

    protected function getValidatedCoupon(array $couponValidity){
        return $couponValidity['coupon'];
    }

    protected function hasCouponApplied(Request $request){
        return (bool)$request->coupon_code;
    }

    /** @todo used counts */
    protected function validateCoupon(Request $request, $subtotal){
        $coupon = $this->getCoupon($request);
        if($coupon){
            if($coupon->min_price <= $subtotal){
                return [
                    "validity" => true,
                    "coupon" => $coupon,
                    "message" => "Valid coupon"
                ];
            }else{
                return [
                    "validity" => false,
                    "message" => "$request->coupon_code minimum purchase is $coupon->min_price"
                ];
            }            
        }
        return [
            "validity" => false,
            "message" => "$request->coupon_code is not a valid coupon!"
        ];
    }
    
    protected function applyCoupon(Request $request, $subTotal){        
        return 0;
    }
}
