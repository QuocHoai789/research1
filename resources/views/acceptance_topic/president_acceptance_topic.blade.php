<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chủ tịch hội đồng thẩm định nghiệm thu biên soạn tài liệu giảng dạy - Phòng khoa học công nghệ - Nghiên cứu
        và phát triển</title>
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
                    alt="logo"></a><span class="h7">Chủ tịch hội đồng thẩm định nghiệm thu biên soạn tài liệu giảng
                dạy</span>
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
                                    <h5 class="mb-0  nav-user-name">{{ Auth::user()->name }}</h5>
                                @endif
                                <span class="status"></span><span class="ml-2">Đánh giá nghiệm thu đề tài cấp
                                    trường</span>
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
                                <h2 class="pageheader-title">Đề tài: </h2>
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
                                    <h3 class="modal-title  " id="exampleModalLabel">Chủ tịch hội đồng thẩm định nghiệm
                                        thu đề tài : </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('guinghiemthudetai', ['id' => $topic->id]) }}" method="post"
                                        name="">
                                        @csrf
                                        <input type="hidden" name="id_acceptance_topic"
                                            value="{{ $acceptance_topic->id }} ">
                                        <input type="hidden" name="id_user_acceptance"
                                            value=" {{ $acceptance_topic->id_user_acceptance }}">
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
                                                                <td><input id="num2" type="number" name="target"
                                                                        class="form-control score" max="15" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Nội dung
                                                                </td>
                                                                <td>15</td>
                                                                <td><input id="num3" type="number" name="content"
                                                                        class="form-control score" max="15" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Cách tiếp cận và phương pháp nghiên cứu

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="approach"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm ứng dụng (loại sản phẩm ghi trong Thuyết
                                                                    minh đề tài)
                                                                <td>5</td>
                                                                </td>

                                                                <td><input id="num4" type="number"
                                                                        name="product_application"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm khoa học (sách chuyên khảo; bài báo khoa
                                                                    học, giáo trình,...)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number"
                                                                        name="scientific_products"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Sản phẩm đào tạo (hướng dẫn sinh viên, học viên cao
                                                                    học, NCS)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number"
                                                                        name="training_products"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
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
                                                                <td><input id="num4" type="number"
                                                                        name="scientific_value"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>
                                                                    Giá trị ứng dụng (khai thác và triển khai ứng dụng
                                                                    công nghệ mới, quy trình mới, vật liệu, chế phẩm,
                                                                    giống mới,..)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number"
                                                                        name="application_value"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
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
                                                                <td><input id="num4" type="number"
                                                                        name="about_education_and_training"
                                                                        class="form-control score" max="10" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Về kinh tế- xã hội (việc ứng dụng kết quả nghiên cứu
                                                                    tạo ra hiệu quả kinh tế, thay đổi công nghệ, bảo vệ
                                                                    môi trường, giải quyết những vấn đề xã hội,..)

                                                                </td>
                                                                <td>10</td>
                                                                <td><input id="num4" type="number" name="socio_economic"
                                                                        class="form-control score" max="10" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Phương thức chuyển giao kết quả nghiên cứu và địa
                                                                    chỉ ứng dụng

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number"
                                                                        name="transfer_method"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
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
                                                                <td><input id="num4" type="number"
                                                                        name="student_training"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>

                                                                <td>Có bài báo khoa học đăng trên tạp chí trong nước,
                                                                    quốc tế (tạp chí được Hội đồng chức danh giáo sư Nhà
                                                                    nước công nhận tính điểm quy đổi)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number"
                                                                        name="scientific_article"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bold">5</td>
                                                                <td>Chất lượng báo cáo tổng kết và báo cáo tóm tắt đề
                                                                    tài (nội dung, hình thức, cấu trúc và phương pháp
                                                                    trình bày,...)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="report_quality"
                                                                        class="form-control score" max="5" min="0"
                                                                        required></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class=" font-weight-italic ">
                                                    Ghi chú: - Xếp loại (theo điểm trung bình cuối cùng): Xuất sắc:
                                                    95-100 điểm; Tốt: 85-94 điểm; Khá: 70-84 điểm; Đạt 50 – 69 điểm;
                                                    không đạt: < 50 điểm. </p>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>11. Ý kiến và kiến nghị khác của thành viên Hội đồng:</label>
                                                    <textarea name="opinion" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>

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
                                            <th class="text-center" scope="col" class="text-center">Thẩm định đề tài
                                            </th>
                                            <th class="text-center" scope="col" class="text-center">Tổng kết nghiệm thu
                                            </th>
                                            <th class="text-center" scope="col"
                                                class="text-center">Gửi kết quả tổng kết nghiệm thu</th>
  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"> {{ $topic->user->name }} </td>
                                            <td class="text-center">
                                                {{ typeTopic($topic->type_topic) }}
                                            </td>
                                            <td class="text-center">{{ $topic->created_at }}</td>
                                            <td class="text-center">
                                                {{ statusTopic($topic->status, $topic->close, $topic->notice_late) }}
                                            </td>
                                            <td class="text-center">
                                                @if ($acceptance_topic->status == 0)
                                                    <button class="btn btn-primary" data-toggle="modal"
                                                        data-target="#evaluate_topic">Thẩm định đề tài </button>
                                                @elseif($acceptance_topic->status == 1)
                                                    <a target="_blank"
                                                        href="{{ route('xemformnghiemthudetai', ['id' => $topic->id, 'id_acc' => $acceptance_topic->id]) }}">
                                                        <button class=" btn btn-success ">Xem form thẩm định</button>
                                                    </a>

                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if ($flag == 0)
                                                    <a target="_blank"
                                                        href="{{ route('formtongketthamdinhdetai', ['id' => $topic->id]) }}">
                                                        <button class="btn btn-primary">Tổng kết</button>
                                                    </a>
                                            </td>
                                            <td>
                                                @isset($topic->sumary_acc_id)
                                                <p class="badge-dot badge-success">Đã gửi biên bản họp đánh giá nghiệm thu</p>
                                                @else
                                                <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#summaryacceptopic">Gửi kết quả nghiệm thu</button>
                                                
                                                @endisset
                                            </td>
                                            @endif

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
            <div class="modal fade" id="summaryacceptopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-cancel-doc" method="post" action="{{ route('guitongketnghiemthudetai', $topic->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id_topic" name="id_topic" value="@isset($topic->id){{ $topic->id }} @endisset">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Gửi kết quả
                                    thẩm định nghiệm thu đề tài: </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {{-- <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" name="email" class="form-control" id="recipient-name" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Gửi kết quả nghiệm thu đề tài này
                                        ?</label>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary"> Gửi kết quả</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-cancel-doc" method="post" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="id_doc" name="id_doc" value="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-danger" id="exampleModalLabel">Hủy nghiệm
                                    thu đề tài: </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {{-- <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" name="email" class="form-control" id="recipient-name" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Không đồng ý nghiệm thu đề tài này
                                        ?</label>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-danger"> Hủy nghiệm thu</button>
                            </div>
                        </div>
                    </form>
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
