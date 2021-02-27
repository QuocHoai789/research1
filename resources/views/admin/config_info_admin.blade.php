@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Cập nhật thông tin chung</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin chung</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        		<div class="card p-t-20" >

        			<form action="{{ route('capnhatluongcoban') }}" method="post">
        				@csrf
        				<h3 class="text-center">Lương cơ bản</h3>
        				@if ($errors->any())
        				<div class="alert alert-danger">
        					<ul>
        						@foreach ($errors->all() as $error)
        						<li>{{ $error }}</li>
        						@endforeach
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
        						<label for="text">Nhập lương cơ bản</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="number" class="form-control" name="basic_salary" id="basic_salary" @if($basic_salary!='')  value="{{$basic_salary}}"  @endif required>
        					</div>

        				</div>
        				<div class="row ">
        					<div class="col-md-12 d-flex justify-content-center">
        						<button class="btn btn-primary m-2" style="width: 150px" id="submit_new_user_password">Cập nhật lương cơ bản</button>
        					</div>

        				</div>


        			</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
