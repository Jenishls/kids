<?php

namespace App\Http\Controllers\Openingbalance;

use Illuminate\Http\Request;
use App\Model\OpeningBalance;
use App\Model\AccountSubHeadItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Journal;
use App\Model\JournalTransaction;
use Illuminate\Support\Carbon;

class OpeningBalanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('fiscal_year')) :
            $year = strtotime($request->fiscal_year . '-01-01 00:00:00');
            $f_year = date('Y-m-d H:i:s', $year);
        else :
            $f_year = date('Y-m-d H:i:s');
        endif;
        $yearcookie = $request->fiscal_year ?: '';
        // dd($yearcookie);
        // $accounts = AccountSubHeadItem::all();
        $accounts = DB::table('account_sub_head_items as items')
            ->join('account_heads', 'items.account_head_id', 'account_heads.id')
            ->leftJoin('opening_balances', 'items.id', 'opening_balances.account_head')
            ->select('items.*', 'account_heads.type', 'opening_balances.dr_amount', 'opening_balances.cr_amount')
            ->where('items.is_deleted', 0)
            ->when($request->fiscal_year, function ($q) use ($f_year) {
                return $q->where('opening_balances.fiscal_year', Carbon::parse($f_year)->format('Y-01-01 00:00:00'));
            })
            ->get();
        // dd($accounts->toSql());
        return view(default_template() . ".pages.openingbalance.index", compact('accounts', 'yearcookie'));
    }

    public function saveData(Request $request)
    {
        $data = $request->data;
        DB::beginTransaction();
        try {
            $transaction  = array();
            if (count($data) > 0) {
                foreach ($data as $k => $v) {
                    if (!$this->checkIfAlreadyExist($v['account_head'])) {
                        if ($v['type'] == 'debit') {
                            $item = array(
                                'account_head' => $v['account_head'],
                                'dr_amount' => $v['amount'],
                                'cr_amount' => 0,
                                'fiscal_year' => Carbon::parse($v['fiscal_year'])->format('Y-01-01'),
                                'created_at' => date('Y-m-d H:i:s'),
                                'userc_id' => auth()->id() ?: 0,
                            );
                        } elseif ($v['type'] == 'credit') {
                            $item = array(
                                'account_head' => $v['account_head'],
                                'dr_amount' => 0,
                                'cr_amount' => $v['amount'],
                                'fiscal_year' => Carbon::parse($v['fiscal_year'])->format('Y-01-01'),
                                'created_at' => date('Y-m-d H:i:s'),
                                'userc_id' => auth()->id() ?: 0,
                            );
                        }
                        array_push($transaction, $item);
                    } else {
                        // update opening balance if exists
                        $this->updateOpeningBalance($v);
                    }
                }
                OpeningBalance::insert($transaction);

                if (count($transaction) > 0) {
                    $this->generateJournal($data);
                }
                // journal??
                DB::commit();
            }
            // $r = ['fiscal_year' => ''];
            return $this->index($request);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message', $e->getMessage()], 422);
        }
    }

    public function checkIfAlreadyExist($acc_head)
    {
        $count = OpeningBalance::where('account_head', $acc_head)->count();
        return $count > 0;
    }


    public function generateJournal($data)
    {
        $dr_amount = 0;
        $cr_amount = 0;
        $journal = new Journal();
        $journal->table = 'opening_balances';
        $journal->journal_date = date('Y-m-d H:i:s');
        $journal->created_at = date('Y-m-d H:i:s');
        $journal->userc_id = auth()->id() ?: 0;
        $journal->description = 'Opening Journal Entry';
        $journal->save();
        $journal->ref_no = str_pad($journal->id, 5, '0', STR_PAD_LEFT);
        $journal->save();

        $transaction = array();
        foreach ($data as $k => $v) {
            if ($v['type'] == 'debit') {
                $dr_amount += $v['amount'];
                $item = array(
                    'journal_id' => $journal->id,
                    'account_head' => $v['account_head'],
                    'dr' => $v['amount'],
                    'cr' => NULL,
                    'created_at' => date('Y-m-d H:i:s'),
                    'userc_id' => auth()->id() ?: 0
                );
            } elseif ($v['type'] == 'credit') {
                $cr_amount += $v['amount'];
                $item = array(
                    'journal_id' => $journal->id,
                    'account_head' => $v['account_head'],
                    'dr' => NULL,
                    'cr' => $v['amount'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'userc_id' => auth()->id() ?: 0
                );
            }
            array_push($transaction, $item);
        }
        $item = $this->calculateOverallJournalAmount($dr_amount, $cr_amount, $journal->id);
        if (is_array($item)) {
            array_push($transaction, $item);
        }
        JournalTransaction::insert($transaction);
    }


    public function updateOpeningBalance($data)
    {
        $ob = OpeningBalance::where('account_head', $data['account_head'])->first();
        if ($data['type'] == 'debit') {
            $item = array(
                'account_head' => $data['account_head'],
                'dr_amount' => $data['amount'],
                'cr_amount' => 0,
                'fiscal_year' => Carbon::parse($data['fiscal_year'])->format('Y-01-01'),
                'updated_at' => date('Y-m-d H:i:s'),
                'useru_id' => auth()->id() ?: 0,
            );
        } elseif ($data['type'] == 'credit') {
            $item = array(
                'account_head' => $data['account_head'],
                'dr_amount' => 0,
                'cr_amount' => $data['amount'],
                'fiscal_year' => Carbon::parse($data['fiscal_year'])->format('Y-01-01'),
                'updated_at' => date('Y-m-d H:i:s'),
                'useru_id' => auth()->id() ?: 0,
            );
        }
        $ob->update($item);
    }

    public function calculateOverallJournalAmount($dr, $cr, $journal_id)
    {
        $accHead = AccountSubHeadItem::where('code', 'OwnerInvestmentDrawings')->first();
        if (is_null($accHead->id)) {
            throw new \Exception("Journal could not be created");
        }
        if ($cr < $dr) {
            $item = array(
                'account_head' => $accHead->id,
                'journal_id' => $journal_id,
                'cr' => $dr - $cr,
                'dr' => NULL,
                'created_at' => date('Y-m-d H:i:s'),
                'userc_id' => auth()->id() ?: 0
            );
            return $item;
        } elseif ($cr > $dr) {
            $item = array(
                'account_head' => $accHead->id,
                'journal_id' => $journal_id,
                'cr' => NULL,
                'dr' => $cr - $dr,
                'created_at' => date('Y-m-d H:i:s'),
                'userc_id' => auth()->id() ?: 0
            );
            return $item;
        }
        return false;
    }
}
