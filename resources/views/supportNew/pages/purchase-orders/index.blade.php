<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Purchase Orders
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">ACCOUNTING</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Purchase Orders</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper" style="width:14%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addPurchaseOrder" ><i class="la la-plus"></i>
                Create Purchase Order
            </a>
        </div>
    </div>

    {{-- table --}}

    <div id="t_p_o_table">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col poSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            <div class="clientFilterSearch">
                                <div class="dropdown clientAdvSearch">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                                    <!-- Advanced Search -->
                                    <div class="dropdown-menu userAdvSearchDropDown">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust " style="right: auto; left: 33.5px;border-bottom: 5px solid #e8f8ff; "></span>
                                        <div>
                                            <form class="kt-form kt-form--fit" id="clientAdvSearchForm" autocomplete="off">
                                                @csrf
                                                <div class="bodyContent" style="background: #e8f8ff;">
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>PO#</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="po_number" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Vendor name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" placeholder="" name="vendor" data-col-index="0" autocomplete="off">
                                                        </div>
                                                       
                                                         <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Status</label>
                                                            <select class="form-control kt-input" name="statusSelect" data-col-index="7" id="statusFilter">
                                                                <option value="" selected="">Select a Status</option>
                                                                <option value="paid">Paid</option>
                                                                <option value="pending">Pending</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row kt-margin-b-20">
                                                         <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Ordered Date</label>
                                                            <input type="text" class="form-control kt-input advSearchInput dateSearch" name="created_at" placeholder="" data-col-index="1" autocomplete="off">
                                                        </div>
                                                       
                                                         <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Expiry Date</label>
                                                            <input type="text" class="form-control kt-input advSearchInput dateSearch" name="delivery_date" placeholder="" data-col-index="1" autocomplete="off">
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
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Vendor</span>
                                    </div>
                                    {{-- <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="supplier"> --}}
                                    <select name="supplierSelect" class="basic--search" id="supplierSelect">
                                        <option value="">Select</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{ucfirst($company->c_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                                    </div>
                                    {{-- <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="created_at" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="status"> --}}
                                     <select name="statusSelect" class="basic--search" id="statusSelect">
                                        <option value="">Select</option>
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Date Range</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="date_range" aria-describedby="inputGroup-sizing-default" id="dateSelect">
                                </div>
                            </div>
                            
                            <div>
                                <i class="fas fa-redo searchRedo"></i>
                            </div>

                        </div>
                    </div>
                    <div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
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
        <script>
            var P_O_Table = $('#t_p_o_table').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/purchaseorder/list',
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
                    scroll: false,
                    footer: false,
                },

                // column sorting
                sortable: true,

                pagination: true,


                // columns definition
                columns: [
                    {
                        field: '()',
                        title: 'Pay',
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                        width: 40,
                    },
                    {
                        field: 'po_number',
                        title: 'PO#',
                        width: 100,
                        // template: function(row, index, datatable) {
                        //     if(row.created_at)
                        //     {
                        //         return moment(row.created_at).format(' Do MMM , YYYY');
                        //     }
                        // }
                    },
                    {
                        field: 'created_at',
                        title: 'Created Date',
                        width: 100,
                        template: function(row, index, datatable) {
                            if(row.created_at)
                            {
                                return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                            }
                        }
                    },
                    // {
                    //     field: 'release_date',
                    //     title: 'Released Date',
                    //     width: 100,
                    //     template: function(row, index, datatable) {
                    //         if(row.release_date)
                    //         {
                    //             return moment(row.release_date).format(' Do MMM , YYYY');
                    //         }
                    //     }
                    // },
                    // {
                    //     field: 'requested_by',
                    //     title: 'Requested By',
                    //     template: function(row){
                    //         return row.requested_by.c_name;
                    //         // return 'Test';
                    //     }
                    // },
                    {
                        field: 'approved_id',
                        title: 'Vendor Name',
                        width: 400,
                        template: function(row){
                            return row.supplier.c_name;
                        }
                    },
                    // {
                    //     field: '#',
                    //     title: 'Invoice',
                    //     template: function(row){
                    //         return 'INV-1234';
                    //     }
                    // },
                    {
                        field: 'amount',
                        title: 'Amount',
                        template: function(row){
                            return `$${row.amount}.00`;
                        }
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        template: function(row){
                            if (row.status) {
                                switch (row.status) {
                                    case 'paid':
                                        return '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Paid</span>';
                                        break;
                                    case 'pending':
                                        return '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Pending</span>';
                                        break;
                                    default:
                                        return '---';
                                }
                            }
                            
                        }
                    },
                    {
                        field: 'delivery_date',
                        title: 'Expiry Date',
                        width: 100,
                        template: function(row, index, datatable) {
                            if(row.delivery_date)
                            {
                                return moment(row.delivery_date).format("{{settingsValue('momentDateFormat')}}");
                            }
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        overflow: 'visible',
                        textAlign: 'center',
                        template: function(row, index, datatable) {
                            var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                            return '<a class="btn btn-hover-brand btn-icon btn-pill get_invoice" onclick="event.preventDefault();" data-callback="purchaseOrderTableActive" data-route="/admin/purchaseorder/items/'+row.id+'"><i class="la la-eye" title="View invoice"></i></a>';
                        },
                    }
                ],

            });
            P_O_Table.on('kt-datatable--on-init', function(){
                setTimeout(purchaseOrderTableActive,        
                400);
            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            P_O_Table.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                P_O_Table.setActive($this);
            });
            $(document).off('click', '.kt-datatable__row').on('click', '.kt-datatable__row', function(e){
                e.preventDefault();
                $(this).siblings('.active_row').removeClass('active_row');
                $(this).addClass('active_row');
            });
            $(document).ready(function() {
                // $(".dropdown-toggle").dropdown();
                const basicSearch = (advanced = false, cb = "default cb") => {
                    if (advanced) {
                        P_O_Table.setDataSourceParam("query", {});
                    } else {
                        let sanitized = P_O_Table.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        P_O_Table.setDataSourceParam("query", sanitized);

                    }
                    typeof cb === "function" ? cb() : '';

                }

                $('#advSearchBtn').on('click', function(e) {
                    e.preventDefault();
                    let data = $('#clientAdvSearchForm').serializeArray();
                    let reducedData = data.reduce((acc, x) => {
                        acc[x.name] = x.value;
                        return acc;
                    }, {})
                    basicSearch(true, () => {
                        P_O_Table.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        P_O_Table.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#t_p_o_table').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    $('.userInputGroup').find('input').val('');
                    $('#statusSelect').val('').trigger('change');
                    $('#supplierSelect').val('').trigger('change');
                    P_O_Table.setDataSourceParam("query",{});
                    $('#t_p_o_table').KTDatatable().reload();
                    localStorage.removeItem("t_p_o_table-1-meta");
                });
                $(document).on('click', '#adv_reset', function(e) {
                    e.preventDefault();
                    $(this).closest('form').find('input').val('');
                    $('#advSearchBtn').trigger('click');
                });
                $(document).off('click','#adv_close').on('click','#adv_close', function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    $('.userAdvSearchDropDown').dropdown('toggle');
                });
            });
        </script>
    </div>
</div>
<script>
    $(document).off('click', '.get_invoice').on('click', '.get_invoice', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        setActiveRowCallback($(this).attr('data-callback'), url);
        showModal({
            url: url,
        })
    })

    $('#supplierSelect').select2({
        width: 300,
    });
    $('#statusFilter').select2({
        width: '100%',
    });
    $('#statusSelect').select2({
        width: 200,
    });
    $('#dateSelect').daterangepicker({
        // singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'YYYY/MM/DD'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        } 
    });
    $('.dateSearch').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        todayHighlight: true,
        locale: {
              format: 'YYYY/MM/DD'
        },
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        } 
    });

    function checkLengthOfFormRepeater(){
        let qtys= document.querySelectorAll('input[name="product_id[]"]');
        
        return qtys.length;
    }

    function removeExtraRows(){
        let qtys= document.querySelectorAll('input[name="product_id[]"]');
        let doms = [].slice.call(qtys, 0).reverse();
        $.each(doms, function(i, v){
            if ($(v).val() === '' || $(v).val()=== null) {
                if (checkLengthOfFormRepeater()>1) {
                    $(v).closest('tr').remove();
                }
            }
        });
    }
</script>

