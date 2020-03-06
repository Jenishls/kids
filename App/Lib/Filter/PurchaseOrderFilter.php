<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use App\Model\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PurchaseOrderFilter extends Filter
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function po_number($value = '')
    {
        if ($value != '') {
            return $this->builder->where('po_number', 'like', "%$value%");
        }
        return $this->builder;
    }
    public function statusSelect($value = '')
    {
        // dd($value);
        if ($value != '') {
            return $this->builder->where('status', $value);
        }
        return $this->builder;
    }

    public function date_range($value = '')
    {
        if ($value != '') {
            $dates = explode('-', $value);
            $from = Carbon::parse($dates[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($dates[1])->format('Y-m-d H:i:s');
            return $this->builder->whereBetween('created_at', array($from, $to));
        }
        return $this->builder;
    }

    public function supplierSelect($value = '')
    {
        if ($value  != '') {
            return $this->builder->whereHas('supplier', function ($q) use ($value) {
                return $q->where('id', $value);
            });
        }
        return $this->builder;
    }
    public function vendor($value = '')
    {
        if ($value  != '') {
            return $this->builder->whereHas('supplier', function ($q) use ($value) {
                return $q->where('c_name', 'like', "%$value%");
            });
        }
        return $this->builder;
    }

    public function created_at($value = '')
    {
        dd($value);
    }

    public function delivery_date($value = '')
    {
        dd($value);
    }
}
