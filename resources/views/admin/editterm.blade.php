@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">
		<div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Cập nhật học phần biên soạn</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cập nhật học phần biên soạn</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('flash_message'))
                            <div class="alert alert-danger">{{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        @endif
        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        		<div class="card" >

        		<form action="{{ route('capnhathocphan',['id' => $term->id]) }}" method="post" style="padding: 10px;">
        				@csrf
        				<h3 class="text-center">Cập nhật học phần biên soạn</h3>
        				<div class="form-group">
        					<label class="">Mã học phần</label>
        					<input class="form-control" type="text" name="term_id" value="{{ $term->term_id }}" required>
        				</div>
        				<div class="form-group">
        					<label class="">Tên học phần</label>
        					<input class="form-control" type="text" name="name_tern"
                            value="{{ $term->name_term }}" required>
        				</div>
        				<div class="form-group">
        					<label class=""> Số tín chỉ</label>
        					<input class="form-control" type="number" name="number_of_credit" min="1" max="5" value="{{ $term->number_of_credits }}" required>
        				</div>
        				<div class="form-group">
        					<label> Số tiết</label>
        					<input class="form-control" type="number" name="number_of_lessons" min="15" value="{{ $term->number_of_lessons }}" required>
        				 </div>
        				 <div class="form-group float-right">
        				 	<button type="button" class="btn btn-danger">Hủy</button>
        				 	<button class="btn btn-primary">Cập nhật học phần</button>
        				 	
        				 </div>
        				
        		</form>
        	</div>
        	</div>
        	
        </div>

	</div>
</div>
@endsection