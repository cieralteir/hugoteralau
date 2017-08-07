<!DOCTYPE html>
<html>
	<head>
		<title> Hugotera Lau </title>

		<meta charset = "utf-8">
	    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	    <meta name = "viewport" content = "width = device-width, initial-scale = 1">

	    <link rel = "icon" href = "{{ asset('images/default-profile.jpg') }}"/>

	    <!-- CSRF Token -->
   	 	<meta name = "csrf-token" content="{{ csrf_token() }}">

   	 	<!-- Styles -->
    	<link href = "/css/app.css" rel = "stylesheet">

    	<!-- Bootstrap css -->
    	<link href = "{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    	<!-- Own CSS -->
    	<link href = "{{ asset('css/hugoteralau.css') }}" rel="stylesheet" />

    	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
	</head>
	<body>
		<div class = "container" style = "text-align: center">
			
			@if (Auth::check())
                <form action = "{{ url('/logout') }}" method = "POST">
                    {{ csrf_field() }}
                    <input style = "margin-top: 10px" class = "btn btn-custom" type = "submit" value = "Logout">
                </form>
			@endif

			<div class = "row">
				<div class = "col-lg-12">
					<img src = "{{ asset('images/default-profile.jpg') }}" class = "profile img-circle img-thumbnail">
				</div>
			</div>

			<h3> HugoteraLau </h3>
			<h4> #PostAnything </h4>

			<div class = "row">
				<div class = "col-sm-3">
				</div>

				<div class = "col-sm-6">
					@yield('content')
				</div>

				<div class = "col-sm-3">
				</div>
			</div>

			<div class = "row">
				<div class = "col-sm-2">
				</div>

				<div class = "col-sm-8">
					<div class = "well">
						Developed by cieralteir
					</div>
				</div>

				<div class = "col-sm-2">
				</div>
			</div>
		</div>
	</body>
</html>