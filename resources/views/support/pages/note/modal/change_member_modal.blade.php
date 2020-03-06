<div class="modal-dialog changeMemberModalDialog" id="changeMemberModal" role="document" style="">
    <div class="modal-content changeMemberModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Member</h5>
            <div>
            <button type="button" class="close member_close_modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="save_member_note_form">
                @csrf
                <div class="row form-group">
                    <label class="control-label" for="section" style="font-size: 1.22rem;">Memeber</label>
                    <div class="col-lg-12 label-floating note_member_select_div">
                        <select title="Select" class="member_select"  id="member_change" name="member">
                            @foreach($users as $user)
                            @if($user->member)
                                <option value="$user->id">{{ucfirst($user->member->first_name)}} {{$user->member->middle_name?ucfirst($user->member->middle_name):''}} {{ucfirst($user->member->last_name)}}</option>
                            @else
                            <option value="$user->id">{{ucfirst($user->name)}}</option>
                            @endif
                            @endforeach
                        </select>
                        
                        <div class="errorMessage"></div>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            {{-- {{dd($validationSection->id)}} --}}
            <button type="button" class="btn btn-secondary x member_close_modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_member" data-id="">Save</button>
        </div>
    </div>
</div>
<script>
    // selectpicker
    $('.member_select').selectpicker({
    liveSearch: true,
    showTick: true,
    doneButton: true

    });
</script>