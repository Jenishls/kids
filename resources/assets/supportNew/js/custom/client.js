var addClientAllData = {};
/**
 *For next step on client add and edit form// for other forms need to modify a little bit
 * @param {current tab} that
 * @param {targeted tab} target
 */
function client_form_validation(that, target) {
    var formtype = that.attr("data-action");
    var currentStep = that.attr("data-step");
    var nextIndex = currentStep + 1;
    var currentTab = $("#clientForm>li>a")[currentStep - 1];
    var currentTabContent = $("#tabContent>div.tab-pane")[currentStep - 1];
    var nextTab = $("#clientForm>li>a")[target];
    var nextTabContent = $("#tabContent>div.tab-pane")[currentStep];
    var formId = `client_${formtype}_form`;
    var form = $(`#${formId}`);
    var formData = new FormData(document.getElementById(formId));
    $.ajax({
        url: `/admin/client/validate/client_${formtype}_form`,
        method: "POST",
        data: new FormData(document.getElementById(formId)),
        contentType: false,
        processData: false,
        success: function(resp) {
            console.log(resp);
            $(nextTab).tab("show");
            if (nextIndex != 1) {
                $("#client_form_info").css("display", "block");
            } else {
                $("#client_form_info").css("display", "none");
            }
            if (resp.mname === null) {
                var mname = "";
            } else {
                var mname = resp.mname;
            }
            if (resp.lname === null) {
                var lname = "";
            } else {
                var lname = resp.lname;
            }
            let info_html = `
                    ${resp.salutation +
                        "." +
                        " " +
                        resp.fname +
                        " " +
                        mname +
                        " " +
                        lname}
                `;
            $(".kt-widget5__title").html(info_html);
            if (resp.email !== null) {
                $(".email_icon_1").css("display", "block");
                $(".clientEmail").html(resp.email);
            }
            if (resp.email_sec !== null) {
                $(".email_icon_2").css("display", "block");
                $(".clientEmail2").html(resp.email_sec);
            }
            if (resp.dob !== null) $(".clientDOB").html(resp.dob);
            if (resp.add1 !== null) $(".clientAdd1").html(resp.add1);
            if (resp.add2 !== null) $(".clientAdd2").html(resp.add2);
            if (resp.city !== null || resp.state !== null || resp.zip !== null)
                $(".clientLocation").html(
                    resp.city + ", " + resp.state + ", " + resp.zip
                );
            if (resp.county !== null) $(".clientLocation2").html(resp.county);

            if (resp.phone_no_1 !== null) {
                if (resp.client_phone_1 == "Cell Phone") {
                    var phone_class = "la la-mobile-phone";
                } else {
                    var phone_class = "la la-phone";
                }
                $(".clientPhone1")
                    .addClass(phone_class)
                    .css("display", "block");
                $(".clientContact1").html(resp.phone_no_1);
            }
            if (resp.phone_no_2 !== null) {
                if (resp.client_phone_2 == "Cell Phone") {
                    var phone_class = "la la-mobile-phone";
                } else {
                    var phone_class = "la la-phone";
                }
                $(".clientPhone2")
                    .addClass(phone_class)
                    .css("display", "block");
                $(".clientContact2").html(resp.phone_no_1);
            }
            if (resp.company_name !== null) {
                $(".clientCompany").html(resp.company_name);
                $(".clientCompanyAdd1").html(resp.company_add1);
                $(".clientCompanyAdd2").html(resp.company_add2);
                $(".clientCompanyCity").html(
                    resp.company_city +
                        " " +
                        resp.company_state +
                        " " +
                        resp.company_zip
                );
                $("#companyShowDiv").css("display", "block");
            }
        },
        error: function({ status, responseJSON }) {
            if (status === 422) {
                form.find("input[name]").css("border-color", "#ddd");
                $(`input[name]`)
                    .siblings(".errorMessage")
                    .empty();
                $(`input[name]`)
                    .parent()
                    .siblings(".errorMessage")
                    .empty();
                if (!responseJSON.errors) return;
                const messages = [];
                var errorEl = Object.entries(responseJSON.errors)[0][0];
                var errorpanel = form
                    .find(`input[name = "${errorEl}"]`)
                    .closest("div.tab-pane");
                $(`a[href="#${$(errorpanel).attr("id")}"]`).tab("show");
                for (const [key, message] of Object.entries(
                    responseJSON.errors
                )) {
                    form.find(`input[name = "${key}"]`).css(
                        "border-color",
                        "#F44336"
                    );
                    messages.push(message);
                    var customMessage = "This field is required.";
                    $(`input[name="${key}"]`)
                        .siblings(".errorMessage")
                        .empty()
                        .append(customMessage);
                    // $(`input[name="${key}"]`)
                    //     .siblings(".errorMessage")
                    //     .html(customMessage);
                    $(`input[name="${key}"]`)
                        .parent()
                        .siblings(".errorMessage")
                        .empty()
                        .append(customMessage);
                    // $(`input[name="${key}"]`)
                    //     .parent()
                    //     .siblings(".errorMessage")
                    //     .html(customMessage);
                }
                toastr.error(
                    "<strong>Please check hightlighted fields!</strong>"
                );
            }
        }
    });
}
/**
 * Previous step of form
 * @param {*} that
 */
