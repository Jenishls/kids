<!-- Controllers.DashboardController -->
{{-- {{dd(auth()->user()->profilePicture())}} --}}
@include('supportNew.pages.dashboard.inc.doctype')
@include('supportNew.pages.dashboard.inc.body')
@include('supportNew.pages.dashboard.inc.hmobile')
@include('supportNew.pages.dashboard.inc.htopbar')
<div id="userPreview">
    @include('supportNew.pages.dashboard.inc.userPreview')
</div>
@include('supportNew.pages.dashboard.inc.menu') 
@include('supportNew.pages.dashboard.inc.content')
@include('supportNew.pages.dashboard.inc.footer')