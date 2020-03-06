{{-- {{dd($user->profilePicture())}} --}}
<div class="profile-container">
    {{-- breadcrumb --}}
    <div class="kt-subheader   kt-grid__item uc_subHeader" id="kt_subheader">
        <div class="kt-container ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{ucfirst($user->member->first_name)}} {{$user->member->middle_name? ucfirst($user->member->middle_name): ''}}  {{ucfirst($user->member->last_name)}}
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="JavaScript:void(0);" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link">Settings</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="JavaScript:void(0);" data-route="/users" class="kt-subheader__breadcrumbs-link pageload">Users Control</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="JavaScript:void(0);" data-route="/users" class="kt-subheader__breadcrumbs-link pageload">{{ucfirst($user->member->first_name)}} {{$user->member->middle_name? ucfirst($user->member->middle_name): ''}}  {{ucfirst($user->member->last_name)}}</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row profile">
        <div class="col-md-3 profile_right_col">
            <div class="profile-sidebar">
                {{-- Sidebar Userpic and Title --}}
                <div class="profile-tile-img">
                    <!-- SIDEBAR Ribbon -->
                    <div class="profile-ribbon">
                        <div class="kt-ribbon__target" style="">
                        <span class="kt-ribbon__inner">#00{{$user->id}}</span>
                        </div> 
                        
                    </div>
                    <!-- END Ribbon -->

                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-img profile_image_div" data-original-title="Change avatar" data-target="#sy_global_modal" data-toggle="modal" data-route="/user/profileImage/{{$user->id}} " data-id="{{$user->id}}">
                        @if($user->profilePicture() != null)
                            <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".$user->profilePicture())))}}" alt=" " class="user_dp_class" height="100" width="100">
                        @else
                            <img src="{{asset('media/users/default.jpg')}}" alt=" " class="user_dp_class" height="100" width="100">
                        @endif
                        
                    </div>
                    <!-- END SIDEBAR USERPIC -->

                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle update_address_details" data-target="#sy_global_modal" data-toggle="modal" data-route="/userProfile/imageTitle/{{$user->id}} " data-id="{{$user->id}}">
                        
                        <div class="profile-usertitle-name">
                            <p class="name_p">{{ucfirst($user->member->first_name)}} {{$user->member->middle_name? ucfirst($user->member->middle_name): ''}}  {{ucfirst($user->member->last_name)}}</p>
                            <p class="user_email"> <i class="far fa-envelope"></i>{{$user->email}}</p>
                            <p class="user_phone"> <i class="fas fa-phone-alt"></i>{{$user->member->mobile_no}}</p>

                            <p class="user_id">
                                <i class="fas fa-briefcase"></i>
                                <span class="font-size: 14px;">
                                    @if(count($user->roles))
                                    @foreach ($user->roles as $key => $role)
                                    {{ucfirst($role->label)}}@if(count($user->roles)>1 && $key!= count($user->roles)-1),@endif
                                    @endforeach
                                    @endif
                                </span>
                            </p>
                            
                        </div>
                    </div>
                    <div class="edit_profile_img_title">
                            <a title="Edit details" class="btn btn-hover-brand btn-icon btn-pill model_load update_address_details" data-target="#sy_global_modal" data-toggle="modal" data-route="/userProfile/imageTitle/{{$user->id}} " data-id="{{$user->id}}"><i class="la la-edit" style="font-size:16px;"></i>							</a>
                    </div>
                    
                    <!-- END SIDEBAR USER TITLE -->
                </div>
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav user_profile_nav ">
                        <!-- Personal Info Section -->
                        <li class="user_profile_menu profile_menu_active" id="personalInformation" data-url = "/userMenu/userPersonalInfo/{{$user->id}}" >
                            <a href="">
                            <i class="far fa-user"></i>
                            Personal Information </a>
                        </li>
                        <!-- End Personal Info Section -->

                        <!-- Passoword Section -->
                        <li class="user_profile_menu" id="changePassword" data-url = "/userMenu/userPasswordInfo/{{$user->id}}" >
                            <a href="">
                            <i class="fas fa-user-shield"></i>
                            Change Password </a>
                        </li>
                        <!-- End Password Section -->
                        
                        <!-- Membership Section -->
                        <li class="user_profile_menu" id="membership" data-url = "/userMenu/userMembershipInfo/{{$user->id}}" >
                            <a href="">
                            <img src="{{asset('media/img/profile-view.png')}}" alt="memership">
                            Membership</a>
                        </li>
                        <!-- End Membership Section -->
                        
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <!-- Default Section -->
        <div class="col-md-9 profile_content_column">
            <div class="profile-content" id="user-profile-content">
                    @include('support.pages.userControl.inc.personal-info')
                    
            </div>
        </div>
    </div>
</div>