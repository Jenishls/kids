<?php

namespace App\Http\Controllers\CratesOnSkates;

use App\Exceptions\MinimumCartAmountException;
use App\Helpers\NumberHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\ExtrasStreetLevel;
use App\Model\Inventory;
use App\Model\Product;
use App\Model\ZipCode;
use App\Traits\CratesOnSkates\AdditionalChargesTrait;
use Exception;

class CartController extends CartCookieController
{
    public $db;
    public $request;
    public $rentDays = 1;

    use AdditionalChargesTrait;

    public function hasCart() : bool{
        return auth()->check() ? (bool) $this->fromDB()->fetchExisitingCart()->count() : (bool) isset($_COOKIE['ala_carte']);
    }

    public function cart(Request $request){
        $carts = auth()->check() ? $this->fromDB()->fetchExisitingCart()->toArray() : $this->setRequest($request)->fetchExisitingCart();
        return response(["data" => $this->calculateCartTotals($carts, !auth()->check())], 200);
    }
    
    public function add(Request $request, Inventory $inventory){       
        return auth()->check() ? $this->cartWithAuth($request) : $this->cartWithNoAuth($request);
    }

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

    public function fetchExisitingCart(){
        if($this->db){
            return auth()->user()->carts;
        }else{
            return json_decode($this->getCookie($this->request, 'ala_carte'), true)?: [];
        }
    }

    public function cartWithAuth(Request $request){
        $inventory = Inventory::find($request->inventory_id);
        $carts = $this->userInventoryCart($request, $inventory);  
        return response(["data" => $this->calculateCartTotals($carts)]);
    }    

    public function userInventoryCart(Request $request, Inventory $inventory){
        $inventoryCart = Cart::where([
            'inventory_id' => $inventory->id,
            'user_id' => auth()->id(),
            'is_active' => 1,
            'is_deleted' => 0,
        ]) 
        ->first();
        if($inventoryCart){
            if(!$this->isAvailable($inventory, $request->quantity)){
                throw new Exception("not available", 500);
            }
            $inventoryCart->update([
                "quantity" => $request->quantity,
                "expiry_time" => 86400
            ]);
        }else{
            Cart::create(
                array_merge($request->all(), [
                    "user_id" => auth()->id(),
                    "userc_id" => auth()->id(),
                    "expiry_time" => 86400,
                    "is_active" => 1
                ])
            );
        }
        return $this->fromDB()->fetchExisitingCart()->toArray();
    }

    public function calculateCartTotals(array $carts, $cookie = false){
        return array_reduce($carts, function($totalArray, $cart) use($cookie){
            if($cookie){
                $cart['inventory'] = Inventory::where('id', $cart['inventory_id'])->with('cartProduct')->first();
            }
            $totalArray['items'][] = [
                'inventory' => $cart['inventory'],
                'quantity' => $cart['quantity']
            ];  
            return [
                "items" => $totalArray['items'],
                "zip_charges_excluded_price" => NumberHelper::amount_format(
                    $totalArray['zip_charges_excluded_price'] + (
                        $cart['inventory']['price'] * $cart['quantity'] *  
                        $this->rentalPurchaseCalculation($cart['inventory']['cart_product']?: $cart['inventory']['cartProduct'])
                    )),
                "price" => $price = NumberHelper::amount_format(
                    $totalArray['price'] + (
                        $cart['inventory']['price'] * $cart['quantity'] *  
                        $this->rentalPurchaseCalculation($cart['inventory']['cart_product']?: $cart['inventory']['cartProduct'])
                    )),
                "totalQuantity" => $qty = $totalArray['totalQuantity'] + $cart['quantity'],
                "total" => NumberHelper::amount_format(
                            $totalArray['total'] + (
                            $cart['inventory']['price'] * $cart['quantity'] *  
                            $this->rentalPurchaseCalculation($cart['inventory']['cart_product']?: $cart['inventory']['cartProduct'])
                        )),
                "tax" => $totalArray['tax']

            ];
        }, [
            "items" => [], 
            'zip_charges_excluded_price' => 0,
            "price" => $this->calculateExtrasAmount(request()) + $this->zipCharges(), 
            "totalQuantity" => 0, 
            "total" => $this->additionalCharges() + $this->calculateExtrasAmount(request()), 
            "tax" => default_company('sales_tax', 0)
            ]
        );
    }
    
    protected function calculateExtrasAmount(Request $request) : int{
        return array_reduce(array_unique($request->input('extras', [])), function($total, $iterator){
            $option = ExtrasStreetLevel::find($iterator);
            $total += $option->price;
            return $total;
        }, 0);
    }

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

    public function rentalPurchaseCalculation($product){
        $isRental = is_array($product) ? $product['is_rental'] : $product->is_rental;      
        switch(true){
            case $isRental:
                return $this->rentDays;
            default: 
                return 1;
        }
    }

    public function fromDB(){
        $this->db = true;
        return $this;
    }

    public function setRequest(Request $request){
        $this->request = $request;
        return $this;
    }

