<div class="row" id="branchFormContainer">
    <div class="col-md-12">
        <div style="margin: 22px;background: #ffffff;">
            <table class="table kt-datatable__table m-t-10">
                <thead class="kt-datatable__head">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th style="width:150px">Action</th>
                    </tr>
                </thead>
                <tbody class="card_attachments_content">
                    @if(count($task->files)>0)
                        @foreach($task->files as $key => $attachment)
                            <tr>
                                <td style="width:30px">{{$key+1}}</td>
                                <td>File</td>
                                <td><img src="/file/placeholder/{{$attachment->type}}" data-type="{{$attachment->fileType()}}" height="30" title="b0e569e1d0180ee59ff12743cc30af8d.png" class="kt-widget__img kt-hidden-"></td>
                                <td>
                                    <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs viewFile" data-file="{{$attachment->file_name}}" title="View File"><i class="la la-eye"></i></button>
                                    <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs downloadFile" data-file="{{$attachment->file_name}}" title="Download File"><i class="la la-cloud-download"></i></button>
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
    <div class="col-md-12">
        <div style="margin: 28px;">
            <div id="cardAttachmentForm">
                <div class="dropzone dropzone-default dropzone-success dz-clickable document-dropzone" id="">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                        <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$("div.document-dropzone").dropzone({
    url: "/admin/tasks/attachments",
    paramName: "attachment",
    maxFiles: 5,
    maxFileSize:10,
    addRemoveLinks: true,
    acceptedFiles: "image/*,application/pdf,.psd",
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
},
success: function (file, response) {
    $('#cardAttachmentForm').append('<input type="hidden" name="file_names[]" value="tasks/' + response.name + '">')
},
});
</script>


