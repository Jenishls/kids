<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Bank Master
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Bank Master</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addBankMaster" ><i class="la la-plus"></i>
                Bank Master
            </a>
        </div>
    </div>

    {{-- table --}}


    <div id="bankMasterTable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-10 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
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
                                                            <label>Acc#</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="account_no" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Bank Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="bank_name" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Acc. Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="acc_name" data-col-index="0" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row kt-margin-b-20">
                                                         <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Type</label>
                                                            <select name="acc_type" class="form-control" id="selectType">
                                                                <option value="">Select</option>
                                                                <option value="saving">Saving</option>
                                                                <option value="current">Current</option>
                                                                <option value="fixed">Fixed</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Branch</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="branch" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Date Range</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="opened_date" data-col-index="0" autocomplete="off">
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
                            <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Acc#</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="account_no">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Name</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Bank OR Account" autocomplete="off" name="name">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Type</span>
                                    </div>
                                    
                                    <select name="acc_type" class="basic--search" id="accTypeSelect">
                                        <option value="">Select</option>
                                        <option value="saving">Saving</option>
                                        <option value="current">Current</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Branch</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="branch">
                                </div>
                            </div>
                             <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="opened_date">
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-redo searchRedo"></i>
                            </div>

                        </div>
                    </div>
                    <div class="rp_btn col-xl-2 order-1 order-xl-1" style="display:inline-flex;">
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
            var bankMasterTable = $('#bankMasterTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/bankmaster/list',
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
                        field: 'account_number',
                        title: 'Acc#',
                    },
                    {
                        field: 'name',
                        title: 'Bank Name',
                        // template: function(row){
                        //     return row.account.company_name;
                        // }
                    },
                    {
                        field: 'account_name',
                        title: 'Account Name',
                    },
                    {
                        field: 'account_type',
                        title: 'Account Type',
                    },
                    {
                        field: 'opened_date',
                        title: 'Opened Date',
                        width: 100,
                        template: function(row){
                            if(row.opened_date)
                            {
                                return moment(row.opened_date).format("{{settingsValue('momentDateFormat')}}");
                            }
                        }
                    },
                    {
                        field: 'branch',
                        title: 'Branch',
                    },
                     {
                        field: 'statements',
                        title: 'Balance',
                        template: function(row){
                            var deb = 0;
                            var cre = 0;
                            $.each(row.statements,function(i, data){
                                deb+=data.dr;
                                cre+=data.cr;
                            });
                            var total = deb-cre;
                            return `$${total}.00`;
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
                            return '<a class="btn btn-hover-brand btn-icon btn-pill get_bankacc" onclick="event.preventDefault();" data-route="/admin/bankmaster/view/'+row.id+'"><i class="la la-eye" title="View Bank Account"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill edit_bankmaster" data-route="/admin/bankmaster/edit/'+row.id+'"title="Edit Account">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill addFund" data-id="' + row.id + '" title="Add Fund">\
                            <i class="flaticon-piggy-bank"></i>\
                        </a>';
                        },
                    }
                ],

            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            bankMasterTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                bankMasterTable.setActive($this);
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
                        bankMasterTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = bankMasterTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        bankMasterTable.setDataSourceParam("query", sanitized);

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
                        bankMasterTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        bankMasterTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        bankMasterTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#bankMasterTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#accTypeSelect').val('').trigger('change');
                    bankMasterTable.setDataSourceParam("query",{});
                    $('#bankMasterTable').KTDatatable().reload();
                    localStorage.removeItem("bankMasterTable-1-meta");
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

<script>
    $('input[name="opened_date"]').daterangepicker({

    });
    $('#accTypeSelect, #selectType').select2({
        width: '100%',
    })
    $(document).off('click', '#addBankMaster').on('click', '#addBankMaster', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/bankmaster/add`
        });
    });
    $(document).off('click', '.edit_bankmaster').on('click', '.edit_bankmaster', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url: url
        });
    });

    $(document).off('click', '.addFund').on('click', '.addFund', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/bankmaster/addfund/${id}`
        });
    });

    $(document).off('click', '.get_bankacc').on('click', '.get_bankacc', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        supportAjax({
            url: url
        }, function(resp){
            $('#bankMasterTable').empty().append(resp);
        }, function(err){
            console.log(err);
        });
    });
</script>