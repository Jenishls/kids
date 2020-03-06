<?php

namespace App\Http\Controllers\Banking\Bank;

use App\Model\BankMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class EditController extends BankMasterController
{
    public function editBankMasterModal(int $id)
    {
        $b_master = BankMaster::find($id);
        return view(default_template() . ".pages.bankmaster.edit.edit-bm-modal", compact('b_master'));
    }

    public function updateBankMaster(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'account_id' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'opened_date' => 'required',
            'branch' => 'required',
        ]);
        $opened_date = Carbon::parse($request->opened_date)->format('Y-m-d');
        $arr = [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
            'opened_date' => $opened_date,
        ];
        $data = $request->except(['_token', 'opened_date']);
        $update = array_merge($data, $arr);
        $bank_m = BankMaster::find($id);
        $bank_m->update($update);
        if (!$bank_m) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Updated Successfully']);
    }
}
