<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Company;
use App\Lib\Filter\AccountFilter;

class AccountController extends Controller
{
    /**
    * Account main View
    * @param Request object
    * @return  view (main)
    */
    public function main(Request $request){
        $data['industry']=  Company::select('id','industry')
                                ->where('is_deleted',0)
                                ->where('industry','<>',NULL)
                                ->get()->unique(function ($item) {
                                    return ucwords($item['industry']);
                            });
    	return view('supportNew.pages.account.index',compact('data'));
    }
    /**
    * Account Json date for Datatable
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
    	$query = Company::with('address','contact')->select('*')->where("is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new AccountFilter($request);
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
    *  Returns the main wizard modal for Add/Update Operation
    * @param Request object and data params (add, edit, account_id)
    * @return  rendered view
    */
    public function modal(Request $request){
        if($request->has(['edit','account'])){
            $company= Company::where('id', $request->account)
                ->where('is_deleted',0)
                ->first();
            return view('supportNew.pages.account.modal.editForm', compact('company'));
        }
        return view('supportNew.pages.account.modal.form');
    }
    /**
    *  Soft delete on an account
    * @param Request object and account model binding using route
    * @return response on the operation
    */
    public function delete(Request $request, Company $company)
    {
        $company->is_deleted = 1;
        $company->save();
        return response(['success' => 'Account Deleted Successfully!'],200);
    }
}
