<div class="modal-dialog addTypeModal" id="createTypeModal" role="document" style="/* width: 600px; */">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Type</h5>
            <div>
            <button type="button" class="close closeTypeModal"  data-dismiss="modal" aria-label="Close">
            </button>
            </div>
        </div>
        <div class="modal-body">
            <form id="add--type--form">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                            <label class="control-label" for="type" class="required">Type</label>
                            <input type="text" class="form-control " id="type" name="type" autocomplete="off" >
                            <div class="errorMessage"></div>
                    </div>
                </div>
                {{-- <div class="row form-group">
                    <div class="col-lg-12 label-floating">
                        <label class="control-label" for="description" class="required">Description</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea3" name="description" rows="3"></textarea>
                    </div>
                </div> --}}
                
            </form>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary x closeTypeModal" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-primary sy_icon"  id="store--type">Save</button>
        </div>
    </div>
</div>
<script>
    $(document)
    .off("click", "#store--type")
    .on("click", "#store--type", function (e) {
        var store_type = $("#add--type--form");
        e.preventDefault();
        e.stopPropagation();
        let data = $("#add--type--form").serializeArray();
        supportAjax({
                url: "/admin/preferredtime/type/store",
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
                        .find("input[name]")
                        .css("border-color", "#ddd");
                    $(`input[name]`)
                        .siblings(".errorMessage")
                        .empty();

                    if (!responseJSON.errors) return;
                    const messages = [];
                    for (const [key, message] of Object.entries(
                            responseJSON.errors
                        )) {
                        $("#add--type--form")
                            .find(`input[name = "${key}"]`)
                            .css("border-color", "#F44336");
                        messages.push(message);
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .empty();
                        $(`input[name="${key}"]`)
                            .siblings(".errorMessage")
                            .append(message);
                    }
                    toastr.error(
                        "<strong>Please check hightlighted fields!</strong> <br><br>" +
                        messages.flat(1).join("<br>")
                    );
                }
            }
        );
    });
</script>