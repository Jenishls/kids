{{-- <div class="hr"></div> --}}
<div class="sec-reg radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Registration page Start ***** -->

            <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12" style="padding: 90px 0;">
                <div class="sec-reg__form_wrapper">
                    <div>
                        <h3 class="form-title">Register</h3>
                    </div>
                    <div style="padding:30px 20px">
                        <form id="registrationForm">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" autocomplete="off" name="first_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" autocomplete="off" name="last_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" autocomplete="off" name="username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Mobile</label>
                                    <input type="text" class="form-control" id="phone" autocomplete="off" name="mobile_no">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="client" value="1">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation " autocomplete="off">
                                </div>
                            </div>
                            <div class="sec-reg__btn-submit">
                                <div class="global-btn global-btn__green  m-t-15" style="margin: auto" id="js--register">
                                    <p>Submit</p>
                                </div>
                                <div>
                                   <p class="sec-reg__text-login">Alredy have an account? <a href="javascript:void(0)" data-route="/cratesonskates/login"
                                    class="ml-2 sec-reg__login-link load_pages" data-slug="page-login">Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
phoneMask("[name='mobile_no']");
clickEvent('#js--register')(register);
	keyupEvent('#registrationForm :input')(e => e.which === 13? register() : '');

	function register(){
         let data = $("#registrationForm").serializeArray();
        clearValidations();
        let formattedData = formatData(data);
		cratesAjax({
			url :'/register',
			method : "post",
			data : formattedData
		}, resp => {
            toastr.success("Registered Successfully");
            location.replace('/page-login');
		}, ({responseJSON: {errors}}) => {
			for(let key in errors){
				let el = $(`#registrationForm [name="${key}"]`);
				el.css('border-color', '#b12704')
				el.parent().append(`<span class="error-msg">${errors[key]}</span>`);
			}
		});
    }
    function formatData(data){
        let fullname = "";
        data.forEach((val, index) => {
            if(val.name === "first_name"){
                fullname+= val.value;
            }
            if(val.name === "last_name"){
                fullname = fullname+ " "+val.value;
            }
        });
        data.push({name:"name",value:fullname});
        return data;
    }
	function clearValidations(){
		let el = $(`#registrationForm :input`);
		el.css('border-color', '#ced4da')
		$('.error-msg').remove();
	}

</script>
