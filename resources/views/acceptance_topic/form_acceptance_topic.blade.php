<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Thẩm định nghiệm thu đề tài cấp trường </title>
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
                                                <p class="text-uppercase font-weight-bold title-page">PHIẾU ĐÁNH GIÁ
                                                    NGHIỆM THU
                                                    <br /> ĐỀ TÀI NGHIÊN CỨU KHOA HỌC CẤP TRƯỜNG
                                                </p>

                                            </div>

                                        </div>
                                        <div class="page-content font-110">



                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>1. Họ tên thành viên Hội đồng: </span>
                                                        <span class="font-weight-bold">
                                                            @isset($acceptance_topic->user->name)
                                                                {{ $acceptance_topic->user->name }}
                                                            @endisset
                                                        </span>
                                                    </p>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>2. Chức danh trong hội đồng: </span>
                                                        <span class="font-weight-bold">
                                                          @isset($acceptance_topic->position_council)
                                                            {{ position_evalute($acceptance_topic->position_council) }}
                                                            @endisset
                                                        </span>
                                                    </p>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>3. Cơ quan công tác: </span>
                                                        <span class="font-weight-bold">
                                                          @isset($acceptance_topic->user->work_unit_id)
                                                            {{ unit($acceptance_topic->user->work_unit_id) }}
                                                          @endisset
                                                           </span>
                                                    </p>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>4. Tên đề tài </span>
                                                        <span class="font-weight-bold">
                                                          @isset($topic->name_topic)
                                                           {{ $topic->name_topic }} 
                                                          @endisset
                                                          </span>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-20">
                                                        <span>Mã số đề tài: </span>
                                                        <span class="font-weight-bold">
                                                          @isset($topic->id)
                                                           {{ $topic->id }} 
                                                          @endisset
                                                          </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>5. Họ tên chủ nhiệm đề tài: </span>
                                                        <span
                                                            class="font-weight-bold">
                                                            @isset($topic->scientific_explanation_id)
                                                            {{ managerTopic($topic->scientific_explanation_id) }}
                                                            @endisset
                                                          </span>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>6. Cơ quan chủ trì đề tài: </span>
                                                        <span class="font-weight-bold">
                                                          @isset($topic->scientific_explanation_id)
                                                            {{ oganizationTopic($topic->scientific_explanation_id) }}
                                                          @endisset
                                                        </span>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>7. Ngày họp </span>
                                                        <span class="font-weight-bold"></span>
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>8. Địa điểm </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>9. Quyết định thành lập Hội đồng (số, ngày, tháng, năm)
                                                        </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>10. Ý kiến đánh giá của thành viên hội đồng: </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
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
                                                                <td rowspan="7" class="font-weight-bold">1</td>
                                                                <td class="font-weight-bold">Mức độ hoàn thành so với
                                                                    đăng ký trong Thuyết minh đề tài</td>
                                                                <td class="font-weight-bold">50</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Mục tiêu
                                                                </td>
                                                                <td>15</td>
                                                                <td>
                                                                  @isset($acceptance_topic->target)
                                                                  {{ $acceptance_topic->target }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Nội dung
                                                                </td>
                                                                <td>15</td>
                                                                <td>
                                                                  @isset($acceptance_topic->content)
                                                                  {{ $acceptance_topic->content }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Cách tiếp cận và phương pháp nghiên cứu

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->approach)
                                                                  {{ $acceptance_topic->approach }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm ứng dụng (loại sản phẩm ghi trong Thuyết
                                                                    minh đề tài)
                                                                <td>5</td>
                                                                </td>

                                                                <td>
                                                                  @isset($acceptance_topic->product_application)
                                                                  {{ $acceptance_topic->product_application }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm khoa học (sách chuyên khảo; bài báo khoa
                                                                    học, giáo trình,...)

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->scientific_products)
                                                                  {{ $acceptance_topic->scientific_products }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm đào tạo (hướng dẫn sinh viên, học viên cao
                                                                    học, NCS)

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->training_products)
                                                                  {{ $acceptance_topic->training_products }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="font-weight-bold">2</td>
                                                                <td class="font-weight-bold">Giá trị khoa học và ứng
                                                                    dụng của kết quả nghiên cứu</td>
                                                                <td class="font-weight-bold">10</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Giá trị khoa học (giá trị mới, phạm trù mới, phát
                                                                    hiện mới, công nghệ mới, vật liệu mới, sản phẩm
                                                                    mới):

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->scientific_value)
                                                                  {{ $acceptance_topic->scientific_value }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Giá trị ứng dụng (khai thác và triển khai ứng dụng
                                                                    công nghệ mới, quy trình mới, vật liệu, chế phẩm,
                                                                    giống mới,..)

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->application_value)
                                                                  {{ $acceptance_topic->application_value }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="4" class="font-weight-bold">3</td>
                                                                <td class="font-weight-bold">Hiệu quả nghiên cứu</td>
                                                                <td class="font-weight-bold">25</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Về giáo dục và đào tạo (đem lại tri thức mới trong
                                                                    nội dung bài giảng, trong chương trình đào tạo; công
                                                                    cụ, phương tiện mới trong giảng dạy, nâng cao năng
                                                                    lực nghiên cứu của những người tham gia, bổ sung
                                                                    trang thiết bị thí nghiệm, sách tham khảo,..)

                                                                </td>
                                                                <td>10</td>
                                                                <td>
                                                                  @isset($acceptance_topic->about_education_and_training)
                                                                  {{ $acceptance_topic->about_education_and_training }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Về kinh tế- xã hội (việc ứng dụng kết quả nghiên cứu
                                                                    tạo ra hiệu quả kinh tế, thay đổi công nghệ, bảo vệ
                                                                    môi trường, giải quyết những vấn đề xã hội,..)

                                                                </td>
                                                                <td>10</td>
                                                                <td>
                                                                  @isset($acceptance_topic->socio_economic)
                                                                  {{ $acceptance_topic->socio_economic }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Phương thức chuyển giao kết quả nghiên cứu và địa
                                                                    chỉ ứng dụng

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->transfer_method)
                                                                  {{ $acceptance_topic->transfer_method }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="3" class="font-weight-bold">4</td>

                                                                <td class="font-weight-bold">Các kết quả vượt trội

                                                                </td>
                                                                <td class="font-weight-bold">10</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Có đào tạo sinh viên, học viên cao học, nghiên cứu
                                                                    sinh

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->student_training)
                                                                  {{ $acceptance_topic->student_training }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td>Có bài báo khoa học đăng trên tạp chí trong nước,
                                                                    quốc tế (tạp chí được Hội đồng chức danh giáo sư Nhà
                                                                    nước công nhận tính điểm quy đổi)

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->scientific_article)
                                                                  {{ $acceptance_topic->scientific_article }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bold">5</td>
                                                                <td>Chất lượng báo cáo tổng kết và báo cáo tóm tắt đề
                                                                    tài (nội dung, hình thức, cấu trúc và phương pháp
                                                                    trình bày,...)

                                                                </td>
                                                                <td>5</td>
                                                                <td>
                                                                  @isset($acceptance_topic->report_quality)
                                                                  {{ $acceptance_topic->report_quality }}
                                                                  @endisset
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bold"></td>
                                                                <td class="font-weight-bold">Cộng

                                                                </td>
                                                                <td>100</td>
                                                                
                                                                <td>
                                                                  @isset($acceptance_topic->total)
                                                                  {{ $acceptance_topic->total }}
                                                                  @endisset
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12 p-t-10">
                                                    <p>
                                                        Ghi chú: - Xếp loại (theo điểm trung bình cuối cùng): Xuất sắc:
                                                        95-100 điểm; Tốt: 85-94 điểm; Khá: 70-84 điểm; Đạt 50 – 69 điểm;
                                                        không đạt: < 50 điểm. </p>
                                                </div>

                                            </div>

                                            <div class="row p-t-15">
                                                <div class="col-12">
                                                    <p>
                                                        <span>Ý kiến đóng góp :</span>
                                                        <span class="font-weight-bold">
                                                          @isset($acceptance_topic->opinion)
                                                            {{ $acceptance_topic->opinion }}
                                                          @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="row mt-5 pb-20 d-flex justify-content-end">
                                                <div class="col-4  ">
                                                    <p class="title-field-bold m-0 text-uppercase">Người đánh giá</p>
                                                    <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
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
