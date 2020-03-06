<?php

namespace App\Model\Campaign;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $appends=['isLatest'];
    protected $guarded=[];
    /**
     *  Campaign Activites 0 - M relation 
     */
    public function activities()
    {
        return $this->hasMany(CampaignActivity::class)->where('is_deleted',0);
    }
    public function suppliers()
    {
        return $this->hasMany(CampaignSupplier::class)->where('is_deleted',0);
    }
    public function getIsLatestAttribute()
    {
        if($this->id == Campaign::latest('updated_at')->first()->id)
        {
            return true;

        }
        return false;

    }
}
