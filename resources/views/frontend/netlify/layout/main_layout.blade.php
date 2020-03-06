@include('frontend.netlify.components.header')
    @include('frontend.netlify.components.nav_bar')
    @include('frontend.netlify.components.sticky_nav_bar') 
    {{-- <div id="page"> --}}
        @yield('pageContent')
    {{-- </div> --}}
    @include('frontend.netlify.components.footer')
@include('frontend.netlify.components.main_footer')