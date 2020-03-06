<style type="text/css">
.cs-nav-link {
    display: inline-block;
    color: #fff !important;
    font-weight: 500;
    text-decoration: none;
}

.cs-nav-link::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #9ae665 !important;
    font-weight: 500;
    transition: width .3s;
}
.active-nav{
    color: #76c043 !important;
}

.cs-nav-link:hover::after {
    width: 100%;
    transition: width .3s;
}

/* ======= */
.sub-menu-parent { position: relative; }

.sub-menu { 
  visibility: hidden; /* hides sub-menu */
  opacity: 0;
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  transform: translateY(-2em);
  z-index: -1;
  transition: all 0.3s ease-in-out 0s, visibility 0s linear 0.3s, z-index 0s linear 0.01s;
}

.sub-menu-parent:focus .sub-menu,
.sub-menu-parent:focus-within .sub-menu,
.sub-menu-parent:hover .sub-menu {
  visibility: visible; /* shows sub-menu */
  opacity: 1;
  z-index: 1;
  transform: translateY(0%);
  transition-delay: 0s, 0s, 0.3s; /* this removes the transition delay so the menu will be visible while the other styles transition */
}


.myaccount a { color: #000; display: block; padding: 0.5em 1em; text-decoration: none;width: max-content; }
.myaccount a:hover {
    opacity: 0.8;
}
.myaccount ul,
.myaccount ul li { 
    list-style-type: none;
    margin: 0;
    z-index: 1022;
    width: max-content;
    display: flex;
    flex-direction: column;
}

.myaccount > ul { background: #fff; text-align: left; }
.myaccount > ul > li { display: inline-block; border-left: solid 1px #aaa; }
.myaccount > ul > li:first-child { border-left: none; }

.sub-menu {
  background: #fff;
}
</style>
<div class="loader_wrapper">
        <div class="loader"><div></div><div></div><div></div></div>
</div>
<div class="sc-hd">
    
    

    
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Product Start ***** -->
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 section-content">
                <div class="sc-hd__main">
                    <div class="logo_container">
                        <a href="/">
                            <img src="<?php echo e(asset("cratesOnSkatesImages/crates-logo1.png")); ?>" class="main-logo">
                        </a>
                    </div>                   
                    <div class="sc-hd__order_container">
                        <div class="account_container">
                            <div class="my_account">     
                                
                                <?php if(auth()->check()): ?>  
                                    <p class="user_name">Hello, 
                                        <span class="active"><?php echo e(auth()->user()->name); ?></span>
                                        
                                    </p>
                                <?php endif; ?>
                                <div>
                                    <ul class="account_item">
                                        <?php if(auth()->check()): ?>
                                        <li><a href="javascript:void(0)" class="load_pages" data-route="/cratesonskates/dashboard" data-slug="page-dashboard" style="color:#bb0000 !important;">Dashboard</a></li>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
                                                class=""> <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?> </a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                        
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                        <div>
                            <div class="contact-container">
                                <span class="need-help-text">Need Help? </span>
                                <span class="contact-number">
                                    <span class="cs-span-phone-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                    <?php echo e(preg_replace('/(\d{3})(\d{3})(\d{1,4})/','($1) $2-$3',default_company('phone_number'))); ?>

                                </span>
                            </div>
                            
                            <div class="order-now-container load_pages" data-route="/cratesonskates/residential" data-slug="page-residential">
                                <div class="parent-container">
                                    <div class="round-white">
                                        <div class="cart-icon-container">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="order-now-text">
                                        <span>Order Now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark js--primary-navbar sticky-top striped-pattern-bg mynav" style="padding: 0.5rem 0;">
    <div class="container cs-container-wrapper">
        <div class="row w-100">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 section-content">
                <div>
                    <div class="nav-check">
                            <div>
                                <a href="/">
                                    <img src="<?php echo e(asset("cratesOnSkatesImages/logo-white.png")); ?>">
                                </a>
                            </div>
                            <div class="order-now-container order_now" data-route="crates/ordernow">
                                <div class="parent-container">
                                    <div class="round-white">
                                        <div class="cart-icon-container">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="order-now-text" >
                                        <span>Order Now</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="cs-p-relative">
                            <div class="js__name-order">
                                <a class="navbar-brand sec-nav__create-on-skate" href="#">CratesOnSkates</a>
                                <a class="navbar-brand sec-nav__order-now" href="#">Order Now</a>
                            </div>
                        <button class="navbar-toggler no-pd-left" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <?php if(count($menus)>0): ?>
                                    <li class="nav-item d-flex">
                                        <a class="nav-link cs-nav-link li-logo" href="/">
                                            <img src="<?php echo e(asset("cratesOnSkatesImages/logo-white.png")); ?>" style="height: 30px">
                                        </a>
                                    </li>
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(strtolower($menu->name) === 'login' && !auth()->check()): ?>
                                        <li class="nav-item">
                                            
                                            <a href="javascript:void(0);" class="load_pages nav-link cs-nav-link" id="" data-route="<?php echo e($menu->route); ?>" data-slug="page-<?php echo e($menu->slug?: str_slug($menu->name)); ?>">
                                                <?php echo e(strtoupper($menu->name)); ?>

                                            </a>
                                        </li>

                                        <?php elseif(strtolower($menu->name) === "dashboard" && auth()->check()): ?>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="load_pages nav-link cs-nav-link" id="" data-route="<?php echo e($menu->route); ?>" data-slug="page-<?php echo e($menu->slug?: str_slug($menu->name)); ?>">
                                                <?php echo e(strtoupper($menu->name)); ?>

                                            </a>
                                        </li>
                                        <?php else: ?>
                                        <?php if(in_array(strtolower($menu->name), ['login', 'dashboard'])) continue; ?>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="load_pages nav-link cs-nav-link" data-route="<?php echo e($menu->route); ?>" data-slug="page-<?php echo e($menu->slug?: str_slug($menu->name)); ?>">
                                                <?php echo e(strtoupper($menu->name)); ?>

                                            </a>
                                        </li>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                <?php else: ?>
                                  <li class="nav-item active">
                                    <a class="nav-link cs-nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                  </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link cs-nav-link position-relative order_now" data-route="/crates/show_cart_items">
                                        <i class="fa fa-shopping-cart" style="font-size: 17px"></i>
                                        <span class="cart-badge dp-none" id="shopping--cart"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
          </div>
      </div>
  </div>
</nav>
<?php /**PATH D:\support\resources\views/frontend/cratesOnSkates/components/nav.blade.php ENDPATH**/ ?>