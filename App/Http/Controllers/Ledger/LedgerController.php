<?php

namespace App\Http\Controllers\Ledger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\LedgerFilter;
use App\Model\Journal;
use App\Model\Ledger;
use Illuminate\Support\Facades\DB;

class LedgerController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.ledger.index");
    }

    public function ledgerList(Request $request)
    {
        // dd($request->all());
        // $ledgers = Ledger::all();
        $query = Ledger::where('is_deleted', 0);
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query->when($request->sort, function ($q, $sort) use ($request) {
            if ($sort['field'] === 'account_head_item') {
                return $q->whereHas('accountHeadItem', function ($qry) use ($sort) {
                    return $qry->orderBy('name', $sort['sort']);
                });
            }
            if ($sort['field'] === 'dr_amount') {
                return $q->where('payment_type', 'Dr')->orderBy('amount', $sort['sort']);
            }
            if ($sort['field'] === 'cr_amount') {
                return $q->where('payment_type', 'Cr')->orderBy('amount', $sort['sort']);
            }
            if ($sort['field'] === 'balance') {
                return $q->orderBy('amount', $sort['sort']);
            }
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new LedgerFilter($request);
        $queryBuilder  = $queryFilter->getQuery($query);
        // dd($queryBuilder->toSql());
        $total = $queryBuilder->count();
        $paginatedBuilder =  $queryBuilder->limit($perPage)
            ->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $paginatedBuilder->get();
        return response()->json($data);
    }

    /**
     * Store Ledger Entry
     *
     * @param Journal $journal
     * @return void
     */
    public function store(Journal $journal)
    {
        DB::beginTransaction();
        try {
            $transaction = $journal->transactions;
            foreach ($transaction as $key => $j_transcation) {
                if (!is_null($j_transcation->dr)) {
                    $cr = $journal->transactions()->whereNotNull('cr')->get();
                    $sum = $journal->transactions()->whereNotNull('cr')->sum('cr');

                    if ($sum == $j_transcation->dr) {
                        foreach ($cr as $key => $credit) {
                            $ledger = new Ledger();
                            $ledger->account_head = $j_transcation->account_head;
                            $ledger->ledger_date = $journal->journal_date;
                            $ledger->account_sub_head_items = $credit->account_head;
                            $ledger->reference_no = $journal->ref_no;
                            $ledger->payment_type = 'Dr';
                            $ledger->amount = $credit->cr;
                            $ledger->remarks = $credit->description;
                            $ledger->table = $journal->table;
                            $ledger->table_id = $journal->table_id;
                            if ($journal->table == 'bills') {
                                $ledger->table = 'bills';
                                $ledger->bill_id = $journal->table_id;
                            }
                            $ledger->created_at = date('Y-m-d H:i:s');
                            $ledger->userc_id = auth()->id() ?: 0;
                            $ledger->save();
                        }
                    } else {
                        $count = $journal->transactions()->whereNotNull('cr')->count();

                        $ledger = new Ledger();
                        $ledger->account_head = $j_transcation->account_head;
                        $ledger->ledger_date = $journal->journal_date;
                        $ledger->account_sub_head_items = $count = 1 ? $cr[0]->account_head : null;
                        $ledger->reference_no = $journal->ref_no;
                        $ledger->payment_type = 'Dr';
                        $ledger->amount = $j_transcation->dr;
                        $ledger->remarks = $j_transcation->description;
                        $ledger->table = $journal->table;
                        $ledger->table_id = $journal->table_id;
                        if ($journal->table == 'bills') {
                            $ledger->table = 'bills';
                            $ledger->bill_id = $journal->table_id;
                        }
                        $ledger->created_at = date('Y-m-d H:i:s');
                        $ledger->userc_id = auth()->id() ?: 0;
                        $ledger->save();
                    }
                } elseif (!is_null($j_transcation->cr)) {
                    $dr = $journal->transactions()->whereNotNull('dr')->get();
                    $sum = $journal->transactions()->whereNotNull('dr')->sum('dr');


                    if ($sum == $j_transcation->dr) {
                        foreach ($dr as $key => $debit) {
                            $ledger = new Ledger();
                            $ledger->account_head = $j_transcation->account_head;
                            $ledger->ledger_date = $journal->journal_date;
                            $ledger->account_sub_head_items = $debit->account_head;
                            $ledger->reference_no = $journal->ref_no;
                            $ledger->payment_type = 'Cr';
                            $ledger->amount = $debit->dr;
                            $ledger->remarks = $debit->description;
                            $ledger->table = $journal->table;
                            $ledger->table_id = $journal->table_id;
                            if ($journal->table == 'bills') {
                                $ledger->bill_id = $journal->table_id;
                            }
                            $ledger->created_at = date('Y-m-d H:i:s');
                            $ledger->userc_id = auth()->id() ?: 0;
                            $ledger->save();
                        }
                    } else {
                        $count = $journal->transactions()->whereNotNull('dr')->count();

                        $ledger = new Ledger();
                        $ledger->account_head = $j_transcation->account_head;
                        $ledger->ledger_date = $journal->journal_date;
                        $ledger->account_sub_head_items = $count = 1 ? $dr[0]->account_head : null;
                        $ledger->reference_no = $journal->ref_no;
                        $ledger->payment_type = 'Cr';
                        $ledger->amount = $j_transcation->cr;
                        $ledger->remarks = $j_transcation->description;
                        $ledger->table = $journal->table;
                        $ledger->table_id = $journal->table_id;
                        if ($journal->table == 'bills') {
                            $ledger->bill_id = $journal->table_id;
                        }
                        $ledger->created_at = date('Y-m-d H:i:s');
                        $ledger->userc_id = auth()->id() ?: 0;
                        $ledger->save();
                    }
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
