<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Bill</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="addBillForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="billType">Bill Type</label>
                                                    <select class="form-control" name="bill_type" id="billType">
                                                       <option value="">Select</option>
                                                       <option value="members">Member</option>
                                                       <option value="accounts">Account</option>
                                                    </select>
                                                    <div class="errorMessage"></div>   
                                                </div>
                                                <div class="form-group  col-md-6" id="type_member" style="display:none !important;padding-top:10px;">
                                                    <label class="control-label" for="memberSelect">Member</label>
                                                    <select class="form-control" name="member" id="memberSelect">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6" id="type_account" style="display:none !important;padding-top:10px;">
                                                    <label class="control-label" for="accountSelect">Account</label>
                                                    <select class="form-control" name="account" id="accountSelect">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="BType">Type</label>
                                                    <select class="form-control" type="text" id="BType" name="b_type">
                                                        <option value="">Select</option>
                                                        <option value="expense">Expense</option>
                                                        <option value="asset">Asset</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="user_state">Account Heading</label>
                                                    <select class="form-control" type="text" name="acc_head" id="accHeads">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-2">
                                                    <label class="control-label" for="user_county">Currency</label>
                                                        
                                                    <input class="form-control" type="text" name="currency" value="NRS">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label class="control-label" for="user_county">Amount</label>
                                                        
                                                    <input class="form-control" type="number" min="0" name="amount">
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="zip">Date</label>
                                                    <input class="form-control" type="text" name="date" id="billDate">
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                
                                                    <div class="form-group  col-md-12">
                                                    <label class="control-label" for="zip">Bill Title</label>
                                                    <input class="form-control" type="text"  name="bill_title">
                                                    <div class="errorMessage"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-12">
                                                    <label class="control-label" for="user_county">Remarks</label>
                                                    <textarea class="form-control" type="text" name="remarks" id="billRemarks"></textarea>
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
                                            <button id="createBill" class="btn btn-pill btn-success"><i class="la la-save"></i>Save</button>
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
    $('#billRemarks').markdown();

    $('#billDate').daterangepicker({
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
    $('#billType').select2({
        width: '100%',
    });
    $('#BType').select2({
        width: '100%',
    });
    // $('#accHeads').select2({
    //     width: '100%',

    // });
    $('#memberSelect').select2({
        width: '100%',
        ajax:{
            url: '/admin/bills/getMember',
            processResults: function(data){
                return{
                    results: data
                };
            }
        }
    });
    $('#accountSelect').select2({
        width: '100%',
        ajax:{
            url: '/admin/bills/getAccount',
            processResults: function(data){
                return{
                    results: data
                };
            }
        }
    })
    $('#billType').on('change', function () {
        var type = $(this).val();
        if (type == 'accounts') {
            $('#type_member').hide();
            $('#type_account').show();
        } else if (type == 'members') {
            $('#type_member').show();
            $('#type_account').hide();
        } else {
            $('#type_member').hide();
            $('#type_account').hide();
        }
    });


    $('#BType').change(function(e){
        e.preventDefault();
        let value = $(this).val().toUpperCase();
        $('#accHeads').select2({
            width: '100%',
            ajax:{
                url: `/admin/bills/getAccountHead/${value}`,
                dataType: 'json',
                processResults: function(data){
                    return{
                        results: data
                    };
                }
            }
        });
    });


    $(document).off('click', '#createBill').on('click', '#createBill', function(e){
        e.preventDefault();
        let data = $('#addBillForm').serializeArray();
        let billForm = $('#addBillForm');
        supportAjax({
            url: `/admin/bills/add`,
            method: "POST",
            data: data,
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Added Successfully');
            $('#billsTable').KTDatatable().reload();
        }, function({ status,responseJSON}){
            if (status === 422) 
            {
                billForm.find('input[name]').css('border-color', '#ddd');
                billForm.find('select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    billForm.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    billForm.find(`select[name = "${ key }"]`).css('border-color', '#F44336');
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