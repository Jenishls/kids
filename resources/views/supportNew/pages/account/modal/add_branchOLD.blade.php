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
      display:none;
   }
   .branchForm{
    margin-top:20px;
   }
   .branchForm.viewMode .formDataTemplater{
    display: inline-block;
   }
   .branchForm.viewMode .inputShower{
    display: none;
   }
   .inputShower .inactive{
    display: none;
   }
   .removeThisForm{
    position: absolute;top:10px;right: 18px;font-size:1.2rem;
   }
   .removeThisForm:hover{
    color:red;
    cursor:pointer;
   }
   .outerContainer{
    background: #e6ecef;
    padding: 29px 18px 7px 18px;
    position: relative;
    border-radius: 5px;
   }
   .shadow_inputs.no_shadow{
        box-shadow: none!important;
        padding: 10px 19px 10px 19px!important;
        margin-bottom: 10px!important;
        border-radius: 4px!important;
        background: #ffffff!important;
   }
</style>
<div class="row">
  <div class="col-md-12 pt-2">
    <button type="button" id="addMoreBranchForm" class="btn btn-sm btn-brand btn-elevate btn-circle btn-icon pull-right">
       <i class="la la-plus"></i>
    </button>
  </div>
</div>
<div class="row mb-3" id="branchFormContainer">
  <div class="col-md-12 branchForm">
    <div class="row">
      <div class="col-md-12 inputShower mb-3 outerContainer">
        <div class="row">
          <div class="form-group col-5">
            <span class="btn portlet_label" style="top:-18px!important;">General</span>
            <div class="shadow_inputs no_shadow">
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
                         <input class="form-control e_mask_phone" type="text"  name="branch_phone_no[]"  autocomplete="off"> 
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="email">Email</label>
                         <input class="form-control" value="" type="text" name="branch_email[]">
                          <div class="errorMessage"></div>
                     </div>
                </div>
            </div>
          </div>
          <div class="form-group col-7">
            <span class="btn portlet_label" style="top:-18px!important;left: 31px;">Address</span>
            <div class="shadow_inputs no_shadow">
                <div class="form-group row mt-3 ">
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add1">Address 1</label>
                         <input class="form-control" value="" type="text" name="branch_add1[]">
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add2">Address 2</label>
                         <input class="form-control" value="" type="text" name="branch_add2[]">
                          <div class="errorMessage"></div>
                     </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">County</label>
                        <input class="form-control" value="" type="text" name="branch_county[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3" >
                        <label class="control-label" for="user_city">City</label>
                        <input class="form-control" value="" type="text" name="branch_city[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="user_city">State</label>
                        <input class="form-control" value="" type="text" name="branch_state[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">Zip</label>
                        <input class="form-control" value="" type="text" name="branch_zip[]">
                         <div class="errorMessage"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 formDataTemplater ">
       <div class="shadow_inputs">
            <a title="Edit Form"  class="btn btn-hover-brand btn-icon btn-pill pull-right editThisForm"> 
              <i class="la la-edit"></i>
            </a>
            <div class="row">
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Branch Name:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Branch Number:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Phone:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Email:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">City:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">State:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">County:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Zip:</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>   
  $('#addMoreBranchForm').off('click').on('click', function(e){
    e.preventDefault();
    let template= `<div class="col-md-12 branchForm">
    <div class="row">
      <div class="col-md-12 inputShower mb-3 outerContainer">
          <i class="la la-close removeThisForm"></i>
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
                         <input class="form-control e_mask_phone" type="text"  name="branch_phone_no[]"  autocomplete="off"> 
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="email">Email</label>
                         <input class="form-control" value="" type="text" name="branch_email[]">
                          <div class="errorMessage"></div>
                     </div>
                </div>
            </div>
          </div>
          <div class="form-group col-7">
            <span class="btn portlet_label" style="top:-18px!important;left: 31px;">Address</span>
            <div class="shadow_inputs">
                <div class="form-group row mt-3 ">
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add1">Address 1</label>
                         <input class="form-control" value="" type="text" name="branch_add1[]">
                          <div class="errorMessage"></div>
                     </div>
                     <div class="col-md-6 hideModeDiv">
                         <label class="control-label" for="add2">Address 2</label>
                         <input class="form-control" value="" type="text" name="branch_add2[]">
                          <div class="errorMessage"></div>
                     </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">County</label>
                        <input class="form-control" value="" type="text" name="branch_county[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3" >
                        <label class="control-label" for="user_city">City</label>
                        <input class="form-control" value="" type="text" name="branch_city[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="user_city">State</label>
                        <input class="form-control" value="" type="text" name="branch_state[]">
                         <div class="errorMessage"></div>
                    </div>
                    <div class="col-md-3 hideModeDiv">
                        <label class="control-label" for="user_city">Zip</label>
                        <input class="form-control" value="" type="text" name="branch_zip[]">
                         <div class="errorMessage"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 formDataTemplater ">
          <div class="shadow_inputs">
            <a title="Edit Form"  class="btn btn-hover-brand btn-icon btn-pill pull-right editThisForm"> 
              <i class="la la-edit"></i>
            </a>
            <div class="row">
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Branch Name:</label>
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Branch Number:</label>
                  
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Phone:</label>
                 
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Email:</label>
                  
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">City:</label>
                 
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">State:</label>
                   
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">County:</label>
                
              </div>
              <div class="col-md-3" >
                  <label class="control-label" for="branch_name">Zip:</label>
                  
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>`;
   $('.branchForm').addClass('viewMode');
   $('#branchFormContainer').prepend(template);
  });
$(document).off('click','.editThisForm').on('click','.editThisForm', function(e){
  e.preventDefault();
    $('.branchForm').addClass('viewMode');
    $(this).closest('.branchForm').removeClass('viewMode')
});
$(document).off('click','.removeThisForm').on('click','.removeThisForm', function(e){
  e.preventDefault();
    $(this).closest('.branchForm').remove();
});

$(document).off('keyup','.branchForm input').on('keyup','.branchForm input', function(e){
  e.preventDefault();
  let form = $(this).closest('.branchForm').first();
  let data = form.find(':input').serializeArray();
  let template = `
        <div class="shadow_inputs">
            <a title="Edit Form"  class="btn btn-hover-brand btn-icon btn-pill pull-right editThisForm"> 
              <i class="la la-edit"></i>
            </a>
          <div class="row">
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Branch Name:</label>
                ${data[0].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Branch Number:</label>
                # ${data[1].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Phone:</label>
                 ${data[2].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Email:</label>
                 ${data[3].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">City:</label>
                ${data[7].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">State:</label>
                 ${data[8].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">County:</label>
                ${data[6].value}
            </div>
            <div class="col-md-3" >
                <label class="control-label" for="branch_name">Zip:</label>
                ${data[9].value}
            </div>
          </div>
        </div>`
        form.find('.formDataTemplater').html(template);
})
</script>