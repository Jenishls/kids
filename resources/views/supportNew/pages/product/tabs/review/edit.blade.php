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
            <div class="modal-content addProductModal" style="width: 800px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                            <form class="kt-form kt-form--label-right" id="productReviewEditForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="product_color">
                                                    <div class="form-group row" style="padding: 5px; position: relative;">
                                                        <div class="col-lg-8">
                                                            <label class="control-label boldLabel" for="salutation">Title</label>
                                                        <input class="form-control" type="text" name="title" value="{{$review->title}}" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label boldLabel" for="salutation">Stars</label>
                                                            <input class="form-control" type="text" name="stars" value="{{$review->stars}}" required="require" autocomplete="off">
                                                            <div class="errorMessage"></div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="control-label boldLabel" for="salutation">Review</label>
                                                        <textarea class="form-control" rows="4" name="content">{{$review->content}}</textarea>
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
                                                    <button type="" class="btn btn-success btn-pill" id="editReview">Edit</button>
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
            
            $(document).off('click','#editReview').on('click','#editReview',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/products/tab/review/update/{{$review->id}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('productReviewEditForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#cModal').modal('hide');
                        toastr.success(response.message);
                        $('#productReviewDataTable').KTDatatable().reload();
                    }, 
                    error:function({status, responseJSON})
                    {
                    
                    }
                });
            });
            
        </script>