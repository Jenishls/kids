{{-- {{dd($membership)}} --}}
<div class="modal-dialog editUserModalDialog" role="document">
    <div class="modal-content addUserModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Membership</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit_membership_form">
            @csrf
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row ">
                    <div class="col">
                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="user_add_1">Id Card Type</label>
                                <div class=" select_mem_type">
                                        <select class="form-control select_card_value_id" name="id_card_type" style="text-transform:capitalize;" data-inputName="CardType" title="Select card" required>
                                            
                                            @foreach($card_types as $card)
                                                <option value="{{$card->code}}" class="card_type_append_value" style="text-transform:capitalize;">{{ucfirst($card->value)}}</option>
                                            @endforeach
                                        </select>
                                        <div class="errorMessage"></div>
                                    </div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="membership_no">Id Card Number</label>
                                
                                <input class="form-control" value="{{ucfirst($membership->id_card_no)}}" type="text" id="" name="id_card_no">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="place_issued">Issued Place</label>
                                <input class="form-control" value="{{ucfirst($membership->issued_place)}}" type="text" id="editIssueddatepicker" name="issued_place">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="issued_date">Issued Date</label>
                                <input class="form-control" value="{{$membership->issued_date}}"  id="editIssueddatepicker" name="issued_date" placeholder="">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="exp_date">Expiry Date</label>
                                <input class="form-control" value="{{$membership->exp_date}}"  id="editexpddatepicker" name="exp_date">
                                <div class="errorMessage"></div>
                            </div>
                            <div class="form-group label-floating col-md-4">
                                <label class="control-label" for="issue_authrity">Issue Autority</label>
                                
                                <input class="form-control" value="{{ucfirst($membership->issue_authority)}}" type="text" id="" name="issue_authority">
                                <div class="errorMessage"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon" id="membership_update" data-route="/admin/update/membershipDetail" data-id="{{$membership->id}}">Update</button>
            </div>
        </form>
        
    </div>
</div>
<script>
var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#editIssueddatepicker, #editexpddatepicker').datepicker({
        format:'yyyy-mm-dd',
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    }).on('hide', function(event) {
        event.preventDefault();
        event.stopPropagation();
    });
    $(document).ready(function(){
        $('#editIssueddatepicker, #editexpddatepicker').datepicker().init();
});

// select 2
function selectpicker(){
        $('.select_card_value_id').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
        });
    };
    selectpicker();
</script>