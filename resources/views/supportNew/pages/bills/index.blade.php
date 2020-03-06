<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Bills
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">ACCOUNTING</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Bills</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addNewBill" ><i class="la la-plus"></i>
                Bill
            </a>
        </div>
    </div>

    {{-- table --}}


    <div id="billsTable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="bill_title_search" autocomplete="off" name="bill_title">
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="bill_desc_search" autocomplete="off" name="description">
                                    {{-- <select name="statusSelect" id="statusSelect">
                                        <option value="not_paid">Not Paid</option>
                                        <option value="paid">Paid</option>
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Status</span>
                                    </div>
                                    
                                    <select name="status" class="basic--search" id="statusSelect">
                                        <option value="">Select</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Not Paid</option>
                                        <option value="cancelled">Cancelled</option>
                                        {{-- <option value="delivered">Delivered</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date Range</span>
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
            var billsTable = $('#billsTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/bills/list',
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
                        field: 'bill_no',
                        title: 'Bill#',
                        width: 100,
                    },
                    {
                        field: 'bill_date',
                        title: 'Date',
                        template: function(row, index, datatable) {
                            if(row.bill_date)
                            {
                                return moment(row.bill_date).format("{{settingsValue('momentDateFormat')}}");
                            }
                        }
                    },
                    {
                        field: 'bill_title',
                        title: 'Title',
                    },
                    {
                        field: 'currency',
                        title: 'Currency',
                    },
                    {
                        field: 'amount',
                        title: 'Amount',
                        template: function(row, datatable, index){
                            return '$'+row.amount+'.00';
                        }
                    },
                    {
                        field: 'description',
                        title: 'Description',
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        template: function(row){
                            switch (row.status) {
                                 case 'pending':
                                    return `<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill kt-badge--rounded">${row.status}</span>`;
                                case 'approved':
                                    return `<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">Not Paid</span>`;
                                case 'cancelled':
                                    return `<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">${row.status}</span>`;
                                default:
                                    return `---`;
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
                            var state = '';
                            var title = 'Edit Bill Details';
                            let html = '<a class="btn btn-hover-brand btn-icon btn-pill get_bill" onclick="event.preventDefault();" data-callback="billTableActive" data-route="/admin/bills/view/'+row.id+'"><i class="la la-eye" title="View Bill"></i></a>';
                            if (row.status === 'pending') {
                                html+='<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill edit_bill" data-route="/admin/bills/edit/'+row.id+'"title="'+title+'" '+state+'>\
                                    <i class="la la-edit"></i>\
                                </a>\
                                <a href="#" class="btn btn-hover-danger btn-icon btn-pill billDelete" data-id="' + row.id + '" title="Delete">\
                                    <i class="la la-trash"></i>\
                                </a>';
                            }
                            if (row.status === 'approved') {
                                html+='<a href="javascript:void(0);" class="btn btn-hover-info btn-icon btn-pill make_payment" data-route="/admin/bills/pay/'+row.id+'"title="Make Bill Payment" '+state+'>\
                                    <i class="la la-usd"></i>\
                                </a>';
                            }
                            
                            var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                            return html;
                        },
                    }
                ],

            });
            billsTable.on('kt-datatable--on-init', function(){
                setTimeout(billTableActive,        
                400);
            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            billsTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                billsTable.setActive($this);
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
                        billsTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = billsTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        billsTable.setDataSourceParam("query", sanitized);

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
                        billsTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        billsTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        billsTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#billsTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#statusSelect').val('').trigger('change');
                    billsTable.setDataSourceParam("query",{});
                    $('#billsTable').KTDatatable().reload();
                    localStorage.removeItem("billsTable-1-meta");
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
    $('#statusSelect').select2({
        width:'100%',
    });

    $(document).off('click', '#addNewBill').on('click', '#addNewBill', function(e){
        e.preventDefault();
        showModal({
            url: '/admin/bills/add',
        });
    });

    $(document).off('click', '.edit_bill').on('click', '.edit_bill', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url: url
        });
    });

    $(document).off('click', '.billDelete').on('click', '.billDelete', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        delConfirm({
            url: "/admin/bills/delete/" + id,
            header: $("#billsTable")
        });
    });

    $(document).off('click', '.get_bill').on('click', '.get_bill', function(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        setActiveRowCallback($(this).attr('data-callback'), url);
        supportAjax({
            url:url
        }, function(resp){
            $('#billsTable').empty().append(resp);
        }, function(err){
            console.log(err);
        })
    });

    clickEvent('.make_payment')(makeBillPayment);
    function makeBillPayment(e) {
        e.preventDefault();
        let url = $(this).attr('data-route');
        alert('We are working on this feature');
    }
</script>