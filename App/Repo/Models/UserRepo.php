<?php

namespace App\Repo\Models;


use App\User;
use App\Repo\BaseRepo;

class UserRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(User $user)
    {
        $this->eloquent = $user;
    }
   
}
