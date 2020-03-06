<?php

namespace App\Repo\Models;

use App\Model\Page;
use App\Repo\BaseRepo;

class PageRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Page $page)
    {   
        $this->eloquent = $page;
    }
}