<?php

namespace App\Http\Controllers\Bills;

use App\Model\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AddController extends BillsController
{
    public function addModal()
    {
        return view(default_template() . ".pages.bills.add.add-bill-modal");
    }

    /**
     * Create New Bill
     *
     * @param Request $request
     * @return response
     */
    public function createBill(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'bill_type' => 'required',
            'acc_head' => 'required',
            'bill_title' => 'required',
            'amount' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $bill = new Bill();
            if ($request->bill_type === 'members') {
                $bill->member_id = $request->member;
            } else {
                $bill->account_id = $request->account;
            }
            $bill->account_head = $request->acc_head;
            if ($request->date) {
                $bill->bill_date = Carbon::parse($request->date)->format('Y-m-d');
            }
            $bill->bill_title = $request->bill_title;
            $bill->currency = $request->currency;
            $bill->amount = $request->amount;
            $bill->description = $request->remarks;
            $bill->status = 'pending';
            $bill->bill_no = 0;
            $bill->save();
            $bill->bill_no = "Bill-" . str_pad($bill->id, 5, '0', STR_PAD_LEFT);
            $bill->save();
            DB::commit();
            return response(['message' => 'Added Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }


    public function processFiles(Request $request, Bill $bill)
    {
        dd($request->all());
    }
}
