<?php

namespace App\Repo\Models;


use App\Model\SiteSetting;
use App\Repo\BaseRepo;

class SiteSettingRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Sitesetting $sitesetting)
    {
        $this->eloquent = $sitesetting;
    }
   
}