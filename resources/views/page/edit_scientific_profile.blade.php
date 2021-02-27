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
                                Chỉnh sửa lý lịch khoa học
                            </h3>
                        </div>
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif
                        <div class="flex-wr-sb-s p-t-15">
                            <form enctype="multipart/form-data" class="w-100" method="post"
                                action="{{ route('chinhsuadetaichunhiemdetai') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">1. Họ và
                                                tên</label>
                                            <input type="text" step="" class="form-control" name="name"
                                                aria-describedby="helpId" placeholder="" required
                                                value="{{ $data->name}}" required>
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
                                                            value="1" @if ($data->gender==1)
                                                                {{ "checked" }}
                                                            @endif>Nam
                                                    </label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="gender"
                                                            value="0" @if ($data->gender==0)
                                                            {{ "checked" }}
                                                        @endif>Nữ
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
                                                value="{{ $data->birthplace}}" required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">4. Năm sinh</label>
                                            <input type="text" name="birthday" class="form-control datepicker-year"
                                                placeholder="d-m-y" aria-describedby="helpId"
                                                value="{{ date('Y',strtotime($data->birthday)) }}" required>
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
                                                @isset ($academic->name)value="{{ $academic->name }}"@endisset>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title"></label>
                                            <input type="text" name="academic[time]"
                                                class="form-control mt-3 datepicker-year"
                                                placeholder="Năm được phong học hàm" aria-describedby="helpId"
                                                @isset ($academic->time)value="{{ $academic->time }}"@endisset>
                                            <i class="far fa-calendar-alt float-right icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">6. Học vị</label>
                                            <select class="custom-select expense" id="inputGroupSelect02" name="degree[name]" required>
                                                <option value="kỹ sư" @isset($degree->name)
                                                    @if ($degree->name=='kỹ sư')
                                                        {{ 'selected' }}
                                                    @endif
                                                @endisset>Kỹ sư</option>
                                                <option value="thạc sĩ" @isset($degree->name)
                                                    @if ($degree->name=='thạc sĩ')
                                                        {{ 'selected' }}
                                                    @endif
                                                @endisset>Thạc sĩ</option>
                                                <option value="tiến sĩ" @isset($degree->name)
                                                    @if ($degree->name=='tiến sĩ')
                                                        {{ 'selected' }}
                                                    @endif
                                                @endisset>Tiến sĩ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title"></label>
                                            <input type="text" name="degree[time]"
                                                class="form-control mt-3 datepicker-year" placeholder="Năm đạt học vị"
                                                aria-describedby="helpId"
                                               @isset ($degree->time)value="{{ $degree->time }}"@endisset required>
                                            <i class="far fa-calendar-alt float-right icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="name-title">7. Chức vụ hiện nay</label>
                                            <input type="text" name="position" class="form-control" placeholder="nếu có"
                                                aria-describedby="helpId" value="{{ $data->position }}" >
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
                                                        aria-describedby="helpId"@isset ($contact)
                                                        value="{{ $contact->address }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="contact[phoneNumber]" class="form-control"
                                                        aria-describedby="helpId" @isset ($contact)
                                                        value="{{ $contact->phoneNumber }}"
                                                        @endisset required>
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
                                                        aria-describedby="helpId" @isset ($contact)
                                                        value="{{ $contact->email }}"
                                                        @endisset required>
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
                                                        aria-describedby="helpId" @isset($workPlace)
                                                        value="{{ $workPlace->nameAgency }}"    
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="workPlace[phoneNumber]" class="form-control"
                                                        aria-describedby="helpId" @isset($workPlace)
                                                        value="{{ $workPlace->phoneNumber }}"    
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Fax</header>
                                                    <input type="text" name="workPlace[fax]" class="form-control"
                                                        aria-describedby="helpId" @isset($workPlace)
                                                        value="{{ $workPlace->fax }}"    
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ</header>
                                                    <input type="text" name="workPlace[address]" class="form-control"
                                                        aria-describedby="helpId" @isset($workPlace)
                                                        value="{{ $workPlace->address }}"    
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Website</header>
                                                    <input type="text" name="workPlace[website]" class="form-control"
                                                        aria-describedby="helpId" @isset($workPlace)
                                                        value="{{ $workPlace->website }}"    
                                                        @endisset required>
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
                                                        class="form-control" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->university->address }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[university][specialize]"
                                                        class="form-control" aria-describedby="helpId" @isset($eduProcess)
                                                        value="{{ $eduProcess->university->specialize }}"
                                                        @endisset 
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[university][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId" @isset($eduProcess)
                                                        value="{{ $eduProcess->university->time }}"
                                                        @endisset
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
                                                        class="form-control" aria-describedby="helpId" @isset($eduProcess)
                                                        value="{{ $eduProcess->master->address }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[master][specialize]"
                                                        class="form-control" aria-describedby="helpId" @isset($eduProcess)
                                                        value="{{ $eduProcess->master->specialize }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[master][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->master->time }}"
                                                        @endisset>
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
                                                        class="form-control" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->doctor->address }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[doctor][specialize]"
                                                        class="form-control" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->doctor->specialize }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[doctor][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->doctor->time }}"
                                                        @endisset>
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
                                                        class="form-control" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->intern->address }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chuyên môn</header>
                                                    <input type="text" name="eduProcess[intern][specialize]"
                                                        class="form-control" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->intern->specialize }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Năm tốt nghiệp</header>
                                                    <input type="text" name="eduProcess[intern][time]"
                                                        class="form-control datepicker-year" aria-describedby="helpId"@isset($eduProcess)
                                                        value="{{ $eduProcess->intern->time }}"
                                                        @endisset>
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
                                            <button type="button" count="<?php if(isset($language)) echo count($language)+1;else echo 2 ?>" class="btn btn-primary add-language" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="language">
                                            @isset($language)
                                            <?php $count=0 ?>
                                                @foreach ($language as $item)
                                            <?php ++$count ?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên ngoại ngữ
                                                        </header>
                                                        <input type="text" name="language[{{ $count }}][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['name'] }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trình độ</header>
                                                        <input type="text" name="language[{{ $count }}][level]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{$item['level'] }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3">
                                                    <i class="far fa-window-close language-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">12. Quá trình công tác</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($workProcess)) echo count($workProcess)+1;else echo 2 ?>" class="btn btn-primary add-work-process" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="work-process">
                                            @isset($workProcess)
                                                @foreach ($workProcess as $item)
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group d-flex">
                                                        <div>
                                                            <header class="blockquote-header">Thời gian</header>
                                                            <input type="text" name="work[1][timeBefor]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['timeBefor'] }}"
                                                                required>
                                                        </div>
                                                        <label class="mt-4 ml-3 mr-3">đến</label>
                                                        <div>
                                                            <header class="blockquote-header">đến năm</header>
                                                            <input type="text" name="work[1][timeEnd]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['timeEnd'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vị trí công tác</header>
                                                        <input type="text" name="work[1][workplace]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['workplace'] }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Lĩnh vực chuyên môn</header>
                                                        <input type="text" name="work[1][specialize]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['specialize']}}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn vị công tác</header>
                                                        <input type="text" name="work[1][unit]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['unit'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close work-process-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
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
                                                            @isset($areasOfExpertise) value="{{ $areasOfExpertise->field }}" @endisset required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chuyên ngành</header>
                                                        <input type="text" name="areasOfExpertise[specialized]"
                                                            class="form-control" aria-describedby="helpId"@isset($areasOfExpertise) value="{{ $areasOfExpertise->specialized }}" @endisset required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chuyên môn</header>
                                                        <input type="text" name="areasOfExpertise[expertise]"
                                                            class="form-control" aria-describedby="helpId"@isset($areasOfExpertise) value="{{ $areasOfExpertise->expertise}}" @endisset required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <div class="form-group">
                                                <header class="blockquote-header">Hướng nghiên cứu</header>
                                                <textarea class="form-control" name="areasOfExpertise[direction]" id="exampleFormControlTextarea1"
                                                    rows="4" required>@isset($areasOfExpertise){{ $areasOfExpertise->direction }}@endisset</textarea>
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
                                            <button type="button" count="<?php if(isset($topicScience)) echo count($topicScience)+1;else echo 2 ?>" class="btn btn-primary add-science" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="science">
                                            @isset($topicScience)
                                            <?php $count=0 ?>
                                            @foreach ($topicScience as $item)
                                            <?php ++$count ?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên đề tài</header>
                                                        <input type="text" name="science[{{ $count }}][name]" class="form-control "
                                                            aria-describedby="helpId"
                                                            value="{{ $item['name']}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Cấp quản lý
                                                        </header>
                                                        <input type="text" name="science[{{ $count }}][level]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['level'] }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="science[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg ">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vai trò dự án
                                                        </header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="science[{{ $count }}][position]">
                                                            <option value="Chủ nhiệm" <?php if($item['position']=='Chủ nhiệm') echo 'selected' ?>>Chủ nhiệm</option>
                                                            <option value="Tham gia" <?php if($item['position']=='Tham gia') echo 'selected' ?>>Tham gia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trình trạng</header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="science[{{ $count }}][status]">
                                                            <option value="Đã nghiệm thu- xếp loại Khá" <?php if($item["status"]=='Đã nghiệm thu- xếp loại Khá') echo 'selected' ?>>Đã nghiệm thu- xếp loại Khá</option>
                                                            <option value="Đã nghiệm thu- xếp loại Tốt" <?php if($item["status"]=='Đã nghiệm thu- xếp loại Tốt') echo 'selected' ?>>Đã nghiệm thu- xếp loại Tốt</option>
                                                            <option value="Chưa nghiệm thu" <?php if($item["status"]=='Đã nghiệm thu- xếp loại Tốt') echo 'selected' ?>>Chưa nghiệm thu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close science-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">15. Hướng dẫn sinh viên, học viên cao học, nghiên cứu sinh</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($guideStudent)) echo count($guideStudent)+1;else echo 2 ?>" class="btn btn-primary add-guide" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="guide">
                                            <?php $count=0 ?>
                                            @isset($guideStudent)
                                            @foreach ($guideStudent as $item)
                                            <?php ++$count ?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên luận văn, luận án</header>
                                                        <input type="text" name="guide[{{ $count }}][nameTopic]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['nameTopic'] }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên sinh viên</header>
                                                        <input type="text" name="guide[{{ $count }}][nameStudent]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['nameStudent'] }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Bậc đào tạo</header>
                                                        <input type="text" name="guide[{{ $count }}][level]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['level'] }}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-2">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                                                        <input type="text" name="guide[{{ $count }}][product]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['product']}}" >
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm tốt nghiệp</header>
                                                        <input type="text" name="guide[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time']}}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3">
                                                    <i class="far fa-window-close guide-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
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
                                            <button type="button" count="<?php if(isset($document)) echo count($document);else echo 2 ?>" class="btn btn-primary add-document" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="document">
                                            @isset($document)
                                            <?php $count=0 ?>
                                                @foreach ($document as $key=>$item)
                                                <?php ++$count; if($key=='file')continue; ?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên sách
                                                        </header>
                                                        <input type="text" name="document[{{ $count }}][name]" class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['name']}}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nhà suất bản</header>
                                                        <input type="text" name="document[{{ $count }}][publisher]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['publisher'] }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Vai trò</header>
                                                        <select class="custom-select expense" id="inputGroupSelect02"
                                                            name="document[{{ $count }}][position]">
                                                            <option value="Tác giả" <?php if($item['position']=='Tác giả') echo 'selected' ?>>Tác giả</option>
                                                            <option value="Tham gia" <?php if($item['position']=='Tham gia') echo 'selected' ?> >Tham gia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số hiệu ISBN</header>
                                                        <input type="text" name="document[{{ $count }}][code]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['code'] }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm xuất bản</header>
                                                        <input type="text" name="document[{{ $count }}][time]"
                                                            class="form-control  datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time']}}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close document-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">17. Các bài báo đã công bố</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($article)) echo count($article);else echo 2 ?>" class="btn btn-primary add-article" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="article">
                                            @isset($article)
                                            <?php $count=0 ?>
                                            @foreach ($article as $key=>$item)
                                            <?php if($key=='file') continue;++$count; ?>
                                            <div class="pt-2 border-bottom border-info pt-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Nơi đăng bài viết</header>
                                                            <select class="custom-select expense" id="inputGroupSelect02" name="article[{{ $count }}][on]">
                                                                <option value="journal"<?php if($item['on']=='journal') echo 'selected' ?>>Đăng trên tạp chí</option>
                                                                <option value="seminor"<?php if($item['on']=='seminor') echo 'selected' ?> >Đăng trên kỷ yếu hội nghị, hội thảo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên tác giải</header>
                                                            <input type="text" name="article[{{ $count }}][nameAuthor]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['nameAuthor'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên bài viết</header>
                                                            <input type="text" name="article[{{ $count }}][namePost]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['namePost'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên tạp chí/ hội nghị/ hội thảo</header>
                                                            <input type="text" name="article[{{ $count }}][nameEvent]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['nameEvent'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Trang bài viết</header>
                                                            <input type="text" name="article[{{ $count }}][page]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['page'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Năm xuất bản</header>
                                                            <input type="text" name="article[{{ $count }}][time]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['time'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                                                            <input type="text" name="article[{{ $count }}][product]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['product'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-11 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Số hiệu ISSN/ ISBN</header>
                                                            <input type="text" name="article[{{ $count }}][code]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['code'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close article-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">18. Hướng dẫn sinh viên (học viên cao học, nghiên cứu sinh) nghiên cứu khoa học đạt giải thưởng:</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($studentAwards)) echo count($studentAwards)+1;else echo 1 ?>" class="btn btn-primary add-student-awards" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="student-awards">
                                            @isset($studentAwards)
                                                <?php $count=0?>
                                                @foreach ($studentAwards as $item)
                                                <?php ++$count?>
                                            <div class="pt-2 border-bottom border-info pt-3">   
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên đề tài</header>
                                                            <input type="text" name="studentAwards[{{ $count }}][nameTopic]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['nameTopic']}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Họ và tên sinh viên</header>
                                                            <input type="text" name="studentAwards[{{ $count }}][nameStudent]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['nameStudent'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">   
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kết quả giải thưởng</header>
                                                            <input type="text" name="studentAwards[{{ $count }}][result]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['result'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Cấp thưởng</header>
                                                            <input type="text" name="studentAwards[{{ $count }}][prize]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['prize'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-11 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Năm đạt giải</header>
                                                            <input type="text" name="studentAwards[{{ $count }}][time]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['time'] }}"
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close student-awards-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">19. Bằng phát minh, sáng chế</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($license)) echo count($license)+1;else echo 1 ?>" class="btn btn-primary add-license" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="license">
                                            @isset($license)
                                            <?php $count=0 ?>
                                            @foreach ($license as $item)
                                            <?php ++$count ?>
                                            <div class="border-bottom pt-2 border-info pt-3">   
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên và nội dung văn bằng</header>
                                                            <input type="text" name="license[{{ $count }}][name]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                            <input type="text" name="license[{{ $count }}][product]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['product'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">   
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Số hiệu</header>
                                                            <input type="text" name="license[{{ $count }}][code]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['code'] }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Năm cấp</header>
                                                            <input type="text" name="license[{{ $count }}][time]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['time'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Nơi cấp</header>
                                                            <input type="text" name="license[{{ $count }}][address]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['address'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-11 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                                                            <input type="text" name="license[{{ $count }}][author]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['author'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close license-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">20. Các giải pháp hữu ích</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($solution)) echo count($solution)+1;else echo 1 ?>" class="btn btn-primary add-solution" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="solution">
                                            @isset($solution)
                                            <?php $count=0; ?>
                                                @foreach ($solution as $item)
                                            <?php ++$count; ?>
                                            <div class="border-bottom pt-2 border-info pt-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tên và nội dung giải pháp</header>
                                                            <input type="text" name="solution[{{ $count }}][name]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                            <input type="text" name="solution[{{ $count }}][product]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['product'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">   
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Số hiệu</header>
                                                            <input type="text" name="solution[{{ $count }}][code]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['code'] }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Năm cấp</header>
                                                            <input type="text" name="solution[{{ $count }}][time]"
                                                                class="form-control datepicker-year"
                                                                aria-describedby="helpId"
                                                                value="{{ $item['time'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Nơi cấp</header>
                                                            <input type="text" name="solution[{{ $count }}][address]"
                                                                class="form-control" aria-describedby="helpId"
                                                                value="{{ $item['address'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                                                            <input type="text" name="solution[{{ $count }}][author]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['author'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close solution-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">21. Ứng dụng thực tiễn và thương mại hóa kết quả nghiên cứu</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($application)) echo count($application)+1;else echo 1 ?>" class="btn btn-primary add-application" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="application">
                                            @isset($application)
                                            <?php $count=0?>
                                                @foreach ($application as $item)
                                            <?php ++$count?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên công nghệ/ giải pháp chuyển giao</header>
                                                        <input type="text" name="application[{{ $count }}][name]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức, quy mô, địa chỉ áp dụng</header>
                                                        <input type="text" name="application[{{ $count }}][forms]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['forms'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm chuyển giao</header>
                                                        <input type="text" name="application[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                                                        <input type="text" name="application[{{ $count }}][product]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['product'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close application-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">22. Giải thưởng về hoạt động khoa học và công nghệ</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($prize)) echo count($prize);else echo 1 ?>" class="btn btn-primary add-prize" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="prize">
                                            @isset($prize)
                                            <?php $count=0;?>
                                            @foreach ($prize as $key=>$item)
                                            <?php if($key=='file') continue;++$count;?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức nội dung giải thưởng
                                                        </header>
                                                        <input type="text" name="prize[{{ $count }}][content]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nơi tặng
                                                        </header>
                                                        <input type="text" name="prize[{{ $count }}][address]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['address'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Năm nhận giải thưởng</header>
                                                        <input type="text" name="prize[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close prize-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">23. Tham gia các chương trình trong và ngoài nước</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($show)) echo count($show)+1;else echo 1 ?>" class="btn btn-primary add-show" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="show">
                                            @isset($show)
                                            <?php $count=0?>
                                                @foreach ($show as $item)
                                            <?php ++$count?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="show[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên chương trình
                                                        </header>
                                                        <input type="text" name="show[{{ $count }}][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chức danh
                                                        </header>
                                                        <input type="text" name="show[{{ $count }}][title]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['title'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close show-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">24. Tham gia các Hiệp hội khoa học, Ban biên tập các Tạp chí khoa học, Ban tổ chức các Hội nghị về khoa học và công nghệ, các hội thảo/ hội nghị trong nước và quốc tế</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($seminorShow)) echo count($seminorShow)+1;else echo 1 ?>" class="btn btn-primary add-seminor-show" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="seminor-show">
                                            @isset($seminorShow)
                                            <?php $count=0?>
                                                @foreach ($seminorShow as $item)
                                            <?php ++$count?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="seminorShow[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên hiệp hội/ tạp chí/ hội nghị
                                                        </header>
                                                        <input type="text" name="seminorShow[{{ $count }}][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{$item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Chức danh
                                                        </header>
                                                        <input type="text" name="seminorShow[{{ $count }}][title]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['title'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close seminor-show-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">25. Tham gia làm việc tại các trường Đại học/viện/trung tâm nghiên cứu theo lời mời</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($workUniversity)) echo count($workUniversity)+1;else echo 1 ?>" class="btn btn-primary add-work-university" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="work-university">
                                            @isset($workUniversity)
                                            <?php $count=0?>
                                                @foreach ($workUniversity as $item)
                                            <?php ++$count?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="workUniversity[{{ $count }}][time]"
                                                            class="form-control datepicker-year"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Trường đại học/ viện/ trung tâm nghiên cứu
                                                        </header>
                                                        <input type="text" name="workUniversity[{{ $count }}][name]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung tham gia
                                                        </header>
                                                        <input type="text" name="workUniversity[{{ $count }}][content]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close work-university-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">26. Kinh nghiệm về quản lý, đánh giá KH&CN</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($experience)) echo count($experience)+1;else echo 1 ?>" class="btn btn-primary add-experience" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="experience">
                                            @isset($experience)
                                            <?php $count=0?>
                                                @foreach ($experience as $item)
                                            <?php ++$count?>
                                            <div class="row border-bottom border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên hội đồng, thời gian họp</header>
                                                        <input type="text" name="experience[{{ $count }}][name]"
                                                            class="form-control"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Cấp quản lý
                                                        </header>
                                                        <input type="text" name="experience[{{ $count }}][level]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['level'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hình thức tham gia
                                                        </header>
                                                        <input type="text" name="experience[{{ $count }}][forms]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['forms'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close experience-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
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
