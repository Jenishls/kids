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
    .bodyContent {
        padding: 11px 24px!important;
    }
    .userAdvSearchDropDown  label {
        font-size: 0.9rem!important;
        font-weight: 500!important;
    }
</style>
<div id="datatable_container" class="usersControlContent">
    <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Zip Code
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">TABLE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Zip Code</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="dropdown dropdown-inline exportBtn">
                         <a href="javascript:void(0);" class="btn btn-brand btn-elevate btn-icon-sm  dropdown-toggle" id="add_zip" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-upload"></i>
                             Upload
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <ul class="kt-nav">
                                 <li class="kt-nav__section kt-nav__section--first">
                                     <span class="kt-nav__section-text">Choose an option</span>
                                 </li>
                                 <li class="kt-nav__item">
                                     <a href="javascript:void(0);" class="kt-nav__link">
                                         <i class="kt-nav__link-icon la la-file-text-o"></i>
                                        <form action="javascript:void(0);" id="uploadCSVForm">
                                             @csrf
                                             <input type="file" name="file" id="csvImportInput" style="display: none;">
                                        </form>
                                        <span class="kt-nav__link-text importToCSV" data-tablename="ZipCode" data-export-to="csv">CSV</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0);" class="btn btn-brand btn-elevate btn-icon-sm" id="add_zip"><i class="la la-plus"></i>
                        Zip
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- table --}}
    <div id="t_zipstable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
             <div class="alert-text">
                 <div class="row">
                     <div class="col-xl-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
                         <div class="form-group m-form__group row align-items-center ">
                             <div class="accountFilterSearch">
                             </div>
                             <div class="col-md-3 col-sm-3">
                                 <div class="input-group input-group-sm userInputGroup">
                                     <div class="input-group-prepend">
                                         <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Zip Code</button>
                                     </div>
                                     <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="zip_code">
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-3">
                                 <div class="input-group input-group-sm userInputGroup">
                                     <div class="input-group-prepend">
                                         <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">City</button>
                                     </div>
                                     <select name="city[]" data-title="Select City" id="city_picker" multiple="">
                                         @foreach($data['cities'] as $key => $value)
                                             <option value="{{$value->city}}" data-content="{{$value->city}}">
                                                 {{ucwords($value->city)}}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3 col-sm-3">
                                 <div class="input-group input-group-sm userInputGroup">
                                     <div class="input-group-prepend">
                                         <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">State</button>
                                     </div>
                                    <select name="state[]" data-title="Select State" id="state_picker" multiple="">
                                        @foreach($data['states'] as $key => $value)
                                            <option value="{{$value->state}}" data-content="{{$value->state}}">
                                                {{ucwords($value->state)}}
                                            </option>
                                        @endforeach
                                    </select>
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
                                         <a href="javascript:void(0);" class="kt-nav__link">
                                             <i class="kt-nav__link-icon la la-file-text-o"></i>
                                             <span class="kt-nav__link-text exportTo" data-export-to="csv">CSV</span>
                                         </a>
                                     </li>
                                     <li class="kt-nav__item">
                                         <a href="javascript:void(0);" class="kt-nav__link">
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
    var zipsTable = $('#t_zipstable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/zip/list',
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
                sortable: true,
                field: 'zipcode',
                title: 'Zip Code',
            },
            {
                sortable: true,
                field: 'city',
                title: 'City',

            }, {
                sortable: true,
                field: 'county',
                title: 'County',
                // width: 300,
            }, {
                sortable: true,
                field: 'state',
                title: 'State',

            }, {
                sortable: true,
                field: 'price',
                title: 'Price',

            },
           

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_zip" data-route="/zip/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="javascript:void(0);" class="btn btn-hover-danger btn-icon btn-pill delZip" data-id="' + row.id + '" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });

    $('#state_picker').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply",
    });
    $('#city_picker').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply",
    });

    $(document).off('click', '#add_zip').on('click', '#add_zip', function(e) {
        e.preventDefault();

        showModal({
            url: 'zip/add'
        });
    }).off('click', '.edit_zip').on('click', '.edit_zip', function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data('route')
        });
    }).off('click', '.delZip').on('click', '.delZip', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        delConfirm({
            url: "zip/deleteZip/" + id,
            header: $('#t_zipstable')
        });
    });


    $(document).ready(function() {
        $(".dropdown-toggle").dropdown();
        const basicSearch = (advanced = false, cb = "default cb") => {
            if (advanced) {
                zipsTable.setDataSourceParam("query", {});
            } else {
                let sanitized = zipsTable.getDataSourceQuery('query');

                if (sanitized.advanced) delete sanitized.advanced;
                zipsTable.setDataSourceParam("query", sanitized);

            }
            typeof cb === "function" ? cb() : '';

        }

        $('.basic--search').off('blur').on('blur', function() {
            basicSearch(false, () => {
                zipsTable.search($(this).val(), $(this).attr('name'));
            });
        });

        $(document)
        .off("click", "#state_picker .bs-donebutton")
        .on("click", "#state_picker .bs-donebutton", function(e) {
            e.preventDefault();
            basicSearch(false, () => {
                zipsTable.search($('#state_picker').val(), 'state');
            }); 
        });

        $('#advSearchBtn').on('click', function(e) {
            e.preventDefault();
            let data = $('#coupon_adv_form').serializeArray();
            let reducedData = data.reduce((acc, x) => {
                acc[x.name] = x.value;
                return acc;
            }, {})
            basicSearch(true, () => {
                zipsTable.search(reducedData, "advanced");
            });
            $('#dropdownMenuLink').css({
                'background' : '#8b83f3',
            });
        });
        $('#reload_zip_table').on('click', function(e) {
            e.preventDefault();
            zipsTable.reload();
        });
        $('.searchRedo').on('click', function(e) {
            e.preventDefault();
            $('.zipInputGroup').find('input').val('');
            $("#zip_search").val('');
            zipsTable.setDataSourceParam("query", {});
            $('#t_zipstable').KTDatatable().reload();
            localStorage.removeItem("t_zipstable-1-meta");
        });
        $(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.open('/export/zipCode/' + $(this).attr('data-export-to'))
        });

        $(document).on('click','.importToCSV',function(e){
            e.preventDefault();
            $('#csvImportInput').trigger('click');
        })
        $(document).on('change','#csvImportInput',function(){
            console.log($(this));
            $.ajax({
                url: '/admin/import/csv?table=zip_codes',
                method: "POST",
                data: new FormData(document.getElementById('uploadCSVForm')),
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#t_zipstable').KTDatatable().reload();
                    toastr.error(
                        "<strong>Imported Zip Codes SuccessFully!</strong>"
                    );
                },
                error: function({ status, responseJSON }) {
                    toastr.error(
                        "<strong> Something wrong while Importing Zip Codes!</strong>"
                    );
                }
            });
        })
    });
</script>