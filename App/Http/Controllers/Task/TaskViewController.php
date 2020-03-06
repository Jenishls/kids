<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Filter\TaskFilter;
use App\Model\Lookup\Lookup;
use App\Model\Project;
use App\Model\Task;
use App\User;

class TaskViewController extends Controller
{
    const PATH = 'supportNew.pages.tasks.';
    /** Path of tasks views */
    protected function getPath()
    {
        return static::PATH;
    }

    public function __invoke()
    {
        $members = User::all();
        $projects = Project::where("is_deleted",0)->get();
        return view($this->getPath() . "index", [
            'users' => $members,
            'projects' => $projects,
        ]);
    }

    public function fetch(Request $request){
        $page = $request->pagination['page'] ?: 1;
    	$perPage = $request->pagination['perpage'] ?: 50;
    	$offset = ($page - 1) * $perPage;
    	if ($request->sort) {
    	    $sort = $request->sort['sort'];
    	    $field = $request->sort['field'];
    	}else {
    	    $sort = '';
    	    $field = '';
    	}
    	$query =  Task::where('tasks.is_deleted', 0)->select('tasks.*')->with("taskStatus","taskType",'assignedBy',"project");
    	$queryFilter = new TaskFilter($request);
    	$queryBuilder = $queryFilter->getQuery($query);
    	$total = $queryBuilder->count();
    	$paginatedBuilder =  $queryBuilder->limit($perPage)
    	    ->offset($offset);
    	$data['meta'] = [
    	    "page" => $request->pagination["page"],
    	    "pages" => ceil($total / $perPage),
    	    "perpage" => $perPage,
    	    "total" => $total,
    	    "sort" => $sort,
    	    "field" => $field,
    	];
    	$data['data'] = $paginatedBuilder->orderBy('tasks.created_at', 'desc')->get();
    	return response()->json($data);
	}
	
	public function modalAdd() {
		return view($this->getPath().".modal.task_add");
	}
	public function modalUpdate(Task $task) {
		return view($this->getPath()."modal.task_update",compact("task"));
	}

	public function validateTask(Request $request, $value) {
		$rules = validation_value($value);
        $this->validate($request, $rules);
	}

	public function validMember(Request $request) {

	}

	public function detail(Task $task){
		return view($this->getPath()."detail.index",compact('task'));
	}

	public function updateDetail(Request $request) {
		$task = Task::find($request->task);
		$section = $request->section;
		$status = Lookup::where("code","task_status")->where("is_deleted",0)->get();
		return view($this->getPath().".detail.modal.detail_update",compact("task","section","status"));
	}

}
