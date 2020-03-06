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
	/*action buttons on click event*/
		.action-menu{
		    position: absolute;
		    background-color: #e8f8ff;
		    padding: 3px;
		    border: 1px solid #fff;
		    border-radius: 64px;
		    z-index: 9;
		    transform: translateY(-18px);
		}
		.quickActionList{
			z-index: 3;
		}
		.action-menu ul:after{
		  content: "";
	      position: absolute;
	      right: 40%;
	      bottom: -20px;
	      width: 0;
	      height: 0;
	      border-top: 10px solid transparent;
	      border-right: 16px solid #e8f8ff;
	      transform: rotate(270deg);
	      border-bottom: 13px solid transparent;
		  z-index: 0;

		}
		.action-menu ul{
			margin:0;
			list-style: none;
			display: flex;
			padding: 0;
		}

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
					Address
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Address</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="add_acc">
				<i class="la la-plus"></i>
				Address
			</a>
		</div>
	</div>
	<div id="t_account_table">
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
											<form class="kt-form kt-form--fit" id="account_adv_form" autocomplete="off">
												@csrf
												<div class="bodyContent">
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Company Name</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="company_name" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Code</label>
															<input type="text" class="form-control kt-input" name="code" placeholder="" data-col-index="4" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Phone</label>
															<input type="text" name="phone_no" class="form-control kt-input advSearchInput" placeholder="" data-col-index="4" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Email</label>
															<input type="email" class="form-control kt-input" name="email" placeholder="" data-col-index="4" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>City</label>
															<input type="text" class="form-control kt-input" name="city" placeholder="" data-col-index="4" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Zip</label>
															<input type="text" class="form-control kt-input" name="zip" placeholder="" data-col-index="4" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>State</label>
															<input type="text" class="form-control kt-input" name="state" placeholder="" data-col-index="4" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Default Contact</label>
															<input type="text" class="form-control kt-input" name="default_contact" placeholder="" data-col-index="4" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>URL</label>
															<input type="text" class="form-control kt-input" name="url" placeholder="www.example.com" data-col-index="4" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Credit Terms:</label>
															<input type="text" name="credit_terms" class="form-control kt-input advSearchInput" data-col-index="1" placeholder="Eg: 2/10, net 100" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Account Since</label>
															<input type="date" name="account_since" class="form-control kt-input advSearchInput" data-col-index="1" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Status</label>
															<select class="form-control kt-input" name="status" data-col-index="7">
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
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Company Name</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="Company_name">
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="input-group input-group-sm userInputGroup">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Phone</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="industry_name_search" autocomplete="off" name="phone_no">
								</div>
							</div>
							<div id="reload_table">
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
	</div>
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}
	<script type="text/javascript">
		var usersTable = $('#t_account_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/address/table/data',
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
					field: 'add1',
					title: 'Address',
					type: 'text',
					width: 320,
					template: function(row){
						if(row.add1){
							if(row.add1.length > 50)
								return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.add1+'">'+row.add1.substring(0,50)+' ...</span>' ;
							return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.add1+'">'+row.add1+'</span>';
						}
					}
				},
				{
					sortable: true,
					field: 'add2',
					title: 'Alternate Address',
					type: 'text',
					width: 320,
					template: function(row){
						if(row.add2){
							if(row.add2.length > 50)
								return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.add2+'">'+row.add2.substring(0,50)+' ...</span>' ;
							return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.add2+'">'+row.add2+'</span>';
						}
					}
				},
				{
					sortable: true,
					field: 'county',
					title: 'County',
					type: 'text',
				},
				{
					sortable: true,
					field: 'city',
					title: 'City',
					type: 'text',
					width: 120,
				},
				{
					sortable: true,
					field: 'state',
					title: 'State',
					type: 'text',
					width: 100,
				},
				{
					sortable: true,
					field: 'zip',
					title: 'Zip',
					type: 'text',
					width: 100,
				},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					textAlign: 'center',
					overflow: 'visible',
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<div class="custom_a_btn_popover">\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_account" data-route="/admin/account/modal?edit&account=' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delButton" data-id="' + row.id + '" title="Delete" data-route="/admin/account/delete/'+row.id+'">\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],

		});
		
	$(document).ready(function() {
		let initPicker = $('#industry_picker,.adv_industry_picker').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply",
        });
		 usersTable.on('kt-datatable--on-init', function() {
	      	$(".text_to_p_mask").text(function(i, text){
				console.log(text);
				text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
				return text;
			})
	 $('[data-toggle="kt-tooltip"]').tooltip();

	    });
	    // $(".dropdown-toggle").dropdown();
	    const basicSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            usersTable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = usersTable.getDataSourceQuery('query');

	            if (sanitized.advanced) delete sanitized.advanced;
	            usersTable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
	    }
	    $(document)
    .off("click", ".bs-donebutton")
    .on("click", ".bs-donebutton", function(e) {
        e.preventDefault();
        basicSearch(false, () => {
	    	usersTable.search($('#industry_picker').val(), 'industry');
		});	
    });
 //   $(document).off('click','.bs-select-all').on('click','.bs-select-all', function() {
	//    e.preventDefault();
 //        basicSearch(false, () => {
	//     	usersTable.search($('#industry_picker').val(), 'industry');
	// 	});
	// });
	// $(document).off('click','bs.deselect-all').on('click',".bs-deselect-all", function() {
	//    e.preventDefault();
 //        basicSearch(false, () => {
	//     	usersTable.search($('#industry_picker').val(), 'industry');
	// 	});
	// });
	    $('.basic--search').off('keyup').on('keyup', function(e) {
	    	if($(this).val().length > 2 || $(this).val().length ==0)
	    	{
	    		basicSearch(false, () => {
	    		    usersTable.search($(this).val(), $(this).attr('name'));
	    		});	
	    	}
	    });
	    // advance search
	    $('#advSearchBtn').on('click', function(e) {
	        e.preventDefault();
	        let data = $('#account_adv_form').serializeArray();
	        let reducedData = data.reduce((acc, x) => {
	            acc[x.name] = x.value;
	            return acc;
	        }, {})
	        basicSearch(true, () => {
	            usersTable.search(reducedData, "advanced");
	        });
	        $('#dropdownMenuLink').css({
	            'background' : '#8b83f3',
	        });
	    });
		
	    $('#reload_table').on('click', function(e) {
	        e.preventDefault();
	        $('.userInputGroup').find('input').val('');
	        // localStorage.removeItem("t_account_table-1-meta");
	        usersTable.setDataSourceParam("query",{});
	        $('#t_account_table').KTDatatable().reload();
	        localStorage.removeItem("t_account_table-1-meta");
	    });
	    $(document).find("#statusSelect2").select2({
	    	width:'100%'
	    });
	});
	$(document).off('click','.get_account').on('click','.get_account', function(e){
	    e.preventDefault();
	    supportAjax({
	        url: $(this).data('route'),
	    }, function(resp){
	        $('#kt_body').empty().append(resp);
	    },function(err){
	        console.log(err);
	    })
	})
	$(document).on('click', '#adv_reset', function(e) {
        e.preventDefault();
        $(this).closest('form').find('input').val('');
        $('#advSearchBtn').trigger('click');
    });
	$(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    window.open('/export/account/' + $(this).attr('data-export-to'))
	});
	$(document).off('click','#adv_close').on('click','#adv_close', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('.userAdvSearchDropDown').dropdown('toggle');
	})
	</script>
</div>