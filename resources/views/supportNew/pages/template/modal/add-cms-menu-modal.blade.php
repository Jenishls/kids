
<div class="modal-dialog" role="document" style="" id="">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="add_cms_menu_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 form-group label-floating">
                        <label class="control-label">Name</label>
                        <input class="form-control" id="" name="name" value="">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col-4 form-group label-floating">
                        <span data-toggle="tooltip" data-placement="right" title="Which page is linked to this menu?" >
                            <label class="control-label" for="route" style="font-weight:450;font-size:14px;">Page</label>
                            <span>
                                <i class="fa fa-question" style="font-size: 11px;"></i>
                            </span>
                        </span>
                        <select class="form-control page_select" id="menu_route" name="route">
                            <option value="" >Select page</option>
                             @foreach ($cms_pages as $page)
                                <option value="{{$page->target}}">{{ucfirst($page->page_name)}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                    <div class="form-group label-floating col-2">
                        <label class="control-label">Is Parent</label>
                        <input type="hidden" name="builder[layout][toolbar][display]" value="false" >
                        <span class="kt-switch kt-switch--icon-check">
                            <label>
                                <input type="checkbox" name="builder[layout][toolbar][display]" value="true" checked="" id="parent_switch" style="position:inherit;">
                                <span style="margin-top: 32px; margin-left: -56px;"></span>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">Parent</label>
                        <select class="form-control parent_select" id="parent_id" name="parent_id">
                            <option value="" >Select parent</option>
                             @foreach ($cms_menus as $menu)
                                @if ($menu->is_parent === 1)
                                    <option value="{{$menu->id}}">{{ucfirst($menu->name)}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Sequence No.</label>
                        <input class="form-control" id="" name="seq_no" value="">
                    </div>
                </div>
            </div>
            
        </form>
        {{-- footer --}}
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addCmsMenu" data-id="{{$template->id}}">Save</button>
            </div>
    </div>
</div>

<script>


    // $(document).on('change', '#parent_switch', function(e){
    //     toggleInputState('.parent_select', $(this).val());
    // })

    $(document).off('click', '#addCmsMenu').on('click', '#addCmsMenu', function(e){
        e.preventDefault();
        let add_cms_menu = $('#add_cms_menu_form');
        let data = $('#add_cms_menu_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/admin/cms/add/menu/'+id,
            method:"POST",
            data: data,
        },function(resp){
            $('#cModal').modal('hide');
            $('#cmsElContainer').empty().append(resp);
            toastr.success('New Menu added.');
        },function({ status,responseJSON}){
            if (status === 422) 
            {
                add_cms_menu.find('input[name]').css('border-color', '#ddd');
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_cms_menu.find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                    $(`input[name="${key}"]`).siblings(".errorMessage").append(message);

                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });


    $('.parent_select, .page_select').selectpicker({
        liveSearch: true,
        showTick: true,
        actionsBox: true,
        doneButton : true, 
        doneButtonText : "Apply"
    });
</script>