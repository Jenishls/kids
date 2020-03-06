<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign\{ActivityMailingList,ActivityTemplate};
use App\User;

class CampaignDataController extends Controller
{
    /**
     * For retreiving all mailinglist as json
     */
    public function mailingList()
    {
        return ActivityMailingList::where('is_deleted',0)->get();
    }
    /**
     * For retreiving all mailinglist as json
     */
    public function activityName()
    {

        return sectionNameToLookups('campaign_activity')->where('code','activity_name');
        
    }
    /**
     * For retreiving all mailinglist as json
     */
    public function activityType()
    {
        return sectionNameToLookups('campaign_activity')->where('code','activity_type');
    }
    /**
     * For retreiving all mailinglist as json
     */
    public function typeOfServices()
    {
        return sectionNameToLookups('campaign_supplier')->where('code','type_of_services');
    }
    /**
     * For retreiving all mailinglist as json
     */
    public function supplierStatus()
    {
        return sectionNameToLookups('campaign_supplier')->where('code','status');
    }

    /**
     * For retreiving all activites templates as json
     */
    public function template()
    {
        return ActivityTemplate::where('is_deleted',0)->get();
    }
    /**
     * For retreiving all activites templates as json
     */
    public function users()
    {
        return User::where('is_deleted',0)->get();
    }
}
