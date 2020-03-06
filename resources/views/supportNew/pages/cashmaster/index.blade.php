<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Cash Master
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Cash Master</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addCashMaster" ><i class="la la-plus"></i>
                Cash Master
            </a>
        </div>
    </div>

    {{-- table --}}


    <div id="cashMasterTable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Acc. Name</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="account_name">
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Holder</span>
                                    </div>
                                    
                                    <select name="member" class="basic--search" id="accHolder">
                                       <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Location</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="location">
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
            var cashMasterTable = $('#cashMasterTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/cashmaster/list',
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
                        field: 'name',
                        title: 'Name',
                        width: 150,
                    },
                    {
                        field: 'member_id',
                        title: 'Hold By',
                        template: function(row){
                            return row.user.name;
                        }
                    },
                    {
                        field: 'location',
                        title: 'Location',
                    },
                    {
                        field: 'id',
                        title: 'Available Balance',
                        template: function(row){
                            if (row.cashbox !== null) {
                                var deb = 0;
                                var cre = 0;
                                $.each(row.cashbox,function(i, data){
                                    deb+=data.dr;
                                    cre+=data.cr;
                                });
                                var total = deb-cre;
                                return `$${total}.00`;
                            }else{
                                return '$0.00';
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
                            return '<a class="btn btn-hover-brand btn-icon btn-pill get_cashmaster" onclick="event.preventDefault();" data-route="/admin/cashmaster/view/'+row.id+'"><i class="la la-eye" title="View Cash Master"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill edit_cashmaster" data-route="/admin/cashmaster/edit/'+row.id+'"title="Edit Cash Master">\
                            <i class="la la-edit"></i>\
                        </a>\
                       <a href="#" class="btn btn-hover-danger btn-icon btn-pill addCashMasterFund" data-id="' + row.id + '" title="Withdraw from bank">\
                            <i class="fa fa-hand-holding-usd"></i>\
                        </a>\
                       <a href="#" class="btn btn-hover-danger btn-icon btn-pill transferFund" data-id="' + row.id + '" title="Deposit to bank">\
                            <i class="flaticon-piggy-bank"></i>\
                        </a>';
                        },
                    }
                ],

            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            cashMasterTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                cashMasterTable.setActive($this);
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
                        cashMasterTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = cashMasterTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        cashMasterTable.setDataSourceParam("query", sanitized);

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
                        cashMasterTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        cashMasterTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        cashMasterTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#cashMasterTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#accHolder').val('').trigger('change');
                    cashMasterTable.setDataSourceParam("query",{});
                    $('#cashMasterTable').KTDatatable().reload();
                    localStorage.removeItem("cashMasterTable-1-meta");
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
    $('#accHolder').select2({
        width: '100%',
        ajax:{
            url: '/admin/cashmaster/getMember',
            processResults: function(data){
                var d = [];
                $(data).each(function (k, v) {
                    var a = {
                        text: v.name+' '+'('+v.username+')',
                        id: v.id
                    };
                    d.push(a);
                });
                return {
                    results: d
                };
            }
        }
    })
    $(document).off('click', '#addCashMaster').on('click', '#addCashMaster', function(e){
        e.preventDefault();
        showModal({
            url: `/admin/cashmaster/add`
        });
    });
    $(document).off('click', '.edit_cashmaster').on('click', '.edit_cashmaster', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url: url
        });
    });

    $(document).off('click', '.addCashMasterFund').on('click', '.addCashMasterFund', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/cashmaster/addfund/${id}`
        });
    });
    $(document).off('click', '.transferFund').on('click', '.transferFund', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        showModal({
            url: `/admin/cashmaster/transfer/${id}`
        });
    });

    $(document).off('click', '.get_cashmaster').on('click', '.get_cashmaster', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        supportAjax({
            url: url
        }, function(resp){
            $('#cashMasterTable').empty().append(resp);
        }, function(err){
            console.log(err);
        });
    });
</script>