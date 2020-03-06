<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lookup\Lookup;
use App\Model\Project;
use App\User;

class ProjectViewController extends Controller
{
    const PATH = 'supportNew.pages.project.';
    /** Path of tasks views */
    protected function getPath()
    {
        return static::PATH;
    }

    public function __invoke()
    {
        $projects = $this->projectsAll();
        return view($this->getPath()."index",compact("projects"));
    }
    public function fetch() {
        return Project::where('is_deleted',0)->select("id","title as name")->get();
    }
    public function fetchUser() {
        $users =  User::where('is_deleted',0)->get();
        $data = [];
        foreach($users as $key => $user){
            $data[$key]["id"] = $user->id;
            $data[$key]["name"] = $user->fullname();
        }
        return $data;
    }

    public function lookup(Request $request, $code) {
        if(is_null($code)) return;
        return Lookup::where('code',$code)->select("id","value as name")->get();
    }

    public function projectsAll(){
        return Project::where("is_deleted",0)->get();
    }


    public function modalAdd(){
        return view($this->getPath()."modal.project_add");
    }
    public function modalUpdate(Project $project){
        return view($this->getPath()."modal.project_edit",compact("project"));
    }
    public function modalDelete(Project $project){
        return view($this->getPath()."modal.project_delete",compact('project'));
    }

    public function validateProject(Request $request, $value) {
		$rules = validation_value($value);
        $this->validate($request, $rules);
	}

	public function valid(Request $request) {

    }
    
    public function detail(Project $project){
        return view($this->getPath()."detail.index",compact("project"));
    }

}

