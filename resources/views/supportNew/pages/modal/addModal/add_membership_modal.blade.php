<div class="modal-dialog" role="document" style="margin-left: 21%;" id="membership_modal_body">
    <div class="modal-content modal-1200">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add ID Card Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="add_membership_form">
            {{-- modal body --}}
            <div class="modal-body row membership_modal_body">
                <div id="appendContainer">
                    <div class="row singleRow" data-id="1">
                        <div class="col-11">
                            @csrf
                            <div class="row">
                                <div class="form-group label-floating col-md-2">
                                    <div class="row">
                                        <label class="control-label" for="user_add_1">Id Type</label>
                                        
                                        <div class="col-md-10 pl-0 select_mem_type">
                                            <select class="form-control select_card_value_id" name="id_card_type[]" style="text-transform:capitalize;" data-inputName="CardType" title="Select card" required>
                                                @if($card_types !== null)
                                                @foreach($card_types as $card)
                                                    <option value="{{$card->value}}" class="card_type_append_value" style="text-transform:capitalize;">{{ucfirst($card->value)}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <div class="errorMessage"></div>
                                        </div>
                                        <div class="col-md-2 id_card_look_up addModal" data-route="/admin/addModal/id_card_look_up/{{$user->id}}" data-id="{{$user->id}}">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                
                                </div>

                                
                                <div class="form-group label-floating col-md-2">
                                    <label class="control-label" for="membership_no">Id Number</label>
                                    
                                    <input class="form-control" value="" type="text" id="" name="id_card_no[]"  required="require" data-inputName="IdCardNo">
                                    <div class="errorMessage"></div>

                                </div>
                                <div class="form-group label-floating col-md-2">
                                    <label class="control-label" for="place_issued" >Issued Place</label>
                                    
                                    <input class="form-control" value="" type="text" id="" name="issued_place[]"  required="require" data-inputName="IssuedPlace"> 
                                    <div class="errorMessage"></div>
                                </div>
                        
                                <div class="form-group label-floating col-md-2">
                                    <label class="control-label" for="issued_date">Issued Date</label>
                                    
                                    <input class="form-control issuedDatepicker" id ="" value=""  id="" name="issued_date[]" placeholder=""  required="require" data-inputName="IssuedDate">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="form-group label-floating col-md-2">
                                    <label class="control-label"  for="exp_date">Expiry Date</label>
                                    
                                    <input class="form-control expireDatepicker" value=""  id="" name="exp_date[]"  required="require" data-inputName="expiryDate">
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="form-group label-floating col-md-2">
                                    <label class="control-label" for="issue_authrity">Issue Authority</label>
                                    
                                    <input class="form-control" value="" type="text" id="" name="issue_authority[]"  required="require" data-inputName="IssueAuthority">
                                    <div class="errorMessage"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-1 add_membership_modal_data" style="">
                            <div class="kt-demo-icon__preview" id="btnAddRow">
                                <i class="fa fa-plus-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </form>
        {{-- footer --}}
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon" data-route="/admin/addMembership" data-id="{{$user->id}}" id="add_new_membership" >Save</button>
            </div>
    </div>
</div>
<script>
    var membership_add_row = 2;
    $(document).off('click','#btnAddRow').on('click','#btnAddRow', function() {
        const  newRow = 
        `<div class="row singleRow"  data-id="${membership_add_row}">
            <div class="col-11">
                @csrf
                <div class="row">
                    
                    <div class="form-group label-floating col-md-2">
                    
                        <div class="row">
                            
                            <div class="col-md-10 pl-0 select_mem_type">
                                <select class="form-control select_card_value_id" name="id_card_type[]" style="text-transform:capitalize;" data-inputName="CardType" title="Select card">
                                    
                                    @foreach($card_types as $card)
                                        <option value="{{$card->value}}" class="card_type_append_value" style="text-transform:capitalize;">{{ucfirst($card->value)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 id_card_look_up addModal" data-route="/admin/addModal/id_card_look_up/{{$user->id}}" data-id="{{$user->id}}">
                                <i class="fa fa-plus-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group label-floating col-md-2">
                        
                        
                        <input class="form-control" value="" type="text" id="" name="id_card_no[]">
                    </div>
                    <div class="form-group label-floating col-md-2">
                        
                        
                        <input class="form-control" value="" type="text" id="" name="issued_place[]">
                    </div>
            
                    <div class="form-group label-floating col-md-2">
                        
                        
                        <input class="form-control appendissuedDatepicker" value=""  id="" name="issued_date[]" placeholder="">
                    </div>
                    <div class="form-group label-floating col-md-2">
                        
                        
                        <input class="form-control appendissuedDatepicker" value=""  id="" name="exp_date[]">
                    </div>
                    <div class="form-group label-floating col-md-2">
                        
                        
                        <input class="form-control" value="" type="text" id="" name="issue_authority[]">
                    </div>
                </div>
                
            </div>
            <div class="col-1 remove_membership_modal_data">
                <div class="kt-demo-icon__preview" id="btnRemoveRow">
                    <i class="fa fa-minus-circle"></i>
                </div>
            </div>
        </div>
        
        `;
        $('#appendContainer').append(newRow);
        membershipDatepicker();
        selectpicker();
        membership_add_row+=1;
    });
    // datepicker

    function membershipDatepicker() {
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
        $('.issuedDatepicker, .expireDatepicker, .appendissuedDatepicker,.appendexpireDatepicker').datepicker({
            format:'yyyy-mm-dd',
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        }).on('hide', function(event) {
            event.preventDefault();
            event.stopPropagation();
        });
    }
    membershipDatepicker();

    $(document).on('click','#btnRemoveRow', function() {
        $(this).parent().parent().empty().remove();
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
@include('supportNew.pages.modal.addModal.add_new_card_type')
