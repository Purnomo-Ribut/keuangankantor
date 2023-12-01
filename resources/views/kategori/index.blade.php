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
				<h1 class="m-0 text-dark">Daftar Kategori</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Kategori</li>
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
				<a href="{{route('createKategori')}}" class="btn btn-primary" role="button">Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-hover mb-0" id="dataTable">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Kategori</th>
							<th class="text-center">Jenis</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($kategoris as $kategori)
						<tr>
							<td class="text-center">{{ $loop->index + 1}}</td>
							<td class="text-center">{{ $kategori->nama_kategori}}</td>
							<td class="text-center">{{ $kategori->jenis_kategori}}</td>
							<td class="text-center">
								<a href="{{route('editKategori',['id_kategori'=>$kategori->id_kategori])}}" class="btn btn-warning btn-sm " role="button">Edit</a>
								<a onclick="confirmDelete(this)"  data-url="{{route('deleteKategori',['id_kategori'=>$kategori->id_kategori])}}" data-nama="{{$kategori->nama_kategori}}" class="btn btn-danger btn-sm ml-1 text-white" role="button">Hapus</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
	@section("addJavascript")
		<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('js/sweetalert.min.js')}}"></script>
		<script>
			confirmDelete = function(button){
			var url = $(button).data("url");
			var nama =$(button).data("nama");
			swal({
				"title" 	 : "Konfirmasi Hapus",
				"text" 		 : "Apakah anda yakin menghapus Divisi "+ nama + "?",
				"dangermode" : true,
				"buttons" 	 : true,
			}).then(function(value){
				if(value){
					window.location = url;
				}
			})
		}

		$(function(){
			$("#dataTable").DataTable();
		});
		</script>
	@endsection
</div>
<!-- /.content -->
@endsection