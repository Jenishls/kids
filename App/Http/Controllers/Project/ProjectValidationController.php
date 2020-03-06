<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Project;

class ProjectValidationController extends Controller
{
    public function checkProject(Request $request){
        if($request->has("value") && !is_null($request->value)){
            $check = Project::where($request->field,$request->value)->first();
            if($check) return response(["errors"=>$request->value." already exist"],422);
        }else{
            return;
        }
    }
}
