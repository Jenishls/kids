<style>
	.cal-text-white a,
	.cal-text-white .fc-time,
	.cal-text-white .fc-title
	{
		color: #fff !important;
	}

	.fc-button-group button{
		text-transform: capitalize;
	}

	.fc-more:hover{
		color: #82aeff !important;
	}
	
	.calendar--tabs:hover{
		border-bottom: 1px solid #197ead;
	}

	.calendar--tabs.active,
	.calendar--tabs.active:hover{
		border-bottom: 1px solid #fd397a !important;
	}

	.calendar--tabs span:hover,
	.calendar--tabs h3:hover{
		color:#197ead !important;
		cursor: pointer;
	}

	.calendar--tabs.active span,
	.calendar--tabs.active h3,
	.calendar--tabs.active span:hover,
	.calendar--tabs.active h3:hover{
		color:#fd397a !important;
	}
	
</style>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
									
	<!-- begin:: Subheader -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				{{-- <h3 class="kt-subheader__title">					
					Calendar                           
				</h3>		
	
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
					<a href="#" class="kt-subheader__breadcrumbs-link">
						Calendar                       
					</a>									
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end:: Subheader -->
	
	<!-- begin:: Content -->
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
			<div class="row">
		   <div class="col-lg-12">	
			   <!--begin::Portlet-->
			<div class="kt-portlet" id="kt_portlet">
				<div class="kt-portlet__head">
					<div style="display:flex">
						<div class="kt-portlet__head-label calendar--tabs active" data-rel="google-calendar">
							<span class="kt-portlet__head-icon">
								<i class="la la-google"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Google Calendar
							</h3>
						</div>
						<div class="kt-portlet__head-label calendar--tabs" data-rel="calendar" style="margin-left: 30px">
							<span class="kt-portlet__head-icon">
								<i class="flaticon-calendar"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Calendar
							</h3>
						</div>
					</div>
					<div style="display:flex">
						<div class="kt-portlet__head-toolbar" style="margin-right:10px;">
							<a href="/admin/calendar/sync-google" class="btn btn-danger btn-elevate btn-pill">
								<i class="la la-google"></i>
								Sync Google
							</a>
						</div>						
						{{-- <div class="kt-portlet__head-toolbar">
							<a href="#" class="btn btn-brand btn-elevate btn-pill">
								<i class="la la-plus"></i>
								Add
							</a>
						</div> --}}
					</div>
				</div>
				<div class="kt-portlet__body">
					{{-- <h1></h1> --}}
					<div class="admin--calendar">
						@include('supportNew/pages/calendar/_google-calendar');						
					</div>
				</div>
			</div>	
			<!--end::Portlet-->
		</div>
	</div>
		</div>
	<!-- end:: Content -->							
</div>

<script>

	$(()=>{

		function switchCalendar(e){
			supportAjax({
				url : '/admin/calendar/fetch_calendar/'+$(this).attr('data-rel')
			}, (response) => {
				$(this).addClass('active').siblings().removeClass('active')
				$('.admin--calendar').html(response);
			});
		}	

		clickEvent('.calendar--tabs')(switchCalendar)	

	});

</script>

