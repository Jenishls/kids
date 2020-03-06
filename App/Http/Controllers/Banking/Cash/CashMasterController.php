<?php

namespace App\Http\Controllers\Banking\Cash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\CashMasterFilter;
use App\Model\BankMaster;
use App\Model\CashBox;
use App\Model\CashMaster;
use App\User;

class CashMasterController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.cashmaster.index");
    }

    public function cashData(Request $request)
    {
        // $data = CashMaster::where('is_deleted', 0)->get();
        $query = CashMaster::where('is_deleted', 0);
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
            if ($sort['field'] === 'member_id') {
                return $q->whereHas('user', function ($qry) use ($sort) {
                    return $qry->orderBy('name', $sort['sort']);
                });
            }
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new CashMasterFilter($request);
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
    }

    public function viewCashMaster(int $id)
    {
        return view(default_template() . ".pages.cashmaster.inc.view-cash-master", compact('id'));
    }

    public function cashBoxData(Request $request, int $id)
    {
        $grand_total = 0;
        $data = CashBox::where(['is_deleted' => 0, 'cash_master_id' => $id])->get();
        foreach ($data as $key => $cm) {
            $total = $cm->dr - $cm->cr;
            $grand_total += $total;
            $cm->balance = $grand_total;
        }
        return response()->json($data);
    }

    public function getMember()
    {
        $users = User::where('is_deleted', 0)->get();
        return response()->json($users);
    }

    public function getBankMaster()
    {
        $b_masters = BankMaster::where('is_deleted', 0)->get();
        return response()->json($b_masters);
    }
}
