<?php

namespace App\Http\Controllers\CratesOnSkates\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\ComponentsTrait;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\OrderUpdateController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Model\{Address, Client, Order, Inventory};


class DashboardController extends Controller
{
    use ComponentsTrait;
    protected $user;
    protected $client;


    private function setAuthenticatedUser()
    {
        $this->user = auth()->user();
    }
    /**
     * Get a View of Dashboard Pages(your order, login and securtity, address,information)
     * @param Requset $request, Pagename $pagename
     * @return pages
     */
    public function dashboardPage(Request $request, $pagename)
    {
        $this->setAuthenticatedUser();
        switch ($pagename) {
            case 'yourorder':
                // dd($this->user->client->id);

                $month = 11;
                if ($request->month) {
                    $month = $request->month;
                }
                $pendingOrders = Order::where('client_id', $this->user->client->id)
                    ->where('order_status', 'pending')
                    ->where('is_deleted', 0)
                    ->where('created_at', '>=', (new \Carbon\Carbon)->startOfMonth()->submonths($month))
                    ->get();

                foreach ($pendingOrders as $key => $value) {
                    $value->createdAt =  date('dS F, h:i a', strtotime($value->created_at));
                    $value->count_item = count($value->items);
                }
                // return view of your order
                return view('frontend.cratesOnSkates.components.your_order_page', compact('pendingOrders', 'month'));
            case 'loginsecurity':
                return view('frontend.cratesOnSkates.components.login_security');
            case 'address':
                $user = $this->user;
                $addresses = $this->user->client->address;

                return view('frontend.cratesOnSkates.components.address', compact('user', 'addresses'));
            case 'personalinfo':
                $user = $this->user;

                $user_info =  collect([
                    "username" => $user->username,
                    "email" => $user->email,
                    "mobile_no" => $user->mobile_no
                ]);
                // dd($user_info);

                return view('frontend.cratesOnSkates.components.personal_information', compact('user_info'));
            default:
                return "Sorry page not found";
        }
    }

    /**
     * Get a View of Order Pages(pending orders, all orders, cancel orders)
     * @param Requset $request,  $orderpagename
     * @return order pages
     */
    public function dashboardOrderPage($orderpagename)
    {
        $this->setAuthenticatedUser();
        switch ($orderpagename) {
            case 'pendingorder':
                $month = 11;
                $pendingOrders = Order::where('client_id', $this->user->client->id)
                    ->where('order_status', 'pending')
                    ->where('is_deleted', 0)
                    ->where('created_at', '>=', (new \Carbon\Carbon)->startOfMonth()->submonths($month))
                    ->get();

                foreach ($pendingOrders as $key => $value) {
                    $value->createdAt =  date('dS F, h:i a', strtotime($value->created_at));
                    $value->count_item = count($value->items);
                }
                return view('frontend.cratesOnSkates.components.dashboard_pending_order', compact('month', 'pendingOrders'));
            case 'allorder':
                $month = 11;
                // all order of users
                $allOrders = Order::where('client_id', $this->user->client->id)
                    ->where('is_deleted', 0)
                    ->where('created_at', '>=', (new \Carbon\Carbon)->startOfMonth()->submonths($month))
                    ->get();
                foreach ($allOrders as $key => $value) {
                    $value->createdAt =  date('dS F, h:i a', strtotime($value->created_at));
                    $value->count_item = count($value->items);
                }
                return view('frontend.cratesOnSkates.components.dashboard_all_order', compact('allOrders', 'month'));

            case 'cancelorder':

                $month = 11;
                $cancelledOrders = Order::where('client_id', $this->user->client->id)
                    ->where('order_status', 'deleted')
                    ->where('is_deleted', 0)
                    ->where('created_at', '>=', (new \Carbon\Carbon)->startOfMonth()->submonths($month))
                    ->get();

                foreach ($cancelledOrders as $key => $value) {
                    $value->createdAt =  date('dS F, h:i a', strtotime($value->created_at));
                    $value->count_item = count($value->items);
                }
                return view('frontend.cratesOnSkates.components.dashboard_cancel_order', compact('cancelledOrders'));
            default:
                return "Sorry page not found";
        }
    }

