<?php

namespace App\Repo\Models;


use App\Model\Lookup\SectionLookup;
use App\Repo\BaseRepo;

class SectionLookupRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(SectionLookup $sectionLookup)
    {
        $this->eloquent = $sectionLookup;
    }
   
}