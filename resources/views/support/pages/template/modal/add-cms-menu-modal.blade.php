
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
                    <div class="col form-group label-floating">
                        <label class="control-label">Name</label>
                        <input class="form-control" id="" name="name" value="">
                        <div class="errorMessage"></div>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Route</label>
                        <input class="form-control" id="" name="route" value="">
                        <div class="errorMessage"></div>

                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">Page Id</label>
                        <select class="form-control" id="page_id">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Template Id</label>
                        <select class="form-control" id="tempalte_id">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col form-group label-floating">
                        <label class="control-label">Parent Id</label>
                        <select class="form-control" id="parent_id">
                            @foreach ($cms_menus as $menu)
                        <option value="{{$menu->id}}">{{ucfirst($menu->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col form-group label-floating">
                        <label class="control-label">Icon</label>
                        {{-- <input class="form-control" id="" name="icon" value=""> --}}
                        <select class="form-control" id="parent_id">
                            @foreach ($icons as $icon)
                            <option value="{{$icon->icon_class}}">{{$icon->icon_name}}</option>
                            @endforeach
                        </select>
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
    $(document).off('click', '#addCmsMenu').on('click', '#addCmsMenu', function(e){
        e.preventDefault();
        let add_cms_menu = $('#add_cms_menu_form');
        let data = $('#add_cms_menu_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/cms/add/menu/'+id,
            method:"POST",
            data: data,
        },function(resp){
            $('#cModal').modal('hide');
            $('#t_cmsmenustable').KTDatatable().reload();
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

</script>