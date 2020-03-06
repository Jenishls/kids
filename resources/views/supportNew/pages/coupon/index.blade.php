
<style type="text/css">
    /*.industry_search span {
        border: 1px solid #d5f2ff00;
        background-color: rgba(34, 185, 255, 0);
    }*/
    /*.select2-selection__rendered {
      line-height: 15px !important;
    }

    .select2-selection {
      height: 32px !important;
    }*/
    .btn_p_p4rem{
        padding: 0.50rem 0.60rem!important;
        font-size: 0.9rem!important;
    }
    .industry_search .bootstrap-select > .dropdown-toggle{
        padding: 0.50rem 0.60rem!important;
        font-size: 0.9rem!important;
        border-left: none!important;
    }
    .industry_search .bootstrap-select.show > .dropdown-toggle.btn-light, .bootstrap-select.show > .dropdown-toggle.btn-secondary {
        border-color: #e2e5ec!important;
        border-left: none!important;
    }
    .userAdvSearchDropDown{
        width: 800px!important;
    }
    .kt-datatable__head {
        background: #e8f8ff !important;
    }
</style>
<div id="datatable_container" class="usersControlContent">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Coupon
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">TABLE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Coupon</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper">
            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_coupon"><i class="la la-plus"></i>
                Coupon
            </a>
        </div>
    </div>
    {{-- table --}}
    <div id="t_couponstable">
       <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            <div class="accountFilterSearch">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                                    <!-- Advanced Search -->
                                    <div class="dropdown-menu userAdvSearchDropDown">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
                                        <div>
                                            <form class="kt-form kt-form--fit" id="coupon_adv_form" autocomplete="off">
                                                @csrf
                                                <div class="bodyContent">
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Coupon Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" name="coupon_name" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Coupon Code</label>
                                                            <input type="text" name="coupon_code" class="form-control kt-input advSearchInput"  data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Type</label>
                                                            <select name="type" id="couponSelect2">
                                                                <option value="flat">Flat</option>
                                                                <option value="percentage">Percentage</option>
                                                            </select>
                                                            {{-- <input type="text" class="form-control kt-input" name="type" placeholder="" data-col-index="4" autocomplete="off"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control kt-input " name="start_date" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control kt-input" name="end_date" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Usage</label>
                                                            <input type="number" class="form-control kt-input" name="usage" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="row kt-margin-b-20">
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Amount</label>
                                                            <input type="number" class="form-control kt-input" name="amount" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Min Price</label>
                                                            <input type="number" class="form-control kt-input" name="min_price" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Status</label>
                                                            <select class="form-control kt-input" name="status" data-col-index="7">
                                                                <option value="">Status</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
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
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Coupon Name</button>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="coupon_name" autocomplete="off" name="coupon_name">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Coupon Code</button>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="coupon_code" autocomplete="off" name="coupon_code">
                                </div>
                            </div>
                            <div id="reload_table">
                                <i class="fas fa-redo searchRedo"></i>
                            </div>
                        </div>
                    </div>
                    <div class="rp_btn col-xl-4 order-1 order-xl-1" style="display:inline-flex;">
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
</div>
<script>
    var couponsTable = $('#t_couponstable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/coupon/list',
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
        columns: [{
                sortable: true,
                field: 'code',
                title: 'Code',
                width: 100,
            },
            {
                sortable: true,
                field: 'name',
                title: 'Name',
                width: 100,
            },
            {
                sortable: true,
                field: 'description',
                title: 'Description',
                width: 300,
                template:function(row){
                    if(row.description){
                        if(row.description.length > 25) return row.description.substring(0,25);
                        return `<span data-toggle="kt-tooltip" data-placement="top" data-original-title="80 Kane Street">${row.description}...</span>`;
                    }
                    return '-';
                   
                }
            },
            {
                field: 'start_date',
                title: 'Start Date',
                type: 'date',
                textAlign: "center",
                template(row) {
                    if(row.start_date)
                    {
                        return moment(row.start_date).format(' Do MMM , YYYY');
                    }
                }
            },
            {
                field: 'end_date',
                title: 'End Date',
                type: 'date',
                textAlign: "center",
                template(row) {
                    if(row.end_date)
                    {
                        return moment(row.end_date).format(' Do MMM , YYYY');
                    }
                }
            },
            {
                sortable: true,
                field: 'min_price',
                title: 'Min Price',
                width: 100,
            },
            {
                sortable: true,
                field: 'usage',
                title: 'Usage',
                width: 100,
            },
            {
                sortable: true,
                field: 'type',
                title: 'Type',
                // width: 300,
            },
            {
                sortable: true,
                field: 'value',
                title: 'Amount',
                width: 100,
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_coupon" data-route="/coupon/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delCoupon" data-id="' + row.id + '" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });

    $(document).off('click', '#add_coupon').on('click', '#add_coupon', function(e) {
        e.preventDefault();
        showModal({
            url: 'coupon/add'
        });
    }).off('click', '.edit_coupon').on('click', '.edit_coupon', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    }).off('click', '.delCoupon').on('click', '.delCoupon', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        delConfirm({
            url: "coupon/deleteCoupon/" + id,
            header: $('#t_couponstable')
        });
});
     couponsTable.on('kt-datatable--on-init', function() {
       
    });
    $('.start_Date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
      });
    $(document).ready(function() {
        $(".dropdown-toggle").dropdown();
        const basicSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                couponsTable.setDataSourceParam("query", {});
            } else {
                let sanitized = couponsTable.getDataSourceQuery('query');

                if (sanitized.advanced) delete sanitized.advanced;
                couponsTable.setDataSourceParam("query", sanitized);

            }
            typeof cb === "function" ? cb() : '';
        }

        $('.basic--search').off('keyup').on('keyup', function(e) {
            if($(this).val().length > 2 || $(this).val().length ==0)
            {
                basicSearch(false, () => {
                    couponsTable.search($(this).val(), $(this).attr('name'));
                }); 
            }
        });
        // advance search
        $('#advSearchBtn').on('click', function(e) {
            e.preventDefault();
            let data = $('#coupon_adv_form').serializeArray();
            let reducedData = data.reduce((acc, x) => {
                acc[x.name] = x.value;
                return acc;
            }, {})
            basicSearch(true, () => {
                couponsTable.search(reducedData, "advanced");
            });
            $('#dropdownMenuLink').css({
                'background' : '#8b83f3',
            });
        });
        $(document).on('click', '#adv_reset', function(e) {
            e.preventDefault();
            $(this).closest('form').find('input').val('');
            $('#advSearchBtn').trigger('click');
        });
        $(document).find("#couponSelect2").select2({
            width:'100%'
        });
        $('#reload_table').on('click', function(e) {
            e.preventDefault();
            $('.basic--search').val('');
            // localStorage.removeItem("t_account_table-1-meta");
            couponsTable.setDataSourceParam("query",{});
            $('#t_couponstable').KTDatatable().reload();
            localStorage.removeItem("t_couponstable-1-meta");
        });
        $(document).off('click', '.couponExportTo').on('click', '.couponExportTo', function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.open('export/coupon/' + $(this).attr('data-export-to'))
        });
    });
</script>