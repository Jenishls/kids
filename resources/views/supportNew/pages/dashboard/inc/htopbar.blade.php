            <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper" style="opacity: 1;">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- head_top_nav">
                    <ul class="kt-menu__nav ">
                            @foreach ($parentMenus as $menu)
                            @if(!$menu->subMenus->count())
                                <li class="kt-menu__item" aria-haspopup="true">
                                    <a class="kt-menu__link pageload"  onclick="event.preventDefault();" data-route="{{$menu->route ? $menu->route : 'admin/c404' }}"><span class="kt-menu__link-text" >{{$menu->name}}</span></a>
                                </li>
                            @else
                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"
                            data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <span class="kt-menu__link-text" >{{$menu->name}}</span>
                                    <i class="kt-menu__hor-arrow la la-angle-down"></i>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu  @if(ucfirst($menu->name) === 'Table') kt-menu__submenu--fixed kt-menu__submenu--center @else kt-menu__submenu--classic kt-menu__submenu--left @endif" @if(ucfirst($menu->name) === 'Table') style="width:1000px;"@endif>
                                    <ul class="kt-menu__subnav">
                                        <!-- menu items -->
                                        @if (ucfirst($menu->name) === 'Table')
                                            {{-- {{dd('Table')}} --}}
                                            <ul class="kt-menu__content">
                                                @foreach ($menu->subMenus->chunk(4) as $key => $items)
                                                    
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle">
                                                        <span class="kt-menu__link-text">Table Group {{$key+1}}</span>
                                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                                    </h3>
                                                    <ul class="kt-menu__inner">
                                                        @foreach($items as $submenu)
                                                        <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                                        aria-haspopup="true">
                                                            <a href="javascript:void(0);" id="" class="kt-menu__link kt-menu__toggle pageload"
                                                                onclick="event.preventDefault();" data-route="{{$submenu->route ? $submenu->route : 'admin/c404' }}">
                                                               
                                                                    <i class="kt-menu__link-icon {{$submenu->icon_class}}"></i>
                                                              
                                                                <span class="kt-menu__link-text menuList" style="{{$submenu->route ? '' :'color:#E8E8E8!important;'}}" >{{$submenu->name}}</span>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                               
                                            </ul>
                                        @else
                                            <!-- single menu -->
                                            @foreach($menu->subMenus as $submenu)


                                            <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                            aria-haspopup="true">
                                                <a href="javascript:void(0);" id="" class="kt-menu__link kt-menu__toggle pageload"
                                                    onclick="event.preventDefault();" data-route="{{$submenu->route ? $submenu->route : 'admin/c404' }}">
                                                
                                                  
                                                        <i class="kt-menu__link-icon {{$submenu->icon_class}}"></i>
                                                   
                                                    <span class="kt-menu__link-text menuList"  style="{{$submenu->route ? '' :'color:#E8E8E8!important;'}}">{{$submenu->name}}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @endif
                        @endforeach
                </div>
            </div>
            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar">

               
                <!--begin: Notifications -->
                <div class="kt-header__topbar-item dropdown">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,10px">
                        <span class="kt-header__topbar-icon">
                            <i class="flaticon2-bell-alarm-symbol"></i>
                            <span class="kt-badge kt-badge--success kt-hidden"></span>
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                    </div>
                </div>

<!--end: Notifications -->