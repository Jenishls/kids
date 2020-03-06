<style>
    .form-group{
        padding-bottom:5px !important;
    }
    label{
        font-weight: bold !important;
    }
    .portlet_label{
        font-size: 13px!important;
        color: white !important;
        border: 1px solid #e2e5ec;
        background-color: rgba(103, 193, 236, 0.87);
    }
    .form-group label {
    font-size: 0.9rem!important;
    font-weight: 500!important;
    }
</style>
<div class="modal-dialog" role="document" style="margin-left:16%; margin-top:1.5rem;">
    <div class="modal-content modal-1300">
        <div class="modal-header">
            <h5 class="modal-title" style="margin-left:2.5rem;" id="exampleModalLabel">Update Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:cornsilk;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#f9f4f4 !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="update_payment_form" data-paymentid="{{$payment->id}}">   
                        @csrf
                        {{-- {{dd($payment->cr_exp_month)}} --}}
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel" style="background:#f9f4f4 !important;">
                                <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="shadow_inputs">
                                                        <div class="form-group row ">
                                                            <input type="hidden" name="order_id" value="{{$payment->order->id}}">
                                                            <div class="col-lg-3" >
                                                                <label class="control-label" for="salutation">Order #</label>
                                                                <input type="text" name="order_no"  value="{{$payment->order->order_no}}" class="form-control" readonly>
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="control-label" for="first_name">Payment Date</label>
                                                                <input class="form-control" type="date" value="{{$payment->created_at->format('Y-n-j')}}" name="created_at" placeholder="" readonly="" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="control-label" for="middle_name">Gateway</label>
                                                                <input class="form-control" type="text" name="gateway" value="{{$payment->gateway}}" placeholder="" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="control-label" for="cr_last4">Last 4</label>
                                                                <input class="form-control" type="text" name="cr_last4" value="{{$payment->cr_last4}}" autocomplete="off">
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="control-label" for="">Expiry Month</label> <br>
                                                                <select class="form-control" class="" name="cr_exp_month" id="exp_month">
                                                                    <option value="01" @if($payment->cr_exp_month = 1)selected @endif >Jan</option>
                                                                    <option value="02" @if($payment->cr_exp_month == 2)selected @endif >Feb</option>
                                                                    <option value="03" @if($payment->cr_exp_month == 3)selected @endif >Mar</option>
                                                                    <option value="04" @if($payment->cr_exp_month == 4)selected @endif >Apr</option>
                                                                    <option value="05" @if($payment->cr_exp_month == 5)selected @endif >May</option>
                                                                    <option value="06" @if($payment->cr_exp_month == 6)selected @endif >Jun</option>
                                                                    <option value="07" @if($payment->cr_exp_month == 7)selected @endif >Jul</option>
                                                                    <option value="08" @if($payment->cr_exp_month == 8)selected @endif >Aug</option>
                                                                    <option value="09" @if($payment->cr_exp_month == 9)selected @endif >Sep</option>
                                                                    <option value="10" @if($payment->cr_exp_month == 10)selected @endif >Oct</option>
                                                                    <option value="11" @if($payment->cr_exp_month == 11)selected @endif >Nov</option>
                                                                    <option value="12" @if($payment->cr_exp_month == 12)selected @endif >Dec</option>
                                                                </select>
                                                                <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Expiry Year</label>
                                                              <input class="form-control" type="number" name="cr_exp_year" maxValue="9999" value="{{$payment->cr_exp_year}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Transaction Id</label>
                                                              <input class="form-control" type="text" name="cr_exp_year"value="{{$payment->transaction_id}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Last Name</label>
                                                              <input class="form-control" type="text" name="card_last_name"value="{{$payment->card_last_name}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Billing Post Code</label>
                                                              <input class="form-control" type="text" name="card_last_name"value="{{$payment->billing_zip_code}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Amount</label>
                                                              <input class="form-control" type="text" name="amount" value="{{$payment->amount}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              <label class="control-label" for="cr_exp_year">Reference #</label>
                                                              <input class="form-control" type="text" name="ref_no" value="{{$payment->ref_no}}" autocomplete="off">
                                                              <div class="errorMessage"></div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                              <label class="control-label" for="cr_exp_year">Description</label>
                                                              <textarea class="form-control" rows="10" name="description">{{$payment->description}}</textarea>
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
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
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
    $(document).off('submit','#update_payment_form').on('submit','#update_payment_form',function(e){
        e.preventDefault();
        let data = $(this).serializeArray();
        supportAjax({
            url:'/admin/payment/update/'+$(this).data('paymentid'),
            method:'POST',
            data
        },
        function(resp)
        {
            $('#cModal').modal('hide');
            toastr.success(resp.success);
            $('#t_payment_table').KTDatatable().reload();
        },
        function(err)
        {
               $('#update_payment_form').find('input[name], select[name]').css('border-color', '#ddd');
               $(`input[name]`).siblings(".errorMessage").empty();
               $(`select[name]`).siblings(".errorMessage").empty();

               if (!err.responseJSON.errors) return;
               const messages = [];
               for (const [key, message] of Object.entries(err.responseJSON.errors)) {
                    $('#update_payment_form').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    $('#update_payment_form').find(`select[name = "${ key }"]`).siblings('button').css('border-color', '#F44336');
                   messages.push(message);
                   $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                   $(`select[name="${key}"]`).siblings(".errorMessage").empty().append(message);
               }
               toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
        });
    });
    $("#exp_month").select2({
        width: '100%'
    });

</script>