<style>
    .box_shadow{
        padding: 10px 15px 10px 15px;
        margin-bottom: 10px;
        border-radius: 4px;
        background: #fefefe;
        box-shadow: 2px 2px 7px 1px rgba(201, 201, 201, 0.7);
    }
        
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
    .inventoryTemplate .heading{
        display: flex;
        align-items: center;
    }
    .inventoryTemplate .heading h6 i{
        margin-right: 3px;
        font-size: 1rem;
    }
    .templateContainer .subHeading{
        padding-bottom: 10px;
    }
    .templateContainer .subHeading i{
        margin-right: 3px;
        color:#47484a;
    }
    .templateContainer .subHeading span{
        color: #47484a;
    }
    #singleInventoryForm.editMode #storeSingleInventory{
        display: none!important;
    }
    #singleInventoryForm.editMode #updateSingleInventory{
        display: inline-block;
    }
    #singleInventoryForm #updateSingleInventory{
        display: none;
    }
    </style>
    <div class="modal-dialog custom_dialog" role="document">
        <div class="modal-content addProductModal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__body" style="background:#e4e4e4 !important; padding:0px !important;"> 
                        <div class="pt-10" style="background:#e5f7ff !important;">
                            <form class="kt-form kt-form--label-right" id="allInventoriesAddForm" >   
                            <div class="kt-portlet__body pl-35 pr-35 pb-35">
                                <div class="row no-margin">
                                    <div class="form-group col-lg-7 " id="singleInventoryForm" >
                                            @csrf
                                        <div class="inventoryFormGroup box_shadow">
                                            <div class="form-group row" style="padding-top: 15px; position: relative">
                                                <div class="col-md-6 ">
                                                    <label class="control-label boldLabel" for="salutation">Product</label>
                                                     <select class="form-control" id="productSelect2Picker" name="product_id">
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Name</label>
                                                    <input class="form-control" type="text" name="name"  required="require" autocomplete="off">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Company</label>
                                                    <select class="form-control selectpicker" id="companySelect2Picker" name="company_id">
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Color</label>
                                                    <select class="form-control selectpicker" id="colorSelect2Picker" name="color_id">
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Size</label>
                                                    <select class="form-control selectpicker" id="sizeSelect2Picker" name="size_id">
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Price</label>
                                                    <input class="form-control" type="text" name="price"  required="require" autocomplete="off">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label boldLabel" for="salutation">Quantity</label>
                                                    <input class="form-control" type="text" name="quantity"  required="require" autocomplete="off">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="col-md-12 pt-2">
                                                    <button type="" class="btn btn-sm btn-pill btn-primary" id="storeSingleInventory">
                                                        <i class="la la-plus"></i> Inventory
                                                    </button>
                                                    <button type="" class="btn btn-sm btn-pill btn-warning text-light" id="updateSingleInventory">
                                                        <i class="la la-edit "></i> Inventory
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div id="inventoriesTemplater">
                                        </div>
                                    </div>
                                </div>	                
                            </div>
                             </form> 
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button type="" class="btn btn-sm btn-pill btn-success" id="storeInventories">
                                                <i class="la la-save"></i>Save
                                            </button>
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
<script>
    var inventorySelect2Init= function()
    {
        $('#productSelect2Picker').select2({
        placeholder: 'Select Product',
        width: '100%',
        tags: true,
        ajax: {
            method: 'get',
            url: '/admin/products/allData',
            processResults: function(data) {
                let res = [];
                $.each(data.data, function(i, obj) {
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
    })

    $('#sizeSelect2Picker').select2({
        placeholder: 'Select' ,
        width: '100%',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/select2/sizes?product='+$('#productSelect2Picker').val();
            },
            processResults: function(data) {
                let res = [];

                $.each(data, function(i, obj) {
                    res.push({
                        id: obj.id,
                        text: obj.size
                    });
                });
                return {
                    results: res
                };
            }
        }
    })
    $('#colorSelect2Picker').select2({
        placeholder: 'Select' ,
        width: '100%',
        tags: true,
        ajax: {
           method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/select2/colors?product='+$('#productSelect2Picker').val();
            },
            processResults: function(data) {
                let res = [];
                $.each(data, function(i, obj) {
                    res.push({
                        id: obj.id,
                        text: obj.color
                    });
                });
                return {
                    results: res
                };
            }
        }
    })
    $('#companySelect2Picker').select2({
        placeholder: 'Select Company' ,
        width: '100%',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
              return '/admin/products/company/all'
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
    })
    }
    inventorySelect2Init();
    $(document).off('click','#storeSingleInventory').on('click','#storeSingleInventory',function(e){
        e.preventDefault();
        console.log($('#singleInventoryForm').find(':input'));
        let data = $('#singleInventoryForm').find(':input').serializeArray();
        supportAjax({
            url:'/admin/inventories/template/create',
            data,
            method: 'POST'
        },
        function(resp)
        {
            $('#inventoriesTemplater').append(resp);
            $('#singleInventoryForm').find(':input').val('');
             $('#productSelect2Picker').val(null).trigger('change');
             $('#sizeSelect2Picker').val(null).trigger('change');
              $('#colorSelect2Picker').val(null).trigger('change');
             $('#companySelect2Picker').val(null).trigger('change');
            console.log(resp);
        },
        function(err)
        {
            console.log(err);
        });
    });
    $(document).off('click','.edit_inventory_template').on('click','.edit_inventory_template', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let dataArray= $(id).find(':input').serializeArray();
        let data = resultToObj(dataArray);
        console.log(data);
        let template= `
        <div class="inventoryFormGroup box_shadow">
            <div class="form-group row" style="padding-top: 15px; position: relative">
                <div class="col-md-6 ">
                    <label class="control-label boldLabel" for="salutation">Product</label>
                     <select class="form-control" id="productSelect2Picker" name="product_id">
                        <option value="${data['product_id[]']}" selected>${data['product_name[]']}</option>
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Name</label>
                    <input class="form-control" type="text" name="name" value="${data['name[]']}"  required="require" autocomplete="off">
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Company</label>
                    <select class="form-control selectpicker" id="companySelect2Picker" name="company_id">
                        <option value="${data['company_id[]']}" selected>${data['company_name[]']}</option>
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Color</label>
                    <select class="form-control selectpicker" id="colorSelect2Picker" name="color_id">
                        <option value="${data['color_id[]']}" selected>${data['color_name[]']}</option>
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Size</label>
                    <select class="form-control selectpicker" id="sizeSelect2Picker" name="size_id">
                        <option value="${data['size_id[]']}" selected>${data['size_name[]']}</option>
                    </select>
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Price</label>
                    <input class="form-control" type="text" name="price" value="${data['price[]']}"  required="require" autocomplete="off">
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-6">
                    <label class="control-label boldLabel" for="salutation">Quantity</label>
                    <input class="form-control" type="text" name="quantity" value="${data['quantity[]']}"  required="require" autocomplete="off">
                    <div class="errorMessage"></div>
                </div>
                <div class="col-md-12 pt-2">
                    <button type="" class="btn btn-sm btn-pill btn-primary inactive" id="storeSingleInventory">
                        <i class="la la-plus"></i> Inventory
                    </button>
                    <button type="" class="btn btn-sm btn-pill btn-warning" data-id="${data['uniqId[]']}" id="updateSingleInventory">
                        <i class="la la-edit"></i> Inventory
                    </button>
                </div>
            </div>
        </div>`;
        $('#singleInventoryForm').html(template).addClass('editMode');
        inventorySelect2Init();
    })
    $(document).off('click', '#updateSingleInventory').on('click', '#updateSingleInventory', function(e){
        e.preventDefault();
        let dataArray = $('#singleInventoryForm').find(':input').serializeArray();
        let data = 

    })
</script>