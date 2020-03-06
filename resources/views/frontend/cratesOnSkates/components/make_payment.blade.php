<style>

    .p_title{
        font-size: 15px;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    /* Firefox */
    input[type=number] {
        -moz-appearance:textfield;
    }
    .order-title{
        font-size: 20px;
    }

    #signature-pad{
        width: 100% !important;
    }
    .modal-600{
        max-width: 600px;
    }
    .order_modal_footer{
        display: inline-block; 
        background: #eee;
    }
    @media only screen and (max-width: 422px) {
        .order_modal_footer{
            display: flex;
            flex-direction: column;
        }
        .clear_cancel_btn{
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btnMark{
            width: 100%;
        }
        .checkout-label{
            font-size:12px;
        }
        .form-control{
            font-size:12px;
        }
    }
    .update--form {
        display: none;
    }

    .table-success-th {
        border: 1px solid #76c043;
    }

    .table-success-th thead {
        background: #76c043;
        border-bottom: none !important;
    }

    .table-success-th th {
        color: #fff;
        border-bottom: none !important;
    }

    .table-success-th tr td:first-child {
        font-weight: 500;
        color: #252525;
    }

    .checkout-summary {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .checkout-summary>div {
        display: flex;
    }

    .checkout-summary>div strong,
    .checkout-summary>div span {
        padding: 10 30px;
        font-size: 18px;
        font-family: 'rock-well';
        text-transform: uppercase;
        text-align: right;
        color: #252525;
    }

    .update-review-form {
        display: none;
    }

    .updateCurrentReview:hover {
        cursor: pointer;
    }

    /* Cards */
    .cardDetail {
        display: flex;
        align-items: flex-start;
        padding: 20px;
        padding-bottom: 0;
    }

    .cardDetail img {
        width: 100%;
        margin-left: 10px;
    }

    .cardDetail label {
        width: 60px;
    }

    .checkImg {
        display: flex;
        align-items: center;
    }

    .cardNumber {
        padding-left: 20px;
        padding-top: 5px;
    }

    /* Radio Button */
    .checkImg [type="radio"]:checked,
    .checkImg [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    .checkImg [type="radio"]:checked+label,
    .checkImg [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 20px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }

    .checkImg [type="radio"]:checked+label:before,
    .checkImg [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 10;
        width: 20px;
        height: 20px;
        border: 2px solid #76c043;
        /* border-radius: 100%; */
        background: #fff;
    }

    .checkImg [type="radio"]:checked+label:after,
    .checkImg [type="radio"]:not(:checked)+label:after {
        content: '';
        width: 10px;
        height: 10px;
        background: #76c043;
        position: absolute;
        top: 14.5px;
        left: 5.5px;
        /* border-radius: 100%; */
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .checkImg [type="radio"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    .checkImg [type="radio"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .change-card{
        font-weight: 300;
        color: #3697ff;
        text-transform: capitalize;
    }

    .other-cards table{
        margin-bottom: 0 !important;
    }

    .other-cards table thead th{
        font-weight: 500;
        border: none !important;
        color: #76c043;
    }

    .text-lighter{
        font-size: 14px;
        color: #909090;
    }

    .choosen{
        display: none;
    }
</style>
<div class="modal-dialog addProductModalDialog modal-md modal-600" role="document">
    <div class="modal-content addProductModal">
        <div class="modal-header" style="background: #76c043;">
            <h5 class="modal-title" id="exampleModalLabel"><p class="order-title text-white m-b-0">Make Payment </p> </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="color: #fff !important;">
                <i class="icon fa fa-close"></i>
            </button>
        </div>
        <div class="modal-body no-pd" style="">
            <div class="db-order-details-div">
                <form id="damage_payment_form">
                    <div class="checkout--step2--fill-form pd-l-r-10 collapse show cs-bg-white js--checkout-form" id="checkout--personal--info" aria-labelledby="headingOne" data-parent="#deliver-billing-form">
                        <div class="row pd-t-15 pd-b-15 ">
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">Amount</label>
                                <input class="form-control text-capitalize" type="text" name="amount" readonly required="require" value="{{$amount}}"> 
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">Payment Via</label>
                                <select name="payment_type" data-card-count = '{{$order->client->paymentProfiles->count()}}' class="form-control payment_type">
                                    <option value="cash" selected="">Cash</option>
                                    <option value="card">Card</option>
                                </select>
                                <div class="errorMessage"></div>
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
                            <div id="card_container" style="width: 100%; display: none;">
                                <div class="row pd-t-15">
                                    <div class="col-md-12">
                                        <label class="checkout-label" for="name">Card Number (Testing Card No: 6011000000000012)</label>
                                        <input class="form-control text-capitalize" id="" name="card" required="require">
                                        <input class="form-control" type="hidden" value="shubhu@shubhu.com" name="email">
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label class="checkout-label" for="name">CVV</label>
                                        <input class="form-control text-capitalize" name="code" required="require">
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="checkout-label" for="name">Expiry Month</label>
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
                                    <div class="col-md-4">
                                        <label class="checkout-label" for="name">Expiry Year</label>
                                        <select class="form-control" name="expy" id="expiration_month">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                                <div class="row mt-3 cs-pdb-20">
                                    <div class="col-md-8">
                                        <label class="checkout-label" for="name">Name as Per Card</label>
                                        <input class="form-control text-capitalize  " value="" type="" id="" name="name_per_card" required="require">
                                        <div class="errorMessage"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="checkout-label" for="name">Zip code</label>
                                        <input class="form-control text-capitalize mask--zip" name="zip" required="require">
                                        <div class="errorMessage"></div>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-md-12 pd-t-15">
                                <label class="checkout-label" for="name">Pickup By</label>
                                <input class="form-control text-capitalize" value="{{$order->client->fname}} {{$order->client->lname}}" type="text" name="signature_by">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="signatature_pad" style="padding: 15px; width: 100%;">
                                <label class="checkout-label" for="name">Signature Pad</label>
                                <div style="border:1px solid #ccc;">
                                    <canvas id="signature-pad" class="signature-pad" width=500 height=200 ></canvas>
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer order_modal_footer">
            <div class="clear_cancel_btn">
                <button type="button" class="btn btn-light btn-pill float-left m-r-10" style="border-radius: 5px;" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-light btn-pill float-left" style="border-radius: 5px;" id="clear">Clear</button>
            </div>
            <button type="button" class="btn btn-success btn-pill btn-elevate float-right btnMark" style="border-radius: 5px;" 
                data-damage-amount="{{$amount}}" data-type="{{$statusRequest}}"
                id="damage_payment">
                <span>
                    Pay and Mark as Pickup
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).off('change', '.payment_type').on('change', '.payment_type', function(e){
        e.preventDefault(); 
        let cards_count = $(this).attr('data-card-count');
            if($(this).val() == "card"){
                if(cards_count > 0){
                    $('#pay_using_same_card').show();
                }
                else{
                    $('#card_container').show();
                }
            }
            else{
                $('#pay_using_same_card').hide();
                $('#card_container').hide();
            }
    });

    $(document).off('click','.choose--cards').on('click','.choose--cards',function(e){
        e.preventDefault();
        $('#credit_card_table').show();
        $('#default_card').hide();
    });

    $(document).off('click','.add--new-card').on('click','.add--new-card',function(e){
        e.preventDefault();
        $('#card_container').show();
        $('#pay_using_same_card').remove();
        $('#pay_using_same_card').hide();
    });

    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    var cancelButton = document.getElementById('clear');
    cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
    });
    
    $(document).off('click','#damage_payment').on('click','#damage_payment',function(e){
        e.preventDefault();
        let status = $(this).attr('data-type');
        let amount = $(this).attr('data-damage-amount');
        let data = $('#updateCalendarOrderForm').serializeArray();
        let damageData = $('#damage_payment_form').serializeArray();
        if(!$.isEmptyObject(damageData)){
            for (var pair of damageData.entries()) {
                data.push(pair[1]);
            }
        }
        data.push({name: 'signature', value: signaturePad.toDataURL()});

        cratesAjax({
            url: '/calendar/mark_order',
            data : data,
            method: 'post'
        }, resp => {
            $('#cModal').modal('hide');
            $('#cModal1').modal('hide');
            $('#cModal2').modal('hide');
            toastr.success('Order marked as Picked Up successfully');
            $('#page-section').html(resp);
        }, ({responseJSON : {message}}) => {
            toastr.error(message);
        });
    });
</script>