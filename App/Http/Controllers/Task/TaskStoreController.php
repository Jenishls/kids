<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class TaskStoreController extends Controller
{
    public function uploadAttachment(Request $request)
    {
        $foldername = storage_path('tasks');
        return $this->uploadFile($request, $foldername);
    }


    public function uploadFile(Request $request, $foldername){
        if (!file_exists($foldername)) {
            mkdir($foldername, 0777, true);
        }
        $file = $request->file('attachment');
        $name = uniqid() . '_'.time().".".$file->getClientOriginalExtension();
        $file->move($foldername, $name);

        
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
    public function store(TaskRequest $request) {
        try{
            DB::beginTransaction();   
            $task = new TaskController();
            $taskId = DB::table("tasks")->insertGetId($task->dataFormat($request));
            if($request->has("members")){
                $task->syncMembers($request,$taskId);
            }
            if($request->has("file_names")){
                $task->saveAttacments($request,$taskId);
            }
            DB::commit();
            return response(["message"=>"Task Created "],200);
        }catch(Exception $ex) {
            DB::rollBack();
            return response(["errors"=>"Failed to create tasks at line ".$ex->getLine()." - ".$ex->getMessage()],422);
        }

    }
}
