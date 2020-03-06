<style>
    #kt_selected_items_table > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
        color: #fefefe;
    }
    
    #kt_select_item_datatable > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
        color: #fefefe;
    }

    .form-group{
        padding-bottom:8px !important;
    }
    .btn{
        border-radius: 19px !important;
    }
</style>
<div class="modal-dialog " role="document" style="margin-left:26%; margin-top:4%;">
    <div class="modal-content " style="width: 900px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
            </button>
        </div>
        <div class="modal-body" style="padding:0px !important;">
            <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                    <form class="kt-form kt-form--label-right" id="orderPackageForm">   
                        @csrf
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane active" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel" style="background:#e5f7ff !important;">
                                <div class="kt-portlet__body">
                                    <div class="row mb-10">
                                        <div class="form-group col-12">
                                            <div class="shadow_inputs">
                                                <div class="form-group row ">
                                                    <div class="col-lg-4">
                                                        <label class="control-label boldLabel" for="salutation">Name</label>
                                                        <select class="form-control" name="package_id" id="package_type">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="control-label boldLabel" for="salutation">Moving Date</label>
                                                        <input class="form-control" name="moving_date" type="text" required="require" autocomplete="off" id="moving_date" value="{{$order->delivery_date?format_to_us_date($order->delivery_date):''}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="control-label boldLabel" for="salutation">Pickup Date</label>
                                                        <input class="form-control" name="pickup_date" type="text" required="require" autocomplete="off" id="pickup_date" value="{{$order->pickup_date?format_to_us_date($order->pickup_date):""}}">
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
                                                    <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal"> <i class="la la-times"></i> Cancel</button>
                                                {{-- <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal">Cancel</button> --}}
                                                {{-- <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="la la-times"></i>Cancel</button> --}}
                                                {{-- <button type="reset" class="btn btn-brand form_previous_step" data-step="2"><i class="la la-arrow-left"></i>Previous</button> --}}
                                            </div>
                                            <div class="col-lg-6 kt-align-right">
                                                <button type="reset" class="btn btn-success" id="addOrderPackage">Save <i class="la la-save"></i></button>
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
    var check_payment = 0;
    var payment_data = {};
    $(document).ready(function(e){
        $('#package_type').select2({
            placeholder: 'Select Package',
            width: '100%',
            ajax: {
                method: 'POST',
                url: '/admin/order/package/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    let res = [];
                    $.each(data, function(i, obj) {
                        res.push({
                            id: obj.id,
                            text: obj.package_name
                        });
                    });
                    return {
                        results: res
                    };
                }
            }
        });
    }).on
    ('change', function(e){
        e.preventDefault();
            
    });

    $(document).off('click','#addOrderPackage').on('click','#addOrderPackage',function(e){
        e.preventDefault();
        if(check_payment == 1){
            let formData = new FormData(document.getElementById('orderPackageForm')) 
            if(!$.isEmptyObject(payment_data)){
                for (var pair of payment_data.entries()) {
                    formData.append(pair[0], pair[1]);
                }
            }
            $.ajax({
                url:'/admin/order/add/package/{{$order->id}}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    toastr.success(response.message);
                    $('#orderItemDatatable').KTDatatable().reload();
                    $('#invoicedataTable').KTDatatable().reload();
                    $('#paymentdataTable').KTDatatable().reload();
                    $('#cModal1').modal('hide');
                    $('#span_pickup_date').text(moment(response.data.pickup_date).format('MM/DD/YYYY'));
                    $('#span_moving_date').text(moment(response.data.delivery_date).format('MM/DD/YYYY'));
                    $('#span_invoice').text(response.invoice);
                    $('#span_balance').text(response.balance);
                    $('#span_balance').text(response.balance);
                    $('#span_payment').text(response.payment); 
                    $('#span_package').text(response.package.package_name); 
                    console.log(response.balance);
                    if(response.balance > 0){
                        $('#make_payment').show();
                    }
                }, 
                error:function({status, responseJSON})
                {
                }
            });
        }
        else{
            let id = $('#package_type').val();
            showModal({
                url: "/admin/order/directPayment/{{$order->id}}?package_id="+id,
                p:1,
                c: 3
            });
        }
    });
    
    $('#moving_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        parentEl:$('#orderPackageForm'),
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    })

    $('#pickup_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        parentEl:$('#orderPackageForm'),
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    })

</script>