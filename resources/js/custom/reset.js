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

 $('#resetPasswordS').click(function(e) {
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

             form.ajaxSubmit({
                method:'post',
                url: '/password/email',
                data: form.serialize(),
                error: function (xhr, status, error){
                    // console.log(xhr);
                    let response = xhr.responseJSON.errors; 
                    console.log(response);
                    console.log(response.reset);

                    let errorMsg="";
                    if(Array.isArray(response.reset)){

                        $.each(response.reset, function(idx, val){
                            
                            if(errorMsg=="")
                                errorMsg = val;  
                            else
                                errorMsg = errorMsg +","+ val;  
                        });
                    }
                    if(Array.isArray(response.password)){
                        $.each(response.password, function(idx, val){
                            if(errorMsg=="")
                                errorMsg = val;  
                            else
                                errorMsg = errorMsg +","+ val;  
                        });
                    }
                    setTimeout(function() {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                      
                        var resetForm = $('#forgetPasswordForm');
                      
                        showErrorMsg(resetForm, 'danger', errorMsg);
                    }, 2000);
                },

                success: function(response, status, xhr, $form) {
                    // return ;
                    // similate 2s delay
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    // display signup form
                    //   displaySignInForm();
                    var resetForm = $('#forgetPasswordForm');
                   resetForm.clearForm();
                   resetForm.validate().resetForm();
                    let ns = "success";
                    if(response.status =="passwords.user")
                         ns ="danger";

                     if (response.status =="passwords.token")
                         ns="danger";
                   
                     showErrorMsg(resetForm, ns, response.msg); 
                }
            });
 });
 $('#reset_submit').click(function(e){
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

     form.ajaxSubmit({
        method:'post',
        url: '/password/reset',
        data: form.serialize(),
        error: function (xhr, status, error){
            // console.log(xhr);
            let response = xhr.responseJSON.errors; 
            console.log(response);
            console.log(response.reset);

            let errorMsg="";
            if(Array.isArray(response.reset)){

                $.each(response.reset, function(idx, val){
                    
                    if(errorMsg=="")
                        errorMsg = val;  
                    else
                        errorMsg = errorMsg +","+ val;  
                });
            }
            if(Array.isArray(response.password)){
                $.each(response.password, function(idx, val){
                    if(errorMsg=="")
                        errorMsg = val;  
                    else
                        errorMsg = errorMsg +","+ val;  
                });
            }
            setTimeout(function() {
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
              
                var resetForm = $('.reset-password');
              
                showErrorMsg(resetForm, 'danger', errorMsg);
            }, 2000);
        },

        success: function(response, status, xhr, $form) {
            // return ;
            // similate 2s delay
            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            form.clearForm();
            form.validate().resetForm();
            // display signup form
            //   displaySignInForm();
            var resetForm = $('.reset-password');
           resetForm.clearForm();
           resetForm.validate().resetForm();
            let ns = "success";
            if(response.status =="passwords.user")
                 ns ="danger";

             if (response.status =="passwords.token")
                 ns="danger";
           
             showErrorMsg(resetForm, ns, response.msg); 
             if(ns=="success"){
                window.location.href = '/dashboard';
             }  
        }
    });
 })
 