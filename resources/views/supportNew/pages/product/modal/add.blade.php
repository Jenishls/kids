<style>
.box_shadow{
    padding: 10px 15px 10px 15px;
    margin: 10px;
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
<div class="modal-dialog custom_dialog " role="document" style="margin-top: 4% !important; margin-left: 27% !important;">
    <div class="modal-content addProductModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
            </button>
        </div>
        <div class="modal-body no-padding" style="">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body no-padding" style="background:#e4e4e4 !important; "> 
                    <form class="kt-form kt-form--label-right" id="productFormS">   
                        @csrf
                        <div class="pt-10" style="background:#e5f7ff !important;">
                            <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                <div class="row mb-5 no-margin">
                                    <div class="form-group col-12 box_shadow" >
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-lg-4">
                                                <label class="control-label boldLabel" for="salutation">Code</label>
                                                <input class="form-control" type="text" name="code" data-inputName="FirstName" id="code" placeholder="Code" required="require" autocomplete="off">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="control-label boldLabel" for="first_name">Name</label>
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="require" autocomplete="off">
                                                <div class="errorMessage"></div>
                                                
                                            </div>
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="dob">Manufracture Date</label>
                                                <input class="form-control" type="text" id="manu-date"  name="manu_date" placeholder="Manufracture date" required="require" autocomplete="off">
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="dob">Category</label>
                                                <select class="form-control" name="category_id" id="category">
                                                </select>
                                                <button type="button" class="btn btn-info btn-sm btn-icon" id="adddCategory" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button>
                                                <div class="errorMessage"></div>
                                            </div>
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="dob">Sub Category</label>
                                                <select id="sub_category" class="form-control" name="sub_category_id">
                                                </select>
                                                {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                <div class="errorMessage"></div>
                                            </div>
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="dob">Child Category</label>
                                                <select class="js-example-basic-multiple form-control" id="child_category" name="child_category_id">
                                                </select>
                                                {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-4">
                                                <label class="control-label boldLabel ">Brand</label>
                                                
                                                    <select name="brand_id" class="js-example-basic-multiple  form-control" id="brand">
                                                    </select> 
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" id="addBrand" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button>
                                                
                                                <div class="errorMessage"></div>
                                            </div>
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="dob">Unit Price ($)</label>
                                                {{--  --}}
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="unit_price_label" placeholder="Unit Price" autocomplete="off">
                                                </div>
                                                <div class="errorMessage"></div>
                                            </div>
                                            
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="salutation">Adds On Step</label>
                                                <select class="form-control selectpicker" name="step">
                                                    <option value="1">1 (Recommendations)</option>
                                                    <option value="2">2 (Additional Items)</option>
                                                </select>
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-4">
                                                <label class="control-label boldLabel" for="salutation">Product Type</label>
                                                <select class="form-control selectpicker" name="sales">
                                                    <option value="purchase">Purchase</option>
                                                    <option value="rent">Rent</option>
                                                </select>
                                                <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row" style="padding: 5px;">
                                            <div class="col-12">
                                            <label class="control-label boldLabel" for="dob">Description</label>
                                                <textarea class="form-control" rows="9" name="desc"></textarea>
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
                                            <button type="" class="btn btn-success btn-pill" id="storeProductS">Add</button>
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
    $('#manu-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    });

    $('.selectpicker').selectpicker();

    $(document).find('#category').select2({
        placeholder: 'Select Category',
        width: '85%',
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

    $('#sub_category').select2({
        width: '100%',
        placeholder: "Select Sub Category",
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/sub_category'+($('#category').val()?'?category='+$('#category').val():'');
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
    
    $('#brand').select2({
        width: '85%',
        placeholder: "Select Brand",
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/brands/all';
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
    
    $('#child_category').select2({
        width: '100%',
        placeholder: "Select Sub Category",
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/sub_category'+($('#sub_category').val()?'?category='+$('#sub_category').val():'');
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

    $(document).off('click', '#adddCategory').on('click', '#adddCategory', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: '/admin/products/category/add/',
            c: 2
        });
    });
    
    $(document).off('click', '#addBrand').on('click', '#addBrand', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: '/admin/products/brand/add/',
            c: 2
        });
    });
    

    $(document).off('click','#storeProductS').on('click','#storeProductS',function(e){
        e.preventDefault();
        $.ajax({
        url:'/admin/products/add',
        method: 'POST',
        data: new FormData(document.getElementById('productFormS')),
        contentType: false,
        processData: false,
        success: function(response){
            $('#cModal1').modal('hide');
            toastr.success('Product Successfully added.');
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