<?php

namespace App\Http\Controllers\TaskboardList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskboardListRequest;
use App\Model\Lookup\Lookup;
use App\Model\Taskboard;
use App\Model\TaskboardList;
use Exception;

class TaskboardListStoreController extends Controller
{
    public function store(TaskboardListRequest $request){
        try{
            $data = $request->only(['title','status_id','taskboard_id']);
            $boardList = TaskboardList::create($data);
            return response(["message"=>$boardList->title." created"],200);
        }catch(Exception $e){
            return response(["error"=>"Failed to create"],422);
        }
    }
    public function storeWithLabel(Taskboard $taskboard){
        $data = [
            0=> [
                "title"=>"To do",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("To do"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
            ],
            2=> [
                "title"=>"Working",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("Process"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
            ],
            3=> [
                "title"=>"Testing",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("Testing"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
            ],
            4=> [
                "title"=>"Tested",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("Tested"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
            ],
            5=> [
                "title"=>"Closed",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("Closed"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
            ]
        ];
        foreach ($data as $taskboardList) {
            TaskboardList::create($taskboardList);
        }
    }

    public function storeSingle(Taskboard $taskboard){
        TaskboardList::create([
                "title"=>"To do",
                "taskboard_id"=>$taskboard->id,
                "status_id" => $this->getLookupId("To do"),
                "is_active" => 1,
                "userc_id"=>auth()->id()
        ]);
    }

    public function getLookupId($status){
        $check = Lookup::where("value",$status)->first();
        if($check) return $check->id;
        else return null;
    }
}
