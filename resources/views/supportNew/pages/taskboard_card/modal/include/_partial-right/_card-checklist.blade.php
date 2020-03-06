 <li class="card-checklist" title="Checklist">
    <button type="button" @if($cardList->isRestrictedStatus()) disabled @endif class="btn custom-options-actions"><i class="la la-list-alt"></i> Checklist</button>
    <div class="card-new-check-list custom-dropdown">
        <label class="color-label-title w-100">Create Checklist <i class="la la-close pull-right text-danger close-now"></i></label>
        <hr>
        <form id="cardCheckListForm">
            <input type="text" id="checklist-title" class="form-control m-input form-control-sm" placeholder="Checklist title...">
            <button class="btn btn-success m-btn btn-sm m-btn--custom m-btn--icon mt-10 mr-5" id="btnCreateCardChecklist" data-id="{{$cardList->id}}" data-backdrop="static" data-keyboard="false">
                <span>
                    <i class="la la-check"></i>
                    <span>Create</span>
                </span>
            </button>
        </form>
    </div>
</li>