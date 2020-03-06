	<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form method="POST" class="kt-form st-forget-form" >
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
		