<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign\{Campaign,CampaignActivity};
use Carbon\Carbon;
use App\Traits\Campaign\CampaignTrait;

class CampaignStoreController extends Controller
{
    use CampaignTrait;
    /***
     * Main store functionality
     */
    public function store(Request $request)
    {
        $campaign = Campaign::create($this->campaignStoreArr($request));
        $activites= $this->storeCampaignActivites($request,$campaign);
        return response(['success'=>'Succesfully Created Campaign'],200);
    }
   
}
