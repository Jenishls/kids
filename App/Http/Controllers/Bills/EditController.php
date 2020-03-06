<?php

namespace App\Http\Controllers\Bills;

use App\Model\Bill;
use App\Model\Member;
use App\Model\Account;
use App\Model\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Model\AccountSubHeadItem;
use App\Model\JournalTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ledger\LedgerController;
use App\Model\Note;

class EditController extends BillsController
{
    public function editBillModal(int $id)
    {
        $bill = Bill::find($id);
        return view(default_template() . ".pages.bills.edit.edit-bill-modal", compact('bill'));
    }

    public function getExpanseHead(Request $request)
    {
        $data = DB::table('account_sub_head_items')
            ->join('account_heads', 'account_heads.id', 'account_sub_head_items.account_head_id')
            ->select('account_sub_head_items.name as text', 'account_sub_head_items.id')
            ->where([
                ['account_heads.code', 'Expenses'],
                ['account_sub_head_items.name', 'like', "%$request->term%"]
            ])
            ->get();
        return response()->json($data);
    }

    public function updateBill(Request $request, int $id)
    {
        $bill = Bill::find($id);
        // dd($request->all());
        DB::beginTransaction();
        try {
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
            $bill->save();
            DB::commit();
            return response(['message' => 'Updated Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }


    public function deleteBill(int $id)
    {
        $bill = Bill::find($id);
        $bill->update([
            'is_deleted' => 1,
            'userd_id' => auth()->id() ?: 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function addCancelNote(Request $request, Bill $bill)
    {
        $request->validate([
            'remarks' => 'required',
        ]);
        $status = 'cancelled';
        $note = new Note();
        $note->table = 'bills';
        $note->table_id = $bill->id;
        $note->title = 'Reason For Bill Cancellation.';
        $note->description = $request->remarks;
        $note->created_at = date('Y-m-d H:i:s');
        $note->userc_id = auth()->id();
        $note->save();
        $this->updateBillStatus($bill, $status);
        return $this->viewBill($bill->id);
    }

    public function updateBillStatus(Bill $bill, string $status)
    {
        DB::beginTransaction();
        try {
            if ($status === 'approved') {
                $this->generateJournal($bill);
            }
            $bill->update([
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
                'useru_id' => auth()->id() ?: 0,
            ]);
            DB::commit();
            return $this->viewBill($bill->id);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }


    public function generateJournal(Bill $bill)
    {
        $journal = new Journal();
        $journal->table = $bill->getTable();
        $journal->table_id = $bill->id;
        $journal->journal_date = date('Y-m-d');
        $journal->description = "Bill Created Payment Yet to Be made";
        $journal->userc_id = auth()->id();
        $journal->status = 1;
        $journal->approved_by = auth()->id();
        $journal->save();
        $journal->ref_no = str_pad($journal->id, 5, '0', STR_PAD_LEFT);
        $journal->save();

        $accpayable = AccountSubHeadItem::where('code', 'accountPayable')->first()->id;

        if (is_null($accpayable))
            throw new \Exception("Couldn't Create Journal");

        $transaction = array(
            array(
                'account_head' => $bill->account_head,
                'dr' => $bill->amount,
                'cr' => null,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_head' => $accpayable,
                'dr' => null,
                'cr' => $bill->amount,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            )
        );
        JournalTransaction::insert($transaction);
        $ledger = new LedgerController();
        $ledger->store($journal);
    }
}
