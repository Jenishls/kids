<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Bank Master</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="addBankMasterForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input class="form-control" type="text" name="name">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-5" id="type_member" style="padding-top:10px;">
                                                    <label class="control-label" for="companySelect">Company</label>
                                                    <select class="form-control" name="account_id" id="companySelect">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group col-md-1" style="padding-top: 38px;padding-left:0px;">
                                                    <div class="xs-mt-30">
                                                        <button type="button" class="btn btn-success btn-sm " id="addCompany"
                                                                title="Add Company" style="padding:7px; padding-right:2px;">
                                                            <i class="la la-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="account_name">Account Name</label>
                                                    <input class="form-control" type="text" name="account_name">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="account_number">Account No.</label>
                                                    <input class="form-control" type="text" name="account_number">
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="accType">Account Type</label>
                                                    <select class="form-control" name="account_type" id="accType">
                                                        <option value="">Select</option>
                                                        <option value="saving">Saving Account</option>
                                                        <option value="current">Current Account</option>
                                                        <option value="fixed">Fixed Account</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                    <div class="form-group  col-md-6">
                                                    <label class="control-label" for="openedDate">Opened Date</label>
                                                    <input class="form-control" type="text" id="openedDate"  name="opened_date">
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="branch">Branch</label>
                                                    <input class="form-control" type="text" name="branch">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>	  
                            </div>
                            <div class="kt-portlet__foot footer_white">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 kt-align-right">
                                            <button id="createBankMaster" class="btn btn-pill btn-success"><i class="la la-save"></i>Save</button>
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
    $('#openedDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'MM/DD/YYYY'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    });

    $('#companySelect').select2({
        width:'100%',
        ajax:{
            url: '/admin/bankmaster/getCompany',
            processResults: function(data){
                var d = [];
                $(data).each(function (k, v) {
                    var a = {
                        text: v.company_name,
                        id: v.id
                    };
                    d.push(a);
                });
                return {
                    results: d
                };
            }
        }
    });

     $('#accType').select2({
        width:'100%',
    });


    $(document).off('click', '#createBankMaster').on('click', '#createBankMaster', function(e){
        e.preventDefault();
        let bankMasterForm = $('#addBankMasterForm');
        let data = $('#addBankMasterForm').serializeArray();
        supportAjax({
            url: `/admin/bankmaster/add`,
            method: "POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Added Successfully');
            $('#bankMasterTable').KTDatatable().reload();
        }, function({ status,responseJSON}){
            if (status === 422) 
            {
                bankMasterForm.find('input[name]').css('border-color', '#ddd');
                bankMasterForm.find('select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    bankMasterForm.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    bankMasterForm.find(`select[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`select[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
                    $(`select[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });
</script>