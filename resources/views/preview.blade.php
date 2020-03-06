@extends('frontend.'.$temp.'.layout.main_layout')
@section('pageContent')
    <section id="page-section" class="page-section">
        @if ($c_page === 'Blog')
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
                    </div>
                </div>
            </div>
        @elseif($c_page === 'Single Team')
            @foreach ($components as $key => $component)
                @if ($key === 0)
                    @include($component->location.$component->file_name, ['posts' => $component->posts])
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
                        @foreach ($components as $key => $section)
                            @if ($key !== 0 && $key !== 1)
                                @include($section->location.$section->file_name, ['posts' => $section->posts])    
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            @foreach ($components as $component)
                @include($component->location.$component->file_name, ['posts' => $component->posts])
            @endforeach
        @endif
    </section>    
@endsection