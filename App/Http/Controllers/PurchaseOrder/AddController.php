<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Model\Tax;
use Carbon\Carbon;
use App\Model\POItem;
use App\Model\Address;
use App\Model\Company;
use App\Model\Product;
use App\Model\Inventory;
use App\Model\PurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddController extends PurchaseOrderController
{
    public function addModal()
    {
        $companies = Company::all();
        return view(default_template() . ".pages.purchase-orders.add.add-purchase-order", compact('companies'));
    }

    public function appendForm(int $id)
    {
        $latest = PurchaseOrder::orderBy('po_number', 'desc')->first();
        if ($latest) {
            $iterate = (int) str_replace('#PO-', '', $latest->po_number);
        } else {
            $iterate = 0;
        }
        $po_number = '#PO-' . str_pad($iterate + 1, 5, 0, STR_PAD_LEFT);
        $company = Company::find($id);
        $address = Address::where(['table' => 'companies', 'table_id' => $company->id])->first();
        return view(default_template() . ".pages.purchase-orders.add.on-select-form", compact('company', 'address', 'po_number'));
    }

    public function productlookupModal()
    {
        return view(default_template() . ".pages.purchase-orders.add.product-lookup-modal");
    }

    public function productSelect(int $id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Create Purchase Order
     *
     * @param Request $request
     * @return void
     */
    public function createPurchaseOrder(Request $request)
    {
        // dd($request->all());
        $rules = validation_value('purchaseOrderAddForm');

        // $rules = [
        //     'product_id.0' => 'required|min:1',
        // ];
        $this->validate($request, $rules);

        $purchase_order = PurchaseOrder::create([
            'po_number' => $request->po_number,
            'supplier_id' => $request->vendor_id,
            'delivery_date' => Carbon::parse($request->exp_date)->format('Y-m-d'),
            'release_date' => date('Y-m-d H:i:s'),
            'approved_id' => $request->vendor_id,
            'requested_id' => auth()->user()->client->id ?: NULL,
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id() ?: 0,
            'status' => 'not paid',
        ]);
        foreach ($request->product_id as $key => $value) {
            if ($request->product_id[$key]) {
                $product = Product::find($request->product_id[$key]);
                $inventory = Inventory::where('product_id', $product->id)->first();
                $company = Company::find($request->c_id);
                $po_items = POItem::create([
                    'po_id' => $purchase_order->id,
                    'product_id' => $request->product_id[$key],
                    'color_id' => $inventory->color_id ?: NULL,
                    'size_id' => $inventory->size_id ?: NULL,
                    'purchase_date' => date('Y-m-d H:i:s'),
                    'total_quantity' => $request->qty[$key],
                    'estimate_price' => (float) ($request->billed_amt[$key]),
                    'actual_price' => $inventory->price ?: $product->unit_price_label,
                    // 'location_id' => 1, //Currently nullable
                    'received_date' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        return $this->index();
    }
}
