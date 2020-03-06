<div class="brand_clients_area mt-100 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section_title text-center">
                    <h2 class="title__heading text-capitalize">Our Brand Clients</h2>
                    <p>We work with wroldwide Company</p>
                </div><!--/.section_title-->
            </div>
        </div><!--/.row-->
        <div class="row">
            {{-- {{dd($posts)}} --}}
            @foreach ($posts as $post)
                
                <!-- Start Single Brand -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="single_brand shadow__black text-center">
                        <div class="single_brand_inner">
                            @if ($post->file)
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thmub">
                            @endif
                        </div>
                    </div>
                </div><!-- End Single Brand -->
            @endforeach
            {{-- <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/2.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/1.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/3.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/1.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/2.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/1.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand -->
            <!-- Start Single Brand -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="single_brand shadow__black text-center">
                    <div class="single_brand_inner">
                        <img src="{{asset('netlify/images/logo/brand/3.png')}}" alt="thmub">
                    </div>
                </div>
            </div><!-- End Single Brand --> --}}
        </div>
    </div>
</div>