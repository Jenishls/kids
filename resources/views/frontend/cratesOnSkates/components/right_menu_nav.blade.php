
<div class="menu-right pull-right">
    <div>
        <nav id="main-nav crater_right_menu_nav">
            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                {{-- <li>
                    <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li> --}}
                @foreach ($menus as $key => $menu)
                    <li>
                        {{-- {{dd($menu->route)}} --}}
                        <a href="javascript:void(0);" class="load_pages" data-route="{{$menu->route}}" data-slug="{{$menu->slug?: str_slug($menu->name)}}"> {{ucwords($menu->name)}}</a>
                    </li>
                @endforeach

                {{-- <li>
                    <a href="#">Residential</a>
                </li>
                <li>
                    <a href="category-page.html">Office</a>
                </li>
                <li class="mega" id="hover-cls"><a href="#">About
                </a>
                </li>
                <li><a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">FAQ</a>
                </li> --}}
            </ul>
        </nav>
    </div>
    {{-- <div>
        <div class="icon-nav">
            <ul>
                <li class="onhover-div mobile-search">
                    <div><img src="../assets/images/icon/search.png" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                    <div id="search-overlay" class="search-overlay">
                        <div> <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                            <div class="overlay-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="onhover-div mobile-setting">
                    <div><img src="../assets/images/icon/setting.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i></div>
                    <div class="show-div setting">
                        <h6>language</h6>
                        <ul>
                            <li><a href="#">english</a></li>
                            <li><a href="#">french</a></li>
                        </ul>
                        <h6>currency</h6>
                        <ul class="list-inline">
                            <li><a href="#">euro</a></li>
                            <li><a href="#">rupees</a></li>
                            <li><a href="#">pound</a></li>
                            <li><a href="#">doller</a></li>
                        </ul>
                    </div>
                </li>
                <li class="onhover-div mobile-cart">
                    <div><img src="../assets/images/icon/cart.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
                    <ul class="show-div shopping-cart">
                        <li>
                            <div class="media">
                                <a href="#"><img alt="" class="mr-3" src="../assets/images/fashion/product/1.jpg"></a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4><span>1 x $ 299.00</span></h4>
                                </div>
                            </div>
                            <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                        </li>
                        <li>
                            <div class="media">
                                <a href="#"><img alt="" class="mr-3" src="../assets/images/fashion/product/2.jpg"></a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4><span>1 x $ 299.00</span></h4>
                                </div>
                            </div>
                            <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                        </li>
                        <li>
                            <div class="total">
                                <h5>subtotal : <span>$299.00</span></h5>
                            </div>
                        </li>
                        <li>
                            <div class="buttons"><a href="cart.html" class="view-cart">view cart</a> <a href="#" class="checkout">checkout</a></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div> --}}
</div>