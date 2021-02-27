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
                                Lập biên bản buổi họp hội đồng đánh giá chi tiết tài liệu giảng dạy
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
                            	<div class="col-lg-12 font-weight-bold">
                            		<label class="name-title" for="exampleFormControlInput1">
                            			I. Thông tin tài liệu giảng dạy:
                                    </label>
                                        </div>
                                
                            </div>
                            <div class="row p-l-15">
                            	<div class="col-8">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">1.   Tên tài liệu giảng dạy</label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">2.   Thể loại</label>
                                        <input type="text" step="" class="form-control" aria-describedby="helpId"
                                            value="" disabled>
                                    </div>
                                </div>
                            	
                            </div>
                            <div class="row p-l-15">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">3.   Tác giả (Nhóm tác giả): </label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-l-15">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">4.   Sử dụng cho môn học (học phần):  </label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-l-15">
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">5. Số tín chỉ:   </label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">Số tiết:   </label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-l-15">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="name-title" for="exampleFormControlInput1">6.   Trình độ sử dụng  </label>
                                        <input type="text" step="" class="form-control"
                                            aria-describedby="helpId" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <form enctype="multipart/form-data" class="w-100" method="post" action="">
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
                                                                        name="level[]" value="Cơ bản" >
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
                                                                            name="level[]" value="Triển khai" >
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
                                
                                
                               
                                
                                
                                <div class="row mt-5 justify-content-end">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                </div>
                            </form>
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
</section>
@endsection
