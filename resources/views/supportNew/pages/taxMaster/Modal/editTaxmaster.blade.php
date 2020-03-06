<div class="modal-dialog" role="document" style="margin-left:23% !important;">
    <div class="modal-content modal-1000" >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Tax</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="edit--tax--form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row">
                    
                    <div class="form-group label-floating col-md-3">
                        <label class="control-label" for=""> Tax Code</label>
                        <input type="text" class="form-control" name="tax_code" value="{{$tax->tax_code}}">
                    </div>
                    <div class="form-group label-floating col-md-3">
                        <label class="control-label" for=""> Tax Name</label>
                        <input type="text" class="form-control" name="tax_name" value="{{$tax->tax_name}}">
                    </div>
                    
                    <div class="form-group label-floating col-md-3">
                        <label class="control-label" for=""> Type</label>
                        <div class="">
                            <select class="form-control selectPicker" name="type">
                                <option selected=""></option>
                                <option value="flat" @if($tax->type==='flat') selected @endif>Flat</option>
                                <option value="percentage" @if($tax->type==='percentage') selected @endif>Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group label-floating col-md-3">
                        <label class="control-label" for=""> Value</label>
                        <input type="text" class="form-control" name="value" value="{{$tax->value}}">
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon"  id="update--tax" data-id="{{$tax->id}}">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    // update
    $(document).off('click', '#update--tax').on('click', '#update--tax', function(e) {
        e.preventDefault();
        e.stopPropagation();
        // let table = $(".tableloader").attr("id");
        let edit_tax_form = $('#edit--tax--form');
        let data = $('#edit--tax--form').serializeArray();
        
        let id = $(this).attr('data-id');
        supportAjax({
            url: '/admin/taxmaster/updatetax/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Tax Table updated!");
            $('#tax_master_table').KTDatatable().reload();
        },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    edit_tax_form.find("input[name], textarea[name]").css("border-color", "#ddd");
                    $(`input[name]`).siblings(".errorMessage").empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        edit_tax_form.find(`input[name="${key}"]`).css("border-color", "#f44336");
                        edit_tax_form.find(`textarea[name="${key}"]`).css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);

                        $(`textarea[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        )
    });
</script>