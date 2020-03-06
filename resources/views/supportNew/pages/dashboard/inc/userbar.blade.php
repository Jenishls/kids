<!--begin: User bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user get_profile" data-route="/admin/users/userProfile/{{auth()->user()->id}}" style="cursor: pointer;">
	<span class="kt-header__topbar-username kt-visible-desktop text-info" data-toggle="kt-popover" title="" data-placement="bottom" data-content="{{ucfirst(auth()->user()->name)}}" data-original-title="">{{ucfirst(auth()->user()->name)}}</span>
</div>
{{-- <!--begin: User bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px" >
		<span class="kt-header__topbar-username kt-visible-desktop">{{ucfirst(auth()->user()->name)}}</span>
			<img src="{{asset('media/users/default.jpg')}}" alt="Profile Pic" class="user_dp_class" height="40" width="40">
		<span class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
		<span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl" id="userNotifyNav">
		<!--begin: Head -->
		<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x  get_profile" data-route = "/users/userProfile/{{auth()->user()->id}}">
			<div class="kt-user-card__avatar">
				
					<img src="{{asset('media/users/default.jpg')}}" alt="Profile Pic" class="user_dp_class" height="100" width="100">
				<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
				<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
			</div>
			<div class="kt-user-card__name">
				{{ucfirst(auth()->user()->name)}}
			</div>
			<div class="kt-user-card__badge">
				<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
			</div>
		</div>
		<!--begin: Navigation -->
		<div class="kt-notification" id="profileUpdater">
		    <a  class="kt-notification__item get_profile" data-route = "/users/userProfile/{{auth()->user()->id}}">
		        <div class="kt-notification__item-icon">
		            <i class="flaticon2-calendar-3 kt-font-success"></i>
		        </div>
		        <div class="kt-notification__item-details">
		            <div class="kt-notification__item-title kt-font-bold">
		                My Profile
		            </div>
		            <div class="kt-notification__item-time">
		                Account settings and more
		            </div>
		        </div>
		    </a>
		    <div class="kt-notification__custom kt-space-between">
		        <a href='#' onclick="logout();" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
		        <a href="demo8/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
		    </div>
		</div>
		<!--end: Navigation -->
	</div>
</div> --}}