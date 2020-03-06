<?php

namespace App\Http\Controllers\CratesOnSkates;

use App\Events\OrderCreated;
use App\Helpers\ArrayHelper;
use App\Helpers\NumberHelper;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Model\{Address, Client, ExtrasStreetLevel, Inventory, InvoiceCoupon, InvoiceHead, InvoiceItem, InvoiceShipping, Order, OrderDiscount, OrderExtra, OrderItem, PackagePrice, Payment, Product};
use App\Services\GoogleCalendar\GoogleClient;
use Illuminate\Support\Facades\DB;
use App\Traits\ComponentsTrait;
use App\Traits\CratesOnSkates\AdditionalChargesTrait;
use App\User;

class OrderController extends PaymentController
{        
    use ComponentsTrait, AdditionalChargesTrait;

    protected $user;
    protected $client;
    
    /** Set the logged in user  */
    protected function setAuthenticatedUser(){
        $this->user = auth()->user();
    }

    public function store(OrderRequest $request){  
        $this->setAuthenticatedUser();
        try{
            $order = '';
            DB::transaction(function() use($request, &$order){    
                $this->client = $this->storeClient($request);                
                $order = $this->order($request);                
                $paymentData = $this->mapPaymentData($request, $order);               
                $paymentDetails = $this->withClient($this->client)->withRequest($request)->initPayment($paymentData);
                $this->storePayment($request, $paymentDetails, $order);
                $this->emptyCart($request);     
                $this->sendNotifications($request,$order);                
            });
            return view('frontend.cratesOnSkates.components.purchase_success', compact('order'));     
        }catch(\Exception $e){
            return response(["message" => $e->getMessage(), "line" => $e->getLine(), "file" => $e->getFile()], 500);
        }
    }

    public function order(OrderRequest $request){
        $this->rentDays = $this->totalRentalDays($request->selected_pickup_date, $request->selected_delivery_date);
        $this->setZipCodes($request->zip_delivery_charge, $request->zip_pickup_charge);
        switch(true){
            case $request->has('alaCart'):
                return $this->makeAlaCarteOrder(
                    $request,
                    $this->shippingAddress($request),
                    $this->pickupAddress($request)
                );
            default :                 
                return $this->makeOrder(
                    $request,
                    $this->shippingAddress($request),
                    $this->pickupAddress($request)
                );
        }
    }

    /**
     * Store Client
     *
     * @param Request $request
     * @return ?Client
     */
    protected function storeClient(Request $request){        
        $client = Client::where('email', $request->email)->first();
        if(!$client){
            return Client::create([
                'fname' => $request->first_name,
                'user_id' => auth()->check()? auth()->id() : null,
                'lname' => $request->last_name,
                'email' => $request->email,
                'phone_no' => $request->phone
            ]);
        }else{
            $client->update([
                'fname' => $request->first_name,
                'lname' => $request->last_name,
                'email' => $request->email,
                'phone_no' => $request->phone
            ]);
        }
        return $client;
        
    }

    /**
     * Maps Data According to Payment Geteway
     *
     * @param Request $request
     * @param [type] $order
     * @return array
     */
    protected function mapPaymentData(Request $request, $order) :array{
        return array_merge([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "city" => $request->delivery_city,
            "country" => "USA",
            "state" => $request->delivery_state,
            "amount" => NumberHelper::amount_format($order->amount + $this->includeTax($order->amount)->taxAmount),
            "inv_number" => $order->order_no,
            "des" => "Bought a package",
        ], 
        ["card" => str_replace(" ", "", $request->card)], 
        $request->only([
            'code', 'expy', 'expm','zip', 'email', 'name_per_card'
        ]));
    }

    /**
     * Store Payment Details
     *
     * @param Request $request
     * @param [type] $paymentDetails
     * @param Order $order
     * @return Payment
     */
    protected function storePayment(Request $request, $paymentDetails, Order $order){
        $transaction = $paymentDetails['data'];
        $paymentData = [
            'order_id' => $order->id,
            'payment_type' => $transaction['credit_card']['type'],
            'gateway' => "authorize.net",
            'cr_last4' => substr($transaction['credit_card']['number'], -4),
            'cr_exp_month' => $request['expy'],
            'cr_exp_year' => $request['expm'],
            'transaction_id' => $transaction['transactions'], 
            'billing_zip_code' => $request->delivery_zip,  
            'card_last_name' => $request->name_per_card ?: $this->name_per_card,
            'amount' => $transaction['amount']['total'],  
            'ref_no' => $transaction['ref_no'],
            // 'userc_id' => auth()->id()
        ];
        return Payment::create($paymentData);
    }

