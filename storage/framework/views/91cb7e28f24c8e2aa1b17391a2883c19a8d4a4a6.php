<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(./assets/media//bg/bg-3.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container" style="background-color: white; padding:20px;">
							<div class="kt-login__logo" style="padding-top:10px;">
								<a href="#">
								
								<img style="width: 120px; padding-top:10px;" src="/<?php echo e(default_login_icon()?:"cratesoskates/images/cratesOnSkatesLogo.png"); ?>">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head" style="display:none">
									<h3 class="kt-login__title">Sign In To Admin</h3>
								</div>
								
								<form id="supportLoginForm" class="kt-form" method="" action>
									  <?php echo csrf_field(); ?>
									<div class="input-group">
									  <input id="login" type="text" name="email" class="form-control <?php echo e($errors->has('username') || $errors->has('email') ? ' is-invalid' : ''); ?>" name="login" value="<?php echo e(old('username') ?: old('email')); ?>" required  autofocus placeholder="Email/Username">
								        <?php if($errors->has('username') || $errors->has('email')): ?>
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong><?php echo e($errors->first('username') ?: $errors->first('email')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
									</div>
									<div class="input-group">
										<input id="user_password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" placeholder="Password">
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
									<div class="row kt-login__extra">
										<div class="col">

											<label class="kt-checkbox">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
												<input type="checkbox" name="remember">   <?php echo e(__('Remember Me')); ?>

												<span></span>
											</label>
										</div>
										<div class="col kt-align-right">
										
                                    
                              			<?php if(Route::has('password.request')): ?>
											<a  href="<?php echo e(route('password.request')); ?>" id="kt_login_forgot" class="kt-login__link"><?php echo e(__('Forgot Your Password?')); ?></a>
											  <?php endif; ?>
										</div>
									</div>
									<div class="kt-login__actions">
											<button type="submit"  class="btn btn-brand btn-elevate kt-login__btn-primary login_signup_submit2">Sign In Login</button>
									</div>
								</form>
							</div><?php /**PATH D:\support\resources\views/support/pages/login/signin.blade.php ENDPATH**/ ?>