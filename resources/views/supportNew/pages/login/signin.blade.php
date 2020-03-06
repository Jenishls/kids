<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(./assets/media//bg/bg-3.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="/media/logos/logo-5.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In To Admin</h3>
								</div>
								
								<form class="kt-form" id="loginForm" method="POST" action="{{ route('login') }}">
									  @csrf
									<div class="input-group">
										  <input id="user_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
									         @error('email') 
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
									</div>
									<div class="input-group">
										<input id="user_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                              		  @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                               		 @enderror
									</div>
									<div class="row kt-login__extra">
										<div class="col">

											<label class="kt-checkbox">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
												<input type="checkbox" name="remember">   {{ __('Remember Me') }}
												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
										
                                    
                              			@if (Route::has('password.request'))
											<a  href="{{ route('password.request') }}" id="kt_login_forgot" class="kt-login__link">{{ __('Forgot Your Password?') }}</a>
											  @endif
										</div>
									</div>
									<div class="kt-login__actions">
											<button type="submit"  class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In  {{ __('Login') }}</button>
									</div>
								</form>
							</div>