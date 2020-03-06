<div class="modal-dialog modal-custom-600-width" role="document">
    <div class="modal-content mp0">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title fs-modal-header">
                 <i class="la la-plus cust_plus_icon"></i>
                <span>New Board</span>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <!-- Modal Body -->
        <!-- <div class="modal-body"> -->
        <div class="modal-body mp0">
            <form class="m-form m-form--label-align-right floatLabelForm" id="taskboardForm" enctype="multipart/form-data">
                @csrf
                <div class="no-bx-shadow">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="form-group">
                                    <h4>Board Name</h4>
                                    <input type="text" name="title" id="board_name" class="form-control m-input" required>
                                </div>
                            </div> 
                            <div class="col-12 col-sm-12 m-t-10">
                                <div class="m-form__group form-group">
                                    <h4>Board Type</h4>
                                    <div class="form-group">
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="board_type" value="1"  checked="checked"> Task Board (Recommanded)
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="board_type" value="2"> General Board
                                                <span></span>
                                            </label>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mx-auto">

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
            </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer d-ib">
            <button type="button" class="float-left btn btn-secondary" data-dismiss="modal">
                Cancel
            </button>
            <button type="button" class="float-right btn btn-success" id="btnTaskboardCreate">
                Create 
            </button>
        </div>
    </div>
</div>

<script>
$("div.document-dropzone").dropzone({
        url: "/admin/taskboard/background",
        paramName: "attachment",
        maxFiles: 1,
        maxFileSize:10,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
    $('#taskboardForm').append('<input type="hidden" name="background" value="taskboard/' + response.name + '">')
    },
});
</script>