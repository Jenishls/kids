<?php

namespace App\Http\Controllers\TaxMaster;

use App\Model\TaxMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaxMasterAddController extends Controller
{
    public function addTaxModal()
    {
        return view(default_template() . ".pages.taxMaster.Modal.addTaxMaster");
    }

    /**
     * Store new Tax
     *
     * @param Request $request
     * @return index
     */
    public function storeTax(Request $request)
    {
        $request->validate([
            'type.*' => 'required',
            'tax_code' => 'required|unique:tax_masters',
            'tax_name.*' => 'required',
            'value.*' => 'required|numeric'
        ]);
        // dd($request->all());
        foreach ($request->type as $key => $value) {
            $tax = new TaxMaster;
            $tax->tax_name = $request->tax_name[$key];
            $tax->tax_code = $request->tax_code[$key];
            $tax->value = $request->value[$key];
            $tax->type = $value;
            $tax->created_at = date('Y-m-d H:i:s');
            $tax->userc_id = Auth::id();
            $tax->save();
        }

        return response()->json([
            "message" => "Tax added Successfully."
        ]);
    }
}
