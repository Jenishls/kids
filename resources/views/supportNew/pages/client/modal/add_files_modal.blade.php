<style>
    .form-group{
        padding-bottom:5px !important;
    }
    /* label{
        font-weight: bold !important;
    } */
    .btn{
        border-radius: 19px;
    }
</style>
<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:16%;">
    <div class="modal-content addClientModal modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Attachments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="clientAttachmentForm" style="margin-top:15px;">   
                        @csrf
                        {{-- {{dd($address)}} --}}
                        <div id="tabContent">
                            <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                                 <div class="kt-portlet__body" style="margin-left: 1.5rem;">
                                    <div class="form-group row">
                                        <div class="form-group shadow_inputs" style="max-width:100% !important;width:97.6% !important;">
                                            <span class="btn portlet_label" style="position:relative !important;top:-14% !important;left:0%!important;">Upload Files</span>	  
                                            <div class="form-group row">
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
                                
                                <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                {{-- <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button id="updateDetails" class="btn btn-success"><i class="la la-upload"></i>Upload</button>
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
    var uploadedDocumentMap = {}
    $("div#document-dropzone").dropzone(
        { 
            autoProcessQueue: false,
            url: "/admin/client/processfiles",
            paramName: "attachment",
            maxFiles: 10,
            maxFileSize:10,
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                console.log(response, file);
                $('#clientAttachmentForm').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
        }
    );
    $("#clientAttachmentForm").off('submit').on('submit', function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        supportAjax({
            url:'/admin/client/addfiles/{{$id}}',
            method:'post',
            data
        },function(resp){
            console.log(resp);
        },function(err){
            console.log(err);
        })
    })
</script>