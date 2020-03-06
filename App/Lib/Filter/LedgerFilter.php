<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LedgerFilter extends Filter
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function date_range($value = '')
    {
        // dd($value);
        if ($value != '') {
            $dates = explode('-', $value);
            $from = Carbon::parse($dates[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($dates[1])->format('Y-m-d H:i:s');
            return $this->builder->whereBetween('ledger_date', array($from, $to));
        }
        return $this->builder;
    }

    public function account_head($value = '')
    {
        if ($value != '') {
            return $this->builder->whereHas('accountHeadItem', function ($qry) use ($value) {
                return $qry->where('id', $value);
            });
        }
        return $this->builder;
    }
}
