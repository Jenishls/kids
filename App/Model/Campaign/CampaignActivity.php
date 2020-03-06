<?php

namespace App\Model\Campaign;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CampaignActivity extends Model
{
    protected $guarded=[];
    protected $with=['campaign','assignedTo'];
    public function campaign()
    {
     return $this->belongsTo(Campaign::class);
    }

    public function assignedTo()
    {
     return $this->belongsTo(User::class,'user_id','id');
    }
}
