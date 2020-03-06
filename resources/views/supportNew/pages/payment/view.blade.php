

 <style>
 	.img_placeholder_h_180{
 		max-width: 194px;
 		overflow-y: hidden;
 	}
 	.img_placeholder_h_180 img{
 		height: 100%;
 		width: 100%;
 	}
 	.f_s_1rem{
 		font-size: 1.01rem !important;
 		padding-top: 5px;
 		color: #a8a8a8;
 		color: #646c9a;
 	}
 	.f_s_b_1rem{
 		padding-top: 2px;
 		font-size: 1.01rem!important;
 		color: #545050;
 	}
 	.f_s_b_1rem span{
 		color: #646c9a!important;
 	}
 	.info__detail{
 		margin-left:3px;
 		color: #646c9a;
 	}
 	.item_d{
 		margin-left: 5px;
 	}
 	.b_l_d{
 		border-left: 1px dashed #ebedf2;
 	}
 	.b_r_d{
 		border-right: 1px dashed #ebedf2;
 	}
 	.b_r_w{
 		border-right: 2px solid white;
 	}
	.custom_bg_c_g{
		background: #f8f8f8 !important;
		border:1px solid #ececec!important;
		min-height: 220px;
		position: relative;
		padding-bottom: 0;
	}
	.over_f_y_s{
		overflow-y: scroll !important;
		overflow-x:hidden !important;
		max-height:240px;
	}
	.default_icon_displayer{
		position: absolute;
	}
	.addr_title{
		font-size: 15px!important;
    	padding: 12px;
	}
	.nav-link{
		position:relative;
	}
	.count_n_badge
	{
		position: absolute;
	    padding: 8px;
	    top: 10px;
	    left: 0px;
	}
	.btn_add_funct{
		height: 1rem!important;
		width: 1rem!important;
		padding: 10px 9px 10px 15px!important;
	}
	.btn_add_funct i{
		font-size:10px!important;
	}
	.innerTitle_f{
		font-size: 14px!important;
		min-height: 45px!important;
	}
	
	.innerContent_f{
		font-size: 0.9rem!important;
	}
	.innerContent_f i{
		margin-right: 5px!important;
	}
	.p_top_19{
		padding-top: 19px!important;
	}
	.info_s_i_div{
		padding-left: 19px!important;
		position: relative!important;
		display: flex !important;
	}
	.info_s_i_div i{
		position: absolute;
		left:0;
	}
	[data-toggle="kt-tooltip_content"],[data-toggle="kt-tooltip"]{
		cursor:pointer;
	}
 </style>
 <div class="datatable_container usersControlContent" id="datatable_container">
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
 					<span class="kt-subheader__breadcrumbs-separator"></span>
 					<a href="" class="kt-subheader__breadcrumbs-link">{{$payment->transaction_id}}</a>
				</div>
 				<div class="back_temp ml-auto" style="width: 94px;">
 					<a class="kt-menu__link pageload" onclick="event.preventDefault();" data-route="/admin/payment">
 						<i class="fas fa-arrow-left" style="padding-right: 10px;
 						"></i>
 						Back
 					</a>
 				</div>
 			</div>
 		</div>
 	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
 			 	<div class="kt-portlet">
 			 		<div class="kt-portlet__body pt-0">
 			 			<div class="kt-portlet__content">
 			 				<div class="row">
 			 					<div class="col-md-3" style="padding-top:19px!important;">
	 								<div class="row">
	 									<div class="col-md-12 img_placeholder_h_180">
	 										@if($payment->order->company->account->logo)
	 											<img class="img img-fluid" id="logo_img" src="/admin/account/image/{{$payment->order->company->account->logo}}" style="cursor:pointer;border:1px solid #eae7e7;" alt="{{$payment->order->company->account->company_name}}">
	 										@else
	 											<img class="img img-fluid" id="logo_img" src="media/blog/No_Image_Available.jpg"  style="cursor:pointer;border:1px solid #eae7e7;" alt="{{$payment->order->company->account->company_name}}">
	 										@endif
	 										<label class="kt-avatar__upload logoUpload editThumb" data-toggle="kt-tooltip" title="" data-original-title="Change logo" style="top: -11px; right: 0;">
		                                        <i class="fa fa-pen"></i>
		                                    </label>
	 									</div>
			 							{{-- <div class="col-md-6">
			 								<h5 class="f_s_b_1rem" >
			 									<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="Industry : {{$account->industry}}">
			 										<i class="la la-industry"></i>
			 										<span>Industry: {{$account->industry}}</span>
			 									</span>
			 								</h5>
			 								<h5 class="f_s_b_1rem" >
			 									<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="Code : {{$account->account_code}}">
			 										<i class="la la-tag"></i>
			 										<span>Code: #{{$account->account_code}}</span>
			 									</span>
			 								</h5>
			 								<h5 class="f_s_b_1rem">
			 									<span class="info_s_i_div"  data-toggle="kt-tooltip" data-placement="top" data-original-title="Estd at : {{$account->estd_date->format('d M, Y')}}">
			 										<i class="flaticon-time"></i>
			 										<span>Estd: {{$account->estd_date->format('d M, Y')}}</span>
			 									</span>
			 								</h5>
			 							</div> --}}
	 								</div>
	 							</div>
								<div class="col-md-5 b_l_d b_r_d p_top_19">
									<h5 class="f_s_b_1rem">
										<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$payment->order->company->account->hOAddress->add1}}">
											<i class="la la-bank mr-1"></i>
											<span>{{$payment->order->company->account->company_name}}</span>
										</span>
									</h5>
									<h5 class="f_s_b_1rem">
										<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$payment->order->company->account->hOAddress->add1}}">
											<i class="la la-map-marker"></i>
											<span>{{$payment->order->company->account->hOAddress->add1}}</span>
										</span>
									</h5>
									<h5 class="f_s_b_1rem">
										<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$payment->order->company->account->hOAddress->add2}}">
											<span>{{$payment->order->company->account->hOAddress->add2}}</span>
										</span>		
									</h5>
									<h5 class="f_s_b_1rem">
										<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$payment->order->company->account->hOAddress->city}} , {{$payment->order->company->account->hOAddress->county}} , {{$payment->order->company->account->hOAddress->state}}">
											<span>{{$payment->order->company->account->hOAddress->city}} , {{$payment->order->company->account->hOAddress->county}} , {{$payment->order->company->account->hOAddress->state}}</span>
										</span>
									</h5>
									<h5 class="f_s_b_1rem">
										<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="{{$payment->order->company->account->hOAddress->country}}, {{$payment->order->company->account->hOAddress->zip}}">
											{{$payment->order->company->account->hOAddress->country}}, {{$payment->order->company->account->hOAddress->zip}}
										</span>
									</h5>
								</div>
			 					<div class="col-md-3 p_top_19">
									<div id="kt-portlet__body">
										<div class="row">	
											<div class="col-md-12">
												<h5 class="f_s_b_1rem">
													<span class="info_s_i_div">
														<i class="la la-phone"></i>
														<span class="text_to_p_mask">{{$payment->order->company->account->contact->phone_no}}</span>
													</span>
												</h5>
												<h5 class="f_s_b_1rem">
													<span class="info_s_i_div">
														<i class="fa fa-envelope"></i>
														<span>{{$payment->order->company->account->contact->email}}</span>
													</span>
												</h5>
												<h5 class="f_s_b_1rem">
													<span class="info_s_i_div">
														<i class="flaticon2-website"></i>
														<span>{{$payment->order->company->account->url}}</span>
													</span>
												</h5>
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
				<div class="col-md-12 no-padding">
					<div class="kt-portlet">
	 			 		<div class="kt-portlet__body">
	 			 			<div class="kt-portlet__content">
	 			 				<div class="row">
	 			 					<div class="col-md-4">
	 			 						<h5 class="f_s_b_1rem">
											<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="Name: {{$payment->order->client->Salutation}} {{$payment->order->client->fname}} {{$payment->order->client->lname}}">
												<i class="fa fa-user-tie mr-1"></i>
												<span>{{$payment->order->client->Salutation}} {{$payment->order->client->fname}} {{$payment->order->client->lname}}</span>
											</span>
										</h5>
	 			 						<h5 class="f_s_b_1rem">
											<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="Phone: {{$payment->order->client->phone_no}}">
												<i class="la la-mobile mr-1"></i>
												<span>{{$payment->order->client->phone_no}}</span>
											</span>
										</h5>
	 			 						<h5 class="f_s_b_1rem">
											<span class="info_s_i_div" data-toggle="kt-tooltip" data-placement="top" data-original-title="Phone: {{$payment->order->client->phone_no}}">
												<i class="flaticon-email mr-1"></i>
												<span>{{$payment->order->client->email}}</span>
											</span>
										</h5>
	 			 					</div>
	 			 					<div class="col-md-4">
	 			 						<div class="portlet">
	 			 							<h6>Billing Address:</h6>
	 			 							<h5 class="f_s_b_1rem">
	 			 								<span class="info_s_i_div">
	 			 									{{-- billingAddr
														shippingAddr
														deliveryAddr --}}
	 			 									<i class="flaticon2-website"></i>
	 			 									<span>{{$payment->order->company->billingAddr->add1}}</span>
	 			 								</span>
	 			 							</h5>
	 			 							<h5 class="f_s_b_1rem">
	 			 								<span class="info_s_i_div">
	 			 									<i class="flaticon2-website"></i>
	 			 									<span>{{$payment->order->company->billingAddr->add2}}</span>
	 			 								</span>
	 			 							</h5>
	 			 						</div>
	 			 					</div>
	 			 				</div>
	 			 			</div>
	 			 		</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
 </div>




