<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Model\File;
use App\Model\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function dataFormat(Request $request){
        $data = $request->only(['title','project_id','task_type_id','priority','status','cause','start_date','due_date','reminder_date','estimate_hours','desc']);
        $data["start_date"] = $request->start_date?dateFormat($request->start_date):null;
        $data["due_date"] = $request->due_date?dateFormat($request->due_date):null;
        $data["current_workflow_id"] = 1;
        $data["assigned_by"] = auth()->id();
        $data["userc_id"] = auth()->id();
        $data["reminder_date"] = $request->reminder_date?dateFormat($request->reminder_date):null;
        return $data;
    }
    public function syncMembers(Request $request,$taskId) {
       Task::find($taskId)->members()->sync(array_fill_keys($request->members, ['assigned_date' => date('Y-m-d')]));
    }

    public function saveAttacments(Request $request,$taskId){
        $files = [];
        foreach($request->file_names as $key => $path){
            $files[$key]["file_name"] = $path;
            $files[$key]["table_name"] = "tasks";
            $files[$key]["type"] = substr($path,strpos($path,".")+1);
            $files[$key]["table_id"] = $taskId;
        }
        DB::table("files")->insert($files);
    }
}
