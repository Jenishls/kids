<div class="modal-dialog changeSectionModalDialog" id="changeSectionModal" role="document" style="display:none;">
    <div class="modal-content changeSectionModalContent">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Section</h5>
            <div>
            <button type="button" class="close section_close_modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="save_note_section_form">
                @csrf
                <div class="row form-group">
                    <label class="control-label" for="section" style="font-size: 1.22rem;">Section</label>
                    <div class="col-lg-12 label-floating note_section_select_div">
                        <select title="Select" class="note_section_select"  id="section_change" name="section">
                            @foreach ($sections as $page)
                        <option value="{{$page->page_name}}">{{$page->page_name}}</option>
                            @endforeach
                        </select>
                        
                        <div class="errorMessage"></div>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            {{-- {{dd($validationSection->id)}} --}}
            <button type="button" class="btn btn-secondary x section_close_modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="save_section" data-id="">Save</button>
        </div>
    </div>
</div>
<script>
    // selectpicker
    $('.note_section_select').selectpicker({
    liveSearch: true,
    showTick: true,
    doneButton: true

    });
</script>