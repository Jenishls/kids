{{-- {{dd($order->discount)}} --}}
<div class="">
    <div class="dashboard-order-sum db-pd-10-20 bg-white" id="dashboard--order">
        {{-- info --}}
        <div class="db-order-details-div pd-15">
            <div class="row d-g ">
            <h4 class="text-uppercase db-color-orange fs-18 f-w-600">order #cs-{{$order->order_no}}</h4>
                
            </div>
            <div class="row pd-t-15 pd-b-5 db-bg-white br-4">
                <div class="col-lg-4 col-md-4 col-sm-6 br-4 no-pd">
                    <div class="db-pd-2-10 ">
                        <p class="text-capitalize text-black mb-0 fs-18 f-w-600">Personal information</p>
                    </div>
                    <div class="db-order-details_box pd-10">
                        <p class="text-capitalize text-black fs-18 m-b-5-i display-flex">{{$client->fname}} @if(isset($client->mname))
                            <span class="f_s">{{$client->mname}}</span>
                            @endif
                            {{$client->lname}} 
                        </p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$client->phone_no}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$address->add1}}, {{$address->add2}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$address->city}}, 
                        {{$address->state}}</p>
                       
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 br-4 ">
                    <div class="db-pd-2-10 ">
                        <p class="text-capitalize text-black mb-0 fs-18 f-w-600">Delivery information</p>
                    </div>
                    <div class="db-order-details_box pd-10">
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$billingAddress->add1}}, {{$billingAddress->add2}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$billingAddress->city}}, 
                            {{$billingAddress->state}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$billingAddress->zip}}</p>
                        <p class="text-uppercase text-black fs-18 m-b-5-i">{{$billingAddress->country}}</p>
                       
                    </div>
                    
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 br-4 ">
                    <div class="db-pd-2-10 ">
                        <p class="text-capitalize text-black mb-0 fs-18 f-w-600">pickup information</p>
                    </div>
                    <div class="db-order-details_box pd-10">
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$pickupAddress->add1}}, {{$pickupAddress->add2}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$pickupAddress->city}}, 
                            {{$pickupAddress->state}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$pickupAddress->zip}}</p>
                        <p class="text-capitalize text-black fs-18 m-b-5-i">{{$pickupAddress->country}}</p>
                       
                    </div>
                    
                </div>
            </div>
        </div>
        <hr class="no-m">
        {{-- items --}}
        <div class="db-order-details-div pd-20">
            <div class="items_summary pd-b-5 db-bg-white  br-4">
                
                <div>
                    {{-- table head --}}
                    <div class="row pro_det m-t-10  m-b-10">

                        <div class="col-md-6 col-sm-6">
                            <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">item</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">price</p>

                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">Quantity</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">total</p>
                        </div>
                    </div>
                    <hr  class="m-5">
                    {{-- products --}}
                    <?php
                        $total = 0;
                    ?>
                    @foreach($order->items as $key =>  $orderItem)
                        <div class="row pro_det  m-t-10 m-b-10">

                            <div class="col-md-6 col-sm-6">
                                <p  class="text-capitalize fs-18 m-b-5-i db-color-orange f-w-500">{{$orderItem->inventory->product->name}}</p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">
                                    ${{number_format($orderItem->amount, 2)}}</p>

                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500"> 
                                    @if($orderItem->quantity == 0)
                                    1
                                    @else
                                    {{$orderItem->quantity}}</p>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">
                                    @if($orderItem->quantity == 0)
                                    ${{number_format($orderItem->amount * 1,2)}}
                                    @else
                                    ${{number_format($orderItem->amount * $orderItem->quantity, 2)}}
                                    @endif
                                </p>
                                    
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
                        <div class="row pro_det  ">

                            <div class="col-md-8 col-sm-8">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>
                                
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">subtotal</p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">${{number_format($total, 2)}}</p>
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
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>
                                
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">discount</p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">
                                    @if($discount === null)
                                        0.00
                                    @else
                                        ${{number_format($discount, 2)}}
                                    @endif
                                </p>
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
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>
                                
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">tax</p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500">
                                    @if($tax === null) 
                                    0.00
                                    @else${{number_format($tax, 2)}}
                                    @endif
                                </p>
                            </div>
                            
                        </div>
                        <hr class="m-5">
                        <?php 
                            $grand_total = $total+ $discount + $tax;
                        ?>
                        {{-- total --}}
                        {{-- tax --}}
                        <div class="row pro_det  pd-b-10">

                            <div class="col-md-8 col-sm-8">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>
                                
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">total</p>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <p  class="text-capitalize fs-18 m-b-5-i text-black f-w-600">${{number_format($grand_total, 2)}}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

