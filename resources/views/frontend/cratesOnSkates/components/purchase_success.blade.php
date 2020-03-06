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

    .items_summary p {
        font-family: poppins;
    }

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

    .sec-resi__package-features_ord_sm li {
        color: black;
        font-size: 11px;
    }

    
    .top-circle{
        font-size: 100px; 
        color: #76c043;
    }
    .exportOrderDetailTo{
        margin-top: -5px; 
        border:none; 
        background: transparent;
    }
    .style-td{
        background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;
    }
    .address-title{
        font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb;margin-top:0; margin-bottom: 13px;text-align:left;
    }
    .address-text{
        text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;margin-top: 0;
    }
    .style-note{
        text-align:left;
    }
    .order-number{
        font-size:18px;font-family:poppins;font-weight:500;color:black;text-align:left;padding-left:4px;
    }
    .order-title{
        text-transform: capitalize;
        font-size:18px;
        margin-buttom:5px !important;
        color:#000;
        font-weight:600;
    }
    .style-right-text{
        /* text-capitalize fs-15 m-b-5-i text-black text-right; */
        text-transform: capitalize;
        font-size: 15px;
        margin-bottom: 5px !important;
        color: #000;
        text-align: right;
    }
</style>
<div class="py-5">
    
    <div class="crates_container">
        <div class="order_success_container">
            <p>
                <i class="fa fa-check-circle top-circle"></i>
                <button class="button exportOrderDetailTo pull-right" data-export-to="pdf">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="34px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                            <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"></path>
                        </g>
                    </svg></button>
            </p>
            <h4 class="thank-you-text">Thank You!</h4>
            <br>
            <h5 class="text-left salutation">
                <b>Dear {{$order->client->fname. " ".$order->client->lname}} ,<br></b>
                Here's your order information. An Email Has Been Sent To Your Email Address with the following <a class="load_pages" data-url="/cratesonskates/ordersummary?order_id={{$order->id}}">summary details</a>.
            </h5>
            <hr>

            <!-- Dates Start -->
            <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;margin-bottom: 30px;">
                <tr align="center">
                    <th>Order #</th>
                    <th style="padding-left: 15px;">Delivery Date</th>
                    <th>Pickup Date</th>
                </tr>
                <tr>
                    <td>
                        <h5 style="margin-top: 15px;text-align:center;font-size:14px;color:#444;"> {{$order->order_no}} </h5>
                    </td>
                    <td valign="top" style="padding-left: 15px;">
                        <h5 style="margin-top: 15px;text-align:center;font-size:14px;color:#444;">
                            {{date('m/d/Y', strtotime($order->delivery_date))}} ({{$order->delivery_time}})
                        </h5>
                    </td>
                    <td valign="top" style="padding-left: 15px;">
                        <h5 style="font-size:14px; color:#444;margin-top:15px;margin-bottom: 0px;text-align:center;">
                            {{date('m/d/Y', strtotime($order->pickup_date))}} ({{$order->pickup_time}})
                        </h5>
                    </td>
                </tr>
            </table>
            <br>
            @php
            $deliveryAddr = $order->shippingAddr;
            $pickupAddr = $order->pickupAddr;
            @endphp
            <!-- Adresss start -->
            <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 10px;margin-bottom: 30px;">
                <tbody>
                    <tr>
                        <td class="style-td">
                            <h5 class="address-title">Delivery Information</h5>
                            <p class="address-text">
                                {{$deliveryAddr->first_name . $deliveryAddr->last_name }} <br />
                                {{$deliveryAddr->add1}} ,
                                {!! $deliveryAddr->add2 ? "<br>".$deliveryAddr->add2: '' !!}
                                <br> {{$deliveryAddr->city, $deliveryAddr->state ."-". $deliveryAddr->zip}}
                                <br> {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$deliveryAddr->phone)}}
                            </p>
                            <p class="style-note"><b>Note:</b> {{ucfirst($order->delivery_note?? "")}} </p>
                        </td>
                        <td class="style-td">
                            <h5 style="address-title">Pickup Information</h5>
                            <p class="address-text">
                                {{$pickupAddr->first_name . $pickupAddr->last_name }} <br />
                                {{$pickupAddr->add1}} ,
                                {!! $pickupAddr->add2 ? "<br>".$pickupAddr->add2: '' !!}
                                <br> {{$pickupAddr->city, $pickupAddr->state ."-". $pickupAddr->zip}}
                                <br> {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$pickupAddr->phone)}}
                            </p>
                            <p class="style-note"><b>Note:</b> {{ucfirst($order->pickup_note ?? "")}} </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Address End -->

            <!-- Order Summary Starts -->
            <div class="db-order-details-div">
                <p class="order-number">Order {{$order->order_no}} 
                </p>
                <div class="items_summary pd-b-5 text-left br-4">
                    <div>
                        <div class="row pro_det m-t-10  m-b-10">
                            <div class="col-6">
                                <p class="order-title">Item</p>
                            </div>
                            <div class="col-2">
                                <p class="order-title">Quantity</p>
                            </div>
                            <div class="col-2">
                                <p class="order-title text-right">price</p>

                            </div>                           
                            <div class="col-2">
                                <p class="order-title">total</p>
                            </div>
                        </div>
                        <hr>
                        @if($order->package)
                        <div class="row pro_det  m-t-10 m-b-10 align-items-center">
                            <div class="col-6 align-items-center" style="display:flex;">
                                <div class="d-table-cell" style="height: 50px; width:60px">
                                    @if($order->package->thumb)
                                    <img src="{{request()->root()}}/viewimage/package/{{$order->package->thumb->file_name}}" class="main-logo" style="height:100%; width: 100%">
                                    @else
                                    <img src="{{request()->root()}}/images/noimage.png" class="main-logo" style="height:100%; width: 100%""> 
                                    @endif 
                                    </div>
                                    <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10"> {{$order->package->package_name}}
                                    <span style="margin-top:7px">(package)</span></p>
                                </div>
                                <div class="col-2">
                                    <p class="style-right-text">1</p>
                                </div>
                                <div class="col-2">
                                    <p class="style-right-text">{{priceFormat($order->package_amount)}} </p>
                                </div>                                
                                <div class="col-2">
                                    <p class="style-right-text">{{priceFormat($order->package_amount)}} </p>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @php
                                $packageItemsInventories = $order->package ? $order->package->packageItems->pluck('inv_id')->all() : [];
                            @endphp
                            @foreach($order->items as $item)
                            <div class="row pro_det m-t-10 m-b-10 align-items-center">
                                <div class="col-6 d-flex align-items-center">
                                    <div class="d-table-cell" style="height: 50px; width:60px">
                                        @if($item->inventory->product->thumb)
                                        <img src="{{request()->root()}}/viewimage/package/.{{$item->inventory->product->thumb->file_name}}" class="main-logo" style="height:100%; width: 100%">
                                        @else
                                        <img src="{{request()->root()}}/images/noimage.png" class="main-logo" style="height:100%; width: 100%""> 
                                        @endif 
                                    </div>
                                    <p class=" text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10"> {{$item->inventory->product->name}}<br><br>
                                    @if(in_array($item->inventory_id, $packageItemsInventories) && !$item->is_addon)
                                        <span style="color:black;font-size:11px;">(Package item)</span></p>
                                    @elseif($item->inventory->product->is_rental || $item->inventory->product->isRental)
                                        <span style="color:black;font-size:11px">Rental</span>
                                    @else
                                        <span style="color:black; font-size: 11px">Purchase<span>
                                    @endif                                    
                                    </div>
                                    <div class="col-2">                                        
                                        <p class="style-right-text"> {{$item->quantity}} </p>
                                    </div>
                                    <div class="col-2">
                                        @if($item->is_addon || !$order->package)
                                            <p class="style-right-text">{{priceFormat($item->amount)}} </p>
                                        @endif
                                    </div>                                    
                                    <div class="col-2">
                                        @if($item->is_addon || !$order->package)
                                            <p class="style-right-text">{{priceFormat($item->amount * $item->quantity)}} </p>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                <div class="row pro_det  m-t-10 m-b-10 align-items-center">
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="d-table-cell" style="height: 50px; width:60px">
                                            <img src="{{request()->root().'/images/truck.png'}}" class="main-logo" style="height:100%; width: 100%">
                                        </div>
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">
                                            Delivery Charge
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                                        <p class="style-right-text">{{priceFormat($order->delivery_charge + $order->zip_delivery_charge)}} </p>
                                        @else
                                        <p class="style-right-text">Free</p>
                                        @endif

                                    </div>
                                    <div class="col-2">
                                        <p class="style-right-text">-</p>
                                    </div>
                                    <div class="col-2">
                                        @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                                        <p class="style-right-text">
                                            {{priceFormat($order->delivery_charge + $order->zip_delivery_charge)}} 
                                        </p>
                                        @else
                                        <p class="style-right-text">Free</p>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pro_det  m-t-10 m-b-10 align-items-center">
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="d-table-cell" style="height: 50px; width:60px">
                                            <img src="images/truck.svg" class="main-logo" style="height:100%; width: 100%">
                                        </div>
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">Pickup Charge</p>
                                    </div>
                                    <div class="col-2">
                                        @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                                            <p class="style-right-text">{{priceFormat($order->pickup_charge + $order->zip_pickup_charge)}} </p>
                                        @else
                                        <p class="style-right-text">Free</p>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <p class="style-right-text">-</p>
                                    </div>
                                    <div class="col-2">
                                        @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                                        <p class="style-right-text">{{priceFormat($order->pickup_charge)}} </p>
                                        @else
                                        <p class="style-right-text">Free</p>
                                        @endif
                                    </div>
                                </div>
                                <hr class="m-5">                                
                                @foreach($order->extras as $extra)
                                    <div class="row pro_det  m-t-10 m-b-10 align-items-center">
                                        <div class="col-6 d-flex align-items-center">                                        
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">{{ucfirst($extra->title)}}<br><br> <span style="color:black;font-size:11px;">(Extras)</span></p></p>
                                        </div>
                                        <div class="col-2">                                       
                                            <p class="style-right-text">{{number_format($extra->price)}}</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="style-right-text">-</p>
                                        </div>
                                        <div class="col-2">                                        
                                            <p class="style-right-text">{{number_format($extra->price)}}</p>
                                        </div>
                                    </div>
                                    <hr class="m-5">
                                @endforeach
                                <div>
                                    <div class="row pro_det  ">
                                        <div class="col-8">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500"></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">subtotal</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">
                                                {{priceFormat(
                                                    $order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + ($order->discount ? $order->discount->amount : 0),
                                                    '2','.',''
                                                )}}
                                            </p>
                                        </div>
                                    </div>
                                    @if($order->discount)
                                    <div class="row pro_det  ">
                                        <div class="col-8">
                                            <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">Coupon 
                                                {{-- ({{$order->discount->code}}) --}}
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">-{{priceFormat($order->discount->amount,2,'.', '')}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row pro_det  ">
                                        <div class="col-8">
                                            <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">discount</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">-$0.00</p>
                                        </div>
                                    </div>
                                    <div class="row pro_det  ">
                                        <div class="col-8">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>

                                        </div>
                                        <div class="col-2">
                                            @php $taxAmount = $order->tax->applied_amount ?? 0 @endphp
                                            <p class="text-capitalize fs-18 m-b-5-i text-black text-right">tax <small></small></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black text-right">{{priceFormat($taxAmount)}}</p>
                                        </div>
                                    </div>
                                    <hr class="m-5">
                                    <div class="row pro_det  pd-b-10">
                                        <div class="col-8">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>

                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">total</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">
                                                {{priceFormat($order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + $taxAmount)}} 
                                            </p>
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
    </div>
</div>
<script>
    // Export to PDF
    $(document).off('click', '.exportOrderDetailTo').on('click', '.exportOrderDetailTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/export/orderDetail/' + $(this).attr('data-export-to')+'?order={{$order->id}}')
    });
</script>