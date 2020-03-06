<!-- Start Services Area -->
<div class="services-area services-style-one mtb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section_title text-center">
                    <h2 class="title__heading text-capitalize">Our Services</h2>
                    <p>We provide quility services</p>
                </div><!--/.section_title-->
            </div>
        </div><!--/.row-->
        {{-- {{dd($posts)}} --}}
        <div class="row">
            {{-- {{dd($posts)}} --}}
            @foreach ($posts as $post)
                @if ($post->file)
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!-- Start services thumb area -->
                        <div class="services_thumb_area">
                            <figure class="services_thumb image_effect">
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thumb">
                                <a class="btn btn-default load_pages" data-route="/netlifytemp/contact">CONTACT US</a>
                            </figure>
                        </div><!-- End services thumb area -->
                    </div>
                @endif                
            @endforeach
            @php $posts->shift(); @endphp
           
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- Star Services Carousel -->
                <div class="services_carousel owl-carousel">
                    <!-- Star Carousel Item -->
                    <div class="item">
                        <div class="row">
                         @foreach ($posts->chunk(2) as $items)
                        {{-- {{dd($items)}} --}}
                            @foreach ($items as $post)
                                
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon {{$post->highlight}}"></span>
                                    <h3>{{$post->title}}</h3>
                                    <p>{{$post->sub_title}} </p>
                                </div>
                            </div><!-- End Single Service -->
                            @endforeach
                            @if (!$loop->last)
                                
                            <div class="clearfix hidden-sm hidden-xs"></div>
                            @endif
                        @endforeach
                            {{-- <!-- Start Single Service -->
                            <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-coding"></span>
                                    <h3>Web Development</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service -->

                            <div class="clearfix hidden-sm hidden-xs"></div> --}}

                            {{-- <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-language"></span>
                                    <h3>Programming</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service -->
                            <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-vector-1"></span>
                                    <h3>Graphic Design</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service --> --}}
                        </div>
                    </div><!-- End Carousel Item -->
                    <!-- Star Carousel Item -->
                    <div class="item">
                        <div class="row">
                            {{-- <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-coding"></span>
                                    <h3>Responsive Design</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service -->
                            <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-responsive"></span>
                                    <h3>Web Development</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service -->

                            <div class="clearfix hidden-sm hidden-xs"></div>

                            <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-language"></span>
                                    <h3>Programming</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service -->
                            <!-- Start Single Service -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon flaticon-vector-1"></span>
                                    <h3>Graphic Design</h3>
                                    <p>Lorem Ipsum is simply  dummy text of the printing and type setting industry lorem </p>
                                </div>
                            </div><!-- End Single Service --> --}}
                            @foreach ($posts->chunk(2) as $items)
                        {{-- {{dd($items)}} --}}
                            @foreach ($items as $post)
                                
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon {{$post->highlight}}"></span>
                                    <h3>{{$post->title}}</h3>
                                    <p>{{$post->sub_title}} </p>
                                </div>
                            </div><!-- End Single Service -->
                            @endforeach
                            @if (!$loop->last)
                                
                            <div class="clearfix hidden-sm hidden-xs"></div>
                            @endif
                        @endforeach
                        </div>
                    </div><!-- End Carousel Item -->
                    <!-- Star Carousel Item -->
                    <div class="item">
                        <div class="row">
                            @foreach ($posts->chunk(2) as $items)
                        {{-- {{dd($items)}} --}}
                            @foreach ($items as $post)
                                
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_service text-center">
                                    <span class="service_icon {{$post->highlight}}"></span>
                                    <h3>{{$post->title}}</h3>
                                    <p>{{$post->sub_title}} </p>
                                </div>
                            </div><!-- End Single Service -->
                            @endforeach
                            @if (!$loop->last)
                                
                            <div class="clearfix hidden-sm hidden-xs"></div>
                            @endif
                        @endforeach
                        </div>
                    </div><!-- End Carousel Item -->
                </div><!-- End Services Carousel -->
            </div>
        </div>
    </div>
</div>
<!-- End Services Area -->