function previous_form_step(that) {
    var currentStep = that.attr("data-step");
    var prevIndex = currentStep - 1;
    var currentTab = $("#clientForm>li>a")[currentStep - 1];
    var currentTabContent = $("#tabContent>div.tab-pane")[currentStep - 1];
    var prevTab = $("#clientForm>li>a")[currentStep - 2];
    var prevTabContent = $("#tabContent>div.tab-pane")[currentStep - 2];
    $(currentTab).removeClass("active");
    $(currentTabContent).removeClass("active");
    $(prevTab).addClass("active");
    $(prevTabContent).addClass("active");
    if (prevIndex != 1) {
        $("#client_form_info").css("display", "block");
    } else {
        $("#client_form_info").css("display", "none");
    }
}
$("input[name=phone]").inputmask("mask", {
    mask: "(999) 999-9999"
});

$(document).ready(function() {
    $("#name_search").on("keypress", function(e) {
        if ($(this).val().length >= 3) {
            $("#t_clientstable")
                .KTDatatable()
                .search($(this).val(), "fname");
        }
        if ($(this).val() == "") {
            $("#t_clientstable")
                .KTDatatable()
                .search($(this).val(), "fname");
        }
    });

    $("#email_search").on("keypress", function(e) {
        if ($(this).val().length >= 3) {
            $("#t_clientstable")
                .KTDatatable()
                .search($(this).val(), "email");
        }
        if ($(this).val() == "") {
            $("#t_clientstable")
                .KTDatatable()
                .search($(this).val(), "email");
        }
    });
});
$(document)
    .off("click", "#add_client, .add_client")
    .on("click", "#add_client, .add_client", function(e) {
        e.preventDefault();
        e.stopPropagation();
        showModal({
            url: "/admin/client/add",
            c:'sClient'
        });
    })
    .off("click", ".edit_client")
    .on("click", ".edit_client", function(e) {
        e.preventDefault();
        showModal({
            url: $(this).data("route"),
            c:1
        });
    })
    .off("click", ".delClient")
    .on("click", ".delClient", function(e) {
        e.preventDefault();
        let header = null;
        let id = $(this).data("id");
        if($('#t_clientstable').length)
            header= $('#t_clientstable')
        if($('#t_company_client_table').length)
            header=  $('#t_company_client_table')
        delConfirm({
            url: "/admin/client/deleteClient/" + id,
            header
        },function(){
            if($('#t_clientstable').length)
                $('#t_clientstable').KTDatatable().reload();
            if($('#t_company_client_table').length)
                $('#t_company_client_table').KTDatatable().reload();
        });
        
    });
$(document)
    .off("click", ".exportTo")
    .on("click", ".exportTo", function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.open("/admin/export/clients/" + $(this).attr("data-export-to"));
    });


// Add client form
function active_current_row() {
    let url = Cookies.get("active_current_row");
    $(`[data-route="${url}"]`)
        .closest("tr")
        .addClass("active_row")
        .siblings("tr.active_row")
        .removeClass("active_row");
}

function clientTableReloader()
{
    if($('#t_clientstable').length){
        clientsTable.setDataSourceParam("sort",{"sort":"desc","field":"updated_at"});
        clientsTable.setDataSourceParam("pagination",{"page":"1","perpage":"20"});
        $('#t_clientstable').addClass('addedNew').KTDatatable().reload();
    }
}

 
// var currentTabStep = 1;
$(document).on("click", ".form_next_step", function(e) {
    e.preventDefault();
    var target = parseInt($(this).attr("data-step"));
    client_form_validation($(this), target);
$(document).on("click", ".form_previous_step", function(e) {
    e.preventDefault();
    previous_form_step($(this));
});
$(document)
    .off("click", "#createClient")
    .on("click", "#createClient", function(e) {
        console.log(addClientAllData);
    });
});
