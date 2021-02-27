@extends('master')
@section('content')
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">


    <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload file nghiệm thu tài liệu biên soạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('nghiemthutailieu', ['id' => $doc->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 1</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file1"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file pdf</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 2</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file2"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file pdf</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadFileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload file tài liệu đã chỉnh sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('uploadtailieuchinhsua', ['id' => $doc->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 1</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file1"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file pdf</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 2</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file2"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file pdf</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="post bg0 p-t-50">
        <div class="container">
            <div class="row justify-content-center" style="display: unset">
                <!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
                <div class="col-md-10 col-lg-12">

                    <div class="p-r-10 p-rl-0-sr991 p-b-20">

                        <!-- Entertainment  -->
                        <div class="p-b-25">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Tài liệu biên soạn
                                </h3>
                            </div>
                            @if (Session::has('flag_error'))
                                <div class="alert alert-danger w-100">{{ Session::get('flag_error') }}</div>
                            @endif
                            @if (Session::has('flag_success'))
                                <div class="alert alert-success w-100">{{ Session::get('flag_success') }}</div>
                            @endif
                            <div class="flex-wr-sb-s p-t-15">
                                <section class="cd-timeline js-cd-timeline">
                                    <div class="cd-timeline__container">
                                        <!-- 1 -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                                <img class="color-white" src="assets/images/one.png" alt="Picture">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Đăng ký biên soạn tài liệu</h3>
                                                <a target="_blank" href="{{ route('dangkytailieu', $doc->id) }}">
                                                    <button type="button" class="btn btn-primary">Form đăng ký đề cương biên
                                                        soạn</button>
                                                </a>
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->

                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 1) }} js-cd-img">
                                                <img src="assets/images/two.png" alt="Picture">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Xét duyệt đề cương</h3>
                                                @if ($doc->close == 2)
                                                    <p class="text-danger">Đã hủy xét duyệt</p>
                                                @endif
                                                @if ($doc->status == 1 && $doc->close != 2 && !isset($doc->summary_outline_id))
                                                    <p class="text-warning">Đang chờ xét duyệt</p>
                                                @elseif($doc->status > 1 || $doc->status == 1 &&
                                                    isset($doc->summary_outline_id))
                                                    {{-- --}}
                                                    <p class="text-success">Đã xét duyệt</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>

                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 2) }} js-cd-img">
                                                <img src="assets/images/three.png" alt="Picture">
                                            </div>
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thực hiện biên soạn
                                                </h3>
                                                @if ($doc->status == 2)
                                                    <p class="text-warning">Đang thực hiện biên soạn</p>
                                                @elseif($doc->status>2)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 3) }} js-cd-img">
                                                <img src="assets/images/four.png" alt="Picture">
                                            </div>
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Kiểm tra tiến độ</h3>

                                                @if ($doc->status == 3 && $doc->notice_late == 1 && !isset($doc->document_extension_id))
                                                    <p class="text-danger">Bạn đã trễ hạn thực hiện biên soạn</p>
                                                    <div>
                                                        <a href="{{ route('giahantailieubaigiang', $doc->id) }}"><button
                                                                class="btn btn-info">Gia hạn biên soạn TLGD </button></a>
                                                        <a class="p-l-10"
                                                            href="{{ route('huytailieubaigiang', $doc->id) }}"><button
                                                                class="btn btn-danger">Hủy biên soạn TLGD </button></a>
                                                    </div>
                                                @elseif($doc->status == 3 && $doc->notice_late==1 &&
                                                    isset($doc->document_extension_id))
                                                    <p class="text-warning">Đã đăng ký gia hạn</p><a target="_blank"
                                                        href="{{ route('formgiahantailieubaigiang', $doc->id) }}">
                                                        <button class="btn btn-primary">Form gia hạn</button>
                                                    </a>

                                                @elseif($doc->status == 3 && !isset($doc->deploy_report))
                                                    <p class="text-warning">Đang kiểm tra tiến độ</p>
                                                @elseif($doc->status == 3 && isset($doc->deploy_report) &&
                                                    !isset($doc->notice_report))
                                                    <p class="text-info">Tiến độ hoàn thành đã báo cáo:
                                                        {{ $doc->deploy_report }} %
                                                    </p>
                                                @elseif($doc->status == 3 && isset($doc->deploy_report) &&
                                                    $doc->notice_report == 1)
                                                    <p class="text-info">Tiến độ hoàn thành đã báo cáo:
                                                        {{ $doc->deploy_report }} %
                                                    </p>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#deployReport2">
                                                        Báo cáo tiến độ lần 2
                                                    </button>
                                                @elseif($doc->status == 3 && isset($doc->deploy_report) &&
                                                    $doc->notice_report == 2)
                                                    <p class="text-info">Tiến độ hoàn thành đã báo cáo:
                                                        {{ $doc->deploy_report }} %
                                                    </p>

                                                @elseif($doc->status > 3)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                                @if ($doc->status == 3 && !isset($doc->deploy_report) && $doc->notice_late != 1)
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#deployReport">
                                                        Báo cáo tiến độ
                                                    </button>
                                                @elseif($doc->status > 3)
                                                    <p class="text-success">Đã báo cáo tiến độ</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 4) }} js-cd-img">
                                                <img src="assets/images/five.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Nghiệm thu tài liệu biên soạn</h3>

                                                @if ($doc->status == 4 && empty($doc->acceptance))
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#uploadFile">
                                                        Upload file
                                                    </button>
                                                @elseif($doc->status == 4 && !empty($doc->acceptance))
                                                    <p class="text-success">Đã nộp file</p>
                                                    @foreach ($acceptance as $key => $item)
                                                        <a
                                                            href="{{ route('downloadfilenghiemthutailieu', [$doc->id, $key]) }}">
                                                            {{-- <button type="button"
                                                                class="btn btn-primary"> --}}
                                                                <p style="font-size:16px">
                                                                    <span>File {{ ++$key }} :</span>
                                                                    <span
                                                                        class="text-primary">{{ $item['filename'] }}</span>
                                                                </p>
                                                                {{--
                                                            </button> --}}

                                                        </a>
                                                    @endforeach
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#uploadFile">
                                                        Chỉnh sửa file
                                                    </button>
                                                @elseif ($doc->status > 4)

                                                    <p class="text-success">Đã hoàn thành</p>
                                                    <a class="btn btn-primary" target="_blank"
                                                        href="{{ route('xemnghiemthutailieu', ['slug' => $doc->slug_doc]) }}">

                                                        Biên bản nghiệm thu tài liệu
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 5) }} js-cd-img">
                                                <img src="assets/images/six.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thanh lý tài liệu biên soạn</h3>
                                                @if ($doc->status == 5 && isset($doc->sumary_acc_id) && !isset($doc->liquidation))

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#uploadFileEdit">
                                                        Upload file đã chỉnh sửa
                                                    </button>
                                                    {{-- <p class="text-warning">Đang thanh lý
                                                        tài liệu biên soạn</p> --}}
                                                @elseif($doc->status == 5 && isset($doc->sumary_acc_id) &&
                                                    isset($doc->liquidation))
                                                    <p class="text-info">Đã nộp file chỉnh sửa</p>
                                                    @foreach ($liquidation as $key => $item)
                                                        <a
                                                            href="{{ route('downloadfilenghiemthutailieu', [$doc->id, $key]) }}">
                                                            {{-- <button type="button"
                                                                class="btn btn-primary"> --}}
                                                                <p style="font-size:16px">
                                                                    <span>File {{ ++$key }} :</span>
                                                                    <span
                                                                        class="text-primary">{{ $item['filename'] }}</span>
                                                                </p>
                                                                {{--
                                                            </button> --}}

                                                        </a>
                                                    @endforeach
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#uploadFileEdit">
                                                        Chỉnh sửa file
                                                    </button>
                                                @elseif($doc->status > 5)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <div class="cd-timeline__block js-cd-block">
                                            <div class="cd-timeline__img {{ getActiveStatus($doc->status, 5) }} js-cd-img">
                                                <img src="assets/images/seven.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Hoàn thành biên soạn</h3>
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block"></div>
                                        <div class="cd-timeline__block"></div>
                                        <!-- cd-timeline__block -->
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deployReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Báo cáo tiến độ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('baocaotiendobiensoan', $doc->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mức độ hoàn thành(%)</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="max = 100"
                                    min="0" max="100" name="result" required>
                                <small id="emailHelp" class="form-text text-muted">Bạn hãy điền mức độ hoàn thành tài liệu
                                    biên soạn</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deployReport2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Báo cáo tiến độ lần thứ 2</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('baocaotiendobiensoan2', $doc->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mức độ hoàn thành(%)</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="max = 100"
                                    min="{{ $doc->deploy_report }}" max="100" name="result" required>
                                <small id="emailHelp" class="form-text text-muted">Bạn hãy điền mức độ hoàn thành tài liệu
                                    biên soạn</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

        </script>
    </section>

    <!-- ============================================================== -->

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/timeline/js/main.js"></script>


@endsection
