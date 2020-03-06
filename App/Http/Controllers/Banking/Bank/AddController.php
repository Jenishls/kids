<?php

namespace App\Http\Controllers\Banking\Bank;

use App\Model\Journal;
use App\Model\BankTable;
use App\Model\BankMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Model\AccountSubHeadItem;
use App\Model\JournalTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Banking\Bank\BankMasterController;
use App\Model\OpeningBalance;

class AddController extends BankMasterController
{
    public function addBankMasterModal()
    {
        return view(default_template() . ".pages.bankmaster.add.add-bm-modal");
    }

    /**
     * Create New Bank Acocunt
     *
     * @param Request $request
     * @return response
     */
    public function createBankMaster(Request $request)
    {
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
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id() ?: 0,
            'opened_date' => $opened_date,
        ];
        $data = $request->except(['_token', 'opened_date']);
        $add = array_merge($data, $arr);
        $bank_m = BankMaster::create($add);
        if (!$bank_m) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Added Successfully']);
    }


    public function addFundModal(int $id)
    {
        $b_master = BankMaster::find($id);
        return view(default_template() . ".pages.bankmaster.add.add-fund-to-account", compact('b_master'));
    }

    /**
     * Bank Account Transaction (Deposit)
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function createBankTable(Request $request, int $id)
    {
        $bankMaster = BankMaster::find($id);
        $request->validate([
            'amount' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if (count(BankTable::where([['is_deleted', 0], ['bank_master_id', $bankMaster->id]])->get()) == 0) {
                $this->createOpeningBalance($request);
            }
            $bankBox = new BankTable();
            $bankBox->dr = $request->amount;
            $bankBox->cr = 0;
            $bankBox->bank_master_id = $bankMaster->id;
            $bankBox->userc_id = auth()->id();
            $bankBox->description = $request->amount . " added to Bank " . $bankMaster->name;
            $bankBox->save();
            $this->generateJournal($request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Bank Account Transaction(Withdraw)
     *
     * @param Request $request
     * @return void
     */
    public function withdrawAmount(Request $request)
    {
        $bankMaster = BankMaster::find($request->bank_master_id);
        $request->validate([
            'amount' => 'required',
            'cheque_no' => 'required',
        ]);
        $bankBox = new BankTable();
        $bankBox->dr = 0;
        $bankBox->cr = $request->amount;
        $bankBox->cheque_no = $request->cheque_no;
        $bankBox->bank_master_id = $bankMaster->id;
        $bankBox->userc_id = Auth::id();
        $bankBox->description = $request->amount . " withdraw from " . $bankMaster->name . " by cheque no " . $request->cheque_no;
        $bankBox->save();
    }

    /**
     * Generate Journal for every bank transaction(Deposit/Withdraw)
     *
     * @param array $request
     * @return void
     */
    public function generateJournal($request)
    {
        $journal = new Journal();
        $journal->journal_date = date('Y-m-d');
        $journal->description = "Cash Deposited into bank from owner";
        $journal->userc_id = Auth::id();
        $journal->save();
        $journal->ref_no = str_pad($journal->id, 5, '0', STR_PAD_LEFT);
        $journal->save();

        $savingAccount = AccountSubHeadItem::where('code', 'savingAcct')->first()->id;
        $capital = AccountSubHeadItem::where('code', 'OwnerInvestmentDrawings')->first()->id;


        if (is_null($savingAccount))
            throw new \Exception("Couldn't Create Journal");

        if (is_null($capital))
            throw new \Exception("Couldn't Create Journal");


        $transaction = array(
            array(
                'account_head' => $savingAccount,
                'dr' => $request->amount,
                'cr' => null,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_head' => $capital,
                'dr' => null,
                'cr' => $request->amount,
                'journal_id' => $journal->id,
                'created_at' => date('Y-m-d H:i:s')
            )
        );
        JournalTransaction::insert($transaction);
    }

    /**
     * Create default opening balance if not already exist for the account
     *
     * @param array $request
     * @return void
     */
    public function createOpeningBalance($request)
    {
        $account = AccountSubHeadItem::where('code', 'savingAcct')->first();
        $fiscal_year = Carbon::parse(now())->format('Y-01-01');
        $op_balance = OpeningBalance::where('account_head', $account->id)->first();
        if (is_null($op_balance)) {
            $balance = new OpeningBalance();
            $balance->account_head = $account->id;
            $balance->dr_amount = $request->amount;
            $balance->fiscal_year = $fiscal_year;
            $balance->cr_amount = 0;
            $balance->userc_id = auth()->id() ?: 0;
            $balance->created_at = date('Y-m-d H:i:s');
            $balance->save();
        } else {
            $op_balance->dr_amount = $op_balance->dr_amount + $request->amount;
            $op_balance->save();
        }
    }
}
