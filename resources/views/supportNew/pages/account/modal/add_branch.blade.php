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
   .shadow_inputs.no_shadow{
        box-shadow: none!important;
        padding: 10px 19px 10px 19px!important;
        margin-bottom: 10px!important;
        border-radius: 4px!important;
        background: #ffffff!important;
   }
   #branchFormContainer input.form-control{
        height: 30px;
   }
   .f_s_1p1_rem{
      font-size:1.1rem!important;
   }
   .f_s_p8_rem{
      font-size:0.8rem!important;
   }
   .f_s_1rem{
    font-size: 1rem!important;
    margin-bottom: 0!important;
   }
   #templateDataContainer .formDataTemplater{
      margin-bottom:10px!important;
   }
  #templateDataContainer{
    height: 450px;
    overflow-y: scroll;
    display: none;
  }
  #templateDataContainer.active{
    display: flex;
    
  }
  .kt-portlet .kt-portlet__head.templateHeader{
      min-height: 46px!important;
   }
   .formDataTemplater .actionBtnContainer{
      border-top: 1px dashed #e7e7e7;
   }
   .formDataTemplater .actionBtn{
      padding: 0 0.3rem 0.3rem 0.7rem!important;
   }
   .formDataTemplater .actionBtn i{
      font-size:1.2rem!important;
   }
  #createBranchForm #editNewBranch{
    display: none!important;
  }
  #createBranchForm.editMode #editNewBranch{
    display:inline-block!important;
  }
  #createBranchForm.editMode #createNewBranch{
    display: none!important;
  }
  #createBranchForm #createNewBranch{
    display: inline-block!important;
  }
</style>
<div class="row" id="branchFormContainer">
  <div class="col-md-6 col-sm-12">
    <div class="kt-portlet kt-portlet--mobile" style="background-color: #ffffff!important;border: 1px solid #e5f7ff;">
      <div class="kt-portlet__body pt-0 px-3">
        <div id="createBranchForm" {{-- class="editMode" --}}>
          <div class="row">
            <div class="col-md-12" id="formInputs">
              <div class="form-group row mt-3 ">
                  <div class="col-md-6 col-sm-6" >
                      <label class="control-label" for="branch_name">Branch Name</label>
                      <input type="text" name="c_branch_name" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
                  <div class="col-md-6 col-sm-6" >
                      <label class="control-label" for="branch_name">Branch #</label>
                      <input type="text" name="c_branch_no" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12" >
                      <label class="control-label" for="branch_name">Address 1</label>
                      <input type="text" name="c_branch_add1" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12" >
                      <label class="control-label" for="branch_name">Address 2</label>
                      <input type="text" name="c_branch_add2" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-6 col-sm-6" >
                      <label class="control-label" for="branch_name">Phone Number</label>
                      <input type="text" name="c_branch_phone_no" class="form-control e_mask_phone" >
                      <div class="errorMessage"></div>
                  </div>
                  <div class="col-md-6 col-sm-6" >
                      <label class="control-label" for="branch_name">Email</label>
                      <input type="text" name="c_branch_email" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-4 col-sm-4" >
                      <label class="control-label" for="branch_name">City</label>
                      <input type="text" name="c_branch_city" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
                  <div class="col-md-4 col-sm-4" >
                      <label class="control-label" for="branch_name">State</label>
                      <input type="text" name="c_branch_state" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
                  <div class="col-md-4 col-sm-4" >
                      <label class="control-label" for="branch_name">Zip</label>
                      <input type="text" name="c_branch_zip" class="form-control" >
                      <div class="errorMessage"></div>
                  </div>
              </div>
            </div>
            <div class="col-md-12 pt-3">
                <button type="" class="btn btn-sm btn-pill btn-success" id="createNewBranch"> <i class="la la-plus"></i>Add</button>
                <button type="" class="btn btn-sm btn-pill btn-warning" id="editNewBranch"> <i class="la la-edit"></i>Update</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12" id="noDataTemplater" style="height: 450px;background-color: white;display: flex;justify-content: center;align-items: center;">
      <h6 class="text-success text-center">Enter The form to Add Branch</h6>
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="row" id="templateDataContainer">
    </div>
  </div>
