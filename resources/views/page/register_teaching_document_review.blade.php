@extends('master')
@section('content')
    <section class="post bg0 p-t-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <div class="p-r-10 p-rl-0-sr991 p-b-20">
                        <div class="p-b-25">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Biên soạn tài liệu giảng dạy
                                </h3>
                            </div>
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
                            <div class="row">
                                <div class="col-12 text-right p-3">
                                    @if( $document->registerdoc->id_user_approval == 0 )
                                    <a class="btn btn-primary"
                                        href="{{ route('chinhsuadangkybiensoan', $document->slug_doc) }}"
                                        role="button">Chỉnh sửa</a>
                                        @endif
                                    <a class="btn btn-info" href="" role="button">Tải
                                        xuống</a>
                                </div>
                            </div>
                            <div class="p-t-15 page" id="page-download">
                                <div class="row font-110">
                                    <div class="col-6 text-center">
                                        <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                            <br /> thành phố hồ chí minh<br /><b>Khoa/viện ...</b>
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                        </p>
                                        <p class="font-weight-bold mb-1 ">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                            phúc
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <p class="font-italic  mb-0 text-right" style="    padding-right: 80px;">Thành phố
                                            Hồ Chí Minh, ngày tháng năm 20</p>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="text-uppercase title-page">
                                            BẢN ĐĂNG KÝ ĐỀ CƯƠNG BIÊN SOẠN TÀI LIỆU GIẢNG DẠY<br />
                                            NĂM HỌC 20….- 20….
                                        </p>
                                    </div>
                                </div>
                                <div class="page-content font-110">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Họ và tên: </span>
                                                <span
                                                    class="text-uppercase font-weight-bold">{{ $document->user->name }}</span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Khoa/Viện: </span>
                                                <span
                                                    class="text-uppercase font-weight-bold">{{ unit($document->user->work_unit_id) }}</span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>
                                                <span>Học vị: </span>
                                                <span class="font-weight-bold">{{ degreeName($document->user->degree) }}</span>
                                            </p>

                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <span>Nước đào tạo: </span>
                                                @isset($document->registerdoc->national)
                                                    <span class="font-weight-bold">{{ $document->registerdoc->national }}</span>
                                                @endisset
                                            </p>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Giấy công nhận Văn bằng do Cục Quản lý chất lượng - Bộ GDĐT cấp (đối với
                                                    Văn bằng đào tạo nước ngoài):
                                                </span>
                                                <span>
                                                    @isset($document->registerdoc->recognition)
                                                        {{ recognition($document->registerdoc->recognition) }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Họ và tên thành viên tham gia: (nếu có)…
                                                </span>
                                                <span class="font-weight-bold">
                                                    @isset($members)
                                                        {{ implode(', ', $members) }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Đơn vị công tác:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ unit($document->user->work_unit_id) }}
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Tên tài liệu giảng dạy:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ $document->name_doc }}
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Thể loại:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ typeDoc($document->type_doc) }}
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p>
                                                <span>
                                                    Số tín chỉ:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ $study->number_of_credits }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p>
                                                <span>
                                                    Số tiết:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ $study->number_of_lessons }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p>
                                                <span>
                                                    Dự kiến số trang:
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ $document->registerdoc->page_numbers }} trang
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Sử dụng cho môn học (học phần):
                                                </span>
                                                <span class="font-weight-bold">
                                                    {{ $study->name_term }}
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Đối tượng sử dụng:
                                                </span>
                                                <span class="font-weight-bold">
                                                    @if ($document->registerdoc->objects_of_use == 1)
                                                        Đại học
                                                    @elseif($document->registerdoc->objects_of_use == 2)
                                                        Sau đại học
                                                    @endif
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    Thời gian thực hiện:
                                                </span>
                                                <span class="font-weight-bold">
                                                    @isset($day)Từ
                                                    {{ $day->begin }} đến {{ $day->finish }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    I. Nội dung
                                                </span>

                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>1.Lời nói đầu </span>
                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->preface !!}
                                            </div>

                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>2.Mục lục </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->table_of_contents !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>3.Bảng ký hiệu </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->table_of_symbols !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>4.Bảng viết tắt </span>
                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->table_abbreviation !!}
                                            </div>

                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>5.Các chương của tài liệu giảng dạy </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->chapters !!}
                                            </div>

                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>6.Đáp án </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->answer !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>7.Tài liệu tham khảo </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->references !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>8.Phụ lục </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->appendix !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>9.Bảng tra cứu thuật ngữ </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->glossary_of_terminology !!}
                                            </div>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="p-l-10">
                                                <span>10.Từ khóa </span>

                                            <div style="padding-left: 20px" class="font-weight-bold">
                                                {!! $document->registerdoc->key_works !!}
                                            </div>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>
                                                    II. Mức độ khác biệt tài liệu biên soạn so với tài liệu khác:
                                                </span>
                                                <span class="font-weight-bold">
                                                    @if ($document->registerdoc->level_of_difference == 1)
                                                        Soạn mới 100%
                                                    @elseif($document->registerdoc->level_of_difference == 2)
                                                        Trích dẫn tài liệu tham khảo > 50%
                                                    @elseif($document->registerdoc->level_of_difference == 3)
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <script type="text/javascript">
            function getPDF() {

                var HTML_Width = $("#page-download").width();
                var HTML_Height = $("#page-download").height();
                var top_left_margin = 15;
                // var PDF_Width = HTML_Width+(top_left_margin*2);
                // var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
                var PDF_Width = 595;
                var PDF_Height = 842;
                var canvas_image_width = PDF_Width - 30;
                var canvas_image_height = HTML_Height;
                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


                html2canvas($("#page-download")[0], {
                    allowTaint: true
                }).then(function(canvas) {
                    canvas.getContext('2d');

                    console.log(canvas.height + "  " + canvas.width);


                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'PNG', top_left_margin, top_left_margin, canvas_image_width,
                        canvas_image_height - 100);


                    for (var i = 1; i <= totalPDFPages; i++) {
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4) -
                            50, canvas_image_width, canvas_image_height - 100);
                    }
                    pdf.save("HTML-Document.pdf");
                });

            };

        </script>
    </section>
@endsection
