
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
                    <h2 class="pageheader-title">Viết thông báo</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Viết thông báo</li>
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

                    <h5 class="card-header">Viết thông báo</h5>
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
                        <form method="post" action="{{ route('postthongbao') }}">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề thông báo</label>
                                <div class="col-sm-10">
                                  <textarea style="padding-left: 10px;" class="form-control " name="title" placeholder="Tiêu đề ..."  required>{{ old('title') }}</textarea>
                                </div>
                              </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung chi tiết</label>
                              <div class="col-sm-10">
                                <textarea style="padding-left: 10px;" class="form-control ckeditor " name="content" placeholder="Nội dung chi tiết..." required>{{ old('content') }}</textarea>
                              </div>
                            </div>
                        
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Đăng thông báo</button>
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