    public function emptyCart(Request $request){
       return app(CartController::class)->emptyCart($request);
    }
    
    /**
     * Create Address 
     *
     * @param array $data
     * @return Address
     */
    protected function address(array $data){
        return Address::create(array_merge($data, [
            'table' => 'clients',
            'table_id' => $this->client->id
        ]));        
    }
    
    /**
     * Create Shipping Address
     *
     * @param Request $request
     * @return Address
     */
    protected function shippingAddress(Request $request):Address{        
        return $this->address(
            array_merge(
                $request->only(['first_name','last_name','email','phone']),
                [
                    //@todo make a function to refactor this array
                    'city' => $request->delivery_city,
                    'state' => $request->delivery_state,
                    'zip' => $request->delivery_zip,
                    // 'country' => $request->delivery_city,
                    'add1' => $request->delivery_addr1,
                    'add2' => $request->delivery_addr2,
                    "address_type" => "shipping_billing"
                ]
            )
        );
    } 

    /**
     * Create pickup address
     *
     * @param Request $request
     * @todo refactor same as shipping address
     * @return Address
     */
    protected function pickupAddress(Request $request) : Address{       
        return $this->address(
            array_merge(
                $request->only(['first_name','last_name','email','phone']),
                [
                    //@todo make a function to refactor this array
                    'city' => $request->pickup_city,
                    'state' => $request->pickup_state,
                    'zip' => $request->pickup_zip,
                    // 'country' => $request->pickup_city,
                    'add1' => $request->pickup_addr1,
                    'add2' => $request->pickup_addr2,
                    "address_type" => "pickup"
                ]
            )
        );
    }

    /**
     * Get order number
     *
     * @todo move this to observers
     * @return string
     */
    protected function orderNo(){
        $order = Order::where('is_deleted', 0)->orderByDesc('created_at')->first();  
        if(!$order){
            return "#COS-".str_pad(1,5,0,STR_PAD_LEFT);
        }
        $iterate = (int)str_replace('#COS-', "", $order->order_no) + 1;
        return "#COS-".str_pad($iterate, 5,0,STR_PAD_LEFT);
    }

    /**
     * Create and store order
     *
     * @todo refactor the payment
     * @param Request $request
     * @param Address $shippingBilling
     * @param Address $delivery
     * @param Address $pickup
     * @return Order
     */
    protected function makeOrder(Request $request, Address $shippingBilling, Address $pickup){
        $package = $this->getPackage($request->package_id);
        if(!$package) return response(["message" => 'Invalid package selected'], 500);
        $packagePrice = round($package->priceCalculatorWRTDate($request->selected_delivery_date, $request->selected_pickup_date));
        $addons = $this->getAddons($request);
        $total = $subTotal = $this->calculateSubTotal($packagePrice, $addons) + $this->calculateExtrasAmount($request);
        if($this->hasCouponApplied($request)){
            $couponValidity = $this->validateCoupon($request, $subTotal);
            if($couponValidity['validity']){
                $coupon = $this->getValidatedCoupon($couponValidity);
                $couponDiscount = ($coupon->type === "percentage") ? $coupon->value/100 * $this->calculateSubTotal($packagePrice, $addons) : $coupon->value;
                $total -= $couponDiscount;
            }else{
                return response(["message" => $couponValidity['message']], 422);
            }
        }else{
            $couponDiscount = $coupon = $couponValidity = null;
        }
        $data = array_merge(
            $request->only([
                'delivery_date','delivery_time','pickup_time', 'delivery_note', 'pickup_date', 'pickup_note', 'package_id', 'sales_rep'
            ]),
            [
                // 'user_id' => $this->user->id,
                'client_id' => $this->client->id,
                'billing_addr_id' => $shippingBilling->id,
                'shipping_addr_id' => $shippingBilling->id,
                'pickup_addr_id' => $pickup->id,
                'order_no' => $this->orderNo(),
                'order_status' => "confirmed",
                'amount' => $total,
                'zip_delivery_charge' => $this->deliveryZip? $this->deliveryZip->price : 0,
                'zip_pickup_charge' => $this->pickupZip ? $this->pickupZip->price : 0,
                'package_amount' => $packagePrice,
                'sales_rep' => $request->sales_rep?:"",
                // 'delivery_charge' => $request->input('delivery_appartment', 0),
                // 'pickup_charge' => $request->input('pickup_appartment', 0)
            ]
        );
        $order = Order::create($data);
        $items = $this->packageAddonItems($request, $package, $order);
        $this->orderItems($order, $items);
        $this->orderDiscounts($order, $coupon, $couponDiscount);
        $this->storeExtras($request, $order);

        $order->tax()->create([
            'type' => "sales_tax",
            'tax_value' => default_company('sales_tax'),
            'tax_code' => "sales_tax",
            'applied_amount' => $this->includeTax($order->amount)->taxAmount    
        ]);

        //Create invoice
        $invoice = $this->invoice($data, $order);
        $this->invoiceItems($invoice, $items);
        $this->invoiceShippings($request, $invoice);
        $this->invoiceCoupons($invoice, $coupon, $couponDiscount);
        return $order;
    }

