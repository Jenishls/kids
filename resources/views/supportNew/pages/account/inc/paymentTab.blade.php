<style>
    .search_top_container{
        margin-top:10px!important;
    }
   /* th[data-field="order_no"] span{
        width: 55px!important;
    }
     th[data-field="last_digits"] span{
        width: 70px!important;
    }*/
</style>
<div id="t_account_payment_table">
    <div class="alert alert-light alert-elevate search_top_container" style="border-bottom: none;padding: 0.75rem 1.25rem;" role="alert">
        <div class="alert-text">
            <div class="row">
                <div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                    <div class="form-group m-form__group row align-items-center ">
                        {{-- <div class="accountFilterSearch">
                            <div class="dropdown accountAdvSearch">
                                <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                                <!-- Advanced Search -->
                                <div class="dropdown-menu userAdvSearchDropDown">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
                                    <div>
                                        <form class="kt-form kt-form--fit" id="payment_adv_form" autocomplete="off">
                                            @csrf
                                            <div class="bodyContent">
                                                <div class="row kt-margin-b-20">
                                                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control kt-input advSearchInput" placeholder="Company Name" name="company_name" data-col-index="0" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>Ownership</label>
                                                        <input type="text" name="ownership" class="form-control kt-input advSearchInput" placeholder="ownership" data-col-index="4" autocomplete="off">
                                                    </div>

                                                </div>
                                                <div class="row kt-margin-b-20">
                                                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>Industry</label>
                                                        <input type="text" class="form-control kt-input advSearchInput" name="industry" placeholder="Industry" data-col-index="1" autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>Credit Terms:</label>
                                                        <input type="text" name="credit_terms" class="form-control kt-input advSearchInput" placeholder="" data-col-index="1" autocomplete="off">
                                                    </div>

                                                </div>

                                                <div class="row kt-margin-b-20">
                                                    <!-- <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>SSN</label>
                                                        <input type="text" class="form-control kt-input" name="ssn" placeholder="Social security no." data-col-index="4" autocomplete="off">
                                                    </div> -->
                                                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                                                        <label>URL</label>
                                                        <input type="text" class="form-control kt-input" name="url" placeholder="www.example.com" data-col-index="4" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row userAdvFooter p-2">
                                                <div class="footerLeftBtns">
                                                    <div class="advSearchResetBtn">
                                                        <button class="btn btn-secondary btn-secondary--icon" id="adv_reset">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-primary btn-brand--icon" id="advSearchBtn">
                                                        Apply
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div class="input-group mb-3 input-group-sm userInputGroup  mr-3" style="width:220px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Transaction Id</span>
                            </div>
                            <input type="text" class="form-control basic--search" aria-label="Sizing example input"  placeholder="search.." autocomplete="off" name="Company_name" maxlength="10">
                        </div>
                        <div class="input-group mb-3 input-group-sm userInputGroup mr-3" style="width:200px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Order #</span>
                            </div>
                            <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="Company_name" maxlength='10'>
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
</div>
<script>
var clientsTable = $('#t_account_payment_table').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'admin/client/list',
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
                title: 'Payment Date',
                type: 'text',
                template:function(row, index,datatable)
                {
                    return '7/5/2019';
                }
            },
            {
                field: 'Transaction',
                title: 'Transaction',
                type: 'text',
                width: 128,
                template:function(row, index,datatable)
                {
                    return 'sk-10015234343';
                }
            },

             {
                field: 'ref_no',
                title: 'Reference #',
                 type: 'text',
                template:function(row, index,datatable)
                {
                    return '7203178168';
                }
            },
            {
                field: 'order_no',
                title: 'Order #',
                 type: 'text',
                template:function(row, index,datatable)
                {
                    return 'CK1001343';
                }
            },
            {
                field: 'last_digits',
                title: 'Last Digits',
                 type: 'text',

                template: function(row, index, datatable)
                {
                    return '8848';
                }
            },
            {
                field: 'amount',
                title: 'Amount',
                type: 'text',
                textAlign: 'center',
                template: function(row, index,datatable)
                {
                    return '100';
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
                    return '<a class="btn btn-hover-brand btn-icon btn-pill get_profile" onclick="event.preventDefault();" data-route="/client/clientProfile"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delClient" data-id="' + row.id + '" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });
</script>