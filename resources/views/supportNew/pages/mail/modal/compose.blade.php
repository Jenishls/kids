<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .portlet_label{
        position: absolute;
        font-weight: 500;
        display: table;
        z-index: 1;
        font-size: 15px;
        padding: 7px 26px;
        letter-spacing: 1px;
        border: 1px solid #f1f2f6;
        border-radius: 19px;
        background: #41bcf6;
        color: white!important;
        font-size: 13px!important;
    }
    /* .portlet_label:hover{
        color: #e5f7ff!important;
    }*/
    .form-group label {
        font-size: 0.9rem!important;
        font-weight: 500!important;
    }
    .nav-link.modal_tab_headers{
        text-align:center!important;
    }
    .tableParentTitle{
        padding: 10px;
        background: #49bdf4!important;
        color: #ffffff!important;
        font-weight: 500;
        border: 1px solid #ebedf2;
        margin-bottom: 10px!important;
    }
    .custom_wizard_table{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #e5f7ff26;
        border: 1px solid #e1e1ef;
    }
    .img_placeholder{
        height: 100px;
    }
    .img_placeholder img{
        max-width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .modal-900 {
        width: 900px!important;
    }

    .mail-form-table textarea {
        border: none;
        resize: none;
        padding: 10px;
        height: 40px;
    }
    .mail-form-table {
        width: 100%;
    }
    .mail-form-table .select2-selection--single, .mail-form-table input {
        border: none;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
    .mail-form-table tr {
        border-bottom: 1.2px solid #ebedf2;
    }
    .btn-xs i {
        font-size: 1.3rem !important;
        line-height: 2rem !important;
    }

    .tagify{
        border: none;
        height: auto;
    }

    .dropzone.dropzone-multi .dropzone-item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-top: .75rem;
    border-radius: 4px;
    padding: .5rem 1rem;
    background-color: #f4f6fa;
}
.dropzone.dropzone-multi .dropzone-item .dropzone-file {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
}
.dropzone.dropzone-multi {
    border: 0;
    padding: 0;
}
#cModal .modal-dialog {
    margin-top: 4%;
    margin-left: 30%;
}
</style>
<div class="modal-dialog custom_dialog" role="document" style="min-width: 800px !important; max-width: 800px !important;">
    <div class="modal-content" style="width: 650px !important;">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Send Mail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="demoWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="send_mail_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="generalWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                        <table class="mail-form-table mr-10 ml-10">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 50px;">
                                                                            <span>From : </span>
                                                                        </td>
                                                                        <td>
                                                                        <textarea id="mailfrom" rows="1" readonly class="form-control">{{$setting->email_from}}</textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 30px;">
                                                                            <span>To :</span>
                                                                        </td>
                                                                        <td>
                                                                            <textarea name="to" id="mailTo" rows="1" class="form-control"></textarea>
                                                                        </td>
                                                                        <td style="width: 20px">
                                                                            <a style="border:none;" data-route="/admin/products/detail/1" class="btn btn-hover-brand btn-default btn-icon btn-pill pageload btn-xs"><i title="view Item" class="la la-eye"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 30px;">
                                                                            <span>Cc :</span>
                                                                        </td>
                                                                        <td>
                                                                            <textarea name="cc"  rows="1" class="form-control"></textarea>
                                                                        </td>
                                                                        <td style="width: 20px">
                                                                            <a style="border:none;" data-route="/admin/products/detail/1" class="btn btn-hover-brand btn-default btn-icon btn-pill pageload btn-xs"><i title="view Item" class="la la-eye"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="bcc" style="display: none"> 
                                                                        <td style="width: 30px;">
                                                                            <span>BCC :</span>
                                                                        </td>
                                                                        <td>
                                                                            <textarea name="bcc" id="mailTo" rows="1" class="form-control"></textarea>
                                                                        </td>
                                                                        <td style="width: 20px">
                                                                            <a href="#" class="btn btn-outline-brand m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-l-10" style="width:26px !important;margin-top: 5px;
                                                                            height:24px !important;" data-sub-modal-route="tasks/email/recipents_modal?request_from=cc">
                                                                                <i class="la la-eye"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                        
                                                            </tbody>
                                                        </table>
                                                        <table class="mail-form-table mr-10 ml-10">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 60px;">
                                                                        <span>Subject :</span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="subject" class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    <div class="col-md-12 col-sm-12 mt-10">
                                                        <input type="file" name="attachments[]" multiple id="add_attachment" style="display: none;">
                                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mt-10">
                                                        <div class="kt-notification-v2 row" id="attachment_container">
                                                            
                                                        </div>
                                                        <div class="kt-inbox__attachments">
                                                            <div class="dropzone dropzone-multi row" id="kt_inbox_compose_attachments" style="min-height: unset;">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

        <div class="modal-footer" style="display: inline-block; background: #eee;">
            <button type="button" class="btn btn-sm btn-light btn-pill float-left" data-dismiss="modal">Cancel</button>
            <button type="" class="btn btn-sm btn-pill btn-success float-right" id="send_mail">Send Mail <i class="la la-save"></i></button>
        </div>

    </div>
