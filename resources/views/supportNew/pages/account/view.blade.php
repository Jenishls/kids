 <style>
 	.img_placeholder_h_180{
 		max-width: 100px;
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
		text-transform: capitalize!important;
	}
	.info_s_i_div i{
		position: absolute;
		left:0;
	}
	[data-toggle="kt-tooltip_content"],[data-toggle="kt-tooltip"]{
		cursor:pointer;
	}
	@media (max-width: 1500px){
		.col-lg-6 {
		    -webkit-box-flex: 0;
		    -ms-flex: 0 0 100%!important;
		    flex: 0 0 100%!important;
		    max-width: 100%!important;
		}
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
 <div class="datatable_container usersControlContent" id="datatable_container">
 	 <div class="kt-subheader kt-grid__item uc_subHeader userControlSubHeader" id="kt_subheader">
 		<div class="kt-container ">
 			<div class="kt-subheader__main">
 				<h3 class="kt-subheader__title">
 					Account
 				</h3>
 				<span class="kt-subheader__separator kt-hidden"></span>
 				<div class="kt-subheader__breadcrumbs">
 					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
 					<span class="kt-subheader__breadcrumbs-separator"></span>
 					<a href="" class="kt-subheader__breadcrumbs-link">Table</a>
 					<span class="kt-subheader__breadcrumbs-separator"></span>
 					<a href="" class="kt-subheader__breadcrumbs-link">Account</a>
 					<span class="kt-subheader__breadcrumbs-separator"></span>
 					<a href="" class="kt-subheader__breadcrumbs-link">{{$company->c_name}}</a>
 				</div>
 				<div class="back_temp ml-auto" style="width: 94px;">
 					<a class="kt-menu__link pageload" onclick="event.preventDefault();" data-route="/admin/account">
 						<i class="fas fa-arrow-left" style="padding-right: 10px;
 						"></i>
 						Back
 					</a>
 				</div>
 			</div>
 		</div>
 	</div>
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12">
		 	<div class="row"  id="companyGeneralInfo" data-cid="{{$company->id}}">
		 		@include('supportNew.pages.account.inc.companyGeneralInfo')
		 	</div>
	 	 	<div class="row">
	 	 		<div class="col-md-12">
	 	 			<div class="kt-portlet kt-portlet--tabs">
	 		            <div class="kt-portlet__head">
	 		                <div class="kt-portlet__head-toolbar">
	 		                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand" role="tablist">
	 		                        <li class="nav-item">
	 		                            <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="false">
	 										<i class="la la-briefcase"></i> Orders
	 										<button type="button" class="ml-1 btn btn-sm  btn-sm btn-icon btn-circle btn_add_funct"><i class=" fas fa-plus "></i></i></button>
	 										<span class="kt-badge kt-badge--info count_n_badge">
	 												@if($company->orders)
	 													{{$company->orders->count()}}
	 												@else
	 												  0 
	 												@endif
		 											
	 										</span>
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content" role="tab" aria-selected="false">
	 										<i class="la la-bell-o"></i>Payments
	 										<button type="button" class="ml-1 btn btn-sm  btn-sm btn-icon btn-circle btn_add_funct"><i class=" fas fa-plus "></i></i></button>
	 										<span class="kt-badge kt-badge--info count_n_badge">
		 										@if($company->payments->count())
		 											{{$company->payments->count()}}
		 										@else
		 										 	0
		 										@endif
	 										</span>
	 		                            </a>
	 		                        </li>
	 		                    </ul>
	 		                </div>
	 		            </div>
	 		            <div class="kt-portlet__body py-0 px-3" style=" height: 460px;">                   
	 		                <div class="tab-content">
	 		                    <div class="tab-pane active" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
	 		                    	@include('supportNew.pages.account.inc.orderTab')
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">
	 	   	                       	@include('supportNew.pages.account.inc.paymentTab')
	 		                    </div>
	 		                </div>      
	 		            </div>
	 				</div>
	 	 		</div>
	 	 		
	 	 	</div>
		</div>
 		<div class="col-md-12 col-lg-6">
	        <div class="row h-100">
	        	<div class="col-md-12">
		 			<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid" >
			            <div class="kt-portlet__head">
			                <div class="kt-portlet__head-toolbar">
			                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
			                        <li class="nav-item">
	 		                            <a class="nav-link active " data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
	 										<i class="la la-cog"></i> Members
	 										<button type="button" class="ml-1 btn btn-sm  btn-sm btn-icon btn-circle btn_add_funct" id="add_member"><i class=" fas fa-plus"></i></i></button>
	 										<span class="kt-badge kt-badge--info count_n_badge">
		 											@if($company->members){{$company->members->count()}}@else 0 @endif
												
	 										</span>
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_4_tab_content" role="tab" aria-selected="true">
	 										<i class="la la-cog"></i> Branches
	 										<button type="button" class="ml-1 btn btn-sm  btn-sm btn-icon btn-circle btn_add_funct"><i class=" fas fa-plus "></i></i></button>
	 										<span class="kt-badge kt-badge--info count_n_badge">
		 										@if($company->branches->count())
		 											{{$company->branches->count()}}
		 										@else
		 										  	0
		 										@endif
	 										</span>
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_1_tab_content" role="tab">
	 		                                <i class="flaticon-attachment" aria-hidden="true"></i>Attachments
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_2_tab_content" role="tab">
	 		                                <i class="flaticon-notes" aria-hidden="true"></i>Notes
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_3_tab_content" role="tab">
	 		                                <i class="fas fa-mail-bulk" aria-hidden="true"></i>Message Log
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_4_tab_content" role="tab">
	 		                                <i class="flaticon2-time" aria-hidden="true"></i>Activities
	 		                            </a>
	 		                        </li>
	 		                        <li class="nav-item">
	 		                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_4_5_tab_content" role="tab">
	 		                                <i class="flaticon-notes" aria-hidden="true"></i>Audit
	 		                            </a>
	 		                        </li>
			                    </ul>
			                </div>
						</div>
						<div class="kt-portlet__body kt-scroll ps ps--active-y "style="height: 600px!important; overflow-y:scroll!important;" data-scroll="true" >
			            {{-- <div class="kt-portlet__body py-0 px-3" style="height: 600px!important; overflow-y:scroll!important;" >                    --}}
			                <div class="tab-content">
			                    <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
			                    	@include('supportNew.pages.account.inc.clientTable')
	 		                    </div>
	 		                    <div class="tab-pane" data-temp="companyBranchViewTemplater" id="kt_portlet_base_demo_1_4_tab_content" data-cid="{{$company->id}}" role="tabpanel">
	 	   	                       	@include('supportNew.pages.account.inc.BranchDetails')
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_4_1_tab_content" role="tabpanel" style="padding: 14px 12px!important;">
	 	   	                       	@include('supportNew.pages.account.file.main')
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_4_2_tab_content" role="tabpanel" style="padding: 14px!important;">
	 	   	                       	@include('supportNew.pages.account.note.main')
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_4_3_tab_content" role="tabpanel" style="padding: 14px!important;">
	 	   	                       	<h6 class="text-center">We are currently working on this feature.</h6>
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_4_4_tab_content" role="tabpanel" style="padding: 14px!important;">
	 	   	                       	<h6 class="text-center">We are currently working on this feature.</h6>
	 		                    </div>
	 		                    <div class="tab-pane" id="kt_portlet_base_demo_4_5_tab_content" role="tabpanel" style="padding: 14px!important;">
	 	   	                       	<h6 class="text-center">We are currently working on this feature.</h6>
	 		                    </div>
			                </div>
			            </div>
			        </div>
	        	</div>
	        </div>
 		</div>
	</div>
 </div>
 <script>
	$(function () {
	  $('[data-toggle="kt-tooltip"]').tooltip();
	  $(document).off('click','.editThumb').on('click','.editThumb', function(e){
	  	console.log(this);
	  	showModal({
	  		url:'/admin/account/editThumb/{{$company->id}}'
	  	});
	  })
	})
	$(".text_to_p_mask").text(function(i, text){
		text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3");
		return text;
	});
 </script>



