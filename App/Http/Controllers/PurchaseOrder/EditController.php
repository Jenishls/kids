<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Model\POItem;
use App\Model\Company;
use App\Model\Product;
use App\Model\Inventory;
use App\Model\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class EditController extends PurchaseOrderController
{
    public function editModal(int $id)
    {
        $order = PurchaseOrder::find($id);
        $company = Company::find($order->supplier_id);
        return view(default_template() . ".pages.purchase-orders.edit.po-edit-modal", compact('company', 'order'));
    }

    /**
     * Update Purchase order/Invoice
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updatePurchaseOrder(Request $request, int $id)
    {
        // dd($request->all());
        $rules = validation_value('editInvoiceForm');
        $this->validate($request, $rules);
        $order = PurchaseOrder::find($id);
        // dd($order->poItems);
        $old_items = [];
        foreach ($order->poItems as $key => $value) {
            array_push($old_items, $value->id);
        }
        $order->update([
            'delivery_date' => Carbon::parse($request->exp_date)->format('Y-m-d'),
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
            'status' => $request->status,
        ]);
        $product_ids = array_reverse($request->product_id);
        $qtys = array_reverse($request->qty);
        $q_amts = array_reverse($request->quoted_amt);
        $b_amts = array_reverse($request->billed_amt);
        $a_amts = array_reverse($request->approved_amt);
        $item_ids = [];
        if ($request->po_item_id) {
            $item_ids = array_reverse($request->po_item_id);
        }
        // dd($item_ids);
        // $existing_items = 
        foreach ($product_ids as $key => $value) {
            if (!empty($item_ids[$key])) {
                // if (in_array($item_ids[$key], $old_items)) {
                //     $po_item = POItem::find($item_ids[$key]);
                //     $po_item->update([
                //         'total_quantity' => $qtys[$key],
                //         'updated_at' => date('Y-m-d H:i:s'),
                //         'useru_id' => auth()->id() ?: 0,
                //     ]);
                // } else {
                //     $po_item = POItem::find($old_items[$key]);
                //     $po_item->update([
                //         'is_deleted' => 1,
                //         'deleted_at' => date('Y-m-d H:i:s'),
                //         'userd_id' => auth()->id() ?: 0,
                //     ]);
                // }
                foreach ($old_items as $item_id) {
                    $po_item = POItem::find($item_id);
                    if (in_array($item_id, $item_ids)) {
                        $po_item->update([
                            'total_quantity' => $qtys[$key],
                            'updated_at' => date('Y-m-d H:i:s'),
                            'useru_id' => auth()->id() ?: 0,
                        ]);
                    } else {
                        $po_item->update([
                            'is_deleted' => 1,
                            'deleted_at' => date('Y-m-d H:i:s'),
                            'userd_id' => auth()->id() ?: 0,
                        ]);
                    }
                }
            } else {
                if ($value) {
                    $product = Product::find($value);
                    $inventory = Inventory::where('product_id', $product->id)->first();
                    $company = Company::find($request->c_id);
                    $po_items = POItem::create([
                        'po_id' => $order->id,
                        'product_id' => $product->id,
                        'color_id' => $inventory->color_id,
                        'size_id' => $inventory->size_id,
                        'purchase_date' => date('Y-m-d H:i:s'),
                        'total_quantity' => $qtys[$key],
                        'estimate_price' => $b_amts[$key],
                        'actual_price' => $inventory->price,
                        'location_id' => 1,
                        'received_date' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
        // $rules = validation_value('editInvoiceForm');
        // $this->validate($request, $rules);
        // $order = PurchaseOrder::find($id);
        // $order->update([
        //     'updated_at' => date('Y-m-d H:i:s'),
        //     'useru_id' => auth()->id() ?: 0,
        // ]);
        // $old_items = [];
        // foreach ($order->poItems as $key => $value) {
        //     array_push($old_items, $value->id);
        // }
        // foreach ($request->product_id as $key => $value) {
        //     if (!empty($request->po_item_id[$key])) {
        //         // if (in_array($request->po_item_id[$key], $old_items)) {
        //         //     $po_item = POItem::find($request->po_item_id[$key]);
        //         //     $po_item->update([
        //         //         'total_quantity' => $request->qty[$key],
        //         //         'updated_at' => date('Y-m-d H:i:s'),
        //         //         'useru_id' => auth()->id() ?: 0,
        //         //     ]);
        //         // } else {
        //         //     $po_item = POItem::find($old_items[$key]);
        //         //     $po_item->update([
        //         //         'is_deleted' => 1,
        //         //         'deleted_at' => date('Y-m-d H:i:s'),
        //         //         'userd_id' => auth()->id() ?: 0,
        //         //     ]);
        //         // }
        //         foreach ($old_items as $item_id) {
        //             $po_item = POItem::find($item_id);
        //             if (in_array($item_id, $request->po_item_id)) {
        //                 $po_item->update([
        //                     'total_quantity' => $request->qty[$key],
        //                     'updated_at' => date('Y-m-d H:i:s'),
        //                     'useru_id' => auth()->id() ?: 0,
        //                 ]);
        //             } else {
        //                 $po_item->update([
        //                     'is_deleted' => 1,
        //                     'deleted_at' => date('Y-m-d H:i:s'),
        //                     'userd_id' => auth()->id() ?: 0,
        //                 ]);
        //             }
        //         }
        //     } else {
        //         if ($value) {
        //             $product = Product::find($value);
        //             $inventory = Inventory::where('product_id', $product->id)->first();
        //             $company = Company::find($request->c_id);
        //             $po_items = POItem::create([
        //                 'po_id' => $order->id,
        //                 'product_id' => $product->id,
        //                 'color_id' => $inventory->color_id ?: NULL,
        //                 'size_id' => $inventory->size_id ?: NULL,
        //                 'purchase_date' => date('Y-m-d H:i:s'),
        //                 'estimate_price' => (float) ($request->billed_amt[$key]),
        //                 'total_quantity' => $request->qty[$key],
        //                 'actual_price' => $inventory->price,
        //                 // 'location_id' => 1,
        //                 'received_date' => date('Y-m-d H:i:s'),
        //             ]);
        //         }
        //     }
        // }
        return $order;
    }

    /**
     * Delete purchase order
     *
     * @param integer $id
     * @return void
     */
    public function deleteOrder(int $id)
    {
        $order = PurchaseOrder::find($id);
        $order->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
        // return $this->index();
    }
}
