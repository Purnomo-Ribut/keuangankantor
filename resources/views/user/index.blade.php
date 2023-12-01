@extends('layouts.master')
<!-- css -->
@section("addCss")
	<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap4.min.css')}}">
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
				<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">User</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
	<div class="card">
			<div class="card-header text-right">
				<a href="{{route('createUser')}}" class="btn btn-primary" role="button">Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-hover mb-0" id="dataTable">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jabatan</th>
							<th class="text-center">Divisi</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td class="text-center">{{ $loop->index + 1}}</td>
							<td class="text-center">{{ $user->nama}}</td>
							<td class="text-center">{{ $user->role}}</td>
							<td class="text-center">{{ $user->tbl_divisis ? $user->tbl_divisis->nama_divisi : '-'}}</td>
							<td class="text-center">
								<a href="" class="btn btn-warning btn-sm" role="button">Edit</a>
								<a onclick="confirmDelete(this)"  data-url=""data-nama="" class="btn btn-danger btn-sm ml-1 text-white" role="button">Hapus</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
		<!-- javascript -->
		@section("addJavascript")
		<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('js/sweetalert.min.js')}}"></script>
		<script>
			// confirmDelete = function(button){
			// 	var url = $(button).data("url");
			// 	var nama =$(button).data("nama");
			// 	swal({
			// 		"title" 	 : "Konfirmasi Hapus",
			// 		"text" 		 : "Apakah anda yakin menghapus Divisi "+ nama + "?",
			// 		"dangermode" : true,
			// 		"buttons" 	 : true,
			// 	}).then(function(value){
			// 		if(value){
			// 			window.location = url;
			// 		}
			// 	})
			// }

			// fungsi data table
			$(function(){
				$("#dataTable").DataTable();
			});
		</script>
		@endsection
</div>
<!-- /.content -->
@endsection
