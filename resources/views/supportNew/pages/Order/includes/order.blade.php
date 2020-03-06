<div class="row" id="package_container">
    <div class="col-md-12">
        <div  style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
                <div class="row user_search_row">
                    <div class="col-xl-11 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            <div class="accountFilterSearch">
                                <div class="dropdown accountAdvSearch">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                                    <!-- Advanced Search -->
                                    <div class="dropdown-menu userAdvSearchDropDown" id="adv_search_order">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
                                        <div>
                                            <form class="kt-form kt-form--fit" id="order_adv_form" autocomplete="off">
                                                @csrf
                                                <div class="bodyContent">
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Date</label>
                                                            <input type="text" name="order_date" class="form-control kt-input advSearchInput dateRangePicker"  data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Customer Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput"  name="customer_name" data-col-index="0" autocomplete="off">
                                                        </div>
        
                                                    </div>
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile customer_phone">
                                                            <label>Customer Phone</label>
                                                            <input type="text" name="customer_phone" class="form-control kt-input advSearchInput" data-col-index="1" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Order Number</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="order_no"  data-col-index="1" autocomplete="off">
                                                        </div>
        
                                                    </div>
        
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Moving date</label>
                                                            <input type="text" class="form-control kt-input dateRangePicker" name="moving_date" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Return date</label>
                                                            <input type="text" class="form-control kt-input dateRangePicker" name="return_date" data-col-index="4" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Package Name</label>
                                                            <select class="form-control" name="package_name" id="package">
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Status</label>
                                                            <select name="status" data-title="Select Status" id="adv_status_picker" multiple="">
                                                                <option value="confirmed" data-content="Confirmed">
                                                                    Confirmed
                                                                </option>
                                                                <option value="converted" data-content="Converted">
                                                                    Converted
                                                                </option>
                                                                <option value="deleted" data-content="Deleted">
                                                                    Deleted
                                                                </option>
                                                                <option value="delivered" data-content="Delivered">
                                                                    Delivered
                                                                </option>
                                                                <option value="pending" data-content="Pending">
                                                                    Pending
                                                                </option>
                                                                <option value="picked_up" data-content="Picked up">
                                                                    Picked up
                                                                </option>
                                                                <option value="closed" data-content="Closed">
                                                                    Closed
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row userAdvFooter" style="padding: 0.5rem 21px!important;">
                                                    <div class="footerLeftBtns">
                                                        <div>
                                                            <button type="button" class="btn btn-outline-danger btn-pill btn_p_p4rem" id="adv_close">
                                                                Close
                                                            </button>
                                                        </div>
                                                        <div class="advSearchResetBtn pl-2">
                                                            <button type="button" class="btn btn-outline-brand btn-pill btn_p_p4rem" id="adv_reset">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="advSearchResetBtn">
                                                        <button type="button" class="btn btn-outline-brand btn-pill adv_apply_btn btn_p_p4rem" id="advSearchBtn">Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="customer_name">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="customer_phone">
                                </div>
        
                            </div>
                            <div class="col-md-2 col-sm-2" style="width: 20%; max-width: 20%; flex: 0 0 20.66667%;">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                                    </div>
                                    <select data-title="Select Status" id="status_picker" multiple="">
                                        <option value="confirmed" data-content="Confirmed">
                                            Confirmed
                                        </option>
                                        <option value="converted" data-content="Converted">
                                            Converted
                                        </option>
                                        <option value="deleted" data-content="Deleted">
                                            Deleted
                                        </option>
                                        <option value="delivered" data-content="Delivered">
                                            Delivered
                                        </option>
                                        <option value="pending" data-content="Pending">
                                            Pending
                                        </option>
                                        <option value="picked_up" data-content="Picked up">
                                            Picked up
                                        </option>
                                        <option value="closed" data-content="Closed">
                                            Closed
                                        </option>
                                    </select>
                                </div>
        
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Moving Date</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="moving_date" autocomplete="off" name="moving_date">
                                </div>
        
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Return Date</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="return_date" autocomplete="off" name="return_date">
                                </div>
        
                            </div>

                            <div id="reload_table">
                                <i class="fas fa-redo searchRedo"></i>
                            </div>
        
                        </div>
                    </div>
                    <div class="rp_btn col-xl-1 order-1 order-xl-1" style="display:inline-flex;">
                        {{-- <div class="userTableReset">
                            <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userTableReload"><i class="fa fa-undo"></i></button>
                        </div> --}}
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
                                            <span class="kt-nav__link-text exportOrderTo" data-export-to="csv">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text exportOrderTo" data-export-to="pdf">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div id="orderDataTable" style="padding: 25px;"></div>
        
            </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e){
        loadCookies('ordersTable.query', '.user_search_row');
        let query = {
            "post_by" : "all"
        };
        let filters = Cookies.get('ordersTable.query');
        try {
            Object.assign(query, JSON.parse(filters));
        } catch (error) {}

        var ordersTable = $('#orderDataTable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/admin/order/data',
                        method: 'get',
                        params : {
                            query,
                            _token: '{{ csrf_token() }}'
                        },
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
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            rows:{
                afterTemplate: function(){
                    active_current_row()
                }
            },

            // columns definition
            columns: [
                {
                    field: '#',
                    title: '#',
                    width: 30,
                    sortable: false,
                    template: function(row, index, datatable) {
                        return index+1;
                    }

                },
                {
                    // sortable: true,
                    field: 'created_at',
                    title: 'Date',
                    width: 70,
                    template: function(row, index, datatable) {
                        return moment(row.created_at).format('MM/DD/YYYY');
                    },

                },
                {
                    // sortable: true,
                    field: 'order_no',
                    title: 'Order #',
                    width: 110,

                },
                {
                    sortable: true,
                    field: 'package.package_name',
                    title: 'Package',
                    type: 'text',
                    width: 130,
                },
                {
                    sortable: true,
                    field: 'customer_name',
                    title: 'Name',
                    width: 200,
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
                    field: 'client.phone_no',
                    title: 'Phone',
                    width: 100,

                },
                {
                    // sortable: true,
                    field: 'total_inv',
                    title: 'Invoice ($)',
                    width: 80,
                    template: function(row, index, datatable) {
                        let tax_amt = 0;
                        if(row.tax){
                            tax_amt = row.tax.tax_value/100 * row.total_inv;
                        }
                        return Number(row.total_inv + tax_amt).toFixed(2);
                    },
                },
                {
                    // sortable: true,
                    field: 'delivery_date',
                    title: 'Moving Date',
                    width: 130,
                    template: function(row, index, datatable) {
                        if(row.delivery_date){
                            return moment(row.delivery_date).format('MM/DD/YYYY');
                        }
                        else{
                            return "-";
                        }
                    },

                },
                {
                    // sortable: true,
                    field: 'pickup_date',
                    title: 'Return Date',
                    width: 130,
                    template: function(row, index, datatable) {
                        if(row.pickup_date){
                            return moment(row.pickup_date).format('MM/DD/YYYY');
                        }
                        else{
                            return "-";
                        }
                    },

                },
                {
                    sortable: true,
                    field: 'order_status',
                    title: 'Status',
                    type: 'text',
                    width: 100,
                    template(row){
                        if(row.order_status == "confirmed"){
                            return `<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Confirmed</span>`;
                        }
                        else if(row.order_status == "delivered"){
                            return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer" data-id="${row.id}" >Delivered</span>`;
                        }
                        else if(row.order_status == "closed"){
                            return `<span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Closed</span>`;
                        }
                        else if(row.order_status == "deleted"){
                            return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Deleted</span>`;
                        }
                        else if(row.order_status == "picked_up"){
                            return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer"  style="background: #48cfbd; color: #fff;" data-id="${row.id}">Picked Up</span>`;
                        }
                        else if(row.order_status == "converted"){
                            return `<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer"  style="background: #48cfbd; color: #fff;" data-id="${row.id}">Converted</span>`;
                        }
                        return `<span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer" data-id="${row.id}" >Pending</span>`;
                    }
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    overflow: 'visible',
                    textAlign: 'right',
                    width: 130,
                    template: function(row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-callback="active_current_row"  data-route="/admin/order/detail/'+row.id+'"><i class="la la-eye" title="View Product"></i></a>';
                    },
                }
            ],

        });

        $('.customer_phone input').focus(function(e){
            $('.userInputGroup').find('input').val('');
            ordersTable.setDataSourceParam("query",{});
            $('#orderDataTable').KTDatatable().reload();
            localStorage.removeItem("orderDataTable-1-meta");
        });

        function loadCookies(cname, container) {
            try {
                const filters = JSON.parse(Cookies.get(cname));
                for(const [name, value] of Object.entries(filters)) {
                    console.log(name, value);
                    const input = $(container + ' [name="'+ name +'"]');
                    console.log(input);
                    if(!(input.length && value)) continue;
                    if(input.val(value).is('select')) {
                        input.selectpicker('refresh');
                    }
                }
            } catch (error) {}
        }

        var basicSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                ordersTable.setDataSourceParam("query", {});
            } else {
                let sanitized = ordersTable.getDataSourceQuery('query');

                if (sanitized.advanced) delete sanitized.advanced;
                ordersTable.setDataSourceParam("query", sanitized);
            }
            typeof cb === "function" ? cb() : '';
        }

        $('.basic--search').off('keyup').on('keyup', function(e) {
            if($(this).val().length > 2 || $(this).val().length ==0)
            {
                basicSearch(false, () => {
                    ordersTable.search($(this).val(), $(this).attr('name'));
                });	
            }
        });

        ordersTable.on('kt-datatable--on-ajax-done', function() {
            Cookies.set('ordersTable.query', JSON.stringify(ordersTable.getDataSourceQuery()));
        });

        
        $('#package').select2({
            placeholder: 'Select Package',
            width: '100%',
            ajax: {
                method: 'POST',
                url: '/admin/order/package/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processResults: function(data) {
                    let res = [];
                    $.each(data, function(i, obj) {
                        res.push({
                            id: obj.package_name,
                            text: obj.package_name
                        });
                    });
                    return {
                        results: res
                    };
                }
            }
        });

        $('#moving_date').daterangepicker({
            buttonClasses: ' btn',
            autoUpdateInput: false,
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            locale: {
                format: 'MM/DD/YYYY',
                separator: '-',
            }
        }, function(start_date, end_date) {
            this.element.val(start_date.format('MM/DD/YYYY')+'-'+end_date.format('MM/DD/YYYY'));
            basicSearch(false, () => {
                ordersTable.search(start_date.format('MM/DD/YYYY') +"-"+ end_date.format('MM/DD/YYYY'), 'moving_date');
            });
        })
        
        $('#return_date').daterangepicker({
            buttonClasses: ' btn',
            autoUpdateInput: false,
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            locale: {
                format: 'MM/DD/YYYY',
                separator: '-',
            }
        }, function(start_date, end_date) {
            this.element.val(start_date.format('MM/DD/YYYY')+'-'+end_date.format('MM/DD/YYYY'));
            basicSearch(false, () => {
                ordersTable.search(start_date.format('MM/DD/YYYY') +"-"+ end_date.format('MM/DD/YYYY'), 'return_date');
            });
        })
    
        // advance search
        $('#advSearchBtn').on('click', function(e) {
            e.preventDefault();
            let data = $('#order_adv_form').serializeArray();
            data.push({ name: "statuses", value: $('#adv_status_picker').val() });
            let reducedData = data.reduce((acc, x) => {
                acc[x.name] = x.value;
                return acc;
            }, {})
            $('.userAdvSearchDropDown').removeClass('show');
            $('.dropdown-menu').removeClass('show');
            basicSearch(true, () => {
                ordersTable.search(reducedData, "advanced");
            });
            $('#dropdownMenuLink').css({
                'background' : '#8b83f3',
            });
        });
        
        $('#reload_table').on('click', function(e) {
            e.preventDefault();
            $('.userInputGroup').find('input').val('');
            // localStorage.removeItem("orderDataTable-1-meta");
            ordersTable.setDataSourceParam("query",{});
            $('#orderDataTable').KTDatatable().reload();
            localStorage.removeItem("orderDataTable-1-meta");
        });

        $('.dateRangePicker').daterangepicker({
            buttonClasses: ' btn',
            autoUpdateInput: false,
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            parentEl:$('#order_adv_form'),
            locale: {
                format: 'MM/DD/YYYY',
                separator: '-',
            }
        }, function(start_date, end_date) {
            this.element.val(start_date.format('MM/DD/YYYY')+'-'+end_date.format('MM/DD/YYYY'));
        });

        let initPicker = $('#status_picker').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            width: "100%",
            doneButton : true, 
            doneButtonText : "Apply",
        });
        
        $('#adv_status_picker').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            container: 'body',
            width: "100%",
        }).on('show.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            $('#adv_search_order').addClass('show');
        });

        $(document).off("click", ".bs-donebutton").on("click", ".bs-donebutton", function(e) {
            e.preventDefault();
            basicSearch(false, () => {
                ordersTable.search($('#status_picker').val(), 'statuses');
            });	
        });			

        $(document).off('click', '.exportOrderTo').on('click', '.exportOrderTo', function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.open('/export/order/' + $(this).attr('data-export-to'))
        });

        $(document).off('click', '#add_order').on('click', '#add_order', function(e) {
            e.preventDefault();
            e.stopPropagation();
            showModal({
                url: "admin/order/add",
                c:1,
            });
        })

        $(document).off('click','#adv_close').on('click','#adv_close', function(e){
            e.preventDefault();
            e.stopPropagation();
            // $('.userAdvSearchDropDown').dropdown('toggle');
            $('.userAdvSearchDropDown').removeClass('show');
            $('.dropdown-menu').removeClass('show');
        });
        $(document).off('click','#dropdownMenuLink').on('click','#dropdownMenuLink', function(e){
            e.preventDefault();
            // $('.userAdvSearchDropDown').dropdown('toggle');
            $('.userAdvSearchDropDown').toggleClass('show');
            $('.dropdown-menu').removeClass('show');
            loadCookies('ordersTable.query', '#order_adv_form');
        });

        $('#adv_reset').off('click').on('click', function(e) {
            e.preventDefault();
            $('#order_adv_form').find('input').val('');
            $('#order_adv_form').find('select').val('');
            $("#package").select2("val", " ");
            $('#adv_status_picker').selectpicker("refresh")
            // localStorage.removeItem("orderDataTable-1-meta");
            // ordersTable.setDataSourceParam("query",{});
            // $('#orderDataTable').KTDatatable().reload();
            // localStorage.removeItem("orderDataTable-1-meta");
        });
    })
</script>