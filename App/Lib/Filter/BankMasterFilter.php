<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BankMasterFilter extends Filter
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function account_no($value = '')
    {
        if ($value != '') {
            return $this->builder->where('account_number', 'like', "%$value%");
        }
        return $this->builder;
    }
    public function account_name($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('account', function ($q) use ($value) {
                return $q->where('id', $value);
            });
        }
        return $this->builder;
    }
    public function name($value = '')
    {
        if ($value != '') {
            return $this->builder->where('name', 'like', "%$value%")
                ->orWhere('account_name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function acc_type($value = '')
    {
        if ($value != '') {
            return $this->builder->where('account_type', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function opened_date($value = '')
    {
        $range = explode('-', $value);
        $from = Carbon::parse($range[0])->format('Y-m-d');
        $to = Carbon::parse($range[1])->format('Y-m-d');
        if ($value != '') {
            return $this->builder->whereBetween('opened_date', array($from, $to));
        }
        return $this->builder;
    }

    public function branch($value = '')
    {
        if ($value != '') {
            return $this->builder->where('branch', 'like', "%$value%");
        }
        return $this->builder;
    }
}
