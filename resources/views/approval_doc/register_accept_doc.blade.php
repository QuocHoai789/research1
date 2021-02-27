<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Thành lập hội đồng nghiệm thu biên soạn tài liệu giảng dạy</title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <style type="text/css">
        select.error {
            border-color: red;
            background-color: #FFCCCC;
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
            padding: 25px;
            margin: 0px auto;
            width: 80%;
            font-family: "Times New Roman";
            border: 1px solid #ccc;
            margin-bottom: 50px;
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
    <div class="dashboard-header ">

        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{ route('admin') }}"><img class="logo-img" width="50"
                    src="cntt/images/icons/logo.png" alt="logo"></a><span class="h7">Lập hội đồng nghiệm thu tài
                liệu</span>
            <button class="navbar-toggler collapsed button-menu-top" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i style="color:#71748d ;" class="fa fa-angle-down"
                        aria-hidden="true"></i></span>
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
                                <span class="status"></span><span class="ml-2">Xét duyệt tài liệu</span>
                            </div>
                            <a class="dropdown-item" href="{{ route('logoutapproval') }}"><i
                                    class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
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
                    <div class="row " style="padding-top: 20px;">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Tài liệu:{{ $doc->name_doc }} </h2>
                                <p class="pageheader-text">.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">


                    {{-- Modal Approval --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="form-approval-doc" method="post" action="{{ route('duyettailieu') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="id_doc" name="id_doc">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel">
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input type="email" name="email" class="form-control" id="recipient-name"
                                                required>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Tin nhắn:</label>
                                            <textarea class="form-control" name="message" id="message-text"
                                                required></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Duyệt</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end Modal --}}


                    <div class="modal fade" id="listgreedcouncil" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            {{-- <form id="form-approval-doc" method="post" action="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="id_doc" name="id_doc"> --}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel">
                                            Danh sách thành viên hội đồng nghiệm thu </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="w7">STT</th>
                                                    <th>Họ và tên</th>
                                                    <th>Chức vụ hội đồng</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($list_greed)
                                                    @foreach ($list_greed as $key => $greed)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $greed }}</td>
                                                            <td>

                                                                @if ($key == 'president')
                                                                    Chủ tịch hội đồng
                                                                @elseif($key == 'uv')
                                                                    Ủy viên
                                                                @elseif($key == 'pb1')
                                                                    Ủy viên, phản biện 1
                                                                @elseif($key == 'pb2')
                                                                    Ủy viên, phản biện 2
                                                                @elseif($key == 'tk')
                                                                    Uỷ viên, Thư ký hội đồng
                                                                @endif




                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endisset


                                            </tbody>
                                        </table>

                                        {{-- <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input type="email" name="email" class="form-control" id="recipient-name"
                                                required>
                                        </div> --}}


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Đóng</button>

                                    </div>
                                </div>
                                {{--
                            </form> --}}
                        </div>
                    </div>




                    {{-- Modal Cancel --}}


                    <div class="modal fade" id="sendgreedcouncil" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form id="form-send-approval" method="post"
                                action="{{ route('guithanhlapnghiemthutailieu',$doc->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="id_doc" name="id_doc" value="{{ $doc->id }}">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="recipient-name" class="font-weight-bold col-form-label">Chủ tịch
                                                hội đồng:</label>

                                            <select id="select_state1" name="council[president]"
                                                class="form-control choose_mail" required>
                                                <option selected>Chọn chủ tịch hội đồng...</option>
                                                @foreach ($users as $u)
                                                @if($u->id != $doc->user->id)
                                                    <option value="{{ $u->name }}">{{ $u->name }} - {{ $u->email }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="font-weight-bold col-form-label">Ủy
                                                viên:</label>

                                            <select id="select_state1" name="council[uv]"
                                                class="form-control choose_mail" required>
                                                <option selected>Chọn ủy viên...</option>
                                                @foreach ($users as $u)
                                                @if($u->id != $doc->user->id)
                                                    <option value="{{ $u->name }}">{{ $u->name }} - {{ $u->email }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="font-weight-bold col-form-label">Ủy viên,
                                                phản biện 1:</label>

                                            <select id="select_state2" name="council[pb1]"
                                                class="form-control  choose_mail" required>
                                                <option selected>Chọn ủy viên phản biện 1...</option>
                                                @foreach ($users as $u)
                                                @if($u->id != $doc->user->id)
                                                    <option value="{{ $u->name }}">{{ $u->name }} - {{ $u->email }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="font-weight-bold col-form-label">Ủy viên,
                                                phản biện 2:</label>
                                            <select id="select_state2" name="council[pb2]"
                                                class="form-control  choose_mail" required>
                                                <option selected>Chọn ủy viên phản biện 2...</option>
                                                @foreach ($users as $u)
                                                @if($u->id != $doc->user->id)
                                                    <option value="{{ $u->name }}">{{ $u->name }} - {{ $u->email }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label for="recipient-name" class="font-weight-bold col-form-label">Ủy viên,
                                                Thư ký hội đồng:</label>
                                            <select id="select_state4" name="council[tk]"
                                                class="form-control choose_mail" required>
                                                <option selected>Chọn ủy viên, thư ký hội đồng...</option>
                                                @foreach ($users as $u)
                                                @if($u->id != $doc->user->id)
                                                    <option value="{{ $u->name }}">{{ $u->name }} - {{ $u->email }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="font-weight-bold col-form-label">Tin
                                                nhắn:</label>
                                            <textarea class="form-control" name="message" id="message-text"
                                                required></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Gửi </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end Modal --}}
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ
                                        xét duyệt ({{ number_format(count($doc)) }})</b></h4>
                                --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Tên tài liệu </th>
                                                <th scope="col" class="text-center">Người đăng ký</th>
                                                <th scope="col" class="text-center">Đối tượng sử dụng</th>
                                                {{-- <th scope="col">Thể loại</th>
                                                --}}
                                                <th scope="col" class="text-center">Thời gian đăng ký</th>
                                                {{-- <th scope="col" class="text-center">
                                                    Form đăng ký</th> --}}

                                                <th scope="col" class="text-center">Tình trạng</th>

                                                <th scope="col" class="text-center">Đề xuất hội đồng nghiệm thu</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"> {{ $doc->name_doc }}</td>
                                                <td class="text-center">{{ $doc->user->name }}</td>
                                                <td class="text-center">
                                                    @if ($doc->registerdoc->objects_of_use == 1)
                                                        Đại học

                                                    @elseif($doc->registerdoc->objects_of_use==2)
                                                        Sau đại học
                                                    @endif
                                                </td>

                                                {{-- <td>
                                                    {{ statusDoc($doc->status, $doc->close, $doc->notice_late) }}
                                                </td> --}}


                                                <td class="text-center">{{ $doc->created_at }}</td>
                                                {{-- <td class="text-center"><a
                                                        class="text-primary"
                                                        href="{{ route('xemdetai', $doc->id) }}">(Tải về)</a></td>
                                                --}}
                                                <td class="text-center">
                                                    {{ statusDoc($doc->status, $doc->close, $doc->notice_late) }}
                                                </td>





                                                <td class="text-center">
                                                    @if ($doc->registerdoc->greed_council == null)
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#sendgreedcouncil"
                                                            data-id="{{ $doc->id }}"
                                                            data-name="{{ $doc->name_doc }}">Giới thiệu hội đồng nghiệm
                                                            thu</button>
                                                    @else
                                                        <button type="button" class="btn btn-success"
                                                            data-toggle="modal" data-target="#listgreedcouncil"
                                                            data-id="{{ $doc->id }}" data-name="{{ $doc->name_doc }}">
                                                            Danh sách hội đồng nghiệm thu tài liệu
                                                        </button>

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
    {{-- </div>
    </div> --}}
    <!-- .container -->
    <script type="text/javascript">
        $(".multi-tag").select2({

            maximumSelectionLength: 3,

        })

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('name')
                var id_doc = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('Duyệt tài liệu: ' + recipient)
                modal.find('#id_doc').val(id_doc)
            });

            $("form-approval-doc").submit(function() {
                //aler('success')
            });
        });

        $(document).ready(function() {
            $('#exampleModal1').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('name')
                var id_doc = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('Hủy tài liệu: ' + recipient)
                modal.find('#id_doc').val(id_doc)
            });

            $("form-cancel-doc").submit(function() {
                //aler('success')
            });
        });
        $(document).ready(function() {

            $("select").change(function() {
                checkSelects();

            });

            function checkSelects() {
                var $elements = $('select');
                var dem = 0;
                var i;
                $elements.removeClass('error').each(function() {
                    var selectedValue = this.value;

                    $elements.not(this).filter(function() {
                        console.log([this.value, selectedValue]);
                        return this.value == selectedValue;
                    }).addClass('error');


                });


            }


            $('#sendgreedcouncil').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('name')
                var id_doc = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('Giới thiệu hội đồng thẩm định: ' + recipient)
                modal.find('#id_doc').val(id_doc)
            });




        });

    </script>
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>


</body>

</html>
