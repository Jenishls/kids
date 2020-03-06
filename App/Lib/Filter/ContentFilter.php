<?php

namespace App\Lib\Filter;

use App\Filter\Filter;
use Illuminate\Http\Request;

class ContentFilter extends Filter{

    public function __construct(Request $request)
    {
  
        $this->request = $request;
    }

   //
    

}
