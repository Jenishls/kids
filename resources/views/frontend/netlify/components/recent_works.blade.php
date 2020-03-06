<div id="work" class="working_area bg-white mt-100 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section_title text-center">
                    <h2 class="title__heading text-capitalize">Recent Works</h2>
                    <p>See Our Latest Projects</p>
                </div><!--/.section_title-->
            </div>
        </div><!--/.row-->
        <div class="row">
            @foreach ($posts as $post)
                <!-- Start Single Work -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="work_item">
                        <div class="work_thumb">
                            @if ($post->file)
                            <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="project1" class="img-responsive">
                            @endif
                        </div>
                        <div class="work_hover_mask">
                            <div class="mask-container text-center">
                                <h4>{{$post->title}}</h4>
                                <div class="divider-border"></div>
                                <p>{{$post->sub_title}}</p>
                                <a class="btn btn-default" href="">Project details</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Single Work -->
            @endforeach
            {{-- <!-- Start Single Work -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="work_item">
                    <div class="work_thumb">
                        <img src="{{asset('netlify/images/portfolio/2.jpg')}}" alt="project2" class="img-responsive">
                    </div>
                    <div class="work_hover_mask">
                        <div class="mask-container text-center">
                            <h4>Web Design</h4>
                            <div class="divider-border"></div>
                            <p>Lorem ipsum dolor sit amet, consetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit</p>
                            <a class="btn btn-default" href="single-portfolio.html">Project details</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Work -->
            <!-- Start Single Work -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="work_item">
                    <div class="work_thumb">
                        <img src="{{asset('netlify/images/portfolio/3.jpg')}}" alt="project3" class="img-responsive">
                    </div>
                    <div class="work_hover_mask">
                        <div class="mask-container text-center">
                            <h4>Web Design</h4>
                            <div class="divider-border"></div>
                            <p>Lorem ipsum dolor sit amet, consetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit</p>
                            <a class="btn btn-default" href="single-portfolio.html">Project details</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Work -->
            <!-- Start Single Work -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="work_item">
                    <div class="work_thumb">
                        <img src="{{asset('netlify/images/portfolio/4.jpg')}}" alt="project4" class="img-responsive">
                    </div>
                    <div class="work_hover_mask">
                        <div class="mask-container text-center">
                            <h4>Web Design</h4>
                            <div class="divider-border"></div>
                            <p>Lorem ipsum dolor sit amet, consetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit</p>
                            <a class="btn btn-default" href="single-portfolio.html">Project details</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Work -->
            <!-- Start Single Work -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="work_item">
                    <div class="work_thumb">
                        <img src="{{asset('netlify/images/portfolio/5.jpg')}}" alt="project5" class="img-responsive">
                    </div>
                    <div class="work_hover_mask">
                        <div class="mask-container text-center">
                            <h4>Web Design</h4>
                            <div class="divider-border"></div>
                            <p>Lorem ipsum dolor sit amet, consetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit</p>
                            <a class="btn btn-default" href="single-portfolio.html">Project details</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Work -->
            <!-- Start Single Work -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="work_item">
                    <div class="work_thumb">
                        <img src="{{asset('netlify/images/portfolio/6.jpg')}}" alt="project6" class="img-responsive">
                    </div>
                    <div class="work_hover_mask">
                        <div class="mask-container text-center">
                            <h4>Web Design</h4>
                            <div class="divider-border"></div>
                            <p>Lorem ipsum dolor sit amet, consetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit</p>
                            <a class="btn btn-default" href="single-portfolio.html">Project details</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Work --> --}}
        </div>
    </div>
</div>