<?php

namespace App\Http\Controllers\Bills;

use App\Model\Bill;
use App\Model\Member;
use App\Model\Account;
use App\Model\Journal;
use Illuminate\Http\Request;
use App\Model\AccountSubHeadItem;
use App\Model\JournalTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Lib\Filter\BillFilter;
use App\Model\Note;
use Illuminate\Support\Facades\Auth;

class BillsController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.bills.index");
    }

    public function billsData(Request $request)
    {
        // $bills = Bill::where('is_deleted', 0)->get();
        $query = Bill::where('is_deleted', 0);
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
        $queryFilter = new BillFilter($request);
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
        return response()->json($data);
        // return $bills;
    }


    public function getMembers()
    {
        $members = Member::select(\DB::raw("CONCAT_WS(' ', first_name, middle_name, last_name)as text"), 'id', 'id as user_id')->where('is_deleted', 0)->get();
        // $members = Member::select(\DB::raw("CONCAT(salutation,' ',first_name,' ',middle_name,' ',last_name) AS text"), 'id', 'id as user_id')->where('is_deleted', 0)->get();
        return response()->json($members);
    }

    public function getAccounts()
    {
        $accounts = Account::where('is_deleted', 0)->select('company_name as text', 'id', 'id as user_id')->get();
        return response()->json($accounts);
    }


    public function getAccountHead(Request $request, string $type = NULL)
    {
        $data = DB::table('account_sub_head_items')
            ->join('account_heads', 'account_heads.id', 'account_sub_head_items.account_head_id')
            ->select('account_sub_head_items.name as text', 'account_sub_head_items.id')
            ->where([
                ['account_heads.code', $type],
                ['account_sub_head_items.name', 'like', "%$request->term%"]
            ])->orWhere([
                ['account_heads.type', $type],
                ['account_sub_head_items.name', 'like', "%$request->term%"]
            ])
            ->get();
        return response()->json($data);
    }


    public function viewBill(int $id)
    {
        $bill = Bill::find($id);
        return view(default_template() . ".pages.bills.inc.view-bill", compact('bill'));
    }

    public function printBill(Bill $bill)
    {
        return view(default_template() . ".pages.bills.inc.bill-print", compact('bill'));
    }

    public function cancelBillModal(Bill $bill)
    {
        return view(default_template() . ".pages.bills.edit.cancel-reason", compact('bill'));
    }


    public function viewBillNote(Bill $bill)
    {
        $notes = Note::where(['table' => 'bills', 'table_id' => $bill->id])->get();
        return view(default_template() . ".pages.bills.inc.note-view", compact('notes', 'bill'));
    }


    public function fileUploadModal(Bill $bill)
    {
        return view(default_template() . ".pages.bills.add.file-upload", compact('bill'));
    }
}
