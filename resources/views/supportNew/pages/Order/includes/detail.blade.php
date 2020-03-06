<style>
    #style-7::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }
    .order-des .kt-widget13__item .kt-widget13__desc {
        color: #a7abc3;
        text-align: left !important;
        padding-right: 1rem;
        font-weight: 400;
    }

    .order-des .kt-widget13__item {
        margin-bottom: 5px !important;
    }
    .order-des {
        padding: 5px 0!important;
    }
    #order_table > .kt-datatable__table > .kt-datatable__head .kt-datatable__row > .kt-datatable__cell > span, .kt-datatable > .kt-datatable__table > .kt-datatable__foot .kt-datatable__row > .kt-datatable__cell > span {
        color: #fff !important;
    }

    .scrollbar
    {
        margin-left: 30px;
        float: left;
        height: 50px;
        width: 65px;
        background: #F5F5F5;
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    .force-overflow
    {
        min-height: 100px;
    }

    .order-des .kt-widget13__item .kt-widget13__text.kt-widget13__text--bold {
        font-size: 1rem !important;
    }

    .order-summary-container .kt-widget13__item {
        border-bottom: 1px solid #e8e8e8;
        height: 25px;
    }

    .kt-widget13 .kt-widget13__item .kt-widget13__text.kt-widget13__text--bold {
        color: #5c5d61;
    }

</style>
<div class="datatable_container usersControlContent" id="datatable_container">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Order
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <a data-route="/admin/order/detail/{{$order->id}}" class="kt-subheader__breadcrumbs-link pageload pointer">{{$order->order_no}}</a>
                </div>
                <div class="back_temp ml-auto" style="width: 94px;">
                        <a class="kt-menu__link pageload backBtn" onclick="event.preventDefault();" data-route="/admin/order">
                            <i class="fas fa-arrow-left" style="padding-right: 10px;
                            "></i>
                            Back
                        </a>
                    </div>
                {{-- <button type="button" class="btn btn-light btn-elevate-hover btn-pill ml-auto pageload" data-route="/admin/products"><i class="fa fa-arrow-left"></i> Back</button> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="min-height: 45px;">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="flaticon2-shopping-cart-1"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Order Summary
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="edit_order"><i class="la la-edit"></i>
                                        Order
                                    </a>
                            </div>
                                <div class="dropdown dropdown-inline exportBtn ml-5">
                
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
                
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__section kt-nav__section--first">
                                                <span class="kt-nav__section-text">Choose an option</span>
                                            </li>
                
                                            {{-- <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                    <span class="kt-nav__link-text exportOrderTo" data-export-to="csv">CSV</span>
                                                </a>
                                            </li> --}}
                                            <li class="kt-nav__item">
                                                <a class="kt-nav__link pointer">
                                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                    <span class="kt-nav__link-text exportOrderDetailTo" data-export-to="pdf">PDF</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="padding-bottom: 0px !important; padding-top: 10px !important;">
                        <div class="kt-widget__content row">
                            <div class="col-md-4 no-padding" >
                                <div class="kt-widget13 order-des order-summary-container" >
                                    <div class="kt-widget13__item">
                                        @if($order->company)
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Company Name
                                            </span>
                                            <span class="kt-widget13__text pageLoadWithBack" data-route="/admin/account/view/{{$order->company->id}}" data-backurl="/admin/order/detail/{{$order->id}}">
                                            <strong class="text-black pointer"  style=" color: #434349" id="span_name">
                                                    {{$order->company?ucfirst($order->company->c_name):""}}  					 
                                                </strong>
                                            </span>
                                        @else
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Customer Name
                                            </span>
                                            <span class="kt-widget13__text pageLoadWithBack" data-route="/admin/client/clientProfile/{{$order->client->id}}" data-backurl="/admin/order/detail/{{$order->id}}">
                                                <strong class="text-black pointer" style=" color: #434349" id="span_name">
                                                    {{$order->client?ucfirst($order->client->fname):""}} {{ $order->client?ucfirst($order->client->mname):" "}} {{ $order->client?ucfirst($order->client->lname):""}} 					 
                                                </strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Phone
                                        </span>
                                        @if($order->client)
                                        <span class="kt-widget13__text" id="span_phone">
                                            {{$order->client?$order->client->phone_no:"-"}} 					 				 
                                        </span>
                                        @else
                                        <span class="kt-widget13__text" id="span_phone">
                                            {{$order->company?$order->company->account?$order->company->account->contact?$order->company->account->contact->phone_no:"":"":"-"}} 					 				 
                                        </span>
                                        @endif
                                    </div>
                                   
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Email
                                        </span>
                                        @if($order->client)
                                        <span class="kt-widget13__text pointer" id="span_email">
                                            {{$order->client?$order->client->email:"-"}} 					 				 
                                        </span>
                                        @else
                                        <span class="kt-widget13__text pointer" id="span_email">
                                            {{$order->company?$order->company->account?$order->company->account->contact?$order->company->account->contact->email:"":"":"-"}} 					 				  					 				 
                                        </span>
                                        @endif
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Order #
                                        </span>
                                        <span class="kt-widget13__text">
                                            {{$order->order_no}} 					 
                                        </span>
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Order Date
                                        </span>
                                        <span class="kt-widget13__text">
                                            {{$order->created_at?format_to_us_date($order->created_at):"-"}}					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item" style="border-bottom: none;">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Quote #
                                        </span>
                                        <span class="kt-widget13__text">
                                                -							 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 no-padding">
                                <div class="kt-widget13 order-des order-summary-container" >
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Package Name
                                        </span>
                                        <span class="kt-widget13__text" id="span_package">
                                            {{$order->package?ucwords($order->package->package_name):"-"}}							 
                                        </span>
                                        @if(!$order->package)
                                        <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" id="add_order_package">
                                            <i class="la la-plus"></i>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Invoice
                                        </span>
                                        <span class="kt-widget13__text" id="span_invoice">
                                            @php
                                            $tax = 0;
                                            if($order->tax){
                                                $tax = default_company('sales_tax');
                                            }
                                             $invoice = $order->drInvoices()->sum('amount') - $order->crInvoices()->sum('amount')   
                                            @endphp
                                            $ {{$order->drInvoices?number_format(($order->drInvoices()->sum('amount') + ($tax/100 * $order->drInvoices()->sum('amount'))?:0), 2, '.', ','):"-"}}
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Payment
                                        </span>
                                        <span class="kt-widget13__text" id="span_payment">
                                                $ {{$order->Payments?number_format($order->Payments()->sum('amount'), 2, '.', ','):"-"}}							 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Payment Type
                                        </span>
                                        <span class="kt-widget13__text" >
                                                 {{$order->Payment?$order->Payment->payment_type:"-"}}							 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Balance
                                        </span>
                                        <span class="kt-widget13__text" id="span_balance">
                                            @php
                                                $payment =  $order->Payments?$order->Payments()->sum('amount'):0;
                                                $invoice = $order->drInvoices?$order->drInvoices()->sum('amount') + ($tax/100 * $order->drInvoices()->sum('amount')):0;
                                                $balance = $invoice - $payment;
                                            @endphp
                                            $ {{number_format($balance, 2, '.', ',')?:0}}							 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 no-padding">
                                <div class="kt-widget13 order-des order-summary-container" >
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Status
                                            </span>
                                            <span class="kt-widget13__text" id="span_status">
                                                @if($order->order_status == "confirmed")
                                                    <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Confirmed</span>
                                                @elseif($order->order_status == "delivered")
                                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}" >Delivered</span>
                            
                                                @elseif($order->order_status == "picked_up")
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " style="background: #48cfbd; color: #fff;" data-id="{{$order->id}}">Picked Up</span>
                                                
                                                    @elseif($order->order_status == "closed")
                                                    <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Closed</span>
                                                
                                                    @elseif($order->order_status == "deleted")
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}">Deleted</span>
                                            
                                                @else
                                                <span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer " data-id="{{$order->id}}" >Pending</span>
                                                @endif
                                                <div class="dropdown dropdown-inline">
                                                    <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                                        <a class="dropdown-item pointer update_status" data-status="pending"> Pending</a>
                                                        <a class="dropdown-item pointer update_status" data-status="confirmed"> Confirm</a>
                                                        <a class="dropdown-item pointer update_status" data-status="delivered"> Delivered</a>
                                                        <a class="dropdown-item pointer update_status" data-status="picked_up"> Picked up</a>
                                                        <a class="dropdown-item pointer update_status" data-status="closed"> Closed</a>
                                                        <a class="dropdown-item pointer update_status" data-status="deleted"> Deleted</a>
                                                    </div>
                                                </div>		 
                                            </span>
                                        </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Sales Rep
                                        </span>
                                        <span class="kt-widget13__text" id="span_sales_rep">
                                                @if ($order->sales_rep == "000")
                                                    Website
                                                @else
                                                    {{$order->sales_representative?ucfirst($order->sales_representative->name):""}}  					 
                                                @endif					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Pickup By
                                        </span>
                                        <span class="kt-widget13__text" id="span_pickup_by">
                                            @if($order->pickup_by)
                                                {{get_user_name_by_id(json_decode($order->pickup_by)->user)}}	
                                            @endif				 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Delivery By
                                        </span>
                                        <span class="kt-widget13__text" id="span_delivery_by">
                                            @if($order->delivery_by)
                                                {{get_user_name_by_id(json_decode($order->delivery_by)->user)}}
                                            @endif						 
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head" style="min-height: 45px;">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="fa fa-map-marked-alt"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Billing Address
                                    </h3>
                                </div>
                                
                            </div>
                            <div class="kt-portlet__body" style="padding:10px; padding-bottom: 0px !important; padding-top: 0px !important;">
                                <div class="kt-widget__content">
                                    <div class="kt-widget13 order-des">
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    <i class="flaticon-calendar"></i> &nbsp;{{$order->created_at?format_to_us_date($order->created_at)." (Billing Date)":"-"}}
                                            </span>
                                        </div>
                                        @if($order->billingAddr)
                                        @if($order->billingAddr->add1)
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-location"></i>&nbsp;{{$order->billingAddr->add1}}
                                            </span>
                                        </div>
                                        @endif
                                        @endif
                                        @if($order->billingAddr)
                                        @if($order->billingAddr->add2)
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="la la-map-marker"></i>&nbsp;{{$order->billingAddr->add2}}     
                                            </span>
                                        </div>
                                        @endif
                                        @endif
                                        @if($order->billingAddr)
                                        @if($order->billingAddr->city || $order->billingAddr->county || $order->billingAddr->state)
                                        <div class="kt-widget13__item">
                                                <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    <i class="flaticon2-map"></i>&nbsp;    
                                                    {{$order->billingAddr->city}}					 
                                                    {{$order->billingAddr->county}}					 
                                                    {{$order->billingAddr->state}}
                                                </span>
                                            </div>
                                        @endif
                                        @endif
                                        @if($order->billingAddr)
                                        @if($order->billingAddr->country || $order->billingAddr->zip)
                                        <div class="kt-widget13__item" style="border-bottom: none;">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-map-location"></i>&nbsp;
                                                {{$order->billingAddr->country}}					 
                                                {{$order->billingAddr->zip}}					
                                            </span>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head pr-10" style="min-height: 45px;">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="fa fa-map-marked-alt"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Moving Detail
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                        <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_moving ml-auto" data-route="/admin/order/edit/moving/{{$order->id}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body" style="padding:10px; padding-bottom: 0px !important; padding-top: 0px !important;">
                                <div class="kt-widget__content">
                                    <div class="kt-widget13 order-des">
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                    <i class="flaticon-calendar"></i> &nbsp; <span id="span_moving_date" style="color: #8BC34A;">{{$order->delivery_date?format_to_us_date($order->delivery_date):"-"}}</span> (Moving Date)
                                            </span>
                                        </div>
                                        @if($order->shippingAddr)
                                        <div class="kt-widget13__item" @if(!$order->shippingAddr->add1) style="display:none" @endif>
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                    <i class="flaticon-location"></i> &nbsp; <span id="span_moving_add1">{{$order->shippingAddr->add1}} </span>
                                            </span>
                                        </div>
                                        @endif
                                        @if($order->shippingAddr)
                                        <div class="kt-widget13__item" @if(!$order->shippingAddr->add2) style="display:none" @endif>
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                <i class="la la-map-marker"></i>&nbsp; <span id="span_moving_add2">{{$order->shippingAddr->add2}}</span>
                                            </span>
                                        </div>
                                        @endif
                                        @if($order->shippingAddr)
                                        <div class="kt-widget13__item asdas" @if(!$order->shippingAddr->city && !$order->shippingAddr->county && !$order->shippingAddr->state) style="display:none" @endif>
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon2-map"></i>&nbsp;
                                                <span id="span_moving_city">
                                                {{$order->shippingAddr->city}}					 
                                                {{$order->shippingAddr->county}}					 
                                                {{$order->shippingAddr->state}}
                                                </span>
                                            </span>
                                        </div>
                                        @endif
                                        @if($order->shippingAddr)
                                        <div class="kt-widget13__item" @if(!$order->shippingAddr->country && !$order->shippingAddr->zip) style="display:none; border-bottom: none;" @endif>
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                <i class="flaticon-map-location"></i>&nbsp;    
                                                <span id="span_moving_zip">
                                                    {{$order->shippingAddr->country}}					 
                                                    {{$order->shippingAddr->zip}}
                                                </span>
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head pr-10" style="min-height: 45px;">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="flaticon-suitcase"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Pickup Detail
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                    <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_pickup ml-auto" data-route="/admin/order/edit/pickup/{{$order->id}}}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body" style="padding:10px; padding-bottom: 0px !important; padding-top: 0px !important;">
                                <div class="kt-widget__content">
                                        <div class="kt-widget13 order-des">
                                                <div class="kt-widget13__item">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                            <i class="flaticon-calendar"></i> &nbsp;<span style="color: #d05f97c2" id="span_pickup_date">{{$order->pickup_date?format_to_us_date($order->pickup_date):"-"}}</span> (Pickup Date)
                                                    </span>
                                                </div>
                                                @if($order->pickupAddr)
                                                <div class="kt-widget13__item" @if(!$order->pickupAddr->add1) style="display:none;" @endif>
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="la la-map-marker"></i>&nbsp;
                                                        <span id="span_pickup_add1">{{$order->pickupAddr->add1}}</span>
                                                    </span>
                                                </div>
                                                @endif
                                                @if($order->pickupAddr)
                                                <div class="kt-widget13__item" @if(!$order->pickupAddr->add2) style="display:none;" @endif>
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                        <i class="la la-map-marker"></i>&nbsp;
                                                        <span id="span_pickup_add2">{{$order->pickupAddr->add2}}</span>
                                                    </span>
                                                </div>
                                                @endif
                                                @if($order->pickupAddr)
                                                <div class="kt-widget13__item" @if(!$order->pickupAddr->city || !$order->pickupAddr->county || !$order->pickupAddr->state) style="display:none;" @endif>
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text" >
                                                        <i class="flaticon2-map"></i>&nbsp;
                                                        <span id="span_pickup_city">
                                                        {{$order->pickupAddr->city}}					 
                                                        {{$order->pickupAddr->county}}					 
                                                        {{$order->pickupAddr->state}}
                                                        </span>
                                                    </span>
                                                </div>
                                                @endif
                                                @if($order->pickupAddr)
                                                <div class="kt-widget13__item" @if(!$order->pickupAddr->country || !$order->pickupAddr->zip) style="border-bottom: none; display: none;" @endif>
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="flaticon-map-location"></i>&nbsp;    
                                                        <span id="span_pickup_zip">
                                                        {{$order->pickupAddr->country}}					 
                                                        {{$order->pickupAddr->zip}}</span>
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="min-height: 45px;">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="flaticon2-gift-1"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Order Items
                            </h3>
                        </div>
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_order_items"><i class="la la-plus"></i>
                                Items
                            </a>
                            <a class="btn btn-success btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm text-white" id="grab_items_btn" style="display: none;"><i class="la la-hand-rock-o"></i>
                                Pickup Items
                            </a>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
                        <div class="kt-invoice-2">	
                            <div class="kt-invoice__body">
                                <div class="kt-invoice__container">
                                    <div id="orderItemDatatable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
                
                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="min-height: 45px;">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="fab fa-cc-amazon-pay"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Invoice
                            </h3>
                        </div>
                        
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" @if($balance  == 0) style="display: none;" @endif data-balance = "{{$balance}}" id="make_payment"><i class="la la-plus"></i>
                                Payment
                            </a>
                        </div>
                    </div>

                    <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
                        <div class="kt-invoice-2">	
                            <div class="kt-invoice__body">
                                <div class="kt-invoice__container">
                                    <div id="invoicedataTable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="min-height: 45px;">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="fab fa-cc-amazon-pay"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Payment
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
                        <div class="kt-invoice-2">	
                            <div class="kt-invoice__body">
                                <div class="kt-invoice__container">
                                    <div id="paymentdataTable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @include('supportNew.pages.Order.includes.signatures')
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="row h-100">
	        	<div class="col-md-12">
		 			<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid" >
			            <div class="kt-portlet__head">
			                <div class="kt-portlet__head-toolbar">
			                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
	 		                        <li class="nav-item">
	 		                            <a class="nav-link active" data-toggle="tab" href="#order_notes" role="tab">
	 		                                <i class="flaticon-notes" aria-hidden="true"></i>Notes
	 		                            </a>
	 		                        </li>
	 		                        {{-- <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_1_tab_content" role="tab">
	 		                                <i class="flaticon-notes" aria-hidden="true"></i>Audit
	 		                            </a>
	 		                        </li> --}}
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#messageApp" role="tab">
	 		                                <i class="flaticon-comment" aria-hidden="true"></i>Messages
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#emailApp" role="tab">
	 		                                <i class="flaticon-comment" aria-hidden="true"></i>Email Log
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#order_review" role="tab">
	 		                                <i class="flaticon-comment" aria-hidden="true"></i>Reviews
	 		                            </a>
	 		                        </li>
			                    </ul>
			                </div>
			            </div>
			            <div class="kt-portlet__body py-0 px-3">                   
			                <div class="tab-content">
	 		                    <div class="tab-pane active" id="order_notes" role="tabpanel">
                                    <div class="tab-pane mt-10" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                        Notes
                                        @include('supportNew.pages.Order.includes.notes')
                                    </div>
	 		                    </div>
                                 
                                 <div class="tab-pane" id="kt_portlet_base_demo_4_1_tab_content" role="tabpanel">
                                    @include('supportNew.pages.Order.includes.audit')
	 		                    </div>
	 		                    <div class="tab-pane" id="messageApp" role="tabpanel">
                                    <message-component sms-logs="{{$order->sms}}" order-id="{{$order->id}}" orderer-phone="{{$order->shippingAddr->phone}}"></message-component>
	 		                    </div>
	 		                    <div class="tab-pane" id="emailApp" role="tabpanel">
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm mb-10 mt-10" id="send_mail_order"><i class="la la-mail"></i>
                                        Send Mail
                                    </a>
                                    @include('supportNew.pages.Order.includes.mail_log')
	 		                    </div>
	 		                    <div class="tab-pane" id="order_review" role="tabpanel">
                                    Review
	 		                    </div>
			                </div>
			            </div>
			        </div>
	        	</div>
	        </div>
        </div>
    </div>
</div>

<script>
    
    $(function(){

        const messageApp = new Vue({
            el : '#messageApp',
            name : "Message Application"
        });
        
    });

    var orderItemsTable = $('#orderItemDatatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/order/orderItems/{{$order->id}}',
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },
        autoColumns: true,

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,
        rows:{
            afterTemplate: function(){
                active_current_row()
            }
        },

        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                width: 20,
                sortable:false,
                class: 'grab',
                selector : {
                    class: 'kt-checkbox--solid grab_item'
                }, 

            },{
                // sortable: true,
                field: 'product.name',
                title: 'Item',
                width:200,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img alt="photo" src="${row.inventory.product.thumb?"/admin/products/image/"+row.inventory.product.thumb.file_name:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius:0;">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <a class="kt-user-card-v2__name pointer">${row.inventory.product.name}</a>
                                        <span class="kt-user-card-v2__desc">${row.inventory.product.code}</span>
                                    </div>
                                </div>
                           
                    `;
                },

            },
            {
                // sortable: true,
                field: 'inventory.price',
                title: 'Price ($)',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.inventory.price).toFixed(2);
                },
            },
            {
                // sortable: true,
                field: 'quantity',
                title: 'Items',
                width:80,

            },
            {
                // sortable: true,
                field: 'total',
                title: 'Total ($)',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.total).toFixed(2);
                },
            },
            {
                // sortable: true,
                field: 'delivery_date',
                title: 'Delivery Date',
                width:120,
                template: function(row, index, datatable) {
                    return moment(row.delivery_date).format('MM/DD/YYYY');
                },
            },
            {
                // sortable: true,
                field: 'pickup_date',
                title: 'Pickup Date',
                width:120,
                template: function(row, index, datatable) {
                    return moment(row.pickup_date).format('MM/DD/YYYY');
                },
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
				width: 80,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-callback="active_current_row" data-backurl="/admin/order/detail/{{$order->id}}" data-route="/admin/products/detail/'+row.inventory.product_id+'"><i class="la la-eye" title="view Item"></i></a><a class="btn btn-hover-brand btn-default btn-icon btn-pill" data-route="/admin/products/detail/'+row.inventory.product_id+'" style="border:none;"><i class="la la-hand-rock-o" title="view Item"></i></a>';
                },
            },
        ],
	});

    var paymentsTable = $('#paymentdataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/order/payments/{{$order->id}}',
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },
        autoColumns: true,

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,


        // columns definition
        columns: [
            {
                field: '#',
                title: '#',
                width: 20,
                sortable: false,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },
            {
                // sortable: true,
                field: 'order.order_no',
                title: 'Order #',
                width:100,

            },
            {
                // sortable: true,
                field: 'created_at',
                title: 'Payment Date',
                width:120,
                template: function(row, index, datatable) {
                    return moment(row.created_at).format('MM/DD/YYYY');
                },
            },
            {
                // sortable: true,
                field: 'payment_type',
                title: 'Payment Type',
                width:100,

            },
            // {
            //     // sortable: true,
            //     field: 'ref_no',
            //     title: 'Reference #',
            //     width:90,

            // },
            {
                // sortable: true,
                field: 'gateway',
                title: 'Receipt By',
                width:90,
                template: function(row, index, datatable) {
                    if(row.gateway == "-"){
                        return row.creator.name;
                    }
                    else{
                        return row.gateway;
                    }
                },

            },
            {
                // sortable: true,
                field: 'amount',
                title: 'Amount ($)',
                template: function(row, index, datatable) {
                    return Number(row.amount).toFixed(2);
                },

            },
            // {
            //     // sortable: true,
            //     field: 'is_active',
            //     title: 'Status',
            //     template(row){
            //         if(row.is_active){
            //             return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}" style="padding:10px 15px;">Paid</span>`;
            //         }
                        
            //             return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}">Return</span>`;
            //     }

            // },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
				width: 80,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill " data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

    });
    
    var invoiceTable = $('#invoicedataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/order/invoice/{{$order->id}}',
                    method: 'get',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 50,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            //saveState: true 
        },
        autoColumns: true,

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: false,


        // columns definition
        columns: [
            {
                field: '#',
                title: '#',
                width: 20,
                sortable: false,
                template: function(row, index, datatable) {
                    return index+1;
                }
            },
            {
                // sortable: true,
                field: 'created_at',
                title: 'Date',
                width:120,
                template: function(row, index, datatable) {
							return moment(row.created_at).format('MM/DD/YYYY');
						},
            },
            {
                // sortable: true,
                field: 'invoice_no',
                title: 'Invoice #',
                width:100,

            },
            {
                // sortable: true,
                field: 'customer_name',
                title: 'Name',
                width:150,
                template: function(row, index, datatable) {
                    if(row.client){
                        if(row.client.mname){
                            return row.client.fname + ' '+ row.client.mname+' '+ row.client.lname;
                        }else{
                            return row.client.fname + ' '+ row.client.lname;
                        }
                    }else if(row.company){
                        return row.company.c_name;
                    }
                    else{
                        return "-";
                    }
                }

            },
            {
                // sortable: true,
                field: 'amount',
                title: 'Amount ($)',
                template: function(row, index, datatable) {
                    let {order: {tax = 0}} = row;
                    if(tax){
                        tax = Number(tax.tax_value)/100 * Number(row.amount);
                    }
                    if(row.type == "debit"){
                        return Number(row.amount + tax).toFixed(2);
                    }
                    else{
                        return "-"+Number(row.amount + tax).toFixed(2);
                    }
                },
            },
            {
                // sortable: true,
                field: 'type',
                title: 'Type',
                template(row){
                    if(row.type == "debit"){
                        return `Charge`;
                    }
                        return `Refund`;
                }

            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
				width: 80,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill" data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

    });

    // export
    $(document).off('click', '.exportOrderDetailTo').on('click', '.exportOrderDetailTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/export/orderDetail/' + $(this).attr('data-export-to')+'?order={{$order->id}}')
    });
    
    $(document).off('click', '.edit_pickup').on('click', '.edit_pickup', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: $(this).data('route'),
            c:1,
        });
    })
    
    $(document).off('click', '.edit_moving').on('click', '.edit_moving', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: $(this).data('route'),
            c:1,
        });
    })
    
    $(document).off('click', '#add_order_items').on('click', '#add_order_items', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/addOrderItems/{{$order->id}}"
        });
    });
    
    $(document).off('click', '#make_payment').on('click', '#make_payment', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/payment/{{$order->id}}",
            width: '100%',
        });
    });
    
    $(document).off('change', '.grab_item input').on('change', '.grab_item input', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if($(this).parent().hasClass('kt-checkbox--all')){
            $('.grab_item input').attr('name', 'checked_order_items[]').addClass('grabbed_order_items');
            $('#grab_items_btn').show();
        }
        else{
            $(this).attr('name', 'checked_order_items[]').addClass('grabbed_order_items');
            $('#grab_items_btn').show();
        }
    });

    $(document).off('click', '#grab_items_btn').on('click', '#grab_items_btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/pickupOrderItems/{{$order->id}}",
        });
    });
    
    $(document).off('click', '#delete_order').on('click', '#delete_order', function(e) {
        e.preventDefault();
        e.stopPropagation();
        confirmAction({
            btn: 'btn-danger',
            action: 'Delete',
            message: '<i class="la la-trash text-danger display-4"></i> <br> <br> Are you sure you want to delete this Order ?'
        }, function () {
            $.post("/admin/order/delete/{{$order->id}}", {
                _token: $('meta[name="csrf-token"]').attr('content')
            }).then(function (response) {
                $.ajax({
                    method: "get",
                    url: "/admin/order",
                    data: {},
                    beforeSend: function () {
                        $("#kt_body").html(cssload);
                    },
                    success: function (response, status, xhr) {
                        setTimeout(function () {
                            location.hash = url.replace(/^(#|\/)/, "");
                            $("#kt_body").html(response);
                        }, 200);
                    },
                    error: function (xhr, status, error) { }
                });
                toastr.success(response.message);
            }, function (err) {
                toastr.error('Failed To Delete!');
            });
        });
    });
    
    // Audit
    $(document).off('click', '.viewAudit').on('click', '.viewAudit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: $(this).attr('data-route'),
        });
    });
   
    // Status
    $(document).off('click', '.update_status').on('click', '.update_status', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let status = $(this).attr('data-status');
        showModal({
            url: "/admin/order/status/{{$order->id}}?status="+status,
        });
    });
    
    // Mail
    $(document).off('click', '#send_mail_order').on('click', '#send_mail_order', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/compose/{{$order->id}}",
        });
    });
    
    // edit Order
    $(document).off('click', '#edit_order').on('click', '#edit_order', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/edit/{{$order->id}}",
        });
    });
    
    // Add Package Order
    $(document).off('click', '#add_order_package').on('click', '#add_order_package', function(e) {
        e.preventDefault();
        showModal({
            url: "/admin/order/add/package/{{$order->id}}",
            c:1
        });
    });

    // Email Form Client Mail
    $(document).off('click', '#span_email').on('click', '#span_email', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/order/compose/{{$order->id}}?pdf=true",
        });
    });

</script>