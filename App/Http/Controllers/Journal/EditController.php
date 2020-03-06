<?php

namespace App\Http\Controllers\Journal;

use App\Model\Journal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Journal\AddController as JournalAddController;
use App\Http\Controllers\Ledger\LedgerController;
use App\Model\JournalTransaction;

class EditController extends JournalController
{
    public function editJournal(Journal $journal)
    {
        return view(default_template() . ".pages.journal.edit.edit-journal-modal", compact('journal'));
    }

    public function updateJournal(Request $request, Journal $journal)
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
            $journal->journal_date = Carbon::parse($request->journal_date)->format('Y-m-d');
            $journal->description = $request->description;
            $journal->updated_at = date('Y-m-d H:i:s');
            $journal->useru_id = auth()->id() ?: 0;
            $journal->save();

            $addController = new JournalAddController();
            JournalTransaction::where('journal_id', $journal->id)->delete();
            $addController->addJournalTransaction($request, $journal);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 422);
        }
    }


    public function approveJournal(Journal $journal)
    {
        // dd($journal);
        $journal->status = 1;
        $journal->approved_by = auth()->id();
        $journal->save();
        $ledger = new LedgerController();
        $ledger->store($journal);
    }

    public function rejectJournal(Journal $journal)
    {
        $journal->status = 0;
        $journal->save();
    }
}
