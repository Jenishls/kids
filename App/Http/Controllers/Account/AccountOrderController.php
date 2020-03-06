<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Lib\Filter\OrderFilter;
use Illuminate\Http\Request;


class AccountOrderController extends Controller
{
	/**
    * Account Order(company) Json date for Datatable
    * @param Request object
    * @return json date
    */
    public function list(Request $request, int $id)
    {
    	$page = $request->pagination['page'] ?: 1;
    	// $perPage = $request->pagination['perpage'] ? 5;
    	$perPage = 5;
    	$offset = ($page - 1) * $perPage;
    	if ($request->sort) {
    	    $sort = $request->sort['sort'];
    	    $field = $request->sort['field'];
    	}else {
    	    $sort = '';
    	    $field = '';
    	}
    	$query = Order::with('client','company')->where("is_deleted", 0)->where('company_id', $id);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new OrderFilter($request);
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
}
