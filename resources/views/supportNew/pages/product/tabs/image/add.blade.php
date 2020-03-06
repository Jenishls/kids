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
        <div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 4% !important;">
            <div class="modal-content addProductModal" style="width: 500px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                            <form class="kt-form kt-form--label-right" id="productColorForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="form-group row" style="padding: 5px;">
                                                        <div id="dropzone" class="dropzone" style="width: 100%;">
                                                        </div>
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
                                                    <button type="" class="btn btn-success btn-pill" id="storeColor">Add</button>
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
            $('#product_category').selectpicker();
                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("#dropzone", { 
                    url: "admin/products/tab/image/add/{{$product}}",
                    previewsContainer: false,
                    uploadMultiple:true,
                    parallelUploads:10,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(file, response){
                        $(".dropzone").hide();
                        $("#cModal").modal('hide');
                        toastr.success(response.message);
                        $.ajax({
                            method: "get",
                            url: "admin/products/tab/image/{{$product}}",
                            beforeSend: function () {
                                $("#tab-detail_container").html(cssload);
                            },
                            success: function (response, status, xhr) {
                                setTimeout(function () {
                                    $("#tab-detail_container").html(response);
                                }, 200);
                            },
                            error: function (xhr, status, error) {}
                        });
                    }, 
                    error:function(file, response){
                        toastr.error(response.message, "File upload Fail");
                    }
            });
        </script>