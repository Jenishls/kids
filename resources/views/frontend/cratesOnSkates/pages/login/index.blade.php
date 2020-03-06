<style>
.error{
    font-family: Poppins;
    font-size: 12px;
    color: #b12704;
}
.user_not_exists{
    text-align: center;
    font-family: Poppins;
    font-size: 12px;
    color: #b12704;
}
</style>
{{-- <div class="hr"></div> --}}
<div class="sec-reg radial-th-gradient">
    <div class="container cs-container-wrapper">
        <div class="row">
            <!-- ***** Registration page Start ***** -->

            <div class="col-lg-4 offset-lg-4 col-md-12 col-sm-12" style="padding: 90px 0;">
                <div class="sec-reg__form_wrapper">
                    <div>
                        <h3 class="form-title">Login</h3>
                    </div>
                    <div style="padding:30px">
                        <form id="loginForm">
                            <label for="email">Email / Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="email" class="form-control input_user" autocomplete="off">
                            </div>
                            <p class="error error_email"></p>
                            <label for="password">Password</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass" autocomplete="off">
                            </div>
                            <p class="error error_password"></p>
                            <div class="form-group row">
                                <div class="custom-control custom-checkbox col-md-6 m-t-10">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <p class="user_not_exists error_user"></p>
                            <div class="d-flex justify-content-center mt-2 login_container">
                                {{-- <button type="button" name="button" class="btn login_btn"  onclick="location.reload()">Login</button> --}}
                                <div class="global-btn global-btn__green  m-t-15" style="margin: auto" id="js--login">
                                    <p>Login</p>  
                                </div>
                            </div>
                            <div class="text-center pd-t-15">
                                <a href="#">Forgot your password?</a>
                                <p class="mt-3">Dont have an account? <a href="javascript:void(0);" class="load_pages" 
                                    data-slug="/page-register"
                                    data-route="/cratesonskates/register">Sign Up</a></p>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	clickEvent('#js--login')(login);
	keyupEvent('#loginForm :input')(e => e.which === 13? login() : '');

	function login(){
		clearValidations();

		cratesAjax({
			url :'/login',
			method : "post",
			data : $('#loginForm').serializeArray()
		}, resp => {
			location.replace('/')
		}, ({responseJSON: {errors}}) => {		
            clearValidations();
			for(let key in errors){
				let el = $(`#loginForm [name="${key}"]`);
                el.css('border-color', '#b12704')
                console.log(errors[key][0]);
                console.log("error_"+key);
               let  element = $(`p.error_${key}`).text(errors[key]);
            //    console.log(element);
				// el.parent().append(`<br><span class="error-msg">${errors[key]}</span>`);
			}	
		});
	}

	function clearValidations(){
		let el = $(`#loginForm :input`);
		el.css('border-color', '#ced4da')
		$('.error-msg').remove();
	}
</script>
