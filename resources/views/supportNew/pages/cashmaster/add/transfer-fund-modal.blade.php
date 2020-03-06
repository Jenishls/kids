<style>
    .form-group{
        padding-bottom:5px !important;
    }
</style>
<div class="custom-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transfer Fund To {{$c_master->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet" style="margin-bottom:0px !important;">
               
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important; padding-top:0px!important;color:#000;"> 
                    <form class="kt-form kt-form--label-right" id="transferFundForm" style="margin-top:15px;">   
                        @csrf
                        <div class="" id="kt_portlet_base_demo_1_1_tab_content"style="background:#e5f7ff !important;" >
                            <div class="kt-portlet__body" style="padding:25px;padding-bottom:0px !important; padding-top:0px !important;">
                                <div class="row" style="margin-bottom:1rem;">
                                    <div class="form-group col-12">
                                        <div class="">
                                             <div class="form-group row" style="padding:5px;">
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="amount">Bank</label>
                                                    <select name="bank_master_id" id="bankSelect">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="errorMessage"></div>
                                                </div>
                                                <div class="form-group  col-md-6" style="padding-top:10px;">
                                                    <label class="control-label" for="amount">Amount</label>
                                                    <input class="form-control" type="number" min="0" name="amount">
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
                                            <button id="transferFund" class="btn btn-pill btn-success" data-id="{{$c_master->id}}"><i class="la la-money"></i>Transfer</button>
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
    $('#bankSelect').select2({
        width: '100%',
        ajax:{
            url: '/admin/cashmaster/getBankMaster',
            processResults: function(data){
                var d = [];
                $(data).each(function (k, v) {
                    var a = {
                        text: v.account_name,
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

    $(document).off('click', '#transferFund').on('click', '#transferFund', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let bankMasterForm = $('#transferFundForm');
        let data = $('#transferFundForm').serializeArray();
        supportAjax({
            url: `/admin/cashmaster/transfer/${id}`,
            method: "POST",
            data: data
        }, function(resp){
            $('#cModal').modal('hide');
            toastr.success('Added Successfully');
            $('#cashMasterTable').KTDatatable().reload();
        }, function({ status,responseJSON}){
            if (status === 422) 
            {
                bankMasterForm.find('input[name]').css('border-color', '#ddd');
                bankMasterForm.find('select[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                $(`select[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors){
                    toastr.error(responseJSON.message);
                    return;
                }
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