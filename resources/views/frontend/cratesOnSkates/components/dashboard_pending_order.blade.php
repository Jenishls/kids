
<div id="pending-order-collapse" class="card db-no-pd db-ff">
    <div id="collapse-sA" class="">
        <div class="card-body">
        <h4 class="text-light-green f-w-600">Pending Orders</h4>

        <div class="db-display-flex justify-space-between">
            <div class="db-order-placed">
                <span class="db-display-flex">
                    <p class="db-pd-8-0 fs-15 db-color-black">
                        <strong >{{count($pendingOrders)}}  @if(count($pendingOrders)>1)orders @else order @endif</strong> Placed in
                    </p>
                    <span class="select-date">
                        <select class="form-control db-height-30 db-no-pd fs text-capitalize m-l-10 br-4" id="">
                            <option value="0"@if($month===0)selected @endif>Past One month</option>
                            <option value="1"@if($month===1)selected @endif>Past Two months</option>
                            <option value="3"@if($month===3)selected @endif>Past Four months</option>
                            <option value="5"@if($month===5)selected @endif>Past Six months</option>
                            <option value="11"@if($month===11)selected @endif>Past One year</option>
                            <option value="23"@if($month===23)selected @endif>Past Two year</option>
                        </select>
                    </span>
                </span>
                 
            </div>
        </div>

        <div class="db--p--order">
            @if(count($pendingOrders)>0)
                @foreach ($pendingOrders as $k => $pendingOrder)
                {{-- {{dd($pendingOrder->package)}} --}}
                @if (!is_null($pendingOrder->package))
                    {{-- {{dd($pendingOrder->package)}} --}}
                @endif
                    <div class="db-box-shadow pd-15 m-b-20 br-4 db-bg-white accordion md-accordion" id="orderAccordion{{$pendingOrder->id}}" role="tablist" aria-multiselectable="true" >
                        <div role="tab" id="orderHeading{{$pendingOrder->id}}">
                            <div class="row " data-toggle="collapse" data-parent="#orderAccordion{{$pendingOrder->id}}" href="#collapseOrder{{$pendingOrder->id}}" aria-expanded="true" aria-controls="collapseOrder{{$pendingOrder->id}}">
                                <div class="col-md-6 col-lg-6 col-sm-12 db-no-pd">
                                    <span class="db-color-black f-w-600 text-uppercase">#cs-{{$pendingOrder->order_no}}
                                       
                                    </span><br>
                                    @if (!is_null($pendingOrder->package))
                                        <span class="db-color-black f-style-i text-capitalize f-w-600">
                                            {{$pendingOrder->package->package_name}} <span>Package</span>
                                        </span> <br>
                                    @endif
                                    <span class="db-color-grey f-style-i text-capitalize">
                                        {{$pendingOrder->count_item}} 
                                        @if($pendingOrder->count_item>1) order Items 
                                            @else 
                                            order Item 
                                        @endif

                                        
                                        
                                    </span>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 align-right">
                                    <div class="db-order-product-date">
                                        <span class="db-color-black f-w-600 text-capitalize">Ordered On: 
                                            <span class="f-style-i">
                                                {{$pendingOrder->createdAt}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pd-t-20 pd-b-20" id="collapseOrder{{$pendingOrder->id}}" class="collapse @if($k == 0)show @else collapsed @endif" role="tabpanel" aria-labelledby="orderHeading{{$pendingOrder->id}}" data-parent="#orderAccordion{{$pendingOrder->id}}">
                            @foreach($pendingOrder->items as $key =>  $penOrder)
                                <div class="col-md-8 col-lg-8 col-sm-12 db-no-pd " style="padding-bottom:15px !important;">
                                    
                                    <div class="db-display-flex db-ff-poppins ">
                                        <div class="db-width-135 db-height-150 db-p-img">
                                        <img src="{{asset('cratesOnSkatesImages/products/2/1.jpg')}}" class="db-width-full db-height-full " alt="">
                                        </div>
                                        <div class="text-capitalize pd-l-10">
                                            {{-- {{dd($penOrder->inventory->product)}} --}}
                                            <p class="f-w-600 db-color-orange db-mr-bottom-10">
                                                {{$penOrder->inventory->product->name}}
                                            </p>
                                            <span class="db-display-flex">
                                                <p class="db-color-black db-mr-bottom-10 ">sold by: <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-10">crates on skates</p></p>
                                            </span>
                                            
                                            <span class="db-display-flex">
                                                <p class="db-color-black db-mr-bottom-10 db-display-flex ">qty: 
                                                    <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-5">
                                                         {{ $penOrder->quantity}}    
                                                    </p>
                                                </p>
                                            </span>
                                            <p class="db-pd-2-10 db-p-price-bg db-color-black db-mr-bottom-5 db-width-60 db-pd-5-10 br-4 product-price">
                                                ${{$penOrder->amount * $penOrder->quantity}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                @if($key === 0)
                                <div class="col-md-4 col-lg-4 col-sm-12 align-right">
                                    
                                    <div class="db-pending-details-div">
                                        <div class="global-btn global-btn__orange db-order-detail-btn db--order--details" data-route="dashboard/orderdetail/{{$pendingOrder->id}}">
                                            <p>order details</p>
                                        </div>

                                        <div class="global-btn global-btn__green db-extend-order-btn extend--order dbDatePicker  m-t-15" data-id="{{$pendingOrder->id}}" data-prev-date="{{$pendingOrder->pickup_date}}" >
                                            <p>extend it</p>
                                        </div>
                                        {{-- <div>
                                            <button class="global-btn global-btn__yellow db-buy-again-btn m-t-15  extend--order dbDatePicker" data-id="{{$pendingOrder->id}}" data-prev-date="{{$pendingOrder->delivery_date}}">
                                                <p class="d-ib no-pd-right" style="padding:6px !important;">extend it <span class="caret no-pd-i"></span></p>
                                            </button>
                                        </div> --}}

                                        @if(strtolower($pendingOrder->order_status)=="completed")
                                            <div class="product_review_div mt-10">
                                                <button class="global-btn global-btn__red db-cancel-order-btn m-t-15">
                                                    <p>Write a product review</p>
                                                </button>
                                            </div>
                                        @endif
                                        
                                        @if(!(strtolower($pendingOrder->order_status)=="deleted"))
                                        <div class="global-btn global-btn__red db-cancel-order-btn m-t-15 load--modal" data-route="dashboard/modal/cancelordermodal/{{$pendingOrder->id}}" >
                                                <p>cancel order</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <h4>
                    No order available.
                </h4>
            @endif
        </div>
        </div>
    </div>
</div>

<script>
    extendOrder();
    // $.each($('.dbDatePicker'), function(){
    //     let id = $(this).attr('data-id');
    //     let prev_date = $(this).attr('data-prev-date');
    //     $(this).daterangepicker({
    //         singleDatePicker: true,
    //         showDropdowns: true,
    //         minYear: 2019,
    //         maxYear: 2022
    //     } ,function(start, end, label) {
    //         console.log(id);
    //         // let id = $('.dbDatePicker').attr('data-id');
    //         // console.log(end.format('YYYY-MM-DD'));
    //         // alert(id);
    //         cratesAjax({
    //             url: `cratesskates/dashboard/extendorder/${id}/${end.format('YYYY-MM-DD')}`
    //         }, function(resp){
    //             toastr.success('Delivery date is extended for' + ' ' + `${end.format('YYYY-MM-DD')}` + '.');
    //             showModal({
    //                 url: `cratesdashboardmodal/ordersummarymodal/${id}/${prev_date}`
    //             });
                
    //         }, function(err){
    //             toastr.error('Delivery date cannot be extended for' + ' ' + `${end.format('YYYY-MM-DD')}` + '.');
    //         })
    //     })
        
    // })

    // $(document).on('change', '.dbDatePicker', function(){
    //     console.log('he');
    // });
</script>