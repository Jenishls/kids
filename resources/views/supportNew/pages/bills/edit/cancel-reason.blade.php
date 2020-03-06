<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cancel {{$bill->bill_no}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="cancelBillForm" style="margin-top:15px;">   
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important;padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                            <div class="form-group row" style="padding:5px;">
                                                <div class="form-group col-xl-12  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="billType">Reason For Cancellation</label>
                                                    <textarea class="form-control" type="text" name="remarks" id="cancelReason" cols="30" rows="5"></textarea>
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
                                            <button id="cancelBill" data-id="{{$bill->id}}" class="btn btn-pill btn-success"><i class="la la-check"></i>Confirm</button>
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
    clickEvent('#cancelBill')(cancelBill);
    function cancelBill(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let cancelForm = $('#cancelBillForm');
        let data = cancelForm.serializeArray();
        console.log(data);
        supportAjax({
            url:`/admin/bills/cancel/${id}`,
            method: "POST",
            data: data,
        }, function(resp){
            $('#cModal').modal('hide');
            $('#billsTable').empty().append(resp);
        }, function({status, responseJSON}){
            if (status === 422) 
            {
                cancelForm.find('textarea[name]').css('border-color', '#ddd');
                $(`textarea[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    cancelForm.find(`textarea[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push('Reason for cancellation is required');
                    $(`textarea[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`textarea[name="${key}"]`).siblings(".errorMessage").append(message);
                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        })
    }
</script>