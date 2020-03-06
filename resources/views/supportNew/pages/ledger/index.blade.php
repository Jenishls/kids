<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Ledger
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Ledger</a>
                </div>
            </div>
        </div>
        {{-- <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-danger btn-elevate btn-icon-sm" id="closeAccount" style="color:#fff;"><i class="la la-minus-circle"></i>
                Close Account
            </a>
        </div> --}}
    </div>
    <div id="ledgerTable">
         <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="dateRange" autocomplete="off" name="date_range">
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Account Head</span>
                                    </div>
                                    
                                    <select name="account_head" class="basic--search" id="accHead">
                                       <option value="">Select</option>
                                    </select>
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
            var ledgerTable = $('#ledgerTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/ledger/list',
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
                        field: 'ledger_date',
                        title: 'Date',
                        template: function(row){
                            if(row.ledger_date)
                            {
                                return moment(row.ledger_date).format("{{settingsValue('momentDateFormat')}}");
                            }
                        },
                        width: 100,
                    },
                    {
                        field: 'account_head_item',
                        title: 'Account',
                        width: 450,
                        template: function(row){
                            return row.account_head_item.name;
                        }
                    },
                    
                    {
                        field: 'dr_amount',
                        title: 'Dr Amount',
                        width: 100,
                        template: function(row){
                            if (row.payment_type === 'Dr') {
                                return `$${row.amount}.00`;
                            }
                            return '--';
                        }
                    },
                    {
                        field: 'cr_amount',
                        title: 'Cr amount',
                        width: 100,
                        template: function(row){
                            if (row.payment_type === 'Cr') {
                                return `$${row.amount}.00`;
                            }
                            return '--';
                        }
                    },
                    {
                        field: 'balance',
                        title: 'Balance',
                        template: function(row){
                            return `$${row.amount}.00`;
                        }
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        overflow: 'visible',
                        textAlign: 'center',
                        width: 100,
                        template: function(row, index, datatable) {
                            var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                            let html = '<a class="btn btn-hover-brand btn-icon btn-pill get_ledger" onclick="event.preventDefault();" data-route="/admin/ledger/view/'+row.id+'"><i class="la la-eye" title="View Ledger"></i></a>'
                            
                            return html;
                        },
                    }
                ],

            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            ledgerTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                ledgerTable.setActive($this);
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
                        ledgerTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = ledgerTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        ledgerTable.setDataSourceParam("query", sanitized);

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
                        ledgerTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        ledgerTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        ledgerTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#ledgerTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#accHead').val('').trigger('change');
                    ledgerTable.setDataSourceParam("query",{});
                    $('#ledgerTable').KTDatatable().reload();
                    localStorage.removeItem("ledgerTable-1-meta");
                });
                $(document).on('click', '#adv_reset', function(e) {
                    e.preventDefault();
                    $(this).closest('form').find('input').val('');
                    $('#advSearchBtn').trigger('click');
                });
                $(document).off('click','#adv_close').on('click','#adv_close', function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    $('.clientAdvSearchDropDown').dropdown('toggle');
                });
            });
        </script>
    </div>
</div>
</div>
<script>
    $('#dateRange').daterangepicker({
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

    $('#accHead').select2({
        width: '100%',
        ajax: {
            url: '/admin/journal/getaccountheads',
            dataType: 'json',
            processResults: function(data){
                return{
                    results: data
                }
            }
        }
    });
</script>