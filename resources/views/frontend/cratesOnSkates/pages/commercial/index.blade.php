<!-- @foreach($components as $component)
    @include($component->location.$component->file_name, ['posts' => $component->posts])
@endforeach -->

<div class="hr"></div>
<div class="faq-section radial-th-gradient">
    <div class="container">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-md-10 offset-md-1">

                <!-- <div class="title3">
                    <h2 class="title-inner3 cs-section-title-b">heading</h2>
                </div> -->
            </div>
            <div class="col-md-10 offset-md-1">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($components as $key => $component)
                            @if ($key === 0)
                            @include($component->location.$component->file_name, ['posts' =>$component->posts])

                            @endif
                            @endforeach
                        </div>
                        <div class="col-md-8 offset-md-2 col-sm-12 cmrcl-form">
                            @foreach ($components as $key => $value)
                            @if ($key === 1)
                            @include($value->location.$value->file_name, ['posts' => $value->posts])

                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>