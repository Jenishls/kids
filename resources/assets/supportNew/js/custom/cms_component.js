// add component modal
$(document)
    .off("click", "#add_component")
    .on("click", "#add_component", function() {
        let url = $(this).attr("data-route");
        showModal({
            url: url
        });
    });

//  look up modal
$(document)
    .off("click", ".addNewComponent")
    .on("click", ".addNewComponent", function() {
        let url = $(this).data("route");
        let id = 1;
        $("#add_component_modal").css({
            display: "none"
        });
        $("#addNewComponent")
            .modal()
            .show();

        //show id Card type
        supportAjax(
            {
                url: "/dashboard/cms/addmodal/newcomponent/" + id,
                method: "GET"
            },
            function(resp) {
                // let temp = "";
                // resp.forEach(function (data, index) {
                //     temp += `<label class="kt-checkbox kt-checkbox--solid f-s-16" id="card_type_label" style="text-transform:capitalize;">
                //             <input type="radio" name="id_card_type" class="" value="${data.value}">${data.value}
                //             <span ></span>
                //             </label> <br>`;
                // });
                // $(".id_cardlook_up_div")
                //     .empty()
                //     .append(temp);
            }
        );
    });
//close addModal
$(document)
    .off("click", ".closeThisNewModal")
    .on("click", ".closeThisNewModal", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#addNewComponent")
            .modal()
            .hide();
        // $("#add_component_modal").show();
        $("#add_component_modal").show();

        $(".modal-backdrop.show").remove();
    });

// Add CRUD

$(document)
    .off("click", "#storeComponent")
    .on("click", "#storeComponent", function(e) {
        let temp_id = $(this).attr("data-id");
        let data = $("#addComponentForm").serializeArray();
        supportAjax(
            {
                url: "/dashboard/cms/add/component/" + temp_id,
                method: "POST",
                data: data
            },
            function(resp) {
                $("#cModal").modal("hide");
                $("#cmsElContainer")
                    .empty()
                    .append(resp);
                toastr.success("New component addded.");
            },
            function(err) {
                console.log(err);
            }
        );
    });
