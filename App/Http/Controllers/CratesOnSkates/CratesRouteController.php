<?php

namespace App\Http\Controllers\CratesOnSkates;

use App\Model\Order;
use App\Model\Client;
use App\Model\Address;
use App\Model\PackagePrice;
use Illuminate\Http\Request;
use App\Traits\ComponentsTrait;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\OrderStoreController;
use App\Model\File;
use App\Model\SignatureLog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;

class CratesRouteController extends OrderStoreController
{
    use ComponentsTrait;
    public function index(string $slug = 'home')
    {
        // if($slug === 'cratesonskates') $slug = 'home';
        $components = $this->components(ucfirst($slug));
        // dd($components);
        $menus = $this->getMenuItems();
        // dd($menus);
        $slugs = ['home', 'contact', 'residential', 'faq', 'products', 'office', 'login', 'dashboard', 'commercial', 'register', 'ordersummary'];

        if (in_array(strtolower($slug), $slugs)) {
            if ($slug === 'home') {
                return view('frontend.cratesOnSkates.index', compact('components', 'menus'));
            } else {
                $data = $this->getData($slug);


                $suffix = "";
                if (!view()->exists('frontend.cratesOnSkates.pages.' . $slug . '.index')) {
                    $suffix = 1;
                }
                if ($slug === 'ordersummary') {                                  

                    $crypted_token = $_REQUEST['os'];
                    $orderNo = order_decrypt($crypted_token);
                    $order = Order::where('order_no', $orderNo)->first();
                    $client = Client::find($order->client_id);
                    $billingAddress = Address::find($order->billing_addr_id);
                    $pickupAddress = Address::find($order->pickup_addr_id);
                    return view('frontend.cratesOnSkates.pages.' . $slug . '.index' . $suffix, compact('components', 'menus', 'data', 'order', 'client', 'billingAddress', 'pickupAddress'));
                }
                return view('frontend.cratesOnSkates.pages.' . $slug . '.index' . $suffix, compact('components', 'menus', 'data'));
            }
        } else {
            /** This change was made to handle fake url in the front end */
            $components = [];
            return view('frontend.cratesOnSkates.index', compact('components', 'menus'));
            abort(404);
        }
    }

    public function login()
    {
        return view('frontend.cratesOnSkates.pages.login.index');
    }
    public function orderNowPage()
    {
        return view('frontend.cratesOnSkates.components.order_now');
    }
    public function packageSelect(PackagePrice $package, $week)
    {
        return view('frontend.cratesOnSkates.components.select-zip', compact('package', 'week'));
    }
    public function checkout()
    {
        return view('frontend.cratesOnSkates.components.checkout', compact("products"));
    }
    public function purchaseSuccess()
    {
        return view('frontend.cratesOnSkates.components.purchase_success', [
            'order' => Order::find(210)
        ]);
    }

    public function press()
    {
        return view('frontend.cratesOnSkates.components.press');
    }

    public function videoLibrary()
    {
        return view('frontend.cratesOnSkates.components.video-library');
    }

    public function partnerDeals()
    {
        return view('frontend.cratesOnSkates.components.partner-deals');
    }

    public function privacyAndTerms()
    {
        return view('frontend.cratesOnSkates.components.privacy_terms');
    }

    public function privacyAndTerms2()
    {
        return view('frontend.cratesOnSkates.components.privacy_terms2');
    }
    public function orderDetails()
    {
        return view('frontend.cratesOnSkates.components.order_details');
    }

    public function verifyCalendarRequest(Order $order, User $user, $statusRequest)
    {
        $menus = $this->getMenuItems();

        return view('frontend.cratesOnSkates.components.verify_password', compact('order', 'statusRequest', 'menus', 'user'));
    }
    
    public function confirmCalendarRequest(Order $order, $statusRequest)
    {
        if($statusRequest == "pickedup"){
            return view('frontend.cratesOnSkates.components.confirm_order_status', compact('order', 'statusRequest'));
        }
        else{
            return view('frontend.cratesOnSkates.components.confirm_signature_pad', compact('order', 'statusRequest'));
        }
    }
    
    public function makeDamagePayment(Order $order, $statusRequest, $amount)
    {
        return view('frontend.cratesOnSkates.components.make_payment', compact('order', 'statusRequest', 'amount'));
    }

    public function confirmationSignature(Order $order, $statusRequest)
    {
        return view('frontend.cratesOnSkates.components.confirm_signature_pad', compact('order', 'statusRequest'));
    }

    public function calendarUpdateRequest(Request $request,Order $order,User $user, $statusRequest)
    {
        $this->validate($request, [
            'password' => "required"
        ]);
        if(Hash::check($request->password, $user->password)){
            $user->createApiToken();
            return view('frontend.cratesOnSkates.components.order_delivery_status', compact('order', 'statusRequest','user'));
        }else{
            return response([
                "message" => "The given data is invalid",
                "errors" => [
                    "password" => ["The password is incorrect!"]
                ]
            ], 422);
        }
    }

    public function markedDetails(User $user, $status){
        switch(true){
            case $status === "delivered":
                return [
                    "delivery_by" => json_encode([
                        'user' => $user->id,
                        'timestamp' => Date('Y-m-d h:i:s') 
                    ])
                ];
            case $status === "pickedup":
                return [
                    "pickup_by" => json_encode([
                        'user' => $user->id,
                        'timestamp' => Date('Y-m-d h:i:s') 
                    ])
                ];
            default:
                throw new \Exception(["message" => "invalid status update"], 401);
        }
    }

    public function calendarMarkOrder(Request $request){
        $agent = new Agent();
        
        $order = Order::find($request->order);
        $user = User::find($request->user);
        if($user->api_token !== $request->api_token){
            return response(["message" => "Api token mismatch"], 401);
        }
       
        $order->update(
            array_merge([
                "order_status" => $request->status_request === "delivered" ? $request->status_request : 'picked_up',
                "useru_id" => $request->user,
                'updated_at' => now()
            ], $this->markedDetails($user, $request->status_request))
        );

        if($request->signature){
            $file = new SignatureLog();
            $file->signature = $request->signature;
            if($request->status_request === "delivered"){
                $file->type = "Delivery";
            }
            else{
                $file->type = "Pickup";
            }
            $file->order_id = $order->id;
            $file->fingerprint = request()->fingerprint();
            $file->ip = request()->ip();
            $file->operating_system = $agent->platform();
            $file->browser = $agent->browser();
            $file->device = $agent->device();
            $file->signature_by = $request->signature_by;
            $file->userc_id = Auth::id();
            $file->save();
        }

        if($request->payment_type){
            $this->make_invoice($request, $order);
            if($request->payment_type == 'cash'){
                $paymentData = $this->mapPaymentInvoiceData($request, $order);
                $this->storePaymentByCash($request, $paymentData, $order); 
            }
            else{
                $paymentData = $this->mapPaymentInvoiceData($request, $order);
                $paymentDetails = $this->withRequest($request)->withClient($order->client)->initPayment($paymentData);
                $this->storePayment($request, $paymentDetails, $order);
            }
        }
        
        return view('frontend.cratesOnSkates.components.order_delivery_status', [
            "order" => $order,
            'user' => User::find($request->user),
            'statusRequest' => $request->status_request
        ]);
    }

    public function orderSummary(Order $order)
    {
        // dd($order);
        return view('frontend.cratesOnSkates.components.order_summary', compact('order'));
    }

   
}
