<div id="all-order-collapse" class="card db-no-pd db-ff" >
    <div id="db-all-order" >
        <div class="card-body">
        <h4 class="text-light-green f-w-600">All Orders</h4>

        <div class="db-display-flex justify-space-between">
            <div class="db-order-placed">
                <span class="db-display-flex">
                    <p class="db-pd-8-0 fs-15 db-color-black">
                        <strong >{{count($allOrders)}}  @if(count($allOrders)>1)orders @else order @endif</strong> Placed in
                    </p>
                    <span class="">
                        <select class="form-control db-height-30 db-no-pd fs text-capitalize m-l-10 br-4" id="">
                            <option>past one month</option>
                            <option>past one week</option>
                            <option>past one year</option>
                            <option>past two months</option>
                        </select>
                    </span>
                </span>
                 
            </div>
            <div class="db-your-order-search db-width-300 ">
                <input type="text" placeholder="Search orders" class="full-width db-all-order-search">
            </div>
        </div>

        <div>
            @if(count($allOrders)>0)
                @foreach($allOrders as $order)
                <div class="db-box-shadow pd-15 m-b-20 br-4 db-bg-white ">
                    <div class="row ">
                        <div class="col-4 db-no-pd">
                            <div>
                                <span class="db-color-black f-w-600 text-uppercase">#cs-{{$order->order_no}}</span><br>
                                <span class="db-color-grey f-style-i text-capitalize">{{$order->count_item}} @if($order->count_item>1) order Items @else order Item @endif</span>
                            </div>
                        </div>

                        <div class="col-3 align-center text-capitalize pd-l-0">
                            <span class="db-display-flex">
                                <p class="db-color-black db-mr-bottom-10 f-w-600 pd-2 db-ff-poppins">status: 
                                    <p class="f-w-600  db-pd-l-5 db-mr-bottom-10 {{strtolower($order->order_status)}}_status db-pd-3-7 text-white db-ff-poppins m-l-5 br-4">{{$order->order_status}}</p>
                                </p>
                            </span>
                        </div>

                        <div class="col-5 align-right">
                            <div>
                                <span class="db-color-black f-w-600 text-capitalize">Ordered On: 
                                    <span class="f-style-i">
                                        {{$order->createdAt}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @foreach($order->items as $key =>  $allOrderItem)
                        <div class="row m-b-20 br-4 db-bg-white ">
                            <div class="col-md-8 col-sm-12 db-no-pd">
                                <div class="db-display-flex db-ff-poppins">
                                    <div class="db-width-135 db-height-150">
                                        <img src="{{asset('cratesOnSkatesImages/products/2/1.jpg')}}" class="db-width-full db-height-full" alt="">
                                    </div>
                                    <div class="text-capitalize pd-l-10">
                                        <p class="f-w-600 db-color-orange db-mr-bottom-10">{{$allOrderItem->inventory->product->name}}</p>
                                        <span class="db-display-flex">
                                            <p class="db-color-black db-mr-bottom-10 ">sold by: <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-10">crates on skates</p></p>
                                        </span>
                                        
                                        <span class="db-display-flex">
                                            <p class="db-color-black db-mr-bottom-10 db-display-flex">qty: <p class="f-w-600 db-color-orange db-pd-l-5 db-mr-bottom-5">{{$allOrderItem->quantity}}</p></p>
                                        </span>
                                        <p class="db-pd-2-10 db-p-price-bg db-color-black db-mr-bottom-5 db-width-60 db-pd-5-10 br-4">${{$allOrderItem->inventory->product->unit_price_label * $allOrderItem->quantity}} </p>
                                        
                                    </div>
                                </div>
                            </div>
                            @if($key === 0)
                                <div class="col-md-4 col-lg-4  col-sm-12 align-right">
                                    
                                    <div class="db-pending-details-div">
                                        <div class="global-btn global-btn__orange db-order-detail-btn m-t-15 db--order--details" data-route="dashboard/orderdetail/{{$order->id}}">
                                            <p>order details</p>
                                        </div>

                                        @if(strtolower($order->order_status)=="completed")
                                            <div class="product_review_div mt-10">
                                                <button class="global-btn global-btn__green db-cancel-order-btn m-t-15">
                                                    <p>Write a product review</p>
                                                </button>
                                            </div>
                                        @endif

                                        

                                        @if(strtolower($order->order_status)=="pending")

                                            <div class="global-btn global-btn__green db-extend-order-btn extend--order dbDatePicker  m-t-15" data-id="{{$allOrderItem->id}}" data-prev-date="{{$allOrderItem->delivery_date}}">
                                                <p>extend it</p>
                                            </div>

                                            <div class="global-btn global-btn__red db-cancel-order-btn m-t-15 load--modal" data-route="dashboard/modal/cancelordermodal/{{$order->id}}">
                                                <p>cancel order</p>
                                            </div>
                                    @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                    
                @endforeach
                @else
                <h4 class="text-secondary text-center">
                    No Order found.
                </h4>
            @endif
            
        </div>
        </div>
    </div>
</div>

<script>
    extendOrder();
</script>