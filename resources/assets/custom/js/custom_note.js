$(document)
    .off("click", "#add_note")
    .on("click", "#add_note", function(e) {
        e.preventDefault();
        showModal({
            url: "/note/add"
        });
    });

// change validation modal
$(document)
    .off("click", ".change_mem_btn")
    .on("click", ".change_mem_btn", function() {
        $("#addNoteModal").css({
            display: "none"
        });
        $("#changeSectionModal").css({
            display: "none"
        });

        $("#changeMemberModal")
            .modal()
            .show();

        // let url = $(this).data("route");
        // showModal({
        //     url: url
        // });
    });
// close change member modal
$(document).on("click", ".member_close_modal", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $("#changeMemberModal")
        .modal()
        .hide();
    $("#addNoteModal").show();
    $(".modal-backdrop.fade.show").remove();
});

// close add note modal
$(document).on("click", ".change_member_close_modal", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $("#changeMemberModal")
        .modal()
        .hide();
    $(".modal-backdrop.show").remove();
});

// change section  modal
$(document)
    .off("click", ".change_section_btn")
    .on("click", ".change_section_btn", function() {
        $("#addNoteModal").css({
            display: "none"
        });
        $("#changeSectionModal")
            .modal()
            .show();

        // let url = $(this).data("route");
        // showModal({
        //     url: url
        // });
    });
// close change member modal
$(document).on("click", ".section_close_modal", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $("#changeSectionModal")
        .modal()
        .hide();
    $("#addNoteModal").show();
    $(".modal-backdrop.fade.show").remove();
});

// apped file div
var file_add_row = 2;
$(document).on("click", ".addNoteFileRow", function(e) {
    e.preventDefault();
    e.stopPropagation();
    let html = `<div class="files-section d-flex m-t-5" data-id="${file_add_row}">
                    <input type="text" class="form-control custom_file_label" value="" placeholder="File Title" name="file_title" for="file-input" data-id="1">
                    <div class="d-flex m-l-5" style="padding-left:10px;">
                        <input id="file-input" type="file" style="display:none;" class="uploadFile" data-id="${file_add_row}"/>
                        <label class="m-btn--icon m-btn--icon-only m-btn--pill uploadNoteFile" for="file-input" data-id="${file_add_row}">
                            <i class="la la-upload"></i>
                        </label>
                        <a class="m-btn--icon m-btn--icon-only m-btn--pill removeRowFile">
                        <i class="la la-remove"></i>
                    </a>
                    </div>
                </div>`;
    $("#file_row_container").append(html);
    file_add_row += 1;
});

// remove filw append row
$(document).on("click", ".removeRowFile", function(e) {
    e.preventDefault();
    $(this)
        .parent()
        .parent()
        .empty()
        .remove();
});

$(document)
    .off("click", ".bs-donebutton")
    .on("click", ".bs-donebutton", function(e) {
        e.preventDefault();
        let value = $(this)
            .parent()
            .siblings("button")
            .children()
            .children()
            .children()
            .html();
        let field = $(this)
            .parent()
            .parent()
            .parent()
            .siblings()
            .children()
            .html();
        if (value !== "Select" && field !== "Note Type") {
            $("#t_notestable")
                .KTDatatable()
                .search(value, field);
        } else {
            $("#t_notestable")
                .KTDatatable()
                .search("", field);
        }
    });
