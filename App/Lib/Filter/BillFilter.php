<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BillFilter extends Filter
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function bill_title($value = '')
    {
        if ($value != '') {
            return $this->builder->where('bill_title', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function description($value = '')
    {
        if ($value != '') {
            return $this->builder->where('description', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function status($value = '')
    {
        if ($value != '') {
            return $this->builder->where('status', $value);
        }
        return $this->builder;
    }

    public function date_range($value = '')
    {
        // dd($value);
        if ($value != '') {
            $dates = explode('-', $value);
            $from = Carbon::parse($dates[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($dates[1])->format('Y-m-d H:i:s');
            return $this->builder->whereBetween('bill_date', array($from, $to));
        }
        return $this->builder;
    }
}
