<div class="row">
    <div class="col-xl-8">
		<div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile mb-0" style="height: 60px; border-bottom: 1px solid #ebedf2;">
			<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Orders
					</h3>
				</div>
			</div>
		</div>
		<div class="row" id="package_container">
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
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Date</label>
																	<input type="text" name="order_date" class="form-control kt-input advSearchInput dateRangePicker"  data-col-index="4" autocomplete="off">
																</div>
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Name</label>
																	<input type="text" class="form-control kt-input advSearchInput"  name="customer_name" data-col-index="0" autocomplete="off">
																</div>
				
															</div>
															<div class="row kt-margin-b-20">
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Phone</label>
																	<input type="text" name="customer_phone" class="form-control kt-input advSearchInput" data-col-index="1" autocomplete="off">
																</div>
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Order Number</label>
																	<input type="text" class="form-control kt-input advSearchInput" name="order_no"  data-col-index="1" autocomplete="off">
																</div>
				
															</div>
				
															<div class="row kt-margin-b-20">
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Moving date</label>
																	<input type="text" class="form-control kt-input datePicker" name="moving_date" data-col-index="4" autocomplete="off">
																</div>
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Pickup date</label>
																	<input type="text" class="form-control kt-input datePicker" name="return_date" data-col-index="4" autocomplete="off">
																</div>
															</div>
															
															<div class="row kt-margin-b-20">
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Package Name</label>
																	<input type="text" class="form-control kt-input" name="package_name" data-col-index="4" autocomplete="off">
																</div>
																<div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
																	<label>Status</label>
																	<select class="form-control kt-input" name="statuses" data-col-index="7">
																		<option value="confirmed" >
																			Confirmed
																		</option>
																		<option value="converted" >
																			Converted
																		</option>
																		<option value="deleted" >
																			Deleted
																		</option>
																		<option value="delivered" >
																			Delivered
																		</option>
																		<option value="pending" >
																			Pending
																		</option>
																		<option value="picked_up">
																			Picked up
																		</option>
																		<option value="losed" >
																			Closed
																		</option>
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
										<div class="input-group mb-3 input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-default">Name</span>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="Company_name_search" autocomplete="off" name="customer_name">
										</div>
									</div>
									{{-- <div class="col-md-2 col-sm-2">
										<div class="input-group mb-3 input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="Company_name_search" autocomplete="off" name="customer_phone">
										</div>
				
									</div>
									<div class="col-md-2 col-sm-2">
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
									<div class="col-md-3 col-sm-3">
										<div class="input-group mb-3 input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-default">Moving Date</span>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="moving_date" autocomplete="off" name="moving_date">
										</div>
				
									</div>
									<div class="col-md-3 col-sm-3">
										<div class="input-group mb-3 input-group-sm userInputGroup">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroup-sizing-default">Pickup Date</span>
											</div>
											<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="return_date" autocomplete="off" name="return_date">
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
													<span class="kt-nav__link-text exportOrderTo" data-export-to="csv">CSV</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon la la-file-pdf-o"></i>
													<span class="kt-nav__link-text exportOrderTo" data-export-to="pdf">PDF</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
				
							</div>
						</div>
						<div id="orderDashDataTable" style="padding: 25px;"></div>
				
					</div>
			</div>
		</div> 
	</div>    

    <div class="col-xl-4">
        <!--Begin::Portlet-->
	<div class="kt-portlet kt-portlet--height-fluid">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Contacts
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
			</div>
		</div>
		<div class="kt-portlet__body p-0">
			<div id="t_contact_tables">
			        <div class="alert alert-light alert-elevate search_top_container" role="alert">
			            <div class="alert-text">
			                <div class="row">
			                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 order-1 order-xl-1 serach_col user_search_col userSearchCol">
			                        <div class="form-group m-form__group row align-items-center">
			                            <div class=" col-lg-5 col-md-6 custom-input__group_responsive">
			                                <div class="input-group input-group-sm userInputGroup">
			                                    <div class="input-group-prepend">
			                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Name</button>
			                                    </div>
			                                    <input type="text" class="form-control bsearch" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="name">
			                                </div>
			                            </div>
			                            <div class="col-lg-5 col-md-6 custom-input__group_responsive">
			                                <div class="input-group input-group-sm userInputGroup">
			                                    <div class="input-group-prepend">
			                                        <button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Phone</button>
			                                    </div>
			                                    <input type="text" class="form-control bsearch e_mask_phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." autocomplete="off" name="phoneNo">
			                                </div>
			                            </div>
			                            
			                        </div>
			                    </div>
			                    <div class="rp_btn col-sm-1 order-1 order-xl-1" style="display:inline-flex;">
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
			                                            <span class="kt-nav__link-text exportClientTo" data-export-to="csv">CSV</span>
			                                        </a>
			                                    </li>
			                                    <li class="kt-nav__item">
			                                        <a href="#" class="kt-nav__link">
			                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
			                                            <span class="kt-nav__link-text exportClientTo" data-export-to="pdf">PDF</span>
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
		</div>
	</div>
	<!--End::Portlet-->    
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(e){
			var ordersTable = $('#orderDashDataTable').KTDatatable({
				// datasource definition
				data: {
					type: 'remote',
					source: {
						read: {
							url: '/admin/order/data',
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
					pageSize: 10,
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
						sortable: false,
						template: function(row, index, datatable) {
							return index+1;
						}

					},
					// {
					// 	// sortable: true,
					// 	field: 'created_at',
					// 	title: 'Date',
					// 	// width: 70,
					// 	template: function(row, index, datatable) {
					// 		return moment(row.created_at).format('MM/DD/YYYY');
					// 	},

					// },
					{
						// sortable: true,
						field: 'order_no',
						title: 'Order #',
						// width: 70,

					},
					// {
					// 	sortable: true,
					// 	field: 'package.package_name',
					// 	title: 'Package',
					// 	type: 'text',
					// 	// width: 100,
					// },
					{
						sortable: true,
						field: 'customer_name',
						title: 'Customer',
						// width: 200,
						template: function(row, index, datatable) {
							console.log(row);
							if(row.client){
								if(row.client.mname){
									return row.client.fname + ' '+ row.client.mname+' '+ row.client.lname;
								}else{
									return row.client.fname + ' '+ row.client.lname;
								}
							}
							else if(row.company){
								return row.company.c_name;
							}
							else{
								return "-";
							}
						}
					},
					{
						// sortable: true,
						field: 'client.phone_no',
						title: 'Phone',
						// width: 100,
					},
					// {
					// 	// sortable: true,
					// 	field: 'amount',
					// 	title: 'Invoice ($)',
					// 	// width: 80,

					// },
					{
						// sortable: true,
						field: 'delivery_date',
						title: 'Moving Date',
						// width: 130,
						template: function(row, index, datatable) {
							if(row.delivery_date){
								return moment(row.delivery_date).format('MM/DD/YYYY');
							}
							else{
								return "-";
							}
						},

					},
					{
						// sortable: true,
						field: 'pickup_date',
						title: 'Pickup Date',
						// width: 130,
						template: function(row, index, datatable) {
							if(row.pickup_date){
								return moment(row.pickup_date).format('MM/DD/YYYY');
							}
							else{
								return "-";
							}
						},

					},
					{
						sortable: true,
						field: 'order_status',
						title: 'Status',
						type: 'text',
						// width: 100,
						template(row){
							if(row.order_status == "confirmed"){
								return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}">Confirmed</span>`;
							}
							else if(row.order_status == "delivered"){
								return `<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}" >Delivered</span>`;
							}
							else if(row.order_status == "closed"){
								return `<span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}">Closed</span>`;
							}
							else if(row.order_status == "deleted"){
								return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}">Deleted</span>`;
							}
							else if(row.order_status == "picked_up"){
								return `<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill pointer update_status"  style="background: #48cfbd; color: #fff;" data-id="${row.id}">Picked Up</span>`;
							}
							return `<span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill pointer update_status" data-id="${row.id}" >Pending</span>`;
						}
					},
					{
						field: 'Actions',
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						textAlign: 'right',
						// width: 130,
						template: function(row, index, datatable) {
							var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
							return '<a class="btn btn-hover-brand btn-icon btn-pill pageload" data-callback="active_clients_current_row" data-route="/admin/order/detail/'+row.id+'"><i class="la la-eye" title="View Product"></i></a>';
						},
					}
				],
			});
			function active_clients_current_row() {
				let url = Cookies.get("active_clients_current_row");
				$(`[data-route="${url}"]`)
					.closest("tr")
					.addClass("active_row")
					.siblings("tr.active_row")
					.removeClass("active_row");
			}
			ordersTable.on('kt-datatable--on-init', function(){
				setTimeout(active_clients_current_row,        
				400);
			})

			var basicSearch = (advanced = false, cb = "default cb") => {
				if (advanced) {
					ordersTable.setDataSourceParam("query", {});
				} else {
					let sanitized = ordersTable.getDataSourceQuery('query');

					if (sanitized.advanced) delete sanitized.advanced;
					ordersTable.setDataSourceParam("query", sanitized);
				}
				typeof cb === "function" ? cb() : '';
			}

			$('#package_container .basic--search').off('keyup').on('keyup', function(e) {
				if($(this).val().length > 2 || $(this).val().length ==0)
				{
					basicSearch(false, () => {
						ordersTable.search($(this).val(), $(this).attr('name'));
					});	
				}
			});

			$('#order_date').daterangepicker({
				buttonClasses: ' btn',
				applyClass: 'btn-primary',
				cancelClass: 'btn-secondary',
				autoUpdateInput: false,
				locale: {
					format: 'YYYY-MM-DD',
					separator: '/',
				}
			}, function(start, end, label) {
				basicSearch(false, () => {
					ordersTable.search(start.format('YYYY-MM-DD') +"/"+ end.format('YYYY-MM-DD'), 'order_date');
				});
			});

			$('#moving_date').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				minYear: 2001,
				autoUpdateInput: false,
				maxYear: parseInt(moment().format('YYYY'),10)
			}, function(start, end, label) {
				basicSearch(false, () => {
					ordersTable.search(start.format('YYYY-MM-DD'), 'moving_date');
				});
			});
			
			$('#return_date').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				minYear: 2001,
				autoUpdateInput: false,
				maxYear: parseInt(moment().format('YYYY'),10)
			}, function(start, end, label) {
				basicSearch(false, () => {
					ordersTable.search(start.format('YYYY-MM-DD'), 'return_date');
				});
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
					ordersTable.search(reducedData, "advanced");
				});
				$('#dropdownMenuLink').css({
					'background' : '#8b83f3',
				});
			});
			
			$('#reload_table').on('click', function(e) {
				e.preventDefault();
				$('.userInputGroup').find('input').val('');
				// localStorage.removeItem("orderDashDataTable-1-meta");
				ordersTable.setDataSourceParam("query",{});
				$('#orderDashDataTable').KTDatatable().reload();
				localStorage.removeItem("orderDashDataTable-1-meta");
			});

			$('.datePicker').daterangepicker({
				singleDatePicker: true,
				autoUpdateInput: false,
				showDropdowns: true,
				minYear: 2001,
				maxYear: parseInt(moment().format('YYYY'),10)
			}, function(start_date, end_date) {
				this.element.val(start_date.format('YYYY-MM-DD'));
			});

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

			let initPicker = $('#status_picker,.adv_status_picker').selectpicker({
				liveSearch: true,
				showTick: true,
				actionsBox: true,
				doneButton : true, 
				doneButtonText : "Apply",
			});

			$(document).off("click", ".bs-donebutton").on("click", ".bs-donebutton", function(e) {
				e.preventDefault();
				basicSearch(false, () => {
					ordersTable.search($('#status_picker').val(), 'status');
				});	
			});			

			$(document).off('click', '.exportOrderTo').on('click', '.exportOrderTo', function(e) {
				e.preventDefault();
				e.stopPropagation();
				window.open('/export/order/' + $(this).attr('data-export-to'))
			});

			$(document).off('click', '#add_order').on('click', '#add_order', function(e) {
				e.preventDefault();
				e.stopPropagation();
				showModal({
					url: "admin/order/add",
					c:1,
				});
			})
			$(document).off('click','#adv_close').on('click','#adv_close', function(e){
				e.preventDefault();
				e.stopPropagation();
				$('.userAdvSearchDropDown').dropdown('toggle');
			});
		});
		var contactDataTables = $('#t_contact_tables').KTDatatable({
		    // datasource definition
		    data: {
		        type: 'remote',
		        source: {
		            read: {
		                url: '/admin/client/list',
		                method: 'get',
		                // params: {
		                //  "_token": "{{ csrf_token() }}"
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
		        pageSize: 10,
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
		            field: 'name',
		            title: 'Name',
		            width: 200,
		            template(row){
		                let template ='<div class="kt-user-card-v2">';
		                if(row.fname){
		                    if(row.image && row.image.file_name){
		                        template+=`
		                         <div class="kt-user-card-v2__pic">
		                            <img src="/admin/account/member/image/${row.image.file_name}" alt="${row.fname}" />
		                        </div>
		                        `
		                    }else
		                    {
		                        template+=`
		                         <div class="kt-user-card-v2__pic">
		                            <img src="/media/blog/No_Image_Available.jpg" alt="${row.fname}" />
		                        </div>
		                        `
		                    }
		                    template += `
		                        <div class="kt-user-card-v2__details">
		                            <span class="kt-user-card-v2__name">${row.fname} ${row.lname}</span>
		                            `;
			                    if(row.email)
			                    	template+=`<span class="kt-user-card-v2__name" style="font-size:0.9rem;">${row.email}</span>`;
			                    template+='</div>';
		                }
		                template+='</div>';
		                return template;
		            }
		        },
		        {
		            sortable: true,
		            field: 'phone_no',
		            title: 'Phone',
		            type: 'text',
		           
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
		                return '<a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-backurl="/admin/dashboard" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/'+row.id+'" data-callback="active_clients_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/admin/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
		                    <i class="la la-edit"></i>\
		                </a>\
		                <a href="#" class="btn btn-hover-danger btn-icon btn-pill delClient" data-id="' + row.id + '" title="Delete">\
		                    <i class="la la-trash"></i>\
		                </a>';
		            },
		        }
		    ],
		});

		$('.exportClientTo').off('click').on('click', function(e){
			let type= $(this).attr('data-export-to');
			 window.open("/admin/export/clients/" +type);
		})
		 contactDataTables.on('kt-datatable--on-init', function() {
		    $('[data-toggle="kt-tooltip"]').tooltip();
		    $(".text_to_p_mask").text(function(i, text){
		        text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
		        return text;
		    });
		});
		var bSearch = (advanced = false, cb = "default cb") => {
		    if (advanced) {
		        contactDataTables.setDataSourceParam("query", {});
		    } else {
		        let sanitized = contactDataTables.getDataSourceQuery('query');
		        if (sanitized.advanced) delete sanitized.advanced;
		        contactDataTables.setDataSourceParam("query", sanitized);
		    }
		    typeof cb === "function" ? cb() : '';
		}

		(() => {
			let currentTimeout = '';
			$('#t_contact_tables .bsearch').off('blur keyup').on('blur keyup', function(e) {
			    if($(this).val().length > 2 || $(this).val().length == 0)
			    {
			        clearInterval(currentTimeout)
			        currentTimeout = setTimeout(() => {
			        	bSearch(false, () => {
				            contactDataTables.search($(this).val(), $(this).attr('name'));
				        }); 
			        }, 1500);

			    }
			});
		})();


		

	</script>