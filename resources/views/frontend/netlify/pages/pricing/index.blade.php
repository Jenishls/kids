@foreach ($components as $item)
    @include($item->location.$item->file_name, ['posts' => $item->posts])
@endforeach