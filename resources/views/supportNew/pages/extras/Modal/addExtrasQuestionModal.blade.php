<div class="modal-dialog addQuestionSectionModal" id="createQuestionModal" role="document" style="/* width: 600px; */">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
            <div>
            <button type="button" class="close closeSectionModal"  data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="add_question_form">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="question" class="required">Question</label>
                        <textarea class="form-control rounded-0"  name="question" rows="1"></textarea>
                        <div class="errorMessage"></div>
                    </div>
                </div>
                <div class="row form-group">
                    {{-- <div class="col-lg-6 label-floating">
                        <label class="control-label" for="question" class="required">Type</label>
                        <select class="form-control selectPicker" name="type">
                            <option selected=""></option>
                            <option value="delivery">Delivery</option>
                            <option value="pickup">Pickup</option>
                        </select>

                    </div> --}}
                    
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="label" class="required">Label</label>
                        <textarea class="form-control rounded-0"  name="label" rows="1"></textarea>
                        <div class="errorMessage"></div>
                </div>
                </div>
                
                <div class="row form-group">
                    
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="description" class="required">Description</label>
                        <textarea class="form-control rounded-0"  name="description" rows="3"></textarea>
                    </div>
                </div>
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x closeSectionModal" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary sy_icon"  id="add_question">Save</button>
        </div>
    </div>
</div>


<script>   
// seclectpicker
    $('.selectPicker').select2({
            width:'100%',
            placeholder: 'Select'
        });
        // create new section section
    $(document)
    .off("click", "#add_question")
    .on("click", "#add_question", function (e) {
        var add_question = $("#add_question_form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#add_question_form").serializeArray();
        supportAjax({
                url: "/admin/extras/storequestion",
                method: "post",
                data: data
            },
            function (resp) {
                $("#kt_body")
                    .empty()
                    .append(resp);
                $("#cModal").modal("hide");
                toastr.success("Added successfully.");
            },
            function ({
                status,
                responseJSON
            }) {
                if (status === 422) {
                    add_question
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
                        add_question
                            .find(`input[name="${key}"]`)
                            .css("border-color", "#f44336");
                        add_question
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
</script>