<?php

namespace App\Repo\Models;

use App\Model\Role;
use App\Repo\BaseRepo;

class RoleRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Role $role)
    {   
        $this->eloquent = $role;
    }
}