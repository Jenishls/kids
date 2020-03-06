<?php

namespace App\Filter;

use Illuminate\Http\Request;

class Filter
{

    protected $request;
    protected $builder;
    private $executedArr = [];

    public function __construct(Request $request, $builder)
    {
        $this->request = $request;
        $this->builder = $builder;

        $this->getQuery();
    }

    // protected $request;
    // protected $builder;
    // private $executedArr = [];


    public function getQuery($builder = null)
    {
        if (isset($builder)) {
            $this->builder = $builder;
        }
        $data = $this->request->all();
        if (array_key_exists('query', $data) && isset($data['query'])) {
            $dataQuery = $this->request->has('query.advanced') ?
                $this->request->input('query.advanced') :
                $this->request->input('query');
            foreach ($dataQuery as $name => $value) {
                if (method_exists($this, $name)) {
                    if (!in_array($name, $this->executedArr)) {
                        if ($value !== '')
                            array_push($this->executedArr, $name);
                        call_user_func_array([$this, $name], array_filter([$value]));
                    }
                }
            }
        }
        return $this->builder;
    }

    public function notDeleted($tables)
    {
        $tables = is_array($tables) ? $tables : func_get_args();
        foreach ($tables as $table) {
            $this->builder->where("$table.is_deleted", 0);
        }
    }
}
