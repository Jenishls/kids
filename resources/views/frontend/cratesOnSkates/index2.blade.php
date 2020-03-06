@include('frontend.cratesOnSkates.components.main_header')
@include('frontend.cratesOnSkates.components.nav')

   {{--  <div class="cos-main-wrapper">
        <div id="cos-menu-top" class="container cos-max-width">
            <div class="row">

                <!-- logo -->
                <div class="col-md-2 col-lg-2">
                    <div class="cos-mt-10">
                        <a href="javascript:void(0);"><img src="{{asset('cratesoskates/images/cratesOnSkatesLogo.png')}}" class="img-fluid blur-up lazyload col-form-label-sm cos-logo" alt=""></a>
                    </div>
                </div>
                <!-- logo ends -->

                <!-- nav container -->
                <div class="col-md-10 col-lg-10">

                    <!-- nav top -->
                    <div class="cos-top-menu-contact-login-order">
                        <ul class="cos-top-list">
                            <li>
                                <span class="cos-call-us-now cos-color-green"><i class="fa fa-phone"></i> Call us now :- </span>
                                <span class="fs-14-b">+1 (888) 479-1888</span>
                            </li>

                            <li>
                                <span class="cos-top-account"><i class="fas fa-sign-in-alt cos-text-green"></i> <span class="fs-14-b">Login</span></span>
                            </li>
                            <li>
                                <span class="cos-btn">Order Now</span>
                            </li>
                        </ul>
                    </div>
                    <!-- nav top ends -->


                    <!-- nav main starts -->
                    <div class="cos-top-main-menu">
                        <div class="float-right">
                            <ul class="cos-main-menu-list">
                                @if(count($menus)>0)
                                    @foreach ($menus as $key => $menu)
                                    <li><a href="javascript:void(0);" class="load_pages" data-route="{{$menu->route}}"> {{ucwords($menu->name)}}</a></li>
                                    @endforeach
                                @else
                                    <li><a href="javascript:void(0);">Home</a></li>
                                    <li><a href="javascript:void(0);">Residental</a></li>
                                    <li><a href="javascript:void(0);">Office</a></li>
                                    <li><a href="javascript:void(0);">Products</a></li>
                                    <li><a href="javascript:void(0);">Contact us</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- nav main ends -->

                </div>

                <!-- nav container ends -->
            </div>
        </div> --}}


        <div id="page-section" class="page-section">
                 @foreach ($components  as $component)
                    @include($component->location.$component->file_name, ['posts' =>$component->posts])   
                    {{-- <hr class="type_7" style="background: url({{asset("images/type_7.png")}})" style="background: no-repeat;"> --}}
                @endforeach
               {{--  <div id="cos-banner-slider">
                    <div class="cos-banner-container load_pages" onclick="location.reload();">
                        <img src="{{asset("images/slider/slider2.jpg")}}">
                    </div>
                </div> --}}
            
                {{-- <div class="cos-how-it-works">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="cos-pd-t-40">
                                    <div class="title3">
                                        <h2 class="title-inner3 cos-color-theme">How it works ?</h2>
                                        <div class="line"></div>
                                    </div>
                                    <div class="cos-flex-container">
                                        <div>
                                            <div class="p-right text-center">
                                                <div class="img-part" style="height: 100%;">
                                                    <img src="../assets/images/sub-banner2.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div>
                                                <div class="contain-banner">
                                                    <div style="background:transparent !important;">
                                                        <img src="{{asset('cratesoskates/images/number_2.png')}}" style="height:100px; display:block;    margin-left: 89px; padding-bottom:10px; padding-top:10px;" class="img-fluid blur-up lazyload" alt="">
                                                        <h3>We Deliver</h3>
                                                       
                                                        <h5 style="text-transform:none; color:#f0b54d;">The boxes are dropped off at your doorstep.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <div class="p-right text-center">
                                                    <div class="img-part" style="height: 100%;">
                                                        <img src="../assets/images/sub-banner2.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                                                    </div>
                                                    <div class="contain-banner">
                                                        <div style="background:transparent !important;">
                                                            <img src="{{asset('cratesoskates/images/number_2.png')}}" style="height:100px; display:block;    margin-left: 89px; padding-bottom:10px; padding-top:10px;" class="img-fluid blur-up lazyload" alt="">
                                                            <h3>You Move</h3>
                                                     
                                                            <h5 style="text-transform:none; color:#f0b54d;">Fill the boxes and take 'em where you want to</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <div class="p-right text-center">
                                                    <div class="img-part" style="height: 100%;">
                                                        <img src="../assets/images/sub-banner2.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                                                    </div>
                                                    <div class="contain-banner">
                                                        <div style="background:transparent !important;">
                                                            <img src="{{asset('cratesoskates/images/number_2.png')}}" style="height:100px; display:block; margin-left: 89px; padding-bottom:10px; padding-top:10px;" class="img-fluid blur-up lazyload" alt="">
                                                            <h3>We Pick-Up</h3>
                                                            <h5 style="text-transform:none; color:#f0b54d;">Relax and unpack! We come get the boxes.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 --}}
                {{-- <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="cos-pd-t-40">
                                    <div class="title3">
                                        <h2 class="title-inner3 cos-color-theme">LEARN ABOUT RECYCLABLE MOVING BOXES</h2>
                                        <div class="line"></div>
                                    </div>
                                    <div class="container">
                                        <section class="p-0">
                                            <div class="slide-1 home-slider">
                                                <div>
                                                    <div class="home  text-center">
                                                        <img src="" alt="" class="bg-img blur-up lazyload">
                                                        <div class="container">
                                                            <div class="row">
                                                                
                                                                <div class="col-7 home_first_content_left">
                                                                    <div class="slider-contain">
                                                                        <div>
                                                                            <img src="{{asset('cratesoskates/images/home_bucket.jpg')}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=" col-4">
                                                                    <div class="slider-contain">
                                                                        <div>
                                                                            <h3>How Crates on Skates Works</h3>
                                                                            <p>We rent clean, heavy duty plastic moving crates and wheels. You simply order on-line and we deliver the crates to you. When you are done, we pick them up. No buying cardboard and tape that you will throw away. Save time, money and be eco-friendly</p>
                                                                            {{-- <a href="#" class="btn btn-solid">shop now</a> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}} 


        </div>
    {{-- </div> --}}

    @include('frontend.cratesOnSkates.components.footer')
@include('frontend.cratesOnSkates.components.main_footer')