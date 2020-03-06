<style>
	.crates_login_conatiner{
		background: radial-gradient(ellipse at bottom, #d1e9a0 0, #76c043 37%);
	}
	.crates_login_user_card {
		height: 440px;
		width: 440px;
		margin-top: auto;
		margin-bottom: auto;
		background: #ffffff;
		position: relative;
		display: flex;
		justify-content: center;
		flex-direction: column;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 5px;

	}
	.crates_login_brand_logo_container {
		position: absolute;
		height: 170px;
		width: 170px;
		top: -75px;
		border-radius: 50%;
		background: white;
		padding: 10px;
		text-align: center;
		border: 5px solid #76c043;
	}
	.crates_login_brand_logo {
		height: 110px;
		width: 108px;
		border-radius: 21%;
		border: 2px solid white;
		padding-top: 17px;
		margin-top: 15px;
	}
	.crates_login_form_container {
		margin: 130px 20px 0px 20px;
	}
	.crates_login_form_container form{
		width: 100%;
	}
	.login_btn {
		width: 100%;
		background: #76c043 !important;
		color: white !important;
		letter-spacing: 1px;   
		 width: 139px;
    	border-radius: 4px;
	}
	.login_btn:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.login_container {
		padding: 0 2rem;
	}
	.input-group-text {
		background: #76c043 !important;
		color: white !important;
		border: 0 !important;
		border-radius: 0.25rem 0 0 0.25rem !important;
	}
	.input_user,
	.input_pass{
		font-size: 15px;
	}
	.input_user,
	.input_pass:focus {
		box-shadow: none !important;
		outline: 0px !important;
		
	}
	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
    background-color: #373737 !important;
	}
	.l-f-p-div{
		padding-left: 30px;
    	padding-right: 0;
	}

	.links a{
		color: #61ae2b;
	}

	.error-msg{
		display: block;
		width: 100%;
		color: #b12704;
		order: -1;
	}

</style>
<div class="crates_login_conatiner">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="crates_login_user_card">
				<div class="d-flex justify-content-center">
					<div class="crates_login_brand_logo_container">
						<img src="{{asset('cratesOnSkatesImages/cratesOnSkatesLogo.png')}}" class="crates_login_brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center crates_login_form_container">
					<form id="loginForm">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input name="email" class="form-control input_user" value="" placeholder="Username or email" autocomplete="off">

						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" autocomplete="off">
						</div>
						<div class="form-group row">
							<div class="custom-control custom-checkbox col-md-6">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
							<div class="d-flex justify-content-center links col-md-6 l-f-p-div">
								<a href="#">Forgot your password?</a>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-5 login_container">
							{{-- <button type="button" name="button" class="btn login_btn"  onclick="location.reload()">Login</button> --}}
							<div class="global-btn global-btn__green  m-t-15" style="margin: auto" id="js--login">
								<p>Login</p>  
							</div>
						</div>
					</form>
				</div>
		
				<div class="mt-5">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2 sign--up">Sign Up</a>
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
			dd("errro",errors);		
			for(let key in errors){
				let el = $(`#loginForm [name="${key}"]`);
				el.css('border-color', '#b12704')
				el.parent().append(`<span class="error-msg">${errors[key]}</span>`);
			}	
		});
	}

	function clearValidations(){
		let el = $(`#loginForm :input`);
		el.css('border-color', '#ced4da')
		$('.error-msg').remove();
	}
</script>
