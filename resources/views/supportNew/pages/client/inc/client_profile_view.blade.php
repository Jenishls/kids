<div id="datatable_container" class="clientContent">
	<div class="kt-subheader kt-grid__item uc_subHeader clientSubHeader" id="kt_subheader">
		<div class="kt-container ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Client Profile
				</h3>
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">TABLE</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link">Client</a>
				</div>
			</div>
		</div>
		<div class="back_temp" style="width: 94px;">
			<a class="kt-menu__link backBtn pageload" onclick="event.preventDefault();" data-route="/admin/client">
				<i class="fas fa-arrow-left" style="padding-right: 10px;
				"></i>
				Back
			</a>
		</div>
    </div>
    {{-- {{dd($client->attachments)}} --}}
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		
        @include('supportNew.pages.client.inc.profile_top')

		<div class="row">
			
            @include('supportNew.pages.client.inc.profile_left_tab')
           
            @include('supportNew.pages.client.inc.profile_right_tab')
		</div>
        <!--End:: Portlet-->
    </div>
</div>	
