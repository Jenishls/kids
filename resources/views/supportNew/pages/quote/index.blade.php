<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Quotes
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">ACCOUNTING</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Quotes</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="prepareNewQuote" ><i class="la la-plus"></i>
                Prepare Quote
            </a>
        </div>
    </div>

    {{-- table --}}

    <div id="quotesTable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col quotesSearchCol">
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
                                                            <label>Quote#</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="quote_number" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Vendor name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" placeholder="" name="supplier" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Inv#</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="inv_no" placeholder="" data-col-index="1" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row kt-margin-b-20">
                                                        
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Supplier Type</label>
                                                            <select class="form-control kt-input" name="supplier_type" data-col-index="7">
                                                                <option value="" selected="">Choose Type</option>
                                                                <option value="clients">Client</option>
                                                                <option value="companies">Company</option>
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
                            <div class="col-md-2 col-sm-6">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Quote#</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="quote_number">
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Customer</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="supplier" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Status</span>
                                    </div>
                                    
                                    <select name="status" class="basic--search" id="statusSelect">
                                        <option value="">Select</option>
                                        <option value="pending">Pending</option>
                                        <option value="confirm">Confirmed</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="picked up">Picked up</option>
                                        <option value="closed">Closed</option>
                                        {{-- <option value="delivered">Delivered</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date Range</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" name="duration" aria-describedby="inputGroup-sizing-default" id="dateSelect">
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
            var quotesTable = $('#quotesTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/quotes/list',
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
                        field: 'id',
                        title: 'Pay',
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                        width: 40,
                    },
                    {
                        field: 'date',
                        title: 'Quote Date',
                        width: 100,
                        template: function(row, index, datatable) {
                            if(row.created_at)
                            {
                                return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                            }
                        },
                    },
                    {
                        field: 'quote_number',
                        title: 'Quote#',
                        width: 200,
                        // template: function(row, index, datatable) {
                        //     if(row.created_at)
                        //     {
                        //         return moment(row.created_at).format(' Do MMM , YYYY');
                        //     }
                        // }
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
                    {
                        field: 'supplier_id',
                        title: 'Customer',
                        template: function(row){
                            if(row.supplier_type === 'companies'){
                                if(row.vendor_company){
                                    return "<span><i class='far fa-building'></i>"+'  '+row.vendor_company.c_name+"</span>";
                                }
                                else{
                                    return "<span><i class='far fa-building'></i>"+'  '+"-"+"</span>";
                                }
                            }else{
                                if(row.vendor_client){
                                    let fname = row.vendor_client.fname;
                                    let mname = '';
                                    let lname = '';
                                    if(row.vendor_client.mname){
                                        mname = row.vendor_client.mname;
                                    }
                                    if(row.vendor_client.lname){
                                        lname = row.vendor_client.lname;
                                    }
                                    name = fname+' '+mname+' '+lname;
                                    return "<span><i class='fa fa-user-tie'></i>"+'  '+name+"</span>";
                                }
                            }

                            // return 'Test';
                        }
                    },
                    // {
                    //     field: 'approved_by',
                    //     title: 'Vendor Name',
                    //     width: 400,
                    //     template: function(row){
                    //         return row.supplier.c_name;
                    //     }
                    // },
                    {
                        field: 'performa_invoice',
                        title: 'Invoice',
                        template: function(row){
                            if (row.performa_invoice) {
                                return row.performa_invoice.invoice_no;
                            }else{
                                return 'Invoice is not Generated';
                            }
                        }
                    },
                    {
                        field: 'amount',
                        title: 'Amount',
                        template: function(row){
                            if (row.quote_items) {
                                var total = 0;
                                $.each(row.quote_items, function(i, v){
                                    total+= v.estimate_price;
                                })
                                return `$${total}.00`;
                            }else{
                                return '$0.00';
                            }
                        }
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        template: function(row){
                            if (row.status == 'pending') {
                                return `<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">${row.status}</span>`;
                            }
                            if (row.status == 'delivered') {
                                return `<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">${row.status}</span>`;
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
                            return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-id="'+row.id+'" onclick="event.preventDefault();" data-callback="quoteTableActive" data-route="/admin/quotes/detail/'+row.id+'"><i class="la la-eye" title="View quote"></i></a>\
                            <a class="btn btn-hover-success btn-icon btn-pill sendMailTo" data-id="'+row.id+'" data-url="'+row.mail_to+'" title="Send Mail">\
                                <i class="flaticon-mail"></i>\
                            </a>';
                        },
                    }
                ],

            });

            quotesTable.on('kt-datatable--on-init', function(){
                setTimeout(quoteTableActive,        
                400);
            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            quotesTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                quotesTable.setActive($this);
            });
            $(document).off('click', '.kt-datatable__row').on('click', '.kt-datatable__row', function(e){
                e.preventDefault();
                $(this).siblings('.active_row').removeClass('active_row');
                $(this).addClass('active_row');
            });
            $(document).ready(function() {
                $(".dropdown-toggle").dropdown();
                const basicSearch = (advanced = false, cb = "default cb") => {
                    if (advanced) {
                        quotesTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = quotesTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        quotesTable.setDataSourceParam("query", sanitized);

                    }
                    typeof cb === "function" ? cb() : '';

                }

                $('#advSearchBtn').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    let data = $('#clientAdvSearchForm').serializeArray();
                    let reducedData = data.reduce((acc, x) => {
                        acc[x.name] = x.value;
                        return acc;
                    }, {})
                    basicSearch(true, () => {
                        quotesTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                    // $('.userAdvSearchDropDown').dropdown('toggle');
                    // $('#adv_close').trigger('click');
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        quotesTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        quotesTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#quotesTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#statusSelect').val('').trigger('change');
                    quotesTable.setDataSourceParam("query",{});
                    $('#quotesTable').KTDatatable().reload();
                    localStorage.removeItem("quotesTable-1-meta");
                });
                $(document).on('click', '#adv_reset', function(e) {
                    e.preventDefault();
                    $(this).closest('form').find('input').val('');
                    $(this).closest('form').find('select').val('');
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
    $(document).off('click', '#prepareNewQuote').on('click', '#prepareNewQuote', function(e){
        e.preventDefault();
        showModal({
            url:`/admin/quotes/vendortype`,
        });
        
    });

    $('#statusSelect').select2({
        width:200,
    });
    $('#supplierSelect').select2({
        width:350,
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


    $(document).off('click', '.sendMailTo').on('click', '.sendMailTo', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/quotes/compose/${id}?pdf=true`,
        });
    });

    // $(document).off('click', '.get_quote').on('click', '.get_quote', function(e){
    //     e.preventDefault();
    //     let callback = $(this).attr("data-callback");
    //     alert(callback);
    //     if (callback) {
    //         Cookies.set(callback, url);
    //         if (typeof window[callback] === "function") {
    //             window[callback]();
    //         }
    //     }
    //     let url = $(this).attr('data-route');
    //     showModal({
    //         url: url,
    //     });
    // });
</script>