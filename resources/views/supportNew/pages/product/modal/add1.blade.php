<style>
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
    .lookupAddBtn{
        background: #49bdf4;
        border: #47bdf5;
        position: absolute;
        right: 0;
        top: -6px;
        height: 1.6rem!important;
        width: 1.6rem!important;
    }
    .lookupAddBtn i{
        font-size: 0.9rem!important;

    }
</style>
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle"><i class="la la-edit"></i> Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="demoWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                      {{--   <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-validateurl="/admin/account/validate/account" data-target="#accountWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-user mr-1"></i>Account
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-target="#branchWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="flaticon-map mr-1"></i> Branches
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12"   data-target="#memberWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="true">
                                    <i class="flaticon2-group mr-1"></i> Members
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="productFormS">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="form-group col-lg-7 col-md-6 col-sm-12" >
                                                   <div class="shadow_inputs">
                                                        <span class="btn portlet_label" style="top: -13px!important;left: 25px;">General</span>
                                                       <div class="form-group row" style="padding-top:10px;">
                                                            <div class="col-lg-6 col-md-12">
                                                                <label class="control-label boldLabel" for="first_name">Name</label>
                                                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="require" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                           <div class="col-lg-6 col-md-12">
                                                               <label class="control-label boldLabel" for="salutation">Code</label>
                                                               <input class="form-control" type="text" name="code" data-inputName="FirstName" id="code" placeholder="Code" required="require" autocomplete="off">
                                                           </div>
                                                       </div>
                                                       <div class="form-group row">
                                                           <div class="col-lg-6 col-md-6">
                                                               <label class="control-label boldLabel" for="dob">Manufracture Date</label>
                                                               <input class="form-control" type="text" id="manu-date"  name="manu_date" placeholder="Manufracture date" required="require" autocomplete="off">
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                           <div class="col-lg-6 col-md-6">
                                                               <label class="control-label boldLabel" for="salutation">Sales Constraint</label>
                                                               <select class="form-control selectpicker" name="sales">
                                                                   <option value="purchase">Purchase</option>
                                                                   <option value="rent">Rent</option>
                                                               </select>
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                       </div>
                                                       <div class="form-group row">
                                                           <div class="col-lg-6 col-md-6">
                                                               <label class="control-label boldLabel" for="salutation">Adds On Step</label>
                                                               <select class="form-control selectpicker" name="step">
                                                                   <option value="1">1 (Recommendations)</option>
                                                                   <option value="2">2 (Additional Items)</option>
                                                               </select>
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                           <div class="col-lg-6 col-md-6">
                                                               <label class="control-label boldLabel" for="dob">Unit Price ($)</label>
                                                               {{--  --}}
                                                               <div class="input-group">
                                                                   <input class="form-control" type="text" name="unit_price_label" placeholder="Unit Price" autocomplete="off">
                                                               </div>
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                       </div>
                                                       
                                                       <div class="form-group row">
                                                           <div class="col-lg-6 col-md-6">
                                                               <label class="control-label boldLabel">Damage Price ($)</label>
                                                               {{--  --}}
                                                               <div class="input-group">
                                                                <select class="form-control selectpicker" name="damage_price_type">
                                                                    <option value="flat">Flat</option>    
                                                                    <option value="percent">Percent(%)</option>    
                                                                </select>   
                                                                <input class="form-control ml-10" type="text" name="damage_price" autocomplete="off">
                                                               </div>
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                       </div>

                                                       <div class="form-group row">
                                                           <div class="col-lg-12 col-md-12">
                                                           <label class="control-label boldLabel" for="dob">Description</label>
                                                               <textarea class="form-control" rows="3" name="desc"></textarea>
                                                               <div class="errorMessage"></div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                                <div class="col-lg-5 col-md-6 col-sm-12">
                                                    <div class="row">
                                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 mediaShadowInput" >
                                                            <div class="shadow_inputs">
                                                                <span class="btn portlet_label" style="top: -13px!important;left: 25px;">Category</span>
                                                                <span class="btn btn-sm portlet_label btn-icon"  id="adddCategory" style="top: -13px!important;right: 38px;left:unset;"> <i class="fa fa-plus"></i></span>

                                                                <div class="form-group row" style="padding: 10px; position: relative;">
                                                                    {{-- <button type="button" class="btn btn-info btn-sm btn-circle " >
                                                                        <i class="fa fa-plus"></i>
                                                                    </button> --}}

                                                                   {{--  <button type="button" class="btn btn-info btn-elevate btn-circle btn-icon lookupAddBtn" id="adddCategory">
                                                                       
                                                                    </button> --}}
                                                                    <div class="col-12">
                                                                        <label class="control-label boldLabel" for="dob">Category</label>
                                                                        <select class="form-control" name="category_id" id="category">
                                                                        </select>
                                                                        <div class="errorMessage"></div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="control-label boldLabel" for="dob">Sub Category</label>
                                                                        <select id="sub_category" class="form-control" name="sub_category_id">
                                                                        </select>
                                                                        {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                                        <div class="errorMessage"></div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="control-label boldLabel" for="dob">Child Category</label>
                                                                        <select class="js-example-basic-multiple form-control" id="child_category" name="child_category_id">
                                                                        </select>
                                                                        {{-- <button type="button" class="btn btn-info btn-sm btn-icon" style="background: #49bdf4; border: #47bdf5;"><i class="fa fa-plus"></i></button> --}}
                                                                        <div class="errorMessage"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 mt-3" >
                                                            <div class="shadow_inputs">
                                                                <span class="btn portlet_label" style="top: -13px!important;left: 25px;">Brand</span>
                                                                <span class="btn btn-sm portlet_label btn-icon"  id="addBrand" style="top: -13px!important;right: 38px;left:unset;"> <i class="fa fa-plus"></i></span>
                                                                <div class="form-group row" style="padding: 10px;">
                                                                   <div class="col-12"  style="position: relative;">
                                                                        <label class="control-label boldLabel ">Brand</label>
                                                                        <select name="brand_id" class="js-example-basic-multiple  form-control" id="brand">
                                                                        </select> 
                                                                        <div class="errorMessage"></div>
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
                            </div>
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-md-6 kt-align-right ml-auto">
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="storeProductS">Save <i class="la la-save"></i></button>
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
    var newWiz = $('#demoWizard').WizardForm();
newWiz.on('nextBtn', function(wizard){
   wizard.sendAjax(wizard.currentStep().data("validateurl"));
});

    $('#manu-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    });

    $('.selectpicker').selectpicker();


    $(document).find('#category').select2({
        placeholder: 'Select Category',
        width: '100%',
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
        width: '100%',
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
            c: 2,
            p:1
        });
    });
    
    $(document).off('click', '#addBrand').on('click', '#addBrand', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: '/admin/products/brand/add/',
            c: 2,
            p:1
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