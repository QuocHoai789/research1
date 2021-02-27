@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Cập nhật mật khẩu</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cập nhật mật khẩu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        		<div class="card" >

        			<form action="{{route('post_changepassword', ['id'=>$id])}}" method="post">
        				@csrf
        				<h3 class="text-center">Cập nhật mật khẩu</h3>
        				@if ($errors->any())
        				<div class="alert alert-danger">
        					<ul>
        						@foreach ($errors->all() as $error)
        						<li>{{ $error }}</li>
        						@endforeach
        					</ul>
        				</div>
        				@endif
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="password">Nhập mật khẩu hiện tại</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="password" class="form-control" name="password" id="password" required>
        					</div>

        				</div>
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="newpassword">Nhập mật khẩu mới</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="password" class="form-control" name="newpassword" id="newpassword" required>
        					</div>

        				</div>
        				<div class="form-group">
        					<div class="d-flex justify-content-center">
        						<label for="newpassword1">Xác nhận lại mật khẩu mới</label>
        					</div>

        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" name="re_newpassword" type="password" class="form-control"  id="newpassword1" required>
        					</div>
        				</div>
        				<div class="row ">
        					<div class="col-md-12 d-flex justify-content-center">
        						<button class="btn btn-danger m-2" style="width: 150px" id="turnback">Quay lại</button>
        						<button class="btn btn-primary m-2" style="width: 150px" id="submit_new_user_password">Cập nhật</button>
        					</div>

        				</div>


        			</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#turnback').on('click', function(e){
			event.preventDefault(e);
			window.location = "{{route('danhsachtaikhoan')}}";
		});
	});
</script>
@endsection
