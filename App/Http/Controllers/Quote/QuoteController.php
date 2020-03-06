<?php

namespace App\Http\Controllers\Quote;

use App\Model\Quote;
use App\Model\QuoteItem;
use App\Model\Address;
use App\Model\Company;
use App\Model\InvoiceHead;
use App\Model\Inventory;
use Illuminate\Http\Request;
use App\Lib\Filter\QuoteFilter;
use App\Lib\Filter\InvoiceFilter;
use App\Lib\Filter\OrderItemFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Export\QuoteDetailExportController;
use App\Model\Client;
use App\User;

class QuoteController extends QuoteDetailExportController
{
    public function index()
    {
        return view(default_template() . ".pages.quote.index");
    }

    /**
     * Quotes Datatable
     *
     * @param Request $request
     * @return void
     */
    public function quotesData(Request $request)
    {
        $query = Quote::where('is_deleted', 0);
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query->when($request->sort, function ($q, $sort) use ($request) {
            if ($sort['field'] === 'performa_invoice') {
                return $q->whereHas('performa_invoice', function ($qry) use ($sort) {
                    return $qry->orderBy('invoice_no', $sort['sort']);
                });
            }
            if ($sort['field'] === 'amount') {
                return $q->whereHas('quoteItems', function ($qry) use ($sort) {
                    return $qry->orderBy(\DB::raw('SUM(estimate_price)'), $sort['sort']);
                });
            }
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new QuoteFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        // dd($queryBuilder->get());
        $total = $queryBuilder->count();
        $paginatedBuilder =  $queryBuilder->limit($perPage)
            ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $paginatedBuilder->get();
        foreach ($data['data'] as $key => $quote) {
            $amount = 0;
            if (count($quote->quoteItems) > 0) {
                foreach ($quote->quoteItems as $orderitem) {
                    $amount += (int) $orderitem->actual_price * (int) $orderitem->total_quantity;
                }
            }
            $quote->amount = $amount;
        }
        // dd($data['data']);
        return $data;
    }


    public function viewQuote(int $id)
    {
        $quote = Quote::find($id);
        $requestedBy = Company::find($quote->requested_id);
        $requestedBy_add = Address::where(['table' => 'companies', 'table_id' => $requestedBy->id])->first();
        if ($quote->supplier_type === 'companies') {
            $vendor = Company::find($quote->supplier_id);
            $vendor_add = Address::where(['table' => 'companies', 'table_id' => $vendor->id])->first();
        } else {
            $vendor = Client::find($quote->supplier_id);
            $vendor_add = Address::where(['table' => 'clients', 'table_id' => $vendor->id])->first();
        }
        return view(default_template() . ".pages.quote.inc.view-quote", compact('quote', 'requestedBy', 'requestedBy_add', 'vendor', 'vendor_add'));
    }

    public function viewDetailQuote(Quote $quote)
    {
        return view(default_template() . ".pages.quote.inc.detail", compact('quote'));
    }

    public function addOrderItems(Quote $quote)
    {
        if ($quote->supplier_type === 'companies') {
            $data = Company::where('is_deleted', 0)->first();
        }
        if ($quote->supplier_type === 'clients') {
            $data = Client::where('is_deleted', 0)->first();
        }
        return view(default_template() . ".pages.quote.add.addOrderItems", compact('quote', 'data'));
    }

    public function orderItemsData(Request $request, $quote)
    {
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query = QuoteItem::with('product.thumb')->select('*')
            ->where("quote_items.quote_id", $quote)
            ->where("quote_items.is_deleted", 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            if ($sort['field'] === "inventory.price") {
                return $q->join('inventories as i', 'i.id', 'order_items.inv_id')->orderBy('price', $sort['sort']);
            } elseif ($sort['field'] === "product.name") {
                return $q->join('inventories as i', 'i.id', 'order_items.inv_id')
                    ->join('products as p', 'p.id', 'i.product_id')
                    ->orderBy('p.name', $sort['sort']);
            } elseif ($sort['field'] === "package.price") {
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
            }
            // return $q->orderBy($sort['field'], $sort['sort']);
        });
        new OrderItemFilter($request, $query);
        $total = $query->count();
        $paginatedBuilder =  $query->limit($perPage)
            ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        // $res = $paginatedBuilder->get()->map(function($product){
        //         $product->total = $product->quantity * $product->inventory->price - $product->dis_amt;
        //         return $product;
        // })->pipe(function($products) use ($sort, $field){
        //     if ($field === "total") {
        //         $sortBy = $sort == "desc"?"sortByDesc":"sortBy";
        //         return $products->$sortBy('total')->values();
        //     }
        //     return $products;
        // });
        // $data['data'] = $res;
        $data['data'] = $paginatedBuilder->get();

        return response()->json($data);
    }

    // Performa Invoice
    public function makePerformaInvoice(Quote $quote)
    {
        return view(default_template() . ".pages.quote.add.makePerformaInvoice", compact('quote'));
    }

    public function invoiceData(Request $request, $quote)
    {
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query = Invoicehead::with('client', 'company')->select('*')->where("quot_id", $quote)->where("invoice_heads.is_deleted", 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'invoice_heads.client_id')->orderBy('c.fname', $sort['sort']);
            }
            // elseif($sort['field'] === "client.contact.phone_no"){
            //     return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
            // }
            // elseif($sort['field'] === "package.package_name"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
            // }
            // elseif($sort['field'] === "package.price"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
            // }
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new InvoiceFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        $total = $queryBuilder->count();
        $paginatedBuilder =  $queryBuilder->limit($perPage)
            ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $paginatedBuilder->get();
        return response()->json($data);
    }

    public function checkInvoice(Quote $quote)
    {
        foreach ($quote->quoteItems as $item) {
            // $check = Inventory::where('product_id', $item->product_id)->where('color_id', $item->color_id)->where('size_id', $item->size_id)->first();
            $check = Inventory::where('product_id', $item->product_id)->first();
            if ($check) {
                if ($check->quantity < $item->total_quantity) {
                    return response()->json([
                        "message" => "Items not available in Inventory.",
                        "available" => false,
                        "data" => $quote
                    ]);
                }
            }
            else{
                return response()->json([
                    "message" => "Items not available in Inventory.",
                    "available" => false,
                    "data" => $quote
                ]);
            }
        }
        return response()->json([
            "message" => "Available.",
            "available" => true,
            "data" => $quote
        ]);
    }

    // Mail
	public function compose(Request $request, Quote $quote){
		$setting = User::find(auth()->id())->emailSetting;
		$to = null;
		$pdf = null;
		if($quote->vendorClient){
			$to = $quote->vendorClient->email;
		}
		elseif ($quote->vendorCompany) {
            if($quote->vendorCompany->contact){
                $to = $quote->vendorCompany->contact->email;
            }
		}

		if($request->pdf){
			$request->request->add(['quote' => $quote->id]);
			$pdf = $this->export($request, 'pdf');
			$pdf_name_only =explode("reports\\",$pdf);
            $pdf = $pdf_name_only[1];
		}
    	return view('supportNew.pages.quote.mail.compose', compact('quote', 'setting', 'to', 'pdf'));
    }
}
