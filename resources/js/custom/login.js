
    var showErrorMsg = function (form, type, msg) {
        var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
            <span></span>\
        </div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

 $(document).off('click','.login_signup_submit2').on('click','.login_signup_submit2', function(e) {
    e.preventDefault();
    var btn = $(this);
    var form = $(this).closest('form');
    form.validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });

    if (!form.valid()) {
        return;
    }
    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

    $.ajax({
        method:'post',
        url: '/login',
        data: form.serialize(),
        success: function(response, status, xhr, $form) {
            var signInForm = $('#supportLoginForm');
            showErrorMsg(signInForm,'success', 'Loggin in ...');
            window.location.href= '/admin';
        },
        error: function (error, status, errorThrown){
            var signInForm = $('#supportLoginForm');
            if(error.responseJSON.errors){
                let errors= error.responseJSON.errors;
                let errs= Object.values(errors);
                  errs.forEach(function(msg, i){
                     setTimeout(function() {
                        showErrorMsg(signInForm,'danger', msg);
                     }, 1000);
                })
            }
             btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);

        }
    });
});

 function logout(){
    event.preventDefault();
    document.getElementById('logout-form').submit();
 }
