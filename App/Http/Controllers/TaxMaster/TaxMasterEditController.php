<?php

namespace App\Http\Controllers\Taxmaster;

use App\Model\TaxMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Validation\Validation;

class TaxMasterEditController extends TaxMasterViewController
{
    public function editTaxModal(int $id)
    {
        $tax = TaxMaster::find($id);
        return view(default_template() . ".pages.taxMaster.Modal.editTaxMaster", compact('tax'));
    }
    /**
     * Update tax
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    public function updateTax(Request $request, int $id)
    {
        $request->validate([
            'tax_code' => ['required', \Illuminate\Validation\Rule::unique('tax_masters')->ignore($id)],
            'tax_name' => 'required',
            'type' => 'required',
            'value' => 'required|numeric'
        ]);
        $tax_field = TaxMaster::find($id);

        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        $tax_field->update($update);
        if (!$tax_field) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }
}
