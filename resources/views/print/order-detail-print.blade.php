<html>
    <head>
        <title>Crates on Skates</title>
        <style>
            /*! CSS Used from: Embedded */
            .order_success_container{text-align:center;padding:20px;background:#fff;margin:0 auto;max-width:60%;}
            .order_success_container h5{font-family:poppins;color:#444;text-align:center;font-weight:400;}
            .items_summary p{font-family:poppins;}
            .items_summary{background:#fafafa;padding:15px;}
            .order-detail th{font-size:16px;padding:15px;text-align:center;background:#fafafa;color:#303030;}
            p{font-family:poppins;}
            table.order-detail{border:1px solid #ddd;border-collapse:collapse;}
            table.order-detail tr:nth-child(even){border-top:1px solid #ddd;border-bottom:1px solid #ddd;}
            table.order-detail tr:nth-child(odd){border-bottom:1px solid #ddd;}
            .order_success_container h5{letter-spacing:0px!important;}
            *,*::before,*::after{box-sizing:border-box;}
            hr{box-sizing:content-box;height:0;overflow:visible;}
            h5{margin-top:0;margin-bottom:0.5rem;}
            p{margin-top:0;margin-bottom:1rem;}
            b{font-weight:bolder;}
            small{font-size:80%;}
            img{vertical-align:middle;border-style:none;}
            table{border-collapse:collapse;}
            th{text-align:inherit;}
            h5{margin-bottom:0.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit;}
            h5{font-size:1.25rem;}
            hr{margin-top:1rem;margin-bottom:1rem;border:0;border-top:1px solid rgba(0, 0, 0, 0.1);}
            small{font-size:80%;font-weight:400;}
            .row{display:inline;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;}
            .col-2,.col-6,.col-8,.col-12{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;}
            .col-2{width:20%;max-width:20%;}
            .col-6{width: 40%;max-width:40%;}
            .col-8{width: 60%;max-width:60%;}
            .col-12{width: 100%;max-width:100%;}
            .d-table-cell{display:table-cell!important;}
            .d-flex{display:inline!important;}
            .align-items-center{align-items:center!important;}
            .mt-2{margin-top:0.5rem!important;}
            .m-5{margin:3rem!important;}
            .text-left{text-align:left!important;}
            .text-right{text-align:right!important;}
            .text-capitalize{text-transform:capitalize!important;}
            tr{
                border-bottom: 1px solid #ccc;
                margin-top: 3px;
                margin-bottom: 3px;
            }
            @media print{
            *,*::before,*::after{text-shadow:none!important;box-shadow:none!important;}
            tr,img{page-break-inside:avoid;}
            p{orphans:3;widows:3;}
            }
            @media (min-width: 1430px){
            .crates_container{max-width:1165px;}
            }
            .crates_container{margin-left:auto;margin-right:auto;}
            h5{font-size:16px;font-weight:400;color:#222;line-height:24px;letter-spacing:0.05em;}
            p{font-size:14px;color:#777;line-height:1;}
            *{font-family:'Poppins', sans-serif;}
            .fs-15{font-size:15px;}
            .row{margin-right:0;margin-left:0;}
            *{font-family:"Poppins"!important;}
            .f-w-500{font-weight:500!important;}
            .f-w-600{font-weight:600!important;}
            .pd-b-5{padding-bottom:5px;}
            .pd-b-10{padding-bottom:10px;}
            .m-5{margin:5px!important;}
            .m-t-10{margin-top:10px;}
            .m-l-10{margin-left:10px;}
            .m-b-5-i{margin-bottom:5px!important;}
            .m-b-10{margin-bottom:10px;}
            .br-4{border-radius:4px!important;}
            .text-black{color:#272727!important;}
            .text-black:hover{color:#5867dd!important;}
            .text-capitalize{text-transform:capitalize!important;}
            .text-black{color:#252525!important;}
            .text-black:hover{color:#252525!important;}
            p{font-family:"proxima-nova";}
            .fs-18{font-size:18px;}
            .fs-15{font-size:15px;}
            .fs-16{font-size:16px;}
            .fs-18{font-size:18px;}
            table.headerArea{width:100%;margin-bottom:20px;}
            table.headerArea tr td{width:40%;font-family:'Poppins', sans-serif;}
            .order_success_container{text-align:center;padding:20px;background:#fff;margin:0 auto;max-width:60%;}
            .order_success_container h5{font-family:poppins;color:#444;text-align:center;font-weight:400;}
            .items_summary p{font-family:poppins;}
            .items_summary{background:#fafafa;padding:15px;}
            .order-detail th{font-size:16px;padding:15px;text-align:center;background:#fafafa;color:#303030;}
            p{font-family:poppins;}
            table.order-detail{border:1px solid #ddd;border-collapse:collapse;}
            table.order-detail tr:nth-child(even){border-top:1px solid #ddd;border-bottom:1px solid #ddd;}
            table.order-detail tr:nth-child(odd){border-bottom:1px solid #ddd;}
            .order_success_container h5{letter-spacing:0px!important;}
            .items_summary td{
                padding:15px;
            }
            
            .no_padding_td_table td{
                padding:0px;
            }
            .no_padding_td_table tr{
                border:none;
            }
            table .no_padding_td_table tr:nth-child(odd) {
                border-bottom: none;
            }
            table .no_padding_td_table{
                margin-top: none;
            }
            /*! CSS Used fontfaces */
            @font-face{font-family:"proxima-nova";src:url(http://localhost:8000/fonts/proxima-nova-reg.ttf) format("truetype");}
        </style>  
    </head>
    <body>
        <div class="py-5">
            <div class="crates_container">
                <div class="order_success_container">
                    <table class="headerArea">
                        <tr style="width: 100%;">
                            <td style="width: 20%">
                                <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('cratesOnSkatesImages\\crates-logo.png'))) }}" style="max-width: 100%;">
                            </td>
                            <td style="width:60%; font-family: 'Poppins', sans-serif;font-size: 12px; text-align: center;">
                                <strong style="font-size: 13px;">Crates on Skates</strong><br>
                                <strong style="margin-top: 10px">{{strtoupper('Order Summary')}}</strong>
                            </td>
                            <td style="width: 20%; font-family: 'Poppins', sans-serif;font-size: 11px; text-align: right;">
                                <?php echo 'Date: ' . date('m/d/Y H:i:s'); ?><br>
                                <span style="margin-bottom: 30px;margin-top:0px;font-size:14px;">
                                    {{ default_company('address') }}
                                </span>
                            </td>
                        </tr>
                    </table>
                    @php
                    $order = $datas;   
                    @endphp

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
                    @php
                    $deliveryAddr = $order->shippingAddr;
                    $pickupAddr = $order->pickupAddr;
                    @endphp
                    <!-- Adresss start -->
                    <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 10px;margin-bottom: 30px;">
                        <tbody>
                            <tr>
                                <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                                    <h5 style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb;margin-top:0; margin-bottom: 13px;text-align:left;">Delivery Information</h5>
                                    <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;margin-top: 0;">
                                        {{$deliveryAddr->first_name . $deliveryAddr->last_name }} <br />
                                        {{$deliveryAddr->add1}} ,
                                        {!! $deliveryAddr->add2 ? "<br>".$deliveryAddr->add2: '' !!}
                                        <br> {{$deliveryAddr->city, $deliveryAddr->state ."-". $deliveryAddr->zip}}
                                        <br> {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$deliveryAddr->phone)}}
                                    </p>
                                    <p style="text-align:left;"><b>Note:</b> {{ucfirst($order->delivery_note?? "")}} </p>
                                </td>
                                <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                                    <h5 style="font-size: 16px;font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb;margin-top:0; margin-bottom: 13px;text-align:left;">Pickup Information</h5>
                                    <p style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;margin-top: 0;">
                                        {{$pickupAddr->first_name . $pickupAddr->last_name }} <br />
                                        {{$pickupAddr->add1}} ,
                                        {!! $pickupAddr->add2 ? "<br>".$pickupAddr->add2: '' !!}
                                        <br> {{$pickupAddr->city, $pickupAddr->state ."-". $pickupAddr->zip}}
                                        <br> {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$pickupAddr->phone)}}
                                    </p>
                                    <p style="text-align:left;"><b>Note:</b> {{ucfirst($order->pickup_note ?? "")}} </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Address End -->

                    <!-- Order Summary Starts -->
                    <div class="db-order-details-div">
                        <p class="" style="font-size:18px;font-family:poppins;font-weight:500;color:black;text-align:left;padding-left:4px;">Order {{$order->order_no}} </p>
                        <table border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;" class="items_summary pd-b-5 text-left br-4 order-detail">
                            <tbody>
                                <tr class="pro_det m-t-10  m-b-10">
                                    <th class="col-6">
                                        <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-left">Item</p>
                                    </th>
                                    <th class="col-2">
                                        <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600">Quantity</p>
                                    </th>
                                    <th class="col-2">
                                        <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">price</p>

                                    </th>                           
                                    <th class="col-2" style="min-width: 125px;">
                                        <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">total</p>
                                    </th>
                                </tr>
                                @if($order->package)
                                    <tr class="pro_det  m-t-10 m-b-10 align-items-center">
                                        <td class="col-6 align-items-center">
                                            <table class="no_padding_td_table">
                                            <tr>
                                                <td>
                                                    <div class="d-table-cell" style="height: 50px; width:60px">
                                                        @if($order->package->thumb)
                                                        <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('package/images/'.$order->package->thumb->file_name)))}}" class="main-logo" style="height:100%; width: 100%">
                                                        @else
                                                        <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('images/noimage.png')))}}" class="main-logo" style="height:100%; width: 100%"> 
                                                            @endif 
                                                    </div>
                                                </td>
                                                <td>

                                                    <p class=" text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10"> {{$order->package->package_name}}
                                                    <span style="margin-top:7px">(package)</span></p>
                                                </td>
                                            </tr>
                                            </table>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">1</p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($order->package_amount, 2, '.', '')}} </p>
                                        </td>                                
                                        <td class="col-2">
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($order->package_amount, 2, '.', '')}} </p>
                                        </td>
                                    </tr>
                                @endif
                                @php
                                    $packageItemsInventories = $order->package ? $order->package->packageItems->pluck('inv_id')->all() : [];
                                @endphp
                                @foreach($order->items as $item)
                                    <tr class=" pro_det m-t-10 m-b-10 align-items-center">
                                        <td class="col-6 align-items-center">
                                            <table class="no_padding_td_table">
                                                @if($item->inventory)
                                                <tr>
                                                    <td>
                                                        <div class="d-table-cell" style="height: 50px; width:60px">
                                                            @if($item->inventory->product->thumb)
                                                            <img src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('product/images/'.$item->inventory->product->thumb->file_name)))}}" class="main-logo" style="height:100%; width: 100%">
                                                            @else
                                                            <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/images/noimage.png')))}}" class="main-logo" style="height:100%; width: 100%""> 
                                                            @endif 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class=" text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10"> {{$item->inventory->product->name}}<br><br>
                                                            @if(in_array($item->inventory_id, $packageItemsInventories) && !$item->is_addon)
                                                                <span style="color:black;font-size:11px;">(Package item)</span></p>
                                                            @elseif($item->inventory->product->is_rental || $item->inventory->product->isRental)
                                                                <span style="color:black;font-size:11px">Rental</span>
                                                            @else
                                                                <span style="color:black; font-size: 11px">Purchase<span>
                                                            @endif   
                                                    </td>
                                                </tr>
                                                @endif
                                            </table>
                                        </td>
                                        <td class="col-2">                                        
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right"> {{$item->quantity}} </p>
                                        </td>
                                        <td class="col-2">
                                            @if($item->is_addon || !$order->package)
                                                <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($item->amount, 2, '.', '')}} </p>
                                            @endif
                                        </td>                                    
                                        <td class="col-2">
                                            @if($item->is_addon || !$order->package)
                                                <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($item->amount * $item->quantity, 2, '.', '')}} </p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class=" pro_det  m-t-10 m-b-10 align-items-center">
                                    <td class="col-6 align-items-center">
                                        <table class="no_padding_td_table">
                                        <tr>
                                            <td>
                                                <div class="d-table-cell" style="height: 50px; width:60px">
                                                    <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('/images/truck.png'))) }}" class="main-logo" style="height:100%; width: 100%">
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">
                                                    Delivery Charge
                                                </p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    <td class="col-2">
                                        @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($order->delivery_charge + $order->zip_delivery_charge, 2, '.', '')}} </p>
                                        @else
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">Free</p>
                                        @endif

                                    </td>
                                    <td class="col-2">
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">-</p>
                                    </td>
                                    <td class="col-2">
                                        @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">
                                            $ {{number_format($order->delivery_charge + $order->zip_delivery_charge, 2, '.', '')}} 
                                        </p>
                                        @else
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">Free</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr class=" pro_det  m-t-10 m-b-10 align-items-center">
                                    <td class="col-6 align-items-center">
                                        <table class="no_padding_td_table">
                                            <tr>
                                                <td>
                                                    <div class="d-table-cell" style="height: 50px; width:60px">
                                                        <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('images\\truck.png'))) }}" class="main-logo" style="height:100%; width: 100%">
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">Pickup Charge</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="col-2">
                                        @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($order->pickup_charge + $order->zip_pickup_charge, 2, '.', '')}} </p>
                                        @else
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">Free</p>
                                        @endif
                                    </td>
                                    <td class="col-2">
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">-</p>
                                    </td>
                                    <td class="col-2">
                                        @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">$ {{number_format($order->pickup_charge, 2, '.', '')}} </p>
                                        @else
                                        <p class="text-capitalize fs-15 m-b-5-i text-black text-right">Free</p>
                                        @endif
                                    </td>
                                </tr>
                                @foreach($order->extras as $extra)
                                    <tr class=" pro_det  m-t-10 m-b-10 align-items-center">
                                        <td class="col-6 align-items-center">                                        
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-capitalize m-l-10">{{ucfirst($extra->title)}}<br><br> <span style="color:black;font-size:11px;">(Extras)</span></p></p>
                                        </td>
                                        <td class="col-2">                                       
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">{{number_format($extra->price, 2, '.', '')}}</p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">-</p>
                                        </td>
                                        <td class="col-2">                                        
                                            <p class="text-capitalize fs-15 m-b-5-i text-black text-right">{{number_format($extra->price, 2, '.', '')}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr class=" pro_det  ">
                                        <td class="col-6">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">subtotal</p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right">
                                                ${{number_format(
                                                    $order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + ($order->discount ? $order->discount->amount : 0),
                                                    '2','.',''
                                                )}}
                                            </p>
                                        </td>
                                    </tr>
                                    @if($order->discount)
                                    <tr class=" pro_det  ">
                                        <td class="col-6">
                                            <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                        </td><td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">Coupon 
                                                {{-- ({{$order->discount->code}}) --}}
                                            </p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">-${{number_format($order->discount->amount,2,'.', '')}}</p>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr class=" pro_det  ">
                                        <td class="col-6">
                                            <p class="text-capitalize fs-18  text-black f-w-500"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">discount</p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18  text-black text-right">-$0.00</p>
                                        </td>
                                    </tr>
                                    <tr class=" pro_det  ">
                                        <td class="col-6">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>

                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right"></p>
                                        </td>
                                        <td class="col-2">
                                            @php $taxAmount = $order->tax->applied_amount ?? 0 @endphp
                                            <p class="text-capitalize fs-18 m-b-5-i text-black text-right">tax <small></small></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black text-right">${{Number_format($taxAmount, 2, '.', '')}}</p>
                                        </td>
                                    </tr>
                                    <tr class=" pro_det  pd-b-10">
                                        <td class="col-6">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-500"></p>

                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 mt-2 text-black f-w-500 text-right"></p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">total</p>
                                        </td>
                                        <td class="col-2">
                                            <p class="text-capitalize fs-18 m-b-5-i text-black f-w-600 text-right">
                                                ${{number_format(
                                                    $order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + $taxAmount, 
                                                    2, '.', ''
                                                )}} 
                                            </p>
                                        </td>

                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Order Summary Ends -->
                    <br>
                    @if($order->pickupSignature || $order->deliverySignature)
                    <table border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;" class="items_summary pd-b-5 text-left br-4 order-detail">
                        <tr>
                            <th>
                                Delivery Signature
                            </th>
                            <th>
                                Pickup Signature
                            </th>
                        </tr>
                        <tr>
                            <td>
                                @if($order->pickupSignature)
                                    <img src="{{$order->pickupSignature->signature}}" alt="" style="width: 100%; height: 200px;">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                {{$order->pickupSignature->signature_by}} | 
                                                {{format_to_us_date($order->pickupSignature->created_at)}} {{format_to_time($order->pickupSignature->created_at)}} | {{$order->pickupSignature->ip}} | {{$order->pickupSignature->device?:$order->pickupSignature->operating_system}} | {{$order->pickupSignature->browser}}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($order->deliverySignature)
                                    <img src="{{$order->deliverySignature->signature}}" alt="" style="width: 100%; height: 200px;">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                {{ $order->deliverySignature->signature_by}} | {{format_to_us_date($order->deliverySignature->created_at)}} {{format_to_time($order->deliverySignature->created_at)}} | {{$order->deliverySignature->ip}} | {{$order->deliverySignature->device?:$order->deliverySignature->operating_system}} | {{$order->deliverySignature->browser}}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <br>
                    @endif
                    @if($order->payment)
                    <div class="row">
                        <div class="col-12">
                            <div class="text-capitalize  m-b-5-i text-black text-right">
                                <p class="f-w-500 fs-16">Payment By :<span class="fs-16" style="font-weight:300;"> {{$order->payment->payment_type}} {{str_pad($order->payment->cr_last4, 16, '*', STR_PAD_LEFT)}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </body>
</html