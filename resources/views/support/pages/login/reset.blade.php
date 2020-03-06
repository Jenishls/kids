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

									<div class="kt-login__reset" style="display:block">
										<div class="kt-login__head">
											<h3 class="kt-login__title">Reset Password</h3>
											<div class="kt-login__desc">Enter your details to reset your password:</div>
										</div>
										<form class="kt-form reset-password">
											@csrf
											  <input type="hidden" name="token" value="{{ $token }}">
											<div class="input-group">
												<input id="email" class="form-control" type="text" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" autocomplete="off">
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
											
											<div class="kt-login__actions">
												<button id="reset_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">  {{ __('Reset Password') }}</button>&nbsp;&nbsp;
											</div>
										</form>
									</div>
							</div>
				</div>
			</div>
		</div>


