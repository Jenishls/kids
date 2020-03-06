<style>
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

    /** Only unique to this page */
    .daterangepicker td.end-date{
        background: transparent !important;
        color: #737373 !important;
    }

    .daterangepicker td.end-date:hover{
        color: #737373 !important; 
        background: #eee !important;
    }

    .daterangepicker td.start-date, .daterangepicker td.start-date:hover {
        background-color: #76c043 !important;
        border-color: transparent;
        color: white !important;
    }
    .select2-container{
        width: 100% !important;
    }

</style>

<div class="third_wizard_tabs_content_form crates_container">
    <input type="hidden" value="{{settingsValue('disabled_days')}}" id="siteDisabledDays">
    <input type="hidden" value="{{default_company('minimum_reservations_days') ?: 1}}" id="minimumReservationDays">
    <div class="row" style="margin: 30px 0">
        <div class="col-md-12 col-lg-12 col-sm-12 no-pd-left">
            <div class="order-review-1">
                <div class="ord-sum-heading cs-bg-yellow">
                    <h3 class="cs-title-h3 cs-text-black"><span>1.</span> Personal Information</h3>
                    <i class="fa fa-edit updateCurrentReview" target="personalInfoUpdate"></i>
                    {{-- <button class="btn btn-sucess btn-md updateButton" target="personalInfoUpdate">update</button> --}}
                    <div></div>
                </div>
                <div class="cs-bg-white js-review--holder">
                    <p class="order-review__p">
                        <span class="firstName" rel="first_name"></span> <span class="lastName" rel="last_name"></span><br>
                        <span class="email" rel="email"></span> <br>
                        <span class="phone regex-auto-masker" rel="phone" pattern="/(\d{3})(\d{3})(\d{4})/g" replacer="($1) $2-$3"></span><br>
                        {{-- <span class="city" rel="city"></span> <span class="state" rel="state"></span> <span class="zip" rel="zip"></span><br> --}}
                        {{-- <span class="country" rel="country"></span> --}}

                    </p>
                    <form class="update-review-form cs-pd-lr-5" id="personalInfoUpdate">
                        <div class="row pd-t-15 ">
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">First Name</label>
                                <input class="form-control text-capitalize firstName" type="text" name="temporary_first_name" required="require">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="checkout-label" for="name">Last Name</label>
                                <input class="form-control text-capitalize lastName" type="text" name="temporary_last_name" required="require">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6 pd-t-15">
                                <label class="checkout-label" for="name">Email</label>
                                <input class="form-control email" name="temporary_email" required="require" autocomplete="off">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-md-6 pd-t-15">
                                <label class="checkout-label" for="name">Phone</label>
                                <input class="form-control phone" name="temporary_phone" required="require">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="cs-flex-between" style="padding: 20px;">
                            <div class="global-btn global-btn__yellow updateButton" target="personalInfoUpdate" js--validator="crates/validate/personal-info">
                                <p>Update</p>
                            </div>
                            <div class="global-btn global-btn__default cancelButton" target="personalInfoUpdate">
                                <p>Cancel</p>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <div class="order-review-1">
                <div class="ord-sum-heading cs-bg-yellow">
                    <h3 class="cs-title-h3 cs-text-black"><span>2.</span> Delivery Information</h3>
                    <i class="fa fa-edit updateCurrentReview" target="delInfoUpdate"></i>
                    {{-- <button class="btn btn-sucess btn-md updateButton" target="delInfoUpdate">update</button> --}}
                    <div></div>
                </div>
                <div class="cs-bg-white js-review--holder">
                    <p class="order-review__p cs-bg-white">

                        <span class="delivery_date" rel="delivery_date"></span><br>
                        <span class="delivery_preferred_time" rel="delivery_time"></span> <br>
                        <span class="order-review__addr" title="Address">
                            <span class="delivery_address1" rel="delivery_addr1"></span><br>
                            <span class="delivery_address2" rel="delivery_addr2"></span><br>
                            <span rel="delivery_city"></span>,
                            <span rel="delivery_state"></span><br>
                            <span rel="delivery_zip"></span>
                        </span>
                        <br />
                        <span rel="delivery_note"></span>
                    </p>
                    <form class="update-review-form cs-pd-lr-5" id="delInfoUpdate">
                        <div class="row pd-t-15 ">
                            <div class="col-sm-12 col-md-12 pd-t-15">
                                <label class="checkout-label" for="delivery_address">Street Name</label>
                                <input class="form-control text-capitalize delivery_address1" type="text" id="" name="temporary_delivery_addr1" required="require">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-sm-12 col-md-6 pd-t-15">
                                <label class="checkout-label" for="">Apartment</label>
                                <input class="form-control text-capitalize delivery_address2" type="text" name="temporary_delivery_addr2" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-sm-6 col-md-6 pd-t-15">
                                <label class="checkout-label" for="">city</label>
                                <input class="form-control text-capitalize city" type="text" name="temporary_delivery_city" required="require" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-sm-6 col-md-6 pd-t-15">
                                <label class="checkout-label" for="">State</label>
                                <select name="temporary_delivery_state" class="form-control state init--state-select2">
                        
                                </select>
                                <div class="errorMessage"></div>
                            </div>
                            <div class="col-sm-6 col-md-6 pd-t-15">
                                <label class="checkout-label" for="">zip</label>
                                <input class="form-control text-capitalize zip mask--zip" name="temporary_delivery_zip" required="require" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                  
                            <div class="col-sm-12 col-md-6 pd-t-15">
                                <label class="checkout-label " for="">day</label>
                                <input class="form-control js--date-picker-init mydatepicker" value="" type="text" id="" name="temporary_delivery_date" required="require">
                                <div class="errorMessage"></div>
                            </div>

                            <div class="col-sm-12 col-md-6 pd-t-15">
                                <label class="checkout-label" for="">preferred time of day</label>
                                <br>
                                <select name="temporary_delivery_time" class="form-control preferred_time select2init">
                                   
                                    @foreach($delivery_pref_times as $time)
                                        <option value="{{format_preffered_time($time)}}">{{format_preffered_time($time)}}</option>
                                    @endforeach   
                                       
                                </select>
                                <div class="errorMessage"></div>
                            </div>

                        </div>
                        <div class="row pd-t-20">

                            <div class="col-sm-12 col-md-12">
                                <label class="checkout-label" for="">Notes</label>
                                <textarea class="form-control text-capitalize delivery_note" rows="3" name="temporary_delivery_note" placeholder="Notes for pickup - gate code, buliding name or number, etc."></textarea>
                            </div>
                        </div>
                        <div class="cs-flex-between" style="padding: 20px;">
                            <div class="global-btn global-btn__yellow updateButton" target="delInfoUpdate" js--validator="crates/validate/delivery-info">
                                <p>Update</p>
                            </div>
                            <div class="global-btn global-btn__default cancelButton" target="delInfoUpdate">
                                <p>Cancel</p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="order-review-1">
                <div class="ord-sum-heading cs-bg-yellow">
                    <h3 class="cs-title-h3 cs-text-black"><span>3.</span> Pickup Information</h3>
                    <i class="fa fa-edit updateCurrentReview" target="pickupInfoUpdate"></i>
                    {{-- <button class="btn btn-sucess btn-md updateButton" target="pickupInfoUpdate">update</button> --}}
                    <div></div>
                </div>
                <div class="cs-bg-white js-review--holder">
                    <p class="order-review__p">
                        <span class="pickup_date" rel="pickup_date"></span><br>
                        <span class="pickup_preferred_time" rel="pickup_time"></span> <br>
                        <span class="order-review__addr" title="Address">
                            <span class="pickup_address1" rel="pickup_addr1"></span><br>
                            <span class="pickup_address2" rel="pickup_addr2"></span><br>
                            <span rel="pickup_city"></span>,
                            <span rel="pickup_state"></span><br>
                            <span rel="pickup_zip"></span>
                        </span>
                        <br />
                        <span rel="pickup_note"></span>
                    </p>
                    <form class="update-review-form cs-pd-lr-5" id="pickupInfoUpdate">
                        <div class="">
                            <div class="row pd-t-15 ">
                                <div class="col-sm-12 col-md-12 pd-t-15">
                                    <label class="checkout-label" for="pickup_address">Street Name</label>
                                    <input class="form-control text-capitalize pickup_address1" type="text" id="" name="temporary_pickup_addr1" required="require">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">Apartment</label>
                                    <input class="form-control text-capitalize pickup_address2" type="text" name="temporary_pickup_addr2" placeholder="">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">city</label>
                                    <input class="form-control text-capitalize city" type="text" name="temporary_pickup_city" required="require" placeholder="">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">State</label>
                                    <select name="temporary_pickup_state" class="form-control state init--state-select2">

                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="col-sm-6 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">zip</label>
                                    <input class="form-control text-capitalize zip mask--zip" name="temporary_pickup_zip" required="require" placeholder="">
                                    <div class="errorMessage"></div>
                                </div>
                               

                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">day</label>
                                    <input class="form-control js--date-picker-init mydatepicker--pickup" value="" type="text" id="" name="temporary_pickup_date" required="require">
                                    <div class="errorMessage"></div>
                                </div>

                                <div class="col-sm-12 col-md-6 pd-t-15">
                                    <label class="checkout-label" for="">preferred Time of day</label>
                                    <br>
                                    <select name="temporary_pickup_time" class="form-control preferred_time select2init">
                                        @foreach($pickup_pref_times as $time)
                                            <option value="{{format_preffered_time($time)}}">{{format_preffered_time($time)}}</option>
                                        @endforeach  
                                       
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            <div class="row row pd-t-20">
                                <div class="col-sm-12 col-md-12">
                                    <label class="checkout-label" for="">notes </label>
                                    <textarea class="form-control text-capitalize pickup_note" name="temporary_pickup_note" rows="3" placeholder="Notes for pickup - gate code, buliding name or number, etc."></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="cs-flex-between" style="padding: 20px;">
                            <div class="global-btn global-btn__yellow updateButton" target="pickupInfoUpdate" js--validator="crates/validate/pickup-info">
                                <p>Update</p>
                            </div>
                            <div class="global-btn global-btn__default cancelButton" target="pickupInfoUpdate">
                                <p>Cancel</p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="order-review-1">
                <div class="ord-sum-heading">
                    <h3 class="cs-title-h3"><span>4.</span> credentials</h3>
                    <div></div>
                </div>
                @auth
                    @if(auth()->user()->client && count(auth()->user()->client->paymentProfiles))
                        @php $paymentProfile = auth()->user()->client->paymentProfiles->first(); @endphp
                        <div class="cs-bg-white" rel="existing--card-details">                                    
                            <div class="cardDetail">
                                <div class="checkImg">
                                    <input type="radio" name="customer_profile_default" id="initial{{$paymentProfile->id}}" value="{{$paymentProfile->id}}" checked>
                                    <label for="initial{{$paymentProfile->id}}"><img src="{{asset('cratesOnSkatesImages/cards/discover.svg')}}" alt=""></label>
                                </div>
                                <div class="cardNumber" style="font-weight:600;font-size:15px;color:#1a1a1a;">{{strtoupper($paymentProfile->card)}} 
                                    <span style="font-weight:300; color: #909090; font-size:13px"> ending with {{substr($paymentProfile->card_no, -4)}}</span>
                                </div>
                                <button type="button" class="btn btn-link change-card choose--cards">Change</button> 
                            </div>                             
                            <div class="other-cards dp-none-i" id="js--other-cards">
                                <table class="table">
                                    <thead>
                                        <th class="pd-l-20-i">Card</th>
                                        <th class="dp-none-582">Card Name</th>
                                        <th>Expiry</th>
                                        <th>Choose</th>
                                    </thead>
                                    <tbody>                                       
                                        @foreach(auth()->user()->client->paymentProfiles as $paymentProfile)                               
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
                                                        <button type="button" class="btn btn-link change-card add--new-card" style="padding-left:30px">Add another card</button> 
                                                    @endif
                                                </td>
                                                <td class="dp-none-582">
                                                    <span class="text-lighter text-capitalize">{{$paymentProfile->name_per_card}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-lighter">{{date('m/d/Y',strtotime($paymentProfile->expiry))}}</span>
                                                </td>
                                                <td>
                                                <div class="global-btn global-btn__green cs-add-qty m-l-5 js--pick--card @if($loop->first) choosen @endif" for="profile{{$paymentProfile->id}}">
                                                        <p class="fs-13 pd-15-x-i">Choose</p>
                                                    </div>
                                                </td>
                                            </tr>  
                                        @endforeach
                                    </tbody>
                                </table>                         
                            </div> 
                            <div class="w-100 text-center cs-pd-25">
                                <div class="global-btn global-btn__yellow" id="js--place-order" @if(request()->alaCartRequest === "true") data-is-ala-carte="true" @endif>
                                    <p>Place Order</p>
                                </div>
                            </div>                
                        </div>
                    @endif
                @endauth

                <div class="cs-bg-white @if(auth()->check() && auth()->user()->client && count(auth()->user()->client->paymentProfiles)) dp-none @endif" rel="card--details-form" style="padding: 0px 7px 7px 8px;">
                    <div class="row pd-t-15">
                        <div class="col-md-12">
                            <label class="checkout-label" for="name">Card Number</label>
                            <input class="form-control text-capitalize" id="" name="card" value="6011000000000012" required="require">
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
                            <br>
                            <select class="form-control select2init" name="expm" id="expiration_month">
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
                            <br>
                            <select class="form-control select2init" name="expy" id="expiration_year">
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
                    <div class="w-100 text-center cs-pd-25">
                        <div class="global-btn global-btn__yellow" id="js--place-order" @if(request()->alaCartRequest === "true") data-is-ala-carte="true" @endif>
                            <p>Place Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        phoneMask("[name='temporary_phone']");
        cardMask("[name='card']");
        cvvMask("[name='code']");
        zipMask(".mask--zip")

        $(".init--state-select2").each(function() {
            $(this).select2({
                placeholder: 'Select',
                width: "100%",
                ajax: {
                    url: '/crates/state',
                    processResults: function(data) {
                        let states = [];
                        $.each(data, function(index, value) {
                            states.push({
                                id: value.text,
                                text: value.text
                            });
                        });
                        return {
                            results: states
                        };
                    }
                },
            });
        })

        // $('.js--date-picker-init').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        //     minYear: 2019,
        //     maxYear: parseInt(moment().format('YYYY'),10)
        // });

        function getDisabledDays(){
            let disabledDays = $('#siteDisabledDays').val();
            if (disabledDays) {
                disabledDays = disabledDays.split(",").map(x => x.toLowerCase())
            }
            return disabledDays;
        }

        function minValidDate(initDate = false){
            let initialDate = initDate ? initDate : moment().add($('#minimumReservationDays').val(), 'days');
            let disabledDays = getDisabledDays();
            if(disabledDays.includes(initialDate.format('dddd').toLowerCase())){
                initialDate.add(1, 'days');
                minValidDate(initialDate);
                return initialDate;
            }else{
                return initialDate;
            }
        }

        $('.mydatepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: minValidDate(),
            startDate: minValidDate(),
            maxYear: parseInt(moment().format('YYYY'), 10),
            isInvalidDate(date) {
                let disabledDays = getDisabledDays();
                return disabledDays.includes(moment(date).format('dddd').toLowerCase());
            },
        }).on('apply.daterangepicker', function(e) {
            let deliveryDate = initialDeliveryDate = $(this).val()
 
            let totalDays = moment($('[name="selected_pickup_date"]').val(), 'MM/DD/YYYY').diff(moment(deliveryDate, 'MM/DD/YYYY'), 'days');
            $('[name="selected_delivery_date"]').val(deliveryDate)
            $('.js--update-rent-days').val(`${totalDays} days`);

            setSummaryDelDate($(this).val())
            packageRentUpdate($(this));

        });

        $('.mydatepicker--pickup').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate : minValidDate().add(1, 'days'),
            maxYear: parseInt(moment().format('YYYY'), 10),
            isInvalidDate(date) {
                let disabledDays = $('#siteDisabledDays').val();
                if (disabledDays) {
                    disabledDays = disabledDays.split(",").map(x => x.toLowerCase())
                }
                return disabledDays.includes(moment(date).format('dddd').toLowerCase());

            }            
        }).on('apply.daterangepicker', function(e) {
            let deliveryDate = $('[name="selected_delivery_date"]').val()
            let pickupDate = $(this).val();
            let totalDays = moment(pickupDate, 'MM/DD/YYYY').diff(moment(deliveryDate, 'MM/DD/YYYY'), 'days');
            $('[name="selected_pickup_date"]').val($(this).val())
            $('.js--update-rent-days').val(`${totalDays} days`);
            setSummaryPickupDate($(this).val())
            packageRentUpdate($(this));
        });

        $(() => { 
            let week = 0;
            let rentedDays = 1;
            if('{{$week}}'){
                week = Number('{{$week}}');
            }else{
                rentedDays = Number('{{request()->rentedDays}}');
            }
            let days = week ? week * 7 : rentedDays;

           let deliveryDate = $('[name="delivery_date"]').val()
           $('.mydatepicker--pickup').data('daterangepicker').setStartDate(moment(deliveryDate).add(days, 'days'));
           let pickupDate = $('[name="pickup_date"]').val()
           $('.js--update-rent-days').val(`${days} days`);
           $('[name="selected_delivery_date"]').val(moment(deliveryDate).format('MM/DD/YYYY'))
           $('[name="selected_pickup_date"]').val(moment(pickupDate).format('MM/DD/YYYY'))
           setSummaryDates(moment(deliveryDate).format('MM/DD/YYYY'), moment(pickupDate).format('MM/DD/YYYY'));
        })


        clickEvent('.js--pick--card')(pickCard);

        function pickCard(e){
            e.preventDefault()
            $('.choosen').removeClass('choosen')
            $(`#`+$(this).attr('for')).prop('checked', true);
            $(this).addClass("choosen");
        }

        const VerifyAndPayFactory = (element) => ({
            updateBtn: '',
            getTargetForm() {
                return $(element).attr('target');
            },
            toggleButtons() {
            
                $(element).closest('.order-review-1').find('.updateCurrentReview').toggle();
                return this;
            },
            toggleForm(targetID) {
                $(`#${targetID}`).toggle();
                $(`#${targetID}`).closest('.js-review--holder').find('p.order-review__p').toggle();
                return this;
            },
            toggleFormAndParagraph() {
                let targetID = this.getTargetForm();
                this.toggleForm(targetID).toggleButtons();
                return this;
            },
            updateReview() {
                let form = this.getTargetForm();
                const self = this;
                let data = $(`#` + form).serializeArray();
                $(`#${form}`).find(`input`).css("border-color", "#e8e8e8");
                cratesAjax({
                    url: this.updateBtn.attr('js--validator') + "?temporary=true",
                    method: 'post',
                    data: data
                }, resp => {
                    let container = $('.third_wizard_tabs_content_form');
                    $(data).each((index, {
                        name,
                        value
                    }) => {
                        let actualName = name.replace('temporary_', '')
                        container.find(`[rel=${actualName}]`).text(value).append(`<input type="hidden" name="${actualName}" value="${value.trim()}">`);
                    });
                    self.toggleFormAndParagraph();
                }, ({
                    responseJSON: {
                        errors
                    }
                }) => {
                    for (let key in errors) {
                        $(`#${form}`).find(`[name='${key}']`).css("border-color", "red");
                    }
                })

            }
        })

        clickEvent('.updateCurrentReview')(toggleFormParagraphOnly);
        clickEvent('.updateButton')(updateReview)
        clickEvent('.cancelButton')(cancelUpdating)

        function toggleFormParagraphOnly() {
            const verifyPay = VerifyAndPayFactory(this);
            verifyPay.toggleFormAndParagraph();
        }

        function updateReview() {
            const verifyPay = VerifyAndPayFactory(this);
            verifyPay.updateBtn = $(this)
            verifyPay.updateReview();
        }

        function cancelUpdating() {
            const verifyPay = VerifyAndPayFactory(this);
            verifyPay.toggleFormAndParagraph();
        }


    });
    $(".select2init").select2();
</script>