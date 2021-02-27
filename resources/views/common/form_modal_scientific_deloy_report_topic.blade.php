<style type="text/css">
    .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        padding-top: 10px;
    }

    .title-field-bold {
        font-weight: 600 !important;
    }

    dl,
    ol,
    ul {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    li,
    ul {
        margin: 0;
        list-style-type: none;
    }

    .title-field {
        font-weight: 500 !important;
        padding-right: 10px;
    }

    .table-custom {
        width: 100%;
        border: 1px solid black;
    }

    .table-custom tr,
    .table-custom tbody tr td,
    .table-custom thead tr th {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
    }

</style>

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h3 class="modal-title  " id="exampleModalLabel"> {{ $topic->name_topic }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <div class="p-r-10 p-rl-0-sr991 p-b-20">
                                <div class="p-b-25">

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

                                    <div class="p-t-15 page" id="page-download">
                                        <div class="row font-110">
                                            <div class="col-6 text-center">
                                                <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải
                                                </p>
                                                <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao
                                                    thông vận tải
                                                    <br />tp.hồ chí minh
                                                </p>
                                                <hr class="hr-short">
                                            </div>
                                            <div class="col-6 text-center">
                                                <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ
                                                    nghĩa việt nam
                                                </p>
                                                <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> -
                                                    </span>Hạnh
                                                    phúc
                                                </p>
                                                <hr class="hr-short">
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-12 text-center">
                                                <p class="text-uppercase font-weight-bold title-page">BÁO CÁO TRIỂN KHAI
                                                    THỰC HIỆN<br> ĐỀ TÀI NGHIÊN CỨU KHOA HỌC
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
                                                    <p class="p-l-5">
                                                        <span>1.Tên đề tài: </span>
                                                        <span class=" font-weight-bold">
                                                          @isset($topic->name_topic)
                                                          {{ $topic->name_topic }}
                                                          @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>2.Mã số: </span>
                                                        <span class=" font-weight-bold">
                                                          @isset($topic->id)
                                                          {{ $topic->id }}
                                                          @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>3.Chủ nhiệm đề tài: </span>
                                                        <span class=" font-weight-bold">
                                                          @isset($topic->scientific_explanation_id)
                                                            {{ managerTopic($topic->scientific_explanation_id) }}
                                                          @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>4.Đơn vị chủ trì: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($topic->scientific_explanation_id)
                                                                {{ oganizationTopic($topic->scientific_explanation_id) }}
                                                            @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>5.Thời gian thực hiện: </span>
                                                        <span class=" font-weight-bold"> từ {{ $time->timeBefor }} đến {{ $time->timeEnd }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>6.Tổng kinh phí: </span>
                                                        <span class=" font-weight-bold">
                                                          @isset($topic->getRegisterTopic->expense)
                                                          {{ number_format($topic->getRegisterTopic->expense) }}
                                                           đồng
                                                           @endisset
                                                          </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="font-weight-bold">II. Đánh giá tình hình thực hiện đề tài.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">1.Nội dung nghiên cứu</p>
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
                                                            @foreach ($content as $key => $cont)
                                                                <tr>
                                                                    <td>{{ $key }}</td>
                                                                    <td class="text-capitalize">
                                                                        @isset($cont['contentExplanation'])
                                                                            {{ $cont['contentExplanation'] }}
                                                                        @endisset

                                                                    </td>
                                                                    <td>
                                                                        @isset($cont['contentCombination'])
                                                                            {{ $cont['contentCombination'] }}
                                                                        @endisset
                                                                    </td>
                                                                    <td>
                                                                        @isset($cont['finish'])
                                                                            {{ $cont['finish'] }}
                                                                        @endisset
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">2.Sản phẩm</p>
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
                                                                    {{--
                                                                    {{ dd($pro['productExplanation']) }}
                                                                    --}}
                                                                    <tr>
                                                                        <td>{{ $key }}</td>
                                                                        <td class="text-capitalize">
                                                                            {{ $pro['productExplanation'] }}
                                                                        </td>
                                                                        <td>{{ $pro['make'] }}</td>
                                                                        <td>{{ $pro['finish'] }}</td>
                                                                    </tr>
                                                                @endforeach

                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">3.Kinh phí đề tài.</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span>+ Kinh phí đã được cấp: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($expense['provided'])
                                                                {{ number_format($expense['provided']) }}
                                                            @endisset
                                                            đồng
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span>+ Kinh phí đã chi (giải trình các khoản chi): </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($expense['spent'])
                                                                {{ number_format($expense['spent']) }}
                                                            @endisset
                                                            đồng</span>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-15">
                                                        <span>+ Kinh phí đã quyết toán: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($expense['settlement'])
                                                                {{ number_format($expense['settlement']) }}
                                                            @endisset
                                                            đồng</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>4.Mức độ hoàn thành theo tiến độ: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($report['finish'])
                                                                {{ $report['finish'] }}
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
                                                    <p class="p-l-5">
                                                        <span>1.Về nội dung nghiên cứu: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($plan['content'])
                                                                {{ $plan['content']}}
                                                            @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>2.Dự thảo kết quả: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($plan['expected'])
                                                                {{ $plan['expected'] }}
                                                            @endisset
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="p-l-5">
                                                        <span>3.Kinh phí: </span>
                                                        <span class=" font-weight-bold">
                                                            @isset($plan['expense'])
                                                                {{ number_format($plan['expense']) }}
                                                            @endisset
                                                            đồng</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="font-weight-bold">
                                                      <span>IV.Kiến nghị của chủ nhiệm đề tài:  </span>
                                                    <span class=" font-weight-bold">
                                                        @isset($report->opinion)
                                                            {{ $report->opinion }}
                                                        @endisset
                                                    </span>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a href="{{ route('xacnhanbaocao', ['id' => $topic->id]) }}">
                    <button type="submit" class="btn btn-primary">Xác nhận </button>
                </a>

            </div>
        </div>
    </div>
</div>
