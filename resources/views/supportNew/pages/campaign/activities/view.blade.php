<style type="text/css">
	#generateList{
		padding: 6px 9px;
	}
	.alert.alert__custom{
		background: #fff;
	    border: 1px solid #eceff1;
	    color: #282a3c;
	}
	.kt-portlet__body.kt-portlet-custom_bodyContent{
		padding-top: 10px!important;
	}
	.kt-portlet.kt-portlet_bg_alternate
	{
		background-color: #e8f8ff!important;
	}
	.kt-portlet__body.kt-portlet-mail-list{
		padding: 8px 10px!important;
	}
	.kt-portlet-mail-list ul{
		padding: 0;
		margin: 0;
		list-style: none;
	}
	.kt-portlet-mail-list ul li{
		margin: 5px 15px;
	    border-bottom: 1px solid #eaeaea;
	    display: flex;
	    justify-content: space-between;
	    align-items: center;
	}
	.form-group label {
	    font-size: 0.9rem!important;
	    font-weight: 505!important;
	}
	.kt-portlet__body.kt-portlet-mail-lookup{
		 padding: 18px 17px!important;
	}
	.kt-portlet__head-title{ 
		font-size: 1.2rem!important;
	}
	#generateListForm .form-group>div{
		margin: 5px 0!important;
	}
	.generate_list_btns button{
	    padding: 4px 9px!important;
	}
	#optionTemplateSwapper.generatingMode #listingPhase{
		display: none;
	}
	#optionTemplateSwapper #generatingPhase{
		display: none;
	}
	#optionTemplateSwapper.generatingMode #generatingPhase{
		display: block;
	}
	.icon_translate_rotate_upward{
		transform: translate(5px,-3px) rotate(-41deg);
	}


</style>

<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					{{$activity->name}}
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">CRM</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">{{$activity->campaign->name}}</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">{{$activity->name}}</a>
				</div>
			</div>
        </div>
        <div class="back_temp" style="width: 94px;">
        <a class="kt-menu__link backBtn pageload" onclick="event.preventDefault();" data-route="/admin/campaign/view/{{$activity->campaign_id}}">
                <i class="fas fa-arrow-left" style="padding-right: 10px;
                "></i>
                Back
            </a>
        </div>
	</div>
	<div class="">
        <div class="row">
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-portlet__content">
                        here
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-4" id="optionTemplateSwapper">
				<div class="kt-portlet kt-portlet_bg_alternate" id="listingPhase">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon">
								<i class="flaticon2-list"></i>
							</span>
							<h4 class="kt-portlet__head-title">
								Mailing List
							</h4>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-actions">
								<a href="javascript:void(0);" class="btn btn-sm btn-pill btn-brand btn-elevate btn-icon-sm" id="generateList">
									<i class="la la-plus"></i>
									Generate List
								</a>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body kt-portlet-custom_bodyContent">
						<div class="kt-portlet__content">
							<form action="#" id="searchMailList">
								<div class="alert alert__custom alert-elevate search_top_container" role="alert">
									<div class="alert-text">
										<div class="row">
											<div class="input-group input-group-sm userInputGroup col-sm-11">
												<div class="input-group-prepend">
													<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">List Name</button>
												</div>
												<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="list_name">
											</div>
											<div class="rp_btn col-sm-1 order-1 order-xl-1" style="display:inline-flex;">
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
							</form>
							<div id="existingLists">
								<div class="kt-portlet">
									<div class="kt-portlet__body kt-portlet-mail-list">
										<div class="kt-portlet__content">
											<ul>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<span>New Year Mail</span>
													<span class="pull-right">
														<a title="Edit details" class="btn btn-sm btn-hover-brand btn-icon btn-pill">
															<i class="la la-edit"></i>
														</a>
														<a class="btn btn-sm btn-hover-danger btn-icon btn-pill" href="#">
															<i class="la la-trash"></i>
														</a>
													</span>
												</li>
												<li>
													<h6 class="text-center w-100 pt-2">No List Found!</h6>
												</li>
											</ul>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet kt-portlet_bg_alternate" id="generatingPhase">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon">
								<i class="flaticon2-list"></i>
							</span>
							<h4 class="kt-portlet__head-title">
								Generate Mailing list
							</h4>
						</div>
					</div>
					<div class="kt-portlet__body kt-portlet-custom_bodyContent">
						<div class="kt-portlet__content">
							<form action="#" id="generateListForm">
								<div class="kt-portlet">
									<div class="kt-portlet__body kt-portlet-mail-lookup">
										<div class="kt-portlet__content">
											<div class="form-group row ">
                                               <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">Company</label>
                                                   <select name="company[]" multiple id="companySelectPicker">
                                                   	<option value="1">Shubhu Tech</option>
                                                   	<option value="2">Google</option>
                                                   	<option value="3">Apple</option>
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                               <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">Branch</label>
                                                   <select name="branch[]" multiple id="branchSelectPicker">
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">City</label>
                                                   <select name="city[]" multiple id="citySelectPicker">
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">Country</label>
                                                   <select name="country[]" multiple id="countrySelectPicker">
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">Zip</label>
                                                   <select name="zip[]" multiple id="zipSelectPicker">
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                                <div class="col-md-6 col-sm-6">
                                                   <label class="control-label" for="company_name">State</label>
                                                   <select name="zip[]" multiple id="stateSelectPicker">
                                                   </select>
                                                  <div class="errorMessage"></div>
                                               </div>
                                                <div class="col-md-12 col-sm-12 generate_list_btns">
                                                	<button type="" class="btn btn-sm btn-pill btn-warning pull-left" id="BackToListBtn">
                                                   		<i class="fas fa-arrow-left"></i> back
                                                   </button>
                                                   <button type="" class="btn btn-sm btn-pill btn-success pull-right">
                                                   		<i class="la la-gears"></i> Generate
                                                   </button>
                                               	</div>
                                            </div>
										</div>
									</div>
								</div>					
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="kt-portlet">
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							<div class="row">
								<div class="col-md-12">
									<h5>Customer Data</h5>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-md-3">
									<h6 class="mb-0">List Name</h6>
								</div>
								<div class="col-md-9 generate_list_btns justify-content-end" style="display:flex;">
									<button type="" class="btn btn-sm btn-pill btn-success ml-2" id="grabId">
		                               	<i class="la la-save"></i> Save List
		                            </button>
		                            <button type="" class="btn btn-sm btn-pill btn-warning ml-2">
		                               	<i class="la la-send-o icon_translate_rotate_upward"></i> Send Direct Mail
		                            </button>
		                            <button type="" class="btn btn-sm btn-pill btn-primary ml-2">
		                               	<i class="la la-envelope-o"></i> Send Mail
		                            </button>
		                            <button type="" class="btn btn-sm btn-pill btn-info ml-2">
		                               	<i class="la la-mobile-phone"></i> Send SMS
		                            </button>
								</div>
							</div>
							<hr>
							<div id="contactListTable">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		</div>
	</div>
