<div class="col-md-3">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card-update__card-right"> 
                <h5 class="card-update__card-right__title">add to card</h5>
                <ul class="action-list">
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-member-assign")
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-due-date")
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-attachment")
                   {{-- @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-note") --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card-update__card-right">
                <h5 class="card-update__card-right__title">add to card</h5>
                <ul class="action-list">
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-move")
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-copy")
                   @include("supportNew.pages.taskboard_card.modal.include._partial-right._card-archive")
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.card_due_date').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "minYear": 2019,
        "maxYear": 2025,
        "timePicker": true,
        "linkedCalendars": false,
        "autoUpdateInput": true,
        "startDate": "01/07/2020",
        "endDate": "01/13/2020"
    }).on("apply.daterangepicker",function(ev, picker) {
        supportAjax({
            url:'/taskboardcard/update',
            data:{id:$(this).attr('data-id'),due_date: picker.startDate.format('YYYY-MM-DD')},
            method:"POST",
            loader:true,
        },(response) =>{
            $(document).find(".due_date").text(response.due_date);
            routeExecute(location.hash);
        },({responseJSON})=>{
            toastr.error(responseJSON.errors);
        });
    }); 
</script> 