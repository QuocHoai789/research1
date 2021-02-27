@extends('master')
@section('content')
<section class="post bg0 p-t-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">

                <div class="p-r-10 p-rl-0-sr991 p-b-20">
                    <!-- Entertainment  -->
                    <div class="p-b-25">
                        <div class="how2 how2-cl1 flex-s-c">
                            <h3 class="f1-m-2 cl12 tab01-title">
                                <a href="{{ route('nghiencuukhoahocsinhvien') }}"> Danh mục đề tài nghiên
                                    cứu khoa học của sinh viên</a> / Đăng ký đề tài
                            </h3>
                        </div>
                        @if(Session::has('flash_message'))
                            <div class="alert alert-danger">{{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        @endif
                        <div class="flex-wr-sb-s p-t-15">
                            <form enctype="multipart/form-data" class="w-100" method="post"
                                action="{{ route('dangkydetaisinhvien') }}" name="register_topic">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Tên đề tài</label>
                                            <input type="text" step="" class="form-control" name="name_topic" id=""
                                                aria-describedby="helpId" placeholder="Tên đề tài" required value="{{ old('name_topic') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Lĩnh vực nghiên
                                                cứu</label><i> (Chọn ít nhất 1 lĩnh vực)</i>
                                            <div class="col-lg-12 p-3" id="type-topic">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="Tự nhiên">
                                                                Tự nhiên
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="Kinh tế, XHNV">
                                                                Kinh tế, XHNV
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="Sỡ hữu trí tuệ">
                                                                Sỡ hữu trí tuệ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="kỹ thuật">
                                                                Kỹ thuật
                                                            </label>
                                                        </div>  
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="An toàn lao động">
                                                                An toàn lao động
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="Môi trường">
                                                                Môi trường
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="type[]" value="Giáo dục">
                                                                Giáo dục
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="diff-form" value="diff">
                                                                Khác
                                                                <input type="text" class="form-control technical-diff"
                                                                    name="type[diff]" disabled required>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="notify-topic"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Tính cấp
                                                thiết</label>
                                            <textarea required class="form-control font-16"
                                                id="exampleFormControlTextarea1" rows="2" name="importance">{{ old('importance') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Mục tiêu</label>
                                            <textarea required class="form-control font-16"
                                                id="exampleFormControlTextarea1" rows="4" name="target">{{ old('target') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Nội dung
                                                chính</label>
                                            <textarea required class="form-control font-16"
                                                id="exampleFormControlTextarea1" rows="5" name="content" required
                                                re>{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Sản phẩm và kết quả
                                                dự
                                                kiến</label>
                                            <div class="col-sm-12 ml-3">
                                                <div class="p-3">
                                                    <div class="notify-magazine">
                                                    </div>
                                                    <label class="font-17" for="exampleFormControlInput1">1. Sản phẩm
                                                        khoa
                                                        học:</label><small> <i class="text-info">(*) Chọn ít nhất 1 sản phẩm khoa học</i></small>
                                                    
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số
                                                                bài báo khoa học tạp chí quốc tế</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus magazine_minus">-</span>
                                                                <input type="number" class="count"
                                                                    name="magazine_internation" value="0" min="0">
                                                                <span class="plus magazine_plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số
                                                                bài báo khoa học tạp chí trong nước</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus magazine_minus">-</span>
                                                                <input type="number" class="count"
                                                                    name="magazine_domestic" value="0" min="0">
                                                                <span class="plus magazine_plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số sách
                                                                lượng xuất bản</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus magazine_minus">-</span>
																	<input type="number" class="count" name="publish"
                                                                    value="0" min="0">
                                                                <span class="plus magazine_plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <label class="font-17" for="exampleFormControlInput1">2. Sản phẩm
                                                        đào
                                                        tạo:</label>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số
                                                                sản phẩm chuyên ngành</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus">-</span>
                                                                <input type="number" class="count" name="specialized"
                                                                    value="0" min="0" value="{{ old('specialized') }}">
                                                                <span class="plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số
                                                                sản phẩm Thạc sĩ</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus">-</span>
                                                                <input type="number" class="count" name="master"
                                                                    min="0"  value="0" value="{{ old('master') }}">
                                                                <span class="plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 ml-4">
                                                            <label class="font-weight-light"
                                                                for="exampleFormControlInput1"><span>- </span>Số
                                                                sản phẩm Tiến sĩ</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="qty d-flex">
                                                                <span class="minus">-</span>
                                                                <input type="number" class="count" name="doctor"
                                                                    min="0" value="0" value="{{ old('doctor') }}">
                                                                <span class="plus">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <div class="form-group">
                                                        <label class="font-17" for="exampleFormControlInput1">3.Sản phẩm
                                                            ứng
                                                            dụng:</label>
                                                        <textarea class="form-control font-16"
                                                            id="exampleFormControlTextarea1" rows="4"
                                                            placeholder="Mô tả tóm tắt về sản phẩm dự kiến, phạm vi, khả năng và địa chỉ ứng dụng"
                                                            name="application" required>{{ old('application') }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="p-3">
                                                    <div class="form-group">
                                                        <label class="font-17" for="exampleFormControlInput1">4.Sản phẩm
                                                            khác:</label>
                                                        <textarea class="form-control font-16"
                                                            id="exampleFormControlTextarea1" rows="4"
                                                            placeholder="Mô tả tóm tắt về sản phẩm"
                                                            name="application_diff">{{ old('application_diff') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Hiệu quả dự
                                                kiến</label>
                                            <textarea required class="form-control font-16"
                                                id="exampleFormControlTextarea1" rows="5" name="effective">{{ old('effective') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">Thời gian dự
                                                kiến</label>
                                            <select class="custom-select" id="inputGroupSelect02" name="time">
                                                <option value="3" selected>3 tháng</option>
                                                <option value="6" @if(old('time')==6) {{ 'selected' }} @endif>6 tháng</option>
                                                <option value="9" @if(old('time')==9) {{ 'selected' }} @endif>9 tháng</option>
                                                <option value="12" @if(old('time')==12) {{ 'selected' }} @endif>12 tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group expense-form">
                                            <label class="name-title" for="exampleFormControlInput1">Nhu cầu kinh
                                                phí</label>
                                            <select class="custom-select expense" id="inputGroupSelect02"
                                                name="expense">
                                                @for($i = 1; $i <= 6; $i++)
                                                    <option value="{{ $i*5*1000000 }}" @if (old('expense')==$i*5*1000000)
														{{ 'selected' }}
													@endif>{{ number_format($i*5*1000000) }} đồng
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký đề tài</button>
                                <div class="notify mt-3"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#diff-form').change(function () {
            if ($(this).is(':checked')) {
                $('.technical-diff').prop("disabled", false);
            } else {
                $('.technical-diff').prop("disabled", true);
            }
        });
		//plus minus counter input
        $('.minus').click(function () {
			var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 0 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>
<script src="./js/validate_register_topic.js"></script>
@endsection
