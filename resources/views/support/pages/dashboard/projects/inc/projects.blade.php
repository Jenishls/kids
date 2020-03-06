
<div class="profile_main">
        <div class="row profile">
            <div class="col-md-3 profile_right_col">
                <div class="profile-sidebar">
                    {{-- Sidebar Userpic and Title --}}
                    <div class="profile-tile-img">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-ribbon">
                            <div class="kt-ribbon__target" style="">
                                <span class="kt-ribbon__inner"></span>Developer
                            </div> 
                            
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                               {{-- @if(auth()->user()->profilePicture() != null)
                                    <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("user/profile/".auth()->user()->profilePicture())))}}" alt=" " class="user_dp_class" height="100" width="100">
                                @else
                                    <img src="{{asset('media/users/default.jpg')}}" alt="Profile Pic" class="user_dp_class" height="100" width="100">
                                @endif --}}

                                <div class="profile-usertitle-name">
                                    {{ucfirst(auth()->user()->name)}}
                                </div>
                            
                            <div class="profile-usertitle-job">
                                
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                    </div>
                    
                    <!-- SIDEBAR BUTTONS -->
                    {{-- <div class="profile-userbuttons">
                        <button type="button" class="btn btn-success btn-sm">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm">Message</button>
                    </div> --}}
                    <!-- END SIDEBAR BUTTONS -->

                    <!--SIDEBAR EMAIL BUTTON-->
                        <div class="profile-userbuttons">
                            <p><i class="far fa-envelope"></i>{{auth()->user()->email}}</p>
                            <p class="profile-separator">|</p>
                            <p> <i class="fas fa-phone-alt"></i>01-2323232</p>
                            {{-- <p>Kathmandu, Nepal</p> --}}
                        </div>
                    <!-- END SIDEBAR EMAIL BUTTONS -->


                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav user_profile_nav ">
                            <li class="user_profile_menu profile_menu_active" data-url = "/userMenu/profileView" >
                                <a href="">
                                <i class="far fa-user"></i>
                                Profile Overview </a>
                            </li>
                            <li class="user_profile_menu" data-url = "/userMenu/personalInfo" >
                                <a href="">
                                <i class="far fa-user"></i>
                                Personal Information </a>
                            </li>
                            <li class="user_profile_menu" data-url = "/userMenu/accountInfo" >
                                <a href="">
                                <i class="fas fa-info"></i>
                                Account Information </a>
                            </li>
                            <li class="user_profile_menu" data-url = "/userMenu/changePassword" >
                                <a href="">
                                <i class="fas fa-user-shield"></i>
                                Change Password </a>
                            </li>
                            {{-- <li>
                                <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                            </li> --}}
                            {{-- <li>
                                <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content" id="user-profile-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin:: Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid projectsContent">
                                <div class="kt-portlet__body kt-portlet__body--fit">
                                    <!--begin::Widget -->
                                    <div class="kt-widget kt-widget--project-1">
                                        <div class="kt-widget__head projectWidgetHead">
                                            <div class="kt-portlet__head-toolbar">
                                                <a href="#">
                                                    Tasks
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                <span class="kt-nav__link-text">Reports</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                <span class="kt-nav__link-text">Messages</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                <span class="kt-nav__link-text">Charts</span>
                                                            </a>
                                                        </li>
                                                        {{-- <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                <span class="kt-nav__link-text">Members</span>
                                                            </a>
                                                        </li> --}}
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="kt-widget__body projectWidgetBody">
                                            <div class="kt-widget__stats projectWidgetStats">
                                                <div class="kt-widget__item ">
                                                    <span class="kt-widget__date projectWidgetDate">
                                                        Start Date
                                                    </span>
                                                    <div class="kt-widget__label">
                                                        <span class="btn btn-label-brand btn-sm btn-bold btn-upper">07 may, 18</span>
                                                    </div>
                                                </div>
                    
                                                <div class="kt-widget__item projectWidgetItem">
                                                    <span class="kt-widget__date projectWidgetDate">
                                                        Due Date
                                                    </span>
                                                    <div class="kt-widget__label">
                                                        <span class="btn btn-label-danger btn-sm btn-bold btn-upper">07 0ct, 18</span>
                                                    </div>
                                                </div>
                    
                                                <div class="kt-widget__item flex-fill projectWidgetItem">
                                                    <span class="kt-widget__subtitel projectWidgetDate">Progress</span>
                                                    <div class="kt-widget__progress projectWidgetProgress d-flex  align-items-center">
                                                        <div class="progress" style="height: 5px;width: 100%;">
                                                            <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="kt-widget__stat">
                                                            100%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                    
                                        <div class="kt-widget__footer projectWidgetFooter">
                                            <div class="kt-widget__wrapper projectWidgetWrapper">
                                                <div class="kt-widget__section projectWidgetSection">
                                                    <div class="kt-widget__blog projectWidgetBlog">
                                                        <i class="flaticon2-list-1"></i>
                                                        <a href="#" class="kt-widget__value projectWidgetValue kt-font-brand projectFontBrand">72 Tasks</a>
                                                    </div>
                    
                                                    <div class="kt-widget__blog projectWidgetBlog">
                                                        <i class="flaticon2-talk"></i>
                                                        <a href="#" class="kt-widget__value projectWidgetValue kt-font-brand projectFontBrand">648 Comments</a>
                                                    </div>
                                                </div>
                    
                                                <div class="kt-widget__section">
                                                    <button type="button" class="btn btn-brand btn-sm btn-upper btn-bold">details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Widget -->
                                </div>
                            </div>
                            <!--end:: Portlet-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>