    /**
     * Get a View of Order details
     * @param Requset $request
     * @return order details
     */
    public function orderDetail(Request $request)
    {
        $order = Order::where('id', $request->id)
            ->where('is_deleted', 0)
            ->first();

        $billingAddress = Address::find($order->billing_addr_id);
        $pickupAddress = Address::find($order->shipping_addr_id);

        $address = Address::where('table', 'clients')
            ->where('table_id', $order->client_id)
            ->first();

        $client = Client::where('id', $order->client_id)
            ->first();
        return view('frontend.cratesOnSkates.components.order_details', compact('order', 'address', 'client', 'billingAddress', 'pickupAddress'));
    }
    // modal
    public function dashboardModal($modalname, int $id, $date = null)
    {
        $this->setAuthenticatedUser();
        switch ($modalname) {
            case 'ordersummarymodal':
                $order = Order::find($id);


                $billingAddress = Address::find($order->billing_addr_id);
                $pickupAddress = Address::find($order->shipping_addr_id);

                $address = Address::where('table', 'clients')
                    ->where('table_id', $order->client_id)
                    ->first();

                $client = Client::where('id', $order->client_id)
                    ->first();
                return view('frontend.cratesOnSkates.components.order_summary_modal', compact('order', 'billingAddress', 'pickupAddress', 'address', 'client', 'date'));
            case 'cancelordermodal':
                $order = Order::find($id);
                return view('frontend.cratesOnSkates.components.cancel_order_modal', compact('order'));
            case 'addaddressmodal':
                $client = $this->user->client->id;
                return view('frontend.cratesOnSkates.components.add_address_modal', compact('client'));
            case 'editaddressmodal':
                $address = Address::find($id);
                return view('frontend.cratesOnSkates.components.edit_address_modal', compact('address'));
            case 'deleteaddressmodal':
                return view('frontend.cratesOnSkates.components.global_delete_modal');

            default:
                return "Sorry page not found";
        }
    }

    // extend order
    public function extendOrder(int $id, string $date)
    {
        $order = Order::find($id);
        $delivery_date = (\Carbon\Carbon::parse($order->delivery_date));
        $pick_up = (\Carbon\Carbon::parse($date));
        $created_at = (\Carbon\Carbon::parse($order->created_at));
        $delivery_pickup_date_compare = $pick_up < $delivery_date;
        // dd($delivery_pickup_date_compare);
        $date_compare = $pick_up < $created_at;
        $diff = $created_at->diffInDays($pick_up);
        if ($diff < 7) {
            return response(['message' => 'Cannot extend to negative'], 402);
        } else if ($delivery_pickup_date_compare == 'true') {
            return response(['message' => 'Please change your delivery date.'], 402);
        } elseif ($date_compare == 'true') {
            return response(['message' => 'Date cannot be extended less than ordered date.'], 402);
        }
        // $order->pickup_date = \Carbon\Carbon::parse($date)->format('Y-m-d H:i:s');
        // if ($order->package) {
        //     $order->amount = $amount;
        // }
        // $order->updated_at = date('Y-m-d H:i:s');
        // $order->useru_id = auth()->id() ?: 0;
        // $order->save();
        // }
        $ord_update_controller =  new OrderUpdateController();
        if (!is_null($order->package)) {
            $amount = $ord_update_controller->priceCalculatorWithPackageWRTPickupDate($order, $date);
        }
        $order->pickup_date = \Carbon\Carbon::parse($date)->format('Y-m-d H:i:s');
        if ($order->package) {
            $order->amount = $amount;
        }
        $order->updated_at = date('Y-m-d H:i:s');
        $order->useru_id = auth()->id() ?: 0;
        $order->save();
        $tag = 'allorder';
        if ($order->order_status === 'pending') {

            $tag = 'pendingorder';
        }

        return $this->dashboardOrderPage($tag);
    }

