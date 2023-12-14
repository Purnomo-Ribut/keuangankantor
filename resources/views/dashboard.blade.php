@extends('layouts.master')

@section("addCss")
<link rel="stylesheet" href="{{asset('css/card.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="card light m-3 " style="width: 18rem;">
				<div class="card-header text-center">
				<i class="nav-icon fa fa-users"></i>
					<h5>Divisi</h5>
				</div>
				<div class="card-body" >
					<h5 class="card-text text-center">{{$dataDivisi}} Divisi</h5>
					<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				</div>
			</div>
			<div class="card light m-3 " style="width: 18rem;">
				<div class="card-header text-center">
				<i class="nav-icon fa fa-briefcase"></i>
					<h5>Role</h5>
				</div>
				<div class="card-body" >
					<h5 class="card-text text-center">{{$dataRole}} Role</h5>
					<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				</div>
			</div>
			<div class="card light m-3" style="width: 18rem;">
				<div class="card-header text-center">
				<i class="nav-icon fa fa-user"></i>
					<h5>User</h5>
				</div>
				<div class="card-body" >
					<h5 class="card-text text-center">{{$dataUser}} User</h5>
					<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				</div>
			</div>
			<div class="card light m-3" style="width: 18rem;">
				<div class="card-header text-center">
				<i class="nav-icon fa fa-money"></i>
					<h5>Kategori</h5>
				</div>
				<div class="card-body" >
					<h5 class="card-text text-center">{{$dataKategori}} Kategori</h5>
					<!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				</div>
			</div>

		</div>	
	</div><!-- /.container-fluid -->
</div>

<!--  -->
<div class="container">
	<div class="container-fluid">
		<div class="row justify-content-start">
			<div class="col-md-4 col-xl-3">
				<div class="card bg-c-blue order-card">
					<div class="card-block">
						<h4 class="m-b-20">Divisi</h4>
						<h1 class="text-right"><i class="fa fa-users f-left"></i><span>{{$dataDivisi}}</span></h1>
						<p class="m-b-0">Klik Lebih lanjut<span class="f-right">351</span></p>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 col-xl-3">
				<div class="card bg-c-green order-card">
					<div class="card-block">
						<h4 class="m-b-20">User</h4>
						<h1 class="text-right"><i class="fa fa-user f-left"></i><span>{{$dataUser}}</span></h1>
						<p class="m-b-0">Klik Lebih lanjut<span class="f-right">351</span></p>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 col-xl-3">
				<div class="card bg-c-yellow order-card">
					<div class="card-block">
						<h4 class="m-b-20">Role</h4>
						<h1 class="text-right"><i class="fa fa-briefcase f-left"></i><span>{{$dataRole}}</span></h1>
						<p class="m-b-0">Klik Lebih lanjut<span class="f-right">351</span></p>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 col-xl-3">
				<div class="card bg-c-pink order-card">
					<div class="card-block">
						<h4 class="m-b-20">Kategori</h4>
						<h1 class="text-right"><i class="fa fa-money f-left"></i><span>{{$dataKategori}}</span></h1>
						<p class="m-b-0">Klik Lebih lanjut<span class="f-right">351</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- /.content -->
@endsection