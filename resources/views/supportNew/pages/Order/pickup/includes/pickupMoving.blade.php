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
                                                            <input type="text" class="form-control kt-input dateRangePicker pickup_date" name="return_date" data-col-index="4" autocomplete="off">
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
                            {{-- <div class="col-md-2 col-sm-2" style="width: 20%; max-width: 20%; flex: 0 0 20.66667%;">
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
        
                            </div> --}}
                            <div class="col-md-4 col-sm-4">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <select name="type_filter" id="pickup_filter">
                                        <option value="return_date_single" selected >Pickup Date</option>
                                        <option value="moving_date_single">Delivery Date</option>
                                        <option value="both">Both</option>
                                    </select>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="return_date" autocomplete="off" name="moving_date" style="height: 37px;">
                                </div>
        
                            </div>
                            {{-- <div class="col-md-2 col-sm-2">
                                <div class="input-group mb-3 input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Return Date</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="return_date" autocomplete="off" name="return_date">
                                </div>
        
                            </div> --}}

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
                                        <a class="kt-nav__link pointer">
                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                            <span class="kt-nav__link-text exportOrderPickupTo" data-export-to="csv">CSV</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a class="kt-nav__link pointer">
                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                            <span class="kt-nav__link-text exportOrderPickupTo" data-export-to="pdf">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div id="pickupMovingDataTable" style="padding: 25px;"></div>
        
            </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e){
        loadCookies('pickupMovingTable.query', '.user_search_row');
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = today.getFullYear();

        today =  yyyy + "-"+ mm + '-' + dd;
        let query = {
            "post_by" : "all"
        };
        let filters = Cookies.get('pickupMovingTable.query');
        try {
            Object.assign(query, JSON.parse(filters));
        } catch (error) {}

        var pickupMovingTable = $('#pickupMovingDataTable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/admin/order/pickup/data',
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
                // {
                //     // sortable: true,
                //     field: 'created_at',
                //     title: 'Date',
                //     width: 70,
                //     template: function(row, index, datatable) {
                //         return moment(row.created_at).format('MM/DD/YYYY');
                //     },

                // },
                {
                    // sortable: true,
                    field: 'order_no',
                    title: 'Order #',
                    width: 110,

                },
                {
                    sortable: true,
                    field: 'customer_name',
                    title: 'Customer',
                    width: 170,
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
                
                // {
                //     // sortable: true,
                //     field: 'amount',
                //     title: 'Invoice ($)',
                //     width: 80,

                // },

                {
                    // sortable: true,
                    field: 'delivery_date',
                    title: 'Delivery Date',
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
                    title: 'Pickup Date',
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
                    field: 'package.package_name',
                    title: 'Package',
                    type: 'text',
                    width: 130,
                },
                {
                    sortable: true,
                    field: 'delivery_note',
                    title: 'Delivery Note',
                    type: 'text',
                    width: 130,
                },
                {
                    sortable: true,
                    field: 'pickup_note',
                    title: 'Pickup Note',
                    type: 'text',
                    width: 130,
                },
                // {
                //     sortable: true,
                //     field: 'order_status',
                //     title: 'Status',
                //     type: 'text',
                //     width: 100,
                //     template(row){
                //         if(row.order_status == "confirmed"){
                //             return `<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Confirmed</span>`;
                //         }
                //         else if(row.order_status == "delivered"){
                //             return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer" data-id="${row.id}" >Delivered</span>`;
                //         }
                //         else if(row.order_status == "closed"){
                //             return `<span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Closed</span>`;
                //         }
                //         else if(row.order_status == "deleted"){
                //             return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer" data-id="${row.id}">Deleted</span>`;
                //         }
                //         else if(row.order_status == "picked_up"){
                //             return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer"  style="background: #48cfbd; color: #fff;" data-id="${row.id}">Picked Up</span>`;
                //         }
                //         else if(row.order_status == "converted"){
                //             return `<span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill pointer"  style="background: #48cfbd; color: #fff;" data-id="${row.id}">Converted</span>`;
                //         }
                //         return `<span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer" data-id="${row.id}" >Pending</span>`;
                //     }
                // },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    overflow: 'visible',
                    textAlign: 'right',
                    width: 130,
                    template: function(row, index, datatable) {
                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '<a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-callback="active_current_row" data-backurl="/admin/order/pickup" data-route="/admin/order/detail/'+row.id+'"><i class="la la-eye" title="View Product"></i></a>';
                    },
                }
            ],

        });

        $('.customer_phone input').focus(function(e){
            $('.userInputGroup').find('input').val('');
            pickupMovingTable.setDataSourceParam("query",{});
            $('#pickupMovingDataTable').KTDatatable().reload();
            localStorage.removeItem("pickupMovingDataTable-1-meta");
        });

        function loadCookies(cname, container) {
            try {
                const filters = JSON.parse(Cookies.get(cname));
                for(const [name, value] of Object.entries(filters)) {
                    const input = $(container + ' [name="'+ name +'"]');
                    if(!(input.length && value)) continue;
                    if(input.val(value).is('select')) {
                        input.selectpicker('refresh');
                    }
                }
            } catch (error) {}
        }

        var basicSearchPickup = (advanced = false, cb = "default cb") => {
            if (advanced) {
                pickupMovingTable.setDataSourceParam("query", {});
            } else {
                let sanitized = pickupMovingTable.getDataSourceQuery('query');

                if (sanitized.advanced) delete sanitized.advanced;
                pickupMovingTable.setDataSourceParam("query", sanitized);
            }
            typeof cb === "function" ? cb() : '';
        }

        $('#pickup_filter').selectpicker().on('change', function(e){
            let date = $('#return_date').val(); 
            basicSearchPickup(false, () => {
                pickupMovingTable.setDataSourceParam("query",{});
                pickupMovingTable.search(date, $(this).val());
            });
        });

        $('.basic--search').off('keyup').on('keyup', function(e) {
            if($(this).val().length > 2 || $(this).val().length ==0)
            {
                basicSearchPickup(false, () => {
                    pickupMovingTable.search($(this).val(), $(this).attr('name'));
                });	
            }
        });

        pickupMovingTable.on('kt-datatable--on-ajax-done', function() {
            Cookies.set('pickupMovingTable.query', JSON.stringify(pickupMovingTable.getDataSourceQuery()));
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
        
        $('#return_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        }).on('change', function(e){
            e.preventDefault();
            let type = $('#pickup_filter').val(); 
            basicSearchPickup(false, () => {
                pickupMovingTable.setDataSourceParam("query",{});
                pickupMovingTable.search($(this).val(), type);
            });
        });
        
        // $('#return_date').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        //     autoUpdateInput: true,
        //     minYear: 2001,
        //     maxYear: parseInt(moment().format('YYYY'),10)
        // }).on('change', function(e){
        //     e.preventDefault();
        //     basicSearchPickup(false, () => {
        //         pickupMovingTable.search($(this).val(), 'return_date_single');
        //     });
        // });

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
            basicSearchPickup(true, () => {
                pickupMovingTable.search(reducedData, "advanced");
            });
            $('#dropdownMenuLink').css({
                'background' : '#8b83f3',
            });
        });
        
        $('#reload_table').on('click', function(e) {
            e.preventDefault();
            $('.userInputGroup').find('input').val('');
            // localStorage.removeItem("pickupMovingDataTable-1-meta");
            pickupMovingTable.setDataSourceParam("query",{});
            $('#pickupMovingDataTable').KTDatatable().reload();
            localStorage.removeItem("pickupMovingDataTable-1-meta");
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
            basicSearchPickup(false, () => {
                pickupMovingTable.search($('#status_picker').val(), 'statuses');
            });	
        });			

        $(document).off('click', '.exportOrderPickupTo').on('click', '.exportOrderPickupTo', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const filters = JSON.parse(Cookies.get('pickupMovingTable.query'));
            let fil="";
            if(filters.moving_date_single){
                fil ='delivery_date='+filters.moving_date_single;
            }
            else if(filters.return_date_single){
                fil ='pickup_date='+filters.return_date_single;
            }
            else if(filters.both){
                fil ='both='+filters.both;
            }
            
            window.open('/export/order/pickup/' + $(this).attr('data-export-to')+'?'+fil);
            // let data = [{name : "pickup_date",value : filters.return_date_single},{name : "delivery_date",value : filters.moving_date_single},{name : "both",value : filters.both}];
            // $.ajax({
            //     url:'/export/order/pickup/' + $(this).attr('data-export-to'),
            //     data:data,
            //     success: function(response){
            //         toastr.success(response.message);
            //         // $('#packageDataTable').KTDatatable().reload(); 
            //     }, 
            //     error:function({status, responseJSON})
            //     {
            //     }
            // });
            
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
            loadCookies('pickupMovingTable.query', '#order_adv_form');
        });

        $('#adv_reset').off('click').on('click', function(e) {
            e.preventDefault();
            $('#order_adv_form').find('input').val('');
            $('#order_adv_form').find('select').val('');
            $("#package").select2("val", " ");
            $('#adv_status_picker').selectpicker("refresh")
            // localStorage.removeItem("pickupMovingDataTable-1-meta");
            // pickupMovingTable.setDataSourceParam("query",{});
            // $('#pickupMovingDataTable').KTDatatable().reload();
            // localStorage.removeItem("pickupMovingDataTable-1-meta");
        });
    })
</script>