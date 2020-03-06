<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\Company;
use App\Model\Address;
use App\Model\Contact;
use App\Model\CompanyBranch;
use Carbon\Carbon;

class AccountUpdateController extends Controller
{
	/**
	* Update General field of an Account
	* @param - current request instance and Account Modal binded from route
	* @return - Update response text
	**/
    public function general(Request $request, Company $company)
    {
       $rules = validation_value('update_account_general_form');
       $this->validate($request, $rules);
               \DB::beginTransaction();
               try{
                  $company->update([
                      'c_name' => $request->company_name,
                       'url' => $request->url,
                       'start_date' => $request->estd_date?Carbon::parse($request->estd_date)->format('Y-m-d H:i:s'):NULL,
                       'company_desc' => $request->short_desc,
                       'industry' => $request->industry,
                       'reg_no' => $request->reg_no,
                       'ownership' => $request->ownership,
                       'account_code' => $request->account_code,
                       'reference' => $request->reference,
                       'credit_terms' => $request->credit_terms,
                       'useru_id' => auth()->user()->id?:1
                   ]);
                   
                   if($company->address){
                    $company->address->update([
                        'add1' => $request->add1,
                        'add2' => $request->add2,
                        'city' => $request->city,
                        'county' => $request->county,
                        'state' => $request->state,
                        'zip' => $request->zip,
                        'country' => $request->country,
                    ]);
                   }
                   else{
                    $address = Address::create([
                        'table' => 'companies',
                        'table_id' => $company->id,
                        'add1' => $request->add1,
                        'add2' => $request->add2,
                        'city' => $request->city,
                        'county' => $request->county,
                        'state' => $request->state,
                        'zip' => $request->zip,
                        'country' => $request->country,
                        'is_default' => 1
                    ]);
                    
                   }
                   
                  if($company->contact)
                  {
                    $company->contact->update([
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'mobile_no' => $request->phone2,
                        'phone_no' => $request->phone1,
                        'email' => $request->email,
                        'other_email' => $request->other_email
                    ]);
                  }
                  else{
                    $contact = Contact::create([
                        'table' => 'companies',
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'table_id' => $company->id,
                        'mobile_no' => $request->phone2,
                        'phone_no' => $request->phone1,
                        'email' => $request->email,
                        'is_default' => 1
                    ]);
                  }

                   \DB::commit();
                   if($request->has('rdata'))
                      return $company;
                   return response(['success' => 'General Account Information Updated!'],200);
               } 
               catch (\Exception $e) 
               {
                   \DB::rollBack();
                   return response(["message" => $e->getMessage()], 500);
               }
    }
    /**
	* Update Branch Associate with the Account
	* @param - current request instance and Account Modal binded from route
	* @return - Update response text
	**/
    public function branches(Request $request, Company $company)
    {
       $rules = validation_value('update_account_branches_form');
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
                           'table' => 'company_branches'
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
           if(!empty($request->update_branch_id))
           {
                foreach($request->update_branch_id as $key => $oldBranch)
                {
                   if(is_numeric($oldBranch)){
                        $branch= CompanyBranch::find($oldBranch);
                        $branch->update([
                            'branch_name' => $request->update_branch_name[$key],
                           'branch_no' => $request->update_branch_no[$key],
                        ]);
                        $branch->address->update([
                            'add1' => $request->update_branch_add1[$key],
                            'add2' => $request->update_branch_add2[$key],
                            'city' => $request->update_branch_city[$key],
                            'state' => $request->update_branch_state[$key],
                            'zip' => $request->update_branch_zip[$key],
                        ]);
                        $branch->contact->update([
                            'phone_no' => $request->update_branch_phone_no[$key],
                           'email' => $request->update_branch_email[$key],
                        ]);
                   }
                }
           }
           if(!empty($request->deletedBranchId))
           {
                foreach($request->deletedBranchId as $key => $oldBranch)
                {
                   if(is_numeric($oldBranch)){
                        $branch= CompanyBranch::find($oldBranch);
                        $branch->update([
                           'is_deleted' => 1
                        ]);
                   }
                }
           }
           \DB::commit();
            if($request->has('rdata'))
              return $company->branches;
        	return response(['success' => 'Branches Information Updated!'],200);
       }catch (\Exception $e) 
       {
           \DB::rollBack();
           return response(["message" => $e->getMessage()], 500);
       }
    }

    
    public function detachMember(Request $request, Company $company,int $member)
    {
        $company->clients()->detach([$member]);
        return response(['success' =>'Remove Member Association!']);
    }
    public function detachBranch(Request $request, Company $company,int $branch)
    {
        $company->branches()->detach([$request->branch]);
        return response(['success' =>'Remove Member Association!']);
    }

   
    /**
	* Update Member associated with the Account
	* @param - current request instance and Account Modal binded from route
	* @return - Update response text
	**/
    public function members(Request $request, Company $company)
    {
       $rules = validation_value('update_account_members_form');
       $this->validate($request, $rules);
               \DB::beginTransaction();
               try{
                   if(!empty($request->deleted_member_id))
                   {
                        $company->clients()->detach($request->deleted_member_id);
                   }
                   if(!empty($request->member_id))
                   {
                        $company->clients()->sync($request->member_id);
                   }
                   \DB::commit();
                   if($request->has('rdata'))
                    return $company->clients;
                   return response(['success' => 'Associated Members Updated!'],200);
               } 
               catch (\Exception $e) 
               {
                   \DB::rollBack();
                   return response(["message" => $e->getMessage()], 500);
               }
    }
}
