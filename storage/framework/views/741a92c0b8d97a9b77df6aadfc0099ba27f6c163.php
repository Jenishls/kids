<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">
		<!--end::Base Path -->
		<meta charset="utf-8" />
	  

	  <title><?php echo e(default_company_name()); ?></title>

		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
		
		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script> 
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGY6SZ-_t886-Vkw9RtnZfUbjpLi_ntKw&libraries=places"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Asap+Condensed:500"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->
		<link rel="stylesheet" href ="supportNew/css/all.css">
		<link rel="stylesheet" href ="supportNew/css/sass.css">
		<style>
			.action-menu{
			    position: absolute;
			    background-color: #e8f8ff;
			    padding: 3px;
			    border: 1px solid #fff;
			    border-radius: 64px;
			    z-index: 9;
			    transform: translateY(-8px);
			}
			.quickActionList{
				z-index: 3;
			}
			.action-menu ul:after{
				content: "";
			    position: absolute;
			    right: 40%;
			    bottom: -10px;
			    width: 0;
			    height: 0;
			    border-top: 3px solid transparent;
			    border-right: 16px solid #e8f8ff;
			    transform: rotate(270deg);
			    border-bottom: 13px solid transparent;
			    z-index: 0;
			}
			.action-menu ul{
				margin:0;
				list-style: none;
				display: flex;
				padding: 0;
			}
		</style>
		
		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?php echo e(default_fav_icon()?:"media/logos/favicon.ico"); ?>" />

	</head>
	<!-- end::Head --><?php /**PATH D:\support\resources\views/supportNew/pages/dashboard/inc/doctype.blade.php ENDPATH**/ ?>