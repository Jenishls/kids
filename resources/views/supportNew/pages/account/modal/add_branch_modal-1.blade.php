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
        background: #eeeeee;
        color: #41bcf6;
        font-weight: 500;
        border: 1px solid #ebedf2;
        margin-bottom: 0;
    }
    .custom_wizard_table{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #e5f7ff26;
        border: 1px solid #e1e1ef;
    }
   
   .innerContent_f{
    font-size: 0.9rem!important;
   }
   .formDataTemplater{
      /*display:none;*/
   }
   .branchForm.active .formDataTemplater{
    display: inline-block;
   }
   .branchForm.active .inputShower{
    display: none;
   }
   .inputShower .inactive{
    display: none;
   }
</style>
<div class="row">
  <div class="col-md-12 py-2">
      <a href="#" class="btn btn-sm btn-pill btn-brand btn-elevate btn-icon-sm pull-right" id="addMoreBranchForm">
        <i class="la la-plus"></i>
      </a>
  </div>
</div>
<div class="row mb-3" id="branchFormContainer">
  <div class="col-md-12 branchForm  ">
    <div class="row">
      <div class="col-md-12 inputShower">
        <div class="row">
          <div class="form-group col-5">
            <span class="btn portlet_label" style="top:-18px!important;">General</span>
            <div class="shadow_inputs">
                <div class="form-group row mt-3 ">
                    <div class="col-md-6" >
                        <label class="control-label" for="branch_name">Branch Name</label>
                        <input type="text" name="branch_name[]" class="form-control branchNameInput" >
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="industry">Branch #</label>
                        <input class="form-control branchNumInput" type="text" name="branch_no[]" autocomplete="off">
                        <div class="errorMessage"></div>
                    </div>
                     <div class="col-md-6">
                         <label class="control-label" for="phone_no">Phone</label>
                         <input class="form-control e_mask_phone" type="text"  name="phone_no[]"  autocomplete="off"> 
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="email">Email</label>
                         <input class="form-control" value="" type="text" name="email[]">
                          <div class="errorMessage"></div>
                     </div>
                </div>
            </div>
          </div>
          <div class="form-group col-7">
            <span class="btn portlet_label" style="top:-18px!important;left: 31px;">Address</span>
            <div class="shadow_inputs">
                    <a href="#" class="btn btn-sm btn-pill btn-danger btn-elevate btn-icon-sm pull-right" id="addMoreBranchForm" style="    padding: 0.1rem 0.5rem;">
                      <i class="la la-close" style="font-size: 12px;"></i>
                    </a>
                <div class="form-group row mt-3 ">
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add1">Address 1</label>
                         <input class="form-control" value="" type="text" name="add1[]">
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add2">Address 2</label>
                         <input class="form-control" value="" type="text" name="add2[]">
                          <div class="errorMessage"></div>
                     </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">County</label>
                        <input class="form-control" value="" type="text" name="county[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3" >
                        <label class="control-label" for="user_city">City</label>
                        <input class="form-control" value="" type="text" name="city[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="user_city">State</label>
                        <input class="form-control" value="" type="text" name="state[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">Zip</label>
                        <input class="form-control" value="" type="text" name="zip[]">
                         <div class="errorMessage"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 formDataTemplater ">
        <div class="shadow_inputs">
          <div class="row">
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Branch Name:</label>
                shubhu
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Branch Number:</label>
                #KTM35
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Phone:</label>
                (986) 060-9417
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Email:</label>
                Saandesh@hotmail.com
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">City:</label>
                Kathmandu
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">State:</label>
                03
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">County:</label>
                Berlline
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Zip:</label>
                044500
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>   
  

</script>