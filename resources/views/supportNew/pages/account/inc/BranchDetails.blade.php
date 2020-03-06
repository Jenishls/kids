<style>
	.branch_tab_container .btn.btn-icon {
	    width: 2rem!important;
	}
	.kt-portlet__head{
		padding-top: 9px!important;
    	padding-bottom: 9px!important;
	}
	.custom_ml-17
	{
		margin-left: 17px!important;
	}
	.dropdownMenuLink{
		height: 30px!important;
		width: 30px!important;
		margin-right: 8px!important;
	}
</style>
<div class="row branch_tab_container">
	<div class="col-md-12">
		<div class="row my-2 justify-content-end">
			<div class=" col-lg-2 col-md-2 text-right">
				<a href="javascript:void(0);" class="btn btn-sm btn-brand btn-pill btn-elevate btn-icon-sm branchAddBtn"  data-cid="{{$company->id}}">
					<i class="la la-plus"></i>Branch
				</a>
            </div>
		</div>
		<div class="alert alert-light alert-elevate search_top_container" style="border-bottom: none;padding: 0.75rem 1.25rem;" role="alert">
			<div class="alert-text">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-8 order-1 order-xl-1 serach_col user_search_col userSearchCol">
						<div class="form-group m-form__group row align-items-center ">
							<div class="input-group mb-3 input-group-sm userInputGroup mr-3" style="width:180px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">City</span>
								</div>
								<input type="text" class="form-control basic--search" aria-label="Sizing example input" placeholder="search.." autocomplete="off" name="city" >
							</div>
							<div class="input-group mb-3 input-group-sm userInputGroup mr-3" style="width:180px;">
								<div class="input-group-prepend">
									<span class="input-group-text" >Name</span>
								</div>
								<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="branch_name" maxlength="10">
							</div>
							<div class="input-group mb-3 input-group-sm userInputGroup mr-3" style="width:180px;">
								<div class="input-group-prepend">
									<span class="input-group-text" >Branch #</span>
								</div>
								<input type="text" class="form-control basic--search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search.."  autocomplete="off" name="branch_no" maxlength="10">
							</div>
							<div id="reload_table" class="reloadBranchTable" data-cid="{{$company->id}}">
								<i class="fas fa-redo searchRedo"></i>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="row" id="companyBContainer">
			
			@if($company->branches->count())
			@foreach($company->branches as $branch )
			<div class="col-md-6" id="branch--{{$branch->id}}">
					<div class="kt-portlet kt-portlet--mobile" style="background-color:#fbf9ff!important;border:1px solid #e1e1ee;">
						<div class="kt-portlet__head pr-0 ">
							<div class="kt-portlet__head-label">
								<div class="row">
									<div class="col-md-12">
										<h3 class="kt-portlet__head-title">
											{{$branch->branch_name}} 
										</h3>
									</div>
									<div class="col-md-12">
										<h6 data-toggle="kt-tooltip" data-placement="top" data-original-title="Branch No : {{$branch->branch_no}}">#{{$branch->branch_no}}</h6>
									</div>
									<div class="col-md-12">
										<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Default</span>
									</div>
								</div>
								
							</div>
							<div class="kt-portlet__head-toolbar pt-1">
								<div class="kt-portlet__head-actions">
									{{-- <a class="btn btn-hover-brand btn-icon btn-pill waves-effect waves-light">
										<i class="la la-eye" title="View profile"></i>
									</a> --}}
									<a href="javascript:void(0);" class="btn btn-hover-brand btn-icon btn-pill waves-effect waves-light branchEBtn" title="Edit details" data-bid="{{$branch->id}}">
										<i class="la la-edit"></i>
									</a>
									<a href="javascript:void(0);" class="btn btn-hover-danger btn-icon btn-pill  waves-effect waves-light branchDBtn" title="Delete" data-bid="{{$branch->id}}">
										<i class="la la-trash"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="kt-portlet__body pt-0">
							<div class="row">
								<div class="col-md-6 pl-1 pr-1 b_r_w">
									<div class="kt-portlet__head p-1 pl-0 innerTitle_f" style="border-bottom:none;">
										<div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="far fa-address-book"></i>
											</span>
											<h3 class="kt-portlet__head-title ">
												Contact
											</h3>
										</div>
									</div>
									@if($branch->contact)
										@if($branch->contact->phone_no)
										<h6 class="innerContent_f" data-toggle="kt-tooltip" data-placement="top" data-original-title="phone : {{$branch->contact->phone_no}}"><i class="la la-phone"></i>{{$branch->contact->phone_no}}</h6>
										@endif
										@if($branch->contact->mobile_no)
										<h6 class="innerContent_f" data-toggle="kt-tooltip" data-placement="top" data-original-title="mobile : {{$branch->contact->mobile_no}}"><i class="la la-mobile-phone"></i>{{$branch->contact->mobile_no}}</h6>
										@endif
										@if($branch->contact->email)
										<h6 data-toggle="kt-tooltip" data-placement="top" data-original-title="email : {{$branch->contact->email}}" title="" class="innerContent_f"><i class="fa fa-envelope"></i>{{str_limit($branch->contact->email,13)}}</h6>
										@endif
									@endif
									{{-- <h6><i class="la la-external-link"></i>{{$branch->contact->url}}</h6> --}}
								</div>
								<div class="col-md-6">
									<div class="kt-portlet__head p-1 pl-0 innerTitle_f" style="border-bottom:none;">
										<div class="kt-portlet__head-label">
											<span class="kt-portlet__head-icon">
												<i class="far fa-address-book"></i>
											</span>
											<h3 class="kt-portlet__head-title ">
												Address
											</h3>
										</div>
									</div>
									@if($branch->address)
									<h6 class="innerContent_f"
									data-toggle="kt-tooltip" data-placement="top" data-original-title="Address : {{$branch->address->add1}}"
									> <i class="la la-map-marker"></i>{{$branch->address->add1}}</h6>
									<h6 class="innerContent_f custom_ml-17"
									data-toggle="kt-tooltip" data-placement="top" data-original-title="Address : {{$branch->address->add2}}"
									>{{$branch->address->add2}}</h6>
									<h6 class="innerContent_f custom_ml-17"
									data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
									@if($branch->address->city)city: {{$branch->address->city}}<br>@endif"
									>
										@if($branch->address->city){{$branch->address->city}},@endif
									</h6>
									<h6 class="innerContent_f custom_ml-17"
									data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
									@if($branch->address->county)county : {{$branch->address->county}}<br>@endif"
									>
										@if($branch->address->county){{$branch->address->county}},@endif
																</h6>
									<h6 class="innerContent_f custom_ml-17"
									data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
									@if($branch->address->state)state :  {{$branch->address->state}}@endif"
									>
										{{$branch->address->state}}
									</h6>
									<h6 class="innerContent_f custom_ml-17" data-toggle="kt-tooltip_content" data-placement="top" data-original-title="
									@if($branch->address->country)Country: {{$branch->address->country}}<br>@endif
									@if($branch->address->zip)zip: {{$branch->address->zip}}@endif
									"
									>
									<i></i>
										@if($branch->address->country)
										{{$branch->address->country}},
										@endif
										{{$branch->address->zip}}
									</h6>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			@else
				<div class="col-md-12">
					<h6 class="font-weight-normal text-center">No Branches Found</h6>
				</div>
			@endif
			
		</div>
	</div>
