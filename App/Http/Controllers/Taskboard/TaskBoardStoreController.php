<?php

namespace App\Http\Controllers\Taskboard;

use App\Http\Controllers\TaskboardList\TaskboardListStoreController;
use App\Http\Requests\TaskboardRequest;
use App\Model\Taskboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskboardStoreController extends Controller
{
    public function background(Request $request)
    {
        $path = storage_path('taskboard');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('attachment');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function store(TaskboardRequest $request) {
        try{
            $data = $request->only(['title','board_type','background']);
            $taskboard = Taskboard::create($data);
            $boardList = new TaskboardListStoreController();
            if($taskboard->board_type==1){
                $boardList->storeWithLabel($taskboard);
            }else{
                $boardList->storeSingle($taskboard);
            }
            return response(["message"=>$taskboard->title." Board created","board"=>$taskboard],200);
        }catch(Exception $e){
            return response(["error"=>"Failed at"+$e->getLine()],422);
        }
    }
}
