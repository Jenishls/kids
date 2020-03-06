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
<div class="modal-dialog addClientModalDialog" role="document" style="margin-left:16%; margin-top:1%;">
    <div class="modal-content addClientModal modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="addContentForm" style="margin-top:15px;">   
                        {{-- {{dd($address)}} --}}
                        <div id="tabContent">
                            <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                                <div class="kt-portlet__body" style="padding:5px 25px 0px 25px !important;">
                                    <div class="row" style="margin-bottom:1rem;">
                                        <div class="form-group col-12">
                                           <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Title</label>
                                                        <input class="form-control"  type="text" id="title" name="title">
                                                    </div>
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Subtitle</label>
                                                        <input class="form-control"  type="text" name="sub_title">
                                                    </div>
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Section</label>
                                                        <input class="form-control"  type="text" name="section">
                                                    </div>
                                                    <div class="form-group  col-md-6" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Category</label>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <select name="category_id" id="category_select" data-title="Select Category"></select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <button type="button" class="btn btn-info  btn-sm btn-icon" id="addContentCategory" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="summernote">Highlight</label>
                                                        <textarea name="highlight" id="hightlight_summernote" rows="8" style="width:100%;border:1px solid #e2e5ec;border-radius: 4px;"></textarea>
                                                    </div>
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="summernote">Content</label>
                                                        <textarea name="description" id="summernote" rows="10" style="width:100%;border:1px solid #e2e5ec;border-radius: 4px;"></textarea>
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
                                                <button  class="btn btn-success" ><i class="la la-save"></i>Save</button>
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
    $(document).off('submit','#addContentForm').on('submit','#addContentForm', function(e){
        e.preventDefault();
        let data= $(this).serializeArray();
        let url = $(this).data('route')? $(this).data('route') : '/admin/content/store';
        supportAjax({
            url,
            method: 'POST',
            data
        },
        function(resp){
            console.log(resp);
        },
        function(err){
            console.log(err.responseJSON.errors);
        })


    })
    $(document).ready(function() {
        $('#category_select').select2({
            width: '100%',
            placeholder:'Select Category',
            ajax: {
               method: 'POST',
               url: '/admin/content/category/list',
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               processResults: function(data) {
                   let res = [];
                   $.each(data, function(i, obj) {
                       res.push({
                           id: obj.id,
                           text: obj.value
                       });
                   });
                   return {
                       results: res
                   };
               }
           }
        });
        $('#addContentCategory').on('click', function(e){
            e.preventDefault();
            showModal({
                url:'admin/content/category/add',
                c: 2
            })
        })
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
      $('#hightlight_summernote').summernote({
          height:100,
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