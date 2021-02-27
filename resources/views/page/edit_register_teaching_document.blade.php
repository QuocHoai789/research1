
@extends('master')
@section('content')
    <section class="post bg0 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">

                    <div class="p-r-10 p-rl-0-sr991 p-b-20">
                        <!-- Entertainment  -->
                        <div class="p-b-25">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    <a href="{{ route('biensoantailieugiangday') }}"> Biên soạn tài liệu giảng dạy</a> / Chỉnh sửa đăng ký biên soạn tài liệu giảng dạy
                                </h3>
                            </div>
                            @if (Session::has('flash_message'))
                                <div class="alert alert-danger">{{ Session::get('flash_message') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                @endforeach
                            @endif
                            <div class="flex-wr-sb-s p-t-15">
                                <form enctype="multipart/form-data" class="w-100" method="post"
                                    action="{{ route('capnhatdangkytailieubaigiang', $document->slug_doc) }}">
                                    @csrf
                                    <div class="row p-t-20">
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Họ và tên</label>
                                                <input type="text" step="" class="form-control" name="user_name" id=""
                                                    aria-describedby="helpId" placeholder="Họ và tên" required
                                                    value="{{ $document->user->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Khoa/Viện:</label>
                                                <input type="text" step="" class="form-control" name="falcuty" id=""
                                                    aria-describedby="helpId" placeholder="Họ và tên" required
                                                    value="{{ unit(Auth::user()->work_unit_id) }}" readonly>
                                                {{-- <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    name="falcuty" readonly>

                                                    <option value="1" required>{{ unit(Auth::user()->work_unit_id) }}
                                                    </option>


                                                </select> --}}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Học vị</label>
                                                <input type="text" step="" class="form-control" name="degree" id=""
                                                    aria-describedby="helpId" placeholder="Học vị" required
                                                    @isset($document->user->degree)
                                                    value="{{ degreeName($document->user->degree) }}"
                                                    @endisset
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Nước đào
                                                    tạo</label>
                                                <input type="text" step="" class="form-control" name="national" id=""
                                                    aria-describedby="helpId" placeholder="Nước đào tạo" required
                                                    @isset($document->registerdoc->national)
                                                    value="{{ $document->registerdoc->national }}"
                                                    @endisset
                                                    >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Giấy công nhận Văn
                                                    bằng do Cục Quản lý chất lượng - Bộ GD-ĐT cấp (đối với Văn bằng đào tạo
                                                    nước ngoài)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                <header class="blockquote-header">Số</header>
                                                <input type="text" name="recognition[number]" class="form-control"
                                                
                                                 value="{{ $recognition['number'] }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-lg-8">
                                            <header class="blockquote-header">ngày được công nhận</header>
                                            <input type="text" name="recognition[day]" class="form-control datepicker"
                                                placeholder="dd-mm-yyyy" aria-describedby="helpId" 
                                                value="{{ $recognition['day'] }}">
                                            <i class="far fa-calendar-alt float-right icon-date-1"></i>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Họ tên thành viên
                                                    tham gia (nếu có)</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-12 mems"
                                            style="padding: 15px;border: 1px solid #ced4da">
                                            <div class="col-sm-12 col-lg-12 d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary add_mem"
                                                    style="margin-bottom: 10px">Thêm</button>
                                            </div>
                                            @isset($members)
                                                @foreach($members as $key => $mem)
                                            <div class="row p-b-15">
                                               
                                                <div class="col-sm-11 col-lg-11">
                                                    <header class="col-sm-11 col-lg-11 blockquote-header">Thành viên {{ ++$key }}
                                                    </header>
                                                    <input type="text" name="member[]" class="form-control"
                                                        placeholder="Họ tên thành viên tham gia" value="{{ $mem }}">
                                                </div>
                                                @if($key != 1)
                                                <div class="col-1 pr-3 pt-3 clos "><i class="far fa-window-close work-process-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                @endif
                                            </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Đơn vị công
                                                    tác</label>
                                                    <input type="text" step="" class="form-control" name="work_unit_id" id=""
                                                    aria-describedby="helpId" placeholder="Họ và tên" required
                                                    value="{{ unit(Auth::user()->work_unit_id) }}" readonly>
                                                {{-- <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    name="work_unit_id">
                                                    <option value="1" required>{{ unit(Auth::user()->work_unit_id) }}
                                                    </option>



                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Tên tài liệu giảng
                                                    dạy</label>
                                                <input type="text" name="name_document" class="form-control"
                                                    placeholder="Tên tài liệu giảng dạy" required
                                                    value="{{ $document->name_doc }}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Thể loại</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    name="type_doc">
                                                    @if (Auth::user()->degree >= 3)

                                                        <option value="1" required @if($document->type_doc == 1) selected @endif>Giáo trình</option>
                                                    @endif
                                                    <option value="2" required @if($document->type_doc == 2) selected @endif>Bài giảng</option>
                                                    <option value="3" required @if($document->type_doc == 3) selected @endif>Sách chuyên khảo</option>
                                                    <option value="4" required @if($document->type_doc == 4) selected @endif>Tài liệu tham khảo</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">Sử dụng cho môn
                                                    học(học phần)</label>
                                                <select class="custom-select mr-sm-2" id="term" name="subjects">
                                                    @isset($studies)
                                                        @foreach ($studies as $stu)
                                                            <option class="" value="{{ $stu->id }}" required @if($document->registerDoc->study_document_id == $study->id) selected @endif >
                                                                {{ $stu->name_term }}
                                                            </option>
                                                        @endforeach
                                                    @endisset

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                <header class="blockquote-header">Số tín chỉ</header>
                                                <input type="text" id="credits" name="credits"
                                                    class="form-control only-number" placeholder="Số tín chỉ"
                                                    value="{{ $study->number_of_credits }}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                
                                                <header class="blockquote-header">Số tiết</header>
                                                <input type="text" id="lesson" name="lesson"
                                                    class="form-control only-number" placeholder="Số tiết"
                                                    value="{{ $study->number_of_lessons }}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                <header class="blockquote-header">Số trang dự kiến</header>
                                                <input type="text" id="page_number" name="page_number"
                                                    class="form-control only-number" placeholder="Số trang"
                                                    value="{{ $document->registerdoc->page_numbers }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group expense-form">
                                                <label class="name-title" for="exampleFormControlInput1">Đối tượng sử
                                                    dụng</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    name="objects_of_use">
                                                    
                                                    <option value="1" @if($document->registerDoc->objects_of_use == 1) selected @endif required>Đại học</option>
                                                    <option value="2"  @if($document->registerDoc->objects_of_use == 2) selected @endif required>Sau đại học</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group expense-form">
                                                <label class="name-title" for="exampleFormControlInput1">Thời gian thực
                                                    hiện</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-lg-6 col-sm-6">
                                            <header class="blockquote-header">Từ ngày</header>
                                            <input type="text" name="day[begin]" class="form-control datepicker"
                                                placeholder="dd-mm-yyyy" required value="{{ $day['begin'] }}">
                                            <i class="far fa-calendar-alt float-right icon-date-1"></i>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <header class="blockquote-header">Đến ngày</header>
                                            <input type="text" name="day[finish]" class="form-control datepicker"
                                                placeholder="dd-mm-yyyy" required value="{{ $day['finish'] }}">
                                            <i class="far fa-calendar-alt float-right icon-date-1"></i>
                                        </div>
                                    </div>


                                    <div class="row p-t-20">

                                        <div class="col-sm-12 col-lg-12">
                                            <label class="name-title">I. Nội dung</label>
                                        </div>

                                    </div>

                                    <div class="row p-t-20" style="padding-left: 20px ">
                                        <div class="col-sm-12 col-lg-12">
                                            <label for="editor1" class="name-title">1.Lời nói đầu</label>
                                            <textarea id="editor1" name="preface" class="ckeditor form-control"
                                                placeholder="Lời nói đầu" required>{!! $document->registerDoc->preface  !!}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">2.Mục lục</label>
                                            <textarea name="table_of_contents" class="ckeditor form-control"
                                                placeholder="Mục lục">{!! $document->registerDoc->table_of_contents  !!}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">3.Bảng ký hiệu</label>
                                            <textarea name="table_of_symbols" class="ckeditor form-control"
                                                placeholder="Bảng ký hiệu">{!! $document->registerDoc->table_of_symbols  !!}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">4.Bảng viết tắt</label>
                                            <textarea name="table_abbreviation" class="ckeditor form-control"
                                                placeholder="Bảng viết tắt">{!! $document->registerDoc->table_abbreviation  !!}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">5.Các chương của tài liệu giảng dạy</label>
                                        </div>
                                    </div>

                                    <div class="row p-t-20  chapter">
                                        {{-- <div class="col-sm-12 col-lg-12">
                                            <button type="button" id="add_chapter"
                                                class=" btn btn-primary float-right">Thêm</button>
                                        </div> --}}
                                        <div class="col-sm-12 col-lg-12 chap">
                                            <textarea name="chapters" class="ckeditor form-control"
                                                placeholder="Các chương của tài liệu">{!! $document->registerDoc->chapters  !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row p-t-20" style="margin-left: 10px">
                                        <div class="col-sm-12 col-lg-12">
                                            <label class="name-title">6.Đáp án</label>
                                            <textarea name="answer" class="ckeditor form-control"
                                                placeholder="Đáp án">{!! $document->registerDoc->answer  !!}</textarea>

                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">7.Tài liệu tham khảo</label>
                                            <textarea class="ckeditor form-control" name="references"
                                                placeholder="Tài liệu tham khảo">{!! $document->registerDoc->references  !!}</textarea>

                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">8.Phụ lục</label>
                                            <textarea name="appendix" class=" ckeditor form-control"
                                                placeholder="Phụ lục">{!! $document->registerDoc->appendix  !!}</textarea>

                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">9.Bảng tra cứu thuật ngữ</label>
                                            <textarea name="glossary_of_terminology" class="ckeditor form-control"
                                                placeholder="Bảng tra cứu thuật ngữ">{!! $document->registerDoc->glossary_of_terminology  !!}</textarea>

                                        </div>
                                        <div class="col-sm-12 col-lg-12 p-t-20">
                                            <label class="name-title">10.Từ khóa</label>
                                            <textarea id="ckeditor" name="key_works" class="ckeditor form-control"
                                                placeholder="Từ khóa">{!! $document->registerDoc->key_works  !!}</textarea>

                                        </div>
                                    </div>

                                    <div class="row p-t-20 ">
                                        <div class="col-sm-12 col-lg-12 ">
                                            <label class="name-title">II. Mức độ khác biệt so với các tài liệu khác</label>
                                            <div class="form-check degree_of_difference ">
                                                <input class="form-check-input" type="radio" name="level_of_difference"
                                                    value="1" @if($document->registerDoc->level_of_difference == 1) checked @endif  required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Soạn mới 100%
                                                </label>

                                            </div>
                                            <div class="form-check degree_of_difference">
                                                <input class="form-check-input" type="radio" name="level_of_difference"
                                                    value="2"  @if($document->registerDoc->level_of_difference == 2) checked @endif required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Trích dẫn tài liệu tham khảo > 50%
                                                </label>
                                            </div>
                                            <div class="form-check degree_of_difference">
                                                <input class="form-check-input" type="radio" name="level_of_difference"
                                                    value="3"  @if($document->registerDoc->level_of_difference == 3) checked @endif required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Trích dẫn tài liệu tham khảo ≤ 50%
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row p-t-30">
                                        <button type="submit" class="btn btn-primary">Cập nhật biên soạn</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/teachdocument.js') }}"></script>
    </section>

    <script>
        $(document).ready(function() {
            var dem = 2;
            $('.add_mem').on('click', function() {
                $('.mems').append(
                    '<div class="row p-b-15"><header class="col-sm-11 col-lg-11 blockquote-header"></header><div class="col-sm-11 col-lg-11"><input type="text" name="member[]" class="form-control" placeholder="Họ tên thành viên tham gia" required > </div><div class="col-sm-1 col-lg-1 clos close' +
                    dem +
                    '"><i class="far fa-window-close work-university-close close-chap" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div></div>'
                    );
                dem = dem + 1;
                resetHeaderAddMem();
            });
            $(document).on('click', '.clos', function() {
                $(this).parent().remove();
                resetHeaderAddMem();
            });

            function resetHeaderAddMem() {
                const eMem = document.querySelector('.mems');
                const eMemInputChild = eMem.querySelectorAll('input');
                Array.from(eMemInputChild).forEach(function(e) {
                    Array.from(eMem.querySelectorAll('header')).forEach(function(eHeader, i) {
                        eHeader.innerHTML = `Thành viên ${i+1}`;
                    });
                });
            }
            $('#term').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('ajax-study') }}/" + id,
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data);
                        $('#credits').val(data[0].credit);
                        $('#lesson').val(data[0].lesson);
                    }
                });
            });
            //plus minus counter input
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 0 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });

    </script>
@endsection
