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
    .custom_dialog.custom-modal-max__750{
        max-width:750px!important;
    }
    
</style>
<div class="modal-dialog custom_dialog  custom-modal-max__750 " style="" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle"> <i class="la la-plus"></i>Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="campaignAddWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                {{-- <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-target="#supplierForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-bullhorn mr-1"></i>Campaign
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="activity_add_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="campaignForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <input type="hidden" name="campaign_id" value="{{$campaign}}">
                                                <div class="form-group row ">
                                                    <div class="col-md-6 col-sm-6" >
                                                       <label class="control-label" for="company_id">Supplier</label>
                                                        <select name="company_id" class="supplierSelect2"></select>
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-6" >
                                                        <label class="control-label" for="type_of_service">Type of Service</label>
                                                        <select name="type_of_service" class="serviceSelect2"></select>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                   <div class="col-md-6 col-sm-6" >
                                                        <label class="control-label" for="type_of_service">Status</label>
                                                        <select name="status" class="supplierStatus"></select>
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <label class="control-label" for="industry">Cost</label>
                                                        <input type="text" name="cost" class="form-control">
                                                        <div class="errorMessage"></div>
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
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="storeSupplier">Save <i class="la la-save"></i></button>
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
//datepicker init


    $(".serviceSelect2").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/campaign/type_of_services/select2Data'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.value,
                        text : capitalizeFirstLetter(obj.value),
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    })
    $(".supplierStatus").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return '/admin/campaign/type_of_services/select2Data'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.value,
                        text : capitalizeFirstLetter(obj.value),
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    })
    $(".supplierSelect2").select2({
        width: '100%',
        placeholder: '\u200B',
        tags: true,
        ajax: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: function (params) {
                return 'admin/account/select2/data'
            },
            processResults: function (data) {
                let res = [];
                $.each(data, function(i , obj){
                    res.push({
                        id: obj.id,
                        text : capitalizeFirstLetter(obj.c_name),
                        data : obj
                    });
                });
                return {
                    results: res
                };
            }
        }
    })
    $("input[name=activity_budget]").inputmask("currency");
       
        clickEvent('#storeSupplier')(function(e){
            e.preventDefault();
           let data = $('#activity_add_form').serializeArray();
           supportAjax({
               url:"/admin/campaign/store",
               method:'post',
               data
           },function(resp){
                if(resp.success){
                    toastr.success('<strong>'+resp.success+'</strong>');
                    $('#cModaladdCampaign').modal('hide');
                    campaignTableReloader();
                }
           })
        })
</script>