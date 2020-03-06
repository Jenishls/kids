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
</style>
<div class="modal-dialog custom_dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="cWizardTitle">Add Communication</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;" id="communicationWizard">
            <div class="kt-portlet kt-
            --tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__head" style="padding:0px !important;">
                    <div class="kt-portlet__head-toolbar" style="width:100%;padding: 0 25px;">
                        <ul class="nav  nav-tabs-line" role="tablist"  style="width: 100%;display:flex;">
                            <li class="wizard-tabs active" data-validateurl="/admin/account/validate/account" data-target="#accountWForm" style="flex:1;margin-right:0px !important;">
                                <a class="nav-link modal_tab_headers"  data-toggle="tab" href="javascript:" role="tab" aria-selected="false">
                                    <i class="la la-user mr-1"></i>Communication Prefernces
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="communication_add_form">   
                        @csrf
                        <div class="tab-content">
                            <div class="wizard-panel active" id="accountWForm" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body" id="accountWizardForm" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                    <div class="col-md-6 col-sm-6" >
                                                       <label class="control-label" for="company_name">Communication Name</label>
                                                      <input type="text" name="company_name" class="form-control">
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-6">
                                                       <label class="control-label" for="industry">Communication Type</label>
                                                      <div class="row">
                                                        <div class="col-md-11">
                                                           <input class="form-control" type="text" name="industry" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-sm portlet_label btn-icon" id="add_comm_type">
                                                              <i class="fa fa-plus"></i>
                                                            </span>
                                                        </div>
                                                      </div>
                                                      <div class="errorMessage"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 pt-20">
                                            <span class="btn portlet_label" style="top: 0!important;left: 28px!important;">Message</span>	  
                                            <div class="shadow_inputs">
                                                <div class="form-group row">
                                                    <div class="form-group  col-md-12" style="padding-top:10px;">
                                                        <textarea name="comm_msg" class="form-control" rows="10" placeholder="Write a Message...."></textarea>
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
                                        <button type="" class="btn btn-sm btn-pill btn-success" id="storeCommunication">Save <i class="la la-save"></i></button>
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
var estd_date= $('[name="estd_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    $(this).val( start.format('YYYY-MM-DD'));
  });
var commWiz = $('#communicationWizard').WizardForm();
commWiz.on('nextBtn', function(wizard){
   wizard.sendAjax(wizard.currentStep().data("validateurl"));
});
$('#storeCommunication').off('click').on('click', function(e){
  e.preventDefault();
  let data = $('#communication_add_form').serializeArray();
  supportAjax({
    url:'/admin/account/store',
    method:'Post',
    data
  }, function(resp){
    $('#cModal1').modal('hide');
     toastr.success('<strong>'+resp.success+'</strong>');
     $("#reload_table").trigger('click');
  },
  function(err){
    console.log(err);
  })
})
</script>