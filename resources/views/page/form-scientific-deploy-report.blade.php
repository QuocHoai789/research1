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
                                    Báo cáo thực hiện đề tài
                                </h3>
                            </div>
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-12 text-right p-3 pr-5">
                                    <a class="btn btn-info" href="{{ route('dowloadbaocao', $topic->id) }}"
                                        role="button">Tải
                                        xuống</a>
                                </div>
                            </div>
                            <div class="p-t-15 page" id="page-download">
                                <div class="row font-110">
                                    <div class="col-6 text-center">
                                        <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
                                        <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                            <br />tp.hồ chí minh
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                        </p>
                                        <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                            phúc
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-12 text-center">
                                        <p class="text-uppercase font-weight-bold title-page">BÁO CÁO TRIỂN KHAI THỰC
                                            HIỆN<br> ĐỀ TÀI NGHIÊN CỨU KHOA HỌC
                                            @php
                                            typeTopic($topic->type_topic);
                                            @endphp

                                        </p>

                                    </div>

                                </div>
                                <div class="page-content font-110">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="font-weight-bold">I. Thông tin chung.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>1. Tên đề tài: </span>
                                                <span>
                                                    @isset($topic->name_topic)
                                                    {{ $topic->name_topic }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>2. Mã số: </span>
                                                <span>
                                                    @isset($topic->id)
                                                    {{ $topic->id }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>3. Chủ nhiệm đề tài: </span>
                                                <span>
                                                    @isset($topicManager->name)
                                                    {{ $topicManager->name }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>4. Đơn vị chủ trì: </span>
                                                <span>
                                                    @isset($organization->name)
                                                    {{ $organization->name }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>5. Thời gian thực hiện: </span>
                                                <span> từ 
                                                    @isset($time->timeBefor)
                                                    {{ $time->timeBefor }}
                                                    @endisset
                                                     đến
                                                     @isset($time->timeEnd)
                                                      {{ $time->timeEnd }}
                                                      @endisset
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>6. Tổng kinh phí: </span>
                                                <span>
                                                    @isset($total)
                                                    {{ number_format($total) }}
                                                    @endisset
                                                    đồng
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="font-weight-bold">II. Đánh giá tình hình thực hiện đề tài.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>1. Nội dung nghiên cứu</p>
                                        </div>

                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Nội dung nghiên cứu theo thuyết minh đề tài</th>
                                                        <th>Nội dung nghiên cứu đã thực hiện</th>
                                                        <th>Mức độ hoàn thành (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($content)
                                                    @foreach ($content as $key => $cont)
                                                        <tr>
                                                            <td>{{ $key }}</td>
                                                            <td class="text-capitalize">
                                                                {{ $cont->contentExplanation }}
                                                            </td>
                                                            <td>{{ $cont->contentCombination }}</td>
                                                            <td>{{ $cont->finish }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>2. Sản phẩm</p>
                                        </div>

                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Sản phẩm theo thuyết minh đề tài</th>
                                                        <th>Sản phẩm đã thực hiện</th>
                                                        <th>Mức độ hoàn thành (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($product)
                                                    @foreach ($product as $key => $pro)
                                                        <tr>
                                                            <td>{{ $key }}</td>
                                                            <td class="text-capitalize">
                                                                {{ $pro->productExplanation }}
                                                            </td>
                                                            <td>{{ $pro->make }}</td>
                                                            <td>{{ $pro->finish }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <p>3. Kinh phí đề tài.</p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>+ Kinh phí đã được cấp: </span>
                                                <span>
                                                    @isset($expense->provided)
                                                    {{ number_format($expense->provided) }} đồng
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>+ Kinh phí đã chi (giải trình các khoản chi): </span>
                                                <span>
                                                    @isset($expense->spent)
                                                    {{ number_format($expense->spent) }} đồng
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>+ Kinh phí đã quyết toán: </span>
                                                <span>
                                                    @isset($expense->settlement)
                                                    {{ number_format($expense->settlement) }} đồng
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>4. Mức độ hoàn thành theo tiến độ: </span>
                                                <span>
                                                    @isset($report->finish)
                                                    {{ $report->finish }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="font-weight-bold">III.Kế hoạch triển khai tiếp theo</p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>1. Về nội dung nghiên cứu: </span>
                                                <span>
                                                    @isset($plan->content)
                                                    {{ $plan->content }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>2. Dự thảo kết quả: </span>
                                                <span>
                                                    @isset($plan->expected)
                                                    {{ $plan->expected }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>3. Kinh phí: </span>
                                                <span>
                                                    @isset($plan->expense)
                                                    {{ number_format($plan->expense) }} đồng
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="font-weight-bold">IV. Kiến nghị của chủ nhiệm đề tài</p>
                                            <p>
                                                @isset($report->opinion)
                                                {{ $report->opinion }}
                                                @endisset
                                            </p>
                                        </div>
                                    </div>


                                    <div class="row mt-5 pb-20">
                                        <div class="col-6 text-center ">
                                            <p class="title-field-bold m-0">Xác nhận của lãnh đạo đơn vị</p>
                                            <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                        </div>
                                        <div class="col-6 text-center">

                                            <p class="title-field-bold m-0">Chủ nhiệm đề tài</p>
                                            <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                        </div>
                                    </div>

                                    <div class="row pb-20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
