<?php

namespace App\Http\Controllers\CratesOnSkates;

use App\Helpers\NumberHelper;
use Illuminate\Http\Request;
use App\Model\{ExtrasStreetLevel, Inventory, ZipCode};
use App\Traits\ComponentsTrait;
use App\Traits\CratesOnSkates\AdditionalChargesTrait;
use App\Traits\CratesOnSkates\CheckoutValidations;
use Carbon\Carbon;

class CheckoutController extends AmountCalculator
{
    use ComponentsTrait, CheckoutValidations, AdditionalChargesTrait;   
    
    public $deliveryZip = null;
    public $pickupZip = null;

    public function updateSummary(Request $request, $additionalPrice = 0){
        $this->rentDays = $this->totalRentalDays($request->selected_pickup_date, $request->selected_delivery_date);        
        $package = $this->getPackage($request->package_id);
        if(!$package) return response(["message" => 'Invalid package selected'], 500);        
        $packagePrice = round($package->priceCalculatorWRTDate($request->selected_delivery_date, $request->selected_pickup_date));
        $addons = $this->getAddons($request);
        $total = $subTotal = $this->calculateSubTotal($packagePrice, $addons) + $this->calculateExtrasAmount($request);
        if($this->hasCouponApplied($request)){
            $couponValidity = $this->validateCoupon($request, $subTotal);
            if($couponValidity['validity']){
                $coupon = $this->getValidatedCoupon($couponValidity);
                $couponDiscount = ($coupon->type === "percentage") ? $coupon->value/100 * $packagePrice: $coupon->value;
                $total -= $couponDiscount;
            }else{
                return response(["message" => $couponValidity['message']], 422);
            }
        }else{
            $couponDiscount = $couponValidity = null;
        }
        // dd($this->includeTax($total)->additionalCharges());
        return response([
            "package_price" => NumberHelper::amount_format($packagePrice),
            /*
            "delivery_appartment" => NumberHelper::amount_format($request->delivery_appartment ?: 0), 
            "pickup_appartment" => NumberHelper::amount_format($request->pickup_appartment ?: 0), 
            */
            "extras" => $this->getAllExtras($request),
            "coupon" => $couponValidity ? $this->getValidatedCoupon($couponValidity) : null,
            "coupon_discount" => NumberHelper::amount_format($couponDiscount?:0),
            "rental" => $this->rentDays,
            "products" => $addons,
            "cart" => request()->has('alaCart'),
            "zipCharge" => $this->getDeliveryZipCharge() + $this->getPickupZipCharge(),
            "subtotal" => NumberHelper::amount_format($subTotal),
            "tax" => $this->includeTax($total)->taxAmount,
            "total" => NumberHelper::amount_format($total + $this->includeTax($total)->additionalCharges())
        ], 200);
    }       

    public function getAllExtras(Request $request){
        $options = [];
        foreach(array_unique($request->input('extras', [])) as $extra){
            $options[] =  ExtrasStreetLevel::find($extra);
        }   
        return $options;
    }

    public function addAddons(Request $request){
        $inventory = Inventory::where('product_id', $request->extra_products)->first();
        if(!$inventory->availableQuantity){
            return response(["message" => "Product of that quantity is not available"], 500);
        }
        $this->updateInventory($inventory, $request->extra_product_quantity);
        $totalInvPrice = $inventory->price * $request->extra_product_quantity;
        return $this->setZipCodes(
            $request->zip_delivery_charge, 
            $request->zip_pickup_charge
        )->updateSummary($request, $totalInvPrice);
    }

    public function addExtras(Request $request){
        switch(true){
            case $request->has('alaCart') :
                return $this->setZipCodes(
                    $request->zip_delivery_charge, 
                    $request->zip_pickup_charge
                )->updateAlaCarteSummary($request);
            default:
                return $this->setZipCodes(
                    $request->zip_delivery_charge, 
                    $request->zip_pickup_charge
                )->updateSummary($request);
        }
    }    

    /** @todo not updating */
    private function updateInventory($inventory, $quantity){
        $totalHold = (int)$inventory->inv_hold + (int)$quantity;
        return $inventory->update([
            'inv_hold' => $totalHold
        ]);
    } 

    /** 
     * ALA CARTE
     */
    public function updateAlaCarteSummary(Request $request){     
        if($request->has('selected_delivery_date') && $request->has('selected_pickup_date')){
            $deliveryDate = Carbon::parse($request->selected_delivery_date);
            $pickupDate = Carbon::parse($request->selected_pickup_date);
            $rentDays = $pickupDate->diffInDays($deliveryDate);
            $this->rentDays = (int) $rentDays;            
        }
        $addons = $this->getAddons($request);
        $total = $subTotal = $this->calculateAlaCarteSubTotal($addons) + $this->calculateExtrasAmount($request);
        if($this->hasCouponApplied($request)){
            $couponValidity = $this->validateCoupon($request, $subTotal);
            if($couponValidity['validity']){
                $coupon = $this->getValidatedCoupon($couponValidity);
                $couponDiscount = ($coupon->type === "percentage") ? $coupon->value/100 * $this->calculateAlaCarteSubTotal($addons) : $coupon->value;
                $total -= $couponDiscount;
            }else{
                return response(["message" => $couponValidity['message']], 422);
            }
        }else{
            $couponDiscount = $couponValidity = null;
        }

        return response([
            //"delivery_appartment" => NumberHelper::amount_format($request->delivery_appartment ?: 0), // make a helper of number format 
            //"pickup_appartment" => NumberHelper::amount_format($request->pickup_appartment ?: 0), 
            "extras" => $this->getAllExtras($request),
            "coupon" => $couponValidity ? $this->getValidatedCoupon($couponValidity) : null,
            "coupon_discount" => NumberHelper::amount_format($couponDiscount?:0),
            "rental" => $this->rentDays,
            "products" => $addons,
            "cart" => true,
            "tax" => $this->includeTax($total)->taxAmount,
            "subtotal" => NumberHelper::amount_format($subTotal + $this->zipCharges()),
            "total" => NumberHelper::amount_format($total+ $this->includeTax($total)->additionalCharges()),
        ], 200);
    }   
    
    /**
     * 
     * @todo trait checkout controoler order controler cartcontroller
     *
     * @param [type] $zip
     * @return void
     */
    // public function fetchZip($zip){
    //     return ZipCode::where('zipcode', $zip)->first();
    // }
    
    // public function setZipCodes($deliveryZip, $pickupZip){
    //     if($deliveryZip instanceof ZipCode){
    //         $this->deliveryZip = $deliveryZip;
    //     }else{
    //         $this->setDeliveryZip($deliveryZip);
    //     }

    //     if($pickupZip instanceof ZipCode){
    //         $this->pickupZip = $pickupZip;
    //     }else{
    //         $this->setPickupZip($pickupZip);
    //     }
    //     return $this;
    // }

    // public function setDeliveryZip($zipcode){
    //     $this->deliveryZip = ZipCode::find($zipcode);
    //     return $this;
    // }

    // public function setPickupZip($zipcode){
    //     $this->pickupZip = ZipCode::find($zipcode);
    //     return $this;
    // }

    // public function additionalCharges(){
    //     $total = 0;
    //     if(!is_null($this->deliveryZip)){
    //         $total += $this->deliveryZip->price;
    //     }
    //     if(!is_null($this->pickupZip)){
    //         $total += $this->pickupZip->price;
    //     }
        
    //     return $total;
    // }
}
