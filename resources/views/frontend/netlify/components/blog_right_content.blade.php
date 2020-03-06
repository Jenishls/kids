<div class="col-md-4 col-sm-12">
    <aside class="sidebar">
        <!-- search widget -->
        @include('frontend.netlify.components.blog_search')

        <!-- Most Viewed Post -->
        @include('frontend.netlify.components.blog_view_post')

        <!-- Recent post -->
        @include('frontend.netlify.components.blog_view_post')
        
        <!-- Categories -->
        @include('frontend.netlify.components.blog_view_post')

        <!-- Sign Up Our Newsletter -->
        @include('frontend.netlify.components.newsletter_register_form')
        

        <!-- instagram -->
        @include('frontend.netlify.components.blog_instagram_feed')
        

        <!-- video -->
        @include('frontend.netlify.components.blog_video_widget')
    </aside>
</div>