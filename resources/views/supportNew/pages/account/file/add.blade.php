<style>
    #kt_selected_items_table > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
        color: #fefefe;
    }
    
    #kt_select_item_datatable > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
        color: #fefefe;
    }

    .form-group{
        padding-bottom:8px !important;
    }
    /* label{
        font-weight: bold !important;
    } */
    .btn{
        border-radius: 19px !important;
    }
    #itemLists{
        display: none;
        position: absolute;
        z-index: 9999;
        display: block;
        list-style: none;
        width: 94%;
        background: #fafafa;
        min-height: 75px;
        border-radius: 4px;
        border: 1px solid #41bcf6;
        text-align: left;
        padding-left: 0px;
    }
    .listOfCompanies{
        background: #fafafa;
        display:flex;
        
    }
    .listOfCompanies>li{
        cursor: pointer;
        width: 50%;
    }
</style>
<div class="modal-dialog " role="document" style="margin-left:26%; margin-top:4%;">
    <div class="modal-content " style="width: 900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success" role="tablist" style="width: 100%;display:flex;">
                            <li class="nav-item active" data-step = '1' data-action="add" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="false">
                                    <i class="flaticon2-image-file"></i>Attachments
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="accountFilesForm" data-accountid="{{$company->id}}">   
                        @csrf
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                   <div class="form-group row">
                                        <div class="form-group shadow_inputs" style="max-width:100% !important;width:97.6% !important;">
                                            <span class="btn portlet_label" style="position: relative !important;top: -9% !important;left: 0%!important;font-size: 13px;">Upload Files</span>   
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
                                                {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="" class="btn btn-success" id="storeAccountFiles">Save<i class="la la-arrow-right"></i></button>
                                                {{-- <button type="button" class="btn btn-brand btn-elevate btn-pill"><i class="la la-arrow-"></i> Continue</button> --}}
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
    </div>
</div>

<script>
   var uploadedDocumentMap = {}
   $("div#document-dropzone").dropzone(
       { 
           // autoProcessQueue: false,
           url: "/admin/account/file/process",
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
               $('#accountFilesForm').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
               uploadedDocumentMap[file.name] = response.name
           },
       }
   );

   $('#storeAccountFiles').off('click').on('click', function(e){
    e.preventDefault();
    let accountId= $('#accountFilesForm').attr('data-accountid');
    $.ajax({
        url:'/admin/account/files/store/'+accountId,
        method: 'POST',
        data: new FormData(document.getElementById('accountFilesForm')),
        contentType: false,
        processData: false,
        success: function(response){
            $('#fileTemplater').html(response);
            $('#cModal').modal('hide');
            toastr.success('<strong>Attachments Created Successfully!</strong>');

        }, 
        error:function({status, responseJSON})
        {

        }
    });

   })
</script>