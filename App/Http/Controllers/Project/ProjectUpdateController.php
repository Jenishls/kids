<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Project;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectUpdateController extends Controller
{
    public function updateInfo(Request $request){
        try{
            $formatProject = new ProjectStoreController();
            $project = $formatProject->formatProject($request);
            Project::find($request->id)->update($project);
            return response(["message"=>"Project info updated"],200);
        }catch(Exception $ex){
            return response(["errors"=>"Failed to update".$ex->getMessage()],422);
        }
    }

    public function updateMember(Request $request){
        try{
            Project::find($request->id)->members()->sync($request->members);
            return response(["message"=>"Project members updated"],200);
        }catch(Exception $ex){
            return response(["errors"=>"Failed to update members - ".$ex->getMessage()],422);
        }
    }

    public function updateAttachment(Request $request){

        if(!$request->has("file_names")) return;
        try {
            DB::beginTransaction();
            $files = [];
            foreach ($request->file_names as $key => $path) {
                $files[$key]["file_name"] = $path;
                $files[$key]["table_name"] = "projects";
                $files[$key]["type"] = substr($path, strpos($path, ".")+1);
                $files[$key]["table_id"] = $request->id;
            }
            DB::table("files")->insert($files);
            DB::commit();
            return response(["message"=>"Project members updated"],200);
        }catch(Exception $ex){
            DB::rollBack();
            return response(["errors"=>"Failed to update - ".$ex->getMessage()],422);
        }
    }

}
