a
<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>

		<meta charset="utf-8" />
		<title>{{default_company_name()}}</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

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
		
		<link rel="stylesheet" href ="{{mix('/css/all.css')}}">

		

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{default_fav_icon()?:"media/logos/favicon.ico"}}" />

	</head>