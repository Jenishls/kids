
<div class="modal-dialog w-1000-i mxw-1000-i modal-transform  order-details-modal" role="document">
    <div class="modal-content">
        <div class="modal-header db-bg-green ">
            <h4 class="modal-title text-center text-white " id="">Order Summary</h4>
            <div>
            <a class="close text-white" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i>
            </a>
            </div>
        </div>
        <div class="modal-body db-bg-modal-grey pd-t-30 pd-b-30 pd-l-20 pd-r-20">
            {{-- info --}}
            <div class="dashboard-order-sum db-pd-10-20 bg-white" id="dashboard--order">
                <div class="db-order-details-div pd-15">
                    <div class="row d-g ">
                    <h4 class="text-uppercase db-color-orange fs-17 f-w-600">order #cs-{{$order->order_no}}</h4>
                    <p class="f-w-500 m-b-0 fs-16 m-b-5 text-black ">
                        {{$client->fname}} @if(isset($client->mname))
                        <span class="f_s">{{$client->mname}}</span>
                        @endif
                        {{$client->lname}} 
                    </p>
                   
                    <p class=" m-b-5 fs-15 text-capitalize text-black">
                        pickup date extended from:
                        <span class="db-color-orange">{{\Carbon\Carbon::parse($date)->format('m/d/Y')}}</span> to 
                        <span class="db-color-orange">{{\Carbon\Carbon::parse($order->pickup_date)->format('m/d/Y')}} </span>
                    </p>

                    <p class="fs-15 m-b-5 text-capitalize text-black">
                        Extension: <span class=" db-color-orange"> 6 days</span>
                    </p>

                    <p class="fs-15 m-b-5 text-capitalize text-black">
                        Extension Charge: <span class=" db-color-orange"> </span>
                    </p>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-7 no-pd-left no-pd-right" style="border-right:1px solid #afbda5;">
                            <div class="db-order-details-div pd-10">
                                <div class="items_summary pd-b-5 db-bg-white  br-4">
                                    
                                    <div>
                                        {{-- table head --}}
                                        <div class="row pro_det m-t-10  m-b-10">
                    
                                            <div class="col-md-6 col-sm-6 no-pd-left">
                                                <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-600 ">item</p>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-600">price</p>
                    
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-600">Quantity</p>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-600">total</p>
                                            </div>
                                        </div>
                                        <hr  class="m-5 no-m-left">
                                        {{-- products --}}
                                        
                                        {{-- {{dd($order->items)}} --}}
                                        <?php
                                            $total = 0;
                                        ?>
                                        @foreach($order->items as $key =>  $orderItem)
                                        <div class="row pro_det  m-t-10 m-b-10 db-pd-10-0">
                    
                                            <div class="col-md-6 col-sm-6 no-pd-left">
                                                <p  class="text-capitalize fs-15 m-b-5-i db-color-orange f-w-500 ">{{$orderItem->inventory->product->name}}</p>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">
                                                    ${{number_format($orderItem->amount, 2)}}
                                                </p>
                    
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">
                                                    @if($orderItem->quantity == 0)
                                                    0
                                                    @else
                                                    {{$orderItem->quantity}}</p>
                                                    @endif
                                            </div>
                                            <!--total-->
                                            <div class="col-md-2 col-sm-2">
                                                <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">
                                                    ${{number_format($orderItem->amount * $orderItem->quantity, 2)}}   
                                                </p>
                                            </div>
                                            <?php
                                                $total+= $orderItem->amount * $orderItem->quantity;
                                            ?>
                                        </div>

                                        <hr class="m-5">
                                         
                                        @endforeach
                    
                                        {{-- subtotal --}}
                                        <div>
                                            <div class="pd-t-10 pd-b-5">
                                                <div class="row pro_det  ">
                        
                                                    <div class="col-md-8 col-sm-8">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500">subtotal</p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">${{number_format($total, 2)}}</p>
                                                    </div>
                                                </div>
                                                {{-- <hr  class="m-5"> --}}
                        
                                                {{-- discount --}}
                                                <div class="row pro_det  ">
                                                    @if($order->discount)
                                                        <?php
                                                            $discount= $order->discount->amount;
                                                        ?>
                                                    @else
                                                        <?php
                                                            $discount= 0;
                                                        ?>
                                                    @endif
                                                    <div class="col-md-8 col-sm-8">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500">discount</p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">${{number_format($discount, 2)}}</p>
                                                    </div>
                                                    
                                                </div>
                                                {{-- <hr  class="m-5"> --}}
                                                {{-- tax --}}
                                                <div class="row pro_det  ">
                                                    @if($order->tax)
                                                        <?php
                                                            $tax= $order->tax->tax_value;
                                                        ?>
                                                    @else
                                                        <?php
                                                            $tax= 0;
                                                        ?>
                                                    @endif
                                                    <div class="col-md-8 col-sm-8">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-16 m-b-5-i text-black f-w-500">tax</p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <p  class="text-capitalize fs-15 m-b-5-i text-black f-w-500">${{number_format($tax, 2)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="m-5">
                                            <?php 
                                                $grand_total = $total+ $tax + $discount;
                                            ?>
                                            {{-- grand total --}}
                                            <div class="row pro_det  pd-t-10 pd-b-10">
                    
                                                <div class="col-md-8 col-sm-8">
                                                    <p  class="text-capitalize fs-17 m-b-5-i text-black f-w-500"></p>
                                                    
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <p  class="text-capitalize fs-17 m-b-5-i text-black f-w-600">total</p>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <p  class="text-capitalize fs-17 m-b-5-i text-black f-w-600">${{number_format($grand_total, 2)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 no-pd content-column" > 
                            <div class="row min-height-200">
                                <div class="row pd-t-18 pd-b-5 db-bg-white br-4">
                                    <div class="col-lg-6 col-md-6 col-sm-6 br-4 no-pd">
                                        <div class="db-pd-2-10 ">
                                            <p class="text-capitalize  mb-0 fs-16 f-w-600 db-color-green">Delivery information</p>
                                        </div>
                                        <div class="db-order-details_box pd-10">
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$billingAddress->add1}}, {{$billingAddress->add2}}</p>
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$billingAddress->city}}, 
                                                {{$billingAddress->state}}</p>
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$billingAddress->zip}}</p>
                                            <p class="text-uppercase text-black fs-15 m-b-8-i">{{$billingAddress->country}}</p>
                                            <p class="text-uppercase text-black fs-15 m-b-8-i">{{$order->delivery_date->format(settingsValue('dateFormat'))}}</p>
                                        </div>
                                    </div>
                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 br-4 no-pd">
                                        <div class="db-pd-2-10 ">
                                            <p class="text-capitalize mb-0 fs-16 f-w-600 db-color-green">pickup information</p>
                                        </div>
                                        <div class="db-order-details_box pd-10">
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$pickupAddress->add1}}, {{$pickupAddress->add2}}</p>
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$pickupAddress->city}}, 
                                                {{$pickupAddress->state}}</p>
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$pickupAddress->zip}}</p>
                                            <p class="text-capitalize text-black fs-15 m-b-8-i">{{$pickupAddress->country}}</p>
                                            <p class="text-uppercase text-black fs-15 m-b-8-i">{{$order->pickup_date->format(settingsValue('dateFormat'))}}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-center">
                                <div class="global-btn global-btn__orange">
                                    <p class="fs-16-i">Confirm and Pay</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <hr class="no-m">
                {{-- items --}}
                
            </div>
                
        </div>
    </div>
</div>