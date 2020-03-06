<style>
	 @media screen and (max-width: 1023px){
        .custom__offset {
            margin-left: 5.5%!important;
            padding-top: 10px!important;
        }
    }
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Products
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon-gift"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Product</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper">
			<a class="btn btn-brand btn-elevate btn-icon-sm pointer btn-pill" id="add_product"><i class="la la-plus"></i>
				Product
			</a>
		</div>
	</div>

	<div  style="box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color: #ffffff; margin-bottom: 20px; border-radius: 4px;">
		<div class="row user_search_row">
			<div class="col-lg-9 col-md-10 order-1 order-1 serach_col user_search_col userSearchCol">
				<div class="form-group m-form__group row align-items-center ">
					<div class="accountFilterSearch">
						<div class="dropdown accountAdvSearch">
							<button type="button" class="btn btn-brand btn-elevate btn-circle btn-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i title="Advanced search" class="fas fa-filter"></i></button>
							<!-- Advanced Search -->
							<div class="dropdown-menu userAdvSearchDropDown">
								<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 33.5px;"></span>
								<div>
									<form class="kt-form kt-form--fit" id="account_adv_form" autocomplete="off">
										@csrf
										<div class="bodyContent">
											<div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Product  Name</label>
													<input type="text" class="form-control kt-input advSearchInput" placeholder="Company Name" name="company_name" data-col-index="0" autocomplete="off">
												</div>
												{{-- <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Ownership</label>
													<input type="text" name="ownership" class="form-control kt-input advSearchInput" placeholder="ownership" data-col-index="4" autocomplete="off">
												</div> --}}

											</div>
											<div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Industry</label>
													<input type="text" class="form-control kt-input advSearchInput" name="industry" placeholder="Industry" data-col-index="1" autocomplete="off">
												</div>
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Credit Terms:</label>
													<input type="text" name="credit_terms" class="form-control kt-input advSearchInput" placeholder="" data-col-index="1" autocomplete="off">
												</div>

											</div>

											<div class="row kt-margin-b-20">
												<!-- <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>SSN</label>
													<input type="text" class="form-control kt-input" name="ssn" placeholder="Social security no." data-col-index="4" autocomplete="off">
												</div> -->
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>URL</label>
													<input type="text" class="form-control kt-input" name="url" placeholder="www.example.com" data-col-index="4" autocomplete="off">
												</div>


											</div>
											<!-- <div class="row kt-margin-b-20">
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Status</label>
													<select class="form-control kt-input" data-col-index="7">
														<option value="">Select</option>
														<option value="">Active</option>
														<option value="">Inactive</option>
													</select>
												</div>
												<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
													<label>Supervisor</label>
													<select class="form-control kt-input" data-col-index="6" id="advSearchSup" multiple>
														<option value="">Select</option>
													</select>
												</div>
											</div> -->
										</div>
										<div class="row userAdvFooter p-2">
											<div class="footerLeftBtns">
												<!-- <div>
													<button class="btn btn-secondary btn-secondary--icon" id="adv_close">
														Close
													</button>
												</div> -->
												<div class="advSearchResetBtn">
													<button class="btn btn-secondary btn-secondary--icon" id="adv_reset">
														Reset
													</button>
												</div>
											</div>
											<div class="">
												<button class="btn btn-primary btn-brand--icon" id="advSearchBtn">
													Apply
												</button>
											</div>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
					<div class=" col-lg-3 col-md-5 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Name</span>
							</div>
							<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="product_name">
						</div>
					</div>
					<div class="  col-lg-3 col-md-5 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Brand</span>
							</div>
							<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="brand">
						</div>
					</div>
					{{-- <div class="col-md-3 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Status</span>
							</div>
							<select name="status[]" data-title="Select Status" id="status_picker" multiple="">
								<option value="cancelled" data-content="Cancelled">
									Cancelled
								</option>
								<option value="pending" data-content="Pending">
									Pending
								</option>
								<option value="return" data-content="Return">
									Return
								</option>
								<option value="shipped" data-content="Shipped">
									Shipped
								</option>
							</select>
						</div>
					</div> --}}
					<div class="  col-lg-3 custom__offset col-md-5 col-sm-3">
						<div class="input-group mb-3 input-group-sm userInputGroup">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-default">Category</span>
							</div>
							<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="moving_date" autocomplete="off" name="category">
						</div>

					</div>
					<div id="reload_table custom__offset">
						<i class="fas fa-redo searchRedo"></i>
					</div>
				</div>
			</div>
			<div class="rp_btn col-md-2 col-lg-2 order-1" style="display:inline-flex;">
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
        <div id="productDataTable" style="padding: 25px;"></div>

	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

    <script type="text/javascript">
        var productTable = $('#productDataTable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/products/allData',
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
                field: '#',
                title: '#',
                width: 30,
                template: function(row, index, datatable) {
                    return index+1;
                }

            },{
                // sortable: true,
                field: 'code',
                title: 'Code',
                width: 50,

            },{
                // sortable: true,
                field: 'name',
                title: 'Name',
                width: 200,

            },
            {
                field: 'brand.name',
                title: 'Brand',
                // width: 350,
            },
            {
                field: 'unit_price_label',
                title: 'Unit Price ($)',
                // width: 350,

            },
            {
                field: 'row.categories[0].category',
                title: 'Category',
                template: function(row, index, datatable) {
					if(row.categories[0]){
						return row.categories[0].category;
					}else{
						return "-"
					}
				}
            },
            {
				field: 'inv_hold',
				sortable: false,
                title: 'Inventory Hold',
                // width: 350,
            },
            {
				field: 'inv_sold',
				sortable: false,
                title: 'Inventory Sold',
                // width: 350,
            },

            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                textAlign: 'center',
                template: function(row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                    return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-route="/admin/products/detail/'+row.id+'"><i class="la la-eye" title="View Product"></i></a>\<a class="btn btn-hover-brand btn-icon btn-pill model_load edit_product" data-route="/admin/products/edit/'+row.id+'" data-toggle="modal"  title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-hover-danger btn-icon btn-pill del_product" data-url ="admin/products/delete/'+row.id+'" title="Delete">\
                            <i class="la la-trash"></i>\
                        </a>';
                },
            }
        ],
	});
	$(document).off('click', '.del_product').on('click', '.del_product', function(e){
        e.preventDefault();
        delConfirm({
			url: $(this).attr('data-url'),
			header: $('#productDataTable')
        });
    })
	$(document).off('click', '#add_product').on('click', '#add_product', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/products/add',
			c: 1
		});
	}).off('click', '.delete-product').on('click', '.delete-product', function(e) {
		e.preventDefault();
		delConfirm({
			url: $(this).data('route'),
			header: $('#t_account_table')
		});
	});
    $(document).off('click', '.edit_product').on('click', '.edit_product', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: $(this).data('route'),
			c: 1
		});
	})

	$('#reload_table').on('click', function(e) {
		e.preventDefault();
		$('.userInputGroup').find('input').val('');
		// localStorage.removeItem("orderDataTable-1-meta");
		productTable.setDataSourceParam("query",{});
		$('#orderDataTable').KTDatatable().reload();
		localStorage.removeItem("orderDataTable-1-meta");
	});

	$('.basic--search').off('keyup').on('keyup', function(e) {
		if($(this).val().length > 2 || $(this).val().length ==0)
		{
			basicSearch(false, () => {
				productTable.search($(this).val(), $(this).attr('name'));
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
			productTable.search(reducedData, "advanced");
		});
		$('#dropdownMenuLink').css({
			'background' : '#8b83f3',
		});
	});

	var basicSearch = (advanced = false, cb = "default cb") => {
		if (advanced) {
			productTable.setDataSourceParam("query", {});
		} else {
			let sanitized = productTable.getDataSourceQuery('query');

			if (sanitized.advanced) delete sanitized.advanced;
			productTable.setDataSourceParam("query", sanitized);
		}
		typeof cb === "function" ? cb() : '';
	}

	var initPicker = $('#status_picker,.adv_status_picker').selectpicker({
		liveSearch: true,
		showTick: true,
		actionsBox: true,
		doneButton : true, 
		doneButtonText : "Apply",
	});
	</script>
</div>