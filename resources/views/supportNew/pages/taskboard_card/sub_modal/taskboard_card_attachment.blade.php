<div class="modal-dialog modal-800" role="document">
    <div class="modal-content mp0">
        <!-- <div class="modal-body"> -->
        <div class="modal-body mp0">
            <div class="m-form m-form--label-align-right floatLabelForm">
                <div class="no-bx-shadow">
                    <div class="m-portlet__body card-update">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="card-update_title">
                                    <div style="display:flex">
                                        <div><i class="la la-align-right fs-25"></i></div>
                                        <div>
                                            <h4 class="title">Attachments</h4>
                                            <span class="pd-l-10 fs-12">in <span class="fw-600">{{$card->title}} </span></span>
                                        </div>
                                    </div>
                                    <div class="card-update_icon-close"><i class="la la-close fs-20" data-dismiss="modal"></i></div>
                                </div>
                            </div> 
                            <div class="col-12 col-sm-12">
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
                                        @if(count($card->attachments)>0)
                                            @foreach($card->attachments as $key => $attachment)
                                                <tr>
                                                    <td style="width:30px">{{$key+1}}</td>
                                                    <td>File</td>
                                                    <td><img src="/file/placeholder/{{$attachment->extension}}" data-type="{{$attachment->fileType()}}" height="30" title="" class="kt-widget__img kt-hidden-"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs viewFile" data-file="{{$attachment->path}}" title="View File"><i class="la la-eye"></i></button>
                                                        <button type="button" class="btn btn-outline-brand btn-elevate btn-circle btn-icon btn-xs downloadFile" data-file="{{$attachment->path}}" title="Download File"><i class="la la-cloud-download"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else 
                                        <td colspan="4">No Attachments in this Card</td>
                                        @endif
                                    </tbody>
                                </table>
                                <div>
                                    <form id="cardAttachmentForm">
                                        <input type="hidden" name="taskboard_card_id" value="{{$card->id}}">
                                        <div class="dropzone dropzone-default dropzone-success dz-clickable document-dropzone" id="">
                                            <div class="dropzone-msg dz-message needsclick">
                                                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="m-t-15 text-right">
                                        <button type="button" id="btnTaskboardCardAttachmentUpdate" class="btn btn-success btn-sm">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$("div.document-dropzone").dropzone({
        url: "/taskboardcard/attachments",
        paramName: "attachment",
        maxFiles: 5,
        maxFileSize:10,
        addRemoveLinks: true,
        acceptedFiles: "image/*,application/pdf,.psd",
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
        $('#cardAttachmentForm').append('<input type="hidden" name="paths[]" value="cards/' + response.name + '">')
    },
});
</script>