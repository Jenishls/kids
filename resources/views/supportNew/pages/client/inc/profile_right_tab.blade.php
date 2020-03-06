<style>
    .fileTitle{
        padding-bottom: 3px;
        border-bottom: 1px dashed #fb397a;
    }
</style>
<div class="col-xl-8">
    <!--Begin:: Portlet-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_1" role="tab" aria-selected="false">
                            <i class="flaticon2-shopping-cart"></i>Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#custom_payment_card_tab" role="tab" aria-selected="false">
                            <i class="flaticon2-shopping-cart"></i>Payment Cards
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="paymentTab" data-toggle="tab" href="#kt_apps_contacts_view_tab_2" role="tab" aria-selected="false">
                            <i class="flaticon-truck"></i> Payment History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3" role="tab" aria-selected="false">
                            <i class="flaticon-attachment"></i>  Attachments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_4" role="tab" aria-selected="true">
                            <i class="flaticon2-time"></i> Activities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_5" role="tab" aria-selected="true">
                            <i class="flaticon-comment"></i> Reviews
                        </a>
                    </li>
                   {{--  <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_6" role="tab" aria-selected="true">
                            <i class="flaticon-bell"></i> Notifications
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body" style="min-height:770px;">
            <div class="tab-content">
                <!--Begin:: Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                    {{-- {{dd($client->orders)}} --}}
                            <div id="client_orders_table" data-id="{{$client->id}}">
                                <div class="alert alert-light alert-elevate search_top_container" role="alert">
                                    <div class="alert-text">
                                        <div class="row">
                                            <div class="col-xl-11 order-1 order-xl-1 serach_col orders_search_col ordersSearchCol">
                                                <div class="form-group m-form__group row align-items-center ">
                                                    <div class="input-group input-group-sm userInputGroup mr-3" style="width: 200px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                                                        </div>
                                                        <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="statusSearch" autocomplete="off" name="status">
                                                    </div>
                                                    <div class="input-group input-group-sm userInputGroup mr-3" style="width: 220px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Ordered Date</span>
                                                        </div>
                                                        <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="order_date" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="orderDateSearch">
                                                    </div>
                                                    <div class="input-group input-group-sm userInputGroup mr-3" style="width: 220px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">Delivery Date</span>
                                                        </div>
                                                        <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="deliverDateSearch" autocomplete="off" name="pickup_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rp_btn col-xl-1 order-1 order-xl-1" style="display:inline-flex;">
                                                <div class="dropdown dropdown-inline exportBtn">
                                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-152px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__section kt-nav__section--first">
                                                                <span class="kt-nav__section-text">Choose an option</span>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                                    <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                                    <span class="kt-nav__link-text exportTo" data-export-to="pdf">PDF</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- @else
                        <h6 class="text-center">No previous orders</h6>
                    @endif --}}
                </div>
                <div class="tab-pane" id="custom_payment_card_tab" role="tabpanel">
                    @include('supportNew.pages.client.inc.payment_cards')
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <style>
                        .search_top_container{
                            margin-top:10px!important;
                        }
                    </style>
                    <div id="paymentdataTable">
                        <div class="alert alert-light alert-elevate search_top_container" style="border-bottom: none;padding: 0.75rem 1.25rem;" role="alert">
                            <div class="alert-text">
                                <div class="row">
                                    <div class="col-xl-10 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                                        <div class="form-group m-form__group row align-items-center ">
                                            <div class="input-group mr-3 input-group-sm userInputGroup" style="width:300px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Transaction Id</span>
                                                </div>
                                                <input type="text" class="form-control basic--search" aria-label="Sizing example input"  placeholder="search.." autocomplete="off" name="transaction_id" maxlength="10">
                                            </div>
                                            <div class="input-group mr-3 input-group-sm userInputGroup" style="width:200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Order #</span>
                                                </div>
                                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="order_no" maxlength='10'>
                                            </div>
                                            <div class="input-group mr-3 input-group-sm userInputGroup" style="width:200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Payment Date</span>
                                                </div>
                                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="payment_date" maxlength='10'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rp_btn col-xl-1 order-1 order-xl-1" style="display:inline-flex;">
                                        <div class="dropdown dropdown-inline exportBtn">
                                            <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Choose an option</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                            <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                            <span class="kt-nav__link-text exportTo" data-export-to="pdf">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <span>Currently not available</span> --}}
                    {{-- endforeach --}}
                </div>
                <!--End:: Tab Content-->


                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
                    <div class="clientNoteAdd" id="addClientAttahment" data-id="{{$client->id}}">
                        <button type="" class="btn btn-sm btn-pill btn-primary pull-right">
                            <i class="la la-plus"></i>
                            File
                        </button>
                    </div>
                    <div class="kt-section">
                        <div class="kt-section__content">
                            @if (count($client->attachments)>0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client->attachments as $attachment)
                                    <tr>
                                        <th style="font-weight:100;">{{format_to_us_date($attachment->created_at)}}</th>
                                        <td data-container="body" data-toggle="kt-popover" data-placement="top" data-content="Click to change title" data-original-title="" title="" aria-describedby="popover787089" style="cursor:pointer;width:40%;">
                                            {{-- {{$attachment->type}} --}}
                                           <div class="fileTitleChange" data-id="{{$attachment->id}}"><span class="fileTitle" >{{$attachment->title ?: 'Title not set'}}</span> </div>
                                        </td>
                                        <td>
                                            <span style="overflow: visible; position: relative;">
                                                <a title="Download file" data-route="/admin/client/attachment/download/{{$attachment->file_name}}" data-file="{{$attachment->file_name}}" class="btn btn-hover-brand btn-icon btn-pill downloadFile">
                                                    <i class="la la-download"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <span>No attachments available</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!--End:: Tab Content-->
                 <!--Begin:: Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_4" role="tabpanel">
                    <h6 class="text-center">We are currently working on this feature.</h6>
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_5" role="tabpanel">
                    <h6 class="text-center">We are currently working on this feature.</h6>
                </div>
                <!--End:: Tab Content-->
                <!--Begin:: Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_6" role="tabpanel">
                    <div class="kt-portlet">
                        
                        <div class="kt-portlet__body">
                            <!--begin::Timeline 1-->
                            <div class="kt-list-timeline">
                                <div class="kt-list-timeline__items">
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                        <span class="kt-list-timeline__text">12 new users registered and pending for activation</span>
                                        <span class="kt-list-timeline__time">Just now</span>
                                    </div>
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--danger"></span>
                                        <span class="kt-list-timeline__text">Scheduled system reboot completed <span class="kt-badge kt-badge--success kt-badge--inline">completed</span></span>
                                        <span class="kt-list-timeline__time">14 mins</span>
                                    </div>
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--warning"></span>
                                        <span class="kt-list-timeline__text">New order has been planced and pending for processing</span>
                                        <span class="kt-list-timeline__time">20 mins</span>
                                    </div>
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--primary"></span>
                                        <span class="kt-list-timeline__text">Database server overloaded 80% and requires quick reboot <span class="kt-badge kt-badge--info kt-badge--inline">settled</span></span>
                                        <span class="kt-list-timeline__time">1 hr</span>
                                    </div>
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--brand"></span>
                                        <span class="kt-list-timeline__text">System error occured and hard drive has been shutdown - <a href="#" class="kt-link">Check</a></span>
                                        <span class="kt-list-timeline__time">2 hrs</span>
                                    </div>
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                        <span class="kt-list-timeline__text">Production server is rebooting...</span>
                                        <span class="kt-list-timeline__time">3 hrs</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Timeline 1-->
                        </div>
                    </div>
                </div>
                <!--End:: Tab Content-->
            </div>
        </div>
    </div>
