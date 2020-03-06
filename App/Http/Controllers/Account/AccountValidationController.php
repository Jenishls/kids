<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class AccountValidationController extends Controller
{
    /**
    *	Account Validator
    *	@param - Request Object
    *	@return - reponse
    */
    public function account(Request $request)
    {
        $customMessages=[
            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'company_name.required' => 'Company\'s name is required',
            'reg_no.required' => 'Registration Number is required',
            'add1.required' => 'Primary Address is required',
            'city.required' => 'City is required',
            'state.required' => 'State is required',
            'zip.required' => 'Zip is required',
            'County.required' => 'County is required',
            'phone1.required' => 'Phone Number is required',
        ];
 		$rules = validation_value('add_accounts_form');
        $this->validate($request, $rules,$customMessages);
    }
    /**
    *	Branch Validator
    *	@param - Request Object
    *	@return - reponse
    */
    public function branch(Request $request)
    {
        $customMessages = [
        'c_branch_name.required' => 'Branch Name is required field.',
        'c_branch_no.required' => 'Branch Code is required field.',
        'c_branch_add1.required' => 'Address is required field.',
        'c_branch_phone_no.required' => 'Phone Number is required field.',
        'c_branch_city.required' => 'City Location is required field.',
        'c_branch_state.required' => 'State Location is required field.',
        'c_branch_zip.required' => 'Zip Code is required.'
        ];
 		$rules = validation_value('add_branch_form');
        $this->validate($request, $rules,$customMessages);
    }
}
