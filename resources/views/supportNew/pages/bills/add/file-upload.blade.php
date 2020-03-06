<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Bill Files</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="billFileModal" data-id="{{$bill->id}}" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-12" style="padding-top:10px;">
                                                    <div class="dropzone dropzone-default dropzone-success dz-clickable" id="document-dropzone">
                                                        <div class="dropzone-msg dz-message needsclick">
                                                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                            <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>	  
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button id="uploadFiles" class="btn btn-pill btn-success"><i class="flaticon-upload"></i>Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var id = $('#billFileModal').attr('data-id');
    var uploadedDocumentMap = {}
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone('div#document-dropzone',{
        autoProcessQueue: false,
        url: `/admin/bills/processfiles/${id}`,
        paramName: "attachment",
        parallelUploads: 10,
        maxFiles: 10,
        maxFileSize:10,
        addRemoveLinks: true,
        acceptedFiles: "image/*,application/pdf,.psd",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            uploadedDocumentMap[file.name] = response.name;
        },
    });

    clickEvent('#uploadFiles')(uploadBillFiles);
    function uploadBillFiles(e) {
        e.preventDefault();
        $(this).attr('disabled', true);
        $(this).html('Processing...');
        myDropzone.processQueue();
    }
</script>