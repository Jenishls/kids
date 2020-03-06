<?php

namespace App\Traits\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Campaign\Campaign;
use App\Model\Campaign\CampaignActivity;

trait CampaignTrait{

    public function campaignStoreArr($request)
    {
        return [
            'name'=>$request->name,
            'campaign_code'=>$request->campaign_code,
            'start_date'=> $request->start_date?Carbon::parse($request->start_date)->format('Y-m-d H:i:s'):NULL,
            'end_date' =>$request->end_date?Carbon::parse($request->end_date)->format('Y-m-d H:i:s'):NULL,
            'budget'=> (float)preg_replace("/[^0-9.]/", "", $request->budget),
        ];
    }
    public function campaignUpdateArr($request)
    {
        return [
            'name'=>$request->name,
            'campaign_code'=>$request->campaign_code,
            'start_date'=> $request->start_date?Carbon::parse($request->start_date)->format('Y-m-d H:i:s'):NULL,
            'end_date' =>$request->end_date?Carbon::parse($request->end_date)->format('Y-m-d H:i:s'):NULL,
            'budget'=> (float)preg_replace("/[^0-9.]/", "", $request->budget),
        ];
    }
    public function storeCampaignActivites(Request $request, Campaign $campaign)
    {
        if(is_array($request->activity_id))
        {
            foreach($request->activity_id as $key => $activity)
            {
                if(!$activity)
                {
                    $campaign->activities()->create([
                        'campaign_id' => $campaign->id,
                        'name'=> $request->activity_name[$key],
                        'budget' => (float)preg_replace("/[^0-9.]/", "", $request->activity_budget[$key]),
                        'user_id' =>  $request->activity_user_id[$key],
                        'start_date'=> $request->activity_start_date[$key]?Carbon::parse($request->activity_start_date[$key])->format('Y-m-d H:i:s'):NULL,
                        'end_date' =>$request->activity_end_date[$key]?Carbon::parse($request->activity_end_date[$key])->format('Y-m-d H:i:s'):NULL,
                        'type' => $request->activity_type[$key]
                    ]);
                }
                else{
                    $fActivity= CampaignActivity::find($activity);
                    if($fActivity)
                    {
                        $fActivity->update([
                            'name'=> $request->activity_name[$key],
                            'budget' => (float)preg_replace("/[^0-9.]/", "", $request->activity_budget[$key]),
                            'user_id' => $request->activity_user_id[$key],
                            'start_date'=> $request->activity_start_date[$key]?Carbon::parse($request->activity_start_date[$key])->format('Y-m-d H:i:s'):NULL,
                            'end_date' =>$request->activity_end_date[$key]?Carbon::parse($request->activity_end_date[$key])->format('Y-m-d H:i:s'):NULL,
                            'type' => $request->activity_type[$key]
                        ]);
                    }
                }
            }
        }
        if(is_array($request->deleted_activity_id))
        {
            foreach($request->deleted_activity_id as $key => $activity)
            {
                $dActivity= CampaignActivity::find($activity);
                if($dActivity)
                {
                    $dActivity->update([
                       'is_deleted' => 1,
                       'userd_id' => auth()->check()?auth()->user()->id:0
                    ]);
                
                }
            }
        }
       
        return $campaign->activities();
    }
}