    protected function makeAlaCarteOrder(Request $request, Address $shippingBilling, Address $pickup){
        $addons = $this->getAddons($request);
        $total = $subTotal = $this->calculateAlaCarteSubTotal($addons) + $this->calculateExtrasAmount($request);
        if($this->hasCouponApplied($request)){
            $couponValidity = $this->validateCoupon($request, $subTotal);
            if($couponValidity['validity']){
                $coupon = $this->getValidatedCoupon($couponValidity);
                $couponDiscount = ($coupon->type === "percentage") ? $coupon->value/100 * $this->calculateAlaCarteSubTotal($addons): $coupon->value;
                $total -= $couponDiscount;
            }else{
                return response(["message" => $couponValidity['message']], 422);
            }
        }else{
            $couponDiscount = $coupon = $couponValidity = null;
        }

        $data = array_merge(
            $request->only([
                'delivery_date','delivery_time','pickup_time', 'delivery_note', 'pickup_date', 'pickup_note', 'sales_rep'
            ]),
            [
                // 'user_id' => $this->user->id,
                'client_id' => $this->client->id,
                'billing_addr_id' => $shippingBilling->id,
                'shipping_addr_id' => $shippingBilling->id,
                'pickup_addr_id' => $pickup->id,
                'order_no' => $this->orderNo(),
                'order_status' => "confirmed",
                // 'amount' => $total  + $this->includeTax($total)->additionalCharges(),
                'amount' => $total,
                'zip_delivery_charge' => $this->deliveryZip? $this->deliveryZip->price : 0,
                'zip_pickup_charge' => $this->pickupZip ? $this->pickupZip->price : 0,
                'sales_rep' => $request->sales_rep?:"",
                // 'delivery_charge' => $request->input('delivery_appartment', 0),
                // 'pickup_charge' => $request->input('pickup_appartment', 0)
            ]
        );
        $order = Order::create($data);
        $items = $this->purchasedItems($request, $order);
        $this->orderItems($order, $items);
        $this->orderDiscounts($order, $coupon, $couponDiscount);
        $this->storeExtras($request, $order);
        $order->tax()->create([
            'type' => "sales_tax",
            'tax_value' => 20,
            'tax_code' => "sales_tax",
            'applied_amount' => $this->includeTax($order->amount)->taxAmount    
        ]);
        //Create invoice
        $invoice = $this->invoice($data, $order);
        $this->invoiceItems($invoice, $items);
        $this->invoiceShippings($request, $invoice);
        $this->invoiceCoupons($invoice, $coupon, $couponDiscount);
        return $order;
    }

    public function storeExtras(Request $request, Order $order){
        $data = [];
        foreach($request->input('extras', []) as $extra){
            $option = ExtrasStreetLevel::find($extra);
            $data[] = [
                'extra_id' => $option->id,
                'order_id' => $order->id,
                'title' => $option->label,
                'price' => $option->price,
                'userc_id' => auth()->id()
            ];
        }
        return OrderExtra::insert($data);
    }

    /**
     * Store order coupon discounts
     *
     * @param Order $order
     * @param [type] $coupon
     * @param [type] $couponDiscount
     * @return OrderDiscount|null
     */
    protected function orderDiscounts(Order $order, $coupon, $couponDiscount) :?OrderDiscount{
        if(!$coupon) return null;
        return OrderDiscount::create(array_merge(
            $coupon->only('name', 'code', 'description'),
            [
                "order_id" => $order->id,
                "amount" => $couponDiscount
            ]
        ));
    }

    /** todo use ..args */
    protected function packageAddonItems(Request $request, PackagePrice $package, Order $order) :array{
        return array_merge($this->purchasedItems($request, $order), $this->packageItems($request, $package, $order));
    }

    /**
     * Get the list of purchased iitems
     *
     * @param Request $request
     * @param Order $order
     * @return array
     */
    protected function purchasedItems(Request $request, Order $order) :array{
        $orderItems = ArrayHelper::lvl1_formatter($request->all());
        $items = [];
        foreach($orderItems as $key => $item){
            if(!isset($item['product'])){
                break;
            }
            $inventory =  Product::find($item['product'])->inventory;
            $items[$key] = [
                'order_id' => $order->id,
                'inventory_id' => $inventory->id,
                'quantity' => $item['quantity'],
                'amount' => $inventory->price * ($inventory->product->is_rental ? $this->rentDays : 1),
                'is_addon' => $item['addon'] ? 1 : 0,
                'delivery_date' => date('Y-m-d', strtotime($order->delivery_date)),
                'pickup_date' => date('Y-m-d', strtotime($order->pickup_date))
            ];
        }
        return $items;
    }

