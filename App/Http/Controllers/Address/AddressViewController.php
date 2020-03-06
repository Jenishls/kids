<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Lib\Filter\AddressFilter;

class AddressViewController extends Controller
{
	protected $path= 'supportNew.pages.address.';
    /**
    * Returns the main table view
    * @param - request objects
    * @return - view
    */
    public function index(Request $request)
    {
    	$data['addresses']= Address::select('*')->where('add1','<>',null)->where("is_deleted", 0)->get();
    	return view($this->path.'index',compact('data'));
    }

    public function data(Request $request)
    {
    	// dd($request->all());
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
    	$query = Address::select('*')->where("is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
    		if ($sort['field'] === "member") {
    		    return $q->join('members as m', 'm.user_id', 'users.id')->orderBy('first_name', $sort['sort'])->orderBy('first_name', $sort['sort']);
    		}
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new AddressFilter($request);
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
