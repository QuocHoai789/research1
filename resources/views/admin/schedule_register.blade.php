@extends('master_admin')
@section('content_admin')
<link rel="stylesheet" href="assets_admin/vendor/datepicker/tempusdominus-bootstrap-4.css" />
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
    	 <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Đặt lịch đăng ký </h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đặt lịch đăng ký</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @if(Session::has('notice'))
        <div class="row">
        	<div class="col-12">
                <div class="card">
                <div class="alert alert-success alert-dismissible">{{ Session::get('notice') }}</div>
                </div>
            </div>
        </div>
            @endif
        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                	<h5 class="card-header">Đặt lịch đăng ký đề tài khoa học</h5>
                    <form method="post" action="{{ route('datlichdangkydetai') }}">
                    @csrf
                	<div class="card-body" id="product-cart">
                        <h4>Trạng thái: {{ status_date_time_register('date_start_register_topic','date_end_register_topic') }}</h4>
                        <h4>Thời gian: @if(date_time_register('date_start_register_topic')) <span class="text-success">{{ date_time_register('date_start_register_topic') }}</span> đến <span class="text-success">{{ date_time_register('date_end_register_topic') }}</span> @endif</h4>
                		<div class="row">
                                <div class="col-md-6">
                                <h5>Ngày mở</h5>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7" name="date_start_register_topic" required/>
                                        <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h5>Ngày đóng</h5>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8" name="date_end_register_topic" required/>
                                        <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                	<h5 class="card-header">Đặt lịch đăng ký biên soạn tài liệu giảng dạy</h5>
                    <form method="post" action="{{ route('datlichdangkytailieu') }}">
                    @csrf
                    <div class="card-body" id="product-cart">
                        <h4>Trạng thái: {{ status_date_time_register('date_start_register_doc','date_end_register_doc') }}</h4>
                        <h4>Thời gian: @if(date_time_register('date_start_register_doc')) <span class="text-success">{{ date_time_register('date_start_register_doc') }}</span> đến <span class="text-success">{{ date_time_register('date_end_register_doc') }}</span> @endif</h4>
                		<div class="row">
                                <div class="col-md-6">
                                <h5>Ngày mở</h5>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker7_1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7_1" name="date_start_register_doc" required/>
                                        <div class="input-group-append" data-target="#datetimepicker7_1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <h5>Ngày đóng</h5>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker8_1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8_1" name="date_end_register_doc" required/>
                                        <div class="input-group-append" data-target="#datetimepicker8_1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    	</div>
    </div>

<script src="assets_admin/vendor/datepicker/moment.js"></script>
<script src="assets_admin/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
<script src="assets_admin/vendor/datepicker/datepicker.js"></script>
@endsection


