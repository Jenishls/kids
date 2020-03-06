<?php

namespace App\Http\Controllers\TaskboardCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TaskboardCard;
use App\Model\TaskboardCardComment;
use Exception;
class TaskboardCardUpdateController extends Controller
{
    public function updateSequence(Request $request){
        $valid = $request->validate([
            'cards'=>'required',
            'targetTaskboardListId'=>'required',
        ]);
        if($valid){
            try{
                foreach($request->cards as $key => $card) {
                    TaskboardCard::find($card['id'])->update([
                        'seq_no'=> $key+1,
                        'useru_id'=>auth()->id(),
                        'taskboard_list_id'=>$request->targetTaskboardListId
                    ]);

                }
                return response(["message"=>"Success"],200);
            }catch(Exception $ex) {
                return response(["error"=>"Failed to update sequence ".$ex->getMessage()." at line ".$ex->getLine()],422);
            }
        }
    }

    public function cardUpdate(Request $request){
        $valid = $request->validate([
            'id'=>'required',
        ]);
        if($valid){
            try{     
                $data = $request->only(["id","description","due_date"]);
                $data["useru_id"] = auth()->id();
                TaskboardCard::find($request->id)->update($data);
                if(!is_null($request->due_date))
                $dueDate = bladeDate($data["due_date"]);
                else
                $dueDate = null;
                return response(["message"=>$request->description." Updated","card"=>$data,"due_date"=>$dueDate],200);
            }catch(Exception $ex) {
                return response(["error"=>"Failed to update description - ".$ex->getMessage()." at line ".$ex->getLine()],422);
            }
        }else{
            return response(["error"=>"Invalid data"],422);
        }
    }

    public function updateDescription(Request $request){
        try{
            if(($request->has("description") && (!is_null($request->description)))){
                TaskboardCard::find($request->id)->update(["description" => $request->description]);
                return response(["message"=>$request->description." Updated","card"=>$request->all(),],200);
            }else{
                return response(["errors"=>"Description Required"],422);
            }
        }catch(Exception $ex) {
            return response(["errors"=>"Description Required"],422);
        }
    }

    public function move(Request $request){
        try{
            if($request->has("taskboard_list_id")){
                TaskboardCard::find($request->id)->update(["taskboard_list_id" => $request->taskboard_list_id]);
                return response(["message"=>"Card Moved"],200);
            }else{
                return;
            }
        }catch(Exception $ex) {
            return response(["error"=>"Failed to move"],422);
        }
    }
    public function copy(Request $request){
        try{
            if($request->has("taskboard_list_id")){
                $cardController = new TaskboardCardStoreController();
                $card = TaskboardCard::find($request->id);
                TaskboardCard::create([
                    'title'=>$card->title,
                    'description'=>$card->description,
                    'seq_no'=>$cardController->getCardSequence($request->taskboard_list_id),
                    'taskboard_list_id'=> $request->taskboard_list_id,
                    'note'=>$card->note,
                    'userc_id'=>auth()->id(),
                    'created_at'=>now(),
                ]);
                return response(["message"=>$card->title." Card Copied"],200);
            }else{
                return;
            }
        }catch(Exception $ex) {
            return response(["error"=>"Failed to copy"],422);
        }
    }
    public function archive(Request $request){
        try{
            if($request->has("id")){
                TaskboardCard::find($request->id)->update([
                    'is_deleted'=>1,
                    'userd_id'=>auth()->id(),
                    'deleted_at' =>now(),
                ]);
                return response(["message"=>"Card Archived"],200);
            }else{
                return;
            }
        }catch(Exception $ex) {
            return response(["error"=>"Failed to copy"],422);
        }
    }

    public function updateTitle(Request $request) {
        $data = $request->validate([
            'id'=>'required',
            'title'=>'required'
        ]);
        try{
            $card = TaskboardCard::find($request->id);
            $card->update([
                "title"=>$request->title,
                "useru_id"=>auth()->id(),
                "updated_at"=>now(),
            ]);
            return response(['message'=>"Title updated","data"=>$card],200);
        }catch(Exception $ex) {
            return response(['errors'=>"Failed to update title"],422);
        }
    }

    public function commentUpdate(Request $request){
        $valid = $request->validate([
            'id'=>'required',
            'comment'=>'required',
        ]);
        try{
            $comment = TaskboardCardComment::find($request->id);
            $comment->update([
                "comment"=>$request->comment,
                "useru_id"=>auth()->id(),
                "updated_at"=>now(),
            ]);
            return response(['message'=>"Comment updated","data"=>$comment],200);
        }catch(Exception $ex) {
            return response(['errors'=>"Failed to update comment"],422);
        }

    }

    public function commentDelete(Request $request){
        try{
            $comment = TaskboardCardComment::find($request->id);
            $comment->update([
                "is_deleted"=>1,
                "userd_id"=>auth()->id(),
                "deleted_at"=>now(),
            ]);
            return response(['message'=>"Comment deleted","data"=>$comment],200);
        }catch(Exception $ex) {
            return response(['errors'=>"Failed to delete comment"],422);
        }
    }
   

    
}
