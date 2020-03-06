<style>
	.padding_bottom--27{
		padding-bottom: 27px!important;
	}
	.kt-widget__item.custom-widget-item__width{
		width:auto;
	}
	.kt-widget__item.custom-widget-item__uptop{
		padding-top:10px;
	}
	.custom__date-container{
		display:flex; justify-content:space-between;align-items:center;
	}
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
        <div class="row w-100">
            <div class="col-md-10">
                <div class="kt-container ">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">
                            Induce Recurring Sales of January
                        </h3>
                        <span class="kt-subheader__separator kt-hidden"></span>
                        <div class="kt-subheader__breadcrumbs">
                            <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link">CRM</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link">Campaign</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link">Induce Recurring Sales of January</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 no-padding">
                <div class="kt-subheader__wrapper text-right">
                    <a href="#" class="btn btn-pill btn-warning btn-elevate btn-icon-sm pageload" onclick="event.preventDefault();" data-route="/admin/campaign">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    <a href="#" class="btn btn-pill btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        Activites
                    </a>
                </div>
            </div>
        </div>
	</div>
	<div id="t_activites">
        <div class="alert alert-light alert-elevate search_top_container" role="alert">
            <div class="alert-text">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 serach_col user_search_col userSearchCol">
                        <div class="form-group m-form__group row align-items-center">
                            {{-- <div class="accountFilterSearch mr-2">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon " role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
                                    <!-- Advanced Search -->
                                    <div class="dropdown-menu userAdvSearchDropDown">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
                                        <div>
                                            <form class="custom-form kt-form--fit" id="account_adv_form" autocomplete="off">
                                                @csrf
                                                <div class="bodyContent">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Company Name</label>
                                                            <input type="text" class="form-control kt-input advSearchInput" placeholder="" name="company_name" data-col-index="0" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Code</label>
                                                            <input type="text" class="form-control kt-input" name="code" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone_no" class="form-control kt-input advSearchInput e_mask_phone" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control kt-input" name="email" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control kt-input" name="city" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Zip</label>
                                                            <input type="text" class="form-control kt-input" name="zip" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>State</label>
                                                            <input type="text" class="form-control kt-input" name="state" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Default Contact</label>
                                                            <input type="text" class="form-control kt-input" name="default_contact" placeholder="" data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Industry</label>
                                                            <div class="row">
                                                                <div class="col-md-12" id="adv_industry_picker_container">
                                                                    <select name="singleIndustry" data-title="select Industry" id="adv_industry_picker" >
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>URL</label>
                                                            <input type="text" class="form-control kt-input" name="url"  data-col-index="4" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Credit Terms:</label>
                                                            <input type="text" name="credit_terms" class="form-control kt-input advSearchInput" data-col-index="1"  autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Account Since</label>
                                                            <input type="text" name="account_since" class="form-control kt-input advSearchInput" data-col-index="1" autocomplete="off">
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <label>Status</label>
                                                            <select class="form-control kt-input" name="status" id="select2Status" data-col-index="7">
                                                                <option value="" selected></option>
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
                            </div> --}}
                            <div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 306px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Activity Name</button>
                                </div>
                                <input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="activity_name">
                            </div>
                            
                            <div id="reload_table" class="reloadCompanyTable ml-4">
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
		<!--end:: Widgets/Applications/User/Profile1-->
	</div>
</div>
<script>
		var activitesTable = $('#t_activites').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/account/data',
						method: 'get',
						// params: {
						// 	"_token": "{{ csrf_token() }}"
						// },
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
				pageSize: 20,
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
					field: 'status',
					title: 'Status',
					type: 'text',
					width: 80,
					class: 'kt-datatable--off-click_over_action_btn',
					template: function(row){
						let template=`<span class="kt-switch kt-switch--sm kt-switch--outline kt-switch--icon kt-switch--primary" title="Change Status of this Activity">
                                    <label>
                                        <input type="checkbox"`;
                        if(row.is_active)
                            template+='checked="checked"';
                        template+=` name="email_notification_1">
                                        <span></span>
                                    </label>
                                </span>`;
                        return template;
					}
				},
				{
					sortable: true,
					field: 'activity_name',
					title: 'Activity Name',
					type: 'text',
					width: 200,
					template(row){
						return 'Newspapers Ads';
					}
					
				},
                {
					sortable: true,
					field: 'c_name',
					title: 'Company Name',
					type: 'text',
					width: 200
				},
				{
					sortable: true,
					field: 'activity_budget',
					title: 'Budget',
					type: 'text',
					width: 80,
					template(row){
						return '$2000.00';
					}
				},
				{
					sortable: false,
					field: 'mail_list',
					title: 'Mailing List',
					type: 'text',
					width: 180,
					template(row){
						return 'All Clients and leads'
					}
				},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					textAlign: 'center',
					overflow: 'visible',
					class: 'kt-datatable--off-click_over_action_btn',
					width: 130,
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<div class="custom_a_btn_popover">\<a class="btn btn-hover-brand btn-icon btn-pill pageload" onclick="event.preventDefault();" data-route="/admin/account/view/' + row.id + '" data-callback="active_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_account" data-route="/admin/account/modal?edit&account=' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete" data-route="/admin/account/delete/'+row.id+'">\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],
		});
</script>
                                                                                                                                                   