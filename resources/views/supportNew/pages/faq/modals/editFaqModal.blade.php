<!-- Modal 1 -->
<div class="modal-dialog editFaqModal" role="document" style="margin-left:31%;">
    <div class="modal-content modal modal-800">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update FAQs</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form id="update_faqs_form">
            {{-- modal body --}}
            <div class="modal-body row ">
                @csrf
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="sequence">Sequence</label>
                    <input class="form-control" type="number" min="1" id="update_S" data-inputName="" name="sequence" placeholder="Sequence" required="require" autocomplete="off" value="{{$faq->seq}}">
                    <div class="errorMessage"></div>
                </div>
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="question">Question</label>
                    <textarea class="form-control" type="text" name="question" data-inputName="faqQ" id="update_q" placeholder="Question" required="require" autocomplete="off">{{$faq->question}}</textarea>
                    <div class="errorMessage"></div>
                </div>
                <div class="form-group label-floating col-md-12">
                    <label class="control-label" for="answer">Answer</label>
                    <textarea class="form-control" type="text" rows="5"  id="update_a" data-inputName="faqA" name="answer" placeholder="Answer" required="require" autocomplete="off">{{$faq->faqAnswer->answer}}</textarea>
                    <div class="errorMessage"></div>
                </div>
            </div>
        </form>
        {{-- footer --}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary sy_icon" id="update_faqs" data-id="{{$faq->id}}">Update</button>
        </div>
    </div>
</div>
<script>
    $(document).off('click', '#update_faqs').on('click', '#update_faqs', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let update_faqs_form = $('#update_faqs_form');
        let data = $('#update_faqs_form').serializeArray();
        let id = $(this).attr('data-id');
        supportAjax({
            url: 'faq/updateFaq/' + id,
            method: 'POST',
            data: data
        }, function(resp) {
            $('#cModal').modal('hide');
            toastr.success("Faqs updated!");
            $('#t_faq_datatable').KTDatatable().reload();

        }, function({
            status,
            responseJSON
        }) {
            if (status === 422) {
                update_faqs_form.find("input[name], textarea[name]").css('border-color', '#ddd');
                $(`textarea[name]`).siblings(".errorMessage").empty();
                $(`input[name]`).siblings(".errorMessage").empty();
                if (!responseJSON.errors) return;
                const messages = [];
                for (const [key, message] of Object.entries(responseJSON.errors)) {
                    update_faqs_form.find(`textarea[name = "${ key }"], input[name="${key}"]`).css('border-color', '#F44336');
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