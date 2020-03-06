
<!--end: Quick panel toggler -->
</div>

<!-- end:: Header Topbar -->
</div>
</div>
<div class="kt-header__bottom">
    <div class="kt-container">
        <!-- begin: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
                <ul class="kt-menu__nav">
                    @foreach ($parentMenus as $menu)
                        @if($menu->route !== 'parent')
                        <li class="kt-menu__item" aria-haspopup="true">
                        <a class="kt-menu__link pageload"  onclick="event.preventDefault();" data-route="{{$menu->route}}"><span class="kt-menu__link-text">{{$menu->name}}</span></a>
                        </li>
                        @else
                        <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"
                        data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <span class="kt-menu__link-text">{{$menu->name}}</span>
                                <i class="kt-menu__hor-arrow la la-angle-down"></i>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                <ul class="kt-menu__subnav">
                                    <!-- menu items -->
                                    <!-- single menu -->
                                    @foreach($subMenus as $submenu)
                                    @if($submenu->parent_id == $menu->id)
                                    <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                        <a href="javascript:void(0);" id="" class="kt-menu__link kt-menu__toggle pageload"
                                            onclick="event.preventDefault();" data-route="{{$submenu->route}}">
                                            @foreach($icons as $icon)
                                            @if(strtolower($icon->icon_name) === strtolower($submenu->name))
                                                <i class="kt-menu__link-icon {{$icon->icon_class}}"></i>
                                            @endif
                                            @endforeach
                                            <span class="kt-menu__link-text menuList">{{$submenu->name}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endif
                    @endforeach
                    {{-- <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="demo8/index.html"
                            class="kt-menu__link "><span class="kt-menu__link-text">Application</span></a></li>
                    <!-- smaple tab menu -->
                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"
                        data-ktmenu-submenu-toggle="click" aria-haspopup="true">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-text">Components</span>
                            <i class="kt-menu__hor-arrow la la-angle-down"></i>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>

                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                            <ul class="kt-menu__subnav">
                                <!-- menu items -->
                                <!-- single menu -->
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                        <i class="kt-menu__link-icon flaticon2-rocket-2"></i>
                                        <span class="kt-menu__link-text">Base</span>
                                    </a>

                                </li>

                                <!-- with sub menu -->
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                        <i class="kt-menu__link-icon flaticon2-rocket-2"></i>
                                        <span class="kt-menu__link-text">Base</span>
                                        <i class="kt-menu__hor-arrow la la-angle-right"></i>
                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <!-- sub menu start -->
                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item " aria-haspopup="true">
                                                <a href="/metronic/preview/demo8/components/base/colors.html"
                                                    class="kt-menu__link ">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="kt-menu__link-text">State Colors</span>
                                                </a>
                                            </li>
                                            <li class="kt-menu__item " aria-haspopup="true">
                                                <a href="/metronic/preview/demo8/components/base/typography.html"
                                                    class="kt-menu__link ">
                                                    <i
                                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text">Typography</span>
                                                </a>
                                        </ul>
                                    </div>
                                    <!-- sub menu ends -->

                                </li>
                                <!-- sub menu end -->

                            </ul>
                        </div>
                    </li>
            
                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-text">Tables</span>
                            <i class="kt-menu__hor-arrow la la-angle-down"></i>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                            <ul class="kt-menu__subnav">
                                <!-- Look up items -->
                                <!-- single menu -->
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" id="loadLookupView" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/lookUp">
                                        <i class="kt-menu__link-icon fas fa-search"></i>
                                        <span class="kt-menu__link-text menuList">Lookups</span>
                                    </a>

                                </li>
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/validation">
                                        <i class="kt-menu__link-icon flaticon2-list-1"></i>
                                        <span class="kt-menu__link-text menuList">Validations</span>
                                    </a>

                                </li>
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/userLogs">
                                        <i class="kt-menu__link-icon fas fa-user-clock"></i>
                                        <span class="kt-menu__link-text menuList">User Logs</span>
                                    </a>

                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <!-- sample tabl menu ends -->

                    

                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"
                        data-ktmenu-submenu-toggle="click" aria-haspopup="true">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-text">Settings</span>
                            <i class="kt-menu__hor-arrow la la-angle-down"></i>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>

                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                            <ul class="kt-menu__subnav">
                                <!-- menu items -->
                                <!-- single menu -->
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/system/menu">
                                        <i class="kt-menu__link-icon flaticon2-rocket-2"></i>
                                        <span class="kt-menu__link-text menuList">Menu</span>
                                    </a>

								</li>

                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/system/icon">
                                        <i class="kt-menu__link-icon flaticon2-rocket-2"></i>
                                        <span class="kt-menu__link-text">Icon</span>
                                    </a>

                                </li>

                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/rolePermission">
                                        <i class="fas fa-user-tag kt-menu__link-icon"></i>
                                        <span class="kt-menu__link-text menuList">Role and Permission</span>
                                    </a>

								</li>


                                @foreach($menus as $menu)
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="{{$menu->route}}">
                                        <i class="kt-menu__link-icon {{$menu->icon}}"></i>
                                        <span class="kt-menu__link-text menuList">{{$menu->name}}</span>
                                    </a>

                                </li>

                                @endforeach

                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/siteSetting">
                                        <i class="kt-menu__link-icon flaticon2-settings"></i>
                                        <span class="kt-menu__link-text menuList">Site Settings</span>
                                    </a>

                                </li>

                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle auditload"
                                        onclick="event.preventDefault();" data-route="/system/audit">
                                        <i class="kt-menu__link-icon fas fa-user-md"></i>
                                        <span class="kt-menu__link-text menuList">Audit</span>
                                    </a>

                                </li>
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/defaultCompany">
                                        <i class="kt-menu__link-icon far fa-building"></i>
                                        <span class="kt-menu__link-text menuList">Default Company</span>
                                    </a>

                                </li>


                                <!-- with sub menu -->
                                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                    aria-haspopup="true">
                                    <a  data-route="/users" class="kt-menu__link kt-menu__toggle pageload userControl">
                                        
                                        <i class="kt-menu__link-icon fas fa-users-cog"></i>
                                        <span class="kt-menu__link-text menuList"> Users Control</span>
                                    </a>
                                    

                                </li>
                                <li class="kt-menu__item " aria-haspopup="true">
                                    <a href="javascript:void(0);" class="kt-menu__link kt-menu__toggle pageload"
                                        onclick="event.preventDefault();" data-route="/noteList">
                                        <i class="kt-menu__link-icon fas flaticon-list"></i>
                                        <span class="kt-menu__link-text menuList">Note</span>
                                    </a>
                                </li>
								<!-- sub menu end -->
                            </ul>
                        </div>
                    </li> --}}

                </ul>

            </div>
        </div>
        <!-- end: Header Menu -->
    </div>
</div>
</div>
<!-- end:: Header -->

<!-- end:: Subheader -->
