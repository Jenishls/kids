<div class="row" id="branchFormContainer">
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
    url: "/admin/project/attachment",
    paramName: "attachment",
    maxFiles: 5,
    maxFileSize:10,
    addRemoveLinks: true,
    acceptedFiles: "image/*,application/pdf,.psd",
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
},
success: function (file, response) {
    $('#cardAttachmentForm').append('<input type="hidden" name="file_names[]" value="project/' + response.name + '">')
},
});
</script>


