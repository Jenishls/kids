<?php

namespace App\Repo\Models;


use App\Model\Lookup\Lookup;
use App\Repo\BaseRepo;

class LookupRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Lookup $lookup)
    {
        $this->eloquent = $lookup;
    }
   
}