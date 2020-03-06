<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Inventory;
use App\Lib\Filter\InventoryFilter;

class InventoryViewController extends Controller
{
    public function index(){
    	return view('supportNew.pages.inventory.index');
    }

    public function addInventory(){
        return view('supportNew.pages.inventory.modal.add');
    }
    
    public function inventoryData(Request $request){
    	$page = $request->pagination['page'] ?: 1;
    	$perPage = $request->pagination['perpage'] ?: 50;
    	$offset = ($page - 1) * $perPage;
    	if ($request->sort) {
    	    $sort = $request->sort['sort'];
    	    $field = $request->sort['field'];
    	}else {
    	    $sort = '';
    	    $field = '';
    	}
    	$query = Inventory::with('product.thumb','color','size','company')->select('*')->where("inventories.is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('lname', $sort['sort'])->orderBy('fname', $sort['sort']);
			}
			elseif($sort['field'] === "client.contact.phone_no"){
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
			}
			elseif($sort['field'] === "package.package_name"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			}
			elseif($sort['field'] === "package.price"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			}
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new InventoryFilter($request);
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
    	$data['data'] = $paginatedBuilder->orderBy('created_at', 'desc')->get();
    	return response()->json($data);
    }
}
