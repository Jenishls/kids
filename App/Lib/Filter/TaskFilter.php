<?php
    /**
     * Created by PhpStorm.
     * User: Lekh Raj Rai
     * Date: 1/14/2020
     * Time: 1:59 PM
     */

    namespace App\Lib\Filter;


    use App\Filter\Filter;
use Illuminate\Http\Request;

class TaskFilter extends Filter
    {
        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function title($value = "") {
            if($value != ''){
                return $this->builder->where('title',"like", "%$value%");
            }
            return $this->builder;
        }
        public function projects($value){
            if(!is_null($value)){
                return $this->builder->whereIn('project_id', $value);
            }
        }
    }
