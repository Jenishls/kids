<div class="testimonial_area mtb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section_title text-center">
                    <h2 class="title__heading text-capitalize">Testimonial</h2>
                    <p>Happy Clients say?</p>
                </div><!--/.section_title-->
            </div>
        </div><!--/.row-->
        <div class="row">
            @foreach ($posts as $post)
                @if ($post->link_url)
                    
                <div class="col-md-6">
                    <div class="about_thumb_area testimotial_thumb_area">
                        <figure class="about_thumb image_effect">
                            @if ($post->file)
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thumb">
                            @endif
                            <div class="video__inner">
                                <a href="{{$post->link_url}}" class="video__trigger"><i class="fa fa-play"></i></a>
                            </div>
                        </figure><!--/.about_thumb-->
                    </div><!--/.testimotial_thumb_area-->
                </div>
                @endif
            @endforeach  
            
            
            <div class="col-md-6">
                <div class="client_testimonail_carousel owl-carousel">
                    <!-- Start Testimonial Items Group -->
                    <div class="testimonail_items_group">
                        <!-- Start Single Client Testimonial -->
                        @foreach ($posts as $item)
                            @if (!$item->link_url)
                                
                                <div class="client_testimonial_block text-center">
                                    <div class="icon">
                                        <span class="flaticon-quote-button"></span>
                                    </div>
                                    <p>{{$item->highlight}}
                                    </p>
                                    <div class="client_info decorator">
                                        <h5>{{$item->title}}</h5>
                                        <p>{{$item->sub_title}}</p>
                                    </div>
                                </div><!-- End Single Client Testimonial -->
                            @endif
                        @endforeach
                    </div><!-- End Testimonial Items Group -->
                    <!-- Start Testimonial Items Group -->
                    <div class="testimonail_items_group">
                        @foreach ($posts as $item)
                            @if (!$item->link_url)
                                
                                <div class="client_testimonial_block text-center">
                                    <div class="icon">
                                        <span class="flaticon-quote-button"></span>
                                    </div>
                                    <p>{{$item->highlight}}
                                    </p>
                                    <div class="client_info decorator">
                                        <h5>{{$item->title}}</h5>
                                        <p>{{$item->sub_title}}</p>
                                    </div>
                                </div><!-- End Single Client Testimonial -->
                            @endif
                        @endforeach
                        {{-- <!-- Start Single Client Testimonial -->
                        <div class="client_testimonial_block text-center">
                            <div class="icon">
                                <span class="flaticon-quote-button"></span>
                            </div>
                            <p>“ Nissimos ducimus qui blanditiis praesentium voluptatumatque corrupti quos dolores et quas molestias excepturi sint occaecati “
                            </p>
                            <div class="client_info decorator">
                                <h5>-Jhon Smith</h5>
                                <p>Creative Designer</p>
                            </div>
                        </div><!-- End Single Client Testimonial -->

                        <!-- Start Single Client Testimonial -->
                        <div class="client_testimonial_block text-center">
                            <div class="icon">
                                <span class="flaticon-quote-button"></span>
                            </div>
                            <p>“ Nissimos ducimus qui blanditiis praesentium voluptatumatque corrupti quos dolores et quas molestias excepturi sint occaecati “
                            </p>
                            <div class="client_info decorator">
                                <h5>-Jhon Smith</h5>
                                <p>Creative Designer</p>
                            </div>
                        </div><!-- End Single Client Testimonial --> --}}
                    </div><!-- End Testimonial Items Group -->
                    <!-- Start Testimonial Items Group -->
                    <div class="testimonail_items_group">
                       @foreach ($posts as $item)
                            @if (!$item->link_url)
                                
                                <div class="client_testimonial_block text-center">
                                    <div class="icon">
                                        <span class="flaticon-quote-button"></span>
                                    </div>
                                    <p>{{$item->highlight}}
                                    </p>
                                    <div class="client_info decorator">
                                        <h5>{{$item->title}}</h5>
                                        <p>{{$item->sub_title}}</p>
                                    </div>
                                </div><!-- End Single Client Testimonial -->
                            @endif
                        @endforeach
                    </div><!-- End Testimonial Items Group -->
                </div>
            </div>
        </div><!--/.row-->
    </div>
</div>
<script>
    var item = 1;
    $('.client_testimonail_carousel').owlCarousel({
        center: false,
        items: item,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: false,
        margin: 30,
        nav: false,
        dots: true
    });

    $('.services_carousel').owlCarousel({
        center: false,
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        singleItem: false,
        loop: true,
        margin: 0,
        nav: false,
        dots: true
    }); 

</script>
