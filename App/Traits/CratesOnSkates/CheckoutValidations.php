<?php 

namespace App\Traits\CratesOnSkates;

use App\Http\Controllers\CratesOnSkates\CartController;
use Illuminate\Http\Request;
use App\Model\{ExtraQuestion, PackagePrice, PreferredTime, ZipCode};

trait CheckoutValidations{
    
   /** @todo Refactors */
    public function validateZip(Request $request){
        $this->validate($request, [
            'current_zip' => 'required|numeric',
            'moving_zip' => 'required|numeric'
        ], [
            'current_zip.required' => 'Moving from zip is required',
            'current_zip.numeric' => 'Moving from zip should be numeric',
            'moving_zip.required' => 'Moving to zip is required',
            'moving_zip.numeric' => 'Moving to zip should be numeric',
        ]);

        $movingFrom = ZipCode::findZip($request->current_zip);
        if(!$movingFrom)
            return response([
                "message" => "Moving from zip code not valid",
                "input_name" => "current_zip"
        ], 500);
        $movingTo = ZipCode::findZip($request->moving_zip);
        if(!$movingTo)
            return response(["message" => "Moving to zip code not valid", "input_name" => "moving_zip"], 500);
        
        $recommanded = $this->getData("products_recommanded");
        $additional = $this->getData("products_additional");
        $cartItems = request()->alaCartRequest === "true" ? 
                    json_decode(
                        app(CartController::class)
                        ->setZipCodes($movingFrom, $movingTo)
                        ->updateRentDays($request->rentedDays)
                        ->cart($request)
                        ->getContent()
                    , true)['data'] : 
                    [];
        return view('frontend.cratesOnSkates.components.checkout', [
            "user" => auth()->check() ? (auth()->user()->member ?: auth()->user()->client) : null,
            "movingFrom" => $movingFrom,
            "movingTo" => $movingTo,
            "package" => PackagePrice::find($request->package_id),
            "week" => $request->week,
            "recommanded"=>$recommanded,           
            "additional"=>$additional,
            "delivery_pref_times" => PreferredTime::where(["type" => "delivery","is_deleted" => 0])->orderBy('seq')->get(),
            "pickup_pref_times" => PreferredTime::where(["type" => "pickup","is_deleted" => 0])->orderBy('seq')->get(),
            "extras" => ExtraQuestion::where('is_deleted', 0)->get(),
            "zip_charges_excluded_price" => $cartItems ? $cartItems['zip_charges_excluded_price'] : 0,
            "cartItems" => $cartItems,
            "cartTotal" => $cartItems ? $cartItems['total'] : 0,            
        ]);  
    }

    public function validatePersonalInfo(Request $request){
        if(request()->temporary){
            $this->validate($request, [
                'temporary_first_name' =>'required',
                'temporary_last_name' =>'required',
                'temporary_email' => 'required|email',
                'temporary_phone' => 'required|between:10,11'
            ]);
        }else{
            $this->validate($request, [
                'first_name' =>'required',
                'last_name' =>'required',
                'email' => 'required|email',
                'phone' => 'required|between:10,11'
            ]);
        }        
    }

    public function validateDeliveryInfo(Request $request){
        if(request()->temporary){
            $this->validate($request, [
                "temporary_delivery_city" => 'required',
                "temporary_delivery_state" => 'required',
                "temporary_delivery_zip" => 'required|numeric|min:9999|max:99999',
                "temporary_delivery_addr1" => 'required',
                // "temporary_delivery_addr2" => 'required',
                "temporary_delivery_date" => 'required|date',
                "temporary_delivery_time" => 'required'
            ]);
        }else{
            $this->validate($request, [
                "delivery_city" => 'required',
                "delivery_state" => 'required',
                "delivery_zip" => 'required|numeric|min:9999|max:99999',
                "delivery_addr1" => 'required',
                // "delivery_addr2" => 'required',
                "delivery_date" => 'required|date',
                "delivery_time" => 'required'
            ]);
        }        
    }

    public function validatePickupInfo(Request $request){
        if(request()->temporary){
            $this->validate($request, [
                "temporary_pickup_city" => 'required',
                "temporary_pickup_city" => 'required',
                "temporary_pickup_zip" => 'required|numeric|min:9999|max:99999',
                "temporary_pickup_addr1" => 'required',
                // "temporary_pickup_addr2" => 'required',
                "temporary_pickup_date" => 'required|date',
                "temporary_pickup_time" => 'required',
            ]);
        }else{
            $this->validate($request, [
                "pickup_city" => 'required',
                "pickup_city" => 'required',
                "pickup_zip" => 'required|numeric|min:9999|max:99999',
                "pickup_addr1" => 'required',
                // "pickup_addr2" => 'required',
                "pickup_date" => 'required|date',
                "pickup_time" => 'required',
            ]);
        }
    }
}