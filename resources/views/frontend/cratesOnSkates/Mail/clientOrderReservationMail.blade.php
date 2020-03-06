<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">

  <title>Client Order Reservation Mail</title>

  <style type="text/css">
    body {
      text-align: center;
      margin: 0 auto;
      width: 650px;
      font-family: 'Lato', sans-serif;
      background-color: #e2e2e2;
      display: block;
    }

    ul {
      margin: 0;
      padding: 0;
    }

    li {
      display: inline-block;
      text-decoration: unset;
    }

    a {
      text-decoration: none;
    }

    p {
      margin: 15px 0;
    }

    h5 {
      color: #444;
      text-align: left;
      font-weight: 400;
    }

    .text-center {
      text-align: center
    }

    .main-bg-light {
      background-color: #fafafa;
    }

    .title {
      color: #444444;
      font-size: 22px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
      display: inline-block;
      line-height: 1;
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
    table.order-detail tbody tr{
      border-bottom: 1px solid #dedede;
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

    .order-detail th {
      font-size: 14px;
      padding: 15px;
      text-align: left;
      background: #fafafa;
      border-bottom: 1px solid #dadada;
      border-right: 1px solid #e4e4e4;
    }

    .footer-social-icon tr td img {
      margin-left: 5px;
      margin-right: 5px;
    }

    .footer-social-icon a i {
      color: chocolate;
      font-size: 20px;
      margin-right: 10px;
    }

    .d-table{
      display: table;
    }

    .d-table-cell{
      display: table-cell;
    }

    .ver-middle{
      vertical-align: top;
      padding-left: 10px !important;
    }

    .text-right{
      text-align: right !important;
    }

    .text-left{
      text-align: left;
    }
    .border-right{
      border-right: 1px solid #dcdcdc;
    }

    .pd-15{
      padding: 15px !important;
    }

    .pd-left{
      padding-left: 10px;
    }

    .d-table{
        display: table;
        text-align: left;
    }

    .d-table .tr{
        display: table-row;
    }

    .d-table .tr div{
        display: table-cell;
        padding: 5px;
    }

    .footer-wrapper{
      background:#76c043; 
      padding:14px;margin:0
    }
    .footer-text{
      font-size:13px; 
      margin:0;
      color:white;
    }

    .table-address{
      width: 100%;
      margin-top: 35px;
      margin-bottom: 10px;
    }
    .order-date-time{
      font-size:14px;
      color:#444;
      margin-top: 15px;
      text-align:center;
    }
    address{
      margin-bottom: 30px;
      margin-top:0px;
      font-size:14px;
      font-weight: bold;
      font-style: inherit;
    }
    .table-main{
      padding: 0 30px;
      background-color: #f7f7f7;
      -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
      box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
      width: 100%;
    }

  .address-td{
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
  }
  .address-text{
    text-align: left;
    font-weight: normal; 
    font-size: 14px; 
    color: #000000;
    line-height: 21px; 
    margin-top: 0;
  }
  .text-center{
    text-align: center;
  }
  </style>
</head>

<body style="margin: 20px auto; width: 750px">
  <table align="center" border="0" cellpadding="0" cellspacing="0" class="table-main">
    <tbody>
      <tr>
        <td>
          <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td style="text-align:left;">
                {{-- <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path("cratesOnSkatesImages/crates-logo1.png")))}}" class="main-logo" style="margin-bottom: 30px;"> --}}
                {{-- <img src="{{asset('cratesOnSkatesImages/crates-logo1.png')}}" class="main-logo" style="margin-bottom: 30px;"> --}}
                <img src="{{request()->root().'/admin/companylogo'}}" class="main-logo" style="margin-bottom: 30px;">
                <!-- <img src="../assets/images/email-temp/delivery-2.png" alt="" style=";margin-bottom: 30px;"> -->
              </td>
              <td style="text-align:right;padding:0px;">
                <address>
                  {{custom_exploder('|',default_company('address'))[0]}}<br>
                  {{custom_exploder('|',default_company('address'))[1]}}<br>
                  @if(isset(custom_exploder('|',default_company('address'))[2]))
                    {!! custom_exploder('|',default_company('address'))[2]."<br/>" !!}
                  @endif
                  {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',default_company('phone_number'))}}
                </address>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <p style="font-size: 14px;text-align:left;margin:0px;"><b>Dear {{ucfirst($order->client->fname). " ", ucfirst($order->client->lname)}},</b></p><br>
                <p style="font-size: 14px;text-align:left;margin:0px;">Thank You For Trusting Us With Your Recent Move. Kindly find following order summary.</p>
              </td>
            </tr>
          </table>
          <!-- Dates Start -->
          <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;">
            <thead>
              <tr align="left">
                <th class="border-right text-center">Order #</th>
                <th class="border-right text-center">Delivery Date</th>
                <th class="text-center">Pick-up Date</th>
              </tr>
            </thead>
            <tr>
              <td class="text-left border-right">
                <h5 class="order-date-time">{{$order->order_no}}</h5>
              </td>
              <td valign="top" class="text-left border-right">
                <h5 class="order-date-time">{{date('m/d/Y', strtotime($order->delivery_date))}}</h5>
              </td>
              <td valign="top" class="text-left">
                <h5 class="order-date-time">{{date('m/d/Y', strtotime($order->pickup_date))}}</h5>
              </td>
            </tr>
          </table>
          @php
            $deliveryAddr = $order->shippingAddr;
            $pickupAddr = $order->pickupAddr;
          @endphp
          <!-- <p style="font-size: 14px;">Your Order Has Successfully Been Processed.</p> -->
          <!-- Dates End -->
          <table cellpadding="0" cellspacing="0" border="0" align="left" class="table-address">
            <tbody>
              <tr>
                <td class="address-td">
                  <h5 class="address-title">Delivery Information</h5>
                  <p class="address-text">
                    {{$deliveryAddr->first_name . $deliveryAddr->last_name }}<br/>
                    {{$deliveryAddr->add1}},
                    {!! $deliveryAddr->add2 ? "<br>".$deliveryAddr->add2: '' !!}
                    <br>{{$deliveryAddr->city, $deliveryAddr->state ."-". $deliveryAddr->zip}}
                    <br>{{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',$pickupAddr->phone)}} 
                  </p>
                  <p style="text-align:left;"><b>Note:</b> {{ucfirst($order->delivery_note?? "")}}</p>
                </td>
                <td class="address-td">
                  <h5 class="address-title">Pickup Information</h5>
                  <p class="address-text">
                    {{$pickupAddr->first_name . $pickupAddr->last_name }}<br/>
                    {{$pickupAddr->add1}},
                    {!! $pickupAddr->add2 ? "<br>".$pickupAddr->add2: '' !!}
                    <br>{{$pickupAddr->city, $pickupAddr->state ."-". $pickupAddr->zip}}
                    <br>{{$pickupAddr->phone}}
                  </p>
                  <p style="text-align:left;"><b>Note:</b> {{ucfirst($order->pickup_note ?? "")}}</p>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%;margin-bottom:30px;">
            <tr align="left">
              <th class="text-left">ITEM</th>
              <th class="text-right">QUANTITY</th>
              <th class="text-right">PRICE </th>
              <th class="text-right">TOTAL </th>
            </tr>
            @if($order->package)
              <tr>
                <td class="pd-left">
                  <div class="d-table">
                    <div class="d-table-cell" style="height: 50px; width:60px">
                      @if($order->package->thumb)
                        <img src="{{request()->root()}}/viewimage/package/{{$order->package->thumb->file_name}}" class="main-logo" style="height:100%; width: 100%">
                      @else
                        <img src="{{request()->root()}}/images/noimage.png" class="main-logo" style="height:100%; width: 100%"">
                      @endif
                    </div>
                    <span class="d-table-cell ver-middle">{{$order->package->package_name}} <br> (package)</span>
                  </div>
                </td>              
                <td valign="top" class="pd-15">
                  <h5 style="font-size: 14px; color:#444;margin-top: 10px;text-align:right;"><span>1</span></h5>
                </td>
                <td valign="top" class="pd-15">
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">{{priceFormat($order->package_amount)}}</h5>
                </td>
                <td valign="top" class="pd-15">
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">{{priceFormat($order->package_amount)}}</h5>
                </td>
              </tr>       
            @endif
            @php
              $packageItemsInventories = $order->package ? $order->package->packageItems->pluck('inv_id')->all() : [];
            @endphp
            @foreach($order->items as $item)
            <tr>
              <td class="pd-left">
                <div class="d-table">
                  <div class="d-table-cell" style="height: 50px; width:60px">
                    @if(isset($item->inventory->product->thumb))
                      <img src="{{request()->root()}}/viewimage/product/{{$item->inventory->product->thumb->file_name}}" class="main-logo" style="height:100%; width: 100%">
                    @else
                      <img src="{{asset('images/noimage.png')}}" class="main-logo" style="height:100%; width: 100%"">
                    @endif
                  </div>
                  <span class="d-table-cell ver-middle">{{ucfirst($item->inventory->product->name)}}<br>
                    @if(in_array($item->inventory_id, $packageItemsInventories) && !$item->is_addon)
                      <span style="color:black;font-size:11px;">(Package item)</span></p>
                    @elseif($item->inventory->product->is_rental || $item->inventory->product->isRental)
                      <span style="color:black;font-size:11px">Rental ({{$order->rentalDays()}} days)</span>
                    @else
                      <span style="color:black; font-size: 11px">Purchase<span>
                    @endif  
                  </span> 
                </div>
              </td>              
              <td valign="top" class="pd-15">
                <h5 style="font-size: 14px; color:#444;margin-top: 10px;text-align:right;">{{$item->quantity}}</h5>
              </td>
              <td valign="top" class="pd-15">
                @if($item->is_addon || !$order->package)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($item->amount, 2, '.', '')}}</h5>
                @endif
              </td>
              <td valign="top" class="pd-15">
                @if($item->is_addon || !$order->package)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($item->amount * $item->quantity,2, '.', '')}}</h5>
                @endif
              </td>
            </tr> 
            @endforeach
            <tr>
              <td class="pd-left">
                <div class="d-table">
                  <div class="d-table-cell" style="height: 50px; width:60px">                   
                      {{-- <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('images/truck.png')))}}" class="main-logo" style="height:100%; width: 100%""> --}}
                      <img src="{{request()->root().'/images/truck.png'}}"  class="main-logo" style="height:100%; width: 100%">
                  </div>
                  <span class="d-table-cell ver-middle">Delivery Charge</span>
                </div>
              </td>              
              <td valign="top" class="pd-15">
                <h5 style="font-size: 14px; color:#444;margin-top: 10px;text-align:right;"><span>-</span></h5>
              </td>
              <td valign="top" class="pd-15">
                @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($order->delivery_charge + $order->zip_delivery_charge, 2, '.', '')}}</h5>
                @else
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">Free</h5>
                @endif
              </td>
              <td valign="top" class="pd-15">
                @if((int)$order->delivery_charge !== 0 || $order->zip_delivery_charge)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($order->delivery_charge + $order->zip_delivery_charge, 2, '.', '')}}</h5>
                @else
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">Free</h5>
                @endif
              </td>
            </tr> 
            <tr>
              <td class="pd-left">
                <div class="d-table">
                  <div class="d-table-cell" style="height: 50px; width:60px">                   
                      {{-- <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('images/truck.png')))}}" class="main-logo" style="height:100%; width: 100%""> --}}
                      {{-- <img src="{{asset('images/truck.png')}}" class="main-logo" style="height:100%; width: 100%""> --}}
                      <img src="{{request()->root().'/images/truck.png'}}"  class="main-logo" style="height:100%; width: 100%">
                  </div>
                  <span class="d-table-cell ver-middle">Pickup Charge</span>
                </div>
              </td>              
              <td valign="top" class="pd-15">
                <h5 style="font-size: 14px; color:#444;margin-top: 10px;text-align:right;"><span>-</span></h5>
              </td>
              <td valign="top" class="pd-15">
                @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($order->pickup_charge + $order->zip_pickup_charge, 2, '.', '')}}</h5>
                @else
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">Free</h5>
                @endif
              </td>
              <td valign="top" class="pd-15">
                @if((int)$order->pickup_charge !== 0 || $order->zip_pickup_charge)
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">${{number_format($order->pickup_charge + $order->zip_pickup_charge, 2, '.', '')}}</h5>
                @else
                  <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">Free</h5>
                @endif
              </td>
            </tr> 
            @foreach($order->extras as $extra)
              <tr>
                <td class="pd-left">
                  <div class="d-table">                    
                    <span class="d-table-cell ver-middle">{{ucfirst($extra->title)}}<br>(Extras)</span>
                  </div>
                </td>              
                <td valign="top" class="pd-15">
                  <h5 style="font-size: 14px; color:#444;margin-top: 10px;text-align:right;"><span>-</span></h5>
                </td>
                <td valign="top" class="pd-15">                 
                    <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">{{number_format($extra->price, 2, '.', '')}}</h5>                  
                </td>
                <td valign="top" class="pd-15">                  
                    <h5 style="font-size: 14px; color:#444;margin-top:15px;text-align:right;">{{number_format($extra->price, 2, '.', '')}}</h5>
                </td>
              </tr>
            @endforeach
            <tr class="pad-left-right-space ">
              <td class="m-t-5" colspan="3" align="right">
                <b style="font-size: 14px;padding-right:17px;">Subtotal : </b>
              </td>
              <td class="m-t-5" colspan="1" align="right">
                <b style>
                  ${{number_format(
                    $order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + ($order->discount ? $order->discount->amount : 0),
                    '2','.',''
                  )}}
                </b>
              </td> 
            </tr>
            @if($order->discount)
              <tr class="pad-left-right-space">
                <td colspan="3" align="right">
                  <p style="font-size: 14px;padding-right:17px;">Coupon ({{$order->discount->code}}):</p>
                </td>
                <td colspan="1" align="right">
                  <p> -${{number_format($order->discount->amount,2,'.', '')}}</p>
                </td>
              </tr>
            @endif
            <tr class="pad-left-right-space">
              <td colspan="3" align="right">
                <p style="font-size: 14px;padding-right:17px;">Discount :</p>
              </td>
              <td colspan="1" align="right">
                <p> $0.00</p>
              </td>
            </tr>
            <tr class="pad-left-right-space">
              <td colspan="3" align="right">
                @php $taxAmount = $order->tax->applied_amount ?? 0 @endphp
                <p style="font-size: 14px;padding-right:17px;">TAX <small></small>:</p>
              </td>
              <td colspan="1" align="right">
                <p>${{Number_format($taxAmount, 2, '.', '')}}</p>
              </td>
            </tr>
            <tr class="pad-left-right-space ">
              <td class="m-b-5" colspan="3" align="right">
                <b style="font-size: 14px;padding-right:17px;">Total :</b>
              </td>
              <td class="m-b-5" colspan="1" align="right">
                <b>
                  ${{number_format(
                    $order->amount + $order->zip_delivery_charge + $order->zip_pickup_charge + $taxAmount, 
                    2, '.', ''
                  )}} 
                </b>
              </td>
            </tr>

          </table>
          <div class="d-table" style="margin-bottom: 15px;margin-left: auto"">
            <div class="tr">
                <div><b class="text-right">Payment By:</b></div>
                <div>{{$order->payment->payment_type}} {{str_pad($order->payment->cr_last4, 16, '*', STR_PAD_LEFT)}}</div>
            </div>
        </div>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td class="footer-wrapper">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0;">
          <tr>
            <td>
              <p class="footer-text">CratesOnSkates &copy; {{Carbon\Carbon::now()->format('Y')}}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>