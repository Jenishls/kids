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
        /* label{
            font-weight: bold !important;
        } */
        .btn{
            border-radius: 19px !important;
        }
        
        
        #itemLists{
            display: none;
            position: absolute;
            z-index: 9999;
            display: block;
            list-style: none;
            width: 94%;
            background: #fafafa;
            min-height: 75px;
            border-radius: 4px;
            border: 1px solid #41bcf6;
            text-align: left;
            padding-left: 0px;
        }
        .listOfCompanies{
            background: #fafafa;
            display:flex;
            
        }
        .listOfCompanies>li{
            cursor: pointer;
            width: 50%;
        }

        .cardDetail {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            padding-bottom: 0;
        }
        .checkImg {
            display: flex;
            align-items: center;
        }
        .cardDetail label {
            width: 45px;
        }
        .cardDetail img {
            width: 100%;
            margin-left: 10px;
        }
        .cardNumber {
            padding-left: 20px;
            padding-top: 5px;
        }
        .change-card {
            font-weight: 300;
            color: #3697ff;
            text-transform: capitalize;
        }
    </style>
    <div class="modal-dialog " role="document" style="width: 700px !important; max-width: 700px !important;">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;opacity:1 !important;">
                </button>
            </div>
            <div class="modal-body" style="padding:0px !important;">
                <div class="kt-portlet kt-portlet--tabs" style="margin-bottom:0px !important;">
                    <div class="kt-portlet__body" style="background:#e5f7ff !important; padding:0px !important;"> 
                        <form class="kt-form kt-form--label-right" id="paymentForm">   
                            @csrf
                            <div class="form-group col-md-12 p-25" style="padding-bottom: 15px !important;">
                                    <div class="shadow_inputs">
                                        <div class="form-group row">
                                            <div class="form-group  col-md-6">
                                                <label>Balance</label>
                                                @php
                                                $tax = 0;
                                                if($order->tax){
                                                    $tax = default_company('sales_tax')/100 * $balance;
                                                }
                                                @endphp
                                                <input class="form-control" type="text" value="{{$balance}}" readonly name="amount">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label>Payment Using</label>
                                                <select class="form-control check_payment" data-card-count = '{{$order->client->paymentProfiles->count()}}' name="check_payment" id="expiration_month">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Card</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shadow_inputs" id="pay_using_same_card" style="display: none;">
                                        <div class="form-group row">
                                            <div class="form-group  col-md-12">
                                                <div class="cardDetail" id="default_card">
                                                    @php $paymentProfile = $order->client->paymentProfiles->first();@endphp
                                                    @if($paymentProfile)
                                                    <div class="checkImg">
                                                        <input type="radio" name="customer_profile_default" id="initial{{$paymentProfile->id}}" value="{{$paymentProfile->id}}" checked>
                                                        <label for="initial{{$paymentProfile->id}}">
                                                            <img src="{{asset('/cratesOnSkatesImages/cards/discover.svg')}}" alt="">
                                                        </label>
                                                    </div>
                                                    <div class="cardNumber" style="font-weight:600;font-size:15px;color:#1a1a1a;">{{strtoupper($paymentProfile->card)}} 
                                                        <span style="font-weight:300; color: #909090; font-size:13px"> ending with {{substr($paymentProfile->card_no, -4)}}</span>
                                                    </div>
                                                    @endif
                                                    <button type="button" class="btn change-card choose--cards">Change</button> 
                                                </div>
                                                <table class="table table-striped" id="credit_card_table" style="display: none;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Card</th>
                                                            <th>Card Name</th>
                                                            <th>Expiry</th>
                                                            {{-- <th>Choose</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order->client->paymentProfiles as $paymentProfile)                               
                                                        <tr>
                                                            <td>
                                                                <div class="cardDetail no-pd">
                                                                    <div class="checkImg">                                                            
                                                                        <input type="radio" name="customer_profile" id="profile{{$paymentProfile->id}}" value="{{$paymentProfile->id}}" @if($loop->first) checked @endif>
                                                                        <label for="profile{{$paymentProfile->id}}"><img src="{{asset('cratesOnSkatesImages/cards/discover.svg')}}" alt=""></label>
                                                                    </div>
                                                                    <div class="cardNumber" style="font-weight:600;font-size:15px;color:#1a1a1a;">{{strtoupper($paymentProfile->card)}}                                                            
                                                                        <span style="font-weight:300; color: #909090; font-size:13px"> ending with {{substr($paymentProfile->card_no, -4)}}</span>
                                                                    </div>
                                                                </div>
                                                                @if($loop->last)
                                                                    <button type="button" class="btn change-card add--new-card" style="padding-left:30px">Add another card</button> 
                                                                @endif
                                                            </td>
                                                            <td class="dp-none-582">
                                                                <span class="text-lighter text-capitalize">{{$paymentProfile->name_per_card}}</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-lighter">{{date('m/d/Y',strtotime($paymentProfile->expiry))}}</span>
                                                            </td>
                                                            {{-- <td> --}}
                                                            {{-- <div class="global-btn global-btn__green cs-add-qty m-l-5 js--pick--card @if($loop->first) choosen @endif" for="profile{{$paymentProfile->id}}">
                                                                    <p class="fs-13 pd-15-x-i">Choose</p>
                                                                </div>
                                                            </td> --}}
                                                        </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="shadow_inputs" id="card_payment" style="display: none;">
                                        {{-- <div class="form-group row">
                                            <div class="form-group  col-md-12">
                                                <div class="cardDetail">
                                                    <div class="checkImg">
                                                        @php $paymentProfile = $order->client->paymentProfiles->first(); @endphp
                                                        <input type="radio" name="customer_profile_default" id="initial{{$paymentProfile->id}}" value="{{$paymentProfile->id}}" checked>
                                                        <label for="initial{{$paymentProfile->id}}"><img src="{{asset('cratesOnSkatesImages/cards/discover.svg')}}" alt=""></label>
                                                    </div>
                                                    <div class="cardNumber" style="font-weight:600;font-size:15px;color:#1a1a1a;">{{strtoupper($paymentProfile->card)}} 
                                                        <span style="font-weight:300; color: #909090; font-size:13px"> ending with {{substr($paymentProfile->card_no, -4)}}</span>
                                                    </div>
                                                    <button type="button" class="btn btn-link change-card choose--cards">Change</button> 
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <div class="form-group  col-md-12">
                                                <label class="control-label" for="add2">Card Number </label>
                                                <input class="form-control" type="text" name="card">
                                                    <div class="errorMessage"></div>
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label class="control-label" for="add2">CVV </label>
                                                <input class="form-control" type="text" name="code">
                                                    <div class="errorMessage"></div>
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label class="control-label" for="add2">Expiry Month</label>
                                                <select class="form-control" name="expm" id="expiration_month">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                                    <div class="errorMessage"></div>
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label class="control-label" for="add2">Expiry Year</label>
                                                <select class="form-control" name="expy" id="expiration_month">
                                                    <option value="03">2019</option>
                                                    <option value="04">2020</option>
                                                    <option value="05">2021</option>
                                                </select>
                                                    <div class="errorMessage"></div>
                                            </div>
                                            <div class="form-group  col-md-8">
                                                <label class="control-label" for="add2">Name As Per Card</label>
                                                <input class="form-control" type="text" name="name_per_card">
                                                    <div class="errorMessage"></div>
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label class="control-label" for="add2">Zip Code</label>
                                                <input class="form-control mask--zip" type="text" name="zip">
                                                    <div class="errorMessage"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>     
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block; background: #eee;">
                    <button type="reset" class="btn btn-secondary btn-pill" data-dismiss="modal"> <i class="la la-times"></i> Cancel</button>
                {{-- <button type="button" class="btn btn-light btn-pill float-left" data-dismiss="modal">Cancel</button> --}}
                <button type="button" class="btn btn-success btn-pill btn-elevate float-right" id="makeInvoicePayment">
                    <span>
                        Pay
                    </span>
                </button>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(e){
            zipMask(".mask--zip");
            cardMask("[name='card']");
            cvvMask("[name='code']");
            $(document).off('change', '.check_payment').on('change', '.check_payment', function(e) {
                e.preventDefault();
                e.stopPropagation();
                let cards_count = $(this).attr('data-card-count');
                if($(this).val() == 2){
                    if(cards_count > 0){
                        $('#pay_using_same_card').show();
                    }
                    else{
                        $('#card_payment').show();
                    }
                }
                else{
                    $('#pay_using_same_card').hide();
                    $('#card_payment').hide();
                }
            });

            $(document).off('click','.choose--cards').on('click','.choose--cards',function(e){
                e.preventDefault();
                $('#credit_card_table').show();
                $('#default_card').hide();
            });

            $(document).off('click','.add--new-card').on('click','.add--new-card',function(e){
                e.preventDefault();
                $('#card_payment').show();
                $('#pay_using_same_card').remove();
                $('#pay_using_same_card').hide();
            });
            
            $(document).off('click','#makeInvoicePayment').on('click','#makeInvoicePayment',function(e){
                e.preventDefault();
                $.ajax({
                    url:'/admin/order/payment/{{$order->id}}',
                    method: 'POST',
                    data: new FormData(document.getElementById('paymentForm')),
                    contentType: false,
                    processData: false,
                    success: function(response){
                        toastr.success(response.message);
                        $('#paymentdataTable').KTDatatable().reload(); 
                        $('#invoicedataTable').KTDatatable().reload(); 
                        $('#cModal').modal('hide');
                        $('#span_invoice').text(response.invoice);
                        $('#span_payment').text(response.payment);
                        $('#span_balance').text(response.balance);
                        if(response.balance > 0){
                            $('#make_payment').show();
                        }
                        else{
                            $('#make_payment').hide();
                        }
                    }, 
                    error:function({status, responseJSON})
                    {
                    }
                });
            });
        });
    
    </script>