<li class="card-status" title="Status">
    <button type="button" @if($cardList->isRestrictedStatus() || $cardList->isProcess()) disabled @endif class="btn custom-options-actions"><i class="la la-arrow-right"></i> Status</button>
    <div class="color-label-dropdown custom-dropdown">
        <label class="color-label-title w-100">Status <i class="la la-close pull-right text-danger close-now"></i></label>
        <input type="text" name="" class="form-control m-input form-control-sm input-search-status" data-card-id="{{$cardList->id}}" placeholder="Search labels...">
        <hr>
        <ul style="list-style: none; padding: 0" class="all-card-status" data-id="{{$cardList->id}}">
            @if(count($status)>0)
            @foreach($status as $stat)
            <li class="mb-5">
                <div class="d-flex">
                    <div class="status-name assign-card-status" data-status-id="{{$stat->id}}" data-id="{{$cardList->id}}">
                        <span>{{$stat->value}}</span>
                        @if($stat->id === $cardList->status)<i class="la la-check text-white pull-right m-t-2"></i>@endif
                    </div>
                </div>
            </li>
            @endforeach
            @else 
            <li>no status available</li>
            @endif
        </ul>
    </div>
</li>