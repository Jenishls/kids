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
		
	.userAdvSearchDropDown input.form-control{
		height: 0px!important;
		padding: 16px 14px!important;
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
	.input-group-prepend button.searchByRoleSelectBtn:hover{
		background:#e8f8ff!important;
		border: 1px solid #e8f8ff!important;
	}
	.kt-datatable > .kt-datatable__table > .kt-datatable__head{
	    background: #e8f8ff !important;
	}
	.kt-datatable__table .kt-datatable__row th span {
	    font-size: 1rem!important;
	    font-weight: 600!important;
	}
	.adv_apply_btn{
		color: #22b9ff!important;
	    border-color: #22b9ff!important;
	    font-size: 1rem !important;
	}
	.adv_apply_btn:hover{
		background-color: #22b9ff!important;
		color: white!important;
	}
	.adv_reset_btn{
		color: #22b9ff!important;
	    border-color: #22b9ff!important;
	    font-size: 1rem !important;
	}
	.adv_reset_btn:hover{
		background-color: #22b9ff!important;
		color: white!important;
	}
	.adv_close_btn{
		color: #22b9ff!important;
	    border-color: #22b9ff!important;
	    font-size: 1rem !important;
	}
	.adv_close_btn:hover{
		background-color: #22b9ff!important;
		color: white!important;
	}

</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Payment
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Payment</a>
				</div>
			</div>
		</div>
		{{-- <div class="kt-subheader__wrapper">
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm" id="add_payment">
				<i class="la la-plus"></i>
				Payment
			</a>
		</div> --}}
	</div>
	<div id="t_payment_table">
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
											<form class="kt-form kt-form--fit" id="payment_adv_form" autocomplete="off">
												@csrf
												<div class="bodyContent">
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Payment Date</label>
															<input type="text" id="adv_payment_date" class="form-control kt-input advSearchInput" placeholder="" name="payment_date" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Order No</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="order_no" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Card Number(last 4)</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="cr_last4" data-col-index="0" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Expiry Month</label>
															<select class="form-control" class="" name="cr_exp_month" id="exp_month">
	                                                            <option value="01">Jan</option>
	                                                            <option value="02">Feb</option>
	                                                            <option value="03" >Mar</option>
	                                                            <option value="04">Apr</option>
	                                                            <option value="05">May</option>
	                                                            <option value="06">Jun</option>
	                                                            <option value="07">Jul</option>
	                                                            <option value="08">Aug</option>
	                                                            <option value="09">Sep</option>
	                                                            <option value="10" >Oct</option>
	                                                            <option value="11">Nov</option>
	                                                            <option value="12">Dec</option>
	                                                        </select>
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Expiry Year</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="cr_exp_year" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Transaction Id</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="transaction_id" data-col-index="0" autocomplete="off">
														</div>
													</div>
													<div class="row kt-margin-b-20">
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Amount</label>
															<input type="number" class="form-control kt-input advSearchInput" placeholder="" name="amount" data-col-index="0" autocomplete="off">
														</div>
														<div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
															<label>Reference #</label>
															<input type="text" class="form-control kt-input advSearchInput" placeholder="" name="ref_no" data-col-index="0" autocomplete="off">
														</div>
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
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Order No</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="order_no" autocomplete="off" name="order_no">
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="input-group input-group-sm userInputGroup">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Payment Date</button>
									</div>
									<input type="t" class="form-control basic--search basic--search-select" id="payment_date"	aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.." id="payment_date" autocomplete="off" name="payment_date">
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
		var paymentTable = $('#t_payment_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '/admin/payment/data/list',
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
					field: 'created_at',
					title: 'Payment Date',
					type: 'text',
					width: 100,
					template(row){
						if(row.created_at){
							return moment(row.created_at).format(' Do MMM , YYYY');
	 					}
					}
				},
				{
					sortable: true,
					field: 'transaction_id',
					title: 'Transaction Id',
					type: 'text',
				},
				{
					sortable: true,
					field: 'ref_no',
					title: 'Reference No',
					type: 'text',
				},
				{
					sortable: true,
					field: 'order.order_no',
					title: 'Order #',
					type: 'text',
				},
				{
					sortable: true,
					field: 'amount',
					title: 'Amount',
					type: 'text',
					width: 80
				},
				{
					sortable: true,
					field: 'gateway',
					title: 'Gateway',
					type: 'text',
					width: 120,
				},{
					sortable: true,
					field: 'credit',
					title: 'CC 4 digit',
					width: 80,
					type: 'text',
					template: function(row)
					{
						if(row.cr_last4)
						{
							return `<span class="btn btn-sm btn-secondary showCardDetails" data-id="${row.id}" >
								${row.cr_last4}
							</span>`;
						}
					}
				},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					textAlign: 'center',
					overflow: 'visible',
					width: 130,
					template: function(row, index, datatable) {
						var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
						return '<div class="custom_a_btn_popover">\<a class="btn btn-hover-brand btn-icon btn-pill get_payment" onclick="event.preventDefault();" data-route="/admin/payment/view/' + row.id + '"><i class="la la-eye" title="View Payment"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_account" data-route="/admin/payment/edit/' + row.id + '" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\<a href="#" class="btn btn-hover-danger btn-icon btn-pill delPaymentButton" data-id="'+row.id+'" title="Delete" data-route="/admin/payment/delete/'+row.id+'">\
								<i class="la la-trash"></i>\
							</a><div>';
					},
				}
			],
		});
	$(document).ready(function() {
	    
		paymentTable.on('kt-datatable--on-init', function() {
	      	$(".text_to_p_mask").text(function(i, text){
				console.log(text);
				text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
				return text;
			});
			$("[data-toggle='kt-tooltip']").dropdown({
				html: true
			});
			
	    });
	    $(document).on('click','.showCardDetails', function(e){
	    	e.preventDefault();
	    	showModal({
	    		url: $(this).data('route')
	    	})
	    })

	    const basicSearch = (advanced = false, cb = "default cb") => {
	        if (advanced) {
	            paymentTable.setDataSourceParam("query", {});
	        } else {
	            let sanitized = paymentTable.getDataSourceQuery('query');

	            if (sanitized.advanced) delete sanitized.advanced;
	            paymentTable.setDataSourceParam("query", sanitized);
	        }
	        typeof cb === "function" ? cb() : '';
	    }
	    $(document).off('keyup','.basic--search').on('keyup','.basic--search', function(e) {
	    	console.log(this);
	    	if($(this).val().length > 2 || $(this).val().length ==0)
	    	{
	    		basicSearch(false, () => {
	    		    paymentTable.search($(this).val(), $(this).attr('name'));
	    		});	
	    	}
	    });
		$('#payment_date').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            locale: {
                format: 'YYYY-MM-DD',
                separator: '/',
            }
        }, function(start, end, label) {
        	basicSearch(false, () => {
	    		paymentTable.search(start.format('YYYY-MM-DD') +"/"+ end.format('YYYY-MM-DD'), 'payment_date');
        	});
    	});

		$('#adv_payment_date').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                format: 'YYYY-MM-DD',
                separator: '/',
            }
	        }, function(start, end, label) {
	            $('#start_end_date').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
	    });
	    $(document)
    .off("click", ".bs-donebutton")
    .on("click", ".bs-donebutton", function(e) {
        e.preventDefault();
        basicSearch(false, () => {
	    	paymentTable.search($('#industry_picker').val(), 'industry');
		});	

	    // advance search
	    $(document).off('click','#advSearchBtn').on('click','#advSearchBtn', function(e) {
	        e.preventDefault();
	        let data = $('#payment_adv_form').serializeArray();
	        let reducedData = data.reduce((acc, x) => {
	            acc[x.name] = x.value;
	            return acc;
	        }, {});
	        basicSearch(true, () => {
	            paymentTable.search(reducedData, "advanced");
	        });
	        $('#dropdownMenuLink').css({
	            'background' : '#8b83f3',
	        });
	    });
	    $('#reload_table').on('click', function(e) {
	        e.preventDefault();
	        $('.basic--search').val('');
	        // localStorage.removeItem("t_account_table-1-meta");
	        paymentTable.setDataSourceParam("query",{});
	        $('#t_payment_table').KTDatatable().reload();
	        localStorage.removeItem("t_account_table-1-meta");
	    });
	    $(document).find("#statusSelect2").select2({
	    	width:'100%'
	    });
	});
		$(document).off('click','.get_payment').on('click','.get_payment', function(e){
		    e.preventDefault();
		    supportAjax({
		        url: $(this).data('route'),
		    }, function(resp){
		        $('#kt_body').empty().append(resp);
		    },function(err){
		        console.log(err);
		    })
		});
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
		});
		$(document).off('click','.editPayment').on('click','.editPayment', function(e){
			e.preventDefault();
			e.stopPropagation();
			showModal({
		            url: $(this).date('route')
		        });
		}).off('click', '.delPaymentButton').on('click', '.delPaymentButton', function(e) {
		    e.preventDefault();
		    delConfirm({
		        url: $(this).data('route'),
		        header: $('#t_payment_table')
		    });
		});
		

	});
	</script>
</div>