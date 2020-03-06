<div class="custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Compose Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="update_contact_details" style="margin-top:15px;">   
                        @csrf
                        {{-- {{dd($address)}} --}}
                        <div id="tabContent">
                            <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;padding-top:0px !important;">
                                    <div class="row" style="margin-bottom:1rem;">
                                        <div class="form-group col-lg-12 col-sm-6">
                                            {{-- <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label">To:</label>
                                                        To:
                                                        <input class="form-control" value="" type="text">
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label class="control-label" for="user_add_2">Subject:</label>
                                                        
                                                        <input class="form-control">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                {{-- <label class="col-lg-2 col-form-label">To:</label>
                                                <div class="col-lg-10">
                                                    <input type="email" class="form-control">
                                                </div> --}}
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text" style="width: 80px;background:">To:</span></div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Subject:</span></div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row form-group-marginless kt-margin-t-20">
                                                <div class="col-lg-12">
                                                    <textarea type="text" class="form-control" id="summernote-email"></textarea>
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
                                                <button id="sendMail" class="btn btn-pill btn-success"><i class="flaticon-mail"></i>Send</button>
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
    $(document).ready(function() {
        $('#summernote-email').summernote({
            height:200,
            toolbar: [
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'underline', 'italic']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                dialogsInBody: true,
                dialogsFade: true,  
        });
        $('.note-editing-area').css('z-index', '-1');
    });

</script>