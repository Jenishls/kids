{{-- @include('frontend.netlify.components.contact.contact_banner')
@include('frontend.netlify.components.contact.contact_info')
@include('frontend.netlify.components.contact.contact_form')
@include('frontend.netlify.components.contact.newsletter') --}}
@foreach ($components as $component)
    @include($component->location.$component->file_name, ['posts' => $component->posts])
@endforeach

