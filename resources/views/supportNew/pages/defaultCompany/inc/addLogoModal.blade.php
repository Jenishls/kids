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
                <div class="dropzone" id="logo_upload">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon imageUpdate" data-id="{{$defaultCompany?$defaultCompany->id:""}}">Upload</button>
            </div>
        </form>
    </div>
</div>
<script>

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#logo_upload", { 
        url: "defaultCompany/logo/upload",
        previewsContainer: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response){
            console.log(response);
            $(".logo_upload").hide();
            $("#default_company_logo").attr('src','admin/defaultCompany/logo/'+response.name);
            toastr.success("Logo uploaded successfully;");
            $('#cModal').modal('hide');
        }, 
        error:function(file, response){
            toastr.error(response.message, "File upload Fail");
        }
    });

    // $(document).off('click', '.imageUpdate').on('click', '.imageUpdate', function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     let formId = 'editCompanyLogo';
    //     imageAjax(formId);


    // });
</script>