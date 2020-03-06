<!--begin: User bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px" >
		{{-- <span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span> --}}
		<span class="kt-header__topbar-username kt-visible-desktop">{{ucfirst(auth()->user()->name)}}</span>
		{{-- @if(auth()->user()->profilePicture() != null)
			<img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".auth()->user()->profilePicture())))}}" alt=" " class="user_dp_class" height="40" width="40">
		@else  --}}
			<img src="{{asset('media/users/default.jpg')}}" alt="Profile Pic" class="user_dp_class" height="40" width="40">
		{{-- @endif --}}
		<span class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
		<span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl" id="userNotifyNav">

		<!--begin: Head -->
		<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x  get_profile" data-route = "/users/userProfile/{{auth()->user()->id}}">
			<div class="kt-user-card__avatar">
				{{-- @if(auth()->user()->profilePicture() != null)
					<img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".auth()->user()->profilePicture())))}}" alt=" " class="user_dp_class" height="100" width="100">
				@else --}}
					<img src="{{asset('media/users/default.jpg')}}" alt="Profile Pic" class="user_dp_class" height="100" width="100">
				{{-- @endif --}}

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