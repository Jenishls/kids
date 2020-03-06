{{-- ##image --}}
        {{-- {{dd($components[0]->posts)}}

<div class="page_heading_area ptb-110 bg-image bg_overlay bg-img-fixed" style="background-image: url({{asset('netlify/images/header/1.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="page_title">
                    <h1>About us</h1>
                    <p>Why We Are Best Choice?</p>
                    <div class="divider">
                        <span></span>
                        <span></span>
                    </div>
                </div><!--/.page_title-->
            </div>
        </div>
    </div>
</div> --}}
{{-- @foreach ($components as $p_key => $component) --}}
    @foreach ($posts as $key =>$post)
        {{-- {{dd($posts)}} --}}
        {{-- @if ($p_key === 0 && $key === 0) --}}
            <div class="page_heading_area ptb-110 bg-image bg_overlay bg-img-fixed" @if($post->file) style="background-image: url(data:image;base64,{{base64_encode(file_get_contents(storage_path("CMS/post/".$post->file->file_name)))}}" @endif>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="page_title">
                                <h1>{{ucwords($post->title)}}</h1>
                                <p>{{ucwords($post->sub_title)}}</p>
                                <div class="divider">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div><!--/.page_title-->
                        </div>
                    </div>
                </div>
            </div>
        {{-- @endif --}}
    @endforeach
{{-- @endforeach --}}
