@foreach ($posts as $post)
<div class="col-md-6">
    <div class="best_choice_area">
        <h3 class="headline">{{$post->title}}</h3>
        <p>{{$post->short_description}}</p>
        <div class="tab-acc-panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            {{-- <div class="panel tab-acc-panel">
                <div class="tab-acc-panel-heading" role="tab" id="headingOne">
                    <h5 class="tab-acc-panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Where does it come from? <span class="acc_toggle_icon"></span>
                    </a>
                    </h5>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="tab-acc-body">
                    <p>Contrary to belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College</p>
                    </div>
                </div>
            </div>
            <div class="panel tab-acc-panel">
                <div class="tab-acc-panel-heading" role="tab" id="headingTwo">
                    <h5 class="tab-acc-panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Where can I get some demo text ? <span class="acc_toggle_icon"></span>
                    </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="tab-acc-body">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor</p>
                    </div>
                </div>
            </div>
            <div class="panel tab-acc-panel">
                <div class="tab-acc-panel-heading" role="tab" id="headingThree">
                    <h5 class="tab-acc-panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        What is Lorem Ipsum? <span class="acc_toggle_icon"></span>
                    </a>
                    </h5>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="tab-acc-body">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College</p>
                    </div>
                </div>
            </div> --}}
            {!!$post->content!!}
        </div>
    </div>
</div>
@endforeach
