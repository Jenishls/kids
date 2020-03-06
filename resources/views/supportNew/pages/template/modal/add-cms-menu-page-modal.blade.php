{{-- add category modal --}}
<div class="modal-dialog" role="document" style="margin-left: 31%;" id="add_page_modal">
    <div class="modal-content modal-830" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        {{-- {{dd($components)}} --}}
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addMenuPageForm">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="form-group label-floating col-6">
                                <label class="control-label" for="sequence_no" style="font-weight:450;font-size:14px;">Page</label>

                                <select class="form-control select_page" name="page_id" style="text-transform:capitalize;" data-inputName="PageName" title="Select page" required>
                                    @foreach ($pages as $page)
                                        <option value="{{$page->page_id}}" class="card_type_append_value" style="text-transform:capitalize;">{{$page->page_name}}</option>
                                    @endforeach
                                    
                                        
                                </select>
                            </div>
                            <div class="form-group label-floating my-3 col-6 sequence_div" value="textarea">
                                <label class="control-label" for="sequence_no" style="font-weight:450;font-size:14px;">Sequence Number</label>
                                <input class="form-control" type="text" name="seq_no" id="seq_no" placeholder="Sequence Number">
                                <div class="errorMessage"></div>
    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sy_icon " data-id="{{$menu_id}}" id="storePage">Create</button>
        </div>
    </div>
</div>

<script>
    function selectpicker(){
        $('.select_page').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
        });
    };
    selectpicker();

    $(document).off('click', '#storePage').on('click', '#storePage', function(){
         let form = $('#addMenuPageForm').serializeArray();
         let menu_id = $(this).attr('data-id');

         supportAjax({
             url:'/admin/cms/add/menupage/'+menu_id,
             method: 'POST',
             data: form
         },function(resp){
            $('#cModal').modal('hide');
            $('#cmsElContainer').empty().append(resp);
            toastr.success('Page added successfully.');
         })
    })
</script>