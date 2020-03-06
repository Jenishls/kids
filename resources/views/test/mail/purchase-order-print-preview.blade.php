e<style>
    body{
        color: #646c9a;
    }
    html, body{
        font-size: 13px;
        font-weight: 300;
        font-family: Poppins;
    }
    .kt-grid.kt-grid--hor:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile)>.kt-grid__item.kt-grid__item--fluid {
        -webkit-box-flex: 1;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
    }
    .kt-portlet {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
        background-color: #fff;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    .kt-portlet .kt-portlet__body.kt-portlet__body--fit {
        padding: 0;
    }
    .kt-portlet .kt-portlet__body {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 25px;
        border-radius: 4px;
    }
    .kt-invoice-2 {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .kt-invoice-2 .kt-invoice__head {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 20px 0;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__container {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__title {
        font-weight: 700;
        font-size: 1.7rem;
        margin-right: 10px;
        margin-top: 5px;
        color: #595d6e;
        vertical-align: top;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-top: 5px;
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo img {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__brand .kt-invoice__logo .kt-invoice__desc {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        text-align: right;
        font-weight: 400;
        padding: 1rem 0 1rem 0;
        color: #74788d;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-top: 50px;
        width: 100%;
        border-top: 1px solid #ebedf2;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        color: #595d6e;
        margin-right: 10px;
        margin-top: 20px;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item .kt-invoice__subtitle {
        font-weight: 500;
        padding-bottom: .5rem;
    }
    .kt-invoice-2 .kt-invoice__head .kt-invoice__items .kt-invoice__item .kt-invoice__text {
        font-weight: 400;
        color: #74788d;
    }
    .kt-invoice-2 .kt-invoice__body {
        padding: 1rem 0;
    }
    .kt-invoice-2 .kt-invoice__container {
       
        margin: 0;
        padding: 0 30px;
    }
    .kt-invoice-2 .kt-invoice__body table {
        background-color: transparent;
    }
    .kt-invoice-2 .kt-invoice__body table thead tr th {
        background-color: transparent;
        padding: 1rem 0 .5rem 0;
        color: #74788d;
        border-top: 0;
        border-bottom: 1px solid #ebedf2;
    }
    .kt-invoice-2 .kt-invoice__body table thead tr th:not(:first-child) {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr td {
        background-color: transparent;
        padding: 1rem 0 1rem 0;
        border-top: none;
        font-weight: 700;
        font-size: 1.1rem;
        color: #595d6e;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr:first-child td {
        padding-top: 1.8rem;
    }
    .kt-invoice-2 .kt-invoice__body table tbody tr td:not(:first-child) {
        text-align: right;
    }
    .kt-invoice-2 .kt-invoice__footer {
        padding: 1rem 0;
        background-color: #f7f8fa;
    }
    .kt-invoice-2 .kt-invoice__footer .kt-invoice__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .kt-invoice-2 .kt-invoice__footer .table th {
        font-size: 1.1rem;
        text-transform: capitalize;
        font-weight: 500;
        color: #74788d;
        border-top: 0;
        border-bottom: 1px solid #ebedf2;
        padding: 10px 10px 10px 0;
        background-color: transparent;
    }
    .kt-invoice-2 .kt-invoice__footer .table th:last-child {
        padding-right: 0;
    }
    .kt-invoice-2 .kt-invoice__footer .table td {
        font-size: 1.1rem;
        text-transform: capitalize;
        background-color: transparent;
        font-weight: 500;
        color: #595d6e;
        padding: 10px 10px 10px 0;
    }
    .kt-invoice-2 .kt-invoice__actions {
        padding: 1rem 0;
    }
    .kt-invoice-2 .kt-invoice__actions .kt-invoice__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    .pt-0{
        padding-top:0px !important;
    }
</style>
 <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">
{{-- {{dd($order->supplier->address)}} --}}
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-invoice-2">
                <div class="kt-invoice__head">
                    <div class="kt-invoice__container">
                        <div class="kt-invoice__brand">
                            <h4 class="kt-invoice__title">{{ucfirst($order->supplier->c_name)}}</h4>
                            <div class="kt-invoice__logo">
                                {{-- @if ($vendor->logo) --}}
                                {{-- @else --}}
                                <a><img src="{{asset('media/blog/No_Image_Available.jpg')}}" width="203" height="50"></a>
                                {{-- @endif --}}
                                {{-- <a target="_blank"><img src="{{asset('media/company-logos/logo_client_color.png')}}"></a> --}}

                                <span class="kt-invoice__desc">
                                    @if ($order->supplier->address)
                                                    
                                    <span>{{ucfirst($order->supplier->address->add1)}}, {{ucfirst($order->supplier->address->add2)}}</span>
                                    <span>{{ucfirst($order->supplier->address->city)}} {{ucfirst($order->supplier->address->state)}}{{ucfirst($order->supplier->address->zip)}}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="kt-invoice__items">
                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle">ORDERED DATE</span>
                                <span class="kt-invoice__text">{{\Carbon\Carbon::parse($order->created_at)->format('m/d/Y')}}</span>
                                <br>
                                <span class="kt-invoice__subtitle">STATUS</span>
                                <span class="kt-invoice__text">{{ucfirst($order->status)}}</span>
                            </div>
                            <div class="kt-invoice__item">
                                {{-- <span class="kt-invoice__subtitle">INVOICE NO.</span>
                                <span class="kt-invoice__text">GS 000014</span>
                                <br> --}}
                                <span class="kt-invoice__subtitle">PO NO.</span>
                                <span class="kt-invoice__text">{{$order->po_number}}</span>
                                <br>
                                <span class="kt-invoice__subtitle">EXPIRY DATE</span>
                                <span class="kt-invoice__text">{{ Carbon\Carbon::parse($order->delivery_date)->format('m/d/Y')}}</span>
                            </div>
                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle">INVOICE TO.</span>
                                <span class="kt-invoice__text">
                                    {{ucfirst($requestedBy->salutation)}}. {{ucfirst($requestedBy->fname)}} {{$requestedBy->mname?ucfirst($requestedBy->mname):''}} {{$requestedBy->lname?ucfirst($requestedBy->lname):''}}<br>
                                    @if ($requestedBy->address)
                                        
                                    {{$requestedBy->address->add1}}, {{$requestedBy->address->add2}}<br>{{ucfirst($requestedBy->address->city)}}, {{ucfirst($requestedBy->address->state)}}, {{$requestedBy->address->zip}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </div>	
                <div class="kt-invoice__body">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align:left;">DESCRIPTION</th>
                                        <th>QUANTITY</th>
                                        <th>RATE</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    {{-- {{dd($order->poItems)}} --}}
                                    @foreach ($order->poItems as $item)
                                        {{-- {{dd($item)}} --}}
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->total_quantity}}</td>
                                            <td>${{number_format($item->actual_price,2)}}</td>
                                            <td class="kt-font-danger kt-font-lg">${{number_format($item->estimate_price,2)}}</td>
                                        </tr>
                                        <?php
                                        $total+=$item->estimate_price;
                                        ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {{dd($item)}} --}}
                <div class="kt-invoice__footer">
                    <div class="kt-invoice__container">
                        <div class="table-responsive"  style="width:100%">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:25%;"></th>
                                        <th style="width:50%;"></th>
                                        <th style="width:25%;text-align:left;">SUB TOTAL</th>
                                        <th class="kt-align-right">${{number_format($total, 2)}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:25%;"></td>
                                        <td style="width:25%;"></td>
                                        <td style="width:25%;">TAXES</td>
                                        <td class="kt-align-right" style="padding-right:0px;">15%</td>
                                    </tr>
                                    <tr>
                                        <?php 
                                        $grand_total = $total+ ($total*(15/100));
                                        ?>
                                        <td style="width:25%;" class="pt-0">
                                            <div>
                                                <u><span class="kt-invoice__subtitle">REQUESTED BY</span></u><br>
                                                    {{ucfirst($requestedBy->salutation)}}. {{ucfirst($requestedBy->fname)}} {{$requestedBy->mname?ucfirst($requestedBy->mname):''}} {{$requestedBy->lname?ucfirst($requestedBy->lname):''}}
                                                <br>
                                                    {{\Carbon\Carbon::parse($order->created_at)->format('m/d/Y')}}
                                            </div>
                                        </td>
                                        <td style="width:25%;" class="pt-0">
                                                <div>
                                                <u><span class="kt-invoice__subtitle">APPROVED BY</span></u><br>&nbsp;<br>&nbsp;<br>
                                            </div>
                                        </td>
                                        <td style="width:25%;" class="pt-0">GRAND TOTAL
                                        <br>&nbsp;<br>&nbsp;<br>
                                        </td>
                                        <td class="kt-font-danger kt-font-xl kt-font-boldest kt-align-right" style="padding-right:0px;" class="pt-0">${{number_format($grand_total, 2)}}<br>&nbsp;<br>&nbsp;<br>&nbsp;<br></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        window.print();
        window.close();
    }, 300);
</script>
