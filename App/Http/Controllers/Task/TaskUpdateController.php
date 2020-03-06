<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Task;
use Exception;

class TaskUpdateController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new TaskController();
    }
    public function updateInfo(Request $request) {
        // $task = new TaskController();
        $data = $this->task->dataFormat($request);
        unset($data["userc_id"]);
        $data["useru_id"] = auth()->id();
        Task::find($request->id)->update($data);
    }
    public function updateMember(Request $request) {
        $this->task->syncMembers($request,$request->id);
    }
    public function updateAttachments(Request $request) {
        if($request->has("file_names")){
            $this->task->saveAttacments($request,$request->id);
        }
    }
    public function muted() {
        return true;
    }

    public function updateDescription(Request $request){
        try{
            if(!is_null($request->description)){
                Task::find($request->id)->update(["desc" => $request->description]);
                return response(['message'=>"Description updated","data"=>$request->all()],200);
            }
        }catch(Exception $ex) {
            return response(['errors'=>"Failed to update"],422);
        }
    }
    public function updateConclusion(Request $request){
        try{
            if(!is_null($request->conclusion)){
                Task::find($request->id)->update(["conclusion" => $request->conclusion]);
                return response(['message'=>"conclusion updated","data"=>$request->all()],200);
            }
        }catch(Exception $ex) {
            return response(['errors'=>"Failed to update"],422);
        }
    }

    public function updateDetail(Request $request) {
        try{
            $task = Task::find($request->id);
            $newData = $request->all();
            if($request->has("start_date")){
                $newData["start_date"] = dateFormat($request->start_date)??$task->start_date;
            }else if($request->has("due_date")) {
                $newData["due_date"] = dateFormat($request->due_date)??$task->due_date;
            }else if($request->has("reminder_date")){
                $newData["reminder_date"] = dateFormat($request->reminder_date)??$task->reminder_date;
            }
            unset($newData["id"]);
            $task->update($newData);
            return response(["message"=>"Updated"],200);
        }catch(Exception $ex) {
            return response(["errors"=>"Failed to update"],422);
        }
    }
}
