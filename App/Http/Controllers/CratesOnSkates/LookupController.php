<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ZipCode;

class LookupController extends Controller
{    
    /**@todo make uppercase function for QUERY */
    public function state(Request $request){
        return ZipCode::select('id', 'state as text')->where('is_deleted', 0)->when($request->term, function($q, $term){
            $q->where('state', 'like', "%$term%");
        })->groupBy('text')->get();
    }

}
