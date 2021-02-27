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
                                    Gia hạn thực hiện đề tài nghiên cứu khoa học
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
                            <div class="p-t-15">

                                <form enctype="multipart/form-data" class="w-100" method="post"
                                    action="{{ route('giahanthuchiendetai',$topicM->id) }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">1. Họ và
                                                    tên</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="nameStudent" @isset($scientificProfile)
                                                    value="{{ $scientificProfile->name }}" @endisset required disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">2. Chức danh
                                                </label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    value="{{ old('position') }}" name="position" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">3. Đơn vị công
                                                    tác:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="workPlace" @isset($workPlace) value="{{ $workPlace->nameAgency }}"
                                                    @endisset required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">4. Tên đề
                                                    tài:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="nameTopic" @isset($topicM) value="{{ $topicM->name_topic }}"
                                                    @endisset required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">5. Tổng kinh
                                                    phí:</label>
                                                <input type="text" class="form-control" aria-describedby="helpId"
                                                    @isset($total) value="{{ number_format($total) }}" @endisset
                                                    name="expense" required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="name-title">6. Thời gian đăng
                                                    ký thực hiện</label>
                                                <input type="text" class="form-control" aria-describedby="helpId"
                                                    @isset($time) value="{{ $time->timeBefor }} đến {{ $time->timeEnd }}"
                                                    @endisset name="expense" required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="name-title">7. Thời gian gia
                                                    hạn</label>
                                                <div class="col">
                                                    <div class="form-group d-flex">
                                                        <div>
                                                            <header class="blockquote-header">Thời gian</header>
                                                            <input type="text" name="timeNew[timeBefor]"
                                                                class="form-control datepicker-month"
                                                                aria-describedby="helpId"
                                                                value="{{ old('timeNew.timeBefor') }}" required>
                                                        </div>
                                                        <label class="mt-4 ml-3 mr-3">đến</label>
                                                        <div>
                                                            <header class="blockquote-header">đến năm</header>
                                                            <input type="text" name="timeNew[timeEnd]"
                                                                class="form-control datepicker-month"
                                                                aria-describedby="helpId"
                                                                value="{{ old('timeNew.timeEnd') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">8. Nội dung gia hạn</label>
                                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                                                rows="5" placeholder="Nội dung gia hạn"
                                                required>{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">9. Lý do gia hạn</label>
                                            <textarea class="form-control" name="reason" id="exampleFormControlTextarea1"
                                                rows="5" placeholder="Lý do gia hạn" required>{{ old('reason') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">10. Kinh phí chuyển
                                                    theo phần gia hạn( nếu có):</label>
                                                <input type="text" class="form-control number-format" aria-describedby="helpId"
                                                    value="{{ old('expenseDiff') }}" name="expenseDiff">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 justify-content-end">
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/scienticfic_deploy_report.js') }}"></script>
        <script>
            $('#diff-form').change(function() {
                if ($(this).is(':checked')) {
                    $('.technical-diff').prop("disabled", false);
                } else {
                    $('.technical-diff').prop("disabled", true);
                }
            });

        </script>
    </section>
@endsection
