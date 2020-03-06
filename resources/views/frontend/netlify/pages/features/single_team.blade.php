{{-- @include('frontend.netlify.components.single_team_banner')
<div class="team_details_area mtb-100">
    <div class="container">
        @include('frontend.netlify.components.single_team_info')
        <div class="row">
            @include('frontend.netlify.components.specialization')
            @include('frontend.netlify.components.specialization_right_content')
        </div>
    </div>
</div> --}}

@foreach ($components as $key => $component)
    @if ($key === 0)
        @include($component->location.$component->file_name, ['posts' =>$component->posts])
        
    @endif
@endforeach
<div class="team_details_area mtb-100">
    <div class="container">
        @foreach ($components as $key => $value)
            @if ($key === 1)
                @include($value->location.$value->file_name, ['posts' => $value->posts])

            @endif
        @endforeach
        <div class="row">
            @foreach ($components as $key => $item)
                @if ($key !== 0 && $key !== 1)
                    @include($item->location.$item->file_name, ['posts' => $item->posts])    
                @endif
            @endforeach
        </div>
    </div>
</div>