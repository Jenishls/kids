<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;

class AccSubHeadItemsFilter extends Filter
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function acc_head($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ah.id', $value);
        }
        return $this->builder;
    }

    public function acc_sub_head($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ash.id', '=', $value);
        }
        return $this->builder;
    }

    public function code($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ashi.code', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function name($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ashi.name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function description($value = '')
    {
        if ($value != '') {
            return $this->builder->where('ashi.description', 'like', "%$value%");
        }
        return $this->builder;
    }
}
