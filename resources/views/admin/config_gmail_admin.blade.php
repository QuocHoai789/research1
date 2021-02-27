@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Cấu hình gmail admin</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cấu hình gmail admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        		<div class="card p-t-20" >

        			<form action="{{ route('cauhinhgmailadmin') }}" method="post">
        				@csrf
        				<h3 class="text-center">Cấu hình gmail admin</h3>
        				@if ($errors->any())
        				<div class="alert alert-danger">
        					<ul>
        						@foreach ($errors->all() as $error)
        						<li>{{ $error }}</li>
        						@endforeach
        					</ul>
        				</div>
                        @endif
                        @if (Session::has('danger'))
        				<div class="alert alert-danger">
        					<ul>
        						<li>{{ Session::get('danger') }}</li>
        					</ul>
        				</div>
                        @endif
                        @if (Session::has('success'))
        				<div class="alert alert-success">
        					<ul>
        						<li>{{ Session::get('success') }}</li>
        					</ul>
        				</div>
                        @endif
                        <div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="text">MAIL_MAILER</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="text" class="form-control" name="mail_mailer" @if($mail_mailer!='')  value="{{$mail_mailer}}"  @endif required>
        					</div>

                        </div>
                        <div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="text">MAIL_HOST</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="text" class="form-control" name="mail_host" @if($mail_host!='')  value="{{$mail_host}}"  @endif required>
        					</div>
                        </div>
                        <div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="text">MAIL_PORT</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="number" min="0" class="form-control" name="mail_port"  @if($mail_port!='')  value="{{$mail_port}}"  @endif required>
        					</div>
                        </div>
                        <div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="text">MAIL_ENCRYPTION</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="text" class="form-control" name="mail_encryption"  @if($mail_encryption!='')  value="{{$mail_encryption}}"  @endif required>
        					</div>
        				</div>
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="text">Nhập gmail admin</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="email" class="form-control" name="email" id="email" @if($user_name_gmail!='')  value="{{$user_name_gmail}}"  @endif required>
        					</div>

        				</div>
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="password">Nhập mật khẩu (Nên sử dụng mật khẩu ứng dụng do gmail cung cấp)</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="password" class="form-control" name="password" id="password" required>
        					</div>

        				</div>
        				<div class="row ">
        					<div class="col-md-12 d-flex justify-content-center">
        						<button class="btn btn-primary m-2" style="width: 150px" id="submit_new_user_password">Cập nhật</button>
        					</div>

        				</div>


        			</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
