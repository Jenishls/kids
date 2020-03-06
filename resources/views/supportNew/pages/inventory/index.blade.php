<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Inventory
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon-gift"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Inventory</a>
				</div>
			</div>
		</div>
		{{-- <div class="kt-subheader__wrapper">
			<a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill" id="add_inventory"><i class="la la-plus"></i>
				Inventory
			</a>
		</div> --}}
	</div>
	<div class="row" id="inventory_container">
		<div class="col-md-12">
			<div  style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
					<div class="row user_search_row">
						<div class="col-xl-11 order-1 order-xl-1 serach_col user_search_col userSearchCol">
							<div class="form-group m-form__group row align-items-center ">
								<div class="accountFilterSearch">
									<div class="dropdown accountAdvSearch">
										<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
										<!-- Advanced Search -->
										<div class="dropdown-menu userAdvSearchDropDown" id="adv_search_order">
											<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
											<div>
												<form class="kt-form kt-form--fit" id="account_adv_form" autocomplete="off">
													@csrf
													<div class="bodyContent">
														<div class="row kt-margin-b-20">
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Date</label>
																<input type="text" name="created_date" class="form-control kt-input advSearchInput dateRangePicker"  data-col-index="4" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Product Name</label>
																<input type="text" class="form-control kt-input advSearchInput"  name="product" data-col-index="0" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Company Name</label>
																<input type="text" name="company" class="form-control kt-input advSearchInput" data-col-index="1" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Inventory Name</label>
																<input type="text" class="form-control kt-input advSearchInput"  name="name" data-col-index="0" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Size</label>
																<input type="text" class="form-control kt-input advSearchInput" name="size"  data-col-index="1" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Color</label>
																<input type="text" class="form-control kt-input datePicker" name="color" data-col-index="4" autocomplete="off">
															</div>
															<div class="col-lg-4 col-md-6 pb-3">
																<label>Price</label>
																<input type="text" class="form-control kt-input datePicker" name="price" data-col-index="4" autocomplete="off">
															</div>
														</div>
														
														{{-- <div class="row kt-margin-b-20">
															<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																<label>Package Name</label>
																<input type="text" class="form-control kt-input" name="package_name" data-col-index="4" autocomplete="off">
															</div>
															<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																<label>Status</label>
																<select class="form-control kt-input" name="status" data-col-index="7">
																	<option value="" selected="">Select a Status</option>
																	<option value="1">Active</option>
																	<option value="0">Inactive</option>
																</select>
															</div>
														</div> --}}
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
								<div class="col-lg-3 col-md-2 col-sm-2">
									<div class="input-group mb-3 input-group-sm userInputGroup">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Product Name</span>
										</div>
										<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="product">
									</div>
								</div>
								<div class=" col-lg-3 col-md-2 col-sm-2">
									<div class="input-group mb-3 input-group-sm userInputGroup">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Company Name</span>
										</div>
										<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="company">
									</div>
								</div>
								<div class=" col-lg-3 col-md-2 col-sm-2">
									<div class="input-group mb-3 input-group-sm userInputGroup">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-default">Inventory Name</span>
										</div>
										<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="name">
									</div>
								</div>
								<div id="reload_table">
									<i class="fas fa-redo searchRedo"></i>
								</div>
							</div>
						</div>
						<div class="rp_btn col-xl-1 order-1 order-xl-1" style="display:inline-flex;">
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
					<div id="inventoryDataTable" style="padding: 25px;"></div>
			
				</div>
		</div>
	</div>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

    <script type="text/javascript">
        var inventoryTable = $('#inventoryDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/inventories/data',
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
                // sortable: true,
                field: 'product.name',
                title: 'Product Name',
                width: 200
            },
            {
                // sortable: true,
                field: 'company.c_name',
                title: 'Company Name',
                width: 200
            },
            {
                // sortable: true,
                field: 'name',
                title: 'Inventory Name',
                width: 200
            },
            {
                // sortable: true,
                field: 'size.size',
                title: 'Size',

            },
            {
                // sortable: true,
                field: 'color.color',
                title: 'Color',
            },
            {
                // sortable: true,
                field: 'quantity',
                title: 'Quantity',
                width: 80,
                textAlign: 'center'
            },
            {
                // sortable: true,
                field: 'price',
                title: 'Price',
                width: 70,

            },
            {
                // sortable: true,
                field: 'inv_hold',
                title: 'Hold',
                width: 70,
                template: function(row)
                {
                	if(row.inv_hold && row.inv_hold > 0){
                		return row.inv_hold;
                	}
                	return '-';

                }

            },
            {
                // sortable: true,
                field: 'inv_sold',
                title: 'Sold',
                width: 70,
                template: function(row)
                {
                	if(row.inv_sold && row.inv_sold > 0){
                		return row.inv_sold;
                	}
                	return '-';

                }
            },
            {
                // sortable: true,
                field: 'inv_return',
                title: 'Return',
                width: 70,
                 template: function(row)
                {
                	if(row.inv_return && row.inv_return > 0){
                		return row.inv_return;
                	}
                	return '-';

                }

            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                width: 150,
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_inv" data-route="/admin/products/tab/inventory/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_inventory" data-url ="admin/products/tab/inventory/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }

        ],

	});
	
	$(document).off('click', '.del_inventory').on('click', '.del_inventory', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#inventoryDataTable')
        });
	})
	
	$('.dateRangePicker').daterangepicker({
		buttonClasses: ' btn',
		autoUpdateInput: false,
		applyClass: 'btn-primary',
		cancelClass: 'btn-secondary',

		locale: {
			format: 'YYYY-MM-DD',
			separator: '/',
		}
	}, function(start_date, end_date) {
		this.element.val(start_date.format('YYYY-MM-DD')+'/'+end_date.format('YYYY-MM-DD'));
	}).on('apply.daterangepicker', function(ev, picker) {
		$('.dateRangePicker').data('daterangepicker').hide();
		$('#adv_search_order').addClass('show');
	});
	
	$(document).off('click', '.update_status').on('click', '.update_status', function(e){
        e.preventDefault();
        showModal({
				url: '/admin/package/status/update/'+$(this).attr('data-id')
			});
	})
	$(document).off('click', '#add_inventory').on('click', '#add_inventory', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/inventories/add',
			c: 1,
			width: '100%'
		});
	})

    $(document).off('click', '.edit_inv').on('click', '.edit_inv', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: $(this).data('route'),
			width: 700,
			c:1
		});
	})

		// search
		var basicSearch = (advanced = false, cb = "default cb") => {
			if (advanced) {
				inventoryTable.setDataSourceParam("query", {});
			} else {
				let sanitized = inventoryTable.getDataSourceQuery('query');

				if (sanitized.advanced) delete sanitized.advanced;
				inventoryTable.setDataSourceParam("query", sanitized);
			}
			typeof cb === "function" ? cb() : '';
		}

		$('.basic--search').off('keyup').on('keyup', function(e) {
			if($(this).val().length > 2 || $(this).val().length ==0)
			{
				basicSearch(false, () => {
					inventoryTable.search($(this).val(), $(this).attr('name'));
				});	
			}
		});
		var initPicker = $('#status_picker,.adv_status_picker').selectpicker({
			liveSearch: true,
			showTick: true,
			actionsBox: true,
			doneButton : true, 
			doneButtonText : "Apply",
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
				inventoryTable.search(reducedData, "advanced");
			});
			$('#dropdownMenuLink').css({
				'background' : '#8b83f3',
			});
		});
		
		$('#reload_table').on('click', function(e) {
			e.preventDefault();
			$('.userInputGroup').find('input').val('');
			// localStorage.removeItem("orderDataTable-1-meta");
			inventoryTable.setDataSourceParam("query",{});
			$('#inventoryDataTable').KTDatatable().reload();
			localStorage.removeItem("inventoryDataTable-1-meta");
		});

	</script>
</div>