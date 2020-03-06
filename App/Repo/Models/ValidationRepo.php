<?php

namespace App\Repo\Models;


use App\Model\Validation\Validation;
use App\Repo\BaseRepo;

class ValidationRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Validation $validation)
    {
        $this->eloquent = $validation;
    }
}
