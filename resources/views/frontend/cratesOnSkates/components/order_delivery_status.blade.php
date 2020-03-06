<style>
    .order_success_container {
        text-align: center;
        padding: 20px;
        background: #fff;
        margin: 0 auto;
        max-width: 60%;
        /* border:9px solid white; */
        /* box-shadow: 0px 0px 11px 0px white; */
    }

    .order_success_container h4 {
        color: #313131;
        font-family: poppins;
        font-size: 32px;
    }

    .order_success_container h5 {
        font-family: poppins;
        /* color: #4c7074; */
        color: #444;
        text-align: center;
        font-weight: 400;
    }

    /* .items_summary p {
        font-family: poppins;
    } */

    .items_summary {
        background: #fafafa;
        padding: 15px;
    }

    .order-detail th {
        font-size: 16px;
        padding: 15px;
        text-align: center;
        background: #fafafa;
        color: #303030;
    }

    p {
        font-family: poppins;
    }

    table {
        margin-top: 30px
    }

    table.top-0 {
        margin-top: 0;
    }

    table.order-detail {
        border: 1px solid #ddd;
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 30px;
    }

    table.order-detail tr:nth-child(even) {
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    table.order-detail tr:nth-child(odd) {
        border-bottom: 1px solid #ddd;
    }

    .pad-left-right-space {
        border: unset !important;
    }

    .pad-left-right-space td {
        padding: 5px 15px;
    }

    .pad-left-right-space td p {
        margin: 0;
    }

    .pad-left-right-space td b {
        font-size: 15px;
        font-family: 'Roboto', sans-serif;
    }

    .order_success_container h5 {
        letter-spacing: 0px !important;
    }

    .d-table {
        display: table;
        text-align: left;
    }

    .d-table .tr {
        display: table-row;
    }

    .d-table .tr div {
        display: table-cell;
        padding: 5px;
    }
    .order-table-title{
        margin-top: 15px;
        text-align:center;
        font-size:14px;
        color:#444;
    }

    .address-description{
        background-color: #fafafa;
        border: 1px solid #ddd;
        padding: 15px;
        letter-spacing: 0.3px;
        width: 50%;
    }
    .address-title{
        font-size: 16px; 
        font-weight: 600;
        color: #000; 
        line-height: 16px; 
        padding-bottom: 13px;
        border-bottom: 1px solid #e6e8eb;
        margin-top:0; 
        margin-bottom: 13px;
        text-align:left;
    }
    .address{
        text-align: left;
        font-weight: normal; 
        font-size: 14px; 
        color: #000000;
        line-height: 21px;
        margin-top: 0;
    }
    .order-title{
        font-size:18px;
        font-family:poppins;
        font-weight:500;
        color:black;
        text-align:left;
        padding-left:4px;
    }
    /* .pro_det{
        border-bottom:1px solid grey;
    } */
    .p_title{
        text-transform: capitalize;
        font-size: 18px;
        margin-bottom: 5px !important;
        color: #000000;
        text-align: right;
        font-weight: 600;
    }
    .p_style{
        text-transform: capitalize;
        font-size: 15px;
        margin-bottom: 5px !important;
        color: #000;
        text-align: right;
    }
    .p_item_name{
        text-transform: capitalize;
        font-size: 15px;
        margin-bottom: 5px important;
        color: #000;
        padding-left: 12px !important;
    }
    .salutation{
        text-align: left !important;
    }

    .row_style{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .p_note{
        text-align: left;
    }
    .item_image{
        height: 50px; 
        min-width:60px;
        width:60px;
    }
    
    .submit-update-order button {
        padding: 2px 10px;
        width:fit-content;
        color: #fff;
        font-family: Lato;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .submit-update-order button {
        background: #76c043;
    }

    .submit-update-order button:hover {
        background: #5ba02c;
        box-shadow: 0px 0px 3px 0px black;
    }


    /* .submit-update-order button {
        background: #e66060;
    } */
    @media only screen and (max-width: 425px) {
        .submit-update-order button {
            padding: 7px 10px;
            margin-right: 9px;
            font-size: 12px;
        }
    }

    .submit-update-order button:hover {
        background: #e15959;
        box-shadow: 0px 0px 3px 0px black
    }

    .completed-status{
        color: #3a8e00;
        text-decoration: underline;
    }

    .marked-user-details{
        font-size: 14px;
        color: #444;
        text-align: center;
    }

    @media only screen and (max-width: 991px) {
        .order_success_container {
            max-width: 85%;
        }
    }
    @media only screen and (max-width: 745px) {
        .order_success_container {
            max-width: 100%;
        }
        .py-5{
            padding: 0 !important;
        }
        .hr {
            height: 15px;
        }
    }
    @media only screen and (max-width: 690px) {
        .items_summary p {
            font-size: 14px;
        }
        .order-detail th {
            font-size: 14px;
        }
    }
    @media only screen and (max-width: 650px) {
        .order_success_container h5 {
            font-size: 14px;
        }
        .order_success_container h4 {
            font-size: 20px;
        }
    }
    @media only screen and (max-width: 570px) {
        .order_success_container h5 {
            font-size: 11px;
        }
        .order-detail th {
            padding: 8px;
            font-size: 12px;
        }
        .address-title {
            font-size: 13px;
        }
        .order-title {
            font-size: 13px;
            font-weight: 600;
        }
        .address {
            font-size: 12px;
        }
        .items_summary p {
            font-size: 12px;
        }
        /* .order_success_container {
            padding: 10px;
        } */
        .salutation{
            line-height: 1.5;
        }

        .completed-status{
            font-size: 13px;
            margin-bottom: 10px;
        }

    /* } */
    /* @media only screen and (max-width: 570px) { */
        .order_success_container {
            max-width: 98%;
            padding: 6px;
        }
        .order_success_container h4 {
            font-size: 15px;
            font-weight: 600;
        }
        hr {
            height: 5px;
            margin:0 !important;
        }
        table{
            margin-top: 10px;
        }
        table.order-detail{
            margin-bottom: 8px !important;
        }
    }
    @media only screen and (max-width: 500px) {
        /* .item_image{
            display: none !important;
        } */
        .order_item_header p{
            font-size: 12px;
        }
        .col-6,
        .col-2 {
            padding: 0;
        }
        .cell-qty{
            margin-right: 5px;
        }

        .address-description {
            padding: 8px;
        }

        .address-title {
            font-size: 11px;
            margin-bottom: 0;
        }
        .items_summary {
            background: #fafafa;
            padding: 1px 9px;
        }

        .order-table-title {
            font-size: 10px !important;
        }
        table.order-table-title {
            margin-top: 8px;
        }
        .p_note{
            font-size: 11px;
            text-align: left;
            margin: 0;
        }
        .item_image {
            height: 40px;
            min-width: 50px;
            width: 50px;
        }
        .p_item_name{
            margin: 0;
            line-height: 1.4;
        }
}
</style>

<div class="py-5">
    <div class="crates_container">
        <div class="order_success_container">
            <img src="{{asset('cratesOnSkatesImages/crates-logo1.png')}}" class="main-logo">           
            <form id="updateCalendarOrderForm">
                <input type="hidden" value="{{$statusRequest}}" name="status_request">    
                <input type="hidden" value="{{$order->id}}" name="order">
                <input type="hidden" value="{{$user->id}}" name="user">
                <input type="hidden" value="{{$user->api_token}}" name="api_token">
            </form> 

            <!-- Dates Start -->
            <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left">
                <tr align="center">
                    <th>Order #</th>
                    <th style="padding-left: 15px;">Delivery Date</th>
                    <th>Pickup Date</th>
                </tr>
                <tr>
                    <td class="align-baseline">
                        <h5 class="order-table-title">  {{$order->order_no}}  </h5>
                    </td>
                    <td class="align-baseline">
                        <h5 class="order-table-title">
                            {{date('m/d/Y', strtotime($order->delivery_date))}} ({{$order->delivery_time}}) 
                        </h5>
                        @if($statusRequest==="delivered" && $order->order_status !== "delivered" && $order->order_status === "confirmed")
                            <div class="submit-update-order text-center m-b-10" data-type="{{$statusRequest}}">
                                <button>Mark as Deliver</button>
                            </div>
                        @endif
                            
                        @if($detail = $order->deliveryDetails())                            
                            <div class="text-center completed-status" style="font-size:15px">Delivered by</div>
                            <div class="marked-user-details">
                                {{$detail['by']->fullName()}}  {{$detail['timestamp']}}
                            </div>                            
                        @endif
                    </td>
                    <td class="align-baseline">
                        <h5 class="order-table-title">
                            {{date('m/d/Y', strtotime($order->pickup_date))}} ({{$order->pickup_time}}) 
                        </h5>
                        @if($statusRequest==="pickedup" &&  $order->order_status != "picked_up" && $order->order_status === "delivered")
                            <div class="submit-update-order text-center m-b-10" data-type="{{$statusRequest}}">
                                <button>Mark as Pickup</button>
                            </div>
                        @endif
                        {{-- @if($order->order_status == "picked_up")
                            <div class="text-center completed-status">Pickedup</div>
                        @endif --}}
                        @if($detail = $order->pickupDetails())                            
                            <div class="text-center completed-status" style="font-size:15px">Pickup by</div>              
                            <div class="marked-user-details">
                                {{$detail['by']->fullName()}}  {{$detail['timestamp']}}
                            </div>              
                        @endif
                    </td>
                </tr>
            </table>

            @if($order->deliverySignature)
                {{-- <img src="{{$order->deliverySignature->file_name}}" alt=""> --}}
            @endif

            @php
                $deliveryAddr = $order->shippingAddr;
                $pickupAddr = $order->pickupAddr;
            @endphp 
            <!-- Adresss start -->
            <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 10px;margin-bottom: 30px;">
                <tbody>
                    <tr>
                        <td class="address-description">
                            <h6 class="address-title">Delivery Information</h6>
                            <p class="address">
                                {{$deliveryAddr->first_name . $deliveryAddr->last_name }} <br />
                                {{$deliveryAddr->add1}}  ,
                                {!! $deliveryAddr->add2 ? "<br>".$deliveryAddr->add2: '' !!} 
                                <br>  {{$deliveryAddr->city, $deliveryAddr->state ."-". $deliveryAddr->zip}} 
                                <br> {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$deliveryAddr->phone)}} 
                            </p>
                            <p class="p_note"><b>Note:</b>  {{ucfirst($order->delivery_note?? "")}}  </p>
                        </td>
                        <td class="address-description">
                            <h6 class="address-title">Pickup Information</h6>
                            <p class="address">
                                {{$pickupAddr->first_name . $pickupAddr->last_name }}  <br />
                                {{$pickupAddr->add1}}  ,
                                {!! $pickupAddr->add2 ? "<br>".$pickupAddr->add2: '' !!} 
                                <br>  {{$pickupAddr->city, $pickupAddr->state ."-". $pickupAddr->zip}} 
                                <br>  {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$pickupAddr->phone)}} 
                            </p>
                            <p class="p_note"><b>Note:</b>  {{ucfirst($order->pickup_note ?? "")}}  </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Address End -->

            <!-- Order Summary Starts -->
            <div class="db-order-details-div">
                <p class="order-title">Order  {{$order->order_no}} </p>
                <div class="items_summary pd-b-5 text-left br-4">
                    <div>
                        <div class="row pro_det m-t-10  m-b-10 order_item_header1">
                            <div class="col-6">
                                <p class="p_title text-left">Item</p>
                            </div>
                            <div class="col-2">
                                <p class="p_title">Price</p>

                            </div>
                            <div class="col-2">
                                <p class="p_title">Qty.</p>
                            </div>
                            <div class="col-2">
                                <p class="p_title">Total</p>
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="row row_style">
                            <div class="col-6 align-items-center" style="display:flex;">
                                <div class="d-table-cell item_image" >
                                    @if($order->package->thumb) 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('package/images/'.$order->package->thumb->file_name)))}}" class="main-logo" style="height:100%; width: 100%"> 
                                    @else 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('images/noimage.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                    @endif 
                                </div>
                                <p class="p_item_name">  {{$order->package->package_name}} (package)</p>
                            </div>
                            <div class="col-2">
                                <p class="p_style">$  {{number_format($order->package_amount, 2, '.', '')}}  </p>

                            </div>
                            <div class="col-2">
                                <p class="p_style cell-qty">1</p>
                            </div>
                            <div class="col-2">
                                <p class="p_style">$  {{number_format($order->package_amount, 2, '.', '')}}  </p>
                            </div>
                        </div>
                        <hr> --}}
                        @foreach($order->items as $item) 
                        <div class="row pro_det m-t-10 m-b-10 align-items-center">
                            <div class="col-6 d-flex align-items-center ">
                                <div class="d-table-cell item_image" >
                                    @if($item->inventory->product->thumb) 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('product/images/'.$item->inventory->product->thumb->file_name)))}}" class="main-logo" style="height:100%; width: 100%"> 
                                    @else 
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/images/noimage.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                    @endif 
                                </div>
                                <p class="p_item_name">  {{$item->inventory->product->name}}  </p>
                            </div>
                            <div class="col-2">
                                <p class="p_style">$  {{number_format($item->amount, 2, '.', '')}}  </p>

                            </div>
                            <div class="col-2">
                                <p class="p_style cell-qty">  {{$item->quantity}}  </p>
                            </div>
                            <div class="col-2">
                                <p class="p_style">$  {{number_format($item->amount * $item->quantity, 2, '.', '')}}  </p>
                            </div>
                        </div>
                        <hr>
                        @endforeach 
                        <div class="row row_style align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <div class="d-table-cell item_image" >
                                    {{-- <img src="images/truck.svg" class="main-logo" style="height:100%; width: 100%"> --}}
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/images/truck.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                </div>
                                <p class="p_item_name">Delivery Charge</p>
                            </div>
                            <div class="col-2">
                                @if((int)$order->delivery_charge !== 0)
                                    <p class="p_style">$  {{number_format($order->delivery_charge, 2, '.', '')}}  </p>
                                @else
                                    <p class="p_style fs-basic">Free</p>
                                @endif

                            </div>
                            <div class="col-2">
                                <p class="p_style cell-qty">-</p>
                            </div>
                            <div class="col-2">
                                @if((int)$order->delivery_charge !== 0)
                                    <p class="p_style">$  {{number_format($order->delivery_charge, 2, '.', '')}}  </p>
                                @else
                                    <p class="p_style fs-basic">Free</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row row_style align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <div class="d-table-cell item_image" >
                                    {{-- <img src="images/truck.svg" class="main-logo" style="height:100%; width: 100%"> --}}
                                    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/images/truck.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                </div>
                                <p class="p_item_name">Pickup Charge</p>
                            </div>
                            <div class="col-2">
                                @if((int)$order->pickup_charge !== 0)
                                    <p class="p_style">$  {{number_format($order->pickup_charge, 2, '.', '')}}  </p>
                                @else
                                    <p class="p_style fs-basic">Free</p>
                                @endif

                            </div>
                            <div class="col-2">
                                <p class="p_style cell-qty">-</p>
                            </div>
                            <div class="col-2">
                                @if((int)$order->pickup_charge !== 0)
                                    <p class="p_style">$  {{number_format($order->pickup_charge, 2, '.', '')}}  </p>
                                @else
                                    <p class="p_style fs-basic">Free</p>
                                @endif
                            </div>
                        </div>
                        <hr class="m-5">
                        <div>
                            <div class="row pro_det  ">
                                <div class="col-6">
                                    <p class="text-capitalize fs-18 mt-2 text-black f-w-500"></p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">subtotal</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">${{number_format($order->amount + ($order->discount ? $order->discount->amount : 0),'2','.','')}}</p>
                                </div>
                            </div>
                            @if($order->discount)
                                <div class="row pro_det  ">
                                    <div class="col-6">
                                        <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                    </div>
                                    <div class="col-3">
                                        <p class="text-capitalize fs-18  text-black text-right">Coupon ({{$order->discount->code}})</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="text-capitalize fs-18  text-black text-right">-${{number_format($order->discount->amount,2,'.', '')}}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="row pro_det  ">
                                <div class="col-6">
                                    <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18  text-black text-right">discount</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18  text-black text-right">-$0.00</p>
                                </div>
                            </div>
                            <div class="row pro_det  ">
                                <div class="col-6">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>

                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black text-right">tax</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black text-right">$0.00</p>
                                </div>
                            </div>
                            <hr class="m-5">
                            <div class="row pro_det  pd-b-10">
                                <div class="col-6">
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">total</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">${{number_format($order->amount, 2, '.', '')}}  </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Summary Ends -->
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="text-capitalize  m-b-5-i text-black text-right">
                        <p class="f-w-500 fs-16">Payment By :<span class="fs-16" style="font-weight:300;"> {{$order->payment->payment_type}} {{str_pad($order->payment->cr_last4, 16, '*', STR_PAD_LEFT)}}</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
<script>
        $('.submit-update-order').off('click').on('click', function(e) {
            e.preventDefault();
            let status = $(this).attr('data-type');
            console.log(status);
                showModal({
                    url: "/calendar/order/confirmation/{{$order->id}}/"+status
                });
                //     url: '/calendar/mark_order',
                //     data : $('#updateCalendarOrderForm').serializeArray(),
                //     method: 'post'
                // }, resp => {
                //     toastr.success('Order marked as {{$statusRequest}} successfully');
                //     $('#page-section').html(resp);
                // }, ({responseJSON : {message}}) => {
                //     toastr.error(message);
                // });
            
        });
    </script>