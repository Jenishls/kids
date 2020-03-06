 <li class="card-label" title="Label">
    <button type="button" @if($cardList->isRestrictedStatus()) disabled @endif class="btn custom-options-actions"><i class="la la-tag"></i> Label</button>
    <div class="color-label-dropdown custom-dropdown">
        <label class="color-label-title w-100">labels <i class="la la-close pull-right text-danger close-now"></i></label>
        <input type="text" name="" class="form-control m-input form-control-sm input-search-label" data-card-id="{{$cardList->id}}" placeholder="Search labels...">
        <hr>
                <ul style="list-style: none; padding: 0" class="all-card-label-list" data-id="{{$cardList->id}}">
                    @if(count($labels)>0)
                        @foreach($labels as $label)
                            <li class="mb-5">
                                <div class="d-flex">
                                    <div class="label-left assign-card-label" data-label-id="{{$label->id}}" data-id="{{$cardList->id}}" style="background-color: {{$label->color_value}}">
                                        <span class="text-white">{{strtolower($label->label_name)}}</span>
                                        @if($cardList->labels->contains($label))
{{--                                            <i class="la la-check pull-right selected-label-selected"></i>--}}
                                            <i class="la la-check text-white pull-right m-t-2 selected-label-selected"></i>
                                        @endif
                                    </div>
                                    <div class="label-right" data-sub-modal-route="card/label/update/{{$label->id}}">
                                        <i class="la la-edit text-warning"></i>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>
                            No Label Available
                        </li>
                    @endif
                </ul>
        <button type="button" class="btn custom-options-actions" data-sub-modal-route="card/label/new"><i class="la la-archive"></i> Create new label</button>
    </div>
    </li>
