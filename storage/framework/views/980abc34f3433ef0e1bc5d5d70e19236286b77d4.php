            <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper" style="opacity: 1;">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- head_top_nav">
                    <ul class="kt-menu__nav ">
                            <?php $__currentLoopData = $parentMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!$menu->subMenus->count()): ?>
                                <li class="kt-menu__item" aria-haspopup="true">
                                    <a class="kt-menu__link pageload"  onclick="event.preventDefault();" data-route="<?php echo e($menu->route ? $menu->route : 'admin/c404'); ?>"><span class="kt-menu__link-text" ><?php echo e($menu->name); ?></span></a>
                                </li>
                            <?php else: ?>
                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"
                            data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <span class="kt-menu__link-text" ><?php echo e($menu->name); ?></span>
                                    <i class="kt-menu__hor-arrow la la-angle-down"></i>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu  <?php if(ucfirst($menu->name) === 'Table'): ?> kt-menu__submenu--fixed kt-menu__submenu--center <?php else: ?> kt-menu__submenu--classic kt-menu__submenu--left <?php endif; ?>" <?php if(ucfirst($menu->name) === 'Table'): ?> style="width:1000px;"<?php endif; ?>>
                                    <ul class="kt-menu__subnav">
                                        <!-- menu items -->
                                        <?php if(ucfirst($menu->name) === 'Table'): ?>
                                            
                                            <ul class="kt-menu__content">
                                                <?php $__currentLoopData = $menu->subMenus->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle">
                                                        <span class="kt-menu__link-text">Table Group <?php echo e($key+1); ?></span>
                                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                                    </h3>
                                                    <ul class="kt-menu__inner">
                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                                        aria-haspopup="true">
                                                            <a href="javascript:void(0);" id="" class="kt-menu__link kt-menu__toggle pageload"
                                                                onclick="event.preventDefault();" data-route="<?php echo e($submenu->route ? $submenu->route : 'admin/c404'); ?>">
                                                               
                                                                    <i class="kt-menu__link-icon <?php echo e($submenu->icon_class); ?>"></i>
                                                              
                                                                <span class="kt-menu__link-text menuList" style="<?php echo e($submenu->route ? '' :'color:#E8E8E8!important;'); ?>" ><?php echo e($submenu->name); ?></span>
                                                            </a>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </ul>
                                        <?php else: ?>
                                            <!-- single menu -->
                                            <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                            <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover"
                                            aria-haspopup="true">
                                                <a href="javascript:void(0);" id="" class="kt-menu__link kt-menu__toggle pageload"
                                                    onclick="event.preventDefault();" data-route="<?php echo e($submenu->route ? $submenu->route : 'admin/c404'); ?>">
                                                
                                                  
                                                        <i class="kt-menu__link-icon <?php echo e($submenu->icon_class); ?>"></i>
                                                   
                                                    <span class="kt-menu__link-text menuList"  style="<?php echo e($submenu->route ? '' :'color:#E8E8E8!important;'); ?>"><?php echo e($submenu->name); ?></span>
                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<!--end: Notifications --><?php /**PATH D:\support\resources\views/supportNew/pages/dashboard/inc/htopbar.blade.php ENDPATH**/ ?>