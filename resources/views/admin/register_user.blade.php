@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Đăng ký tài khoản</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <h5 class="card-header">Đăng ký tài khoản</h5>
                    {{-- <div class="d-flex justify-content-end align-items-center mt-2 mr-5 text-primary">New Product<a href="{{route('productadd_admin')}}"><i
                        class="fa-2x fas fa-plus-circle text-primary ml-2"></i></a>
                </div> --}}
                <div class="card-body" id="product-cart">
                    @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif
                    <div>
                        <form method="post" action="{{ route('dangkytaikhoan') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Mã giảng viên</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="msgv" placeholder="Mã giảng viên..." required  value="{{ old('msgv') }}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" placeholder="Mật khẩu..." required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu..." required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Họ và tên</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" placeholder="Họ và tên..."value="{{ old('name') }}" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone_number" placeholder="Số điện thoại..." value="{{ old('phone_number') }}">
                                </div>
                              </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Email..." required value="{{ old('email') }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Học vị:</label>
                              <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="degree">
                                  <option>--Chọn học vị--</option>
                                 <option value="1"  required>Kỹ sư</option>
                                 <option value="2"  required>Thạc sĩ </option>
                                 <option value="3"  required>Tiến sĩ</option>
                                 
                                
                               </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Đơn vị công tác:</label>
                              <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="work_unit_id">
                                  <option>--Chọn đơn vị công tác--</option>
                                  @foreach($list_unit as $unit)
                                 <option value="{{ $unit->id }}"  required>{{ $unit->unit_name }}</option>
                                 @endforeach
                               </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Thông tin thêm</label>
                              <div class="col-sm-10">
                                <textarea style="padding-left: 10px;" class="form-control " name="more_user_infor" placeholder="Thông tin thêm..." >{{ old('more_user_infor') }}</textarea>
                              </div>
                            </div>
                        
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                              </div>
                            </div>
                          </form>

                    </div>

                    <!-- ============================================================== -->
                    <!-- end recent orders  -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
