<style type="text/css">
	/*action buttons on click event*/
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
	@media only screen and (max-width: 1450px){
		.custom-input__group_responsive.col-lg-4{
			-webkit-box-flex: 0;
		    -ms-flex: 0 0 45.33333%!important;
		    flex: 0 0 45.33333%!important;
		    max-width: 45.33333%!important;
		    padding-bottom: 10px!important;
		}
		.custom-input__group_responsive.start_of_other_i_row{
			padding-left: 8.666%!important;
		}
	}
	.advSearchResetBtn .btn_p_p4rem {
	    padding: 0.50rem 0.60rem!important;
	    font-size: 0.9rem!important;
	}
	#adv_industry_picker_container .select2-selection__rendered {
    	line-height: 15px !important;
	}
	#adv_industry_picker_container .select2-container .select2-selection--single {
		height: 32px !important;
	}
	#adv_industry_picker_container .select2-selection__arrow {
		height: 32px !important;
	}


	#statusSelectPickerContainer .bootstrap-select {
    	height: 32px!important;
	}
	#statusSelectPickerContainer .bootstrap-select button{
    	height: 32px!important;
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
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Campaign
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">CRM</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Campaign</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a href="javascript:;" class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="add_campaign">
				<i class="la la-plus"></i>
				Campaign
			</a>
		</div>
	</div>
	<div id="t_campaign">
		<div class="alert alert-light alert-elevate search_top_container" role="alert">
			<div class="alert-text">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 serach_col user_search_col userSearchCol">
						<div class="form-group m-form__group row align-items-center">
							<div class="accountFilterSearch mr-2">
								<div class="dropdown">
									<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon " role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
									<!-- Advanced Search -->
									<div class="dropdown-menu userAdvSearchDropDown">
										<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
										<div>
											<form class="custom-form kt-form--fit" id="campaign_adv_form" autocomplete="off">
												@csrf
												<div class="bodyContent">
													<div class="row">
														<div class="col-lg-4 col-md-6">
															<label>Campaign Name</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="campaign_name" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 col-md-6">
															<label>Campaign Code</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="campaign_code" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 col-md-6">
															<label>Budget</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="budget" data-col-index="0" autocomplete="off">
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
							</div>
							<div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 306px;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Campaign Name</button>
								</div>
								<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="campaign_name">
							</div>
							<div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 200px;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn " type="button">Budget</button>
								</div>
								
								<input type="text" class="form-control basic--search budgetSearch" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="budget">
							</div>
							<div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 180px;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn " type="button">Start From</button>
								</div>
								<input type="text" class="form-control basic--search tableDataPicker" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="campaign_budget">
							</div>
							<div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 180px;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn " type="button">End Date</button>
								</div>
								<input type="text" class="form-control basic--search tableDataPicker" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="campaign_budget">
							</div>
							<div class="input-group input-group-sm userInputGroup ml-1 basicSelect"  style="width: 200px;">
								<div class="input-group-prepend">
									<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Active</button>
								</div>
								<div id="statusSelectPickerContainer">
									<select name="status" id="statusMainSelect2" class="form-control basic--search">
										<option value="" selected>Select a Status</option>
										<option value="active" >Active</option>
										<option value="inactive">Inactive</option>
									</select>
								</div>
								{{-- <input type="text" class="form-control basic--search e_mask_phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="phone_no"> --}}
							</div>
							<div id="reload_table" class="reloadCampaignTable ml-4">
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
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script> --}}
</div>
	<script type="text/javascript">
		var campaignTable = $('#t_campaign').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/campaign/list',
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
			rows:{
				afterTemplate: function(row, data, index)
				{
					
					$(".mask_budget").inputmask("currency");
					if($('#t_campaign').hasClass('addedNew'))
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
					sortable: true,
					field: 'campaign_code',
					title: 'Code',
					type: 'text',
					width: 120,
					template(row){
						if(row.campaign_code){
							if(row.campaign_code.length > 10)
								return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.campaign_code+'">'+row.campaign_code.substring(0,10)+' ...</span>' ;
							return '<span data-toggle="kt-tooltip" data-placement="bottom" title="" data-original-title="'+row.campaign_code+'">'+row.campaign_code+'</span>';
						}
					}
				},{
					sortable: true,
					field: 'name',
					title: 'Campaign Name',
					type: 'text',
					width: 280
                },
				{
					sortable: true,
					field: 'budget',
					title: 'Budget($)',
					type: 'text',
					width:80,
					template:function(row)
					{
						return `
							<span class="mask_budget">${row.budget?row.budget:0.00}</span>
						`;
					}
				},
                {
					sortable: true,
					field: 'start_date',
					title: 'Start Date',
					type: 'text',
					width: 70,
					template(row){
						if(row.start_date){
							return moment(row.start_date).format("{{settingsValue('momentDateFormat')}}");
	 					}
					}
                },
                {
					sortable: true,
					field: 'end_date',
					title: 'End Date',
					type: 'text',
					width: 70,
					template(row){
						if(row.end_date){
							return moment(row.end_date).format("{{settingsValue('momentDateFormat')}}");
	 					}
					}
				},
				{
					sortable: true,
					field: 'category',
					title: 'Category',
                    type: 'text',
                    template: function(row){
                        if(row.category){
                            if(row.category.category){
                                return row.category.category;
                            }
                        }
                        return '-';
                    }
				},
				{
					sortable: true,
					field: 'status',
					title: 'Status',
					type: 'text',
					width: 100,
					class: 'kt-datatable--off-click_over_action_btn',
					template(row){
						if(row.is_active){
							if(row.is_default)
							return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill" style="padding:10px 15px;">Default</span>`;
							return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill" style="padding:10px 15px;">Active</span>`;
						}
							if(row.is_default)
							return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Default</span>`;
							return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactive</span>`;
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
						return '<div class="custom_a_btn_popover">\<a class="btn btn-hover-brand btn-icon btn-pill pageload" onclick="event.preventDefault();" data-route="/admin/campaign/view/' + row.id + '" data-callback="active_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill editCamp" data-route="/admin/campaign/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delCamp" title="Delete" data-route="/admin/campaign/delete/'+row.id+'">\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],
		});
	$(document).ready(function() {
		$(".budgetSearch").inputmask("currency");
        $('.tableDataPicker').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2001,
            maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start_date, end_date) {
            this.element.val(start_date.format("{{settingsValue('momentDateFormat')}}"));
        });
		$('.reloadCampaignTable').off('click').on('click', function(e) {
			e.preventDefault();
			$('#t_campaign .userInputGroup').find('input').val('');
			$('#industry_picker').selectpicker("val","");
			$('#statusMainSelect2').selectpicker("val","");
			$('#campaign_adv_form [name="status"]').selectpicker("val","");
			campaignTable.setDataSourceParam("query",{});
			$('#t_campaign').KTDatatable().reload();
			localStorage.removeItem("t_campaign-1-meta");
			$('#dropdownMenuLink, .searchRedo').removeClass('dropdown-on-active');
		});
	
		let mainStatus= $('#statusMainSelect2').selectpicker({
			width:150,
			height: 10,
			placeholder:'Select a Status'
		}).on('change', function(e){
			let length = $(this).val().length;
			let el =$('.searchRedo');

			clearInterval(currentTimeout)
				currentTimeout = setTimeout(() => {
					campaignTableSearch(false, () => {
						campaignTable.search($(this).val(), $(this).attr('name'));
						length == 0 ?  el.removeClass('dropdown-on-active'): el.addClass('dropdown-on-active');
					}); 
				}, 1500);	
		});
		let industrySelect2 = $('#adv_industry_picker').select2({
			width: '100%',
	        placeholder: "",
	        ajax: {
	            method: 'POST',
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: function (params) {
	              return '/admin/account/industries'
	            },
	            processResults: function (data) {
	                let res = [];
	                $.each(data, function(i , obj){
	                    res.push({
	                        id: obj.industry,
	                        text : obj.industry,
	                        data : obj
	                    });
	                });
	                return {
	                    results: res
	                };
	            }
	        }
	    })
		campaignTable.on('kt-datatable--on-init', function() {
		 	$('[data-toggle="kt-tooltip"]').tooltip();
	      	$(".text_to_p_mask").text(function(i, text){
				text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
				return text;
			});
	    });
	    var campaignTableSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            campaignTable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = campaignTable.getDataSourceQuery('query');
	            if (sanitized.advanced) delete sanitized.advanced;
	            campaignTable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
		}
	    $('#industryStartPickerContainer .bs-donebutton').on('click', function(e,){
			e.preventDefault();
	        campaignTableSearch(false, () => {
		    	campaignTable.search($('#industry_picker').val(), 'industry');
			});
		});
	    // advance search
	    $('#advSearchBtn').off('click').on('click', function(e) {
	        e.preventDefault();
	        let data = $('#campaign_adv_form').serializeArray();
	        let reducedData = data.reduce((acc, x) => {
	            acc[x.name] = x.value;
	            return acc;
	        }, {});
	        campaignTableSearch(true, () => {
	            campaignTable.search(reducedData, "advanced");
	        });
			$('#dropdownMenuLink, .searchRedo').addClass('dropdown-on-active');
	    });
	    $(document).find('#campaign_adv_form [name="status"]').select2({
			width:'100%',
		});
		$(document).on('click', '#adv_reset', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$(this).closest('form').find('input').val('');
			$('#dropdownMenuLink, .searchRedo').removeClass('dropdown-on-active');
		});
		$(document).off('click', '.exportTo').on('click', '.exportTo', function(e) {
			e.preventDefault();
			e.stopPropagation();
			window.open('/export/account/' + $(this).attr('data-export-to'));
		});
		$(document).off('click','#adv_close').on('click','#adv_close', function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.userAdvSearchDropDown').dropdown('toggle');
		})
		let currentTimeout = '';
		$('#t_campaign .basic--search').off('blur keyup').on('blur keyup', function(e) {
			let length = $(this).val().length;
        	let el =$('.searchRedo');
			if(length > 2 || length == 0)
			{
				clearInterval(currentTimeout)
				currentTimeout = setTimeout(() => {
					campaignTableSearch(false, () => {
						campaignTable.search($(this).val(), $(this).attr('name'));
						length == 0 ?  el.removeClass('dropdown-on-active'): el.addClass('dropdown-on-active');
					}); 
				}, 1500);

			}
		});
	});
	</script>