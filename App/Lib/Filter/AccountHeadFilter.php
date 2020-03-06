<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;

class AccountHeadFilter extends Filter
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function type($value = '')
    {
        if ($value != '') {
            return $this->builder->where('type', 'like', "%" . strtoupper($value) . "%");
        }
        return $this->builder;
    }

    public function code($value = '')
    {
        if ($value != '') {
            return $this->builder->where('code', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function name($value = '')
    {
        if ($value != '') {
            return $this->builder->where('name', 'like', "%$value%");
        }
        return $this->builder;
    }
}
