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
<div class="modal-dialog addClientModalDialog" role="document" style=" margin-top:10%; margin-left:35%;">
    <div class="modal-content addClientModal modal-400">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="addContentCategory" style="margin-top:15px;">   
                        {{-- {{dd($address)}} --}}
                        @csrf
                        <div id="tabContent">
                            <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                                <div class="kt-portlet__body" style="padding:5px 25px 0px 25px !important;">
                                    <div class="row" style="margin-bottom:1rem;">
                                        <div class="form-group col-12">
                                           <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <label class="control-label" for="note_title">Category Name</label>
                                                        <input class="form-control"  type="text" id="title" name="category">
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
      $(document).off('submit','#addContentCategory').on('submit','#addContentCategory', function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        let self= $(this);
        supportAjax({
            url: $(this).data('route')? $(this).data('route') :'/admin/content/category/store',
            method:'post',
            data
        },
        function(resp){
            console.log(resp);
        },
        function(err){
            console.log(err);
            let errors = err.responseJSON.errors
            if(errors)
            {
                $(Object.keys(errors)).each(function(key, value){
                    self.find("input[name='"+value+"']").css("border-color", "#be1f1f");
                })
                $(Object.values(errors)).each(function(key, value){
                     toastr.error(
                        "<strong>"+value+"</strong>"
                    );
                });
            }
        })
      })
</script>