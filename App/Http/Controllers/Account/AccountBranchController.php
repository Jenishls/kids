<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Company,Address,Contact,CompanyBranch};
use App\Lib\Filter\CompanyBranchFilter;

class AccountBranchController extends Controller
{
    protected $path ='supportNew.pages.account.';
    protected $modalPath = 'supportNew.pages.account.modal.branch.';
    /**
    *  list and filter data of the branch associated with company
    *   @param - Request instance and company modal binded using routeModelBinding
    */
    public function list(Request $request,Company $company)
    {
        $query = $company->branches()->with(['address','contact']);
    	$queryFilter = new CompanyBranchFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
    	$data['data'] = $queryBuilder->get();
        return response()->json($data);
    }
    /**
    *  Add Modal from branch associated to a company
    *
    */
    public function add()
    {
    	return view($this->modalPath.'.add');
    }

    /**
    *  Add Modal from branch associated to a company
    *
    */
    public function edit(CompanyBranch $cBranch)
    {
    	return view($this->modalPath.'edit', compact('cBranch'));
    }
    /**
    *  Add Modal soft Delete
    *
    */
    public function sdelete(CompanyBranch $cBranch)
    {
        $companyId= $cBranch->company_id;
        $cBranch->update([
            'is_deleted'=>1,
            'deleted_at' => now()
        ]);
        $data['data']= CompanyBranch::where(['company_id'=>$companyId,'is_deleted'=>0])->get();
        $data['success']= 'Sucessfully Removed Branch!';
        return response($data, 200);
    }



    // store
    /**
	* Update Branch Associate with the Account
	* @param - current request instance and Account Modal binded from route
	* @return - Update response text
	**/
    public function store(Request $request, Company $company)
    {
       $rules = validation_value('add_branch_form');
       $this->validate($request, $rules);
       \DB::beginTransaction();
       try{
          if(!empty($request->branch_name))
           {
	       		foreach($request->branch_name as $key => $branchName){
                   if($branchName){
                       $branchAddress = Address::create([
                           'add1' => $request->branch_add1[$key],
                           'add2' => $request->branch_add2[$key],
                           'city' => $request->branch_city[$key],
                           'state' => $request->branch_state[$key],
                           'zip' => $request->branch_zip[$key],
                           'table' => 'company_branches',
                       ]);
                       $branchContact = Contact::create([
                           'phone_no' => $request->branch_phone_no[$key],
                           'email' => $request->branch_email[$key],
                           'table' => 'company_branches'
                       ]);
                        $branch = CompanyBranch::create([
                           'branch_name' => $branchName,
                           'branch_no' => $request->branch_no[$key],
                           'branch_type' => 'test',
                           'estd_date' => now(),
                           'company_id' => $company->id,
                           'address_id' => $branchAddress->id,
                           'contact_id' => $branchContact->id
                       ]);
                   }
               }
            }
           \DB::commit();
            if($request->has('rdata'))
              return $company->branches;
        	return response(['success' => 'New Branch Added!'],200);
       }catch (\Exception $e) 
       {
           \DB::rollBack();
           return response(["message" => $e->getMessage()], 500);
       }
    }

     // store
    /**
	* Update Branch Associate with the Account
	* @param - current request instance and Account Modal binded from route
	* @return - Update response text
	**/
    public function update(Request $request, CompanyBranch $cBranch)
    {
        $rules = validation_value('edit_branch_form');
        $this->validate($request, $rules);
        $cBranch->update([
        'branch_name' => $request->branch_name,
        'branch_no' => $request->branch_no
        ]);
        $cBranch->address->update([
            'add1' => $request->add1,
            'add2' => $request->add2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
        ]);
        $cBranch->contact->update([
            'phone_no' => $request->phone_no,
            'email' => $request->email,
        ]);
        return response([
            'success' => 'Updated Branch Successfully!',
            'data' => $cBranch
        ],200);
    }
}
