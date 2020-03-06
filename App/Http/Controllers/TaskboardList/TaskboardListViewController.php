<?php

namespace App\Http\Controllers\TaskboardList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lookup\Lookup;
use App\Model\Taskboard;
use App\Model\TaskboardList;

class TaskboardListViewController extends Controller
{
    const PATH = "supportNew.pages.taskboard_list.";

    private function getPath()
    {
        return static::PATH;
    }
    public function modalAdd(Taskboard $taskboard)
    {
        $status = Lookup::where("code","task_status")->where("is_deleted",0)->get();
        return view($this->getPath() . "modal.taskboard_list_add",compact('taskboard',"status"));
    }
    public function modalUpdate(TaskboardList $taskboardList)
    {
        $status = Lookup::where("code","task_status")->where("is_deleted",0)->get();
        return view($this->getPath() . "modal.taskboard_list_update", compact('taskboardList','status'));
    }
    public function modalDelete(TaskboardList $taskboardList)
    {
        return view($this->getPath() . "modal.taskboard_list_delete", compact('taskboardList'));
    }

    public function fetch() {
        return TaskboardList::where('is_deleted',0)->select("id","title as name")->get();
    }
    public function taskboardList(Taskboard $taskboard) {
        return TaskboardList::where([
            'is_deleted'=>0,
            'taskboard_id' => $taskboard->id
            ])
            ->select("id","title as name")
            ->get();
    }
}
