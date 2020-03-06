<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\CampaignFilter;
use App\Model\Campaign\Campaign;


class CampaignController extends Controller
{
	protected $viewPath = 'supportNew.pages.campaign.';
    /**
    * Access Main Campagin list Page
    * @param - Request instance and campaign type parameter
    * @return - index view
    */
    public function index(Request $request)
    {
    	return view($this->viewPath.'datatable');
    }
    /**
    * list Page
    * @param - Request instance
    * @return - index view
    */
    public function list(Request $request)
    {
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
        $query = Campaign::where("is_deleted", 0);
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new CampaignFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
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

    public function view(Campaign $campaign)
    {
        $audits = \App\Model\Audit::Where('table_name', 'App\Model\Address')
        ->orWhere('table_name', 'App\Model\Order')
        ->orWhere('table_name', 'App\Model\Payment')
        ->orderBy('created_at','desc')
        ->get();
        $order= \App\Model\Order::find(1);
        return view($this->viewPath.'view',compact('campaign','order','audits'));
    }

    public function activities(Campaign $campaign)
    {
        return view($this->viewPath.'activities.index',compact('campaign'));
    }
    
    public function add()
    {
        return view($this->viewPath.'modal.add');
    }
    public function edit(Campaign $campaign)
    {
        return view($this->viewPath.'modal.edit',compact('campaign'));
    }
    public function test()
    {
        return view($this->viewPath.'modal.status');
    }
    public function statusModal(Request $request, Campaign $campaign){
		$status = $request->status;
    	return view('supportNew.pages.campaign.modal.status', compact('campaign','status'));
    }
}
