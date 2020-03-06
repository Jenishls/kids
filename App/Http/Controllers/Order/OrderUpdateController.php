<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Address;
use App\Model\OrderItem;
use App\Model\InvoiceHead;
use App\Model\InvoiceItem;
use App\Model\Note;
use DateTime;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\Order\OrderStoreController;

class OrderUpdateController extends OrderStoreController
{
    public function UpdatePickup(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            $old_date = $order->pickup_date;
            $d  = Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s');
            $order->pickup_date = $d;
            $order->useru_id = Auth::id();
            $order->update();

            $pickup_addr = Address::find($order->pickup_addr_id);
            if ($pickup_addr) {
                $pickup_addr->add1 = $request->add1 ?: $pickup_addr->add1;
                $pickup_addr->add2 = $request->add2 ?: $pickup_addr->add2;
                $pickup_addr->city = $request->city ?: $pickup_addr->city;
                $pickup_addr->county = $request->county ?: $pickup_addr->county;
                $pickup_addr->state = $request->state ?: $pickup_addr->state;
                $pickup_addr->country = $request->country ?: $pickup_addr->country;
                $pickup_addr->zip = $request->zip ?: $pickup_addr->zip;
                $pickup_addr->update();
            }

            if (new DateTime($old_date) > new DateTime($d)) {
                $this->refundInvoice($request, $old_date, $order);
            } else {
                $this->addInvoice($request, $order);
                if ($request->check_payment) {
                    $this->makePayment($request, $order);
                }
            }

            \DB::commit();
            return response()->json([
                "message" => "Pick Information Updated Successfully.",
                "data" => $order,
                "pickup_addr" => $order->pickupAddr,
                "invoice" => $order->invoices ? number_format($order->drInvoices()->sum('amount'), 2, '.', ',') : "-",
                "balance" => number_format($order->drInvoices()->sum('amount') - $order->Payments()->sum('amount'), 2, '.', ',')
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function UpdateMoving(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            $old_date = $order->delivery_date;
            $d  = Carbon::parse($request->delivery_date)->format('Y-m-d H:i:s');
            $order->delivery_date = $d;
            $order->useru_id = Auth::id();
            $order->update();

            $shipping_addr = Address::find($order->shipping_addr_id);
            if ($shipping_addr) {
                $shipping_addr->add1 = $request->add1 ?: $shipping_addr->add1;
                $shipping_addr->add2 = $request->add2 ?: $shipping_addr->add2;
                $shipping_addr->city = $request->city ?: $shipping_addr->city;
                $shipping_addr->county = $request->county ?: $shipping_addr->county;
                $shipping_addr->state = $request->state ?: $shipping_addr->state;
                $shipping_addr->country = $request->country ?: $shipping_addr->country;
                $shipping_addr->zip = $request->zip ?: $shipping_addr->zip;
                $shipping_addr->update();
            }

            if (new DateTime($old_date) < new DateTime($d)) {
                $this->refundInvoice($request, $old_date, $order);
            } else {
                $this->addInvoice($request, $order);
                if ($request->check_payment) {
                    $this->makePayment($request, $order);
                }
                \DB::commit();
                return response()->json([
                    "message" => "Moving Information Updated Successfully.",
                    "data" => $order,
                    "moving_addr" => $order->shippingAddr,
                    "invoice" => $order->invoices ? number_format($order->invoices()->sum('amount'), 2, '.', ',') : "-",
                    "balance" => number_format($order->invoices()->sum('amount') - $order->Payments()->sum('amount'), 2, '.', ',')
                ]);
            }
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function addInvoice(Request $request, $order)
    {
        \DB::beginTransaction();
        try {
            $adson_amt = 0;
            $amount = 0;
            if ($request->item_price) {
                foreach ($request->item_price as $key => $amt) {
                    $adson_amt +=  $amt * $request->qty[$key];
                }
            }
            if ($request->new_pickup_date) {
                if ($order->package) {
                    $amount = $this->priceCalculatorWithPackageWRTPickupDate($order, $request->new_pickup_date);
                }
            } elseif ($request->new_moving_date) {
                if ($order->package) {
                    $amount = $this->priceCalculatorWithPackageWRTMovingDate($order, $request->new_moving_date);
                }
            }
            $inv_head = new InvoiceHead;
            $inv_head->order_id = $order->id;
            $inv_head->client_id = $order->client_id;
            $inv_head->invoice_no = $this->orderNo();
            $inv_head->package_amount = $order->package ? $order->package->price : 0;
            $inv_head->amount = $amount + ($adson_amt * $request->days);
            $inv_head->type = "debit";
            $inv_head->userc_id = Auth::id();
            $inv_head->save();

            if ($request->inv_id) {
                foreach ($request->inv_id as $key => $inv) {
                    if ($inv != 0) {
                        $inv_item = new InvoiceItem;
                        $inv_item->invoice_head_id = $inv_head->id;
                        $inv_item->inventory_id = $inv;
                        $inv_item->quantity = $request->qty[$key];
                        $inv_item->amount = $request->item_price[$key];
                        $inv_item->userc_id = Auth::id();
                        $inv_item->save();
                    }
                }
            }
            if ($order->package) {
                foreach ($order->package->packageItems as $item) {
                    $inv_item = new InvoiceItem;
                    $inv_item->invoice_head_id = $inv_head->id;
                    $inv_item->inventory_id = $item->inventory->id;
                    $inv_item->quantity = $item->quantity;
                    $inv_item->amount = $item->inventory->price;
                    $inv_item->userc_id = Auth::id();
                    $inv_item->save();
                }
            }

            \DB::commit();
            return response()->json([
                "message" => "Order Exteded Successfully.",
                "data" => $inv_head
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function refundInvoice(Request $request, $old_date, $order)
    {
        \DB::beginTransaction();
        try {
            $adson_amt = 0;
            $amount = 0;
            if ($request->item_price) {
                foreach ($request->item_price as $key => $amt) {
                    $adson_amt +=  $amt * $request->qty[$key];
                }
            }
            if ($request->new_pickup_date) {
                if ($order->package) {
                    $amount = $this->refundPickupPriceCalculatorWRTDate($order, $old_date, $request->new_pickup_date);
                }
            } elseif ($request->new_moving_date) {
                if ($order->package) {
                    $amount = $this->refundMovingPriceCalculatorWRTDate($order, $old_date, $request->new_moving_date);
                }
            }

            $inv_head = new InvoiceHead;
            $inv_head->order_id = $order->id;
            $inv_head->client_id = $order->client_id;
            $inv_head->invoice_no = $this->orderNo();
            $inv_head->package_amount = $order->package ? $order->package->price : 0;
            $inv_head->amount = $amount + ($adson_amt * $request->days);
            $inv_head->type = "credit";
            $inv_head->userc_id = Auth::id();
            $inv_head->save();

            if ($request->inv_id) {
                foreach ($request->inv_id as $key => $inv) {
                    if ($inv != 0) {
                        $inv_item = new InvoiceItem;
                        $inv_item->invoice_head_id = $inv_head->id;
                        $inv_item->inventory_id = $inv;
                        $inv_item->quantity = $request->qty[$key];
                        $inv_item->amount = $request->item_price[$key];
                        $inv_item->userc_id = Auth::id();
                        $inv_item->save();
                    }
                }
            }
            if ($order->package) {
                foreach ($order->package->packageItems as $item) {
                    $inv_item = new InvoiceItem;
                    $inv_item->invoice_head_id = $inv_head->id;
                    $inv_item->inventory_id = $item->inventory->id;
                    $inv_item->quantity = $item->quantity;
                    $inv_item->amount = $item->inventory->price * $item->quantity;
                    $inv_item->userc_id = Auth::id();
                    $inv_item->save();
                }
            }

            \DB::commit();
            return response()->json([
                "message" => "Order Refund Successfully.",
                "data" => $inv_head
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    // Extend with package ad new moving date
    public function priceCalculatorWithPackageWRTMovingDate($order, $new_moving_date)
    {
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_moving_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime3->diff($datetime2);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
        $amount = 0;
        $package_amt = $order->package->price;
        $new_days = $new_days - $days;
        if ((int) $new_days > 7) {
            $days = $days - 7;
            $package_amt = $order->package->price + (($days / 7) * ($order->packag->price / 2)); //(50% off) 
        }
        return $package_amt;
    }

    // Extend calculator fro pickup date
    public function priceCalculatorWithPackageWRTPickupDate($order, $new_pickup_date)
    {
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_pickup_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime1->diff($datetime3);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
        $amount = 0;
        $package_amt = $order->package->price;
        $new_days = $new_days - $days;
        foreach ($order->addOnItems as $item) {
            $amount += $item->amount * $item->quantity;
        }
        if ((int) $new_days > 7) {
            $days = $days - 7;
            $package_amt = $order->package->price + (($days / 7) * ($order->package->price / 2)); //(50% off) 
        }
        return $package_amt + ($amount * $new_days);
    }

    // refund calculator fro pickup date
    public function refundPickupPriceCalculatorWRTDate($order, $old_date, $new_pickup_date)
    {
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($old_date);
        $datetime3 = new DateTime($new_pickup_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime1->diff($datetime3);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
        $amount = 0;
        $addsONAmount = 0;

        if ($order->package) {
            if ((int) $new_days > 7) {
                $new_days = $days - $new_days;
                $amount = (($order->package->price / $days) * $new_days / 2); //(50% off) 
            } else {
                $new_days = 7 - $new_days;
                $full_ref_amt = ($order->package->price / $days) * $new_days;
                $amount = $full_ref_amt + (($order->package->price / $days) * ($days - 7) / 2);
            }
            $new_days = $days - $new_days;
            foreach ($order->addOnItems as $item) {
                $addsONAmount += $item->amount * $item->quantity;
            }
        } else {
            $new_days = $days - $new_days;
            foreach ($order->addOnItems as $item) {
                $addsONAmount += $item->amount * $item->quantity;
            }
        }

        return $amount + ($addsONAmount * $new_days);
    }

    // refund calculator for moving date
    public function refundMovingPriceCalculatorWRTDate($order, $old_date, $new_moving_date)
    {
        $datetime1 = new DateTime($old_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_moving_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime3->diff($datetime2);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
        $amount = 0;
        $addsONAmount = 0;

        if ($order->package) {
            if ((int) $new_days > 7) {
                if ((int) $new_days > (int) $days) {
                    $new_days = $new_days - $days;
                } else {
                    $new_days = $days - $new_days;
                }
                $amount = (($order->package->price / $days) * $new_days / 2); //(50% off) 
            } else {
                $new_days = 7 - $new_days;
                $full_ref_amt = ($order->package->price / $days) * $new_days;
                $amount = $full_ref_amt + (($order->package->price / $days) * ($days - 7) / 2);
            }
            $new_days = $days - $new_days;
            foreach ($order->addOnItems as $item) {
                $addsONAmount += $item->amount * $item->quantity;
            }
        } else {
            $new_days = $days - $new_days;
            foreach ($order->addOnItems as $item) {
                $addsONAmount += $item->amount * $item->quantity;
            }
        }
        return $amount + ($addsONAmount * $new_days);
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

    // Order pickup
    public function pickupOrderItems(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            $old_pickup_date = $order->pickup_date;
            $new_pickup_date  = date('Y-m-d H:i:s');

            if ($old_pickup_date > $new_pickup_date) {
                $d = OrderItem::whereIn('id', $request->checked_order_items)
                    ->with('inventory')
                    ->get(['id', 'inventory_id', 'quantity', 'pickup_date', 'is_refund'])
                    ->each(function ($orderItem) use ($new_pickup_date) {
                        $inv_qty = $orderItem->inventory->quantity + $orderItem->quantity;
                        $orderItem->inventory->update(['quantity' => $inv_qty]);
                        $orderItem->pickup_date = $new_pickup_date;
                        $orderItem->is_refund =  1;
                        $orderItem->update();
                    });
            } else {
                OrderItem::whereIn('id', $request->checked_order_items)
                    ->with('inventory')
                    ->get(['inventory_id', 'pickup_date'])
                    ->each(function ($orderItem) use ($new_pickup_date) {
                        $inv_qty = $orderItem->inventory->quantity + $orderItem->quantity;
                        $orderItem->inventory->update(['quantity' => $inv_qty]);
                        $orderItem->update(['pickup_date' => $new_pickup_date]);
                    });
            }

            // if($old_pickup_date > $new_pickup_date){
            //     $this->refundInvoice($request, $order);
            // }

            \DB::commit();
            return response()->json([
                "message" => "Items pickup Successfully.",
                "data" => $order
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    // Order Delete
    public function deleteOrder(Order $order)
    {
        \DB::beginTransaction();
        try {
            $old_moving_date = new DateTime($order->delivery_date);
            $new_moving_date  = new DateTime(Carbon::today()->toDateString());
            if ($new_moving_date < $old_moving_date) {
                $interval = $new_moving_date->diff($old_moving_date);
                $days = $interval->format('%a'); //(days diff)
                $order->is_deleted = 1;
                $order->update();
                if ($days > 2) {
                    $this->refundInvoiceWithMovingDateOnly($new_moving_date, $order);
                }
            } else {
                return response()->json([
                    "message" => "Order Cannot be Deleted.",
                    "data" => $order
                ]);
            }

            \DB::commit();
            return response()->json([
                "message" => "Order Deleted Successfully.",
                "data" => $order
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function refundInvoiceWithMovingDateOnly($new_moving_date, $order)
    {
        \DB::beginTransaction();
        try {
            $inv_head = new InvoiceHead;
            $inv_head->order_id = $order->id;
            $inv_head->client_id = $order->client_id;
            $inv_head->invoice_no = $this->orderNo();
            $inv_head->package_amount = $order->package->price;
            $inv_head->amount = $order->amount;
            $inv_head->type = "credit";
            $inv_head->userc_id = Auth::id();
            $inv_head->save();

            foreach ($order->items as $item) {
                $inv_item = new InvoiceItem;
                $inv_item->invoice_head_id = $inv_head->id;
                $inv_item->inventory_id = $item->inventory_id;
                $inv_item->quantity = $item->quantity;
                $inv_item->amount = $item->amount;
                $inv_item->userc_id = Auth::id();
                $inv_item->save();
            }

            \DB::commit();
            return response()->json([
                "message" => "Order Refund Successfully.",
                "data" => $inv_head
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    // Order Update
    public function updateStatus(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            if ($request->status == "deleted") {
                $order->order_status = $request->status;
                $order->is_deleted = 1;
                $order->update();
            } elseif ($request->status == "picked_up") {
                $order->order_status = $request->status;
                $order->pickup_by = json_encode([
                    'user' => auth()->id(),
                    'timestamp' => Date('Y-m-d h:i:s')
                ]);
                $order->update();
            } elseif ($request->status == "delivered") {
                $order->order_status = $request->status;
                $order->delivery_by = json_encode([
                    'user' => auth()->id(),
                    'timestamp' => Date('Y-m-d h:i:s')
                ]);
                $order->update();
            } else {
                $order->order_status = $request->status;
                $order->update();
            }
            \DB::commit();
            return response()->json([
                "message" => "Order Updated Successfully.",
                "data" => $order,
                "pickup" => $order->pickup_by ? get_user_name_by_id(json_decode($order->pickup_by)->user) : "",
                "delivery" => $order->delivery_by ? get_user_name_by_id(json_decode($order->delivery_by)->user) : ""
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    // Order Update
    public function updateOrder(Request $request, Order $order)
    {
        \DB::beginTransaction();
        try {
            if ($order->client) {
                $full_name = explode(" ", $request->name);
                if (count($full_name) == 2) {
                    $order->client->fname = $full_name[0];
                    $order->client->lname = $full_name[1];
                } elseif (count($full_name) == 3) {
                    $order->client->fname = $full_name[0];
                    $order->client->mname = $full_name[1];
                    $order->client->lname = $full_name[2];
                } elseif (count($full_name) == 1) {
                    $order->client->fname = $full_name[0];
                }
                $order->client->phone_no = $request->phone;
                $order->client->email = $request->email;
                $order->client->update();
            } else {
                $order->company->c_name = $request->name;
                $order->company->update();
                if ($order->company->account) {
                    if ($order->company->account->contact) {
                        $order->company->account->contact->email = $request->email;
                        $order->company->account->contact->phone_no = $request->phone;
                        $order->company->account->contact->update();
                    }
                }
            }

            if ($request->sales_rep == 000 || !is_numeric((int) $request->sales_rep)) {
                $order->sales_rep = 000;
            } else {
                $order->sales_rep = $request->sales_rep;
            }
            $order->update();

            \DB::commit();
            return response()->json([
                "message" => "Order Updated Successfully.",
                "data" => $order,
                "sales_rep" => $order->sales_representative
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    // Note
    /**
     * Update CLient notes
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateNote(Request $request, int $id)
    {
        $note = Note::find($id);
        $note->update([
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ]);
        $order = Order::find($note->table_id);
        return view(default_template() . '.pages.order.includes.notes_data_template', compact('order'));
    }

    public function deleteNote(Note $note)
    {
        $note->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0,
        ]);
        $order = Order::find($note->table_id);
        return view(default_template() . '.pages.order.includes.notes_data_template', compact('order'));
    }
}
