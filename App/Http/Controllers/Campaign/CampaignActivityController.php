<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign\Campaign;
use App\Model\Campaign\CampaignActivity;
use App\Lib\Filter\CampaignActivityFilter;

class CampaignActivityController extends Controller
{
    protected $viewPath = 'supportNew.pages.campaign.activities.';
   /**
    * list Page
    * @param - Request instance
    * @return - index view
    */
    public function list(Request $request,Campaign $campaign)
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
        $query = $campaign->activities();
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new CampaignActivityFilter($request);
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

    public function view(Request $request,CampaignActivity $activity)
    {
        return view($this->viewPath."view", compact('activity'));
    }
    
}
