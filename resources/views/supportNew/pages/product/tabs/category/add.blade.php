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
        <div class="modal-dialog addProductModalDialog modal-md" role="document" style="margin-top: 8% !important; margin-left: 30%;">
            <div class="modal-content addCategoryModal" style="width: 800px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                    </button>
                </div>
                <div class="modal-body" style="padding:0px !important;">
                    <div class="kt-portlet" style="margin-bottom:0px !important;">
                        <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                            <form class="kt-form kt-form--label-right" id="productCategoryForm">   
                                @csrf
                                <div class="pt-10" style="background:#e5f7ff !important;">
                                    <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                        <div class="row no-margin">
                                            <div class="form-group col-12 box_shadow" >
                                                <div class="form-group row" style="padding: 5px;">
                                                    <div class="col-4">
                                                        <label class="control-label boldLabel" for="dob">Category</label>
                                                        <select class="form-control" name="category_id" id="category_id">
                                                        </select>
                                                        {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="control-label boldLabel" for="dob">Sub Category</label>
                                                        <select class="form-control sub_category" name="sub_category_id">
                                                        </select>
                                                        {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="control-label boldLabel" for="dob">Child Category</label>
                                                        <select class="js-example-basic-multiple form-control child_category" name="child_category_id">
                                                        </select>
                                                        {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                        <div class="errorMessage"></div>
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
                                                    <button type="" class="btn btn-success btn-pill" id="storeCategory">Add</button>
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
            $('#category_id').select2({
                placeholder: 'Select Category',
                width: '100%',
                tags: true,
                ajax: {
                    method: 'POST',
                    url: '/admin/products/category/all',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function(data) {
                        let res = [];
                        $.each(data, function(i, obj) {
                            res.push({
                                id: obj.id,
                                text: obj.name
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            });

            $('.sub_category').select2({
                width: '100%',
                tags: true,
                placeholder: "Select Sub Category",
                ajax: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: function (params) {
                    return '/admin/products/sub_category'+($('#category_id').val()?'?category='+$('#category_id').val():'');
                    },
                    processResults: function (data) {
                        let res = [];
                        $.each(data, function(i , obj){
                            res.push({
                                id: obj.id,
                                text : obj.name
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            });
            
            $('.child_category').select2({
                width: '100%',
                tags: true,
                placeholder: "Select Sub Category",
                ajax: {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: function (params) {
                    return '/admin/products/sub_category'+($('.sub_category').val()?'?category='+$('.sub_category').val():'');
                    },
                    processResults: function (data) {
                        let res = [];
                        $.each(data, function(i , obj){
                            res.push({
                                id: obj.id,
                                text : obj.name
                            });
                        });
                        return {
                            results: res
                        };
                    }
                }
            });

            $(document).off('click','#storeCategory').on('click','#storeCategory',function(e){
                e.preventDefault();
                $.ajax({
                url:'/admin/products/tab/category/add',
                method: 'POST',
                data: new FormData(document.getElementById('productCategoryForm')),
                contentType: false,
                processData: false,
                success: function(response){
                    $('.addCategoryModal').parents('.modal').modal('hide');
                    toastr.success('Category Added Successfully.');
                    $('#productDataTable').KTDatatable().reload();
                }, 
                error:function({status, responseJSON})
                {
                    // if(status===422){
                    //     $('#accountAddForm').find('input[name], select[name]').css('border-color', '#ddd');
                    //     $(`input[name]`).siblings(".errorMessage").empty();
                    //     $(`select[name]`).siblings(".errorMessage").empty();
        
                    //     if (!responseJSON.errors) return;
                    //     const messages = [];
                    //     for (const [key, message] of Object.entries(responseJSON.errors)) {
                    //          $('#accountAddForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    //          $('#accountAddForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                    //         messages.push(message);
                    //         $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
        
                    //         $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    //     }
                    //     toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
                    // }
                }
            });
            });
        </script>