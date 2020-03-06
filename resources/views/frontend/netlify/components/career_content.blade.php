<!-- Start Career Area -->
<div class="career-area mtb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section_title text-center">
                        <h2 class="title__heading text-capitalize">- Join us!</h2>
                        <p>We provide quility services</p>
                    </div><!--/.section_title-->
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="career_thumbs">
                        @foreach ($posts as $post)
                            @if ($post->file)
                                
                            <div class="thumb image_effect"> 
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thumb">
                            </div>
                            @endif
                        @endforeach
                        {{-- <div class="thumb image_effect"> 
                            <img src="{{asset('netlify/images/career/2.jpg')}}" alt="thumb">
                        </div> --}}
                    </div><!--/.career_thumbs-->
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="career_info">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard.</p>
                        <div class="career_block_list">
                            @foreach ($posts as $post)
                            @if (!$post->file)
                                
                            <!-- Start Single Career -->
                            <div class="single_career">
                                <div class="info">
                                    <h3>- {{$post->title}}</h3>
                                    <p>{{$post->sub_title}}</p>
                                </div>
                                <a class="load_pages" data-route="/netlifytemp/singlecareer"><span class="flaticon-right-arrow"></span></a>
                            </div><!-- End Single Career -->
                            @endif
                            @endforeach
                            {{-- <!-- Start Single Career -->
                            <div class="single_career">
                                <div class="info">
                                    <h3>- Web Developer</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                                <a class="load_pages" data-route="/netlifytemp/singlecareer"><span class="flaticon-right-arrow"></span></a>
                            </div><!-- End Single Career -->
                            <!-- Start Single Career -->
                            <div class="single_career">
                                <div class="info">
                                    <h3>- Software Engineer</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                                <a class="load_pages" data-route="/netlifytemp/singlecareer"><span class="flaticon-right-arrow"></span></a>
                            </div><!-- End Single Career -->
                            <!-- Start Single Career -->
                            <div class="single_career">
                                <div class="info">
                                    <h3>- Game Developer</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                                <a class="load_pages" data-route="/netlifytemp/singlecareer"><span class="flaticon-right-arrow"></span></a>
                            </div><!-- End Single Career --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Career Area -->