</div>
<script>    
    // $('#message').summernote({
    // height: 200
    // });
    var HightlightButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: '<i class="flaticon2-clip-symbol"/>',
        tooltip: 'Add Attachments in Mail',
        click: function() {
            $('#add_attachment').click();
        }
    });

    return button.render();
    }
    $(document).ready(function() {
    $('#message').summernote({
        toolbar: [
        ['style', [ 'bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['codeview', 'highlight']]
        ],
        buttons: {
        highlight: HightlightButton
        }, 
        height: 350,
    });
    });

    $('#add_attachment').off('change').on('change', function(e){
        e.preventDefault();
        var files = this.files;
        readmultifiles(files);
    })
    function readmultifiles(files) {
        var reader = new FileReader();  
        function readFile(index) {
            if( index >= files.length ) return;
            var file = files[index];
            reader.fileName = file.name
            reader.onload = function(e) {  
            // get file content  
            let name = e.target.fileName;
            if(name.length > 20) name = name.substring(0,20);
            $('#kt_inbox_compose_attachments').append(`
                <div class="dropzone-items col-md-4">
                    <div class="dropzone-item dz-processing dz-image-preview dz-success dz-complete" style="">
                        <div class="dropzone-file">
                            <div class="dropzone-filename text-left" title="${name}">
                                <i class="flaticon-attachment"></i>
                                <span data-dz-name="">${name}</span> 
                            </div>
                            <div class="dropzone-error" data-dz-errormessage=""></div>
                        </div>
                        <div class="dropzone-progress">
                            <div class="progress" style="opacity: 0;">
                                <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress="" style="opacity: 0; width: 100%;"></div>
                            </div>
                        </div>
                        <div class="dropzone-toolbar">
                            <span class="dropzone-delete remove_attachment" data-dz-remove=""><i class="flaticon2-cross"></i></span>
                        </div>
                    </div>
                </div>
            `);
            // do sth with bin
            readFile(index+1)
            }
            reader.readAsDataURL(file);
        }
        readFile(0);
    }
    
    userMails((results)=>{
        let input = document.querySelector('textarea[name=to]'),
        tagify = new Tagify(input, {
            enforceWhitelist : false,
            whitelist        : JSON.parse(results),
            
        });
        
        let input1 = document.querySelector('textarea[name=cc]'),
        tagify1 = new Tagify(input1, {
            enforceWhitelist : false,
            whitelist        : JSON.parse(results),
            
        });
    });
   
    
    function userMails(sendMails){
        $.ajax({
            url: "/admin/mail/allUserMail",
            contentType: "application/json",
            success:function(response) {
            // For example, filter the response
            sendMails(response);
        },
            error: function(err) {
                console.log(err);
            }
        });
    }

    $('#send_mail').off('click').on('click', function(e){
        e.preventDefault();
        let data = new FormData(document.getElementById('send_mail_form'));
        $.ajax({
            url:'/admin/mail/sendMail/{{$id}}',
            method: 'POST',
            data: new FormData(document.getElementById('send_mail_form')),
            contentType: false,
            processData: false,
            success: function(response){
                $('#cModal').modal('hide');
                toastr.success('<strong>'+response.message+'</strong>');
                $('#mailLogdataTable').KTDatatable().reload(); 
            }, 
            error:function({status, responseJSON})
            {
            }
        });
    })
    $(document).off('click', '.remove_attachment').on('click', '.remove_attachment', function(e){
        e.preventDefault();
        $(this).closest('.dropzone-items').remove();
    })


</script>