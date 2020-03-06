<?php

namespace App\Http\Controllers\PurchaseOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\PurchaseOrderFilter;
use App\Model\Address;
use App\Model\Client;
use App\Model\Company;
use App\Model\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $companies = Company::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.purchase-orders.index', compact('companies'));
    }

    public function purchaseOrders(Request $request)
    {
        $query = PurchaseOrder::where('is_deleted', 0);
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
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new PurchaseOrderFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        // dd($queryBuilder);
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
        foreach ($data['data'] as $key => $p_order) {
            $amount = 0;
            if (count($p_order->poItems) > 0) {
                foreach ($p_order->poItems as $orderitem) {
                    $amount += (int) $orderitem->estimate_price * (int) $orderitem->total_quantity;
                }
            }
            $p_order->amount = $amount;
        }
        return response()->json($data);
    }


    public function getInvoice(int $id)
    {
        // $user = auth()->user();
        // dd($user);
        $order = PurchaseOrder::find($id);
        $requestedBy = Client::find($order->requested_id);
        $requestedBy_add = Address::where(['table' => 'clients', 'table_id' => $requestedBy->id])->first();
        $vendor = Company::find($order->supplier_id);
        $vendor_add = Address::where(['table' => 'companies', 'table_id' => $vendor->id])->first();
        return view(default_template() . '.pages.purchase-orders.inc.purchase-order-items', compact('order', 'vendor', 'vendor_add', 'requestedBy', 'requestedBy_add'));
    }


    public function printPage(int $id)
    {
        $order = PurchaseOrder::find($id);
        $requestedBy = Client::find($order->requested_id);
        $requestedBy_add = Address::where(['table' => 'clients', 'table_id' => $requestedBy->id])->first();
        return view("test.mail.purchase-order-print-preview", compact('order', 'requestedBy', 'requestedBy_add'));
    }
}
