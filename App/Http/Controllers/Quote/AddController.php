<?php

namespace App\Http\Controllers\Quote;

use Carbon\Carbon;
use App\Model\Quote;
use App\Model\Client;
use App\Model\Company;
use App\Model\Product;
use App\Model\Inventory;
use App\Model\QuoteItem;
use App\Model\InvoiceHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Quote\QuoteController;
use Auth;

class AddController extends QuoteController
{
    /**
     * Quote add form
     *
     * @param string $type
     * @return void
     */
    public function addForm(string $type)
    {
        if ($type === 'companies') {
            $data = Company::where('is_deleted', 0)->get();
        }
        if ($type === 'clients') {
            $data = Client::where('is_deleted', 0)->get();
        }
        return view(default_template() . ".pages.quote.add.prepare-quote", compact('type', 'data'));
    }


    public function vendorType()
    {
        return view(default_template() . ".pages.quote.add.vendor-type");
    }

    /**
     * Lookup for company or client as vandor
     *
     * @param string $entity
     * @param string $value
     * @return void
     */
    public function getLookup(string $entity, string $value)
    {
        if ($entity === 'clients') {
            $builder = Client::where('is_deleted', '0');
            $data = $builder->where('fname', 'like', "%$value%")
                ->orWhere('mname', 'like', "%$value%")
                ->orWhere('lname', 'like', "%$value%")
                ->get();
        };
        if ($entity === 'companies') {
            $data = Company::where('is_deleted', 0)->where('c_name', 'like', "%$value%")->get();
        }
        return $data;
    }

    public function appendForm(string $entity, int $value)
    {
        // dd($entity . ' ' . (int) $value);
        $latest = Quote::orderBy('quote_number', 'desc')->first();
        if ($latest) {
            $iterate = (int) str_replace('#Q-', '', $latest->quote_number);
        } else {
            $iterate = 0;
        }
        $quote_no = '#Q-' . str_pad($iterate + 1, 5, 0, STR_PAD_LEFT);
        if ($entity === 'companies') {
            $data = Company::find($value);
        };
        if ($entity === 'clients') {
            $data = Client::find($value);
        }
        return view(default_template() . ".pages.quote.add.after-select-form", compact('entity', 'data', 'quote_no'));
    }



