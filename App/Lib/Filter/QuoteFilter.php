<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use App\Model\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QuoteFilter extends Filter
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function quote_number($value = '')
    {
        if ($value != '') {
            return $this->builder->where('quote_number', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function supplier_type($value = '')
    {
        if ($value != '') {
            return $this->builder->where('supplier_type', 'like', "%$value%");
        }
        return $this->builder;
    }
    public function duration($value = '')
    {
        if ($value != '') {
            $dates = explode('-', $value);
            $from = Carbon::parse($dates[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($dates[1])->format('Y-m-d H:i:s');
            return $this->builder->where('created_at', '>=', $from)->where('delivery_date', '<=', $to);
        }
        return $this->builder;
    }

    public function supplier($value =  '')
    {
        if ($value != '') {
            return $this->builder->whereHas('vendorCompany', function ($q) use ($value) {
                return $q->where('c_name', 'like', "%$value%");
            })
                ->orWhereHas('vendorClient', function ($q) use ($value) {
                    return $q->where('fname', 'like', "%$value%")
                        ->orWhere('mname', 'like', "%$value%")
                        ->orWhere('lname', 'like', "%$value%");
                });
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
}
