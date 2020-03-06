<!-- Modal 1 -->
<div class="modal-dialog addFaqModal" role="document" style="margin-left:31%;">
    <div class="modal-content modal modal-800">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add FAQs</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id="faqs_form">
            {{-- modal body --}}
            <div class="modal-body row ">
                @csrf
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="">Sequence</label>
                    <input class="form-control" min="1" type="number" id="" data-inputName="" name="sequence" placeholder="Sequence" required="require" autocomplete="off" value="{{$seq}}">
                    <div class="errorMessage"></div>
                </div>
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="">Question</label>
                    <textarea class="form-control" type="text" name="question" data-inputName="" id="" placeholder="Question" required="require" autocomplete="off"></textarea>
                    <div class="errorMessage"></div>
                </div>
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="">Answer</label>
                    <textarea class="form-control" rows="5" type="text" id="" data-inputName="" name="answer" placeholder="Answer" required="require" autocomplete="off"></textarea>
                    <div class="errorMessage"></div>
                </div>
            </div>
        </form>
        {{-- footer --}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="store_faqs">Save</button>
        </div>
    </div>
</div>
<script>
    $(document).off('click', '#store_faqs').on('click', '#store_faqs', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let add_faqs_form = $('#faqs_form');
        let data = $('#faqs_form').serializeArray();
        supportAjax({
            url: 'faq/add',
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("New Faq added!");
            $('#t_faq_datatable').KTDatatable().reload();

        }, function({
            status,
            responseJSON
        }) {
            if (status === 422) {
                add_faqs_form.find("input[name], textarea[name]").css('border-color', '#ddd');
                $(`textarea[name]`).siblings(".errorMessage").empty();
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    add_faqs_form.find(`textarea[name = "${ key }"], input[name="${key}"]`).css('border-color', '#F44336');
                    messages.push(message);
                    $(`input[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    $(`textarea[name="${key}"]`).siblings(".errorMessage").empty().append(message);
                    // $(`textarea[name="${key}"]`).siblings(".errorMessage").append(message);
                }
                toastr.error('<strong>Please check hightlighted fields!</strong> <br><br>' + messages.flat(1).join('<br>'));
            }
        });
    });

    $(document).on('click', '#btnRemoveRow', function() {
        $(this).parent().parent().empty().remove();
    });
</script>