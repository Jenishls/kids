<div class="row">
    {{-- {{dd($posts)}} --}}
    @foreach ($posts as $post)
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="about_content">
                <h3>{{$post->highlight}}</h3>
                <ul class="list_style_square">
                    <li>{{$post->short_description}}</li>
                </ul>
                {!!$post->description!!}
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="about_thumb_area">
                <figure class="about_thumb image_effect">
                    @if ($post->file)
                        <img src="data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" alt="thumb">
                    @endif
                    @if ($post->link_url !== NULL)
                        <div class="video__inner">
                            <a href="{{$post->link_url}}" class="video__trigger"><i class="fa fa-play"></i></a>
                        </div>
                    @endif
                </figure><!--/.about_thumb-->
                <a class="btn btn-about"><span>Explore</span>More About us<i class="flaticon-right-arrow"></i></a>
            </div><!--/.about_thumb_area-->
        </div>
    @endforeach
</div>