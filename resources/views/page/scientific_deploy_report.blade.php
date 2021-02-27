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
                                    Báo cáo triển khai thực hiện nghiên cứu khoa học
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
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">1. Tên đề
                                                tài</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                value="{{ $topicM->name_topic }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">2. Mã số</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                value="{{ $topicM->id }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">3. Chủ nhiệm đề
                                                tài:</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                @isset($topicManager) value="{{ $topicManager->name }}" @endisset disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">4. Đơn vị chủ
                                                trì:</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                @isset($organization) value="{{ $organization->name }}" @endisset disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">5. Thời gian thực
                                                hiện:</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                @isset($time) value="{{ $time->timeBefor }} đến {{ $time->timeEnd }}"
                                                @endisset disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="name-title" for="exampleFormControlInput1">6. Tổng kinh
                                                phí:</label>
                                            <input type="text" step="" class="form-control" aria-describedby="helpId"
                                                @isset($total) value="{{ number_format($total) }} VND" @endisset disabled>
                                        </div>
                                    </div>
                                </div>
                                <form enctype="multipart/form-data" class="w-100" method="post"
                                    action="{{ route('baocaotrienkhainghiencuukhoahoc',$topicM->id) }}">
                                    @csrf
                                    <div class="row mt-5">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">7. Đánh giá tình hình thực hiện đề tài</label>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title pl-3">7.1. Nội dung nghiên cứu:</label>
                                        </div>
                                        <div class="col-12 col-lg-12 border border-primary pt-3">
                                            <div class="row mb-3 justify-content-end mr-2">
                                                <button type="button" count="2" class="btn btn-primary add-content" btn-lg
                                                    btn-block">Thêm</button>
                                            </div>
                                            <div class="content">
                                                @isset($content)
                                                    @foreach ($content as $key=>$item)
                                                        <div class="row border-bottom border-info pt-3">
                                                            <div class="col-12 col-lg">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Nội dung nghiên cứu theo
                                                                        thuyết minh đề tài</header>
                                                                    <input type="text" name="content[{{ $key }}][contentExplanation]"
                                                                        class="form-control " aria-describedby="helpId"
                                                                        value="{{ $item['contentExplanation'] }}" readonly required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg ">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Nội dung phối hợp nghiên cứu
                                                                    </header>
                                                                    <input type="text" name="content[{{ $key }}][contentCombination]"
                                                                        class="form-control" aria-describedby="helpId"
                                                                        value="{{ $item['contentCombination'] }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-11 col-lg mr-55">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                                                                    <input type="number" name="content[{{ $key }}][finish]"
                                                                        class="form-control" min="0" max="100"
                                                                        aria-describedby="helpId"
                                                                        value="{{ $item['finish'] }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @isset($progress)
                                                        @foreach ($progress as $key=>$item)
                                                            <div class="row border-bottom border-info pt-3">
                                                                <div class="col-12 col-lg">
                                                                    <div class="form-group">
                                                                        <header class="blockquote-header">Nội dung nghiên cứu theo
                                                                            thuyết minh đề tài</header>
                                                                        <input type="text" name="content[{{ $key }}][contentExplanation]"
                                                                            class="form-control " aria-describedby="helpId"
                                                                            value="{{ $item['content'] }}" readonly required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg ">
                                                                    <div class="form-group">
                                                                        <header class="blockquote-header">Nội dung phối hợp nghiên cứu
                                                                        </header>
                                                                        <input type="text" name="content[{{ $key }}][contentCombination]"
                                                                            class="form-control" aria-describedby="helpId"
                                                                            value="{{ old('content.1.contentCombination') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-11 col-lg mr-55">
                                                                    <div class="form-group">
                                                                        <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                                                                        <input type="number" name="content[{{ $key }}][finish]"
                                                                            class="form-control" min="0" max="100"
                                                                            aria-describedby="helpId"
                                                                            value="{{ old('content.1.finish') }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endisset
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title pl-3">7.2. Sản phẩm:</label>
                                        </div>
                                        <div class="col-12 col-lg-12 border border-primary pt-3">
                                            <div class="row mb-3 justify-content-end mr-2">
                                                <button type="button" count="2" class="btn btn-primary add-product" btn-lg
                                                    btn-block">Thêm</button>
                                            </div>
                                            <div class="product">
                                                @isset($product)
                                                    @foreach($product as $key => $item)
                                                        <div class="row border-bottom border-info pt-3">
                                                            <div class="col-12 col-lg">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Sản phẩm theo thuyết minh đề
                                                                        tài</header>
                                                                    <input type="text" name="product[{{ $key }}][productExplanation]"
                                                                        class="form-control " aria-describedby="helpId"
                                                                        value="{{ $item['productExplanation'] }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg ">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Sản phẩm đã thực hiện</header>
                                                                    <input type="text" name="product[{{ $key }}][make]" class="form-control"
                                                                        aria-describedby="helpId"
                                                                        value="{{ $item['make'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-11 col-lg mr-55">
                                                                <div class="form-group">
                                                                    <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                                                                    <input type="number" name="product[{{ $key }}][finish]"
                                                                        class="form-control" min="0" max="100"
                                                                        aria-describedby="helpId"
                                                                        value="{{ $item['finish'] }}">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    @endforeach    
                                                @else    
                                                    <div class="row">
                                                        <div class="col-12 col-lg">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Sản phẩm theo thuyết minh đề
                                                                    tài</header>
                                                                <input type="text" name="product[1][productExplanation]"
                                                                    class="form-control " aria-describedby="helpId"
                                                                    value="{{ old('product.1.productExplanation') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg ">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Sản phẩm đã thực hiện</header>
                                                                <input type="text" name="product[1][make]" class="form-control"
                                                                    aria-describedby="helpId"
                                                                    value="{{ old('product.1.make') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-11 col-lg mr-55">
                                                            <div class="form-group">
                                                                <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                                                                <input type="number" name="product[1][finish]"
                                                                    class="form-control" min="0" max="100"
                                                                    aria-describedby="helpId"
                                                                    value="{{ old('product.1.finish') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <label class="name-title ml-3">8. Kinh phí đề tài:</label>
                                        <div class="col-12 ml-2">
                                            @isset($expense)
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí được cấp</header>
                                                            <input type="text" name="expense[provided]" class="form-control number-format"
                                                                aria-describedby="helpId" value="{{ $expense->provided }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí đã chi</header>
                                                            <input type="text" name="expense[spent]" class="form-control number-format"
                                                                aria-describedby="helpId" value="{{ $expense->spent }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí đã quyết toán</header>
                                                            <input type="text" name="expense[settlement]" class="form-control number-format"
                                                                aria-describedby="helpId"
                                                                value="{{ $expense->settlement }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí được cấp</header>
                                                            <input type="text" name="expense[provided]" class="form-control number-format"
                                                                aria-describedby="helpId" value="{{ old('expense.provided') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí đã chi</header>
                                                            <input type="text" name="expense[spent]" class="form-control number-format"
                                                                aria-describedby="helpId" value="{{ old('expense.spent') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg">
                                                        <div class="form-group">
                                                            <header class="blockquote-header">Kinh phí đã quyết toán</header>
                                                            <input type="text" name="expense[settlement]" class="form-control number-format"
                                                                aria-describedby="helpId"
                                                                value="{{ old('expense.settlement') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="name-title" for="exampleFormControlInput1">9. Mức độ hoành
                                                    thành theo tiến độ</label>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="finish" value="Đúng tiến độ" @if(!isset($topicM->notice_late))  checked @endif>
                                                                    Đúng tiến độ
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="finish" value="Vượt tiến độ" >
                                                                    Vượt tiến độ
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="finish" value="Chậm tiến độ" @isset($topicM->notice_late) checked  @endisset>
                                                                    Chậm tiến độ
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
                                            <label class="name-title">10. Kế hoạch triển khai tiếp theo</label>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <div class="form-group">
                                                <header class="blockquote-header">Về nội dung nghiên cứu</header>
                                                <textarea class="form-control" name="plan[content]"
                                                    id="exampleFormControlTextarea1" rows="4"
                                                    required>{{ old('plan.content') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <div class="form-group">
                                                <header class="blockquote-header">Dự kiến kết quả</header>
                                                <textarea class="form-control" name="plan[expected]"
                                                    id="exampleFormControlTextarea1" rows="4"
                                                    required>{{ old('plan.expected') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                            
                                            <div class="form-group">
                                                <header class="blockquote-header">Kinh phí</header>
                                                <input type="text" name="plan[expense]" class="form-control number-format"
                                                            aria-describedby="helpId" value="{{ old('plan.expense') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 col-lg-12">
                                            <label class="name-title">11. Kiến nghị của Chủ nhiệm đề tài</label>
                                            <textarea class="form-control" name="opinion" id="exampleFormControlTextarea1"
                                                rows="4" placeholder="nếu có">{{ old('opinion') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-5 justify-content-end">
                                        <button class="btn btn-primary w-10rem mr-3" type="submit">Lưu</button>
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
