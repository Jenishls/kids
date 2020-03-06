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
                    Campaign
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link pageload pointer">{{$campaign->name}}</a>
                </div>
                <div class="back_temp ml-auto" style="width: 94px;">
                        <a class="kt-menu__link pageload backBtn" onclick="event.preventDefault();" data-route="/admin/campaign">
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
        <div class="col-md-7">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div class="kt-portlet">
                    <div class="kt-portlet__head" style="min-height: 45px;">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class=" la la-bullhorn"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Campaign Summary
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-actions">
                                    <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm editCamp" data-route="/admin/campaign/edit/{{$campaign->id}}"><i class="la la-edit"></i>
                                        Campaign
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="padding-bottom: 0px !important; padding-top: 10px !important;">
                        <div class="kt-widget__content row">
                            <div class="col-md-6 no-padding" >
                                <div class="kt-widget13 order-des order-summary-container" >
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Campaign Name
                                        </span>
                                        <span class="kt-widget13__text">
                                            <strong class="text-black" style=" color: #434349" id="span_name">
                                                {{$campaign->name?ucfirst(str_limit($campaign->name, 15)):""}}			 
                                            </strong>
                                        </span>
                                    </div>

                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            No. of Activites
                                        </span>
                                        <span class="kt-widget13__text" id="span_phone">
                                            {{$campaign->activities->count()}}
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Budget
                                        </span>
                                        <span class="kt-widget13__text" id="span_phone">
                                            @if($campaign->budget)
                                            ${{number_format((float)preg_replace("/[^0-9.]/", "", $campaign->budget), 2, '.', '')}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Conversion
                                        </span>
                                        <span class="kt-widget13__text" id="span_phone">
                                            @if($campaign->budget)
                                            ${{number_format((float)preg_replace("/[^0-9.]/", "", $campaign->budget), 2, '.', '')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 no-padding">
                                <div class="kt-widget13 order-des order-summary-container" >
                                        <div class="kt-widget13__item">
                                            <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                                    Status
                                            </span>
                                            <span class="kt-widget13__text" id="span_status">
                                                @if($campaign->is_active)
                                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer " data-id="{{$campaign->id}}">Active</span>
                                                @else
                                                    <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer " data-id="{{$campaign->id}}" >Inactive</span>
                                                @endif
                                                <div class="dropdown dropdown-inline">
                                                    <button type="button" class="btn btn-hover-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                                        <a class="dropdown-item pointer update_status" data-status="active"> Active</a>
                                                        <a class="dropdown-item pointer update_status" data-status="inactive"> Inactive</a>
                                                    </div>
                                                </div>		 
                                            </span>
                                        </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            Start Date
                                        </span>
                                        <span class="kt-widget13__text" id="span_sales_rep">
                                                @if ($campaign->start_date)
                                                   {{format_to_us_date($campaign->start_date)}}
                                                @else
                                                    -  					 
                                                @endif					 
                                        </span>
                                    </div>
                                    <div class="kt-widget13__item">
                                        <span class="kt-widget13__desc kt-widget13__text--bold kt-widget13__text">
                                            End Date
                                        </span>
                                        <span class="kt-widget13__text" id="span_pickup_by">
                                            @if ($campaign->end_date)
                                                {{format_to_us_date($campaign->end_date)}}
                                            @else
                                                -  					 
                                            @endif				 
                                        </span>
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
                                <i class="flaticon-add"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Activites
                            </h3>
                        </div>
                        <div class="kt-subheader__wrapper" style="padding-top: 8px;">
                            <a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill waves-effect waves-light btn-sm" id="add_c_activites"><i class="la la-plus"></i>
                                Activities
                            </a>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit p-4">
                        <div id="t_activites"></div>
                    </div>
                </div>
                		
            </div>
        </div>
        <div class="col-md-5">
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
                                        Semd Mail
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
    <div class="row">
        <div class="col-md-7">
           @include('supportNew.pages.campaign.suppliers.datatable')
        </div>
        <div class="col-md-5">
           @include('supportNew.pages.campaign.assets.datatable')
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

    var activitiesTable = $('#t_activites').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/campaign/activites/list/{{$campaign->id}}',
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
                // sortable: true,
                field: 'name',
                title: 'Activity Name',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <a class="kt-user-card-v2__name" href="#">${truncate(row.name,12)}</a>
                                        <span class="kt-user-card-v2__desc">${row.campaign?row.campaign.campaign_code:''}</span>
                                    </div>
                                </div>
                    `;
                },

            },
            {
                // sortable: true,
                field: 'type',
                title: 'Type',
                width:80,
            },
            {
                // sortable: true,
                field: 'budget',
                title: 'Budget ($)',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.budget).toFixed(2);
                },
            },
            {
                // sortable: true,
                field: 'start_date',
                title: 'Start Date',
                width:80,
                template: function(row, index, datatable) {
                    return moment(row.start_date).format("{{settingsValue('momentDateFormat')}}");
                },
            },
            {
                // sortable: true,
                field: 'end_date',
                title: 'End Date',
                width:80,
                template: function(row, index, datatable) {
                    return moment(row.start_date).format("{{settingsValue('momentDateFormat')}}");
                },
            },
            {
                // sortable: true,
                field: 'conversion',
                title: 'Conversion($)',
                width:80,
                template: function(row, index, datatable) {
                    return '224.00';
                },
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
				textAlign: 'center',
                class: 'pr-0',
                width:130,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return `
                        <a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-callback="active_current_row" data-backurl="/admin/campaign/view/${row.campaign_id}" data-route="/admin/campaign/activity/${row.id}">
                            <i class="la la-eye" title="view Item"></i>
                        </a>
                        <a class="btn btn-hover-brand btn-default btn-icon btn-pill" data-route="/admin/campaign/activites/edit/${row.id}" style="border:none;">
                            <i class="la la-edit" title="view Item"></i>
                        </a>
                        <a class="btn btn-hover-brand btn-default btn-icon btn-pill" data-route="/admin/campaign/activites/sdelete/${row.id}" style="border:none;">
                            <i class="la la-trash" title="view Item"></i>
                        </a>`;
                },
            },
        ],
	});
    
   
</script>