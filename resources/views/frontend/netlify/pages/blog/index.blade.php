{{-- @include('frontend.netlify.components.blog_banner') --}}
<!-- Start Blog section -->
{{-- {{dd($components[0]->file_name)}} --}}
@foreach ($components as $key => $comp)
    @if ($key === 0)
        @include($comp->location.$comp->file_name, ['posts' => $comp->posts])
    @endif
@endforeach
<div class="blog-section">
    <div class="container">
        <div class="row">
            @foreach ($components as $key =>$item)
                @if ($key!== 0)
                    @include($item->location.$item->file_name, ['posts' => $item->posts])
                @endif
            @endforeach
        {{-- @include('frontend.netlify.components.blog.blog_left_content') --}}
        {{-- @include('frontend.netlify.components.blog.blog_right_content') --}}
        </div>
    </div>
</div>
<!-- End Blog section -->