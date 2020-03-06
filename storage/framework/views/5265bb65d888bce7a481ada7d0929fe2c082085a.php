<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<form class="kt-form user-registration">
									<?php echo csrf_field(); ?>
									<div class="input-group">
										<input id="name" class="form-control" type="text" placeholder="Fullname" name="name" value="<?php echo e(old('name')); ?>">
										 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($message); ?></strong>
		                                    </span>
		                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
									</div>
									<div class="input-group">
										<input id="email" class="form-control" type="text" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="off">
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
									<div class="input-group">
										<input id="username" class="form-control" type="text" placeholder="username" name="username" value="<?php echo e(old('username')); ?>" autocomplete="off">
										<?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($message); ?></strong>
		                                    </span>
		                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
									</div>
									<div class="input-group">
										<input id="password" class="form-control" type="password" placeholder="Password" name="password">
										<?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($message); ?></strong>
		                                    </span>
		                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
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
										<button id="user_registration" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div><?php /**PATH D:\support\resources\views/support/pages/login/signup.blade.php ENDPATH**/ ?>