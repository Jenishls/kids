<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Company;
use App\Model\Address;
use App\Model\Contact;
use App\Model\Location;
use App\Model\CompanyBranch;
use App\Model\AccountAddress;
use App\Model\File;
use Carbon\Carbon;

class AccountAddController extends Controller
{
    /**
    *  Store new account in the database
    * @param Request object and data params
    * @return response about the operation
    */
    public function store(Request $request){
       
        $rules = validation_value('add_accounts_form');
        $this->validate($request, $rules);
        \DB::beginTransaction();
        try{
            $company = Company::create([
                'c_name' => $request->company_name,
                'url' => $request->url,
                'start_date' => $request->estd_date?Carbon::parse($request->estd_date)->format('Y-m-d H:i:s'):NULL,
                'company_desc' => $request->short_desc,
                'industry' => $request->industry,
                'reg_no' => $request->reg_no,
                'ownership' => $request->ownership,
                'url' => $request->url,
                'reference' => $request->reference,
                'credit_terms' => $request->credit_terms,
                'account_code' => $request->account_code,
                'status' => 'active',
                'is_active' => 1,
                'userc_id' => auth()->user()->id?:1,

            ]);
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
            if(!empty($request->branch_name)){
                foreach($request->branch_name as $key => $branchName)
                {
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
            $company->clients()->sync($request->member_id);
            \DB::commit();
            return response(['success' => 'Account Created Successfully!',
                            'data' => $company->load('image','address','contact')],200);
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }
    /**
    *  Store account logo(Profile Image)
    * @param Request object and Account Model binded from route
    * @return response file name
    */
    public function storeLogo(Request $request, Company $company)
    {
         // Check if file exists first
         if ($request->has('file')) {
            $f = $request->file('file');
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;
            $profile_pic = File::where(['table_name' => 'companies', 'table_id' => $company->id, 'type' => 'profile'])->first();
            if ($profile_pic) {
                $f->move(storage_path("company/profile") . DIRECTORY_SEPARATOR, $fileName);
                $profile_pic->update([
                    'file_name' => $fileName,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'useru_id' => auth()->id() ?: 0
                ]);
                $company->contact->update(['profile_pic' => $fileName]);
            } else {
                if (!file_exists(storage_path("company/profile"))) {
                    mkdir(storage_path("company/profile"), 0777, true);
                }
                $f->move(storage_path("company/profile") . DIRECTORY_SEPARATOR, $fileName);
                File::create([
                    'type' => 'profile',
                    'table_name' => 'companies',
                    'table_id' => $company->id,
                    'file_name' => $fileName,
                ]);
                $company->contact->update(['profile_pic' => $fileName]);
            }
            return response()->json(['file_name' => $fileName]);
        }
    }
}