    public function cartWithNoAuth(Request $request){
        $cookieValue[] = [
            "inventory_id" => $request->inventory_id,
            "quantity" => $request->quantity
        ];
        $cookieCart = $this->setRequest($request)->fetchExisitingCart() ?: [];
        if($cookieCart){
            $updatedCart = collect(
                    array_merge([$request->all()], $cookieCart)
                )
                ->unique('inventory_id')
                ->all();           
        }else{
            $updatedCart[] = $request->all();
        }
        $cookie =  $this->setCookie($request, 'ala_carte', json_encode($updatedCart));
        return response(["data" => $this->calculateCartTotals($updatedCart, true)])->cookie($cookie);
    }

    public function isAvailable(Inventory $inventory, $requestQuantity){
        return $inventory->available_quantity >= $requestQuantity;
    }

    public function emptyCart(Request $request){
        return auth()->check() ? $this->emptyDbCart() : parent::clearCookie('ala_carte');
    }

    public function emptyDbCart(){
        return auth()->user()->carts()->update([
            "is_active" => 0
        ]);
    }

    public function remove(Request $request, Inventory $inventory){
        if(request()->has('rented_days')){
            $this->updateRentDays(request()->rented_days);
        }
        $this->setZipCodes(request()->zip_delivery_charge, request()->zip_pickup_charge);        
        $updatedCart = auth()->check() ? $this->removeFromDbCart($inventory) : parent::removeFromCookie($inventory , 'ala_carte');
        if($updatedCart){
            $cookie =  $this->setCookie(request(), 'ala_carte', json_encode($updatedCart));
            return response(["data" => $this->setZipCodes(
                $request->zip_delivery_charge, 
                $request->zip_pickup_charge
            )->calculateCartTotals($updatedCart, true)])->cookie($cookie);
        }else{
            $cookie = parent::clearCookie('ala_carte');
            return response(["data" => $this->setZipCodes(
                $request->zip_delivery_charge, 
                $request->zip_pickup_charge
            )->calculateCartTotals($updatedCart, true)]);

        }
    }

    public function removeFromDbCart(Inventory $inventory) :array{
        auth()->user()->carts()->where('inventory_id', $inventory->id)->update([
            'is_active' => 0
        ]);
        return auth()->user()->carts->toArray();
    }

    public function showCart(Request $request){
        $cart = $this->cart($request);
        $data = json_decode($cart->getContent(), true);
        return view("frontend.cratesOnSkates.pages.checkout.cart.index", [
            "cart" => $data['data']
        ]);
    }

    /**
     * Proceed to zip selector checkout
     * 
     * @throws MinimumCartAmountException     *
     * @return void
     */
    public function selectZipFromCart(){
        $cart = $this->updateRentDays(request()->rentedDays)->cart(request());
        $total = json_decode($cart->getContent(), true)['data']['total'] ?? 0;
        if((float)default_company('minimum_cart_amount') > (float)$total){            
            throw new MinimumCartAmountException(NumberHelper::amount_format(default_company('minimum_cart_amount')));
        }
        return view('frontend.cratesOnSkates.components.select-zip', [
            "alaCartRequest" => true
        ]);
    }

    /**
     * Update cart
     *
     * @throws  Exception no cart handler provided
     * @param Request $request
     * @return void
     */
    public function updateCartDecider(Request $request){
        switch(true){
            case $request->has('rented_days'):
                return $this->updateRentDays($request->rented_days)->updateCart($request);
            default : 
                throw new \Exception("no update cart handler");
        }
    }

    /**
     * Update the cart with given Request $request
     *
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request){
        return $this->cart($request);
    }

    /**
     * Update the quantity wrt to user is authenticated or not
     *
     * @param Request $request
     * @param [type] $rentedDays
     * @return void
     */
    public function updateQuantity(Request $request, $rentedDays){
        $this->updateRentDays($rentedDays);
        return auth()->check() ? $this->fromDb()->quantity($request) : $this->quantity($request);
    }

    /**
     * Update Quantity In database if $this->db is true else update the quantity in cookie
     *
     * Request $request (inventory, quantity)
     * @param Request $request
     * @return void
     */
    public function quantity(Request $request){
        switch(true){
            case $this->db === true: // Update Qty in Database
                extract($request->all());
                $cartToUpdate = auth()->user()->carts()->where('inventory_id', $inventory)->first();
                $cartToUpdate->update([
                    "quantity" => $quantity
                ]);
                return $this->setZipCodes(
                    $request->zip_delivery_charge, 
                    $request->zip_pickup_charge
                )->cart($request);
            default : 
                extract($request->all());
                $updatedCart = $this->updateCookie($inventory, $quantity, 'ala_carte');        
                $cookie =  $this->setCookie($request, 'ala_carte', json_encode($updatedCart));
                return response(["data" => $this->setZipCodes(
                    $request->zip_delivery_charge, 
                    $request->zip_pickup_charge
                )->calculateCartTotals($updatedCart, true)])->cookie($cookie);        
        }
    }

    /**
     * Set the rent days property
     *
     * @param int $days
     * @return Self
     */
    public function updateRentDays($days){
        $this->rentDays = (int) $days;
        return $this;
    }

}