    protected function packageItems(Request $request, PackagePrice $package, Order $order) :array{
        $packageItems = $package->packageItems ?? [];
        $items = [];
        foreach($packageItems as $key => $item){
            $inventory =  Inventory::find($item->inv_id);
            $items[$key] = [
                'order_id' => $order->id,
                'inventory_id' => $inventory->id,
                'amount' => $inventory->price,
                'quantity' => $item->quantity,
                'is_addon' => 0,
                'delivery_date' => date('Y-m-d', strtotime($order->delivery_date)),
                'pickup_date' => date('Y-m-d', strtotime($order->pickup_date))            
            ];
        }
        return $items;
    }

    /**
     * Store Order Items
     *
     * @param Order $order
     * @param array $items
     * @return array
     */
    protected function orderItems(Order $order, array $items = []):array{        
        OrderItem::insert($items);
        return $items;
    }

    /**
     * Create invoice head
     *
     * @param array $data
     * @param Order $order
     * @return InvoiceHead
     */
    protected function invoice(array $data, Order $order){
        $invoice = $order->invoices()->create(array_merge(
            collect($data)->only(['client_id','shipping_addr_id','pickup_addr_id', 'amount','package_id', 'package_amount'])->all(),
            [
                'invoice_no' => $this->invoiceNo(),
                'type' => "debit"
            ]   
        ));
        return $invoice;
    }

    /**
     * Invoice items formatter
     *
     * @param InvoiceHead $invoice
     * @param array $items
     * @return void
     */
    protected function invoiceItemsFormatter(InvoiceHead $invoice, array $items){
        return array_map(function($item) use($invoice){
            unset($item['order_id']);
            unset($item['is_addon']);
            $item['invoice_head_id'] = $invoice->id;
            return $item;
        }, $items);
    }

    /**
     * Stor invoice itens
     *
     * @param InvoiceHead $invoice
     * @param array $items
     * @return array
     */
    protected function invoiceItems(InvoiceHead $invoice, array $items = []) :array{         
        InvoiceItem::insert($this->invoiceItemsFormatter($invoice, $items));
        return $items;
    }

    /**
     * Store shipping charges
     *
     * @param Request $request
     * @param InvoiceHead $invoice
     * @return void
     */
    protected function invoiceShippings(Request $request, InvoiceHead $invoice){
        $shipping = collect($request->only(['delivery_appartment', 'pickup_appartment']))
                    ->filter(function($hasCharge){
                        return (bool)$hasCharge;
                    })->map(function($charge, $key) use($invoice){
                        $invoiceShippings = [
                            'invoice_head_id' => $invoice->id,
                            'name' => $key,
                            'code' => $key,
                            'amount' => $charge
                        ];
                        return $invoiceShippings;
                    })
                    ->all();
        InvoiceShipping::insert($shipping);
        return $shipping;
    }

    /** Store coupon if used any */ 
    protected function invoiceCoupons(InvoiceHead $invoice, $coupon, $couponDiscount) :?InvoiceCoupon{
        if(!$coupon) return null;
        return InvoiceCoupon::create(array_merge(
            $coupon->only('name', 'code', 'description'),
            [
                "invoice_head_id" => $invoice->id,
                "amount" => $couponDiscount
            ]
        ));
    }

    /**
     * Get Invoice number
     *
     * @return void
     */
    protected function invoiceNo(){
        $inv = InvoiceHead::where('is_deleted', 0)->orderByDesc('created_at')->first();  
        if(!$inv){
            $iterate = 1;
        }else{
            $iterate = (int)str_replace('#COS-', "", $inv->invoice_no) + 1;
        }
        return "#COS-".str_pad($iterate, 5,0,STR_PAD_LEFT);
    }    

    /**
     * Send Notifications
     *
     * @event OrderCreated 
     * @listener SendClientOrderSummaryNotification
     * @listener SendSupplierOrderSummaryNotification
     * @param Order $order
     * @return void
     */
    private function sendNotifications(Request $request, $order){ 
        $encryptedOrder = order_encrypt($order);
        $message = "Dear {$request->first_name} {$request->last_name}, thank you for ordering at cratesonskates. Please check your orders at {$request->root()}/ordersummary?os=$encryptedOrder";
        event(new OrderCreated($request, $order, $message));
    }    
}
