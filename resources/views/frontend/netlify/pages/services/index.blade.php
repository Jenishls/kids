
@foreach($components as $component)
    @include($component->location.$component->file_name, ['posts' => $component->posts])
@endforeach
