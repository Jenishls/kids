	<!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="demo8/index.html">
                <img style="width: 55px; height: 55px; border-radius: 58px;" alt="Logo" src="<?php echo e(default_sidebar_icon()?:"images/no-image.png"); ?>">
            </a>
                
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

                <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside" style="opacity: 1;  z-index: 99;   position: fixed; height: 100%;">
                        <!-- begin:: Brand -->
                    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                        <div class="kt-aside__brand-logo">
                            <a href="/admin">
                            <img style="width: 55px; height: 55px; border-radius: 58px;" alt="Logo" src="<?php echo e(default_sidebar_icon()?:"images/no-image.png"); ?>">
                            </a>
                        </div>
                    </div>
                    <!-- end:: Brand -->	
                    <!-- begin:: Aside Menu -->
                    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">		
                            <?php if($sideBarMenu): ?>
                            <ul class="kt-menu__nav ">
                                <?php $__currentLoopData = $sideBarMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$menu->subMenus->count()): ?>
                                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight" aria-haspopup="true"  data-toggle="kt-tooltip" data-placement="left" title="" data-original-title="<?php echo e(ucwords($menu->name)); ?>">
                                        <a  class="kt-menu__link kt-menu__toggle <?php if(strtolower($menu->name)!=='admin'): ?> pageload <?php endif; ?>"  <?php if(strtolower($menu->name)!=='admin'): ?> data-route="<?php echo e($menu->route); ?>"
                                            <?php else: ?> href="/admin"<?php endif; ?>>
                                                <i class="kt-menu__link-icon <?php echo e($menu->icon_class); ?>" ></i>
                                           
                                            <span class="kt-menu__link-text text-capitalize" ><?php echo e($menu->name); ?></span>
                                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                    </li>
                                <?php else: ?>
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-dropdown-toggle-class="kt-aside-menu-overlay--on"  title="<?php echo e(ucwords($menu->name)); ?>">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle pageload"  data-route="<?php echo e($menu->route); ?>">
                                        <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(strtolower($icon->icon_name) === strtolower($menu->name)): ?>
                                            <i class="kt-menu__link-icon <?php echo e($icon->icon_class); ?>"></i>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <span class="kt-menu__link-text text-capitalize"><?php echo e($menu->name); ?></span>
                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <!--
                                    <div class="kt-menu__submenu ">
                                        <span class="kt-menu__arrow"></span>
                                        <div class="kt-menu__wrapper kt-scroll ps" style="height: 458px; overflow: hidden;">
                                            <ul class="kt-menu__subnav">
                                                <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link">
                                                    <span class="kt-menu__link-text">Applications</span></span>
                                                </li>
                                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-submenu-mode="accordion">
                                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                        <span class="kt-menu__link-text">Resources</span>
                                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                                    </a>
                                                    <div class="kt-menu__submenu ">
                                                        <span class="kt-menu__arrow"></span>
                                                        <ul class="kt-menu__subnav">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="/metronic/preview/demo7/index.html" class="kt-menu__link ">
                                                                <span class="kt-menu__link-text">Timesheet</span></a>
                                                            </li>
                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="/metronic/preview/demo7/#.html" class="kt-menu__link ">
                                                                <span class="kt-menu__link-text">Payroll</span></a>
                                                            </li>
                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Contacts</span></a>
                                                            </li>
                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Members</span></a>
                                                            </li>
                                                            <li class="kt-menu__item " aria-haspopup="true">
                                                                <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Clients</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Finance</span></a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Support</span></a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Administration</span></a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Management</span></a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Order Management</span></a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Delivery</span>
                                                        <span class="kt-menu__link-badge">
                                                            <span class="kt-badge kt-badge--brand">2</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link ">
                                                        <span class="kt-menu__link-text">Products</span>
                                                    </a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="/metronic/preview/demo7/#.html" class="kt-menu__link "><span class="kt-menu__link-text">Support</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                </div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 2px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                -->
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- end:: Aside Menu -->
                </div>


            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" >

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
                    <div class="kt-header__top">
                        <div class="kt-container">
                            
                            <!-- begin:: Brand -->
                            

                            <!-- end:: Brand --><?php /**PATH D:\support\resources\views/supportNew/pages/dashboard/inc/hmobile.blade.php ENDPATH**/ ?>