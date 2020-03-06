<?php

namespace App\Http\Controllers\Banking\Cash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CashMaster;

class EditController extends CashMasterController
{
    public function editCashMasterModal(int $id)
    {
        $c_master = CashMaster::find($id);
        return view(default_template() . ".pages.cashmaster.edit.edit-cm-modal", compact('c_master'));
    }

    public function updateCashMaster(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'member_id' => 'required',
            // 'location' => 'required',
        ]);
        $arr = [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ];
        $data = $request->except(['_token']);
        $update = array_merge($data, $arr);
        $cash_m = CashMaster::find($id);
        $cash_m->update($update);
        if (!$cash_m) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Updated Successfully']);
    }
}
