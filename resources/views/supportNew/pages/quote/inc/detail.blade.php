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
        background: #F5F5F5;`
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
                    Quot
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <a data-route="/admin/quotes/detail/{{$quote->id}}" class="kt-subheader__breadcrumbs-link pageload pointer">{{$quote->quote_number}}</a>
                </div>
                <div class="back_temp ml-auto" style="width: 94px;">
                        <a class="kt-menu__link pageload" onclick="event.preventDefault();" data-route="/admin/quotes">
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
                            @if ($quote->performa_invoice)
                            @if($quote->performa_invoice->order)
                            @if($quote->performa_invoice->order->order_status == "converted")
                            <h3 class="kt-portlet__head-title">
                                Quot Summary Converted from Quot
                            </h3>
                            @else
                                <h3 class="kt-portlet__head-title">
                                    Quot Summary
                                </h3>
                            @endif
                            @else
                            <h3 class="kt-portlet__head-title">
                                    Quot Summary
                                </h3>
                            @endif
                            @else
                            <h3 class="kt-portlet__head-title">
                                    Quot Summary
                                </h3>
                                
                            @endif
                        </div>
                        {{-- <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                    <a class="btn btn-danger btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm text-white" id="delete_order"><i class="la la-trash text-white"></i>
                                         Order
                                    </a>
                            </div>
                        </div> --}}
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                        @if ($quote->performa_invoice)
                            @if($quote->performa_invoice->order)
                                @if(!$quote->performa_invoice->order->order_status == "converted")
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" data-id ="{{$quote->id}}" data-check-inv ="{{{$quote->performa_invoice?1:0}}}" id="convert_to_boking">
                                        <i class="flaticon-bag"></i>
                                        Convert to Order
                                    </a>
                                @endif
                            @else
                                <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" data-id ="{{$quote->id}}" data-check-inv = "{{{$quote->performa_invoice?1:0}}}" id="convert_to_boking">
                                    <i class="flaticon-bag"></i>
                                    Convert to Order
                                </a>
                            @endif
                            @else
                                <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" data-check-inv = "{{{$quote->performa_invoice?1:0}}}" data-id ="{{$quote->id}}" id="convert_to_boking">
                                    <i class="flaticon-bag"></i>
                                    Convert to Order
                                </a>
                                @endif
                                <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm send_quote_mail_detail">
                                    <i class="flaticon2-mail-1"></i>
                                    Send Mail
                                </a>
                                <div class="dropdown dropdown-inline exportBtn ml-5">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__section kt-nav__section--first">
                                                <span class="kt-nav__section-text">Choose an option</span>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a class="kt-nav__link pointer">
                                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                    @if($quote->performa_invoice)
                                                        @if($quote->performa_invoice->order)
                                                        <span class="kt-nav__link-text exportOrderDetailTo" data-export-to="pdf" data-id="{{$quote->performa_invoice->order->id}}">PDF</span>
                                                        @endif
                                                    @else
                                                    <span class="kt-nav__link-text exportQuoteDetailTo" data-export-to="pdf" data-id = "{{$quote->id}}">PDF</span>
                                                    @endif
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
                                        @if($quote->supplier_type == "companies")
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Company Name
                                            </span>
                                            <span class="kt-widget13__text">
                                                <strong class="text-black" style=" color: #434349">
                                                    {{$quote->vendorCompany?ucfirst($quote->vendorCompany->c_name):""}}  					 
                                                </strong>
                                            </span>
                                        @else
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Customer Name
                                            </span>
                                            <span class="kt-widget13__text">
                                                <strong class="text-black" style=" color: #434349">
                                                    {{$quote->vendorClient?ucfirst($quote->vendorClient->fname):""}} {{ $quote->vendorClient?ucfirst($quote->vendorClient->mname):" "}} {{ $quote->vendorClient?ucfirst($quote->vendorClient->lname):""}} 					 
                                                </strong>
                                            </span>
                                            @endif
                                            @if ($quote->performa_invoice)
                                            @if($quote->performa_invoice->order)
                                            @if(!$quote->performa_invoice->order->order_status == "converted")
                                                <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            @endif
                                            @endif
                                            @endif
                                        
                                    </div>

                                    <div class="kt-widget13__item">
                                        @if($quote->supplier_type == "companies")
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Phone
                                            </span>
                                            <span class="kt-widget13__text">
                                                {{$quote->vendorCompany?$quote->vendorCompany->contact?$quote->vendorCompany->contact->phone_no:"":""}} 					 				 
                                            </span>
                                        @else
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Phone
                                            </span>
                                            <span class="kt-widget13__text">
                                                {{$quote->vendorClient?$quote->vendorClient->phone_no:"-"}} 					 				 
                                            </span>
                                        @endif
                                    </div>
                                   
                                    <div class="kt-widget13__item">
                                        @if($quote->supplier_type == "companies")
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Email
                                            </span>
                                            <span class="kt-widget13__text send_quote_mail_detail pointer">
                                                {{$quote->vendorCompany?$quote->vendorCompany->contact?$quote->vendorCompany->contact->email:"":""}} 					 				  					 				 
                                            </span>
                                        @else
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Email
                                            </span>
                                            <span class="kt-widget13__text send_quote_mail_detail pointer">
                                                {{$quote->vendorClient?$quote->vendorClient->email:"-"}} 					 				 
                                            </span>
                                        @endif
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Order #
                                        </span>
                                        <span class="kt-widget13__text">
                                            {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->order_no:"":""}} 					 
                                        </span>
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Quot Date
                                        </span>
                                        <span class="kt-widget13__text">
                                            {{$quote->created_at?format_to_us_date($quote->created_at):"-"}}					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item" style="border-bottom: none;">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Quote #
                                        </span>
                                        <span class="kt-widget13__text">
                                                {{$quote->quote_number}}							 
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
                                        <span class="kt-widget13__text">
                                            {{$quote->package?ucwords($quote->package->package_name):"-"}}							 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Invoice
                                        </span>
                                        <span class="kt-widget13__text">
                                            $ {{$quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                        $quote->performa_invoice->order->invoices?
                                                            number_format($quote->performa_invoice->order->invoices()->sum('amount'), 2, '.', ',')
                                                            :"-"
                                                            :"-"
                                                            :"-"}}
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Payment
                                        </span>
                                        <span class="kt-widget13__text">
                                                $ {{$quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                        $quote->performa_invoice->order->Payments?
                                                        number_format($quote->performa_invoice->order->Payments()->sum('amount'), 2, '.', ',')
                                                        :"-"
                                                        :"-"
                                                        :"-"}}							 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Payment Type
                                        </span>
                                        <span class="kt-widget13__text">
                                                 {{$quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                        $quote->performa_invoice->order->Payment?
                                                        $quote->performa_invoice->order->Payment->payment_type:"-":"-":"-"}}							 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                Balance
                                        </span>
                                        <span class="kt-widget13__text">
                                            @php
                                                $payment =  $quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                        $quote->performa_invoice->order->Payments?
                                                        number_format($quote->performa_invoice->order->Payments()->sum('amount'), 2, '.', ',')
                                                        :0
                                                        :0
                                                        :0;
                                                $invoice = $quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                        $quote->performa_invoice->order->invoices?
                                                            number_format($quote->performa_invoice->order->invoices()->sum('amount'), 2, '.', ',')
                                                            :0
                                                            :0
                                                            :0;
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
                                                <span class="kt-widget13__text">
                                                    @if ($quote->performa_invoice)
                                                        @if($quote->performa_invoice->order)
                                                            @if($quote->performa_invoice->order->order_status == "confirmed")
                                                                <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}">Confirmed</span>
                                                            @elseif($quote->performa_invoice->order->order_status == "converted")
                                                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}" >Converted</span>
                                                            @elseif($quote->performa_invoice->order->order_status == "delivered")
                                                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}" >Delivered</span>
                                                            @elseif($quote->performa_invoice->order->order_status == "picked_up")
                                                                <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " style="background: #48cfbd; color: #fff;" data-id="{{$quote->performa_invoice->order->id}}">Picked Up</span>
                                                            @elseif($quote->performa_invoice->order->order_status == "closed")
                                                                <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}">Closed</span>
                                                            @elseif($quote->performa_invoice->order->order_status == "deleted")
                                                                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}">Deleted</span>
                                                            @else
                                                            <span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer " data-id="{{$quote->performa_invoice->order->id}}" >Pending</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($quote->performa_invoice)
                                                    @if($quote->performa_invoice->order)
                                                    @if($quote->performa_invoice->order->order_status == "converted")
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
                                                    @endif
                                                    @else	
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
                                                    @endif		 
                                                    @else	
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
                                                    @endif		 
                                                </span>
                                            </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Sales Rep
                                        </span>
                                        <span class="kt-widget13__text">
                                                
                                                @if ($quote->performa_invoice?
                                                    $quote->performa_invoice->order?
                                                    $quote->performa_invoice->order->sales_rep:"":"" == "000")
                                                    Website
                                                @else
                                                    {{$quote->sales_representative?ucfirst($quote->sales_representative->fname):""}} {{ $quote->sales_representative?ucfirst($quote->sales_representative->mname):" "}} {{ $quote->sales_representative?ucfirst($quote->sales_representative->lname):""}} 					 
                                                @endif					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Pickup By
                                        </span>
                                        <span class="kt-widget13__text">
                                                -					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Delivery By
                                        </span>
                                        <span class="kt-widget13__text">
                                                -					 
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
                                                    <i class="flaticon-calendar"></i> &nbsp;
                                                    
                                                    {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->created_at?format_to_us_date($quote->performa_invoice->order->created_at)." (Billing Date)":"-":"-":"-"}}
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-location"></i>&nbsp;{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->add1:"-":"-":"-"}}
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="la la-map-marker"></i>&nbsp;{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->add2:"-":"-":"-"}}    
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon2-map"></i>&nbsp;    
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->city:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->county:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->state:"-":"-":"-"}}
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item" style="border-bottom: none;">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-map-location"></i>&nbsp;
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->country:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->billingAddr?$quote->performa_invoice->order->billingAddr->zip:"-":"-":"-"}}					
                                            </span>
                                        </div>
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
                                @if ($quote->performa_invoice)
                                @if($quote->performa_invoice->order)
                                @if($quote->performa_invoice->order->order_status == "converted")
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                        <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_moving ml-auto" data-route="/admin/order/edit/moving/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:"":""}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                        <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_moving ml-auto" data-route="/admin/order/edit/moving/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:"":""}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                        <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_moving ml-auto" data-route="/admin/order/edit/moving/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:"":""}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="kt-portlet__body" style="padding:10px; padding-bottom: 0px !important; padding-top: 0px !important;">
                                <div class="kt-widget__content">
                                    <div class="kt-widget13 order-des">
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    <i class="flaticon-calendar"></i> &nbsp; <span style="color: #8BC34A;">
                                                    {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->delivery_date?format_to_us_date($quote->performa_invoice->order->delivery_date)." (Moving Date)":"-":"-":"-"}}</span>
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-location"></i> &nbsp; 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->add1:"-":"-":"-"}}				 
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="la la-map-marker"></i>&nbsp;
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->add2:"-":"-":"-"}}				 
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon2-map"></i>&nbsp;
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->city:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->county:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->state:"-":"-":"-"}}				 
                                            </span>
                                        </div>
                                        <div class="kt-widget13__item" style="border-bottom: none;">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                <i class="flaticon-map-location"></i>&nbsp;    
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->county:"-":"-":"-"}}				 
                                                {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->shippingAddr?$quote->performa_invoice->order->shippingAddr->zip:"-":"-":"-"}}				 
                                            </span>
                                        </div>
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
                                @if ($quote->performa_invoice)
                                @if($quote->performa_invoice->order)
                                @if($quote->performa_invoice->order->order_status == "converted")
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                    <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_pickup ml-auto" data-route="/admin/order/edit/pickup/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:":":""}}}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                    <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_pickup ml-auto" data-route="/admin/order/edit/pickup/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:":":""}}}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="kt-portlet__head-toolbar">
                                    <div class="kt-portlet__head-actions">
                                    <a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_pickup ml-auto" data-route="/admin/order/edit/pickup/{{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->id:":":""}}}}">
                                            <i class="far fa-edit"></i>
                                        </a>	
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="kt-portlet__body" style="padding:10px; padding-bottom: 0px !important; padding-top: 0px !important;">
                                <div class="kt-widget__content">
                                        <div class="kt-widget13 order-des">
                                                <div class="kt-widget13__item">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                            <i class="flaticon-calendar"></i> &nbsp;<span style="color: #d05f97c2">
                                                            {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickup_date?format_to_us_date($quote->performa_invoice->order->pickup_date)." (Pickup Date)":"-":"-":"-"}}</span>
                                                    </span>
                                                </div>
                                                <div class="kt-widget13__item">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="la la-map-marker"></i>&nbsp;
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->add1:"-":"-":"-"}}				 
                                                    </span>
                                                </div>
                                                <div class="kt-widget13__item">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="la la-map-marker"></i>&nbsp;
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->add2:"-":"-":"-"}}				 
                                                    </span>
                                                </div>
                                                <div class="kt-widget13__item">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="flaticon2-map"></i>&nbsp;
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->city:"-":"-":"-"}}				 
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->county:"-":"-":"-"}}				 
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->state:"-":"-":"-"}}				 
                                                    </span>
                                                </div>
                                                <div class="kt-widget13__item" style="border-bottom: none;">
                                                    <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                        <i class="flaticon-map-location"></i>&nbsp;    
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->country:"-":"-":"-"}}				 
                                                        {{$quote->performa_invoice?$quote->performa_invoice->order?$quote->performa_invoice->order->pickupAddr?$quote->performa_invoice->order->pickupAddr->zip:"-":"-":"-"}}				 
                                                    </span>
                                                </div>
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
                        @if ($quote->performa_invoice)
                            @if($quote->performa_invoice->order)
                                @if(!$quote->performa_invoice->order->order_status == "converted")
                                <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_order_items_quot"><i class="la la-plus"></i>
                                        Items
                                    </a>
                                </div>
                                @endif
                            @else
                                <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                                        <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_order_items_quot"><i class="la la-plus"></i>
                                            Items
                                        </a>
                                        <a class="btn btn-success btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm text-white" id="grab_items_btn"><i class="la la-hand-rock-o"></i>
                                            Extra lookup
                                        </a>
                                    </div>
                            @endif
                            @else
                            <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_order_items_quot"><i class="la la-plus"></i>
                                        Items
                                    </a>
                                </div>
                        @endif
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
                                Proforma Invoice
                            </h3>
                        </div>
                        @if ($quote->performa_invoice)
                        @if($quote->performa_invoice->order)
                        @if(!$quote->performa_invoice->order->order_status == "converted")
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="make_performa_invoice">
                                <i class="flaticon2-supermarket"></i>
                                Generate Invoice
                            </a>
                        </div>
                        @endif
                        @else
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="make_performa_invoice">
                                <i class="flaticon2-supermarket"></i>
                                Generate Invoice
                            </a>
                        </div>
                        @endif
                        @else
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="make_performa_invoice">
                                <i class="flaticon2-supermarket"></i>
                                Generate Invoice
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 15px;">
                        <div class="kt-invoice-2">	
                            <div class="kt-invoice__body">
                                <div class="kt-invoice__container">
                                    <div id="porformaInvoicedataTable">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
	 		                        {{-- <li class="nav-item">
	 		                            <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_4_1_tab_content" role="tab">
	 		                                <i class="flaticon-notes" aria-hidden="true"></i>Audit
	 		                            </a>
	 		                        </li> --}}
	 		                        <li class="nav-item">
	 		                            <a class="nav-link active" data-toggle="tab" href="#quote_mail_tab" role="tab">
	 		                                <i class="flaticon-comment" aria-hidden="true"></i>Email Log
	 		                            </a>
	 		                        </li>
			                    </ul>
			                </div>
			            </div>
			            <div class="kt-portlet__body py-0 px-3">                   
			                <div class="tab-content">
	 		                    <div class="tab-pane " id="kt_portlet_base_demo_4_1_tab_content" role="tabpanel">
                                    <div class="tab-pane mt-10" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                            <div id="invoicedataTable" class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" style="">
                                                <table class="kt-datatable__table" style="display: block; min-height: 500px;">
                                                    <thead class="kt-datatable__head">
                                                        <tr class="kt-datatable__row" style="left: 0px;">
                                                            <th data-field="#" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 20px;">#</span>
                                                            </th>
                                                            <th data-field="created_at" class="kt-datatable__cell kt-datatable__cell--sort kt-datatable__cell--sorted" data-sort="desc">
                                                                <span style="width: 70px;">Date<i class="flaticon2-arrow-down"></i></span>
                                                            </th>
                                                            <th data-field="customer_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 200px;">Activity</span>
                                                            </th>
                                                            <th data-field="Actions" class="pr-0 kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--sort">
                                                                <span style="width: 80px;">Actions</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-datatable__body" style="">
                                                            <?php $i = 1; ?>
                                                            @foreach([] as $audit)
                                                            @if($audit->type == "created_address")
                                                            @continue
                                                            @endif
                                                            @if($quote->pickup_addr_id == $audit->table_id 
                                                                || $quote->shipping_addr_id == $audit->table_id
                                                                || $quote->id == $audit->table_id)
                                                                {{-- || $quote->payments->id == $audit->table_id) --}}
                                                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                                    <td data-field="#" class="kt-datatable__cell">
                                                                    <span style="width: 20px;">{{$i}}</span>
                                                                    </td>
                                                                    <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="created_at">
                                                                        <span style="width: 70px;">{{format_to_us_date($audit->created_at)}}</span>
                                                                    </td>
                                                                    @if($quote->pickup_addr_id == $audit->table_id)
                                                                        <td data-field="customer_name" class="kt-datatable__cell">
                                                                            <span style="width: 200px;">Updated Pickup Address</span>
                                                                        </td>
                                                                    @elseif($quote->shipping_addr_id == $audit->table_id)
                                                                        <td data-field="customer_name" class="kt-datatable__cell">
                                                                            <span style="width: 200px;">Updated Moving Address</span>
                                                                        </td>
                                                                    @elseif($quote->id == $audit->table_id)
                                                                        @if($audit->activity == "created_order")
                                                                            <td data-field="customer_name" class="kt-datatable__cell">
                                                                                <span style="width: 200px;">Created Order Details</span>
                                                                            </td>
                                                                        @else
                                                                            <td data-field="customer_name" class="kt-datatable__cell">
                                                                                <span style="width: 200px;">Updated Order Details</span>
                                                                            </td>
                                                                        @endif
                                                                    @elseif($quote->payment->id == $audit->table_id)
                                                                        <td data-field="customer_name" class="kt-datatable__cell">
                                                                            <span style="width: 200px;">Made Payment</span>
                                                                        </td>
                                                                    @endif
                                                                    <td class="kt-datatable__cell--center pr-0 kt-datatable__cell" data-field="Actions">
                                                                        <span style="overflow: visible; position: relative; width: 80px;">
                                                                        <a data-route="/admin/order/audit/detail/{{$audit->id}}" class="btn btn-hover-brand btn-icon btn-pill viewAudit"><i title="Add Item" class="la la-eye"></i></a>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                            @endif
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
	 		                    </div>
	 		                    <div class="tab-pane active" id="quote_mail_tab" role="tabpanel">
                                        <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm mb-10 mt-10 sendMailTo"><i class="la la-mail"></i>
                                            Send Mail
                                        </a>
                                        @include('supportNew.pages.quote.inc.mail_log')
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
    var orderItemsTable = $('#orderItemDatatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/quotes/orderItems/{{$quote->id}}',
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
                                        <img alt="photo" src="${row.product.thumb?"/admin/products/image/"+row.product.thumb.file_name:"images/no-image.png"}" style="height: 40px; width: 40px; object-fit: cover; border-radius:0;">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <a class="kt-user-card-v2__name" href="#">${row.product.name}</a>
                                        <span class="kt-user-card-v2__desc">${row.product.code}</span>
                                    </div>
                                </div>
                           
                    `;
                },

            },
            {
                // sortable: true,
                field: 'actual_price',
                title: 'Price',
                width:80,
            },
            {
                // sortable: true,
                field: 'total_quantity',
                title: 'Items',
                width:80,

            },
            {
                // sortable: true,
                field: 'estimate_price',
                title: 'Total ($)',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.estimate_price).toFixed(2);
                },
            },
            // {
            //     // sortable: true,
            //     field: 'delivery_date',
            //     title: 'Delivery Date',
            //     width:120,
            //     template: function(row, index, datatable) {
            //         return moment(row.delivery_date).format("{{settingsValue('dateFormat')}}");
            //     },
            // },
            // {
            //     // sortable: true,
            //     field: 'pickup_date',
            //     title: 'Pickup Date',
            //     width:120,
            //     template: function(row, index, datatable) {
            //         return moment(row.pickup_date).format("{{settingsValue('dateFormat')}}");
            //     },
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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.product_id+'"><i class="la la-eye" title="view Item"></i></a>';
                },
            },
        ],
	});

    var invoiceTable = $('#porformaInvoicedataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/quotes/invoice/{{$quote->id}}',
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
                    return moment(row.created_at).format("{{settingsValue('dateFormat')}}");
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
                title: 'Customer',
                width:150,
                template: function(row, index, datatable) {
                    if(row.client){
                        if(row.client.mname){
                            return row.client.fname + ' '+ row.client.mname+' '+ row.client.lname;
                        }else{
                            return row.client.fname + ' '+ row.client.lname;
                        }
                    }
                    else{
                        return row.company.c_name;
                    }
                }

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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

    });

    $(document).off('click', '.sendMailTo').on('click', '.sendMailTo', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/quotes/compose/{{$quote->id}}`,
        });
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
            url: $(this).data('route')
        });
    })
    
    $(document).off('click', '#add_order_items_quot').on('click', '#add_order_items_quot', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/quotes/addOrderItems/{{$quote->id}}",
            c:1
        });
    });
    
    $(document).off('click', '#make_performa_invoice').on('click', '#make_performa_invoice', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/quotes/makePerformaInvoice/{{$quote->id}}",
            c:1
        });
    });
    
    $(document).off('click', '#make_payment').on('click', '#make_payment', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let balance = $(this).attr('data-balance');
        showModal({
            url: "/admin/order/payment/{{$quote->id}}?balance="+balance,
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
            url: "/admin/order/pickupOrderItems/{{$quote->id}}",
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
        console.log(status);
        showModal({
            url: "/admin/order/status/{{$quote->id}}?status="+status,
        });
    });

    // Convert to Booking
    $(document).off('click', '#convert_to_boking').on('click', '#convert_to_boking', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        let check_inv = $(this).attr('data-check-inv');
        console.log(check_inv);
        if(check_inv == 1){
            $.ajax({
                method: "get",
                url: "/admin/quotes/checkInvoice/"+id,
                data: {},
                // beforeSend: function () {
                //     $("#kt_body").html(cssload);
                // },
                success: function (response, status, xhr) {
                    if(response.available == true){
                        showModal({
                            url:`/admin/quotes/makeOrder/${id}`,
                            c: 1
                        });
                    }
                    else{
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) { }
            });
        }
        else{
            toastr.error('Please create a performa invoice first to convert quote!');
        }
    });

    // PDF
    $(document).off('click', '.exportQuoteDetailTo').on('click', '.exportQuoteDetailTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/export/quoteDetail/' + $(this).attr('data-export-to')+'?quote='+$(this).attr('data-id'))
    });
   
    $(document).off('click', '.send_quote_mail_detail').on('click', '.send_quote_mail_detail', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/quotes/compose/{{$quote->id}}?pdf=true",
        });
    });

    $(document).off('click', '.exportOrderDetailTo').on('click', '.exportOrderDetailTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/export/orderDetail/' + $(this).attr('data-export-to')+'?order='+$(this).attr('data-id'))
    });

    // $(document).off('click', '#delete_order').on('click', '#delete_order', function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     confirmAction({
    //         btn: 'btn-danger',
    //         action: 'Delete',
    //         message: '<i class="la la-trash text-danger display-4"></i> <br> <br> Are you sure you want to delete this Order ?'
    //     }, function () {
    //         $.post("/admin/order/delete/{{$quote->id}}", {
    //             _token: $('meta[name="csrf-token"]').attr('content')
    //         }).then(function (response) {
    //             $.ajax({
    //                 method: "get",
    //                 url: "/admin/order",
    //                 data: {},
    //                 beforeSend: function () {
    //                     $("#kt_body").html(cssload);
    //                 },
    //                 success: function (response, status, xhr) {
    //                     setTimeout(function () {
    //                         location.hash = url.replace(/^(#|\/)/, "");
    //                         $("#kt_body").html(response);
    //                     }, 200);
    //                 },
    //                 error: function (xhr, status, error) { }
    //             });
    //             toastr.success(response.message);
    //         }, function (err) {
    //             toastr.error('Failed To Delete!');
    //         });
    //     });
    // });

</script>