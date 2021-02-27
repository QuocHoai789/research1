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
                        <h2 class="pageheader-title">Lịch sử thông báo</h2>
                        <p class="pageheader-text">.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"
                                            class="breadcrumb-link">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lịch sử thông báo</li>
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

                        <h5 class="card-header">Lịch sử thông báo</h5>
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
                                            <th scope="col">Người viết thông báo</th>
                                            <th scope="col">Tiêu đề thông báo</th>
                                            <th scope="col">Nội dung chi tiết</th>
                                            <th scope="col">Tình trạng</th>
                                            <th scope="col">Ngày viết thông báo</th>
                                            <th scope="col" class="text-center">Edit/xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($list_notice)
                                            @foreach ($list_notice as $key => $notice)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td scope="row">{{ user_notice($notice->id_user_notice) }}</td>
                                                    <td scope="row">{{ $notice->title }}</td>
                                                    <td scope="row">{!! $notice->content !!}</td>
                                                    <td scope="row"></td>

                                                    <td>{{ $notice->created_at }}</td>

                                                    <td class="text-center">

                                                        <a href="{{ route('chinhsuathongbao', $notice->id) }}">edit</a>
                                                        /<a href="{{ route('xoathongbao', $notice->id) }}"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không ?');">xóa</a>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endisset
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
