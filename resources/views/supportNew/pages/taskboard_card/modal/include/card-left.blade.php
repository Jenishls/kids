<div class="col-md-9 card-update__card-left">
    <div class="card-description @if(!isset($card->description)) m-t-20-i @endif ">
        <div><i class="la la-align-center fs-25"></i></div>
        <div class="w-100 card_action_container" id="CardDescriptionContainer">
            @if(isset($card->description))
            <p class="card-description__content">{{$card->description}}</p>
            <div class="card-description__action">
                <a href="javascript:void(0)" class="btnTaskboardCardEditDescription" data-value="{{$card->description}}" data-id="{{$card->id}}">Edit</a>
            </div>
            @else
            <div class="card-description__content m-t-20">
                <form id="" class="descriptionCreateForm description_form_{{$card->id}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$card->id}}">
                    <textarea placeholder="Write Descripion..."
                        class="form-control mb-10 cardTextarea"
                        style="height: 60px;
                        margin-top: 0px;
                        margin-bottom: 10px;
                        resize: none;
                        min-height: 60px;
                        overflow-y: hidden;"
                        oninput="auto_grow(this)"
                        name="description"></textarea>
                        <button type="submit" id="btnTaskboardCardDescription" data-id="{{$card->id}}" class="btn btn-success btn-sm">Submit</button>
                        <button type="button" id="btnTaskboardCardDescriptionCancel" data-id="{{$card->id}}" data-value="{{$card->description}}" class="btn cbtn-default btn-sm">cancel</button>
                </form>
            </div>
            @endif
        </div>
    </div>

    <div class="card-associate">
        <div class="card-associate__div">
            <div class="kt-widget__details">
                <div class="kt-section__content kt-section__content--solid">
                    <div class="kt-media-group" id="cardMembersContainer">
                        @if(count($taskboard->members)<4)
                            @foreach($taskboard->members as $member)
                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
                                    <img src="{{asset("images/default.jpg")}}" alt="image" title="Lekh Raj Rai">
                                </a>
                            @endforeach
                            <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
                                <span>+0</span>
                            </a>
                        @else 
                            @foreach($taskboard->members->take(3) as $member)
                                <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
                                    <img src="{{asset("images/default.jpg")}}" alt="image" title="Lekh Raj Rai">
                                </a>
                            @endforeach
                            <a href="javascript:void(0)" class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
                                <span>+{{count($taskboard->members) - 3}}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-associate__div">
            <h6 class="mb-0"> Due Date </h6>
                <span class="due_date">@if(isset($card->due_date)) {{bladeDate($card->due_date)}}@else No due date @endif</span>
        </div>
    </div>
    <div class="card-attachment">
        <div><i class="la la-file-photo-o fs-25"></i></div>
        <div class="card-attachment__content">
            <h6>Attachments</h6>
            <div class="card-attachment__content__file">

                <table class="table" style="width:100%">
                    <tbody class="card_attachments_content">
                        @if(count($card->attachments)>0)
                            @foreach($card->attachments as $key => $attachment)
                                <tr>
                                    <td style="width:30px">{{$key+1}}</td>
                                    <td>{{$attachment->file_name}}</td>
                                    <td><img src="/file/placeholder/{{$attachment->extension}}" data-type="{{$attachment->fileType()}}" height="30" title="{{$attachment->file_name}}" class="kt-widget__img kt-hidden-"></td>
                                    <td style="width:100px">
                                        <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs viewFile" title="View File" data-file="{{$attachment->path}}"><i class="la la-eye"></i></button>
                                        <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs downloadFile" title="Download File" data-file="{{$attachment->path}}"><i class="la la-cloud-download"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <td colspan="4">No Attachments in this Card</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(isset($card->note))
    <div class="card-note">
        <div><i class="la la-sticky-note fs-25"></i></div>
        <div>
            <p class="card-note__content">Important Note</p>
        </div>
    </div>
    @endif
    <div class="card-comment">
        <div class="card-comment__user-image">
            <img src="{{asset("images/default.jpg")}}" alt="img">
        </div>
        <div class="card-comment_content">
            <form id="commentCreateForm">
                <input type="hidden" name="taskboard_card_id" value="{{$card->id}}">
                <textarea placeholder="Write comment..."
                    id="cardTextarea"
                    class="form-control mb-10"
                    style="height: 60px;
                    margin-top: 0px;
                    margin-bottom: 10px;
                    resize: none;
                    min-height: 60px;
                    overflow-y: hidden;"
                    oninput="auto_grow(this)"
                    name="comment"></textarea>

            </form>
            <div>
                <button type="button" id="btnTaskboardCardCommentSubmit" class="btn btn-success btn-sm">Comment</button>
                <button type="button" id="btnTaskboardCardCommentFormClear" class="btn cbtn-default btn-sm hideForm">Clear</button>
            </div>
        </div>
    </div>
    <div class="comment-all-container">
        @if(count($card->comments)>0)
            @foreach($card->comments as $comment)
            <div class="comment-all" id="comment{{$comment->id}}">
                <div class="comment-all__user-image">
                    <img src="{{asset("images/default.jpg")}}" alt="img">
                </div>
                <div class="comment-all__content">
                    <p class="user_name">{{$comment->user->fullname}} <span class="comment_time">{{ \Carbon\Carbon::parse($comment->created_at)->diffForhumans() }}</span></p>
                    <div class="comment_{{$comment->id}}"><p class="comment">{{$comment->comment}}</p></div>
                    <div class="comment-all__action">
                        @if(auth()->id() == $comment->userc_id)
                        <a href="javascript:void(0)" class="btnTaskboardCardCommentEdit" id="commentEdit{{$comment->id}}" data-id="{{$comment->id}}" data-value="{{$comment->comment}}">Edit</a>
                        <a href="javascript:void(0)" data-url="taskboardcard/comment/{{$comment->id}}" class="btnTaskboardCardCommentDelete subModel" data-id="{{$comment->id}}">Delete</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else 
            <p style="padding-left:33px">No comments yet</p>
        @endif
    </div>
</div>
