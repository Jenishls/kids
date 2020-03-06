<div id="cashBoxTable" data-id="{{$id}}">
    <div class="alert alert-light alert-elevate search_top_container" role="alert">
        <div class="alert-text">
            <div class="row">
                <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
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
                                                        <label>Date</label>
                                                        <input type="text" class="form-control kt-input advSearchInput" name="created_at" data-col-index="0" autocomplete="off">
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="row kt-margin-b-20">
                                                    
                                                    
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
                                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="bill_title_search" autocomplete="off" name="created_at">
                            </div>

                        </div>
                        {{-- <div class="col-md-3 col-sm-3">
                            <div class="input-group input-group-sm userInputGroup">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                                </div>
                                
                                <select name="statusSelect" id="statusSelect">
                                    <option value="not_paid">Not Paid</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-3 col-sm-3">
                            
                        </div>
                        
                        <div>
                            <i class="fas fa-redo searchRedo"></i>
                        </div>

                    </div>
                </div>
                <div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
                     <div class="btn-toolbar col-6" role="toolbar" aria-label="..." style="justify-content:flex-end !important;">
                        <div class="btn-group mr-2" role="group" aria-label="...">
                            <button type="button" class="btn btn-pill btn-warning pageload" data-route="/admin/cashmaster"><i class="la la-arrow-left"></i>Back</button>
                        </div>
                        
                    </div>

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
        var cashmasterid = $('#cashBoxTable').attr('data-id');
        var cashBoxTable = $('#cashBoxTable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: `/admin/cashmaster/cashbox/list/${cashmasterid}`,
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
                    field: 'created_at',
                    title: 'Date',
                    template: function(row){
                        if(row.created_at)
                        {
                            return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                        }
                    },
                    width: 100,
                },
                {
                    field: 'description',
                    title: 'Description',
                    width: 500,
                },
                {
                    field: 'dr',
                    title: 'Dr Amount',
                    template:function(row){
                        if (row.dr) {
                            return `$${row.dr}.00`;
                        }else{
                            return '$0.00';
                        }
                    }
                },
                {
                    field: 'cr',
                    title: 'Cr Amount',
                    template:function(row){
                        if (row.cr) {
                            return `$${row.cr}.00`;
                        }else{
                            return '$0.00';
                        }
                    }
                },
                {
                    field: 'balance',
                    title: 'Balance',
                    template:function(row){
                        return `$${row.balance}.00`;
                    }
                },
            ],

        });
        // $('#dateSelect').change(function(e){
        //     alert($(this).val());
        // })
        cashBoxTable.on('kt-datatable--on-check', function(event, args){
            console.log(event, args);
            cashBoxTable.setActive($this);
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
                    cashBoxTable.setDataSourceParam("query", {});
                } else {
                    let sanitized = cashBoxTable.getDataSourceQuery('query');

                    if (sanitized.advanced) delete sanitized.advanced;
                    cashBoxTable.setDataSourceParam("query", sanitized);

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
                    cashBoxTable.search(reducedData, "advanced");
                });
                $('#dropdownMenuLink').css({
                    'background' : '#8b83f3',
                });
            });
            $('.basic--search').change(function(e) {
                
                basicSearch(false, () => {
                    cashBoxTable.search($(this).val(), $(this).attr('name'));
                });
            });
            $('#clientTableReload').on('click', function(e) {
                e.preventDefault();
                $('#cashBoxTable').KTDatatable().reload();
            });

            $('.searchRedo').on('click', function(e){
                e.preventDefault();
                $('.userInputGroup').find('input').val('');
                $("#client_email_search").val('');
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