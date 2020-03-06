<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\TaskStoreController;
use App\Model\Project;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectStoreController extends Controller
{
    public function uploadAttachment(Request $request){
        $folder  = storage_path("project");
        $upload = new TaskStoreController();
        return $upload->uploadFile($request, $folder);
    }

    public function create(Request $request){
        try{
            DB::beginTransaction();
            $project = $this->formatProject($request);
            $projectId = DB::table("projects")->insertGetId($project);
        
            if($request->has("members")){
                $this->syncMembers($request,$projectId);
            }
            if($request->has("file_names")){
                $this->storeAttachment($request->file_names,$projectId);
            }
            DB::commit();
            return response(["message"=>"Project created"],200);
        }catch(Exception $ex){
            DB::rollBack();
            return response(["errors"=>"Failed to create project".$ex->getLine()." ".$ex->getMessage()],422);
        }
    }

    public function formatProject(Request $request){
        $project=  $request->only(['title',"budget","project_type","description","company_id","start_date","url","estimated_date","due_date","priority","status","project_manager"]);
        $project["budget"] = is_null($request->budget)?00.00:str_replace(",","",$project["budget"]);        
        $project["start_date"] =  $request->start_date?dateFormat($request->start_date):null;
        $project["estimated_date"] =  $request->estimated_date?dateFormat($request->estimated_date):null;
        $project["due_date"] =  $request->due_date?dateFormat($request->due_date):null;
        return $project;
    }

    public function syncMembers(Request $request,$projectId) {
        Project::find($projectId)->members()->sync($request->members);
     }
    public function storeAttachment($requestFile, $tableId){
        $files = [];
        foreach($requestFile as $key => $path){
            $files[$key]["file_name"] = $path;
            $files[$key]["table_name"] = "projects";
            $files[$key]["type"] = substr($path,strpos($path,".")+1);
            $files[$key]["table_id"] = $tableId;
        }
        DB::table("files")->insert($files);
    }
}