</div>
<script>
    var client_id = $('#client_orders_table').attr('data-id');
    $(document).ready(function() {
        var clientOrders = $('#client_orders_table').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: `/admin/client/orders/${client_id}/list`,
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
            // layout definition
            layout: {
                scroll: true,
                footer: false,
                height: 573
            },
            // column sorting
            sortable: true,
            pagination: true,
            // columns definition
            columns: [
                {
                    field: 'created_at',
                    title: 'Ordered Date',
                    width: 100,
                    template: function(row, index, datatable) {
                        if(row.created_at){
                            return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                        }
                    }
                },
                {
                    field: 'order_no',
                    title: 'Order No.',
                    width: 100
                },{
                    field: 'order_status',
                    title: 'Status',
                    width: 100,
                    template: function(row) {
                        if(row.order_status){
                            var status = {
                            'shipped': {'title': 'Shipped', 'class': 'kt-badge--success'},
                            'pending': {'title': 'Pending', 'class': ' kt-badge--warning'},
                            'delivered': {'title': 'Pending', 'class': ' kt-badge--info'},
                            'cancelled': {'title': 'Cancelled', 'class': ' kt-badge--danger'},
                            'return': {'title': 'Return', 'class': ' kt-badge--primary'},
                            };
                            return '<span class="kt-badge ' + status[row.order_status].class + ' kt-badge--inline kt-badge--pill">' + status[row.order_status].title + '</span>';
                        }
                    },
                }
                ,{
                    field: 'pickup_date',
                    title: 'Delivery Date',
                    template: function(row, index, datatable) {
                        if(row.pickup_date){
                            return moment(row.pickup_date).format("{{settingsValue('momentDateFormat')}}");
                        }
                    }
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    overflow: 'visible',
                    textAlign: 'center',
                    template: function(row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '<a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-backurl="/admin/client/clientProfile/'+row.client_id+'" onclick="event.preventDefault();" data-route="/admin/order/detail/'+row.id+'"><i class="la la-eye" title="View order"></i></a>';
                    },
                }
            ],
        });
        $(".dropdown-toggle").dropdown();
        
        var clientOrdersSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                clientOrders.setDataSourceParam("query", {});
            } else {
                let sanitized = clientOrders.getDataSourceQuery('query');
                if (sanitized.advanced) delete sanitized.advanced;
                clientOrders.setDataSourceParam("query", sanitized);
            }
            typeof cb === "function" ? cb() : '';
        }
       


        
    });
    (() => {
            let currentTimeout = '';
            $('#client_orders_table .basic--search').off('blur keyup').on('blur keyup', function(e) {
                if($(this).val().length > 2 || $(this).val().length == 0)
                {
                    clearInterval(currentTimeout)
                    currentTimeout = setTimeout(() => {
                        clientOrdersSearch(false, () => {
                            clientOrders.search($(this).val(), $(this).attr('name'));
                        }); 
                    }, 1500);

                }
            });
        })();

    var initPopover = function(el) {
        var skin = el.data('skin') ? 'popover-' + el.data('skin') : '';
        var triggerValue = el.data('trigger') ? el.data('trigger') : 'hover';

        el.popover({
            trigger: triggerValue,
            template: '\
            <div class="popover ' + skin + '" role="tooltip">\
                <div class="arrow"></div>\
                <h3 class="popover-header"></h3>\
                <div class="popover-body"></div>\
            </div>'
        });
    }

    $('[data-toggle="kt-popover"]').each(function() {
        initPopover($(this));
    });

    $(document).off('click', '.fileTitleChange').on('click', '.fileTitleChange', function(e){
        let id = $(this).attr('data-id');
        let current = $(this).children('span').html();
        let html = `<div class="input-group" style="width:80%!important;">
            <input type="text" name="newFileTitle" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-success changeTitle" type="button" data-id="${id}">Ok</button>
                <button class="btn btn-secondary cancelChange" type="button" data-prev="${current}" data-id="${id}"><i class="flaticon-cancel"></i></button>
            </div>
        </div>`;
        $(this).closest('td').html(html);
        $(document).find('input[name=newFileTitle]').focus();
    });
    $(document).off('click', '.changeTitle').on('click', '.changeTitle', function(e){
        let title = $('input[name=newFileTitle]').val();
        let id = $(this).attr('data-id');
        let el = $(this);
        supportAjax({
            url: `/admin/client/filetitle/${id}/${title}`
        },function(resp){
            toastr.success('File title changed.');
            let html = `<div class="fileTitleChange" data-id="${resp.id}"> <span class="fileTitle">${resp.title}<span></div>`;
            el.closest('td').empty().append(html);
        },function(err){
            toastr.error('Sorry. title could not be changed.');
        });
    });
    $(document).off('click', '.cancelChange').on('click', '.cancelChange', function(e){
        let id = $(this).attr('data-id');
        let title = $(this).attr('data-prev');
        let html = `<div class="fileTitleChange" data-id="${id}"> <span class="fileTitle">${title}<span></div>`;
        $(this).closest('td').empty().append(html);
    });
    $('.viewFile').click(function(e){
        e.preventDefault();
        var filename = $(this).attr('data-route');
    });
    $(document).off('click', '.downloadFile').on('click', '.downloadFile', function(e){
        e.preventDefault();
        let filename = $(this).attr('data-file');
         $(`<a href="/admin/client/download/${filename}" download="" />`)[0].click();
    });

    $(document).off('click', '#addClientAttahment').on('click', '#addClientAttahment', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/client/addfiles/${id}`,
        })
    })

    var paymentsTable = $('#paymentdataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/client/payment/{{$client->id}}',
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
                field: 'created_at',
                title: 'Payment Date',
                type: 'text',
                width: 120,
                template:function(row)
                {
                    if(row.created_at){
                        return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                    }
                    return '-';
                }
            },
            {
                field: 'transaction_id',
                title: 'Transaction',
                type: 'text',
                width: 90,
            },
            {
                field: 'ref_no',
                title: 'Reference #',
                type: 'text',
                width: 90,
                template:function(row)
                {
                    if(row.ref_no)
                    {
                        return row.ref_no
                    }
                    return '-';
                }
                
            },
            {
                field: 'order.order_no',
                title: 'Order #',
                type: 'text',
                width: 80,
            },
            {
                field: 'cr_last4',
                title: 'Last Digits',
                type: 'text',
                width: 80,
            },
            {
                field: 'amount',
                title: 'Amount ($)',
                type: 'text',
                textAlign: 'center',
                width:80,
                template: function(row, index, datatable) {
                    return Number(row.amount).toFixed(2);
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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="Add Item"></i></a>';
                },
            }
        ],

    });
    paymentsTable.on('kt-datatable--on-init', function() {
        $('[data-toggle="kt-tooltip"]').tooltip();
    });
    var paymentsTableSearch = (advanced = false, cb = "default cb") => {
        if (advanced) {
            paymentsTable.setDataSourceParam("query", {});
        } else {
            let sanitized = paymentsTable.getDataSourceQuery('query');
            if (sanitized.advanced) delete sanitized.advanced;
            paymentsTable.setDataSourceParam("query", sanitized);
        }
        typeof cb === "function" ? cb() : '';
    }
    (() => {
        let currentTimeout = '';
        $('#paymentdataTable .basic--search').off('blur keyup').on('blur keyup', function(e) {
                clearInterval(currentTimeout)
                currentTimeout = setTimeout(() => {
                    paymentsTableSearch(false, () => {
                        paymentsTable.search($(this).val(), $(this).attr('name'));
                    }); 
                }, 1500);
        });
    })();
    $('[name="order_date"],[name="pickup_date"]').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start_date, end_date) {
            this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
        });
        $('[name="payment_date"]').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start_date, end_date) {
            this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
        });
</script>		