<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Journal
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">FINANCE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Journal</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper kt-align-right" style="width:100%;">
            <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addJournal" ><i class="la la-plus"></i>
                Journal
            </a>
        </div>
    </div>
     <div id="journalTable">
         <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group input-group-sm userInputGroup">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    </div>
                                    <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="description">
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
            var journalTable = $('#journalTable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '/admin/journal/list',
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
                        field: 'journal_date',
                        title: 'Date',
                        template: function(row){
                            if(row.journal_date)
                            {
                                return moment(row.journal_date).format("{{settingsValue('momentDateFormat')}}");
                            }
                        },
                        width: 100,
                    },
                    {
                        field: 'ref_no',
                        title: 'Voucher#',
                        width:100,
                    },
                    
                    {
                        field: 'description',
                        title: 'Description',
                        width: 400,
                    },
                    {
                        field: 'dr_acchead',
                        title: 'Dr. Account Head',
                        template: function(row){
                            return row.transactions[0].account_head.name;
                        }
                    },
                    {
                        field: 'cr_acchead',
                        title: 'Cr. Account Head',
                        template: function(row){
                            return row.transactions[1].account_head.name;
                        }
                    },
                    {
                        field: 'amount',
                        title: 'Amount',
                        template:function(row){
                            return `${row.amount}`;
                        },
                        width:100,
                    },
                    {
                        field: 'userc_id',
                        title: 'Prepared By',
                        template:function(row){
                            return `${row.prepared_user.name}`
                        },
                        width:100,
                    },
                    {
                        field: 'approved_by',
                        title: 'Approved By',
                        template:function(row){
                            if (row.approved_by) {
                                return row.approved_user.name;
                            }
                            return 'Not Approved';
                        },
                        width:100,
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
                            let html = '<a class="btn btn-hover-brand btn-icon btn-pill get_journal" onclick="event.preventDefault();" data-route="/admin/journal/view/'+row.id+'"><i class="la la-eye" title="View Journal"></i></a>'
                            if (row.status === null) {
                                html+= '<a class="btn btn-hover-brand btn-icon btn-pill edit_journal" onclick="event.preventDefault();" data-route="/admin/journal/edit/'+row.id+'"><i class="la la-edit" title="Edit Journal"></i></a>';
                            }
                            return html;
                        },
                    }
                ],

            });
            // $('#dateSelect').change(function(e){
            //     alert($(this).val());
            // })
            journalTable.on('kt-datatable--on-check', function(event, args){
                console.log(event, args);
                journalTable.setActive($this);
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
                        journalTable.setDataSourceParam("query", {});
                    } else {
                        let sanitized = journalTable.getDataSourceQuery('query');

                        if (sanitized.advanced) delete sanitized.advanced;
                        journalTable.setDataSourceParam("query", sanitized);

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
                        journalTable.search(reducedData, "advanced");
                    });
                    $('#dropdownMenuLink').css({
                        'background' : '#8b83f3',
                    });
                });
                $('.basic--search').change(function(e) {
                    
                    basicSearch(false, () => {
                        journalTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('.basic--search').keyup(function(e) {
                    
                    basicSearch(false, () => {
                        journalTable.search($(this).val(), $(this).attr('name'));
                    });
                });
                $('#clientTableReload').on('click', function(e) {
                    e.preventDefault();
                    $('#journalTable').KTDatatable().reload();
                });

                $('.searchRedo').on('click', function(e){
                    e.preventDefault();
                    $('.userInputGroup').find('input').val('');
                    $('#accHead').val('').trigger('change');
                    journalTable.setDataSourceParam("query",{});
                    $('#journalTable').KTDatatable().reload();
                    localStorage.removeItem("journalTable-1-meta");
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



    clickEvent('#addJournal')(addJournal);
    clickEvent('.get_journal')(getJournal);
    clickEvent('.edit_journal')(editJournal);

    function addJournal(e){
        e.preventDefault();
        showModal({
            url: `/admin/journal/add`
        });
    };

    function getJournal(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url: url
        });
    };

    function editJournal(e){
        e.preventDefault();
        let url = $(this).attr('data-route');
        showModal({
            url: url
        });
    }
</script>