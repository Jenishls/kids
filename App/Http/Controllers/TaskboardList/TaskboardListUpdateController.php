<?php

namespace App\Http\Controllers\TaskboardList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskboardListRequest;
use App\Model\TaskboardList;
use Exception;

class TaskboardListUpdateController extends Controller
{
    public function update(TaskboardListRequest $request){
        try{
            TaskboardList::find($request->id)->update($request->only(["title","status_id"]));
            return response(["message"=>"Updated Taskboard List"],200);
        }catch(Exception $ex){
            return response(["errors"=>"Failed to update"],422);
        }
    }
    public function delete(Request $request){
        try{
            TaskboardList::find($request->id)->update([
                'is_deleted'=>1,
                "deleted_at"=>now(),
                "userd_id"=>auth()->id()
            ]);
            return response(["message"=>"Deleted"],200);
        }catch(Exception $ex){
            return response(["errors"=>"Failed to delete"],422);
        }
    }
}
