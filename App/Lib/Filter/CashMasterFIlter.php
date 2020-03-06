<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CashMasterFilter extends Filter
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function account_name($value = '')
    {
        if ($value != '') {
            return $this->builder->where('name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function member($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('user', function ($q) use ($value) {
                return $q->where('id', $value);
            });
        }
        return $this->builder;
    }

    public function location($value = '')
    {
        if ($value != '') {
            return $this->builder->where('location', 'like', "%$value%");
        }
        return $this->builder;
    }
}
