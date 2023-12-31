<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('img/app-logo.png') }}"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<link rel="icon" type="image/png" href="{{ asset('img/app-logo.png') }}"/>
	
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- dashboard3 AdminLTE chart-->
	<link rel="stylesheet" href="{{asset('css/Chart.css')}}">

	@yield('addCss')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse p-0">
	<div class="wrapper">

		@include('direktur.layouts.navbar')
		@include('direktur.layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div>
		<!-- /.content-wrapper -->

		@include('direktur.layouts.footer')
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('js/adminlte.min.js')}}"></script>
	<!-- Sweetalert -->
	<script src="{{asset('js/sweetalert.min.js')}}"></script>

	@yield('addJavascript')
</body>

</html>