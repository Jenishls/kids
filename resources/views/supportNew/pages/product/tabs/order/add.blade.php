<style>
    .box_shadow{
        padding: 10px 15px 10px 15px;
        margin-bottom: 10px;
        border-radius: 4px;
        background: #fefefe;
        box-shadow: 2px 2px 7px 1px rgba(201, 201, 201, 0.7);
    }
    
    .portlet_custom_label {
        margin-top: -25px;
        font-weight: 800;
        display: table;
        z-index: 1;
        font-size: 12px;
        padding: 5px 15px;
        letter-spacing: 1px;
        border: 1px solid #f1f2f6;
        border-radius: 19px;
        background: #cbcbcb;
        color: #646c9a;
    }
    
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        min-height: 150px;
        padding: 54px 54px;
        box-sizing: border-box;
        cursor: pointer;
    }
    
    .boldLabel{
        font-weight: 600 !important;
    }
    </style>
    <div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 4% !important; margin-left: 28% !important;">
        <div class="modal-content addProductModal" style="width: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Feature</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="productFeatureForm">   
                            @csrf
                            <div style="background:#e4e4e4 !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;margin-left: 10px; margin-top: 10px;">
                                    <div class="row mb-5">
                                        <div class="form-group col-12 box_shadow" >
                                            <div class="product_color">
                                                <div class="form-group row" style="padding: 5px; position: relative;">
                                                    <button type="button" id="add_more_feature" class="btn btn-info btn-sm btn-icon" style="height: 1.5rem; width: 1.5rem; background: #49bdf4; border: #47bdf5; position: absolute; right: 17px; top: 50px; z-index: 9;"><i class="fa fa-plus"></i></button>
                                                    <div class="col-lg-12">
                                                        <label class="control-label boldLabel" for="salutation">Feature</label>
                                                        <textarea class="form-control" rows="2" name="feature[]" style="width: 97%;"></textarea>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clonedFeatures">
                                            </div>
                                        </div>
                                    </div>	                
                                </div>
                                <div class="kt-portlet__foot footer_white">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="" class="btn btn-success btn-pill" id="storefeature">Add</button>
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
        
        $(document).off('click','#storefeature').on('click','#storefeature',function(e){
            e.preventDefault();
            $.ajax({
                url:'/admin/products/tab/feature/add/{{$product}}',
                method: 'POST',
                data: new FormData(document.getElementById('productFeatureForm')),
                contentType: false,
                processData: false,
                success: function(response){
                    $('#cModal').modal('hide');
                    toastr.success(response.message);
                    $('#productFeatureDataTable').KTDatatable().reload();
                }, 
                error:function({status, responseJSON})
                {
                
                }
            });
        });

        $(document).off('click', "#add_more_feature").on('click', "#add_more_feature", function(e){
            e.preventDefault();
            $('.clonedFeatures').append(createTemplate());
        });
        $(document).off('click', '.removeCloned').on('click', '.removeCloned', function(e){
            $(this).parent().remove();
        });

        function createTemplate() {
            return (
                `<div class="form-group row" style="padding: 5px; position: relative;">
                    <button type="button" class="btn btn-info btn-sm btn-icon removeCloned" style="height: 1.5rem; width: 1.5rem; background: #be0505; border: #be0505; position: absolute; right: 17px; top: 25px; z-index: 9;">
                        <i class="la la-close"></i>
                        </button>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="2" name="feature[]" style="width:97%;"></textarea>
                            <div class="errorMessage"></div>
                        </div>
                </div>`
            );
        }

        
    </script>