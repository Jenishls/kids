<?php

namespace App\Http\Controllers\Taskboard;

use App\Http\Controllers\Controller;
use App\Model\Taskboard;

class TaskboardViewController extends Controller
{

    protected $path = "supportNew.pages.taskboard.";
    protected $path_taskboard_list = "supportNew.pages.taskboard_list";
    const PATH = 'supportNew.pages.taskboard.';

    private function getPath()
    {
        return static::PATH;
    }
    public function index()
    {
        $taskboards = Taskboard::where('is_deleted', 0)->get();
        return view($this->path . "index", compact('taskboards'));
    }

    public function modalAdd()
    {
        return view($this->getPath() . "modal.taskboard_add");
    }
    public function modalUpdate(Taskboard $taskboard)
    {
        return view($this->getPath() . "modal.taskboard_edit", compact('taskboard'));
    }
    public function modalDelete(Taskboard $taskboard)
    {
        return view($this->getPath() . "modal.taskboard_delete", compact('taskboard'));
    }

    public function modalArchive(Taskboard $taskboard)
    {
        return view($this->getPath() . "modal.taskboard_archive", compact('taskboard'));
    }

    public function view($foldername, $filename)
    {
        $location = $foldername . "/" . $filename;
        if (file_exists(storage_path($location))) {
            return response()->file(storage_path($location));
        } else {
            throw new \Exception("File doesn't exists on the storage");
        }
    }

    public function taskboardList(Taskboard $taskboard)
    {
        return view($this->path_taskboard_list . ".index",compact("taskboard"));
    }

    public function fileHolder($extension){
        if(is_null($extension)) return;

        if($extension =="JPEG" || $extension == "jpeg"){
            $extension = "jpg";
        }
        $location = "/images/file-icon/". strtolower($extension).".svg";
        $defaultLocation = "/images/file-icon/file.svg";
        if(file_exists(public_path($location))){
            return response()->file(public_path($location));
        }else{
            return response()->file(public_path($defaultLocation));
        }
    }

    public function fetch(){
        return Taskboard::where('is_deleted',0)->select("id","title as name")->get();
    }

}
