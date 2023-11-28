<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	{{-- link datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

	@yield('addCss')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<div class="wrapper">

		@include('layouts.navbar')
		@include('layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div>
		<!-- /.content-wrapper -->

		@include('layouts.footer')
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

	{{-- script dattables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

	<script>
		new DataTable('#dataTable');
	</script>

	@yield('addJavascript')
</body>

</html>