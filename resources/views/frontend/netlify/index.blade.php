{{-- <script>
    var meta = {!!json_encode($meta, JSON_HEX_TAG)!!};
    console.log(meta.site_title);
    var el = document.getElementsByTagName('title');
    console.log(el);
</script> --}}
@extends('frontend.netlify.layout.main_layout')
@section('pageContent')
    <!-- Start page section area -->
    <section id="page-section" class="page-section">
        {{-- {{dd($components[0]->file_name)}} --}}
        @foreach ($components as $component)
        {{-- {{dd($component->location.$component->file_name)}} --}}
            @include($component->location.$component->file_name, ['posts' => $component->posts])
        @endforeach
        {{-- @include('frontend.netlify.components.slider') --}}
        {{-- @include('frontend.netlify.components.home_content')    --}}
    </section>    
    <!-- End page section area -->
@endsection