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
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"
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
                        {{-- <div
                            class="d-flex justify-content-end align-items-center mt-2 mr-5 text-primary">New Product<a
                                href="{{ route('productadd_admin') }}"><i
                                    class="fa-2x fas fa-plus-circle text-primary ml-2"></i></a>
                        </div> --}}
                        <div class="card-body" id="product-cart">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên giảng viên</th>
                                            <th scope="col">Mã số giảng viên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Thông tin thêm</th>
                                            <th scope="col">Học vị</th>
                                            <th scope="col">Đơn vị công tác</th>
                                            <th scope="col">Ngày đăng ký</th>
                                            <th scope="col" class="text-center">Edit/xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $value)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->msgv }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone_number }}</td>
                                                <td>
                                                    @isset($value->more_user_information)
                                                        {{ $value->more_user_information }}
                                                    @endisset
                                                </td>
                                                <td>{{ degreeName($value->degree) }}</td>
                                                @if (isset($value->workunit->unit_name))
                                                    <td>{{ $value->workunit->unit_name }}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>{{ $value->created_at }}</td>

                                                <td class="text-center">

                                                    <a href="{{ route('edit-user', ['id' => $value->id]) }}">edit</a>/<a
                                                        href="{{ route('delete-user', ['id' => $value->id]) }}"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không ?');">xóa</a>

                                                </td>



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>
@endsection
