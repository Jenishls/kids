@if (count($company->attachments)>0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($company->attachments->count())
        @foreach($company->attachments as $attachment)
        <tr>
            <th style="font-weight:100;">{{\Carbon\Carbon::parse($attachment->created_at)->format('m/d/Y')}}</th>
            <td data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Click to change title" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;width:40%;">
                {{-- {{$attachment->type}} --}}
               <div class="fileTitleChange" data-id="{{$attachment->id}}"><span class="fileTitle" >{{$attachment->title ?: 'Title not set'}}</span> </div>
            </td>
           
            <td>
                <span style="overflow: visible; position: relative;">
                    <a title="Download file" data-route="/admin/account/attachment/download/{{$attachment->file_name}}" data-file="{{$attachment->file_name}}" class="btn btn-hover-brand btn-icon btn-pill downloadFile">
                        <i class="la la-download"></i>
                    </a>
                    <a title="Delete file" data-route="/admin/account/file/sdelete/{{$attachment->id}}" data-file="{{$attachment->file_name}}" class="btn btn-hover-danger btn-icon btn-pill delFile">
                        <i class="la la-trash"></i>
                    </a>
                </span>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@else
    <h6 class="text-center pt-2">No attachments available</h6>
@endif