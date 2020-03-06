var showErrorMsg = function(form, type, msg) {
    var alert = $(
        '<div class="kt-alert kt-alert--outline alert alert-' +
            type +
            ' alert-dismissible" role="alert">\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
            <span></span>\
        </div>'
    );

    form.find(".alert").remove();
    alert.prependTo(form);
    //alert.animateClass('fadeIn animated');
    KTUtil.animateClass(alert[0], "fadeIn animated");
    alert.find("span").html(msg);
};

$(document)
    .off("click", "#user_registration")
    .on("click", "#user_registration", function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $(this).closest("form");
        $.validator.addMethod(
            "unique",
            function(value) {
                var result = false;
                var xhr = new window.XMLHttpRequest();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    }
                });
                if (xhr && xhr.readyState !== 400 && xhr.status !== 200) {
                    xhr.abort();
                }
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "checkUsername",
                    dataType: "json",
                    data: { username: value },
                    success: function(data) {
                        result = data == true ? true : false;
                        console.log(data + "=" + result);
                    }
                });
                // return true if username exists in database
                return result;
            },
            "This username is already taken."
        );
        // $(":input[name='username']").rules("add", { checkUsername: true });
        form.validate({
            onkeyup: false,
            rules: {
                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    unique: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    required: true
                },
                agree: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        btn.addClass(
            "kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light"
        ).attr("disabled", true);

        form.ajaxSubmit({
            method: "post",
            url: "/register",
            data: form.serialize(),
            error: function(xhr, status, error) {
                console.log(xhr);
                let response = xhr.responseJSON.errors;
                console.log(response);
                console.log(response.password);

                let errorMsg = "";
                if (Array.isArray(response.password)) {
                    $.each(response.password, function(idx, val) {
                        if (errorMsg == "") errorMsg = val;
                        else errorMsg = errorMsg + "," + val;
                    });
                }

                if (Array.isArray(response.email)) {
                    $.each(response.email, function(idx, val) {
                        if (errorMsg == "") errorMsg = val;
                        else errorMsg = errorMsg + "," + val;
                    });
                }

                setTimeout(function() {
                    btn.removeClass(
                        "kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light"
                    ).attr("disabled", false);

                    var signUpForm = $(".user-registration");

                    showErrorMsg(signUpForm, "danger", errorMsg);
                }, 2000);
            },
            success: function(response, status, xhr, $form) {
                // similate 2s delay

                console.log(xhr);
                setTimeout(function() {
                    btn.removeClass(
                        "kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light"
                    ).attr("disabled", false);
                    form.clearForm();
                    form.validate().resetForm();

                    // display signup form
                    //displaySignInForm();
                    var signUpForm = $(".user-registration");
                    signUpForm.clearForm();
                    signUpForm.validate().resetForm();

                    showErrorMsg(
                        signUpForm,
                        "success",
                        "Thank you. To complete your registration please check your email."
                    );
                }, 2000);
            }
        });
    });
