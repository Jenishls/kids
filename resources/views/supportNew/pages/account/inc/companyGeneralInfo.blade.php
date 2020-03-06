<div class="col-md-12">
 	<div class="kt-portlet">
 		<div class="kt-portlet__head">
 			<div class="kt-portlet__head-label">
 				<span class="kt-portlet__head-icon"><i class="flaticon-account"></i></span>
 				<h3 class="kt-portlet__head-title">
 					<i class="la la-bank mr-1"></i>
 					<span id="c_name">{{$company->c_name}}</span>
 				</h3>
 			</div>
 			<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-actions">
				<a href="javascript:void(0);" class="btn btn-clean btn-sm btn-icon btn-icon-md edit_account" data-route="/admin/account/edit/general/{{$company->id}}">
					<i class="far fa-edit"></i>
				</a>
			</div>
		</div>
 		</div>
 		<div class="kt-portlet__body pt-0">
 			<div class="kt-portlet__content">
 				<div class="row">
 					<div class="col-md-3" style="padding-top:19px!important;">
						<div class="row">
							<div class="col-md-12 img_placeholder_h_180">
								@if($company->image)
									<img class="img img-fluid" id="logo_img" src="/admin/account/profileImage/{{$company->image->file_name}}" style="cursor:pointer;border:1px solid #eae7e7;" alt="{{$company->c_name}}">
								@else
									<img class="img img-fluid" id="logo_img" src="media/blog/No_Image_Available.jpg"  style="cursor:pointer;border:1px solid #eae7e7;" alt="{{$company->c_name}}">
								@endif
								<label class="kt-avatar__upload logoUpload editThumb" data-toggle="kt-tooltip" title="" data-original-title="Change logo" style="top: -11px; right: 0;">
                                <i class="fa fa-pen"></i>
                            </label>
							</div>
						</div>
					</div>
				<div class="col-md-5 b_l_d b_r_d p_top_19">
					@if(isset($company->address->add1))
					<h5 class="f_s_b_1rem">
						<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{ isset($company->address->add1) ? $company->address->add1 :''}}">
							<i class="flaticon-location"></i>
							<span id="add1">{{isset($company->address->add1) ? $company->address->add1 :''}}</span>
						</span>
					</h5>
					@endif
					@if(isset($company->address->add2))
						<h5 class="f_s_b_1rem">
							<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$company->address->add2}}">
								<i class="la la-map-marker"></i>
								<span  id="add2">{{isset($company->address->add2) ? $company->address->add2 :''}}</span>
							</span>		
						</h5>
					@endif
					@if(isset($company->address->city)|| isset($company->address->state)|| isset($company->address->zip))
					<h5 class="f_s_b_1rem">
						<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$company->address->city}}, {{$company->address->state}} {{$company->address->zip}}">
							<i class="flaticon2-map"></i>
							<span id="city">{{$company->address->city}}</span>, <span  id="state"> {{$company->address->state}}</span> <span  id="zip">{{$company->address->zip}}</span>
						</span>
					</h5>
					@endif
					@if(isset($company->address->country))
					<h5 class="f_s_b_1rem">
						<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$company->address->country}}">
							<i class="flaticon-map-location"></i>
							<span id="country">{{$company->address->country}}</span>
						</span>
					</h5>
					@endif
				</div>
					<div class="col-md-3 p_top_19">
					<div id="kt-portlet__body">
						<div class="row">	
							<div class="col-md-12">
								@if(isset($company->contact->phone_no))
								<h5 class="f_s_b_1rem">
									<span class="info_s_i_div">
										<i class="la la-phone"></i>
										<span class="text_to_p_mask" id="phone_no">{{$company->contact->phone_no}}</span>
									</span>
								</h5>
								@endif
								@if(isset($company->contact->email))
								<h5 class="f_s_b_1rem">
									<span class="info_s_i_div">
										<i class="fa fa-envelope"></i>
										<span id="email">{{$company->contact->email}}</span>
									</span>
								</h5>
								@endif
								@if(isset($company->url))
								<h5 class="f_s_b_1rem">
									<span class="info_s_i_div">
										<i class="flaticon2-website"></i>
										<span id="url">{{$company->url}}</span>
									</span>
								</h5>
								@endif
							</div>
						</div>
					</div>
					</div>
 				</div>
 			</div>
 		</div>
 	</div>
</div>