    public function createQuote(Request $request)
    {
        // dd($request->all());
        $rules = validation_value('quoteAddForm');
        $this->validate($request, $rules);
        $latest_quote = Quote::orderBy('quote_number', 'desc')->first();
        if ($latest_quote) {
            $iterate = (int) str_replace('#Q-', '', $latest_quote->quote_number);
        } else {
            $iterate = 0;
        }
        $quote = Quote::create([
            'quote_number' => '#Q-' . str_pad($iterate + 1, 5, 0, STR_PAD_LEFT),
            'supplier_id' => $request->vendor_id,
            'supplier_type' => $request->vendor_type,
            'delivery_date' => Carbon::parse($request->delivery_date)->format('Y-m-d'),
            'released_date' => date('Y-m-d H:i:s'),
            // 'approved_id' => $request->vendor_id, //Probably no need to fill this while creating
            'requested_id' => auth()->user()->id ?: NULL, //Need to find out which company made the quote request
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'pending',
            'userc_id' => auth()->id() ?: 0
        ]);
        foreach ($request->product_id as $key => $value) {
            if ($request->product_id[$key]) {
                $product = Product::find($request->product_id[$key]);
                $inventory = Inventory::where('product_id', $product->id)->first();
                $company = Company::find($request->c_id);
                $po_items = QuoteItem::create([
                    'quote_id' => $quote->id,
                    'product_id' => $request->product_id[$key],
                    'color_id' => $inventory ? $inventory->color_id : NULL,
                    'size_id' => $inventory ? $inventory->size_id : NULL,
                    'purchase_date' => date('Y-m-d H:i:s'),
                    'total_quantity' => $request->qty[$key],
                    'estimate_price' => (float) ($request->quoted_amt[$key]),
                    'actual_price' =>  $inventory ? $inventory->price : $product->unit_price_label,
                    // 'location_id' => 1, //Why does quote item need location?
                    'received_date' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        return $this->index();
    }

    // Add Quote Items
    public function addQuoteItems(Request $request, Quote $quote)
    {
        // $rules = validation_value('quoteAddForm');

        // $this->validate($request, $rules);
        foreach ($request->product_id as $key => $value) {
            if ($request->product_id[$key]) {
                $product = Product::find($request->product_id[$key]);
                $inventory = Inventory::where('product_id', $product->id)->first();
                $company = Company::find($request->c_id);
                $check = QuoteItem::where('product_id', $product->id)
                    ->where('quote_id', $quote->id)
                    ->where('color_id', $inventory->color_id ?: Null)
                    ->where('size_id', $inventory->size_id ?: Null)
                    ->first();
                if ($check) {
                    $check->total_quantity = $request->qty[$key] + $check->total_quantity;
                    $check->update();
                } else {
                    $po_items = QuoteItem::create([
                        'quote_id' => $quote->id,
                        'product_id' => $request->product_id[$key],
                        'color_id' => $inventory ? $inventory->color_id : NULL,
                        'size_id' => $inventory ? $inventory->size_id : NULL,
                        'purchase_date' => date('Y-m-d H:i:s'),
                        'total_quantity' => $request->qty[$key],
                        'estimate_price' => (float) ($request->quoted_amt[$key]),
                        'actual_price' => $inventory ? $inventory->price : $product->unit_price_label,
                        'location_id' => 1,
                        'received_date' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
        return response()->json([
            "message" => "Order Items Added Successfully.",
            "data" => $quote
        ]);
    }

    // Performa Invoice
    public function storePerformaInvoice(Request $request)
    {
        $quote = Quote::find($request->quote_id);
        $client = Null;
        $company = Null;
        if ($quote->supplier_type == "companies") {
            $company = $quote->supplier_id;
        } else {
            $client = $quote->supplier_id;
        }
        \DB::beginTransaction();
        try {
            $check = InvoiceHead::where('quot_id', $quote->id)->first();
            if ($check) {
                $check->amount = $quote->quoteItems()->sum('estimate_price');
                $check->update();
            } else {
                $inv_head = new InvoiceHead;
                $inv_head->quot_id = $quote->id;
                $inv_head->client_id = $client;
                $inv_head->company_id = $company;
                $inv_head->amount = $quote->quoteItems()->sum('estimate_price');
                $inv_head->package_amount = 0;
                $inv_head->type = "debit";
                $inv_head->invoice_no = $this->invoiceNo();
                $inv_head->is_proforma = 1;
                $inv_head->userc_id = Auth::id();
                $inv_head->save();
            }

            // foreach($quote->quoteItems as $item){
            //     $inv_item = new InvoiceItem;
            //     $inv_item->invoice_head_id = $inv_head->id;
            //     $inv_item->inventory_id = $item->inventory->id;
            //     $inv_item->quantity = $item->quantity;
            //     $inv_item->amount = $item->inventory->price * $item->quantity;
            //     $inv_item->userc_id = Auth::id();
            //     $inv_item->save();
            // }

            \DB::commit();
            return response()->json([
                "message" => "Performa Invoice generated Successfully.",
                "data" => $quote
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    private function invoiceNo()
    {
        $inv = InvoiceHead::where('is_deleted', 0)->orderByDesc('created_at')->first();
        if (!$inv) {
            $iterate = 1;
        } else {
            $iterate = (int) str_replace('#COS-', "", $inv->invoice_no) + 1;
        }
        return "#COS-" . str_pad($iterate, 5, 0, STR_PAD_LEFT);
    }


    public function orderExtraModal()
    {
        return view(default_template() . ".pages.quote.add.order-extra-modal");
    }

    public function orderExtraData(Request $request)
    {
        $query = Product::where('is_deleted', 0);
        $extras = $query->whereHas('inventory', function ($q) {
            return $q->where('name', 'Extras');
        })->get();
        return response()->json($extras);
    }
}
