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
    @media screen and (max-width: 1023px){
        .custom__offset-1 {
            margin-left: 5%!important;
            padding-top: 10px!important;
        }
    }
    [name="status"]~ .select2-selection__rendered {
    	line-height: 12px !important;
	}
	[name="status"]~ .select2-container .select2-selection--single {
		height: 32px !important;
	}
	[name="status"]~ .select2-selection__arrow {
		height: 32px !important;
	}
</style>
<div id="datatable_container" class="clientContent">
    <div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Client
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">TABLE</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Client</a>
                </div>
            </div>
        </div>
        <div class="kt-subheader__wrapper">
            <a href="#" class="btn btn-brand btn-pill btn-elevate btn-icon-sm" id="add_client" style="width:111px !important;"><i class="la la-plus"></i>
                Add Client
            </a>
        </div>
    </div>

    {{-- table --}}

    <div id="t_clientstable">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12  serach_col client_search_col clientSearchCol">
                        <div class="form-group m-form__group row align-items-center ">
                            <div class="clientFilterSearch">
                                <div class="dropdown clientAdvSearch">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i title="Advanced search" class="fas fa-filter"></i>
                                    </button>
                                    <!-- Advanced Search -->
                                    <div class="dropdown-menu userAdvSearchDropDown">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust " style="right: auto; left: 33.5px;border-bottom: 5px solid #cdcdd5; ">
                                        </span>
                                        <div>
                                            <form class="kt-form kt-form--fit" id="clientAdvSearchForm" autocomplete="off">
                                                @csrf
                                                <div class="bodyContent" style="background: #e8f8ff;">
                                                    <div class="row">
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" placeholder="" name="name" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Phone Number</label>
                                                            <input type="text" class="form-control kt-input advSearchInput e_mask_phone" name="phone_no" placeholder="" data-col-index="1" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Email</label>
                                                            <input type="text" name="email" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>City</label>
                                                            <input type="text" name="city" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>State</label>
                                                            <input type="text" name="state" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Zip</label>
                                                            <input type="text" name="zip" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Client Since</label>
                                                            <input type="text" class="form-control kt-input advSearchInput dateRangerPickerEl" name="client_since" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Date of Birth</label>
                                                            <input type="text" class="form-control kt-input dateRangerPickerEl" name="dob" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Last Order Date</label>
                                                            <input type="text" class="form-control kt-input dateRangerPickerEl" name="order_since" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                                                            <label>Status</label>
                                                            <select class="form-control kt-input " id="advStatus" name="status" data-col-index="7">
                                                                <option value="" selected="">Select a Status</option>
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row userAdvFooter" style="padding: 0.5rem 21px!important;">
                                                    <div class="footerLeftBtns">
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-outline-danger btn-pill btn_p_p4rem" id="adv_close">
                                                                Close
                                                            </a>
                                                        </div>
                                                        <div class="advSearchResetBtn pl-2">
                                                            <a href="javascript:void(0);" class="btn btn-outline-brand btn-pill btn_p_p4rem" id="adv_reset">
                                                                Reset
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="advSearchResetBtn">
                                                        <a href="javascript:void(0);" class="btn btn-outline-brand btn-pill adv_apply_btn btn_p_p4rem" id="advSearchBtn">Apply</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-sm userInputGroup mr-3" style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="name">
                            </div>
                            <div class="input-group input-group-sm userInputGroup mr-3" style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                                </div>
                                <input type="text" class="form-control basic--search e_mask_phone" aria-label="Sizing example input" name="phone_no" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="phone_search">
                            </div>
                            <div class="input-group input-group-sm userInputGroup mr-3" style="width:200px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="email_search" autocomplete="off" name="email">
                            </div>
                            <div class="input-group input-group-sm userInputGroup ml-1" style="width: 200px!important;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Active</button>
								</div>
								<select name="status" id="statusMainSelect2" class="form-control basic--search">
									<option value="" selected>Select a Status</option>
									<option value="active" >Active</option>
									<option value="inactive">Inactive</option>
								</select>
								{{-- <input type="text" class="form-control basic--search e_mask_phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="phone_no"> --}}
							</div>
                            <div id="reload_table" class="reloadclientTable ml-3">
								<i class="fas fa-redo searchRedo"></i>
							</div>
                            <div class="dropdown dropdown-inline exportBtn ml-auto">
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
</div>
<script>
    var clientsTable = $('#t_clientstable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/client/list',
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
        rows:{
            afterTemplate: function(row, data, index)
            {
                if($('#t_clientstable').hasClass('addedNew'))
                {
                    if(data.isLatest){
                        $(row[0]).addClass('active_row');
                        return;
                    }
                    $(row[0]).removeClass('active_row');
                }
                else{
                    active_current_row();
                }
            }
        },
        // columns definition
        columns: [
            {
                field: 'created_at',
                title: 'Client Since',
                width: 100,
                template: function(row, index, datatable) {
                    if(row.created_at)
                    {
                        return moment(row.created_at).format("{{settingsValue('momentDateFormat')}}");
                    }
                }
            },
            {
                // sortable: true,
                field: 'fname',
                title: 'Name',
                width: 250,
                // type: 'text',
                template: function(row, index, datatable) {
                    if(row.mname){
                        return row.fname + ' '+ row.mname+' '+ row.lname;
                    }else{
                        return row.fname + ' '+ row.lname;
                    }
                }
            },
            {
                field: 'phone_no',
                title: 'Phone#',
                template: function(row, index, datatable) {
                    // console.log(row.contact.mobile_no);
                    if(row.contact && row.contact.mobile_no){
                        return row.contact.mobile_no;
                    }else{
                        return row.phone_no;
                    }
                }
            },
            {
                field: 'email',
                title: 'Email',
                width: 200,
                template: function(row, index, datatable) {
                    if(row.contact && row.contact.email){
                        return row.contact.email;
                    }else{
                        return row.email;
                    }
                }

            },
            {
                field: 'city',
                title: 'City',
                width: 200,
            template: function(row, index, datatable) {
                    if(row.address){
                        return row.address.city;
                    }else{
                        return '-';
                    }
                }
            },
            {
                field: 'zip',
                title: 'Zip',
                width: 100,
                template: function(row, index, datatable) {
                    if(row.address){
                        return row.address.zip;
                    }else{
                        return '-';
                    }
                }
            },
            {
                field: 'dob',
                title: 'DOB',
                width: 100,
                template: function(row, index, datatable) {
                    if(row.dob)
                    {
                        return moment(row.dob).format("{{settingsValue('momentDateFormat')}}");
                    }
                }
            },
            {
                field: 'is_active',
                title: 'Status',
                width: 100,
                class: 'kt-datatable--off-click_over_action_btn',
                template: function(row) {
                    if(row.status == "active"){
                        return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer">Active</span>`;
                    }
                    else if(row.status == "inactive"){
                        return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer" >Inactive</span>`;
                    }
                },
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/'+row.id+'" data-callback="active_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/admin/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill delClient" data-id="' + row.id + '" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],

    });
$(document).ready(function(){
    $('.reloadclientTable').off('click').on('click', function(e) {
        e.preventDefault();
        $('#t_clientstable .userInputGroup').find('input').val('');
        $('#statusMainSelect2').select2("val", "");
        $('#advStatus').select2("val", "");
        clientsTable.setDataSourceParam("query",{});
        $('#t_clientstable').KTDatatable().reload();
        localStorage.removeItem("t_clientstable-1-meta");
        $('#dropdownMenuLink, .searchRedo').removeClass('dropdown-on-active');
    });

    $('.dateRangerPickerEl').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        minYear: 2001,
        maxYear: parseInt(moment().format('YYYY'),10)
    }, function(start_date, end_date) {
                this.element.val(start_date.format('YYYY-MM-DD'));
    });
    $(document).off('click', '.kt-datatable__row').on('click', '.kt-datatable__row', function(e){
        e.preventDefault();
        $(this).siblings('.active_row').removeClass('active_row');
        $(this).addClass('active_row');
    });
    $(".dropdown-toggle").dropdown();

    
    $('#advSearchBtn').on('click', function(e) {
        e.preventDefault();
        let data = $('#clientAdvSearchForm').serializeArray();
        let reducedData = data.reduce((acc, x) => {
            acc[x.name] = x.value;
            return acc;
        }, {})
        clientsTableSearch(true, () => {
            clientsTable.search(reducedData, "advanced");
        });
        $('#dropdownMenuLink, .searchRedo').addClass('dropdown-on-active');
    });
    // $(document).find('[name="status"').select2({
    //     placeholder:'Select a status',
    //     width:'100%',
    //     allowClear: true
    // });
    $(document).on('click', '#adv_reset', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('form').find('input').val('');
        $('#dropdownMenuLink').removeClass('dropdown-on-active');
    });
    $(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open('/admin/export/clients/' + $(this).attr('data-export-to'));
    });
    $(document).off('click','#adv_close').on('click','#adv_close', function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.userAdvSearchDropDown').removeClass('show');
    })
    var clientsTableSearch = (advanced = false, cb = "default cb") => {
        if (advanced) {
            clientsTable.setDataSourceParam("query", {});
        } else {
            let sanitized = clientsTable.getDataSourceQuery('query');
            if (sanitized.advanced) delete sanitized.advanced;
            clientsTable.setDataSourceParam("query", sanitized);
        }
        typeof cb === "function" ? cb() : '';
    }
    let currentClientTimeout = '';
    $('#t_clientstable .basic--search').off('blur keyup').on('blur keyup', function(e) {
        let length = $(this).val().length;
        let el =$('.searchRedo');
        if(length > 2 || length == 0)
        {
            clearInterval(currentClientTimeout)
            currentClientTimeout = setTimeout(() => {
                clientsTableSearch(false, () => {
                    clientsTable.search($(this).val(), $(this).attr('name'));
                    length == 0 ?  el.removeClass('dropdown-on-active'): el.addClass('dropdown-on-active');
                }); 
            }, 1500);
        }
    });
     $('#statusMainSelect2').select2({
        width:140,
        placeholder:'Select a Status',
        allowClear: true
    }).on('change', function(e){
            let length = $(this).val().length;
			let el =$('.searchRedo');
        clientsTableSearch(false, () => {
            clientsTable.search($(this).val(), $(this).attr('name'));
            length == 0 ?  el.removeClass('dropdown-on-active'): el.addClass('dropdown-on-active');
        }); 
    });
     $('#advStatus').select2({
        width:'100%',
        placeholder:'Select a Status',
    })
});
        
        
</script>