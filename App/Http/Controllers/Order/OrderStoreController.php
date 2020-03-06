<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\InvoiceHead;
use App\Model\Quote;
use App\Model\Order;
use App\Model\Payment;
use App\Model\OrderItem;
use App\Model\Address;
use App\Model\Inventory;
use App\Model\InvoiceItem;
use App\Http\Controllers\CratesOnSkates\OrderController;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\Helpers\NumberHelper;
use App\Lib\ProgrammableSMS\SMSSender;
use App\Model\Note;
use App\Model\PackagePrice;
use App\Model\SmsLog;

class OrderStoreController extends OrderController
{
    // Add Order
    public function addOrder(Request $request)
    {
        \DB::beginTransaction();
        try {
            $this->client = $this->storeClient($request);
            $order = '';
            if (!$request->package_id) {
                $order = $this->makeOrderWithoutPackage(
                    $request,
                    $this->shippingAddress($request),
                    $this->pickupAddress($request)
                );
            } else {
                $order = $this->makeOrder(
                    $request,
                    $this->shippingAddress($request),
                    $this->pickupAddress($request)
                );
                if ($request->check_payment == 2) {
                    $paymentData = $this->mapPaymentData($request, $order);
                    $paymentDetails = $this->withClient($this->client)->withRequest($request)->initPayment($paymentData);
                    // $paymentDetails = $this->initPayment($paymentData);
                    $this->storePayment($request, $paymentDetails, $order);
                } else {
                    $paymentData = $this->mapPaymentData($request, $order);
                    $this->storePaymentByCash($request, $paymentData, $order);
                }
            }
            // $this->sendNotifications($request,$order);
            \DB::commit();
            return response()->json([
                "message" => "Order Added Successfully.",
                "data" => $order
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Store Payment Details
     *
     * @param Request $request
     * @param [type] $paymentDetails
     * @param Order $order
     * @return Payment
     */
    protected function storePaymentByCash(Request $request, $paymentData, Order $order)
    {
        $amount = $paymentData['amount'];
        $paymentData = [
            'order_id' => $order->id,
            'payment_type' => "Cash",
            'gateway' => "-",
            'cr_last4' => "-",
            'cr_exp_month' => null,
            'cr_exp_year' => null,
            'transaction_id' => "-",
            'billing_zip_code' => $request->delivery_zip,
            'card_last_name' => "-",
            'amount' => NumberHelper::amount_format($amount),
            'userc_id' => Auth::id(),
            'ref_no' => "-",
            // 'userc_id' => auth()->id()
        ];
        return Payment::create($paymentData);
    }

    public function addOrderItems(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            $moving_date = Carbon::parse($request->moving_date)->format('Y-m-d H:i:s');
            $pickup_date = Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s');
            foreach ($request->inv_id as $key => $inv) {
                $order_item = new OrderItem;
                $order_item->order_id = $order->id;
                $order_item->inventory_id = $inv;
                $order_item->amount = $request->item_price[$key];
                $order_item->quantity = $request->qty[$key];
                $order_item->delivery_date = $moving_date;
                $order_item->is_addon = 1;
                $order_item->pickup_date = $pickup_date;
                $order_item->userc_id = Auth::id();
                $order_item->save();
            }
            
            $inv_head = $this->make_invoice($request, $order);

            if ($request->inv_id) {
                foreach ($request->inv_id as $key => $inv) {
                    if ($inv != 0) {
                        $inv_item = new InvoiceItem;
                        $inv_item->invoice_head_id = $inv_head->id;
                        $inv_item->inventory_id = $inv;
                        $inv_item->quantity = $request->qty[$key];
                        $inv_item->amount = $request->item_price[$key] * $request->qty[$key];
                        $inv_item->userc_id = Auth::id();
                        $inv_item->save();
                    }
                }
            }

            \DB::commit();
            return response()->json([
                "message" => "Order Added Successfully.",
                "data" => $order,
                "invoice" => $order->invoices ? number_format($order->drInvoices()->sum('amount'), 2, '.', ',') : "-",
                "balance" => number_format($order->drInvoices()->sum('amount') - $order->Payments()->sum('amount'), 2, '.', ',')
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    protected function orderNo()
    {
        $order = Order::where('is_deleted', 0)->orderByDesc('created_at')->first();
        if (!$order) {
            return "#COS-" . str_pad(1, 5, 0, STR_PAD_LEFT);
        }
        $iterate = (int) str_replace('#COS-', "", $order->order_no) + 1;
        return "#COS-" . str_pad($iterate, 5, 0, STR_PAD_LEFT);
    }

    // make Payment
    public function makePayment(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            if ($request->check_payment == 2) {
                $paymentData = $this->mapPaymentInvoiceData($request, $order);
                $paymentDetails = $this->withRequest($request)->withClient($order->client)->initPayment($paymentData);
                $this->storePayment($request, $paymentDetails, $order);
            } else {
                $paymentData = $this->mapPaymentInvoiceData($request, $order);
                $this->storePaymentByCash($request, $paymentData, $order);
            }
            // $this->sendNotifications($request,$order);

            \DB::commit();
            return response()->json([
                "message" => "Payment Successfully.",
                "data" => $order,
                "invoice" => $order->invoices ? number_format($order->drInvoices()->sum('amount'), 2, '.', ',') : "-",
                "balance" => number_format($order->drInvoices()->sum('amount') - $order->Payments()->sum('amount'), 2, '.', ','),
                "payment" => $order->Payments ? number_format($order->Payments()->sum('amount'), 2, '.', ',') : "-"
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage(),"line" => $e->getLine(),"file" => $e->getFile()], 500);
        }
    }

    // map Payment
    protected function mapPaymentInvoiceData(Request $request, $order): array
    {
        $request->delivery_zip = $order->deliveryAddr ? $order->deliveryAddr->zip : "";
        return array_merge(
            [
                "first_name" => $order->client?$order->client->fname:$order->company->c_name,
                "last_name" => $order->client?$order->client->lname:"",
                "city" => $order->deliveryAddr ? $order->deliveryAddr->city : "",
                "country" => "USA",
                "state" => $order->deliveryAddr ? $order->deliveryAddr->state : "",
                "amount" => (float) NumberHelper::amount_format((float) str_replace(",", "", $request->amount)),
                "inv_number" => $order->order_no,
                "des" => "paid the Balance Invoice",
                'email' => $order->client?$order->client->email:"noemail@email.com"
            ],
            ["card" => str_replace(" ", "", $request->card)],
            $request->only([
                'code', 'expy', 'expm', 'zip', 'name_per_card'
            ])
        );
    }

    // Add Order Via Quotation
    public function makeQuoteOrder(Request $request, Quote $quote)
    {
        \DB::beginTransaction();
        try {
            $order = $this->craeteQuoteOrder(
                $request,
                $this->quoteShippingAddress($request, $quote),
                $this->quotePickupAddress($request, $quote),
                $quote
            );

            \DB::commit();
            return response()->json([
                "message" => "Order Added Successfully.",
                "data" => $order
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Create and store order from quotation
     *
     * @todo refactor the payment
     * @param Request $request
     * @param Address $shippingBilling
     * @param Address $delivery
     * @param Address $pickup
     * @return Order
     */
    protected function craeteQuoteOrder(Request $request, Address $shippingBilling, Address $pickup, $quote)
    {
        $total = $quote->quoteItems()->sum('estimate_price');
        $couponDiscount = $coupon = $couponValidity = null;
        if ($quote->supplier_type == "companies") {
            $data = array_merge(
                $request->only([
                    'delivery_date', 'delivery_time', 'pickup_time', 'delivery_note', 'pickup_date', 'pickup_note', 'package_id', 'sales_rep'
                ]),
                [
                    'company_id' => $quote->supplier_id,
                    'billing_addr_id' => $shippingBilling->id,
                    'shipping_addr_id' => $shippingBilling->id,
                    'pickup_addr_id' => $pickup->id,
                    'order_no' => $this->orderNo(),
                    'order_status' => 'converted',
                    'amount' => $total,
                    'package_amount' => $total,
                    'sales_rep' => $request->sales_rep ?: "",
                    'delivery_charge' => $request->input('delivery_appartment', 0),
                    'pickup_charge' => $request->input('pickup_appartment', 0)
                ]
            );
        } else {
            $data = array_merge(
                $request->only([
                    'delivery_date', 'delivery_time', 'pickup_time', 'delivery_note', 'pickup_date', 'pickup_note', 'package_id', 'sales_rep'
                ]),
                [
                    'client_id' => $quote->supplier_id,
                    'billing_addr_id' => $shippingBilling->id,
                    'shipping_addr_id' => $shippingBilling->id,
                    'pickup_addr_id' => $pickup->id,
                    'order_no' => $this->orderNo(),
                    'amount' => $total,
                    'package_amount' => $total,
                    'order_status' => 'converted',
                    'sales_rep' => $request->sales_rep ?: "",
                    'delivery_charge' => $request->input('delivery_appartment', 0),
                    'pickup_charge' => $request->input('pickup_appartment', 0)
                ]
            );
        }
        $order = Order::create($data);
        $this->orderQuoteItems($order, $quote->quoteItems);

        //Create invoice
        // $invoice = $this->invoice($data, $order);
        $invoice = $this->reInvoice($data, $order, $quote);
        $this->quoteInvoiceItems($invoice, $quote->quoteItems);
        $this->invoiceShippings($request, $invoice);
        return $order;
    }

    public function orderQuoteItems($order, $items)
    {
        foreach ($items as $inv) {
            $inventory = Inventory::where('product_id', $inv->product_id)->where('color_id', $inv->color_id)->where('size_id', $inv->size_id)->first();
            if ($inventory) {
                $order_item = new OrderItem;
                $order_item->order_id = $order->id;
                $order_item->inventory_id = $inventory->id;
                $order_item->amount = $inv->actual_price;
                $order_item->quantity = $inv->total_quantity;
                $order_item->delivery_date = $order->delivery_date;
                $order_item->pickup_date = $order->pickup_date;
                $order_item->userc_id = Auth::id();
                $order_item->save();
            }
        }
    }

    public function quoteInvoiceItems($inv_head, $items)
    {
        foreach ($items as $item) {
            $inventory = Inventory::where('product_id', $item->product_id)->where('color_id', $item->color_id)->where('size_id', $item->size_id)->first();
            if ($inventory) {
                $inv_item = new InvoiceItem;
                $inv_item->invoice_head_id = $inv_head->id;
                $inv_item->inventory_id = $inventory->id;
                $inv_item->quantity = $item->total_quantity;
                $inv_item->amount = $item->actual_price * $item->total_quantity;
                $inv_item->userc_id = Auth::id();
                $inv_item->save();
            }
        }
    }

    public function quoteShippingAddress(Request $request, Quote $quote)
    {
        if ($quote->supplier_type == "companies") {
            return Address::create([
                'city' => $request->delivery_city,
                'state' => $request->delivery_state,
                'zip' => $request->delivery_zip,
                // 'country' => $request->delivery_city,
                'add1' => $request->delivery_addr1,
                'add2' => $request->delivery_addr2,
                "address_type" => "shipping_billing",
                'table' => 'company',
                'table_id' => $quote->supplier_id
            ]);
        } else {
            return Address::create([
                'city' => $request->delivery_city,
                'state' => $request->delivery_state,
                'zip' => $request->delivery_zip,
                // 'country' => $request->delivery_city,
                'add1' => $request->delivery_addr1,
                'add2' => $request->delivery_addr2,
                "address_type" => "shipping_billing",
                'table' => 'clients',
                'table_id' => $quote->supplier_id
            ]);
        }
    }

    public function quotePickupAddress(Request $request, Quote $quote)
    {
        if ($quote->supplier_type == "companies") {
            return Address::create([
                'city' => $request->delivery_city,
                'state' => $request->delivery_state,
                'zip' => $request->delivery_zip,
                // 'country' => $request->delivery_city,
                'add1' => $request->delivery_addr1,
                'add2' => $request->delivery_addr2,
                "address_type" => "shipping_billing",
                'table' => 'company',
                'table_id' => $quote->supplier_id
            ]);
        } else {
            return Address::create([
                'city' => $request->delivery_city,
                'state' => $request->delivery_state,
                'zip' => $request->delivery_zip,
                // 'country' => $request->delivery_city,
                'add1' => $request->delivery_addr1,
                'add2' => $request->delivery_addr2,
                "address_type" => "pickup",
                'table' => 'clients',
                'table_id' => $quote->supplier_id
            ]);
        }
    }

    public function reInvoice($data, $order, $quote)
    {
        $invoice = InvoiceHead::where('quot_id', $quote->id)->first();
        $invoice->order_id = $order->id;
        $invoice->shipping_addr_id = $data['shipping_addr_id'];
        $invoice->pickup_addr_id = $data['pickup_addr_id'];
        $invoice->is_proforma = 1;
        $invoice->amount = $invoice->amount + $data['delivery_charge'] + $data['pickup_charge'];
        $invoice->userc_id = Auth::id();
        $invoice->update();
        return $invoice;
    }

    public function sms(Request $request)
    {
        $this->validate($request, [
            "phone_number" => "required"
        ]);

        if (default_company('send_reservation_sms') && default_company('send_reservation_sms') !== "true") {
            return response()->json(['message' => 'Send sms feature has been turned off'], 401);
        }

        $sms = new SMSSender(default_company('sms_sid'), default_company('sms_auth_token'));
        $response = $sms->sendSms(
            default_company('default_phone_code') . $request->phone_number,
            default_company('sms_phone_number'),
            $request->message
        );
        $res = json_decode($response, true);

        if ($res['status'] === 400 || $res['status'] === 500 || $res['status'] === 401) {
            SmsLog::create(
                array_merge([
                    "user_id" => auth()->id(),
                    "is_sent" => 0,
                    "error" => $res['message'],
                    "userc_id" => auth()->id(),
                    "created_at" => now()
                ], $request->all())
            );
            return $res['message'];
        }

        return SmsLog::create(
            array_merge([
                "user_id" => auth()->id(),
                "is_sent" => 1,
                "userc_id" => auth()->id(),
                "created_at" => now()
            ], $request->all())
        );
    }

    protected function makeOrderWithoutPackage(Request $request, Address $shippingBilling, Address $pickup)
    {
        $data = array_merge(
            $request->only([
                'delivery_date', 'delivery_time', 'pickup_time', 'delivery_note', 'pickup_date', 'pickup_note', 'package_id', 'sales_rep'
            ]),
            [
                // 'user_id' => $this->user->id,
                'client_id' => $this->client->id,
                'billing_addr_id' => $shippingBilling->id,
                'shipping_addr_id' => $shippingBilling->id,
                'pickup_addr_id' => $pickup->id,
                'order_no' => $this->orderNo(),
                'amount' => 0,
                'package_amount' => 0,
                'order_status' => "confirmed",
                'sales_rep' => $request->sales_rep ?: "",
                'delivery_charge' => $request->input('delivery_appartment', 0),
                'pickup_charge' => $request->input('pickup_appartment', 0)
            ]
        );
        $order = Order::create($data);
        return $order;
    }

    // Note
    public function storeNote(Request $request, Order $order)
    {
        Note::create([
            'title' => $request->title ?: '',
            'description' => $request->description,
            'table' => 'Order',
            'table_id' => $order->id,
            'userc_id' => auth()->user()->id
        ]);
        return view(default_template() . '.pages.order.includes.notes_data_template', compact('order'));
    }
    
    // Add Package
    public function addPackage(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try{
        $package = PackagePrice::find($request->package_id);
        $order->delivery_date = Carbon::parse($request->moving_date)->format('Y-m-d H:i:s');
        $order->pickup_date = Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s');
        $order->package_id = $request->package_id;
        $order->package_amount = $package->price;
        $order->amount = $package->price;
        $order->update();

        $this->addPackageOrderItems($request, $package, $order);
        $this->addPackageInvoice($request, $package, $order);
        
        if($request->check_payment){
            $this->makePayment($request, $order);
        }
        \DB::commit();
            return response()->json([
                "message" => "Payment Successfully.",
                "data" => $order,
                "package" => $order->package,
                "invoice" => $order->invoices?number_format($order->drInvoices()->sum('amount'), 2, '.', ','):"-",
                "balance" => number_format($order->drInvoices()->sum('amount') - $order->Payments()->sum('amount'), 2, '.', ','),
                "payment" => $order->Payments?number_format($order->Payments()->sum('amount'), 2, '.', ','):"-"
            ]); 
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }
    
    public function addPackageOrderItems(Request $request, $package, $order)
    {
        foreach($package->packageItems as $inv){
            $order_item = new OrderItem;
            $order_item->order_id = $order->id;
            $order_item->inventory_id = $inv->inv_id;
            $order_item->amount = $inv->inventory->price;
            $order_item->quantity = $inv->quantity;
            $order_item->delivery_date = Carbon::parse($request->moving_date)->format('Y-m-d H:i:s');
            $order_item->is_addon = 0;
            $order_item->pickup_date = Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s');
            $order_item->userc_id = Auth::id();
            $order_item->save();
        }

    }
    public function addPackageInvoice(Request $request, $package, $order)
    {
        $inv_head = new InvoiceHead;
        $inv_head->order_id = $order->id;
        $inv_head->client_id = $order->client_id;
        $inv_head->invoice_no = $this->orderNo();
        $inv_head->package_amount = $package->price;
        $inv_head->amount = $package->price;
        $inv_head->type = "debit";
        $inv_head->userc_id = Auth::id();
        $inv_head->save();

        foreach($package->packageItems as $inv)
        {
            $inv_item = new InvoiceItem;
            $inv_item->invoice_head_id = $inv_head->id;
            $inv_item->inventory_id = $inv->inv_id;
            $inv_item->quantity = $inv->quantity;
            $inv_item->amount = $inv->inventory->price * $inv->quantity;
            $inv_item->userc_id = Auth::id();
            $inv_item->save();
        }
    }

    public function make_invoice($request, $order){
        if($request->price){
            $amount = $request->price;
        }
        elseif($request->amount){
            $amount = $request->amount;
        }
        $inv_head = new InvoiceHead;
        $inv_head->order_id = $order->id;
        $inv_head->client_id = $order->client_id;
        $inv_head->invoice_no = $this->orderNo();
        $inv_head->package_amount = $order->package ? $order->package->price : $request->price;
        $inv_head->amount = (float)$amount;
        $inv_head->type = "debit";
        $inv_head->userc_id = Auth::id();
        $inv_head->save();
        return $inv_head;
    }



}
