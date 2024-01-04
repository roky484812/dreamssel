<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/auth_layout/css/auth.css') }}">
	<title>Sign in & Sign up Form</title>
</head>
<body>

    @yield('content')

	<script src="{{ asset('assets/auth_layout/js/auth.js') }}"></script>
	@yield('custom_js')
</body>
</html>