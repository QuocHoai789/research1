@extends('master_admin')
@section('content_admin')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row heade-topic">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Bảng danh sách đề tài cấp trường
                        </h2>
                        <p class="pageheader-text">.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"
                                            class="breadcrumb-link">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bảng danh sách đề tài cấp trường
                                    </li>
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

                        <h5 class="card-header">Bảng danh sách đề tài cấp trường

                        </h5>
                        {{-- <div
                            class="d-flex justify-content-end align-items-center mt-2 mr-5 text-primary">New Product<a
                                href="{{ route('productadd_admin') }}"><i
                                    class="fa-2x fas fa-plus-circle text-primary ml-2"></i></a></div>
                        --}}
                        <div class="card-body" id="product-cart">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên đề tài</th>
                                            <th scope="col">Người đăng ký</th>
                                            <th scope="col">Thể loại đề tài</th>
                                            <th scope="col" class="text-center">Thời gian đăng ký</th>
                                            <th scope="col" class="text-center">Tình trạng</th>
                                            <th scope="col" class="text-center">Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topic as $value)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $value->name_topic }}</td>
                                                <td>{{ $value->user->name }}</td>

                                                <td>
                                                    Đề tài cấp trường
                                                </td>
                                                <td class="text-center">{{ $value->created_at }}</td>
                                                <td class="text-center">

                                                    {{ statusTopic($value->status, $value->close, $value->notice_late) }}


                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('chitietdetai', $value->id) }}">
                                                        <i class="fas fa-info-circle">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div>
                                            {{-- {{ $topic->links() }} --}}
                                        </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });

    </script>

@endsection
