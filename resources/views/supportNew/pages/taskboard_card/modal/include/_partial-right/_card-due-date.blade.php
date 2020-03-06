<li class="card-due-date" title="Due Date">
<button type="button" data-id="{{$card->id}}"  class="btn action-button card_due_date"><i class="la la-calendar"></i> 
    <span class="due_date">@if(isset($card->due_date)) {{bladeDate($card->due_date)}}@else Due Date @endif</span>
</button>
</li>