</div>
<script>
	$(function(){
		var contactDataTables = $('#contactListTable').KTDatatable({
		    // datasource definition
		    data: {
		        type: 'remote',
		        source: {
		            read: {
		                url: '/admin/campaign/list',
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
		        pageSize: 5,
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
					field: 'id',
					title: '#',
					width: 20,
					sortable:false,
					class: 'kt-datatable--off-click_over_action_btn',
					selector : {
						class: 'kt-checkbox--solid grab_item'
					}, 
            	},
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
		                return '<a class="btn btn-hover-brand btn-icon btn-pill pageLoadWithBack" data-backurl="admin/campaign/index?type=email" onclick="event.preventDefault();" data-route="/admin/client/clientProfile/'+row.id+'" data-callback="active_clients_current_row"><i class="la la-eye" title="View profile"></i></a>\<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill model_load edit_client" data-route="/admin/client/edit/'+row.id+'" data-toggle="modal" data-target="#sy_global_modal"  title="Edit details">\
		                    <i class="la la-edit"></i>\
		                </a>\
		                <a href="#" class="btn btn-hover-danger btn-icon btn-pill delClient" data-id="' + row.id + '" title="Delete">\
		                    <i class="la la-trash"></i>\
		                </a>';
		            },
		        }
		    ],
		});
		$('#grabId').off('click').on('click', function(){
			console.log($('#contactListTable').find('input[type=checkbox]:checked').serializeArray());
		})
		$(document).off('change', '.grab_item input').on('change', '.grab_item input', function(e) {
			if($(this).parent().hasClass('kt-checkbox--all')){
				$('.grab_item input').attr('name', 'customer_id[]');
				$(this).attr('name','');
			}
			else{
				$(this).attr('name', 'customer_id[]');
			}
		});
		let select2Picker = $('select').selectpicker({
			liveSearch: true,
			showTick: true,
			actionsBox: true,
			doneButton : true,
			width:'100%',
			doneButtonText : "Apply",
		});
		
	$('#generateList').off('click').on('click', function(e){
		e.preventDefault();
		$('#optionTemplateSwapper').addClass('generatingMode');
	})
	$('#BackToListBtn').off('click').on('click', function(e){
		e.preventDefault();
		$('#optionTemplateSwapper').removeClass('generatingMode');
    	select2Picker.selectpicker('deselectAll');
	})
	})
		
</script>