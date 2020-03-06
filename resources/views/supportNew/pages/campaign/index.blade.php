<style>
	.padding_bottom--27{
		padding-bottom: 27px!important;
	}
	.kt-widget__item.custom-widget-item__width{
		width:auto;
		text-align: center;
	}
	.custom__date-container{
		display:flex; justify-content:space-between;align-items:center;
	}
</style>
<div id="datatable_container" class="usersControlContent">
	<div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					{{isset($type)? ucwords($type):''}} Campaign
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">CRM</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">{{isset($type)? ucwords($type):''}} Campaign</a>
				</div>
			</div>
		</div>
		<div class="kt-subheader__wrapper text-right">
			<a href="javascript:void(0);" class="btn btn-pill btn-brand btn-elevate btn-icon-sm" id="addCampaign">
				<i class="la la-plus"></i>
				Campaign
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-light alert-elevate search_top_container" role="alert">
				<div class="alert-text">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 serach_col user_search_col userSearchCol">
							<div class="form-group m-form__group row align-items-center">
								<div class="input-group input-group-sm userInputGroup ml-3 altResp" style="width: 306px;">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary searchByRoleSelectBtn" type="button">Compaign Name</button>
									</div>
									<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="compaign_name">
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
	</div>
	<div class="row">
		@for($i=10;$i>1;$i--)
		<div class="col-md-4 mx-0 my-2">
			<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
				<!--begin:: Widgets/Applications/User/Profile1-->
				<div class="kt-portlet kt-portlet--height-fluid-">
					<div class="kt-portlet__head  kt-portlet__head--noborder padding_bottom--27">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar p-2">
							<a class="btn btn-sm btn-hover-brand btn-icon btn-pill pull-right pageload" data-route="/admin/campaign/activities" href="javascript:void(0);">
								<i title="View profile" class="la la-eye"></i>
							</a>
							<a title="Edit details" data-toggle="modal" class="btn btn-sm btn-hover-brand btn-icon btn-pill pull-right" href="javascript:void(0);">
								<i class="la la-edit"></i>
							</a>
							<a title="Delete" data-id="1" class="btn btn-sm btn-hover-danger btn-icon btn-pill pull-right" href="javascript:void(0);">
								<i class="la la-trash"></i>
							</a>
						</div>
					</div>
					<div class="kt-portlet__body kt-portlet__body--fit-y">
						<!--begin::Widget -->
						<div class="kt-widget kt-widget--user-profile-1">
							<div class="kt-widget__head">
								<div class="kt-widget__media">
									<img src="/media/img/bblogo.png" alt="image">
								</div>
								<div class="kt-widget__content">
									<div class="kt-widget__section">
										<a href="#" class="kt-widget__username">
											Induce Recurring Sales of January
											<i class="flaticon2-correct kt-font-success"></i>
										</a>
										<span class="kt-widget__subtitle">
											Voice Broadcasting
										</span>
										
									</div>
								</div>
							</div>
							<div class="kt-widget__body mt-3">
								<div class="kt-widget__stats custom__date-container">
									<div class="kt-widget__item custom-widget-item__width">
										<span class="kt-widget__date">
											Start Date
										</span>
										<div class="kt-widget__label">
											<span class="btn btn-label-brand btn-sm btn-bold btn-upper">07 may, 18</span>
										</div>
									</div>
									<div class="kt-widget__item custom-widget-item__width">
										<span class="kt-widget__date">
											End Date
										</span>
										<div class="kt-widget__label">
											<span class="btn btn-label-warning btn-sm btn-bold btn-upper">07 may, 18</span>
										</div>
									</div>
									<div class="kt-widget__item custom-widget-item__width">
										<span class="kt-widget__date">
											Budget
										</span>
										<div class="kt-widget__label">
											<span class="btn btn-label- btn-sm btn-bold btn-upper">$20.00</span>
										</div>
									</div>
									
								</div>
							</div>
							<div class="kt-widget__footer mt-3">
								<div class="statusContainer" style="display:flex;align-items:center;justify-content:flex-end;" >
									<span class="mr-2" style="margin-bottom: 13px;">
										Active:
									</span>
									<span class="kt-switch kt-switch--sm kt-switch--icon" title="Change Status of this Campaign">
										<label>
											<input type="checkbox" checked="checked" name="statusChange">
											<span></span>
										</label>
									</span>
								</div>
							</div>
						</div>
						<!--end::Widget -->
					</div>
				</div>
			</div>
		</div>
		@endfor
	</div>
</div>
<script>
	// $("[data-switch=true]").bootstrapSwitch()
	// $('[data-toggle="kt-tooltip"]').tooltip();

	$(document).off('click', '#addCampaign').on('click', '#addCampaign', function(e) {
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/campaign/add',
			c: 'aCampaign',
		});
	});
	$(document).off('change','[name="statusChange"]').on('change','[name="statusChange"]',function(e){
		e.preventDefault();
		let state = 0;
		if($('[name="statusChange"]').is(":checked")){
			state=0;
            $( '[name="statusChange"]' ).prop( "checked", false );
        }
        else if($('[name="statusChange"]'). is(":not(:checked)")){
			state=1;
            $('[name="statusChange"]').prop( "checked", true );
		}
		console.log(state);
		showModal({
			url: '/admin/campaign/test',
			c: 'campaignStatus',
		});
	})
</script>