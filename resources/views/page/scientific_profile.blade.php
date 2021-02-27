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
                                Đăng ký lý lịch khoa học
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
                                action="{{ route('dangkydetaichunhiemdetai') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">1. Họ và
                                                tên</label>
                                            <input type="text" step="" class="form-control" name="name"
                                                aria-describedby="helpId" placeholder="" required
                                                value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">2. Giới
                                                tính</label>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="gender"
                                                            value="1" checked>Nam
                                                    </label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="gender"
                                                            value="0">Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">3. Nơi sinh</label>
                                            <input type="text" name="birthplace" class="form-control"
                                                placeholder="Nơi sinh" aria-describedby="helpId"
                                                value="{{ old('birthplace') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">4. Năm sinh</label>
                                            <input type="text" name="birthday" class="form-control datepicker-year"
                                                placeholder="yyyy" aria-describedby="helpId"
                                                value="{{ old('birthday') }}" required>
                                            <i class="far fa-calendar-alt float-right icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">5. Học hàm</label>
                                            <input type="text" name="academic[name]" class="form-control "
                                                placeholder="nếu có" aria-describedby="helpId"
                                                value="{{ old('academic.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title"></label>
                                            <input type="text" name="academic[time]"
                                                class="form-control mt-3 datepicker-year"
                                                placeholder="Năm được phong học hàm" aria-describedby="helpId"
                                                value="{{ old('academic.time') }}">
                                            <i class="far fa-calendar-alt float-right icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">6. Học vị</label>
                                            <input class="form-control" type="text" name="degree[name]" value="{{ degreeName(Auth::user()->degree)}}" readonly>
                                            {{-- <select class="custom-select expense" id="inputGroupSelect02" name="degree[name]" required>

                                                <option value="{{ Auth::user()->degree }}">{{ degreeName(Auth::user()->degree) }}</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title"></label>
                                            <input type="text" name="degree[time]"
                                                class="form-control mt-3 datepicker-year" placeholder="Năm đạt học vị"
                                                aria-describedby="helpId"
                                                value="{{ old('degree.time') }}" required>
                                            <i class="far fa-calendar-alt float-right icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">7. Chức vụ hiện nay</label>
                                            <input type="text" name="position" class="form-control" placeholder="nếu có"
                                                aria-describedby="helpId" value="{{ old('position') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="name-title ml-3">8. Thông tin liên lạc</label>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ</header>
                                                    <input type="text" name="contact[address]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('contact.address') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="contact[phoneNumber]" class="form-control only-number"
                                                        aria-describedby="helpId"
                                                        value="{{ old('contact.phoneNumber') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Email</header>
                                                    <input type="email" name="contact[email]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('contact.email') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="name-title">9. Đơn vị công tác hiện nay</label>
                                    </div>
                                    <div class="col-lg-12 ml-3">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tên cơ quan</header>
                                                    <input type="text" name="workPlace[nameAgency]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('workPlace.nameAgency') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="workPlace[phoneNumber]" class="form-control only-number"
                                                        aria-describedby="helpId"
                                                        value="{{ old('workPlace.phoneNumber') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Fax</header>
                                                    <input type="text" name="workPlace[fax]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('workPlace.fax') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ</header>
                                                    <input type="text" name="workPlace[address]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('workPlace.address') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Website</header>
                                                    <input type="text" name="workPlace[website]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('workPlace.website') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">10. Quá trình đào tạo</label>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <label class="ml-3 font-17">Đại học</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Nơi đào tạo</header>
                                                    <input type="text" name="eduProcess[university][address]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.university.address') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[university][specialize]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.university.specialize') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[university][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.university.time') }}"
                                                        required>
                                                    <i class="far fa-calendar-alt float-right icon-date t-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <label class="ml-3 font-17">Thạc sĩ</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Nơi đào tạo</header>
                                                    <input type="text" name="eduProcess[master][address]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.master.address') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[master][specialize]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.master.specialize') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[master][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.master.time') }}">
                                                    <i class="far fa-calendar-alt float-right icon-date t-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <label class="ml-3 font-17">Tiến sĩ</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Nơi đào tạo</header>
                                                    <input type="text" name="eduProcess[doctor][address]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.doctor.address') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[doctor][specialize]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.doctor.specialize') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[doctor][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.doctor.time') }}">
                                                    <i class="far fa-calendar-alt float-right icon-date t-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <label class="ml-3 font-17">Văn bằng 2</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Nơi đào tạo</header>
                                                    <input type="text" name="eduProcess[intern][address]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.intern.address') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[intern][specialize]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.intern.specialize') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[intern][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"
                                                        value="{{ old('eduProcess.intern.time') }}">
                                                    <i class="far fa-calendar-alt float-right icon-date t-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">11. Trình độ ngoại ngữ</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-language" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="language">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên ngoại ngữ
                                                        </header>
                                                        <input type="text" name="language[1][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('language.1.name') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trình độ</header>
                                                        <input type="text" name="language[1][level]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('language.1.level') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">12. Quá trình công tác</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-work-process" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="work-process">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group d-flex">
                                                        <div>
                                                            <header class="blockquote-header">Thời gian</header>
                                                            <input type="text" name="work[1][timeBefor]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ old('work.1.timeBefor') }}"
                                                                required>

                                                        </div>
                                                        <label class="mt-4 ml-3 mr-3">đến</label>
                                                        <div>
                                                            <header class="blockquote-header">đến năm</header>
                                                            <input type="text" name="work[1][timeEnd]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ old('work.1.timeEnd') }}"
                                                                required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vị trí công tác</header>
                                                        <input type="text" name="work[1][workplace]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('work.1.workplace') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Lĩnh vực chuyên môn</header>
                                                        <input type="text" name="work[1][specialize]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('work.1.specialize') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn vị công tác</header>
                                                        <input type="text" name="work[1][unit]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('work.1.unit') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">13. Các lĩnh vực chuyên môn và hướng nghiên
                                            cứu</label>
                                    </div>

                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Lĩnh vực
                                                        </header>
                                                        <input type="text" name="areasOfExpertise[field]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('areasOfExpertise.field') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chuyên ngành</header>
                                                        <input type="text" name="areasOfExpertise[specialized]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('areasOfExpertise.specialized') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chuyên môn</header>
                                                        <input type="text" name="areasOfExpertise[expertise]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('areasOfExpertise.expertise') }}"
                                                            required>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <div class="form-group">
                                                <header class="blockquote-header">Hướng nghiên cứu</header>
                                                <textarea class="form-control" name="areasOfExpertise[direction]" id="exampleFormControlTextarea1"
                                                    rows="4" required>{{ old('areasOfExpertise.direction') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">14. Đề tài nghiên cứu khoa học đã chủ trì hoặc là thành viên</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-science" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="science">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên đề tài</header>
                                                        <input type="text" name="science[1][name]" class="form-control "
                                                            aria-describedby="helpId"
                                                            value="{{ old('science.1.name') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Cấp quản lý
                                                        </header>
                                                        <input type="text" name="science[1][level]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('science.1.level') }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="science[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('science.1.time') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg ">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vai trò dự án
                                                        </header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="science[1][position]">
                                                            <option value="Chủ nhiệm" selected>Chủ nhiệm</option>
                                                            <option value="Tham gia">Tham gia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trình trạng
                                                        </header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="science[1][status]">
                                                            <option value="Đã nghiệm thu- xếp loại Khá" selected>Đã nghiệm thu- xếp loại Khá</option>
                                                            <option value="Đã nghiệm thu- xếp loại Tốt" >Đã nghiệm thu- xếp loại Tốt</option>
                                                            <option value="Chưa nghiệm thu">Chưa nghiệm thu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">15. Hướng dẫn sinh viên, học viên cao học, nghiên cứu sinh</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-guide" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="guide">
                                            <div class="row">
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên luận văn, luận án</header>
                                                        <input type="text" name="guide[1][nameTopic]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('guide.1.nameTopic') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên sinh viên</header>
                                                        <input type="text" name="guide[1][nameStudent]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('guide.1.nameStudent') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Bậc đào tạo</header>
                                                        <input type="text" name="guide[1][level]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('guide.1.level') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                                                        <input type="text" name="guide[1][product]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('guide.1.product') }}" >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 d-flex">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm tốt nghiệp</header>
                                                        <input type="text" name="guide[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('guide.1.time') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">16. Giáo trình, tài liệu học tập đã chủ biên hoặc tham
                                            gia</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-document" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="document">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên sách
                                                        </header>
                                                        <input type="text" name="document[1][name]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('document.1.name') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nhà suất bản</header>
                                                        <input type="text" name="document[1][publisher]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('document.1.publisher') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vai trò</header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="document[1][position]">
                                                            <option value="Tác giả" selected>Tác giả</option>
                                                            <option value="Tham gia" >Tham gia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số hiệu ISBN</header>
                                                        <input type="text" name="document[1][code]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('document.1.code') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm xuất bản</header>
                                                        <input type="text" name="document[1][time]"
                                                            class="form-control  datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('document.1.time') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <p class="font-weight-bold">Ghi chú <small>(Pho tô trang bìa và mục
                                                            lục đính kèm)</small></p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="document[file]" required
                                                            accept="application/pdf">
                                                        <label class="custom-file-label" for="customFile">Chọn
                                                            file PDF</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">17. Các bài báo đã công bố</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-article" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="article">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nơi đăng bài viết</header>
                                                        <select class="custom-select expense" id="inputGroupSelect02" name="article[1][on]">
                                                        <option value="journal" selected>Đăng trên tạp chí</option>
                                                        <option value="seminor" >Đăng trên kỷ yếu hội nghị, hội thảo</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên tác giải</header>
                                                        <input type="text" name="article[1][nameAuthor]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.nameAuthor') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên bài viết</header>
                                                        <input type="text" name="article[1][namePost]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.namePost') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên tạp chí/ hội nghị/ hội thảo</header>
                                                        <input type="text" name="article[1][nameEvent]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.nameEvent') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trang bài viết</header>
                                                        <input type="text" name="article[1][page]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.page') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm xuất bản</header>
                                                        <input type="text" name="article[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('article.1.time') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                                                        <input type="text" name="article[1][product]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.product') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số hiệu ISSN/ ISBN</header>
                                                        <input type="text" name="article[1][code]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('article.1.code') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <p class="font-weight-bold">Ghi chú <small>(Pho tô mục lục và bài
                                                            báo đính kèm)</small></p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="article[file]" required
                                                            accept="application/pdf">
                                                        <label class="custom-file-label" for="customFile">Chọn
                                                            file PDF</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">18. Hướng dẫn sinh viên (học viên cao học, nghiên cứu sinh) nghiên cứu khoa học đạt giải thưởng:</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-student-awards" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="student-awards">

                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên đề tài</header>
                                                        <input type="text" name="studentAwards[1][nameTopic]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('studentAwards.1.nameTopic') }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Họ và tên sinh viên</header>
                                                        <input type="text" name="studentAwards[1][nameStudent]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('studentAwards.1.nameStudent') }}"
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Kết quả giải thưởng</header>
                                                        <input type="text" name="studentAwards[1][result]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('studentAwards.1.result') }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Cấp thưởng</header>
                                                        <input type="text" name="studentAwards[1][prize]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('studentAwards.1.prize') }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm đạt giải</header>
                                                        <input type="text" name="studentAwards[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('studentAwards.1.time') }}"
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  <div>
                                            <div class="mt-5 mb-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                        <p class="font-weight-bold">Ghi chú <small>(Pho tô mục lục và bài
                                                                báo đính kèm)</small></p>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="studentAwards[file]" accept="application/pdf">
                                                            <label class="custom-file-label" for="customFile">Chọn
                                                                file PDF</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">19. Bằng phát minh, sáng chế</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-license" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="license">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên và nội dung văn bằng</header>
                                                        <input type="text" name="license[1][name]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('license.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                        <input type="text" name="license[1][product]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('license.1.product') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số hiệu</header>
                                                        <input type="text" name="license[1][code]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('license.1.code') }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm cấp</header>
                                                        <input type="text" name="license[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('license.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nơi cấp</header>
                                                        <input type="text" name="license[1][address]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('license.1.address') }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                                                        <input type="text" name="license[1][author]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('license.1.author') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">20. Các giải pháp hữu ích</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-solution" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="solution">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên và nội dung giải pháp</header>
                                                        <input type="text" name="solution[1][name]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('solution.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                        <input type="text" name="solution[1][product]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('solution.1.product') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số hiệu</header>
                                                        <input type="text" name="solution[1][code]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('solution.1.code') }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm cấp</header>
                                                        <input type="text" name="solution[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('solution.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nơi cấp</header>
                                                        <input type="text" name="solution[1][address]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('solution.1.address') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                                                        <input type="text" name="solution[1][author]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('solution.1.author') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">21. Ứng dụng thực tiễn và thương mại hóa kết quả nghiên cứu</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-application" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="application">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên công nghệ/ giải pháp chuyển giao</header>
                                                        <input type="text" name="application[1][name]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('application.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức, quy mô, địa chỉ áp dụng</header>
                                                        <input type="text" name="application[1][forms]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('application.1.forms ') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm chuyển giao</header>
                                                        <input type="text" name="application[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('application.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                        <input type="text" name="application[1][product]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('application.1.product') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">22. Giải thưởng về hoạt động khoa học và công nghệ</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-prize" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="prize">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức nội dung giải thưởng
                                                        </header>
                                                        <input type="text" name="prize[1][content]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('prize.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nơi tặng
                                                        </header>
                                                        <input type="text" name="prize[1][address]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('prize.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm nhận giải thưởng</header>
                                                        <input type="text" name="prize[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('prize.1.time') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <p class="font-weight-bold">Ghi chú <small>(Photo bằng khen/ Giấy
                                                            khen hoặc giấy chứng nhận đính kèm)</small></p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="prize[file]"
                                                            accept="application/pdf">
                                                        <label class="custom-file-label" for="customFile">Chọn
                                                            file PDF</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">23. Tham gia các chương trình trong và ngoài nước</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-show" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="show">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="show[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('show.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên chương trình
                                                        </header>
                                                        <input type="text" name="show[1][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('show.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chức danh
                                                        </header>
                                                        <input type="text" name="show[1][title]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('show.1.title') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">24. Tham gia các Hiệp hội khoa học, Ban biên tập các Tạp chí khoa học, Ban tổ chức các Hội nghị về khoa học và công nghệ, các hội thảo/ hội nghị trong nước và quốc tế</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-seminor-show" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="seminor-show">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="seminorShow[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('seminorShow.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên hiệp hội/ tạp chí/ hội nghị
                                                        </header>
                                                        <input type="text" name="seminorShow[1][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('seminorShow.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chức danh
                                                        </header>
                                                        <input type="text" name="seminorShow[1][title]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('seminorShow.1.title') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">25. Tham gia làm việc tại các trường Đại học/viện/trung tâm nghiên cứu theo lời mời</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-work-university" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="work-university">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="workUniversity[1][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ old('workUniversity.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trường đại học/ viện/ trung tâm nghiên cứu
                                                        </header>
                                                        <input type="text" name="workUniversity[1][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('workUniversity.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung tham gia
                                                        </header>
                                                        <input type="text" name="workUniversity[1][content]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('workUniversity.1.content') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">26. Kinh nghiệm về quản lý, đánh giá KH&CN</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-experience" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="experience">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên hội đồng, thời gian họp</header>
                                                        <input type="text" name="experience[1][name]"
                                                            class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ old('experience.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Cấp quản lý
                                                        </header>
                                                        <input type="text" name="experience[1][level]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('experience.1.level') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức tham gia
                                                        </header>
                                                        <input type="text" name="experience[1][forms]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('experience.1.forms') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/scienticfic_profile.js') }}"></script>
</section>
@endsection
