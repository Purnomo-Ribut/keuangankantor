@extends('layouts.master')

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
					<li class="breadcrumb-item active">Divisi</li>
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
				<a href="{{route('createtbl_divisi')}}" class="btn btn-primary" role="button">Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-hover mb-0" id="dataTable">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Divisi</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($divisis as $divisi)
						<tr>
							<td class="text-center">{{ $loop->index + 1}}</td>
							<td class="text-center">{{ $divisi->nama_divisi}}</td>
							<td class="text-center">
								<a href="{{route('edittbl_divisi',['id_divisi'=>$divisi->id_divisi])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
								<a class="btn btn-danger btn-sm ml-1" role="button">Hapus</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection