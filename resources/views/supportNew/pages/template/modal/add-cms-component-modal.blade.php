{{-- add category modal --}}
<div class="modal-dialog" role="document" style="margin-left: 31%;" id="add_component_modal">
    <div class="modal-content modal-830" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Component</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        {{-- {{dd($components)}} --}}
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <form id="addComponentForm">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="form-group label-floating col-5">
                                <label class="control-label" for="sequence_no" style="font-weight:450;font-size:14px;">Component</label>

                                <select class="form-control select_component_name" name="name" style="text-transform:capitalize;" data-inputName="ComponentName" title="Select component" required>
                                    @foreach ($components as $key =>$component)
                                    <option value="{{$component}}" class="card_type_append_value" style="text-transform:capitalize;">{{$component}}</option>
                                    @endforeach
                                        {{-- <option value="banner" class="card_type_append_value" style="text-transform:capitalize;">Banner</option>
                                        <option value="banner" class="card_type_append_value" style="text-transform:capitalize;">Services</option>
                                        <option value="banner" class="card_type_append_value" style="text-transform:capitalize;">Biography</option> --}}
                                </select>
                            </div>
                            <div class="col-1 add_component_icon">
                                <a title="Add Component " class="addNewComponent" data-route="/admin/addmodal/newcomponent">
                                        <i class="fa fa-plus-circle"></i>
                                </a>
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
        <button type="button" class="btn btn-primary sy_icon " data-id="{{$cms_page->id}}" id="storeComponent">Create</button>
        </div>
    </div>
</div>

@include('supportNew.pages.template.modal.add-new-component-modal')

<script>
    function selectpicker(){
        $('.select_component_name').selectpicker({
            liveSearch: true,
            showTick: true,
            actionsBox: true,
            doneButton : true, 
            doneButtonText : "Apply"
        });
    };
    selectpicker();
</script>