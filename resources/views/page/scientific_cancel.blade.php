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
                                    Hủy thực hiện đề tài nghiên cứu khoa học
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
                                    action="{{ route('huydetainghiencuu',$topicM->id) }}">
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
                                                <label class="name-title" for="exampleFormControlInput1">5. Mã số:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="nameTopic" @isset($topicM) value="{{ $topicM->id }}"
                                                    @endisset required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">6. Tổng kinh
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
                                                <label for="exampleFormControlInput1" class="name-title">7. Thời gian đăng
                                                    ký thực hiện</label>
                                                <input type="text" class="form-control" aria-describedby="helpId"
                                                    @isset($time) value="{{ date('m/Y'),strtotime($time->timeBefor) }} đến {{ date('m/Y'),strtotime($time->timeEnd) }}" @endisset
                                                    required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">8. Kinh phí hoàn trả</label>
                                            <input type="text" class="form-control number-format" aria-describedby="helpId" name="expense" required >
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">9. Lý do hủy</label>
                                            <textarea class="form-control" name="reason" id="exampleFormControlTextarea1"
                                                rows="5" placeholder="Lý do hủy đề tài" required>{{ old('reason') }}</textarea>
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
