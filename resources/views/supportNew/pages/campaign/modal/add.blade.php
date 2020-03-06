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
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle"> <i class="la la-plus"></i>Add Campaign</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="campaignAddWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">

                            <li class="wizard-tabs active" data-target="#campaignForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-bullhorn mr-1"></i>Campaign
                                </a>
                            </li>
                            <li class="wizard-tabs col-sm-12" data-target="#activitesForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab"  href="javascript:" role="tab" aria-selected="false">
                                    <i class="flaticon-add mr-1"></i> Activites
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="activity_add_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="campaignForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                    <div class="col-md-6 col-sm-6" >
                                                       <label class="control-label" for="name">Campaign Name</label>
                                                      <input type="text" name="name" class="form-control">
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-6" >
                                                        <label class="control-label" for="campaign_code">Campaign Code</label>
                                                        <input type="text" name="campaign_code" class="form-control">
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6">
                                                        <label class="control-label" for="industry">Budget</label>
                                                        <input type="text" name="budget" class="form-control">
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                       <label class="control-label" for="industry">Category</label>
                                                       <select name="category" class="categorySelect">
                                                           <option value="Environmental">Environment</option>
                                                           <option value="Promotional">Promotional</option>
                                                           <option value="Social">Social</option>
                                                       </select>
                                                       <div class="errorMessage"></div>
                                                    </div>
                                                   <div class="col-md-3 col-sm-6">
                                                        <label class="control-label" for="industry">Start Date</label>
                                                        <input type="text" name="start_date" class="form-control datePickerEl">
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                   <div class="col-md-3 col-sm-6">
                                                        <label class="control-label" for="industry">End Date</label>
                                                        <input type="text" name="end_date" class="form-control datePickerEl">
                                                        <div class="errorMessage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-panel" id="activitesForm" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" style="padding: 20px 25px 20px!important;">
                                    @include('supportNew.pages.campaign.inc.activityAdvForm')
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot footer_white">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-md-6  wizard--btn" data-wizard-step="prev">
                                        <button type="reset" class="btn btn-secondary btn-sm btn-pill" ><i class="la la-arrow-left"></i>Back</button>
                                    </div>
                                    <div class="col-md-6 kt-align-right wizard--btn ml-auto" data-wizard-step="next">
                                        <button type="" class="btn btn-sm btn-pill btn-success" >Continue <i class="la la-arrow-right"></i></button>
                                    </div>
                                    <div class="col-md-6 wizard--btn kt-align-right ml-auto" data-wizard-step="save">
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="storeActivity">Save <i class="la la-save"></i></button>
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
    $('.datePickerEl').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
        this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
    });
    //select 2 init
    $('.categorySelect').select2({
        width: '100%',
        placeholder: "Select a Category",
        tags: true,
    })
    $("input[name=budget]").inputmask("currency");
    $("input[name=activity_budget]").inputmask("currency");
    //custom wizard init
        var campaignAddWizard = $('#campaignAddWizard').WizardForm();
        campaignAddWizard.on('nextBtn', function(wizard){
            wizard.sendAjax(wizard.currentStep().data("validateurl"));
        });
        campaignAddWizard.on('formChange', function(wizard){
            const dialog = $(wizard[0]).parent().parent();
            let condition = wizard.currentStep().attr('data-target') == '#activitesForm';
            condition? dialog.removeClass('custom-modal-max__750'): dialog.addClass('custom-modal-max__750');
        });
        //store button
        clickEvent('#storeActivity')(function(e){
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