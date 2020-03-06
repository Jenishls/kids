<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class CampaignValidationController extends Controller
{
    /**
     * Campaign Validate method
     */
    public function main(Request $request, $name)
    {
 		$rules = validation_value($name);
        $this->validate($request, $rules);
    }
}
