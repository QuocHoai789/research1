<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá biên soạn tài liệu giảng dạy - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
    <base href="{{ asset('') }}">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="cntt/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/util.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/main.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script src="lib/js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/general.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>



    <style type="text/css">
        .container {
            padding-top: 60px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            /* display: none;*/
            opacity: 0;
            /*top:-9999px;*/
        }




        .dashboard-wrapper {
            margin-left: 0px;
        }

        .dashboard-content {
            padding-bottom: 0px;
        }


        .edit-cont textarea {
            width: 456px;

        }
        }

    </style>
</head>

<body>

    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand"><img class="logo-img" width="50" src="cntt/images/icons/logo.png"
                    alt="logo"></a><span class="h7">Đánh giá biên soạn tài liệu giảng dạy</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                @if (Auth::check())
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                @endif
                                <span class="status"></span><span class="ml-2">Đánh giá tài liệu biên soạn</span>
                            </div>
                            <a class="dropdown-item" href=""><i class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="rev-slider">
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Tài liệu: {{ $doc->name_doc }} </h2>
                                <p class="pageheader-text">.</p>
                                {{-- <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a class="breadcrumb-link">Admin</a></li>
                                        </ol>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">


                    {{-- Modal Approval --}}
                    {{-- Modal Đánh giá đề tài --}}
                    <div class="modal fade " id="evaluate_topic" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h3 class="modal-title  " id="exampleModalLabel">Đánh giá tài liệu:
                                        {{ $doc->name_doc }} </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('evaluteoutside', ['id' => $outside->id]) }}" method="post"
                                        name="">
                                        @csrf
                                        {{-- <input type="hidden" name="id_outside"
                                            value="{{ $outside->id }}"> --}}
                                        <div class="row ">
                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <table class="table-custom">
                                                        <thead>
                                                            <tr>
                                                                <th class="w7">STT</th>
                                                                <th>Nội dung đánh giá</th>
                                                                <th style="width: 70px">Điểm tối đa</th>
                                                                <th style="width: 70px">Điểm đánh giá</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>1</td>
                                                                <td class="font-weight-bold">Cấu trúc giáo trình phù hợp
                                                                    với quy định</td>
                                                                <td>20</td>
                                                                <td><input id="num1" type="number"
                                                                        name="   curriculum_structure"
                                                                        class="form-control score" max="20" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Sự phù hợp với khung chương trình và chương trình
                                                                    chi tiết đối với ngành học.
                                                                    (So sánh với khung chương trình và đề cương chi tiết
                                                                </td>
                                                                <td>25</td>
                                                                <td><input id="num2" type="number" name="suitability"
                                                                        class="form-control score" max="25" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Tính cấp thiết của giáo trình đối với nhu cầu đào
                                                                    tạo của Nhà trường.
                                                                </td>
                                                                <td>35</td>
                                                                <td><input id="num3" type="number" name="urgency"
                                                                        class="form-control score" max="35" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Sự trùng lặp với các tài liệu tham khảo khác
                                                                    (So sánh nội dung TLGD nghiệm thu với
                                                                    các giáo trình, tài liệu tham khảo đã ban
                                                                    hành để đánh giá tính riêng, mức độ tổng
                                                                    hợp kiến thức của TLGD)

                                                                </td>
                                                                <td>20</td>
                                                                <td><input id="num4" type="number" name="duplication"
                                                                        class="form-control score" max="20" min="0"
                                                                        required></td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td></td>
                                                                <td>
                                                                    Cộng

                                                                </td>
                                                                <td>100</td>
                                                                <td id="total"></td>
                                                            </tr> --}}
                                                            {{-- <tr>
                                                                <td colspan="3">
                                                                    Xếp loại
                                                                    (Tốt : 80 điểm đến 100 điểm, Khá : 70 điểm đến dưới
                                                                    80 điểm ; Đạt: 50 điểm
                                                                </td>

                                                                <td></td>
                                                            </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>2. Các ý kiến đóng góp:</label>
                                                    <textarea name="opinion" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row p-l-20">
                                            <label>3. Kết luận:</label>
                                            <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                                <div class="form-check" style=" padding-left: 25px;">
                                                    <input class="form-check-input" type="radio" name="conclude"
                                                        id="ability_to_perform_1" value="1" required>
                                                    <label class="form-check-label" for="ability_to_perform_1">
                                                        Đồng ý thông qua đề cương (điểm đánh giá ≥ 80 điểm).
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                                <div class="form-check" style=" padding-left: 25px;">
                                                    <input class="form-check-input" type="radio" name="conclude"
                                                        id="ability_to_perform_2" value="2" required>
                                                    <label class="form-check-label" for="ability_to_perform_2">
                                                        Biên soạn lại
                                                    </label>
                                                </div>
                                            </div>

                                        </div> --}}


                                        {{-- <div class="row expen">


                                        </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary"
                                                {{-- data-dismiss="modal"
                                                --}}>Gửi Đánh giá</button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal --}}


                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ xét
                                    duyệt ({{ number_format(count($topic)) }})</b></h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">Người đăng ký</th>
                                            <th class="text-center" scope="col">Thể loại</th>
                                            {{-- <th scope="col">Thể loại</th>
                                            --}}
                                            <th class="text-center" scope="col" class="text-center">Thời gian đăng ký
                                            </th>
                                            <th class="text-center" scope="col" class="text-center">Tình trạng</th>
                                            <th class="text-center" scope="col" class="text-center">Đánh giá đề tài</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{ $doc->user->name }}</td>
                                            <td class="text-center">

                                                {{ typeDoc($doc->type_doc) }}

                                            </td>
                                            <td class="text-center">{{ $doc->created_at }}</td>
                                            <td class="text-center">
                                                {{ statusDoc($doc->status, $doc->close, $doc->notice_late) }}
                                            </td>
                                            <td class="text-center">
                                                @if ($outside->status == 0)
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#evaluate_topic">Đánh giá</button>
                                                @elseif($outside->status == 1)
                                                    <a
                                                        href="{{ route('formdanhgiatailieubiensoan', ['id' => $outside->id]) }}">
                                                        <button type="button" class="btn btn-success">Đã Đánh
                                                            giá</button>
                                                    </a>

                                                @endif

                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-12">
                        <div class="p-r-10 p-rl-0-sr991 p-b-20">
                            <div class="p-b-25">

                                @if (Session::has('flash_message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{ Session::get('flash_message') }}
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <strong>{{ $error }}</strong>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="p-t-15 page" id="page-download">
                                    <div class="row font-110">
                                        <div class="col-6 text-center">
                                            <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông
                                                vận tải
                                                <br /> thành phố hồ chí minh<br /><b>Khoa/viện ...</b>
                                            </p>
                                            <hr class="hr-short">
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa
                                                việt nam
                                            </p>
                                            <p class="font-weight-bold mb-1 ">Độc lập<span> - </span>Tự do<span> -
                                                </span>Hạnh
                                                phúc
                                            </p>
                                            <hr class="hr-short">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <p class="font-italic  mb-0 text-right" style="    padding-right: 80px;">
                                                Thành phố Hồ Chí Minh, ngày.... tháng... năm 20...</p>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p class="text-uppercase title-page">
                                                BẢN ĐĂNG KÝ ĐỀ CƯƠNG BIÊN SOẠN TÀI LIỆU GIẢNG DẠY<br />
                                                NĂM HỌC 20…. - 20….
                                            </p>
                                        </div>
                                    </div>
                                    <div class="page-content font-110">
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">Họ và tên: </span>
                                                    <span class="text-uppercase">{{ $doc->user->name }}</span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">Khoa/Viện: </span>
                                                    <span class="text-uppercase">
                                                        {{ unit($doc->user->work_unit_id) }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <p>
                                                    <span class="title-field-bold">Học vị:</span>
                                                    <span>{{ $degree->name }}</span>
                                                </p>

                                            </div>
                                            <div class="col-6">
                                                <p>
                                                    <span class="title-field-bold">Nước đào tạo: </span>
                                                    @isset($doc->registerdoc->national)
                                                    {{ $doc->registerdoc->national }}
                                                    @endisset
                                                </p>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Giấy công nhận Văn bằng do Cục Quản lý chất lượng - Bộ GDĐT cấp
                                                        (đối với Văn bằng đào tạo nước ngoài)
                                                    </span>
                                                    <span>
                                                        @isset($doc->registerdoc->recognition)
                                                        {{ recognition($doc->registerdoc->recognition) }}
                                                        @endisset
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Họ và tên thành viên tham gia: (nếu có)…
                                                    </span>
                                                    <span>
                                                        {{ implode(', ', $members) }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Đơn vị công tác: 
                                                    </span>
                                                    <span>
                                                        {{ unit($doc->user->work_unit_id) }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Tên tài liệu giảng dạy: 
                                                    </span>
                                                    <span>
                                                        {{ $doc->name_doc }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Thể loại: 
                                                    </span>
                                                    <span>
                                                        {{ typeDoc($doc->type_doc) }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Số tín chỉ: 
                                                    </span>
                                                    <span>
                                                        {{ $study->number_of_credits }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Số tiết: 
                                                    </span>
                                                    <span>
                                                        {{ $study->number_of_lessons }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Dự kiến số trang: 
                                                    </span>
                                                    <span>
                                                        {{ $doc->registerdoc->page_numbers }} trang
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Sử dụng cho môn học (học phần): 
                                                    </span>
                                                    <span>
                                                        {{ $study->name_term }}
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Đối tượng sử dụng: 
                                                    </span>
                                                    <span>
                                                        @if ($doc->registerdoc->objects_of_use == 1)
                                                            Đại học
                                                        @elseif($doc->registerdoc->objects_of_use == 2)
                                                            Sau đại học
                                                        @endif
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        Thời gian thực hiện: 
                                                    </span>
                                                    <span>
                                                        @isset($day)
                                                        {{ $day->begin }} đến {{ $day->finish }}@endisset
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        I. Nội dung
                                                    </span>

                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">1.Lời nói đầu </span>
                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->preface !!}
                                                </div>

                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">2.Mục lục </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->table_of_contents !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">3.Bảng ký hiệu </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->table_of_symbols !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">4.Bảng viết tắt </span>
                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->table_abbreviation !!}
                                                </div>

                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">5.Các chương của tài liệu giảng dạy
                                                    </span>
                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->chapters !!}
                                                </div>

                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">6.Đáp án </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->answer !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">7.Tài liệu tham khảo </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->references !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">8.Phụ lục </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->appendix !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">9.Bảng tra cứu thuật ngữ </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->glossary_of_terminology !!}
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="p-l-10">
                                                    <span class="title-field-bold">10.Từ khóa </span>

                                                <div style="padding-left: 20px">
                                                    {!! $doc->registerdoc->key_works !!}
                                                </div>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>
                                                    <span class="title-field-bold">
                                                        II. Mức độ khác biệt tài liệu biên soạn so với tài liệu khác:
                                                    </span>
                                                    <span>
                                                        @if ($doc->registerdoc->level_of_difference == 1)
                                                            Soạn mới 100%
                                                        @elseif($doc->registerdoc->level_of_difference == 2)
                                                            Trích dẫn tài liệu tham khảo > 50%
                                                        @elseif($doc->registerdoc->level_of_difference == 3)
                                                            Trích dẫn tài liệu tham khảo ≤ 50%
                                                        @endif
                                                    </span>

                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-5 pb-20">
                                            <div class="col-4 text-center pt4">
                                                <p class="title-field-bold m-0">TRƯỞNG KHOA/VIỆN </p>

                                            </div>
                                            <div class="col-4 text-center pt4">
                                                <p class="title-field-bold m-0">TRƯỞNG BỘ MÔN </p>

                                            </div>
                                            <div class="col-4 text-center pt4">
                                                <p class="title-field-bold m-0">CHỦ BIÊN </p>

                                            </div>

                                        </div>
                                        <div class="row pb-20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end recent orders  -->



            <!-- ============================================================== -->
            <!-- end sales traffice country public/source  -->
            <!-- ============================================================== -->
        </div>
    </div>
    </div>
    </div>
    </div> <!-- .container -->

    <script type="text/javascript">
        $(document).ready(function() {
            // <span class="fa fa-star "></span>
            $('.fa-star').on('click', function() {
                $(this).addClass('checked');

            });

            $('#expense_input').hide();

            $('#expense2').on('click', function() {
                $('#expense_input').show();
            });
            $('#expense1').on('click', function() {
                $('#expense_input').hide();
            });
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('name')
                var id_topic = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('Chấp nhận đề tài: ' + recipient)
                modal.find('#id_topic').val(id_topic)
            });

            $("form-approval-topic").submit(function() {
                //aler('success')
            });
        });

        $(document).ready(function() {
            //       var total = 0 ;
            //       //total = $('#num1').val() + $('#num2').val() + $('#num3').val() + $('#num4').val();
            // $('.score').on('change', function(){

            //           total += parseInt(this.value);


            //          alert(total);
            //       } );
        });

    </script>
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->


</body>

</html>
