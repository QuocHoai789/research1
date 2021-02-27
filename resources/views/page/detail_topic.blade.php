@extends('master')
@section('content')
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

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
                                    Đề tài: {{ $topic->name_topic }}
                                </h3>
                            </div>
                            @if (Session::has('flag_error'))
                                <div class="alert alert-danger w-100">{{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('flag_success'))
                                <div class="alert alert-success w-100">{{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            <div class="flex-wr-sb-s p-t-15">
                                <section class="cd-timeline js-cd-timeline">
                                    <div class="cd-timeline__container">
                                        <!-- 1 -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 1) }} js-cd-img">
                                                <img class="color-white" src="assets/images/one.png" alt="Picture">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Đăng ký đề tài</h3>
                                                @if($topic->close == 2)
                                                <p class="text-danger">Đề tài đã bị hủy</p>
                                                
                                                @elseif ($topic->status == 1)
                                                    <p class="text-warning">Đang chờ xét duyệt</p>
                                                @elseif($topic->status>1)
                                                    <p class="text-success">Đã xét duyệt</p>
                                                    <a target="_blank" href="{{route('formdkchitietdetaipublic',$topic->id)}}" class="btn btn-success float-right">Xem chi tiết đăng ký đề tài</a>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->

                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 2) }} js-cd-img">
                                                <img src="assets/images/two.png" alt="Picture">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thuyết minh đề tài</h3>

                                                @if ($topic->status == 2 && !isset($topic->scientific_explanation_id))
                                                    <a href="{{ route('thuyetminhdetainghiencuukhoahoc', $topic->id) }}"><button
                                                            class="btn btn-primary float-right" type="button">Đăng
                                                            ký</button></a>
                                                @elseif($topic->status == 2 && isset($topic->scientific_explanation_id))
                                                    <p class="text-warning">Đang chờ xét duyệt</p>
                                                    <a href="{{ route('getthuyetminhdetainghiencuukhoahoc', $topic->id) }}"><button
                                                            class="btn btn-success float-right" type="button">Xem chi
                                                            tiết</button></a>
                                                @elseif($topic->status >= 3)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                    <a href="{{ route('getthuyetminhdetainghiencuukhoahoc', $topic->id) }}"><button
                                                            class="btn btn-success float-right" type="button">Xem chi
                                                            tiết</button></a>
                                                @endif


                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 3) }} js-cd-img">
                                                <img src="assets/images/three.png" alt="Picture">
                                            </div>
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Phản biện thuyết minh đề tài
                                                </h3>
                                                @if ($topic->status >= 4)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 4) }} js-cd-img">
                                                <img src="assets/images/four.png" alt="Picture">
                                            </div>
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thực hiện đề tài
                                                </h3>
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 5) }} js-cd-img">
                                                <img src="assets/images/five.png" alt="Location">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Báo cáo tiến độ đề tài</h3>
                                                <div class="row mb-3 border-bottom border-info pb-3">
                                                    @if ($topic->status == 5)
                                                        <div class="col">
                                                            @if (isset($topic->notice_late) && $topic->notice_late == 1)
                                                                <p class="text-danger">Trễ hạn đề tài</p>
                                                            @endif
                                                            @if ($topic->count_extension < 2)
                                                                <a href="{{ route('giahanthuchiendetai', $topic->id) }}"
                                                                    class="text-primary"><button
                                                                        class="btn btn-danger float-left" type="button">Gia
                                                                        hạn đề tài @isset($topic->count_extension)
                                                                            {{ '(' . (2 - $topic->count_extension) . ')' }}
                                                                    @else {{ '(2)' }} @endisset</button></a>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if (isset($topic->scientific_extension_id))
                                                    <div class="col">
                                                        <a href="{{ route('formgiahan', ['id' => $topic->id]) }}">
                                                            <button class="btn btn-info">Chi tiết gia hạn đề
                                                                tài</button></a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                @if (($topic->status == 5 && !isset($topic->notice_late)) || ($topic->status == 5 && $topic->notice_late != 1))
                                                    <div class="col">
                                                        <a
                                                            href="{{ route('baocaotrienkhainghiencuukhoahoc', $topic->id) }}">
                                                            <button class="btn btn-primary " type="button">
                                                                Báo cáo tiến độ đề tài
                                                            </button>
                                                        </a>
                                                    </div>
                                                @endif
                                                @if (isset($topic->scientific_deploy_report_id))
                                                    <div class="col">
                                                        <a href="{{ route('formbaocao', ['id' => $topic->id]) }}">
                                                            <button class="btn btn-success">Chi tiết báo cáo đề
                                                                tài</button></a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- cd-timeline__content -->
                                    </div>

                                    <!-- cd-timeline__block -->

                                    <!-- cd-timeline__block -->
                                    <div class="cd-timeline__block js-cd-block">
                                        <div
                                            class="cd-timeline__img {{ getActiveStatus($topic->status, 6) }} js-cd-img">
                                            <img src="assets/images/six.png" alt="Movie">
                                        </div>
                                        <!-- cd-timeline__img -->
                                        <div class="cd-timeline__content js-cd-content">
                                            <h3>Nghiệm thu đề tài</h3>
                                            @isset($fileAcceptance)

                                                @foreach ($fileAcceptance as $key => $item)
                                                    <div class="row pb-3">
                                                        <div class="col-2">File {{ $key + 1 }}</div>
                                                        <div class="col-10">
                                                            <a
                                                                href="{{ route('downloadfilenghiemthudetai', [$topic->id, $key]) }}">
                                                                <p class="font-italic">{{$item['filename']}}</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset

                                            @if ($topic->status == 6 && empty($topic->acceptance))
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#uploadFile">
                                                    Upload file
                                                </button>
                                            @elseif($topic->status == 6 && !empty($topic->acceptance))
                                                <p class="text-success">Đã nộp file</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#uploadFile">
                                                    Chỉnh sửa file
                                                </button>
                                            @elseif ($topic->status > 6)
                                                <a href="" target="_blank">
                                                    <button type="button" class="btn btn-success">
                                                        Biên bản đánh giá nghiệm thu
                                                    </button>
                                                </a>
                                                <p class="text-success">Đã hoàn thành</p>
                                            @endif
                                        </div>
                                        <!-- cd-timeline__content -->
                                    </div>
                                    <!-- cd-timeline__block -->
                                    <div class="cd-timeline__block js-cd-block">
                                        <div
                                            class="cd-timeline__img {{ getActiveStatus($topic->status, 7) }} js-cd-img">
                                            <img src="assets/images/seven.png" alt="Movie">
                                        </div>
                                        <!-- cd-timeline__img -->
                                        <div class="cd-timeline__content js-cd-content">
                                            <h3>Thanh lý đề tài</h3>
                                            @isset($fileLiquidation)
                                                @foreach ($fileLiquidation as $key => $item)
                                                    <div class="row pb-3">
                                                        <div class="col-2">File {{ $key + 1 }}</div>
                                                        <div class="col-10">
                                                            <a
                                                                href="{{ route('downloadfilethanhlydetai', [$topic->id, $key]) }}">
                                                                <p class="font-italic">{{ $item['filename'] }}</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset

                                            @if ($topic->status == 7 && !isset($topic->liquidation))
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#uploadLiquidation">
                                                    Upload file
                                                </button>


                                            @elseif($topic->status == 7 && isset($topic->liquidation))
                                                <p class="text-success">Đã nộp file</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#uploadLiquidation">
                                                    Chỉnh sửa file
                                                </button>
                                            @elseif ($topic->status > 7)
                                                <p class="text-success">Đã hoàn thành</p>
                                            @endif
                                        </div>
                                        <!-- cd-timeline__content -->
                                    </div>
                                    <div class="cd-timeline__block js-cd-block">
                                        <div
                                            class="cd-timeline__img {{ getActiveStatus($topic->status, 8) }} js-cd-img">
                                            <img src="assets/images/eight.png" alt="Movie">
                                        </div>
                                        <!-- cd-timeline__img -->
                                        <div class="cd-timeline__content js-cd-content">
                                            <h3>Hoàn thành đề tài</h3>
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
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload file nghiệm thu đề tài</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('nghiemthudetai', $topic->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 1</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file1"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file PDF</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 2</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file2"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file PDF</label>
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

    <div class="modal fade" id="uploadLiquidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload file thanh lý đề tài</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('thanhlydetai', $topic->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 1</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file1"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file PDF</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File 2</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" required name="file2"
                                    accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Chọn file PDF</label>
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
