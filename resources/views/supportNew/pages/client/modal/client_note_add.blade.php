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
            <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="addClientNote" style="margin-top:15px;">   
                        {{-- {{dd($address)}} --}}
                        <div id="tabContent">
                            <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                                <div class="kt-portlet__body" style="padding:5px 25px 0px 25px !important;">
                                    <div class="row" style="margin-bottom:1rem;">
                                        <div class="form-group col-12">
                                           <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Title</label>
                                                        
                                                        <input class="form-control"  type="text" id="note_title" name="title">
                                                    </div>
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="summernote">Content</label>
                                                        
                                                        <textarea name="note_content" id="summernote" rows="10" style="width:100%;border:1px solid #e2e5ec;border-radius: 4px;"></textarea>
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
                                                <button id="clientAddNote" class="btn btn-success" data-id="{{$id}}"><i class="la la-save"></i>Save</button>
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
        $('#summernote').summernote({
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

$(document).off('click', '#clientAddNote').on('click', '#clientAddNote', function(e){
    e.preventDefault();
    let id =$(this).attr('data-id');
    let data = $('#addClientNote').serializeArray();
    supportAjax({
        url: `/admin/client/add/note/${id}`,
        method: "POST",
        data: data
    }, function(resp){
        $('#cModal').modal('hide');
        toastr.success('Note Added');
        $('#kt_body').empty().append(resp);
    }, function(err){

    });
});
</script>