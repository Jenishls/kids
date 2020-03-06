<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id="editCompanyLogo" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="dropzone dropzone-default dropzone-success dz-clickable" id="kt_dropzone_3" style="border:1px dashed #c1c1c1;">
                    <div class="dropzone-msg dz-message needsclick">
                        <input type="hidden" name="property" value="logo">
                        <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path('app/defaultCompany'.'/'.$defaultCompany->value)))}}" alt="" id="output" height="100" width="100">
                        <br>

                        <input id="companyLogo" type="file" name="file" placeholder="Upload Logo">
                        </label>
                        <div id="nameError" style="color:red;"></div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon imageUpdate" data-id="{{$defaultCompany->id}}">Upload</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).off('click', '.imageUpdate').on('click', '.imageUpdate', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let formId = 'editCompanyLogo';
        imageAjax(formId);


    });
</script>