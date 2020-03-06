<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;

class JournalFilter extends Filter
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function description($value = '')
    {
        if ($value != '') {
            return $this->builder->where('description', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function account_head($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('transactions', function ($q) use ($value) {
                return $q->whereHas('accountHead', function ($qq) use ($value) {
                    return $qq->where('id', $value);
                });
            });
        }
    }
}
