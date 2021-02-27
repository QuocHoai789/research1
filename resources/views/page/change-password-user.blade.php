@extends('master')
@section('content')
<div class="container">
	<div class="row p-t-30">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card ">
				<form class="p-t-30" method="post" action="{{route('post_changePasswordUser')}}">
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
				<div class="form-group row p-t-20 d-flex justify-content-center">
					
					<div class="col-sm-10 d-flex justify-content-center">
						<input type="password" style="width: 500px" placeholder="Nhập vào mật khẩu hiện tại" class="form-control " name="user_password" id="password" >
					</div>
				</div>
				<div class="form-group row  d-flex justify-content-center">
					
					<div class="col-sm-10 d-flex justify-content-center">
						<input type="password" style="width: 500px" placeholder="Nhập vào mật khẩu mới" class="form-control" name="new_user_password" id="new_password" >
					</div>
				</div>
				<div class="form-group row d-flex justify-content-center">
					
					<div class="col-sm-10  d-flex justify-content-center" >
						<input type="password" style="width: 500px" placeholder="Xác nhận lại mật khẩu mới" class="form-control" name="re_new_user_password" id="re_new_password" >
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12 d-flex justify-content-center">
						<button class="btn btn-danger m-2" style="width: 150px" id="turnback">Quay lại</button>
						<button class="btn btn-primary m-2" style="width: 150px" id="submit_new_user_password">Đổi mật khẩu</button>
					</div>
	
				</div>
				
			</form>
			</div>
			
			
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#turnback').on('click', function(e){
			event.preventDefault(e);
			window.location = "{{route('trangchu')}}";
		});
	})
</script>
@endsection