<!-- Start page section area -->
<section id="page" class="page-section">
    <!-- Start Error Page Area -->
    @foreach ($posts as $post)
    <div class="error_page_area mtb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-full-width">
                    <div class="error_content text-center">
                        <h2>{{$post->title}}</h2>
                        <h3>{{ucfirst($post->sub_title)}}</h3>
                        <p>{{ucfirst($post->highlight)}}</p>
                        <a class="btn btn-default" onclick="location.reload();">Back to Home Page</a>
                    </div><!--/.error_content-->
                </div>
            </div>
        </div>
    </div><!-- End Error Page Area -->
    @endforeach
</section>
<!-- End page section area -->