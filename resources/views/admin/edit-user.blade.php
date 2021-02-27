@extends('master_admin')
@section('content_admin')

<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-header">
					<h2 class="pageheader-title">Cập nhật thông tin người dùng</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin người dùng</li>
                            </ol>
                        </nav>
                    </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        		<div class="card" >
        			<form action="{{route('post_edit_user',['id'=>$user->id])}}" method="post">
        				@csrf
        				<h3 class="text-center">Cập nhật thông tin người dùng</h3>
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
        						<label for="name">Cập nhật tên người dùng</label>
        					</div>
        					
        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="text" class="form-control" name="new_username" id="name" value="{{$user->name}}">
        					</div>
        					
        				</div>
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="usermail">Cập nhật email mới</label>
        					</div>
        					
        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" type="text" class="form-control" name="new_usermail" id="usermail" value="{{$user->email}}">
        					</div>
        					
        				</div>
        				<div class="form-group">
        					<div class="d-flex justify-content-center">
        						<label for="userphone">Cập nhật lại số điện thoại mới</label>
        					</div>
        					
        					<div class="d-flex justify-content-center">
        						<input style="width: 400px" name="new_userphone" type="text" class="form-control"  id="userphone" value="{{$user->phone_number}}">
        					</div>
        				</div>
        				<div class="form-group ">
        					<div class="d-flex justify-content-center">
        						<label for="userinfor">Cập nhật lại thông tin mô tả khác</label>
        					</div>
        				<div class="d-flex justify-content-center">
        					<textarea class="form-control" name="new_more_information" id="new_more_information" style="width: 400px;height: 80px ; border: 1px solid #49505745" placeholder="Thêm thông tin khác">{{$user->more_user_information}}</textarea> 
        				</div>
						
					
        				</div>
        				<div class="form-group ">
                            <div class="d-flex justify-content-center">
                                <label for="userinfor">Cập nhật lại đơn vị công tác</label>
                            </div>
                        <div class="d-flex justify-content-center">
                           <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="new_work_unit_id" style="width: 400px">
                                  @foreach($list_unit as $unit)
                                 <option value="{{ $unit->id }}" @if(isset($user->workunit->id) && $user->workunit->id == $unit->id) selected @endif  required>{{ $unit->unit_name }}</option>
                                 @endforeach
                               </select>
                        </div>
						</div>
						<div class="form-group ">
                            <div class="d-flex justify-content-center">
                                <label for="userinfor">Cập nhật lại học vị</label>
                            </div>
                        <div class="d-flex justify-content-center">
                           <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="new_degree" style="width: 400px">
                                  
								 <option value="1"   @if(isset($user->degree) && $user->degree == 1) selected @endif required>Kỹ sư</option>
								 <option value="2"  @if(isset($user->degree) && $user->degree == 2) selected @endif required>Thạc sĩ</option>
								 <option value="3"  @if(isset($user->degree) && $user->degree == 3) selected @endif required>Tiến sĩ</option>
								 
                                 
                               </select>
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