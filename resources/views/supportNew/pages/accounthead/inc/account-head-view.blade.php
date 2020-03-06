<div id="accountHeadsTable">
    <div class="alert alert-light alert-elevate search_top_container" role="alert">
        <div class="alert-text">
            <div class="row">
                <div class="col-xl-8 order-1 order-xl-1 serach_col po_search_col billsSearchCol">
                    <div class="form-group m-form__group row align-items-center ">
                        
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group input-group-sm userInputGroup">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Type</span>
                                </div>
                                
                                <select name="type" class="basic--search" id="typeSelect">
                                    <option value="">Select</option>
                                    <option value="ASSET">ASSET</option>
                                    <option value="EQUITY">EQUITY</option>
                                    <option value="EXPENSE">EXPENSE</option>
                                    <option value="INCOME">INCOME</option>
                                    <option value="LIABILITY">LIABILITY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group input-group-sm userInputGroup">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="name">
                            </div>
                        </div>
                       
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group input-group-sm userInputGroup">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Code</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="code">
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
    <div class="kt-subheader__wrapper" style="padding-bottom: 15px;">
        <a class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addAccHead" ><i class="la la-plus"></i>
            Add
        </a>
    </div>
    <script>
        var accountHeadsTable = $('#accountHeadsTable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/admin/accounthead/list',
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
                    field: 'type',
                    title: 'Type',
                    width: 300
                },
                {
                    field: 'code',
                    title: 'Code',
                },
                {
                    field: 'name',
                    title: 'Name',
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
                        return '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill edit_acchead" data-route="/admin/accounthead/edit/'+row.id+'"title="Edit Account Head details">\
                        <i class="la la-edit"></i>\
                    </a>\
                    <a href="#" class="btn btn-hover-danger btn-icon btn-pill accHeadDeletet" data-id="' + row.id + '" title="Delete">\
                        <i class="la la-trash"></i>\
                    </a>';
                    },
                }
            ],

        });
        // $('#dateSelect').change(function(e){
        //     alert($(this).val());
        // })
        accountHeadsTable.on('kt-datatable--on-check', function(event, args){
            console.log(event, args);
            accountHeadsTable.setActive($this);
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
                    accountHeadsTable.setDataSourceParam("query", {});
                } else {
                    let sanitized = accountHeadsTable.getDataSourceQuery('query');

                    if (sanitized.advanced) delete sanitized.advanced;
                    accountHeadsTable.setDataSourceParam("query", sanitized);

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
                    accountHeadsTable.search(reducedData, "advanced");
                });
                $('#dropdownMenuLink').css({
                    'background' : '#8b83f3',
                });
            });
            $('.basic--search').change(function(e) {
                
                basicSearch(false, () => {
                    accountHeadsTable.search($(this).val(), $(this).attr('name'));
                });
            });
            $('.basic--search').keyup(function(e) {
                
                basicSearch(false, () => {
                    accountHeadsTable.search($(this).val(), $(this).attr('name'));
                });
            });
            $('#clientTableReload').on('click', function(e) {
                e.preventDefault();
                $('#accountHeadsTable').KTDatatable().reload();
            });

            $('.searchRedo').on('click', function(e){
                e.preventDefault();
                $('.userInputGroup').find('input').val('');
                $('#typeSelect').val('').trigger('change');
                accountHeadsTable.setDataSourceParam("query",{});
                $('#accountHeadsTable').KTDatatable().reload();
                localStorage.removeItem("accountHeadsTable-1-meta");
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


<script>
   $('#typeSelect').select2({
       width: '100%',
   });
</script>