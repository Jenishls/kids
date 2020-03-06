<?php

namespace App\Http\Controllers\Taskboard;

use Exception;
use App\Model\Taskboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskboardUpdateController extends Controller
{
    public function update(Request $request){
        $valid = $request->validate([
            'title'=>'required',
            'id'=>'required'
        ]);
        if($valid){
            try{
                $data = $request->only(['title','background']);
                $taskboard = Taskboard::find($request->id);
                $taskboard->update($data);
                return response(["message"=>$taskboard->title." taskboard updated","taskboard"=>$taskboard],200);
            }catch(Exception $ex){
                return response(["error"=>"Failed to update "],422);
            }
        }
    }

    public function members(Request $request) {
        try{
            $taskboard = Taskboard::find($request->taskboard_id);
            $taskboard->members()->sync($request->member);
            return response(["message"=>"Members Synced","data"=>$taskboard->members],200);
        }catch(Exception $ex) {
            return response(["errors"=>"Failed to sync members"],422);
        }
    }

    public function delete(Request $request) {
        try{
            Taskboard::find($request->id)->update([
                "is_deleted"=>1,
                "deleted_at"=> now(),
                "userd_id"=>auth()->id(),
                ]);
            return response(["message"=>"Taskboard Deleted"],200);
        }catch(Exception $ex) {
            return response(["errors"=>"Failed to deleted taskboard"],422);
        }
    }
}