</div>
<script>
	$('[data-toggle="kt-tooltip_content"]').tooltip({
		html:true
	});
	
	$(document).ready(function() {
		$('.reloadBranchTable').off('click').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('.branch_tab_container .userInputGroup').find('input').val('');
			let url= '/admin/account/branch/list/'+$(this).attr('data-cid');
			supportAjax({
				url,
			},function(resp){
				appendBranchTemplate(resp.data,'companyBContainer');
			})
				$(this).find('i').css({'background' : '#22b9ff'});
		});

		let statusSelect = $('[name="status"]').select2({
			width: '100%',
	        placeholder: "Select a Status"
	    })
	    // advance search
	    $(document).find('[name="status"]').select2({
	    	width:'100%'
		});

		let currentTimeout = '';
		$('.branch_tab_container .basic--search').off('blur keyup').on('blur keyup', function(e) {
			if($(this).val().length > 2 || $(this).val().length == 0)
			{
				let name= $(this).attr('name');
				let data={}
				data['query'] ={
					[name] :  $(this).val()
				};
				let url= '/admin/account/branch/list/{{$company->id}}';
				clearInterval(currentTimeout)
				currentTimeout = setTimeout(() => {
					supportAjax({
						url,
						data
					},function(resp){
						appendBranchTemplate(resp.data,'companyBContainer')
					}) 
				}, 1500);
				let color = $(this).val().length == 0 ? '#22b9ff': '#facd44';
				$('.reloadBranchTable i').css({'background' : color});
			}
		});
	});
	$('.branchAddBtn').off('click').on('click', function(e){
		showModal({
			url:'/admin/account/edit/branches/'+$(this).attr('data-cid'),
			c:1
		})
	})
	
	// crud operation modal starts here
	$(document).off('click','.branchEBtn').on('click','.branchEBtn',function(e){
		e.preventDefault();
		e.stopPropagation();
		showModal({
			url: '/admin/account/company/branches/edit/'+$(this).attr("data-bid"),
			c: 'branch',
		});
	}).off('click','.branchDBtn').on('click','.branchDBtn',function(e){
		e.preventDefault();
		e.stopPropagation();
		delConfirm({
			url: '/admin/account/company/branches/sdelete/'+$(this).attr("data-bid")
		},function(resp){
			appendBranchTemplate(resp.data,'companyBContainer')
		});
	});
</script>
