<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;

class AccountSubHeadFilter extends Filter
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function acc_head($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ah.id', '=', $value);
        }
        return $this->builder;
    }
    public function name($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ash.name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function code($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ash.code', 'like', "%$value%");
        }
        return $this->builder;
    }
}
