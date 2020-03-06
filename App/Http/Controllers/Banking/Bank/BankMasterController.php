<?php

namespace App\Http\Controllers\Banking\Bank;

use App\Model\Account;
use App\Model\BankTable;
use App\Model\BankMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Lib\Filter\BankMasterFilter;

class BankMasterController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.bankmaster.index");
    }

    public function bankData(Request $request)
    {
        // $bankmaster = BankMaster::all();
        $query = BankMaster::where('is_deleted', 0);
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
        $queryFilter = new BankMasterFilter($request);
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
        // return $bankmaster;
    }


    public function getCompany()
    {
        $companies = Account::where('is_deleted', 0)->get();
        return response()->json($companies);
    }


    public function viewBankMaster(int $id)
    {
        return view(default_template() . ".pages.bankmaster.inc.view-bank-master", compact('id'));
    }

    public function bankBoxData(Request $request, int $id)
    {
        $grand_total = 0;
        $data = BankTable::where(['bank_master_id' => $id, 'is_deleted' => 0])->get();
        foreach ($data as $key => $cm) {
            $total = $cm->dr - $cm->cr;
            $grand_total += $total;
            $cm->balance = $grand_total;
        }
        return response()->json($data);
    }


    /**
     * query for bankBalance
     * @return mixed
     */
    private static function getBankBalanceQuery()
    {
        return DB::table('bank_masters')
            ->leftJoin('bank_tables', 'bank_tables.bank_master_id', 'bank_masters.id')
            ->leftJoin('accounts', 'accounts.id', 'bank_masters.account_id')
            ->select(DB::raw('sum(dr)-sum(cr) as available_amount'));
    }

    public static function getBankBalance($bankMaster = null)
    {
        $query = self::getBankBalanceQuery();
        if ($bankMaster != null) :
            $data = $query->where('bank_masters.id', $bankMaster)
                ->where('bank_masters.is_deleted', 0)
                ->groupBy('bank_masters.id')
                ->first();
        else :
            $data = $query->first();
        endif;
        return $data->available_amount;
    }
}
