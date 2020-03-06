 <!-- Start slider area -->
 <div class="slider">
    <div class="slider_inner owl-carousel">
        <!-- Start slider item -->
        {{-- {{dd($posts)}} --}}
        @foreach ($posts as $key => $post)
            @if ($key === 0)
            {{-- {{dd($post->file)}} --}}
                <div class="slider_item slider_item_one">
                    @if($post->file)
                    {{-- {{dd($post->file->file_name)}} --}}
                    <div class="slider_bg_thumb bg-image"  style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" ></div> 
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider_content_outer">
                                    <div class="slider_content text-white text-center">          
                                        <span class="flaticon-game"></span>
                                        <h1 class="slider_title">{{$post->title}}</h1>
                                        <p class="slider_subtitle">{{$post->sub_title}}</p>
                                        <a class="btn btn-default" href="{{$post->link_url}}">read more <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End slider item --> 
            @else
                <div class="slider_item slider_style_two bg_overlay">
                    <div class="slider_bg_thumb bg-image" @if($post->file) style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" @endif></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-sm-10 col-xs-12">
                                <div class="slider_content text-white">
                                    <h1 class="slider_title">{{$post->title}}</h1>
                                    <p class="slider_subtitle">{{$post->sub_title}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End slider item -->
            @endif
        @endforeach
        
        <!-- Start slider item -->
       
        
        <!-- Start slider item -->
        {{-- <div class="slider_item slider_style_two bg_overlay">
            <div class="slider_bg_thumb bg-image" style="background-image: url({{asset('netlify/images/slider/3.jpg')}});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-10 col-xs-12">
                        <div class="slider_content text-white">
                            <h1 class="slider_title">We Make Good <br>UX Designs</h1>
                            <p class="slider_subtitle">West is a digital studio founded in London. We've grown and expanded our services,offering of services and solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End slider item --> --}}
    </div>
</div>
<!-- End slider area -->