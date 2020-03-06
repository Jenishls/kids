
<div class="modal-dialog" role="document" style="margin-left:23% !important;">
    <div class="modal-content modal-1000">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Tax</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id ="add_tax_form">
            {{-- modal body --}}
            <div class="modal-body">
                <div class="tax--field">
                    <div class="row">
                        
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for=""> Tax Code</label>
                            <input type="text" class="form-control" name="tax_code[]">
                        </div>
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for=""> Tax Name</label>
                            <input type="text" class="form-control" name="tax_name[]">
                        </div>
                        
                        <div class="form-group label-floating col-md-3">
                            <label class="control-label" for=""> Type</label>
                            <div class="">
                                <select class="form-control selectPicker" name="type[]">
                                    <option selected=""></option>
                                    <option value="flat">Flat</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group label-floating col-md-2">
                            <label class="control-label" for=""> Value</label>
                            <input type="text" class="form-control" name="value[]">
                        </div>
                        <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                            <button class="btn btn-sm btn-success btn-secondary btn-elevate-hover btn-circle btn-icon addNewTax" data-id="" style="color:brown">
                                <i class="la la-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sy_icon"  id="store_tax">Add</button>
            </div>
        </form>
    </div>
</div>

<script>

    
    $('.selectPicker').select2({
        width:'100%',
        placeholder: 'Select'
    });
    $(document).off('click', '#store_tax').on('click', '#store_tax', function(e) {
        e.preventDefault();
        let add_tax_form = $('#add_tax_form');
        let data = $('#add_tax_form').serializeArray();
        // console.log(data);

        supportAjax({
            url: '/admin/taxmaster/storetax',
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("New Tax added!");
            $('#tax_master_table').KTDatatable().reload();

        }, function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_tax_form
                        .find("input[name], textarea[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        add_tax_form
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        add_tax_form
                            .find(`textarea[name="${key}"]`)
                            .css("border-color", "#f44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);

                        $(`textarea[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty()
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check highlighted fields! </strong> <br> <br>" +
                        messages.flat(1).join("<br>")
                    );
                }
                // $('#cModal').modal('hide');
                // toastr.error(error.responseJSON.message);
            }
        );
    });

    // add new item 
    $(document).off('click', '.addNewTax').on('click', '.addNewTax', function(e){
        e.preventDefault();

        let appendNewRow = `
                        <div class="row addedTaxRow">
                            
                            <div class="form-group label-floating col-md-3">
                                <label class="control-label" for=""> Tax Code</label>
                                <input type="text" class="form-control" name="tax_code[]">
                            </div>
                            <div class="form-group label-floating col-md-3">
                                <label class="control-label" for=""> Tax Name</label>
                                <input type="text" class="form-control" name="tax_name[]">
                            </div>
                            
                            <div class="form-group label-floating col-md-3">
                                <label class="control-label" for=""> Type</label>
                                <div class="">
                                    <select class="form-control selectPicker" name="type[]">
                                        <option selected=""></option>
                                        <option value="flat">Flat</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating col-md-2">
                                <label class="control-label" for=""> Value</label>
                                <input type="text" class="form-control" name="value[]">
                            </div>
                            <div class="form-group label-floating col-md-1 pd-t-30 text-center">
                                <button class="btn btn-sm btn-danger btn-secondary btn-elevate-hover btn-circle btn-icon subNewTax" data-id="0" style="color:brown">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </div>`
        $('.tax--field').append(appendNewRow);
        
        $('.selectPicker').select2({
            width:'100%',
            placeholder: 'Select'
        });

        
    });

    $(document).off('click', '.subNewTax').on('click', '.subNewTax', function(e){
        e.preventDefault();
        $(this).closest('div.addedTaxRow').remove();
       
    });
</script>