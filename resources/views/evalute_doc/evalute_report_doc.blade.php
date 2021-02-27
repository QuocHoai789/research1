<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Xét duyệt đăng ký tài liệu </title>
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

    <script src="lib/js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/general.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <style type="text/css">
        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .title-field-bold {
            font-weight: 600 !important;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        li,
        ul {
            margin: 0;
            list-style-type: none;
        }

        .title-field {
            font-weight: 500 !important;
            padding-right: 10px;
        }

        .table-custom {
            width: 100%;
            border: 1px solid black;
        }

        .table-custom tr,
        .table-custom tbody tr td,
        .table-custom thead tr th {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        @media(max-width:500px) {

            .page {
                font-size: 35%;
            }

            .card-body {
                font-size: 8px;
            }

            .logo-img {
                display: none;
            }

            .button-menu-top {
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:501px) and (max-width:1023px) {
            .page {
                font-size: 52%;
            }

            .card-body {
                font-size: 8px;
            }

            .logo-img {
                display: none;
            }

            .button-menu-top {
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:1024px) {
            .page {
                font-size: 100%;
            }

        }

        .page {
            margin: 0px auto;
            width: 80%;
            font-family: "Times New Roman";
            border: 1px solid #ccc;

        }

        .hr-short {
            width: 45%;
            margin: 0px 0px 0px 28%;
            color: #080707;
            border: 0.5px solid;
        }

        .page-content {
            width: 80%;
            margin: 0px auto;
        }

        .page-content1 {
            width: 90%;
            margin: 0px auto;
        }

        .til {
            padding-top: 15px;
        }

        /*.tils{

                padding-left: 100px;
        }*/
        .dashboard-wrapper {
            margin-left: 0px;
        }

        .dashboard-content {
            padding-bottom: 0px;
        }

    </style>
</head>

<body>
    <div class="rev-slider">
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
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
                                                <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải
                                                </p>
                                                <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao
                                                    thông vận tải
                                                    <br />tp.hồ chí minh
                                                </p>
                                                <hr class="hr-short">
                                            </div>
                                            <div class="col-6 text-center">
                                                <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ
                                                    nghĩa việt nam
                                                </p>
                                                <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> -
                                                    </span>Hạnh
                                                    phúc
                                                </p>
                                                <hr class="hr-short">
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-12 text-center">
                                                <p class="text-uppercase font-weight-bold title-page">BIÊN BẢN HỌP HỘI
                                                    ĐỒNG <br />
                                                    ĐÁNH GIÁ ĐỀ CƯƠNG CHI TIẾT TÀI LIỆU GIẢNG DẠY

                                                </p>

                                            </div>

                                        </div>
                                        <div class="page-content font-110">

                                            <div class="row">
                                                <div class="col-12 font-weight-bold">
                                                    I. Thông tin tài liệu giảng dạy:
                                                </div>

                                            </div>

                                            <div class="row p-t-15">
                                                <div class="col-12 ">
                                                    <p>
                                                        <span> 1. Tên tài liệu giảng dạy: </span>
                                                        <span class="font-weight-bold">{{ $doc->name_doc }}</span>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 2. Thể loại: </span>
                                                        <span
                                                            class="font-weight-bold">{{ typeDoc($doc->type_doc) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 3. Tác giả (Nhóm tác giả): </span>
                                                        <span class="font-weight-bold">
                                                            {{ $doc->user->name }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 4. Sử dụng cho môn học (học phần): </span>
                                                        <span class="font-weight-bold">{{ $study->name_term }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>
                                                        <span> 5. Số tín chỉ:</span>
                                                        <span
                                                            class="font-weight-bold">{{ $study->number_of_credits }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p>
                                                        <span> - Số tiết:</span>
                                                        <span
                                                            class="font-weight-bold">{{ $study->number_of_lessons }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 6. Trình độ sử dụng:</span>
                                                        <span class="font-weight-bold">
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
                                                <div class="col-12 font-weight-bold">
                                                    <p>
                                                        <span>II. Ngày họp hội đồng:</span>
                                                        <span></span>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 font-weight-bold">
                                                    <p>
                                                        <span>
                                                            III. Địa điểm:
                                                        </span>
                                                        <span></span>
                                                    </p>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 font-weight-bold">
                                                    <p>

                                                        IV. Thành phần hội đồng đánh giá:

                                                    </p>

                                                </div>
                                                <div class="col-12">
                                                    <table class="table-custom">
                                                        <thead>
                                                            <tr>
                                                                <th class="w7">STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Đơn vị CT</th>
                                                                <th>Chức danh hội đồng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($evalute_doc as $eval)
                                                                <tr>
                                                                    <td></td>
                                                                    <td>{{ $eval->user->name }}</td>
                                                                    <td>{{ unit($eval->user->work_unit_id) }}</td>
                                                                    <td>

                                                                        {{ position_evalute($eval['position_council']) }}

                                                                    </td>

                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td></td>
                                                                <td>{{ $outside_doc->name }}</td>
                                                                <td></td>
                                                                <td>
                                                                    Ủy viên, phản biện 2
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 font-weight-bold">
                                                    <p>

                                                        V. Nội dung đánh giá:

                                                    </p>

                                                </div>
                                                <div class="col-12">
                                                    <table class="table-custom">
                                                        <thead>
                                                            <tr>
                                                                <th class="w7">STT</th>
                                                                <th>Nội dung đánh giá</th>
                                                                <th style="width: 70px">Điểm tối đa</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Cấu trúc giáo trình phù hợp với quy định</td>
                                                                <td>20</td>

                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Sự phù hợp với khung chương trình và chương trình
                                                                    chi tiết đối với ngành học.
                                                                    (So sánh với khung chương trình và đề cương chi tiết
                                                                    môn học)
                                                                </td>
                                                                <td>25</td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Tính cấp thiết của giáo trình đối với nhu cầu đào
                                                                    tạo của Nhà trường.</td>
                                                                <td>35</td>

                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Sự trùng lặp với các tài liệu tham khảo khác
                                                                    (So sánh nội dung TLGD nghiệm thu với các giáo
                                                                    trình, tài liệu tham khảo đã ban hành để đánh giá
                                                                    tính riêng, mức độ tổng hợp kiến thức của TLGD).
                                                                </td>
                                                                <td>20</td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">TỔNG CỘNG</td>
                                                                <td>100</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="row p-t-10">
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span class="font-weight-bold"> Xếp loại: </span><span
                                                            class="font-weight-bold">Tốt: </span> 80 điểm đến 100 điểm,
                                                        <span class="font-weight-bold">Khá: </span> 70 điểm đến dưới 80
                                                        điểm, <span class="font-weight-bold">Đạt:</span> 50 điểm đến
                                                        dưới 70 điểm ;<span class="font-weight-bold">Không đạt: </span>
                                                        dưới 50 điểm
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="font-weight-bold">
                                                        VI. Những ý kiến đóng góp của hội đồng
                                                    </p>
                                                    <p class="p-l-20">
                                                        @foreach ($evalute_doc as $eva)
                                                            <span class="font-weight-bold">-
                                                                {{ $eva->opinion }}</span><br />
                                                        @endforeach

                                                        <span class="font-weight-bold">-
                                                            {{ $outside_doc->opinion }}</span><br />
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="font-weight-bold">
                                                        VII. Kết quả đánh giá của Hội đồng:
                                                    </p>
                                                    <p class="p-l-15">1. Kết quả đánh giá và bỏ phiếu của Hội đồng</p>
                                                    <p class="p-l-25"> Hội đồng tiến hành bỏ phiếu, kết quả kiểm phiếu
                                                        như sau</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="p-l-25">Tổng số phiếu phát ra: phiếu</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="p-l-15">- Tổng số phiếu thu vào:……phiếu</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="p-l-25">Số phiếu hợp lệ:…………. phiếu</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="p-l-15">- Số phiếu không hợp lệ:……phiếu</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">Điểm số</p>
                                                    <table class="table-custom">
                                                        <thead>
                                                            <th>Phiếu số</th>
                                                            <th>CT HĐ</th>
                                                            <th>UVPB1</th>
                                                            <th>UVPB2</th>
                                                            <th>UV</th>
                                                            <th>UV TKHĐ</th>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <td class="font-weight-bold">{{ $score['president'] }}
                                                                </td>
                                                                <td class="font-weight-bold">{{ $score['pb1'] }}</td>
                                                                <td class="font-weight-bold">{{ $score['pb2'] }}</td>
                                                                <td class="font-weight-bold">{{ $score['uv'] }}</td>
                                                                <td class="font-weight-bold">{{ $score['tk'] }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="p-l-15 ">Trung bình điểm số: <span
                                                            class="font-weight-bold">{{ $avg_score }}</span> </p>
                                                    <p>2. Kết luận của Chủ tịch Hội đồng:</p>
                                                    <p class="p-l-15"><span>a. Về kết quả bỏ phiếu:</span>
                                                        <span class="font-weight-bold">
                                                            @if ($avg_score >= 80)
                                                                Đồng ý thông qua đề cương (điểm trung bình ≥ 80 điểm).
                                                            @else
                                                                Biên soạn lại
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <p class="p-l-15">b. Ý kiến của Hội đồng về những nội dung cần sửa
                                                        chữa (ghi rõ nội dung, chương mục cần sửa chữa):</p>
                                                </div>
                                            </div>


                                            <div class="row mt-5 pb-20 ">
                                                <div class="col-6  ">
                                                    <p class="title-field-bold m-0">Chủ tịch Hội đồng </p>
                                                    <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                                </div>
                                                <div class="col-6  ">
                                                    <p class=" float-right">
                                                      <span class="title-field-bold">
                                                        Thư ký Hội đồng
                                                      </span>
                                                       <br/>
                                                      <i>(Ký tên, ghi rõ họ tên)</i>
                                                    </p>
                                                    {{-- <p class="float-right"></p> --}}
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

            </div>
        </div>
    </div>

</body>

</html>
