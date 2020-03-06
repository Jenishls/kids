<?php

namespace App\Http\Controllers\TaskboardCard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DefaultCompany;
use App\Model\TaskboardCard;
use App\User;

class TaskboardCardViewController extends Controller
{
    const PATH = 'supportNew.pages.taskboard_card.';
    private function getPath()
    {
        return static::PATH;
    }

    public function modalUpdate($cardId){
        $card = TaskboardCard::find($cardId);
        $users = User::all();
        $taskboard = $card->taskboardList->taskboard;
        return view($this->getPath()."modal.taskboard_card_update",compact('card','users','taskboard'));
    }
    public function modalAttachment($cardId){
        $card = TaskboardCard::find($cardId);
        return view($this->getPath()."sub_modal.taskboard_card_attachment",compact('card'));
    }
    public function modalCommentDelete($commentId){
        return view($this->getPath()."sub_modal.taskboard_card_comment_delete",compact('commentId'));
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

     public function download($foldername,$filename){
         $location = $foldername."/".$filename;
        if(file_exists(storage_path($location))){
            return response()->download(storage_path($location));
        }else{
            throw new \Exception("File doesn't exists on the storage");
        }
    }

    // public function documentPlaceholder($extension){
    //     if(file_exists(public_path("images/file-icons/").$extension)){
    //     switch($extension){
    //         case "pdf":
    //     } 
    // }
}
