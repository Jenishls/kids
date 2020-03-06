<?php

namespace App\Lib\Filter;

use App\Filter\Filter;

class TemplateFilter extends Filter
{

    public function temp_name($query = false)
    {
        if ($query) {
            return $this->builder->where('temp_name', "LIKE", "%$query%");
        }
        return $this->builder;
    }

    public function temp_type($query = false)
    {
        if ($query) {
            return $this->builder->where('temp_type', 'LIKE', "%$query%");
        }
        return $this->builder;
    }

    public function section($query = false)
    {
        if ($query) {
            return $this->builder->where('section', 'LIKE', "%$query%");
        }
        return $this->builder;
    }

}
