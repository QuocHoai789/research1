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
                                Chỉnh sửa thuyết minh đề tài nghiên cứu khoa học
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
                                                            <input type="checkbox" class="form-check-input" @if (in_array('Tự nhiên',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
                                                            Tự nhiên
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col mb-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"  @if (in_array('Kinh tế, XHNV',$researchType))
                                                            {{ 'checked' }}
                                                        @endif disabled>
                                                            Kinh tế, XHNV
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                            @if (in_array('Sỡ hữu trí tuệ',$researchType))
                                                                {{ 'checked' }}
                                                            @endif disabled>
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
                            <form enctype="multipart/form-data" class="w-100" method="post" action="{{ route('editthuyetminhdetainghiencuukhoahoc',$topicM->id) }}" name="scientific_explanation">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">4. Loại hình nghiên
                                                cứu</label>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input"
                                                                        name="level[]" value="Cơ bản" @isset($researchLevel)
                                                                            @if (in_array('Cơ bản', $researchLevel))
                                                                                {{ 'checked' }}
                                                                            @endif
                                                                        @endisset>
                                                                        Cơ bản
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="level[]" value="Ứng dụng" @isset($researchLevel)
                                                                            @if (in_array('Ứng dụng', $researchLevel))
                                                                                {{ 'checked' }}
                                                                            @endif
                                                                        @endisset>
                                                                        Ứng dụng
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="level[]" value="Triển khai" @isset($researchLevel)
                                                                            @if (in_array('Triển khai', $researchLevel))
                                                                                {{ 'checked' }}
                                                                            @endif
                                                                        @endisset>
                                                                        Triển khai
                                                                    </label>
                                                                </div>
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
                                                        <header class="blockquote-header">Thời gian</header>
                                                        <input type="text" name="time[timeBefor]"
                                                            class="form-control datepicker" aria-describedby="helpId"
                                                            @isset($researchTime)
                                                            value="{{ $researchTime->timeBefor }}"
                                                            @endisset
                                                            required>
                                                    </div>
                                                    <label class="mt-4 ml-3 mr-3">đến</label>
                                                    <div>
                                                        <header class="blockquote-header">đến năm</header>
                                                        <input type="text" name="time[timeEnd]"
                                                            class="form-control datepicker" aria-describedby="helpId"
                                                            @isset($researchTime)
                                                            value="{{ $researchTime->timeEnd }}"
                                                            @endisset required>
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
                                                        aria-describedby="helpId" @isset($organization)
                                                        value="{{ $organization->name }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ</header>
                                                    <input type="text" name="organization[address]" class="form-control"
                                                        aria-describedby="helpId" @isset($organization)
                                                        value="{{ $organization->address }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại</header>
                                                    <input type="text" name="organization[phoneNumber]" class="form-control"
                                                        aria-describedby="helpId" @isset($organization)
                                                        value="{{ $organization->phoneNumber }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Fax</header>
                                                    <input type="text" name="organization[fax]" class="form-control"
                                                        aria-describedby="helpId" @isset($organization)
                                                        value="{{ $organization->fax }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Email</header>
                                                    <input type="email" name="organization[email]" class="form-control"
                                                        aria-describedby="helpId" @isset($organization)
                                                        value="{{ $organization->email }}"
                                                        @endisset required>
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
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->name }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Học vị, chức danh KH</header>
                                                    <input type="text" name="topicManager[degree]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->degree }}"
                                                        @endisset required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Chức vụ</header>
                                                    <input type="text" name="topicManager[position]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->position }}"
                                                        @endisset required>
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
                                                        class="form-control" aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->addressOrgan }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Địa chỉ nhà riêng</header>
                                                    <input type="text" name="topicManager[addressHome]" class="form-control"
                                                        aria-describedby="helpId"  @isset($topicManager)
                                                        value="{{ $topicManager->addressHome }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ml-2 pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại cơ quan</header>
                                                    <input type="text" name="topicManager[phoneOrgan]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->phoneOrgan }}"
                                                        @endisset >
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại nhà riêng</header>
                                                    <input type="text" name="topicManager[phoneHome]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->phoneHome }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Điện thoại di động</header>
                                                    <input type="text" name="topicManager[phoneMobile]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->phoneMobile }}"
                                                        @endisset required>
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
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->fax }}"
                                                        @endisset>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Email</header>
                                                    <input type="email" name="topicManager[email]" class="form-control"
                                                        aria-describedby="helpId" @isset($topicManager)
                                                        value="{{ $topicManager->email }}"
                                                        @endisset required>
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
                                            <button type="button" count="<?php if(isset($member)) echo count($member)+1;else echo 2?>" class="btn btn-primary add-member" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="member">
                                            @isset($member)
                                            @php
                                                $count =0;
                                            @endphp
                                            @foreach ($member as $item)
                                            @php
                                                ++$count;
                                            @endphp
                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Họ và tên</header>
                                                        <input type="text" name="member[{{ $count }}][name]" class="form-control "
                                                            aria-describedby="helpId"
                                                            value="{{ $item['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn vị công tác và lĩnh vực
                                                            chuyên môn
                                                        </header>
                                                        <input type="text" name="member[{{ $count }}][expertise]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['expertise']}}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung nghiên cứu cụ thể
                                                            được giao</header>
                                                        <input type="text" name="member[{{ $count }}][content]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['content']}}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close member-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">9. Đơn vị phối hợp chính</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($coordination)) echo count($coordination)+1;else echo 2?>" class="btn btn-primary add-coordination"
                                                btn-lg btn-block">Thêm</button>
                                        </div>
                                        <div class="coordination">
                                            @isset($coordination)
                                            @php
                                                $count =0;
                                            @endphp
                                            @foreach ($coordination as $item)
                                            @php
                                                ++$count;
                                            @endphp
                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Tên đơn vị trong và ngoài nước
                                                        </header>
                                                        <input type="text" name="coordination[{{ $count }}][nameUnit]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['nameUnit'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg ">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung phối hợp nghiên cứu
                                                        </header>
                                                        <input type="text" name="coordination[{{ $count }}][content]"
                                                            class="form-control" aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Họ và tên người đại diện đơn
                                                            vị</header>
                                                        <input type="text" name="coordination[{{ $count }}][nameUser]"
                                                            class="form-control " aria-describedby="helpId"
                                                            value="{{ $item['nameUser'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close coordination-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">10. Tính cấp thiết của đề tài</label>
                                        <textarea class="form-control" name="necessity" id="exampleFormControlTextarea1"rows="4"
                                            placeholder="Tính cấp thiết">@isset( $scientificExplanation->necessity ){{ $scientificExplanation->necessity }}@endisset</textarea>
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
                                                required>@isset($target->general){{ $target->general }}@endisset</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Mục tiêu cụ thể</header>
                                            <textarea class="form-control" name="target[private]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>@isset($target->private){{ $target->private }}@endisset</textarea>
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
                                                required>@isset($research->object){{ $research->object }}@endisset</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Phạm vi nghiên cứu</header>
                                            <textarea class="form-control" name="research[scope]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>@isset($research->scope){{ $research->scope }}@endisset</textarea>
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
                                                required>@isset($research->approach){{ $research->approach }}@endisset</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg">
                                        <div class="form-group">
                                            <header class="blockquote-header">Phương pháp nghiên cứu</header>
                                            <textarea class="form-control" name="research[method]"
                                                id="exampleFormControlTextarea1" rows="4"
                                                required>@isset($research->method){{ $research->method }}@endisset</textarea>
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
                                                required>@isset($research->content){{ $research->content }}@endisset</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <label class="name-title">15. Tiến độ thực hiện</label>
                                            <div class="col-12 col-lg-12 border border-primary pt-3">
                                                <div class="row mb-3 justify-content-end mr-2">
                                                    <button type="button" count="<?php if(isset($progress)) echo count($progress)+1;else echo 2?>" class="btn btn-primary add-progress"
                                                        btn-lg btn-block">Thêm</button>
                                                </div>
                                                <div class="form-progress">
                                                    @isset($progress)
                                                    @php
                                                        $count =0;
                                                    @endphp
                                                    @foreach ($progress as $item)
                                                    @php
                                                        ++$count;
                                                    @endphp
                                                    <div class="row border-bottom border-info pt-3">
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Các nội dung, công
                                                                    việc
                                                                    thực hiện</header> <input type="text"
                                                                    name="progress[{{ $count }}][content]" class="form-control"
                                                                    aria-describedby="helpId"
                                                                    value="{{ $item['content'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Sản phẩm</header>
                                                                <input type="text" name="progress[{{ $count }}][product]"
                                                                    class="form-control" aria-describedby="helpId"
                                                                    value="{{ $item['product'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group d-flex">
                                                                <div>
                                                                    <header class="blockquote-header">Thời gian</header>
                                                                    <input type="text" name="progress[{{ $count }}][timeBefor]"
                                                                        class="form-control datepicker-month"
                                                                        aria-describedby="helpId"
                                                                        value="{{ $item['timeBefor'] }}">
                                                                </div> <label class="mt-4 ml-3 mr-3">đến</label>
                                                                <div>
                                                                    <header class="blockquote-header">đến năm</header>
                                                                    <input type="text" name="progress[{{ $count }}][timeEnd]"
                                                                        class="form-control datepicker-month"
                                                                        aria-describedby="helpId"
                                                                        value="{{ $item['timeEnd'] }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-11 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Người thực hiện
                                                                </header>
                                                                <input type="text" name="progress[{{ $count }}][user]"
                                                                    class="form-control" aria-describedby="helpId"
                                                                    value="{{ $item['user'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-1 pr-3 pt-3"><i class="far fa-window-close progress-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                    </div>
                                                    @endforeach
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-12 col-lg-12" id="productScience">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">16. Sản phẩm khoa
                                                học</label>
                                            <div class="col-lg-8 ml-5 pl-5 pt-3">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" @isset($productScience)
                                                                        @if (in_array('Sách chuyên khảo',$productScience))
                                                                            {{ 'checked' }}
                                                                        @endif
                                                                    @endisset value="Sách chuyên khảo">
                                                                Sách chuyên khảo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" @isset($productScience)
                                                                    @if (in_array('Bài báo đăng Tạp chí nước ngoài',$productScience))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset
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
                                                                    name="productScience[]" @isset($productScience)
                                                                    @if (in_array('Sách tham khảo',$productScience))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset  value="Sách tham khảo">
                                                                Sách tham khảo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" @isset($productScience)
                                                                    @if (in_array('Bài báo đăng Tạp chí trong nước',$productScience))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset
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
                                                                    name="productScience[]" @isset($productScience)
                                                                    @if (in_array('Giáo trình',$productScience))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Giáo trình">
                                                                Giáo trình
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productScience[]" @isset($productScience)
                                                                    @if (in_array('Bài đăng Kỷ yếu HN/HT quốc tế',$productScience))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset
                                                                    value="Bài đăng Kỷ yếu HN/HT quốc tế">
                                                                Bài đăng Kỷ yếu HN/HT quốc tế
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="message-error mt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">17. Sản phẩm đào
                                                tạo</label>
                                            <div class="col-lg-8 ml-5 pl-5 pt-3">
                                                <div class="row">
                                                    <input type="hidden" name="checkProductEducate" @isset($degree->name)
                                                    value="{{ $degree->name }}"
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
                                                                    name="productEducate[]" @isset($productEducate)
                                                                    @if (in_array('tiến sĩ',$productEducate))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset  value="tiến sĩ">
                                                                <span>Tiến sĩ</span>
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
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Mẫu',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Mẫu">
                                                                Mẫu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]"  @isset($productApp)
                                                                    @if (in_array('Sơ đồ, bản thiết kế',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Sơ đồ, bản thiết kế">
                                                                Sơ đồ, bản thiết kế
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]"   @isset($productApp)
                                                                    @if (in_array('Phương pháp',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Phương pháp">
                                                                Phương pháp
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Luật chứng kinh tế',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Luật chứng kinh tế">
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
                                                                    name="productApp[]"  @isset($productApp)
                                                                    @if (in_array('Vật liệu',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Vật liệu">
                                                                Vật liệu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Tài liệu dự báo',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Tài liệu dự báo">
                                                                Tài liệu dự báo
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]"  @isset($productApp)
                                                                    @if (in_array('Quy phạm',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset  value="Quy phạm">
                                                                Quy phạm
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Quy trình công nghệ',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Quy trình công nghệ">
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
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Thiết bị máy móc',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Thiết bị máy móc">
                                                                Thiết bị máy móc
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]"  @isset($productApp)
                                                                    @if (in_array('Bản kiến nghị',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Bản kiến nghị">
                                                                Bản kiến nghị
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Báo cáo phân tích',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset  value="Báo cáo phân tích">
                                                                Báo cáo phân tích
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Dây chuyền công nghệ',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Dây chuyền công nghệ">
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
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Tiêu chuẩn',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Tiêu chuẩn">
                                                                Tiêu chuẩn
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Đề án',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Đề án">
                                                                Đề án
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Bản quy hoạch',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Bản quy hoạch">
                                                                Bản quy hoạch
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check mb-3">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="productApp[]" @isset($productApp)
                                                                    @if (in_array('Chương trình máy tính',$productApp))
                                                                        {{ 'checked' }}
                                                                    @endif
                                                                @endisset value="Chương trình máy tính">
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
                                                id="exampleFormControlTextarea1" rows="4" >@isset($scientificExplanation->product_diff){{ $scientificExplanation->product_diff }}@endisset</textarea>
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
                                                >@isset ($scientificExplanation->effective){{ $scientificExplanation->effective }}@endisset</textarea>
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
                                                rows="4">@isset($scientificExplanation->effective){{ $scientificExplanation->effective }}@endisset</textarea>
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
                                            <button type="button" count="<?php if(isset($labor)) echo count($labor);else echo 2?>" class="btn btn-primary add-labor" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="labor">
                                            @isset($labor)
                                            @php
                                                $count =0;
                                            @endphp
                                                @foreach ($labor as $key=>$item)
                                                <?php if($key=='total') break;++$count?>
                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="labor[{{ $count }}][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thời gian trả lương</header>
                                                        <input type="text" name="labor[{{ $count }}][time]"
                                                            class="form-control datepicker-month"
                                                            aria-describedby="helpId"
                                                            value="{{ $item['time'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số ngày công</header>
                                                        <input type="text" name="labor[{{ $count }}][worker]"
                                                            class="form-control worker" aria-describedby="helpId"
                                                            value="{{ number_format($item['worker']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Hệ số</header>
                                                        <select class="custom-select expense coefficient"
                                                            id="inputGroupSelect02" name="labor[{{ $count }}][coefficient]">
                                                            <option value="0.55" <?php if($item['coefficient']==0.55) echo "selected" ?>>0,55</option>
                                                            <option value="0.26" <?php if($item['coefficient']==0.26) echo "selected" ?>>0,26</option>
                                                            <option value="0.16" <?php if($item['coefficient']==0.16) echo "selected" ?>>0,16</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Lương cơ bản</header>
                                                        <input type="text" name="labor[{{ $count }}][salary]"
                                                            class="form-control salary" aria-describedby="helpId"
                                                            readonly value="{{ number_format($item['salary']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="labor[{{ $count }}][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="{{ number_format($item['total']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close labor-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="labor[total]" class="form-control"
                                                        id="total-labor" aria-describedby="helpId" readonly value="{{ $labor['total'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-12">
                                        <label class="name-title">23. Chi mua nghiên liệu</label>
                                    </div>
                                    <div class="col-12 col-lg-12 border border-primary pt-3">
                                        <div class="row mb-3 justify-content-end mr-2">
                                            <button type="button" count="<?php if(isset($resources)) echo count($resources);else echo 2?>" class="btn btn-primary add-resources" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="resources">
                                            @isset($resources)
                                            @php
                                                $count=0;
                                            @endphp
                                                @foreach ($resources as $key=>$item)
                                                    <?php if($key=='total') break;++$count?>

                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="resources[{{ $count }}][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="resources[{{ $count }}][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="{{ number_format($item['quantily']) }}" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="resources[{{ $count }}][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="{{ number_format($item['price']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="resources[{{ $count }}][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="{{ $item['total'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close resources-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="resources[total]" class="form-control"
                                                        id="total-resources" aria-describedby="helpId" readonly
                                                        @isset($resources['total'])
                                                        value="{{ $resources['total'] }}"
                                                        @endisset>
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
                                            <button type="button" count="<?php if(isset($repair)) echo count($repair);else echo 2?>" class="btn btn-primary add-repair" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="repair">
                                            @isset($repair)
                                            @php
                                                $count =0;
                                            @endphp
                                                @foreach ($repair as $key=>$item)
                                                <?php if($key=='total') break;++$count?>
                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="repair[{{ $count }}][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ $item['content'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="repair[{{ $count }}][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="{{ number_format($item['quantily']) }}" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="repair[{{ $count }}][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="{{ number_format($item['price']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="repair[{{ $count }}][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="{{ $item['total'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close repair-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="repair[total]" class="form-control"
                                                        id="total-repair" aria-describedby="helpId" readonly value="{{ $repair['total'] }}">
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
                                            <button type="button" count="<?php if(isset($costDiff)) echo count($costDiff);else echo 2?>" class="btn btn-primary add-diff" btn-lg
                                                btn-block">Thêm</button>
                                        </div>
                                        <div class="diff">
                                            @isset($costDiff)
                                            @php
                                                $count =0;
                                            @endphp
                                                @foreach ($costDiff as $key=>$item)
                                                    <?php if($key=='total') break;++$count?>
                                            <div class="row border-top border-info pt-3">
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Nội dung</header>
                                                        <input type="text" name="costDiff[{{ $count }}][content]"
                                                            class="form-control content" aria-describedby="helpId"
                                                            value="{{ $item['content'] }}" <?php if($item['content']=='nghiệp thu đề tài') echo "readonly"?>>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Số lượng</header>
                                                        <input type="text" name="costDiff[{{ $count }}][quantily]"
                                                            class="form-control quantily" aria-describedby="helpId"
                                                            value="{{ number_format($item['quantily']) }}" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Đơn giá</header>
                                                        <input type="text" name="costDiff[{{ $count }}][price]"
                                                            class="form-control price" aria-describedby="helpId"
                                                            value="{{ number_format($item['price']) }}">
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg">
                                                    <div class="form-group">
                                                        <header class="blockquote-header">Thành tiền</header>
                                                        <input type="text" name="costDiff[{{ $count }}][total]"
                                                            class="form-control chile-total" aria-describedby="helpId"
                                                            readonly value="{{ $item['total'] }}">
                                                    </div>
                                                </div>
                                                @if ($item['content']!='nghiệp thu đề tài')
                                                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close diff-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                                                @endif
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                        <div class="row border-top border-info pt-3">
                                            <div class="col-12 col-lg mr-55">
                                                <div class="form-group">
                                                    <header class="blockquote-header">Tổng tiền</header>
                                                    <input type="text" name="costDiff[total]" class="form-control"
                                                        id="total-diff" aria-describedby="helpId" readonly value="{{ $costDiff['total'] }}">
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
