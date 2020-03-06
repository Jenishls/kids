<!-- Start Biography Area -->
{{-- ##image## --}}
{{-- {{dd($posts)}} --}}
<div class="biography-area mtb-100">
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-7">
                    <div class="biography_content">
                        <h2 class="biography_title">{{ucwords($post->title)}}</h2>
                        <p>{{$post->short_description}}</p>
                        <ul class="list_style_circle">
                            {!!$post->content!!}
                        </ul>
                        <p>{!!$post->description!!}</p>
                    </div><!--/.biography_content-->
                </div><!--/.col-md-6-->
                <div class="col-md-5">
                    <div class="about_thumb_area">
                        <figure class="biography_midea biography_thumb image_effect">
                            @if ($post->file)
                                <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thumb">
                            @endif
                        </figure><!--/.biography_midea-->
                    </div>
                </div><!--/.col-md-6-->
            </div>
        @endforeach
    </div>
</div>
<!-- End Biography Area -->