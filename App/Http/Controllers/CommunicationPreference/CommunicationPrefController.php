<?php

namespace App\Http\Controllers\CommunicationPreference;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CommunicationPreference;
use App\Lib\Filter\CommunicationPreferencesFilter;


class CommunicationPrefController extends Controller
{
	protected $path = 'supportNew.pages.CommunicationPreference.';
   /**
   * Index view for communication pref
   * @param - NULL
   * @return - rendered View
   */
   public function index()
   {
   	return view($this->path.'index');
   }
   /**
   * Comm Pref Json date for Datatable
   * @param Request object
   * @return json date
   */
   public function data(Request $request)
   {
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
	   	$query = CommunicationPreference::where("is_deleted", 0);
	   	$query->when($request->sort, function ($q, $sort) use ($request) {
	   	    return $q->orderBy($sort['field'], $sort['sort']);
	   	});
	   	$queryFilter = new CommunicationPreferencesFilter($request);
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
   /**
   *  Get Add Modal for new Communication Peferences
   *	@param - Current Request Instance
   * 	@return - Add Modal For Communication's table
   */
   public function Add(Request $request)
   {
	 	return view($this->path.'modal.add');
   }
}
