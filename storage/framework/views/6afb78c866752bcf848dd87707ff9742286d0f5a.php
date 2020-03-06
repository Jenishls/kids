					<div class="kt-login__forgot">
						<div class="kt-login__head">
							<h3 class="kt-login__title">Forgotten Passwords ?</h3>
							<div class="kt-login__desc">Enter your email to reset your password:</div>
						</div>
						<form method="" id="forgetPasswordForm" class="kt-form st-forget-form" >
							 <?php echo csrf_field(); ?>
							<div class="input-group">
								<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
							    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
				                    <span class="invalid-feedback" role="alert">
				                        <strong><?php echo e($message); ?></strong>
				                    </span>
				                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
							</div>
							<div class="kt-login__actions">
								<button  id="resetPasswordS" type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
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
<?php /**PATH D:\support\resources\views/support/pages/login/forgotpassword.blade.php ENDPATH**/ ?>