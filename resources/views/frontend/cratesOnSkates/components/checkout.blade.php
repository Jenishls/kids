<style type="text/css">
    ul.cs-round-step-container{
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    } 
    ul.cs-round-step-container li.active>div.cs-round-step{
        background: #313131;
        color: #fff;
    }
    ul.cs-round-step-container li.active>div>span.cs-step-text{
        color: #000;
        font-weight: 700;
    }
    ul.cs-round-step-container li{
        
    }
    .cs-round-step{
        width: 70px;
        height: 70px;
        background: #fff;
        border-radius: 50%;
        line-height: 1.7;
        font-size: 40px;
        font-family: Poppins;
        text-align: center;
        margin: 0 auto;
        color: #000;
        cursor: pointer;
    }
    .cs-step-text{
        color: #fff;
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 600;
    }

    .checkout-err-msg{
        color: #e22f01;
        font-size: 13px;
    }
</style>
<div class="hr"></div>
<div class="faq-section radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Checkout Start ***** -->
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12" style="padding-bottom: 100px;">
                {{--******** main content starts *******--}}
                <div id="stepwizard">
                    <div class="cs-wizard-step-container">
                        <ul class="text-center cs-round-step-container" id="js--wizard-items">
                            @if(request()->alaCartRequest !== "true")
                                <li class="active cs-p-relative" id="stepList1">
                                    <div class="cs-round-step" data-step="1">
                                        <span>1</span>
                                    </div> 
                                    <div class="cs-mtb-20">
                                        <span class="cs-step-text">1. add moving supplies</span>
                                    </div>
                                    <div class="cs-checkout-image">
                                        <img src="{{asset('cratesOnSkatesImages/arrow.png')}}" alt="" class="">
                                    </div>
                                </li>
                            @else
                                <li style="display:none"></li>
                            @endif
                            <li class="cs-p-relative @if(request()->alaCartRequest === "true") active @endif" id="stepList2">
                                <div class="cs-round-step" data-step="2">
                                    <span>@if(request()->alaCartRequest === "true") 1 @else 2 @endif</span>
                                </div> 
                                <div class="cs-mtb-20">
                                    <span class="cs-step-text">@if(request()->alaCartRequest === "true") 1. @else 2. @endif delivery & billing</span>
                                </div>
                                <div class="cs-checkout-image">
                                    <img src="{{asset('cratesOnSkatesImages/arrow.png')}}" alt="" class="second">
                                </div>
                            </li>
                            <li id="stepList3">
                                <div class="cs-round-step" data-step="3">
                                    <span>@if(request()->alaCartRequest === "true") 2 @else 3 @endif</span>
                                </div> 
                                <div class="cs-mtb-20">
                                    <span class="cs-step-text">@if(request()->alaCartRequest === "true") 2. @else 3. @endif Verify & pay</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="border-green">
                    <div class="row" id="step-cos">
                        <div class="col-md-8 col-lg-8 col-sm-12 no-pd-left sideLeft"> 
                            @if(request()->alaCartRequest !== "true")
                                <div id="step1" class="cs-step-button">
                                    @include('frontend.cratesOnSkates.pages.checkout.step1')
                                </div>
                            @endif
                            <div id="step2" class="cs-step-button" @if(request()->alaCartRequest !== "true") style="display: none;" @endif>
                                @include('frontend.cratesOnSkates.pages.checkout.step2')
                            </div>
                            <div id="step3" class="cs-step-button" style="padding:0; background:transparent; display: none;">
                                @include('frontend.cratesOnSkates.pages.checkout.step3')
                            </div>
                        </div>
                        @if(request()->alaCartRequest === "true")
                            @include('frontend.cratesOnSkates.pages.checkout.partials._ala-cart-summary')
                        @else
                            @include('frontend.cratesOnSkates.pages.checkout.partials._summary')
                        @endif
                    </div>
                </div>
                {{--******** main content ends *******--}}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".cs-round-step").on("click",function() {
        let stepNumber = $(this).attr("data-step");
        makeActive(stepNumber);
    });
    $(".btnStep").on("click",function(){
        let stepNumber = $(this).attr("data-step");
        makeActive(stepNumber);
    });
    function makeActive(stepNumber) {
        $("#stepList"+stepNumber).siblings().removeClass("active");
        $("#stepList"+stepNumber).addClass("active");
        $("#step"+stepNumber).show();
        $("#step"+stepNumber).siblings().hide();
        window.scrollTo(0, 0);
    }

    // $(() => { 
    //     let week = 0;
    //     let rentedDays = 1;
    //     if('{{$week}}'){
    //         week = Number('{{$week}}');
    //     }else{
    //         rentedDays = Number('{{request()->rentedDays}}');
    //     }
    //     let days = week ? week * 7 : rentedDays;
    //     let initialDeliveryDate = moment();
    //     let deliveryDate = moment();
    //     $('[name="selected_delivery_date"]').val(deliveryDate.format('MM/DD/YYYY'))
    //     let pickupDate = deliveryDate.add(days, 'days');
    //     $('[name="selected_pickup_date"]').val(pickupDate.format('MM/DD/YYYY'))
    //     $('.js--update-rent-days').val(`${days} days`);
    //     // $('.mydatepicker--pickup').data('daterangepicker').setStartDate(pickupDate)
    //     setSummaryDates(initialDeliveryDate.format('MM/DD/YYYY'), pickupDate.format('MM/DD/YYYY'));

    // })

</script>
