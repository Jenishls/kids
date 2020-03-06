<?php

namespace App\Repo\Models;


use App\Model\Validation\ValidationSection;
use App\Repo\BaseRepo;

class ValidationSectionRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(ValidationSection $validation)
    {
        $this->eloquent = $validation;
    }
}
