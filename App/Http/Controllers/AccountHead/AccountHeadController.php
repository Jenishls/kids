<?php

namespace App\Http\Controllers\AccountHead;

use App\Model\AccountHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Lib\Filter\AccountHeadFilter;
use App\Lib\Filter\AccountSubHeadFilter;
use App\Lib\Filter\AccSubHeadItemsFilter;

class AccountHeadController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.accounthead.index");
    }

    public function accountHeadData(Request $request)
    {
        $query = AccountHead::where('is_deleted', 0);
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
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new AccountHeadFilter($request);
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

    public function getTabs(string $tab)
    {
        if ($tab === 'accounthead') {
            return view(default_template() . ".pages.accounthead.inc.account-head-view");
        }
        if ($tab === "subhead") {
            return view(default_template() . ".pages.accounthead.inc.account-subhead-view");
        }
        if ($tab === "subheaditems") {
            return view(default_template() . ".pages.accounthead.inc.account-subhead-items-view");
        }
    }

    public function subHeadData(Request $request)
    {
        if ($request->has('acc_head_id')) :
            $query = ['ah.id', $request->acc_head_id];
        else :
            $query = ["ah.id", "!=", null];
        endif;
        $data = DB::table('account_sub_heads as ash')
            ->join('account_heads as ah', 'ah.id', 'ash.account_head_id')
            ->select('ash.*', 'ah.name as account_head')
            ->where([
                ['ah.is_deleted', 0],
                ['ash.is_deleted', 0],
                ['ash.name', 'like', "%$request->term%"],
                $query
            ])->get();
        return response()->json($data);
    }
    /**
     * Account Sub Head Data
     *
     * @param Request $request
     * @return void
     */
    public function getSubheadData(Request $request)
    {
        if ($request->has('acc_head_id')) :
            $subquery = ['ah.id', $request->acc_head_id];
        else :
            $subquery = ["ah.id", "!=", null];
        endif;
        $query = DB::table('account_sub_heads as ash')
            ->join('account_heads as ah', 'ah.id', 'ash.account_head_id')
            ->select('ash.*', 'ah.name as account_head')
            ->where([
                ['ah.is_deleted', 0],
                ['ash.is_deleted', 0],
                ['ash.name', 'like', "%$request->term%"],
                $subquery
            ]);
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
            $f = $sort['field'];
            if ($sort['field'] === 'account_head') {
                return $q->orderBy('ah.name', $sort['sort']);
            }
            return $q->orderBy("ash.$f", $sort['sort']);
        });
        $queryFilter = new AccountSubHeadFilter($request);
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

    /**
     * Account Subhead Items Data
     *
     * @param Request $request
     * @return void
     */
    public function getSubheadItemData(Request $request)
    {
        $query = DB::table('account_sub_head_items as ashi')
            ->join('account_heads as ah', 'ah.id', 'ashi.account_head_id')
            ->join('account_sub_heads as ash', 'ash.id', 'ashi.account_sub_head_id')
            ->select('ashi.*', 'ah.name as account_head', 'ash.name as account_sub_head')
            ->where([
                ['ashi.is_deleted', 0],
                ['ah.is_deleted', 0],
                ['ash.is_deleted', 0],
                ['ashi.name', 'like', "%$request->term%"]
            ]);
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
            $f = $sort['field'];
            if ($sort['field'] === 'account_head') {
                return $q->orderBy('ah.name', $sort['sort']);
            }
            if ($sort['field'] === 'account_sub_head') {
                return $q->orderBy('ash.name', $sort['sort']);
            }
            return $q->orderBy("ashi.$f", $sort['sort']);
        });
        $queryFilter = new AccSubHeadItemsFilter($request);
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

    public function getAccountHeadData(Request $request)
    {
        $data = DB::table('account_heads')->select('*')->where([
            ['is_deleted', 0],
            ['name', 'like', "%$request->term%"]
        ])->get();
        return response()->json($data);
    }
}