</div>
<script>
  $('#createNewBranch').off('click').on('click', function(e){
    e.preventDefault();
    let form = $("#createBranchForm");
    let formInputs = form.find(':input');
    let dataArray = formInputs.serializeArray();

    supportAjax({
      url:'/admin/account/validate/branch',
      method: 'POST',
      data: dataArray
    },
    function(resp){
        let dataObj = resultToObj(dataArray);
        let uniqueTime= moment().format('hmmss').toString();
        let template = `
          <div class=" col-md-6 branchForm" id="companyBranchForm${dataObj['c_branch_no']+uniqueTime}">
            <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="background-color: #ffffff!important;border: 1px solid #e5f7ff;">
              <div class="kt-portlet__head pt-0 px-3 templateHeader ">
                <div class="kt-portlet__head-label">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="kt-portlet__head-title f_s_1p1_rem">
                      ${dataObj['c_branch_name']}
                      </h3>
                        <input type="hidden" name="branch_name[]" value="${dataObj['c_branch_name']}"  class="form-control" >
                    </div>
                    <div class="col-md-12">
                      <h6 class="f_s_p8_rem mb-0">#${dataObj['c_branch_no']}</h6>
                       <input type="hidden" name="branch_no[]" value="${dataObj['c_branch_no']}" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet__body py-0 px-3">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-12" >
                            <label class="control-label f_s_1rem" for="branch_name"><i class="la la-map"></i>${dataObj['c_branch_add1']}</label>
                          <input type="hidden" name="branch_add1[]" class="form-control" value="${dataObj['c_branch_add1']}" >
                        </div>
                        <div class="col-md-12" >
                            <label class="control-label f_s_1rem" for="branch_name">${dataObj['c_branch_add2']}</label>
                          <input type="hidden" name="branch_add2[]" class="form-control" value="${dataObj['c_branch_add2']}">

                        </div>
                        <div class="col-md-12" >
                            <label class="control-label f_s_1rem" for="branch_name">${dataObj['c_branch_city']}, ${dataObj['c_branch_state']} ${dataObj['c_branch_zip']}</label>
                            <input type="hidden" name="branch_city[]" class="form-control" value="${dataObj['c_branch_city']}">
                            <input type="hidden" name="branch_state[]" class="form-control" value="${dataObj['c_branch_state']}">
                            <input type="hidden" name="branch_zip[]" class="form-control" value="${dataObj['c_branch_zip']}">
                        </div>
                        <div class="col-md-12" >
                            <label class="control-label f_s_1rem" for="branch_name"><i class="la la-phone"></i>${dataObj['c_branch_phone_no']}</label>
                          <input type="hidden" name="branch_phone_no[]" class="form-control"  value="${dataObj['c_branch_phone_no']}">

                        </div>
                        <div class="col-md-12" >
                            <label class="control-label f_s_1rem" for="branch_name"><i class="la la-mail"></i>${dataObj['c_branch_email']}</label>
                            <input type="hidden" name="branch_email[]" class="form-control" value="${dataObj['c_branch_email']}">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-12 pb-2 pt-2 actionBtnContainer" data-targetid="#companyBranchForm${dataObj['c_branch_no']+uniqueTime}">
                      <button type="" class="btn btn_custom_sm btn-pill btn-secondary pull-right actionBtn editThisBranch"> <i class="la la-edit" ></i></button>
                      <button type="" class="btn btn_custom_sm btn-pill btn-danger pull-left actionBtn delThisBranch"> <i class="la la-trash"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `
        $('#templateDataContainer').prepend(template);
        formInputs.val('');
        $('#templateDataContainer').addClass('active');
        $('#noDataTemplater').hide();
        $('#createBranchForm').find('input[name], select[name]').css('border-color', '#ddd');
        $(`input[name]`).siblings(".errorMessage").empty();
        $(`select[name]`).siblings(".errorMessage").empty();
    },
    function(err){
      $('#createBranchForm').find('input[name], select[name]').css('border-color', '#ddd');
      $(`input[name]`).siblings(".errorMessage").empty();
      $(`select[name]`).siblings(".errorMessage").empty();
      if (!err.responseJSON.errors) return;
      const messages = [];
      for (const [key, message] of Object.entries(err.responseJSON.errors)) {
           $('#createBranchForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
           $('#createBranchForm').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
          messages.push(message);
          $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

          $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
      }
      toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
    })
  })
  $('#editNewBranch').off('click').on('click', function(e){
    e.preventDefault();
    let form = $("#createBranchForm");
    let formInputs = form.find(':input');
    let dataArray = formInputs.serializeArray();
    let dataObj = resultToObj(dataArray);
    let target = $(this).attr('data-targetid');
    console.log(dataObj, target);
    let template = `
        <div class="kt-portlet kt-portlet--mobile formDataTemplater" style="background-color: #ffffff!important;border: 1px solid #e5f7ff;">
          <div class="kt-portlet__head pt-0 px-3 templateHeader ">
            <div class="kt-portlet__head-label">
              <div class="row">
                <div class="col-md-12">
                  <h3 class="kt-portlet__head-title f_s_1p1_rem">
                  ${dataObj['c_branch_name']}
                  </h3>
                    <input type="hidden" name="branch_name[]" value="${dataObj['c_branch_name']}"  class="form-control" >
                </div>
                <div class="col-md-12">
                  <h6 class="f_s_p8_rem mb-0">#${dataObj['c_branch_no']}</h6>
                   <input type="hidden" name="branch_no[]" value="${dataObj['c_branch_no']}" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="kt-portlet__body py-0 px-3">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-12" >
                        <label class="control-label f_s_1rem" for="branch_name"><i class="la la-map"></i>${dataObj['c_branch_add1']}</label>
                      <input type="hidden" name="branch_add1[]" class="form-control" value="${dataObj['c_branch_add1']}" >
                    </div>
                    <div class="col-md-12" >
                        <label class="control-label f_s_1rem" for="branch_name">${dataObj['c_branch_add2']}</label>
                      <input type="hidden" name="branch_add2[]" class="form-control" value="${dataObj['c_branch_add2']}">

                    </div>
                    <div class="col-md-12" >
                        <label class="control-label f_s_1rem" for="branch_name">${dataObj['c_branch_city']}, ${dataObj['c_branch_state']} ${dataObj['c_branch_zip']}</label>
                        <input type="hidden" name="branch_city[]" class="form-control" value="${dataObj['c_branch_city']}">
                        <input type="hidden" name="branch_state[]" class="form-control" value="${dataObj['c_branch_state']}">
                        <input type="hidden" name="branch_zip[]" class="form-control" value="${dataObj['c_branch_zip']}">
                    </div>
                    <div class="col-md-12" >
                        <label class="control-label f_s_1rem" for="branch_name"><i class="la la-phone"></i>${dataObj['c_branch_phone_no']}</label>
                      <input type="hidden" name="branch_phone_no[]" class="form-control"  value="${dataObj['c_branch_phone_no']}">

                    </div>
                    <div class="col-md-12" >
                        <label class="control-label f_s_1rem" for="branch_name"><i class="la la-mail"></i>${dataObj['c_branch_email']}</label>
                        <input type="hidden" name="branch_email[]" class="form-control" value="${dataObj['c_branch_email']}">
                    </div>
                </div>
              </div>
              <div class="col-md-12 pb-2 pt-2 actionBtnContainer" data-targetid="${target}">
                  <button type="" class="btn btn_custom_sm btn-pill btn-secondary pull-right actionBtn editThisBranch"> <i class="la la-edit" ></i></button>
                  <button type="" class="btn btn_custom_sm btn-pill btn-danger pull-left actionBtn delThisBranch"> <i class="la la-trash"></i></button>
              </div>
            </div>
          </div>
        </div>
    `
    $(target).html(template);
    $('#createBranchForm').removeClass('editMode');
    formInputs.val('');
  });
  $(document).off('click','.editThisBranch').on('click','.editThisBranch', function(e){
    e.preventDefault();
    let target = $(this).parent().data('targetid');
    let dataArray= $(target).find(':input').serializeArray();
    let dataObj= resultToObj(dataArray);
    let template =`
      <div class="form-group row mt-3 ">
          <div class="col-md-6" >
              <label class="control-label" for="branch_name">Branch Name</label>
              <input type="text" name="c_branch_name" value="${dataObj['branch_name[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
          <div class="col-md-6" >
              <label class="control-label" for="branch_name">Branch #</label>
              <input type="text" name="c_branch_no" value="${dataObj['branch_no[]']}"  class="form-control" >
              <div class="errorMessage"></div>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-12" >
              <label class="control-label" for="branch_name">Address 1</label>
              <input type="text" name="c_branch_add1" value="${dataObj['branch_add1[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-12" >
              <label class="control-label" for="branch_name">Address 2</label>
              <input type="text" name="c_branch_add2" value="${dataObj['branch_add2[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-6" >
              <label class="control-label" for="branch_name">Phone Number</label>
              <input type="text" name="c_branch_phone_no" value="${dataObj['branch_phone_no[]']}" class="form-control e_mask_phone" >
              <div class="errorMessage"></div>
          </div>
          <div class="col-md-6" >
              <label class="control-label" for="branch_name">Email</label>
              <input type="text" name="c_branch_email" value="${dataObj['branch_email[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-4" >
              <label class="control-label" for="branch_name">City</label>
              <input type="text" name="c_branch_city" value="${dataObj['branch_city[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
          <div class="col-md-4" >
              <label class="control-label" for="branch_name">State</label>
              <input type="text" name="c_branch_state" value="${dataObj['branch_state[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
          <div class="col-md-4" >
              <label class="control-label" for="branch_name">Zip</label>
              <input type="text" name="c_branch_zip" value="${dataObj['branch_zip[]']}" class="form-control" >
              <div class="errorMessage"></div>
          </div>
      </div>
    `
    $('#formInputs').html(template);
    $('#createBranchForm').addClass('editMode');
    $('#editNewBranch').attr('data-targetid',target);
  }).off('click','.delThisBranch').on('click','.delThisBranch', function(e){
    e.preventDefault();
    let target = $(this).parent().attr('data-targetid');
    $(target).remove();
    if(!$('.branchForm').length){
      $('#templateDataContainer').removeClass('active');
      $('#noDataTemplater').show();
    }
  })
  function resultToObj(array)
  {
    let arr={};
    $(array).each(function(i, field){
      arr[field.name] = field.value;
    });
    return arr;
  }
</script>