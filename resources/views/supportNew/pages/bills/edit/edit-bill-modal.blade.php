<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$bill->bill_no}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="editBillForm" style="margin-top:15px;">   
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="billType">Bill Type</label>
                                                    <select class="form-control" name="bill_type" id="billType">
                                                       <option value="">Select</option>
                                                       <option value="members" {{isset($bill->member_id)?"selected":""}}>Member</option>
                                                       <option value="accounts" {{isset($bill->account_id)?"selected":""}}>Account</option>
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-6" id="type_member" style="display:none !important;padding-top:10px;">
                                                    <label class="control-label" for="memberSelect">Member</label>
                                                    <select class="form-control" name="member" id="memberSelect">
                                                        <option value="{{$bill->account_id}}" selected>{{isset($bill->account_id)?$bill->account->company_name:"Select"}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-6" id="type_account" style="display:none !important;padding-top:10px;">
                                                    <label class="control-label" for="accountSelect">Account</label>
                                                    <select class="form-control" name="account" id="accountSelect">
                                                        <option @if($bill->table === 'accounts')value="{{$bill->table_id}}" @else value=""@endif>{{isset($bill->member_id)?$bill->member->name:"Select"}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                {{-- <div class="form-group  col-md-6">
                                                    <label class="control-label" for="BType">Type</label>
                                                    <select class="form-control" type="text" id="BType" name="b_type">
                                                        <option value="expense" selected>Expense</option>
                                                        <option value="asset">Asset</option>
                                                    </select>
                                                </div> --}}
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="user_state">Expenses Heading</label>
                                                    <select class="form-control" type="text" name="acc_head" id="accHeads">
                                                        <option value="{{$bill->account_head}}">{{isset($bill->account_head)?$bill->accountHead->name:"Select"}}</option>
                                                    </select>
                                                </div>
                                                {{-- <div class="form-group col-md-1" style="padding-top: 28px;padding-left:0px;">
                                                    <div class="xs-mt-30">
                                                        <button type="button" class="btn btn-success btn-sm " id="add-expense-head"
                                                                title="Add Expense Head" style="padding:7px; padding-right:2px;">
                                                            <i class="la la-plus"></i>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="zip">Bill Title</label>
                                                    <input class="form-control" type="text" value="{{$bill->bill_title}}"  name="bill_title">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6">
                                                    <label class="control-label" for="zip">Date</label>
                                                    <input class="form-control" type="text" name="date" value="{{\Carbon\Carbon::parse($bill->bill_date)->format('m/d/Y')}}" id="billDate">
                                                </div>
                                                <div class="form-group  col-md-2">
                                                    <label class="control-label" for="user_county">Currency</label>
                                                        
                                                    <input class="form-control" type="text" name="currency" value="{{$bill->currency}}">
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label class="control-label" for="user_county">Amount</label>
                                                        
                                                    <input class="form-control" type="number" min="0" value="{{$bill->amount}}" name="amount">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                
                                            </div>
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-12">
                                                    <label class="control-label" for="user_county">Remarks</label>
                                                    <textarea class="form-control" type="text" name="remarks" id="billRemarks">{{$bill->description}}</textarea>
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
                                            <button id="updateBill" data-id="{{$bill->id}}" class="btn btn-pill btn-success"><i class="la la-upload"></i>Update</button>
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
    $(function(){
        @if(isset($bill->member_id))
            $('#type_member').show();
            $('#type_account').hide();
        @elseif(isset($bill->account_id))
            $('#type_member').hide();
            $('#type_account').show();
        @endif
    });

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

    $('#accHeads').select2({
        width: '100%',
        ajax:{
            url: `/admin/bills/getExpanseHead`,
            dataType: 'json',
            processResults: function(data){
                return{
                    results: data
                };
            }
        }
    });


    $(document).off('click', '#updateBill').on('click', '#updateBill', function(e){
        e.preventDefault();
        let data = $('#editBillForm').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: `/admin/bills/edit/${id}`,
            method: "POST",
            data: data,
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Updated Successfully');
            $('#billsTable').KTDatatable().reload();
        }, function(err){
            console.log(err);
        });
    });
</script>