    // cancel order items of pending orders
    public function cancelOrderItems(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $order = Order::where('id', $request->id)->where('is_deleted', 0)->first();
            $amount = 0;
            $order->order_status = 'deleted';
            $order->updated_at = now();
            $order->save();
            foreach ($order->items as $item) {
                $inv = Inventory::find($item->inventory_id);
                // dd($inv);
                $amount += $inv->price;
                $inv->inv_hold = ($inv->inv_hold > $item->quantity) ? $inv->inv_hold - $item->quantity : 0;
                $inv->updated_at = now();
                $inv->save();
            }

            DB::commit();
            return redirect('dashboard/page/yourorder');
        } catch (\Exception $e) {
            DB::rollback();
            return response(["message" => $e->getMessage()], 500);
        }
    }



    /**
     * Store New Address
     * @param $addresses
     * @param $request
     * @return new address
     */
    public function storeNewAddress(Address $addresses, Request $request)
    {
        $this->setAuthenticatedUser();
        $client = $this->user->client->id;
        $data = $request->except(['_token']);
        $arr = [
            'table' => 'clients',
            'table_id' => $client,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $new = array_merge($data, $arr);
        $addresses->create($new);
        return $this->dashboardPage($request, 'address');
        // return response(['data' => $new], 200);
    }

    /**
     * update Address
     * @param $request
     * @param $int
     * @return updated address
     */
    public function updateAddress(Request $request, int $id)
    {
        $this->setAuthenticatedUser();
        $address = Address::find($id);
        $address->first_name = $request->first_name;
        $address->middle_name = $request->middle_name;
        $address->last_name = $request->last_name;
        $address->add1 = $request->add1;
        $address->add2 = $request->add2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->county = $request->county;
        $address->address_type = $request->address_type;
        $address->country = $request->country;
        $address->save();
        return $this->dashboardPage($request, 'address');
    }

    /**
     * default Address
     * @param $request
     * @param $int
     * @return default address
     */
    public function defaultAddress(Request $request)
    {
        // dd($request->addr_id->table_id);
        $this->setAuthenticatedUser();

        $address = Address::find($request->addr_id);
        // dd($address);
        $client_addresses = Address::where(['table' => 'clients', 'table_id' => $address->table_id, 'is_deleted' => 0])->update(['is_active' => 0]);
        $address->update(['is_active' => 1]);

        return $this->dashboardPage($request, 'address');
    }

    /**
     * Delete Address Details
     * @param int $id
     * @return address
     */
    public function deleteAddress(Request $request, $id)
    {
        $this->setAuthenticatedUser();
        $address = Address::find($id);
        $address->is_deleted = 1;
        $address->member_id = $this->user->member->id;
        $address->deleted_at = date('Y-m-d H:i:s');
        $address->save();
        return $this->dashboardPage($request, 'address');
    }

    /**
     * Update Personal Details
     * @param Request $request
     * @return updated user personal information
     */

    public function updateUserInfo(Request $request)
    {
        $this->setAuthenticatedUser();
        $this->validate($request, [
            'username' => 'required|min:4',
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($this->user->id)],
            'mobile_no' => 'required'
        ]);
        $updated = $this->user->update([
            'username' => $request->username,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no
        ]);
        if ($updated) {
            return ($this->user);
        } else {
            "Something went wrong.";
        }
    }
    /**
     * Update User Password
     * @param Request $request
     * @return updated user password
     */

    public function updatePassword(Request $request)
    {
        // dd($request->password);
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $this->setAuthenticatedUser();

        $oldPw = User::where('id', $this->user->id)->first();
        // dd($oldPw);
        if (\Hash::check($request->current_password, $oldPw->password)) {
            $oldPw->password = \Hash::make($request->password);
            $oldPw->save();
        } else {
            \Response::json(['errors' => ['current_password' => 'Current password incorrect']], 422)->send();
        }
    }
}
