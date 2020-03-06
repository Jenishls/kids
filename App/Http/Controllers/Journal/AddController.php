<?php

namespace App\Http\Controllers\Journal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Journal;
use App\Model\JournalTransaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AddController extends JournalController
{
    public function addJournal()
    {
        return view(default_template() . ".pages.journal.add.add-journal-modal");
    }

    public function createJournal(Request $request)
    {
        $request->validate([
            'journal_date' => 'required',
            'description' => 'required',
            'debit' => 'required',
            'credit' => 'required',
            'account_head' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $journal = new Journal();
            $journal->journal_date = Carbon::parse($request->journal_date)->format('Y-m-d');
            $journal->description = $request->description;
            $journal->ref_no = 0;
            $journal->created_at = date('Y-m-d H:i:s');
            $journal->userc_id = auth()->id() ?: 0;
            $journal->save();
            $journal->ref_no = str_pad($journal->id, 5, '0', STR_PAD_LEFT);
            $journal->save();

            $this->addJournalTransaction($request, $journal);
            DB::commit();
            return response()->json(['message' => 'Journal Added'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 422);
        }
    }

    public function addJournalTransaction($request, $journal)
    {
        $credit = $request->credit;
        $debit = $request->debit;
        $acc_head = $request->account_head;
        $description = $request->jt_description;
        $credit_length = count($credit);
        $debit_length = count($debit);
        $sum_cr = array_sum($credit);
        $sum_dr = array_sum($debit);
        if (($credit_length >= 2 && $debit_length >= 2) && ($credit_length = $debit_length)) {
            if ($sum_dr == $sum_cr) {
                $l = $debit_length > $credit_length ? $debit_length : $credit_length;
                $data = array();
                for ($i = 0; $i < $l; $i++) {
                    if (isset($acc_head[$i])) {
                        if ((is_null($debit[$i]) && !is_null($credit[$i])) || (!is_null($debit[$i]) && is_null($credit[$i]) || (($debit[$i] == 0) && ($credit[$i] != 0)) || (($debit[$i] != 0) && ($credit[$i] == 0)))) {
                            $transaction = array(
                                'account_head' => $acc_head[$i],
                                'dr' => $debit[$i],
                                'cr' => $credit[$i],
                                'journal_id' => $journal->id,
                                'description' => $description[$i],
                                'created_at' => date('Y-m-d H:i:s'),
                                'userc_id' => auth()->id(),
                            );
                            array_push($data, $transaction);
                        } else {
                            $error = "Debit Amount and Credit Amount can't be in same field";
                            throw new \Exception($error);
                        }
                    } else {
                        $error = "Account head is missing";
                        throw new \Exception($error);
                    }
                }
                JournalTransaction::insert($data);
            } else {
                $error = "debit and credit are not equal";
                throw new \Exception($error);
            }
        } else {
            $error = "debit or credit is missing";
            throw new \Exception($error);
        }
    }
}
