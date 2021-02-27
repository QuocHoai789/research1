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
                                Đăng ký thuyết minh đề tài nghiên cứu khoa học
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
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">1. Tên đề
                                            tài</label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="{{ $topicM->name_topic }}" disabled>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">2. Mã số</label>
                                        <input type="text" step="" class="form-control" aria-describedby="helpId"
                                            value="{{ $topicM->id}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">3. Lĩnh vực nghiên
                                            cứu</label>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" @isset($researchType)
                                                            @if (in_array('Tự nhiên',$researchType))
                                                                {{ 'checked' }}
                                                            @endif @endisset disabled>
                                                            Tự nhiên
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col mb-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"  @isset($researchType) @if (in_array('Kinh tế, XHNV',$researchType))
                                                            {{ 'checked' }}
                                                        @endif @endisset disabled>
                                                            Kinh tế, XHNV
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                            @isset($researchType) @if (in_array('Sỡ hữu trí tuệ',$researchType))
                                                                {{ 'checked' }}
                                                            @endif @endisset disabled>
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
                                                            @if (in_array('kỹ thuật',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
                                                            Kỹ thuật
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check mb-3">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                            @if (in_array('An toàn lao động',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
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
                                                            @if (in_array('Môi trường',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
                                                            Môi trường
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                            @if (in_array('Giáo dục',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
                                                            Giáo dục
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="diff-form" value="diff" @if (array_key_exists('diff', $researchType))
                                                                    {{ 'checked' }}
                                                                @endif disabled>
                                                            Khác
                                                            <input type="text" class="form-control technical-diff"
                                                                name="type[diff]"  @if(array_key_exists('diff', $researchType))
                                                                value="{{ $researchType['diff'] }}"
                                                            @endif  disabled>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form enctype="multipart/form-data" class="w-100" method="post"
                                action="{{ route('thuyetminhdetainghiencuukhoahoc',$topicM->id) }}" name="scientific_explanation">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">4. Loại hình nghiên
                                                cứu</label>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="level[]" value="Cơ bản">
                                                                Cơ bản
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="level[]" value="Ứng dụng">
                                                                Ứng dụng
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="level[]" value="Triển khai">
                                                                Triển khai
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">5. Thời gian thực
                                                hiện</label>
                                            <div class="col">
                                                <div class="form-group d-flex">
                                                    <div>
                                                        <header class="blockquote-header">Thời gian bắt đầu</header>
                                                        <input type="text" name="time[timeBefor]"
                                                            class="form-control datepicker-month" aria-describedby="helpId"
                                                            value="{{ old('time.timeBefor') }}"
                                                            required>
                                                    </div>
                                                    <label class="mt-4 ml-3 mr-3">đến</label>
                                                    <div>
                                                        <header class="blockquote-header">Thời gian kết thúc</header>
                                                        <input type="text" name="time[timeEnd]"
                                                            class="form-control datepicker-month" aria-describedby="helpId"
                                                            value="{{ old('time.timeEnd') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="name-title ml-3">6. Đơn vị chủ trì</label>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tên đơn vị</header>
                                                    <input type="text" name="organization[name]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('organization.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ</header>
                                                    <input type="text" name="organization[address]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('organization.address') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="organization[phoneNumber]" class="form-control only-number"
                                                        aria-describedby="helpId" 
                                                        value="{{ old('organization.phoneNumber') }}"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Fax</header>
                                                    <input type="text" name="organization[fax]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('organization.fax') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Email</header>
                                                    <input type="email" name="organization[email]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('organization.email') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="name-title ml-3">7. Chủ nhiệm đề tài</label>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Họ và tên</header>
                                                    <input type="text" name="topicManager[name]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Học vị, chức danh KH</header>
                                                    <input type="text" name="topicManager[degree]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.degree') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chức vụ</header>
                                                    <input type="text" name="topicManager[position]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.position') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2 pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ cơ quan</header>
                                                    <input type="text" name="topicManager[addressOrgan]"
                                                        class="form-control" aria-describedby="helpId"
                                                        value="{{ old('topicManager.addressOrgan') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ nhà riêng</header>
                                                    <input type="text" name="topicManager[addressHome]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.addressHome') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2 pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại cơ quan</header>
                                                    <input type="text" name="topicManager[phoneOrgan]" class="form-control only-number"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.phoneOrgan') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại nhà riêng</header>
                                                    <input type="text" name="topicManager[phoneHome]" class="form-control only-number"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.phoneHome') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại di động</header>
                                                    <input type="text" name="topicManager[phoneMobile]" class="form-control only-number"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.phoneMobile') }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2 pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Fax</header>
                                                    <input type="text" name="topicManager[fax]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.fax') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Email</header>
                                                    <input type="email" name="topicManager[email]" class="form-control"
                                                        aria-describedby="helpId"
                                                        value="{{ old('topicManager.email') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">8. Những người tham gia thực hiện đề tài</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-member" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="member">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Họ và tên</header>
                                                        <input type="text" name="member[1][name]" class="form-control "
                                                            aria-describedby="helpId"
                                                            value="{{ old('member.1.name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn vị công tác và lĩnh vực
                                                            chuyên môn
                                                        </header>
                                                        <input type="text" name="member[1][expertise]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('member.1.expertise') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung nghiên cứu cụ thể
                                                            được giao</header>
                                                        <input type="text" name="member[1][content]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('member.1.content') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">9. Đơn vị phối hợp chính</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-coordination"
                                                btn-lg btn-block">Thêm</button>
                                        </div>
                                        <div class="coordination">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên đơn vị trong và ngoài nước
                                                        </header>
                                                        <input type="text" name="coordination[1][nameUnit]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('coordination.1.nameUnit') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg ">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung phối hợp nghiên cứu
                                                        </header>
                                                        <input type="text" name="coordination[1][content]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ old('coordination.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Họ và tên người đại diện đơn
                                                            vị</header>
                                                        <input type="text" name="coordination[1][nameUser]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ old('coordination.1.nameUser') }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">10. Tính cấp thiết của đề tài</label>
                                        <textarea class="form-control" name="necessity" id="exampleFormControlTextarea1"
                                            rows="4"
                                            placeholder="Tính cấp thiết">{{ old('necessity') }}</textarea>
                                    </div>

                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">11. Mục tiêu của đề tài</label>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Mục tiêu chung</header>
                                            <textarea class="form-control" name="target[general]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('target.general') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Mục tiêu cụ thể</header>
                                            <textarea class="form-control" name="target[private]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('target.private') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">12. Đối tượng, phạm vi nghiên cứu</label>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Đối tượng nghiên cứu</header>
                                            <textarea class="form-control" name="research[object]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('research.object') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Phạm vi nghiên cứu</header>
                                            <textarea class="form-control" name="research[scope]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('research.scope') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">13. Các tiếp cận, phương pháp nghiên cứu</label>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Cách tiếp cận</header>
                                            <textarea class="form-control" name="research[approach]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('research.approach') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Phương pháp nghiên cứu</header>
                                            <textarea class="form-control" name="research[method]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('research.method') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">14. Nội dung nghiên cứu</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <header class="blockquote-header">Nội dung nghiên cứu</header>
                                            <textarea class="form-control" name="research[content]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>{{ old('research.content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <label class="name-title">15. Tiến độ thực hiện</label>
                                            <div class="col-12 col-lg-12 border border-primary pt-3">
                                                <div class="row mb-3 justify-content-end mr-2">
                                                    <button type="button" count="2" class="btn btn-primary add-progress"
                                                        btn-lg btn-block">Thêm</button>
                                                </div>
                                                <div class="form-progress">
                                                    <div class="row">
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Các nội dung, công
                                                                    việc
                                                                    thực hiện</header> <input type="text"
                                                                    name="progress[1][content]" class="form-control"
                                                                    aria-describedby="helpId"
                                                                    value="{{ old('progress.1.content') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Sản phẩm</header>
                                                                <input type="text" name="progress[1][product]"
                                                                    class="form-control" aria-describedby="helpId"
                                                                    value="{{ old('progress.1.product') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group d-flex">
                                                                <div>
                                                                    <header class="blockquote-header">Thời gian bắt đầu</header>
                                                                    <input type="text" name="progress[1][timeBefor]"
                                                                        class="form-control datepicker-month"
                                                                        aria-describedby="helpId"
                                                                        value="{{ old('progress.1.timeBefor') }}" required>
                                                                </div> <label class="mt-4 ml-3 mr-3">đến</label>
                                                                <div>
                                                                    <header class="blockquote-header">Thời gian kết thúc</header>
                                                                    <input type="text" name="progress[1][timeEnd]"
                                                                        class="form-control datepicker-month"
                                                                        aria-describedby="helpId"
                                                                        value="{{ old('progress.1.timeEnd') }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-11 col-lg mr-55">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Người thực hiện
                                                                </header>
                                                                <input type="text" name="progress[1][user]"
                                                                    class="form-control" aria-describedby="helpId"
                                                                    value="{{ old('progress.1.user') }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-12 col-lg-12" id="productScience">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">16. Sản phẩm khoa
                                                học</label><small><i> (*) Chọn ít nhất 1 sản phẩm khoa học</i></small>
                                            <div class="col-lg-8 ml-5 pl-5 pt-3">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" value="Sách chuyên khảo">
                                                                Sách chuyên khảo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]"
                                                                    value="Bài báo đăng Tạp chí nước ngoài">
                                                                Bài báo đăng Tạp chí nước ngoài
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" value="Sách tham khảo">
                                                                Sách tham khảo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]"
                                                                    value="Bài báo đăng Tạp chí trong nước">
                                                                Bài báo đăng Tạp chí trong nước
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" value="Giáo trình">
                                                                Giáo trình
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]"
                                                                    value="Bài đăng Kỷ yếu HN/HT quốc tế">
                                                                Bài đăng Kỷ yếu HN/HT quốc tế
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="message-error mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">
                                                17. Sản phẩm đào tạo
                                            </label>
                                            <div class="col-lg-8 ml-5 pl-5 pt-3">
                                                <div class="row">
                                                    <input type="hidden" name="checkProductEducate" @isset($degree['name'])
                                                    value="{{ $degree['name'] }}"
                                                    @endisset id="degree">
                                                    @for($i=1;$i<$topicM->user->degree;$i++)
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="{{ $i }}">
                                                                <span>{{ degreeName($i) }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endfor
                                                    {{-- <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="5">
                                                                <span>Giáo sư</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="4">
                                                                <span>Phó giáo sư</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="3">
                                                                <span>Tiến sĩ</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="2">
                                                                <span>Thạc sĩ</span>
                                                            </label>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productEducate[]" value="1">
                                                                <span>Kỹ sư</span>
                                                            </label>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">18. Sản phẩm ứng
                                                dụng</label>
                                            <div class="col-lg-12 pt-3">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Mẫu">
                                                                Mẫu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Sơ đồ, bản thiết kế">
                                                                Sơ đồ, bản thiết kế
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Phương pháp">
                                                                Phương pháp
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Luật chứng kinh tế">
                                                                Luật chứng kinh tế
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Vật liệu">
                                                                Vật liệu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Tài liệu dự báo">
                                                                Tài liệu dự báo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Quy phạm">
                                                                Quy phạm
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Quy trình công nghệ">
                                                                Quy trình công nghệ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Thiết bị máy móc">
                                                                Thiết bị máy móc
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Bản kiến nghị">
                                                                Bản kiến nghị
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Báo cáo phân tích">
                                                                Báo cáo phân tích
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Dây chuyền công nghệ">
                                                                Dây chuyền công nghệ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Tiêu chuẩn">
                                                                Tiêu chuẩn
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Đề án">
                                                                Đề án
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Bản quy hoạch">
                                                                Bản quy hoạch
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" value="Chương trình máy tính">
                                                                Chương trình máy tính
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">19. Các sản phẩm khác</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <header class="blockquote-header">Ghi rõ sản phẩm gì?</header>
                                            <textarea class="form-control" name="productDiff"
                                                id="exampleFormControlTextarea1" rows="4" >{{ old('productDiff') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">20. Hiệu quả</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <header class="blockquote-header">Giáo dục và đào tạo, kinh tế-xã hội
                                            </header>
                                            <textarea class="form-control" name="effective"
                                                id="exampleFormControlTextarea1" rows="4"
                                                >{{ old('effective') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">21. Phương thức chuyển giao kết quả nghiên cứu và địa
                                            chỉ ứng dụng</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <header class="blockquote-header">Nếu có</header>
                                            <textarea class="form-control" name="method"
                                                id="exampleFormControlTextarea1"
                                                rows="4">{{ old('method') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">22. Chi công lao động tham gia trực tiếp thực hiện đề
                                            tài</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-labor" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="labor">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="labor[1][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ old('labor.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian trả lương</header>
                                                        <input type="text" name="labor[1][time]"
                                                            class="form-control datepicker-month"
                                                            aria-describedby="helpId"
                                                            value="{{ old('labor.1.time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số ngày công</header>
                                                        <input type="text" name="labor[1][worker]"
                                                            class="form-control worker" aria-describedby="helpId"
                                                            value="0" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hệ số</header>
                                                        <select class="custom-select expense coefficient"
                                                            id="inputGroupSelect02" name="labor[1][coefficient]">
                                                            <option value="0.55" selected>0,55</option>
                                                            <option value="0.26">0,26</option>
                                                            <option value="0.16">0,16</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Lương cơ bản</header>
                                                        <input type="text" name="labor[1][salary]"
                                                            class="form-control salary" aria-describedby="helpId"
                                                            value="{{ number_format($basicSalary->value) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="labor[1][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="labor[total]" class="form-control"
                                                        id="total-labor" aria-describedby="helpId" readonly value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">23. Chi mua nguyên liệu</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-resources" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="resources">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="resources[1][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ old('resources.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="resources[1][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="1" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="resources[1][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="0">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="resources[1][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="resources[total]" class="form-control"
                                                        id="total-resources" aria-describedby="helpId" readonly
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">24. Chi phí sửa chữa, mua sắm tài sản cố định</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-repair" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="repair">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="repair[1][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ old('repair.1.content') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="repair[1][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="1" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="repair[1][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="0">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="repair[1][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="repair[total]" class="form-control"
                                                        id="total-repair" aria-describedby="helpId" readonly value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">25. Chi phí khác</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="2" class="btn btn-primary add-diff" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="diff">
                                            <div class="row">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="costDiff[1][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="nghiệp thu đề tài" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="costDiff[1][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="1" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="costDiff[1][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="0">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg mr-55">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="costDiff[1][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="costDiff[total]" class="form-control"
                                                        id="total-diff" aria-describedby="helpId" readonly value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 justify-content-end">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                </div>
                            </form>
                            <div class="message-submit m-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/scientific_explanation.js') }}"></script>
    <script>
        $('#diff-form').change(function () {
            if ($(this).is(':checked')) {
                $('.technical-diff').prop("disabled", false);
            } else {
                $('.technical-diff').prop("disabled", true);
            }
        });
        
    </script>
    <script src=".\js\validate_scientific_explanation.js"></script>
</section>
@endsection
