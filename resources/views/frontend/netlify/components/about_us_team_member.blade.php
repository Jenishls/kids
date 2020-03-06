<div class="smart_team_area mtb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section_title text-center">
                    <h2 class="title__heading text-capitalize">Corporate Team</h2>
                    <p>we are most exprianceable team</p>
                </div><!--/.section_title-->
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div id="team_carousel" class="owl-carousel">
                    <!-- Start Single Team -->
                    @foreach ($posts as $post)
                        
                        <div class="single_team text-center">
                            <figure class="team_thumb image_effect">
                                @if ($post->file)
                                    <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thmub">
                                @endif
                            </figure>
                            <div class="team_info">
                                <h3>{{$post->title}}</h3>
                                <p>{{ucwords($post->sub_title)}}</p>
                                <ul class="team_social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End Single Team -->
                    @endforeach
                    {{-- <!-- Start Single Team -->
                    <div class="single_team text-center">
                        <figure class="team_thumb image_effect">
                            <img src="{{asset('netlify/images/team/2.jpg')}}" alt="thmub">
                        </figure>
                        <div class="team_info">
                            <h3>Jhon Deo</h3>
                            <p>SEO Speacilist</p>
                            <ul class="team_social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End Single Team -->
                    <!-- Start Single Team -->
                    <div class="single_team text-center">
                        <figure class="team_thumb image_effect">
                            <img src="{{asset('netlify/images/team/3.jpg')}}" alt="thmub">
                        </figure>
                        <div class="team_info">
                            <h3>Jhon Smith</h3>
                            <p>Seniour Web Developer</p>
                            <ul class="team_social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End Single Team -->
                    <!-- Start Single Team -->
                    <div class="single_team text-center">
                        <figure class="team_thumb image_effect">
                            <img src="{{asset('netlify/images/team/4.jpg')}}" alt="thmub">
                        </figure>
                        <div class="team_info">
                            <h3>Jhon Deo</h3>
                            <p>SEO Analyst/Strategist</p>
                            <ul class="team_social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End Single Team --> --}}
                </div>
            </div><!--/.col-md-12-->
        </div>
    </div>
</div>