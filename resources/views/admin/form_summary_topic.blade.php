<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Biên bản họp thẩm định nghiệm thu tài liệu </title>
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
                                                <p class="text-uppercase font-weight-bold title-page">
                                                    BIÊN BẢN HỌP <br />
                                                    HỘI ĐỒNG ĐÁNH GIÁ NGHIỆM THU ĐỀ TÀI NGHIÊN CỨU KHOA HỌC<br />
                                                    CẤP TRƯỜNG, NĂM HỌC 20.. – 20…

                                                </p>

                                            </div>

                                        </div>
                                        <div class="page-content font-110">

                                            <div class="row">

                                            </div>

                                            <div class="row p-t-15">
                                                <div class="col-12 ">
                                                    <p>
                                                        <span> 1. Tên đề tài: </span>
                                                        <span class="font-weight-bold">{{ $topic->name_topic }}</span>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 2. Mã số: </span>
                                                        <span class="font-weight-bold">{{ $topic->id }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 3. Chủ nhiệm đề tài: </span>
                                                        <span class="font-weight-bold">
                                                            {{ managerTopic($topic->scientific_explanation_id) }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 4. Đơn vị chủ trì đề tài: </span>
                                                        <span class="font-weight-bold">
                                                            {{ oganizationTopic($topic->scientific_explanation_id) }}
                                                        </span>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span>
                                                            5. Quyết định thành lập Hội đồng:
                                                            …………………………………………………………………………
                                                        </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span> 6. Ngày họp:
                                                            ………………………………………………………………………………………………..</span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>7. Địa điểm:
                                                            ………………………………………………………………………………………………...</span>

                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <span> 8. Thành viên Hội đồng: Tổng số:...............Có
                                                            mặt:.......................Vắng mặt:…………………………...... </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span> 9. Khách mời dự: ……………….(có danh sách kèm theo)</span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span> 10. Tổng số điểm:
                                                            ………………………………………………………………………………………….</span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span> 11. Tổng số đầu điểm: …….. trong đó: - Hợp lệ: ………….. -
                                                            Không hợp lệ: ………………...................</span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>12. Điểm trung bình ban
                                                            đầu:…………………………………………………………………………….... </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>13. Tổng số điểm hợp
                                                            lệ:……………………………………………………………………………........... </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>14. Điểm trung bình cuối
                                                            cùng:……………………………………………………………………………. </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>15. Kết luận và kiến nghị của hội đồng: </span>

                                                    </p>
                                                    <p class="p-l-15">
                                                        <span>15.1. Giá trị về khoa học và ứng dụng: </span>



                                                    </p>

                                                    <p class="p-l-30">
                                                        <span>a) Giá trị khoa học:…………………………………………………………………………………...
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>b) Giá trị ứng dụng:…………………………………………………………………………………..
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span>15.2. Hiệu quả nghiên cứu </span>

                                                    </p>
                                                    <p class="p-l-30">
                                                        <span>a) Về giáo dục và đào tạo:………………………………………………………………………………
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>b) Về kinh tế - xã hội:…………………………………………………………………………….……
                                                        </span>
                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span> 15.3. Những nội dung cần sửa chữa, bổ sung, hoàn chỉnh
                                                            hay làm rõ </span>

                                                    </p>
                                                    <p class="p-l-30">
                                                        <span>a) Mục tiêu:…………………………………………………………………………….…… </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>b) Nội dung …………………………………………………………………………….…… </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>c) Cách tiếp cận và phương pháp nghiên
                                                            cứu:……………………………………..................……… </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>d) Sản phẩm khoa học:…………………………………………………………………………….……
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>e) Sản phẩm đào tạo:…………………………………………………………………………….……
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>f) Sản phẩm ứng dụng:…………………………………………………………………………….……
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                    <p class="p-l-30">
                                                        <span>g) Giá trị khoa học:…………………………………………………………………………….……
                                                        </span>

                                                    </p>
                                                    <p class="p-l-30">
                                                        <span>h) Giá trị ứng dụng:…………………………………………………………………………….……
                                                        </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span> 15.4. Ý kiến khác: </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>

                                                    <p>…………………………………………………………………………….……………………………….</p>

                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>16. Xếp loại </span>

                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15 font-weight-bold" style="font-style: italic"> Ghi chú</p>
                                                    <p class="p-l-15" style="font-size: 14px">
                                                        <b>• Xuất sắc:</b> Đạt tổng số điểm từ 90 đến 100 điểm, trong đó
                                                        tổng số điểm các nội dung nêu tại khoản 1, 2, 3 phải đạt 60 điểm
                                                        và có được một trong các kết quả sau:
                                                        <br />
                                                        + Có ít nhất 01 bài báo đăng ở Tạp chí khoa học chuyên ngành
                                                        trong nước, ngoài nước (hoặc có giấy xác nhận về số và thời gian
                                                        đăng của Tạp chí);<br />
                                                        + Có kết quả đào tạo Thạc sỹ, Tiến sỹ;<br />
                                                        + Có ít nhất 01 sách được xuất bản (hoặc có giấy xác nhận về bản
                                                        thảo được chấp thuận in và thời gian in của Nhà xuất bản).<br />
                                                        + Có sản phẩm vượt mức chất lượng, yêu cầu khoa học so với Hợp
                                                        đồng, có ý nghĩa lớn về khoa học, công nghệ và kinh tế - xã
                                                        hội<br />
                                                        <b> • Khá:</b> Đạt tổng số điểm từ 75 đến dưới 90 điểm, trong đó tổng số
                                                        điểm các nội dung nêu tại khoản 1, 2, 3 phải đạt từ 50 điểm trở
                                                        lên.<br />
                                                        <b>• Trung bình:</b> Đạt tổng số điểm từ 60 đến dưới 75 điểm trong đó
                                                        tổng số điểm các nội dung nêu tại khoản 1, 2, 3 phải đạt từ 50
                                                        điểm trở lên.<br />
                                                        <b>• Không đạt:</b> Khi có tổng số điểm đạt dưới 60 điểm; hoặc khi có
                                                        tổng số điểm của nội dung nêu tại khoản 1, 2, 3 đạt dưới 50
                                                        điểm.<br />

                                                    </p>

                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>17. Những nội dung không phù hợp với thuyết minh đề tài
                                                            (nếu đề tài được đánh giá ở mức “Không đạt”) </span>

                                                    </p>
                                                    <p>…………………………………………………………………………….……………………………….</p>
                                                </div>
                                                <div class="col-12">
                                                    <p>
                                                        <span>18. Kiểm tra các nội dung cần chỉnh sửa, bổ sung trong báo
                                                            cáo:</span>

                                                    </p>
                                                    <p class="p-l-25">
                                                        + Thư ký Hội đồng:…….………………………………………………………………………….....
                                                    </p>
                                                    <p class="p-l-25">
                                                        + Thành viên khác trong Hội đồng (ghi rõ họ tên)…….………….…………………………………
                                                    </p>
                                                </div>
                                            </div>



                                            <div class="row mt-5  ">
                                                <div class="col-6  ">
                                                    <p class="title-field-bold m-0">Chủ tịch Hội đồng </p>
                                                    <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                                </div>
                                                <div class="col-6  ">
                                                    <p class="title-field-bold ">Thư ký Hội đồng</p>
                                                    <p class=""><i>(Ký tên, ghi rõ họ tên)</i></p>
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
