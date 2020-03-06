a
<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>

		<meta charset="utf-8" />
		<title><?php echo e(default_company_name()); ?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		
		<link rel="stylesheet" href ="<?php echo e(mix('/css/all.css')); ?>">

		

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?php echo e(default_fav_icon()?:"media/logos/favicon.ico"); ?>" />

	</head><?php /**PATH D:\support\resources\views/support/doctype.blade.php ENDPATH**/ ?>