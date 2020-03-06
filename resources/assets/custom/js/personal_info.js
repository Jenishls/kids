
$(document).on('click', '#edit_person_info', function () {
    $('#personal_detail_form').removeClass('module--disabled-mask')
});
$(document).on('click', '#edit_personal_address', function () {
    $('#personal_address_form').removeClass('module--disabled-mask')

});

$('#user_role').selectpicker({
    placeholder: "Select",
    width: "100%",
});

