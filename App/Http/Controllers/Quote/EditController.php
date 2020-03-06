<?php

namespace App\Http\Controllers\Quote;

use App\Model\Quote;
use App\Model\Company;
use App\Model\Product;
use App\Model\Inventory;
use App\Model\QuoteItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Quote\QuoteController;
use App\Model\Client;

class EditController extends QuoteController
{
    public function editModal(int $id)
    {
        // dd($id, $entity);
        $quote = Quote::find($id);
        if ($quote->supplier_type === 'companies') {
            $vendor = Company::find($quote->supplier_id);
        } else {
            $vendor = Client::find($quote->supplier_id);
        }
        return view(default_template() . ".pages.quote.edit.quote-edit-modal", compact('quote', 'vendor'));
    }

    public function update(Request $request, int $id)
    {
        $product_ids = array_reverse($request->product_id);
        $quote = Quote::find($id);
        $quote->update([
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ]);
        foreach ($product_ids as $key => $value) {
            if (!empty($request->q_item_id[$key])) {
                $q_item = QuoteItem::find($request->q_item_id[$key]);
                $q_item->update([
                    'total_quantity' => $request->qty[$key],
                    'updated_at' => date('Y-m-d H:i:s'),
                    'useru_id' => auth()->id() ?: 0,
                ]);
            } else {
                if ($value) {
                    $product = Product::find($value);
                    $inventory = Inventory::where('product_id', $product->id)->first();
                    // $company = Company::find($request->c_id);
                    QuoteItem::create([
                        'quote_id' => $quote->id,
                        'product_id' => $product->id,
                        'color_id' => $inventory->color_id,
                        'size_id' => $inventory->size_id,
                        'purchase_date' => date('Y-m-d H:i:s'),
                        'total_quantity' => $request->qty[$key],
                        'estimate_price' => $inventory->price,
                        'actual_price' => $inventory->price,
                        // 'location_id' => 1,
                        'received_date' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
        return $quote;
    }


    public function delete(int $id)
    {
        $quote = Quote::find($id);
        $quote->update([
            'is_deleted' => 1,
            'userd_id' => auth()->id() ?: 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->index();
    }

    public function confirmBooking(Quote $quote)
    {
        return view(default_template() . ".pages.quote.inc.confirmBooking", compact('quote'));
    }
    
    public function makeOrder(Quote $quote)
    {
        return view(default_template() . ".pages.quote.inc.makeOrder", compact('quote'));
    }
}
