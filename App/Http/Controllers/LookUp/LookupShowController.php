<?php

namespace App\Http\Controllers\Lookup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lookup\{SectionLookup, Lookup};



class LookupShowController extends Controller
{

    /**
     * Show Lookup of the using lookup_code
     * Mostly used in select picker
     */
    public function list(Request $request,$code)
    {
        return Lookup::select('id','code','value','description')
            ->where(['code'=>$code,'is_deleted'=>0])
            ->get();
    }
}
