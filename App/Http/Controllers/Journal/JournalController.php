<?php

namespace App\Http\Controllers\Journal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\JournalFilter;
use App\Model\AccountHead;
use App\Model\Journal;
use App\Model\JournalTransaction;

class JournalController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.journal.index");
    }

    public function journalList(Request $request)
    {
        // $data = Journal::all();
        $query = Journal::where('is_deleted', 0);
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
            if ($sort['field'] === 'dr_acchead' || $sort['field'] === 'cr_acchead') {
                return $q->whereHas('transactions', function ($qry) use ($sort) {
                    return $qry->whereHas('accountHead', function ($qq) use ($sort) {
                        return $qq->orderBy('name', $sort['sort']);
                    });
                });
            }
            if ($sort['field'] === 'amount') {
                return $q->whereHas('transactions', function ($qry) use ($sort) {
                    return $qry->orderBy(\DB::raw('SUM(dr)'), $sort['sort']);
                });
            }
            if ($sort['field'] === 'userc_id') {
                return $q->whereHas('preparedUser', function ($qry) use ($sort) {
                    return $qry->orderBy('name', $sort['sort']);
                });
            }
            if ($sort['field'] === 'approved_by') {
                return $q->whereHas('approvedUser', function ($qry) use ($sort) {
                    return $qry->orderBy('name', $sort['sort']);
                });
            }
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new JournalFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        // dd($queryBuilder->get());
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
        foreach ($data['data'] as $jr) {
            $amount = 0;

            foreach ($jr->transactions as $key => $tr) {
                if (!is_null($tr->dr)) {
                    $amount += $tr->dr;
                }
            }

            $jr->amount = $amount;
        }
        return response()->json($data);
    }


    public function getJournal(Journal $journal)
    {
        return view(default_template() . ".pages.journal.inc.view-journal-modal", compact('journal'));
    }


    public function getAccountHeads(Request $request)
    {
        $accountHead = AccountHead::all();
        $parent = array();
        foreach ($accountHead as $key => $a_head) {
            $head['id'] = $a_head->id;
            $head['text'] = $a_head->name;
            $children = array();
            $acc_subheads = $a_head->accountSubHeadItem()->where('name', 'like', "%$request->term%")->get();
            foreach ($acc_subheads as $key => $a_subhead) {
                $subhead['id'] = $a_subhead->id;
                $subhead['text'] = trim($a_subhead->name);
                array_push($children, $subhead);
            }
            $head['children'] = $children;
            // dd($children);
            if (count($children) > 0) {
                array_push($parent, $head);
            }
        }
        return response()->json($parent);
    }

    public function getTransactions(Request $request, Journal $journal)
    {
        $data = JournalTransaction::where('journal_id', $journal->id)->get();
        foreach ($data as $key => $transaction) {
            $transaction->ref_no = $journal->ref_no;
        }
        return response()->json($data);
    }
}
