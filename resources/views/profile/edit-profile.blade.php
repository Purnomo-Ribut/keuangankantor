@extends('layouts.master')
@section("addCss")
	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
      <h4 class="font-weight-bold">
      Account settings
    </h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="container light-style flex-grow-1 container-p-y">

    <!-- <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4> -->
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            @foreach ($profiles as $profile)
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="{{ route('editProfile', $profile->id)}}#account-general">General</a>
            @endforeach
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

            <div class="card-body media align-items-center">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                  </div>
                  <div class="col-md-6 d-flex align-items-center">
                    <label class="btn btn-outline-primary">
                      Upload Foto
                      <input type="file" class="account-settings-fileinput" style="display: none;">
                    </label>
                    <button type="button" class="btn btn-default md-btn-flat ml-2">Reset</button>
                  </div>
                    <div class="text-light small ml-3">Allowed JPG, GIF, or PNG. Max size of 800K</div>
                </div>
              </form>
            </div>
              <hr class="border-light m-0">

              <div class="card-body">
                @foreach ($profiles as $profile)
                <form action="{{ route('updateProfile',$profile->id) }}" method="post">
                  @csrf
                    <div class="form-group">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" value="{{$profile->nama}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Alamat</label>
                      <textarea class="form-control" rows="5" name="alamat" id="alamat">{{ $profile->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                    <label class="form-label">No.Telepon</label>
                    <input type="integer" class="form-control" name="nomor_telepon" id="nomor_telepon"  value="{{$profile->nomor_telepon}}">
                  </div>
                  @endforeach
                  <div class="text-right mb-5 mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>

                </form>

              </div>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <form action="">
                  <div class="form-group">
                    <label class="form-label">Current password</label>
                    <input type="password" class="form-control">
                  </div>
  
                  <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type="password" class="form-control">
                  </div>
  
                  <div class="form-group">
                    <label class="form-label">Repeat new password</label>
                    <input type="password" class="form-control">
                  </div>

                  <div class="text-right mb-5 mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>

@endsection