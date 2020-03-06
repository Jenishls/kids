<?php

namespace App\Http\Controllers\TaskboardCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskboardCardCommentRequest;
use App\Http\Requests\TaskboardCardFileRequest;
use App\Http\Requests\TaskboardCardRequest;
use App\Model\TaskboardCard;
use App\Model\TaskboardCardComment;
use App\Model\TaskboardCardFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskboardCardStoreController extends Controller
{
    public function store(TaskboardCardRequest $request){
        try{
            $data = $request->only(['title','taskboard_list_id']);
            $data["created_at"]= now();
            $data["userc_id"]= auth()->id();
            $data['seq_no'] = $this->getCardSequence($request->taskboard_list_id);
            $card = TaskboardCard::create($data);
            return response(["message"=>$card->title." card created"],200);
        }catch(Exception $ex){
            return response(["error"=>"Failed to create card".$ex->getMessage()],422);
        }
    }

    public function getCardSequence($boardListId){
        $checkSeqNo = TaskboardCard::where('taskboard_list_id',$boardListId)->max('seq_no');
        if(is_null($checkSeqNo)) return 1;
        else return $checkSeqNo+1;
    }

    public function uploadAttachment(Request $request)
    {
        $path = storage_path('cards');

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

    public function attachmentSave(TaskboardCardFileRequest $request) {
        try{
            $data = [];
            foreach($request->paths as $key => $path) {
              $data[$key]["taskboard_card_id"] = $request->taskboard_card_id;
              $data[$key]["path"] = $path;
              $data[$key]["extension"] = substr($path,strpos($path,".")+1);
              $data[$key]["userc_id"] = auth()->id();
            }
            DB::table("taskboard_card_files")->insert($data);
            $attachments = TaskboardCard::find($request->taskboard_card_id)->attachments;
            return response(["message"=>"Attachment Added","attachments"=>$attachments],200);
        }catch(\Exception $ex) {
            return response(["errors"=>"Failed - ".$ex->getLine()." - ".$ex->getMessage()],422);
        }
    }

    public function commentCreate(TaskboardCardCommentRequest $request) {
        if(is_null($request->comment)) return;
        try{
            $data = $request->only(['comment','taskboard_card_id']);
            $data['userc_id'] = auth()->id();
            TaskboardCardComment::create($data);
            $comments = TaskboardCard::find($request->taskboard_card_id)->comments;
            return response(["message"=>"Comment added","comments"=>$comments],200);
        }catch(Exception $ex) {
            return response(["errors"=>"Failed to create comment at line ".$ex->getLine()." - ".$ex->getMessage()],422);
        }
    }
}
