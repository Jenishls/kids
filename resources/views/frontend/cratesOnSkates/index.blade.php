@extends('frontend.cratesOnSkates.layout.main_layout')
@section('pageContent')
    <!-- Start page section area -->
    <div id="page-section" class="page-section">
        @foreach ($components  as $component)
            @include($component->location.$component->file_name, ['posts' =>$component->posts])   
        @endforeach
    </div>    
    <!-- End page section area -->
@endsection
