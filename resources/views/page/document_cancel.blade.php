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
                                    Đề nghị hủy thực hiện biên soạn tài liệu giảng dạy
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
                                <form enctype="multipart/form-data" class="w-100" method="post" action="{{ route('huytailieubaigiang',$document->id)}}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">1. Tên tài liệu giảng dạy</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="nameDocument" @isset($document)
                                                    value="{{ $document->name_doc }}"
                                                    @endisset  required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">2. Chủ biên:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="nameAuth" @isset($document)
                                                        value="{{ $document->user->name}}"
                                                    @endisset required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">3. Đơn vị công
                                                    tác:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="workPlace" @isset($document)
                                                    value="{{ $document->user->workunit->unit_name}}"
                                                @endisset required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">4. Hợp đồng biên soạn:</label>
                                                <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                    name="contract" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="name-title">6. Thời gian thực hiện</label>
                                                <input type="text" class="form-control" aria-describedby="helpId" @if ($time)
                                                    value="{{ $time->begin }} đến {{ $time->finish  }}"
                                                @endif disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">7. Lý do</label>
                                            <textarea class="form-control" name="reason" id="exampleFormControlTextarea1"
                                                rows="5" placeholder="Nguyên nhân và lý do" required>{{ old('reason') }}</textarea>
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
    </section>
@endsection
