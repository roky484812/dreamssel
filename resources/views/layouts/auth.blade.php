<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:title" content="Dreamssel Ecommerce Login">
    <meta property="og:description" content="For your fashion dream">
    <meta property="og:image" content="{{ asset('assets/admin/images/brand/white_single_logo.svg') }}">
    <meta property="og:url" content="https://dreamssel.com/">
    <meta property="og:type" content="Ecommerce">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<!--Favicon -->
	<link rel="icon" href="{{ asset('assets/admin/images/brand/white_single_logo.svg') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/auth_layout/css/auth.css') }}">
	<title>Sign in & Sign up Form</title>
	<style>
		.text-danger{
			color:red;
		}
		.invalid_feedback{
			color: red;
		}
	</style>
</head>
<body>

    @yield('content')

	<script src="{{ asset('assets/auth_layout/js/auth.js') }}"></script>
	@yield('custom_js')
</body>
</html>