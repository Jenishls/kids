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
								
								<form class="kt-form" method="POST" action="{{ route('login') }}">
									  @csrf

									<div class="input-group">
										  <input id="email" type="email" class="form-control {{ $errors->has('name') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('email') ?: old('name')}}" required autocomplete="email" autofocus placeholder="Email">
									        @if($error->has('email')|| $error->has('name')) 
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('email') ?: $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
								
									</div>
									<div class="input-group">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

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
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<form class="kt-form" method="POST" action="{{ route('register') }}">
									@csrf
									<div class="input-group">
										<input id="name" class="form-control" type="text" placeholder="Fullname" name="name" value="{{ old('name') }}">
										 @error('name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="input-group">
										<input id="email" class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
										@error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="input-group">
										<input id="password" class="form-control" type="password" placeholder="Password" name="password">
										@error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="input-group">
										<input id="password-confirm" class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form method="POST" class="kt-form" action="{{ route('password.email') }}">
									 @csrf
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									    @error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</div>
									<div class="kt-login__actions">
										<button  id="login_signup_submit2" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		