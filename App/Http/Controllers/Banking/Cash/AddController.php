<?php

namespace App\Http\Controllers\Banking\Cash;

use Carbon\Carbon;
use App\Model\CashBox;
use App\Model\Journal;
use App\Model\BankMaster;
use App\Model\CashMaster;
use Illuminate\Http\Request;
use App\Model\AccountSubHeadItem;
use App\Model\JournalTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Banking\Bank\BankMasterController;
use App\Http\Controllers\Banking\Bank\AddController as BankMasterAddController;

class AddController extends CashMasterController
{
    public function addCashMasterModal()
    {
        return view(default_template() . ".pages.cashmaster.add.add-cm-modal");
    }

    public function createCashMaster(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'member_id' => 'required',
            // 'location' => 'required',
        ]);
        $arr = [
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id() ?: 0,

        ];
        $data = $request->except(['_token']);
        $add = array_merge($data, $arr);
        $cash_m = CashMaster::create($add);
        if (!$cash_m) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Added Successfully']);
    }


    public function addFundModal(int $id)
    {
        $c_master = CashMaster::find($id);
        return view(default_template() . ".pages.cashmaster.add.add-cm-fund", compact('c_master'));
    }


    public function transferFundModal(int $id)
    {
        $c_master = CashMaster::find($id);
        return view(default_template() . ".pages.cashmaster.add.transfer-fund-modal", compact('c_master'));
    }
    public function createCashBox(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'bank_master_id' => 'required',
            'cheque_no' => 'required',
            'amount' => 'required',
        ]);
        $c_master = CashMaster::find($id);
        $request->validate([
            'bank_master_id' => 'required',
            'cheque_no' => 'required',
            'amount' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $cashBox = new CashBox();
            $cashBox->dr = $request->amount;
            $cashBox->cr = 0;
            $cashBox->cash_master_id = $c_master->id;
            $cashBox->date = date('Y-m-d');
            $cashBox->userc_id = Auth::id();
            $cashBox->description = $request->amount . " added to Cash Master " . $c_master->name;
            $cashBox->save();
            $bankmaster = new BankMasterAddController();
            $bankBal = BankMasterController::getBankBalance($request->bank_master_id);
            if ($request->amount > $bankBal) :
                $error = "Insufficient Balance in Bank";
                throw new \Exception($error);
            endif;
            $bankmaster->withdrawAmount($request);
            $this->generateJournal($c_master, $request);
            DB::commit();
            return $this->index();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 422);
        }
    }


    public function transferFund(Request $request, CashMaster $cashMaster)
    {
        $request->validate([
            'bank_master_id' => 'required',
            'amount' => 'required',
        ]);
        DB::beginTransaction();
        try {
            /*---------Transfer Amount--------*/
            $bank = new BankMasterAddController;
            $bank->createBankTable($request, $request->bank_master_id);

            /*-------Deduct Amount From CashMaster-----------*/
            $this->withdrawAmount($request, $cashMaster);
            $this->generateJournal($cashMaster, $request, true);
            DB::commit();
            return $this->index();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function generateJournal(CashMaster $cashMaster, $request, $rev = false)
    {
        $bank = BankMaster::find($request->bank_master_id)->account->company_name;
        $journal = new Journal();
        $journal->journal_date = date('Y-m-d');
        $journal->description = "Cash Withdrawn From $bank cheque no: " . $request->cheque_no . " for CashMaster " . $cashMaster->name;
        if ($rev)
            $journal->description = "Cash Deposited into $bank from CashMaster " . $cashMaster->name;
        $journal->userc_id = Auth::id();
        $journal->save();
        $journal->ref_no = str_pad($journal->id, 5, '0', STR_PAD_LEFT);
        $journal->save();

        $savingAccount = AccountSubHeadItem::where('code', 'savingAcct')->first()->id;
        $cashInhand = AccountSubHeadItem::where('code', 'cashInHand')->first()->id;


        if (is_null($savingAccount))
            throw new \Exception("Couldn't Create Journal");


        $transaction = array(
            array(
                'account_head' => $rev ? $savingAccount : $cashInhand,
                'dr' => $request->amount,
                'cr' => null,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_head' => $rev ? $cashInhand : $savingAccount,
                'dr' => null,
                'cr' => $request->amount,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            )
        );
        JournalTransaction::insert($transaction);
    }

    public function withdrawAmount(Request $request, CashMaster $cashMaster = null)
    {
        if (is_null($cashMaster))
            $cashMaster = CashMaster::find($request->cash_master_id);
        $request->validate([
            'amount' => 'required',
        ]);
        $cashBox = new CashBox();
        $cashBox->dr = 0;
        $cashBox->cr = $request->amount;
        $cashBox->cash_master_id = $cashMaster->id;
        $cashBox->date = date('Y-m-d');
        $cashBox->userc_id = Auth::id();
        $cashBox->description = $request->amount . " withdrawn from  " . $cashMaster->name;
        $cashBox->save();
    }
}
