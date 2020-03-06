<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign\Campaign;
use App\Traits\Campaign\CampaignTrait;
class CampaignUpdateController extends Controller
{
    use CampaignTrait;
    /**
     * General update
     */
    public function general(Request $request,Campaign $campaign)
    {
        $updated = $campaign->update($this->campaignUpdateArr($request));
        if($updated)
        {
            return response(['success' => 'Campaign Information Updated!'],200);
        }
    }
    /**
     * General update
     */
    public function activities(Request $request,Campaign $campaign)
    {
        $updated= $this->storeCampaignActivites($request,$campaign);
        if($updated)
        {
            return response(['success' => 'Activites Information Updated!'],200);
        }
    }
    // Order Update
    public function status(Request $request, Campaign $campaign)
    {
        \DB::beginTransaction();
        try {
            if ($request->status == "active") {
                $campaign->update([
                    'is_active' => 1,
                    'userd_id' => auth()->check()?auth()->user()->id:0,
                    'deleted_at' => now()
                ]);
                
            } else{
                $campaign->update([
                    'is_active' => 0,
                    'userd_id' => auth()->check()?auth()->user()->id:0,
                    'deleted_at' => now()
                ]);
            }
            \DB::commit();
            return response()->json([
                "message" => "Campaign Updated Successfully.",
                "data" => $campaign,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }
}
