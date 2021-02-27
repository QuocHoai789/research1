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
                                    Gia hạn thực hiện đề tài
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
                                <div class="col-12 text-right p-3 pr-5 mr-5">
                                    <a class="btn btn-info" href=""
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
                                        <p class="text-uppercase font-weight-bold title-page">ĐỀ NGHỊ<br>
                                            Về việc gia hạn thực hiện biên soạn tài liệu giảng dạy

                                            <br>
                                            năm học 20… - 20…
                                        </p>

                                    </div>
                                </div>
                                <div class="page-content font-110">
                                    <div class="row p-t-20 ">
                                        <div class="col-2 ">
                                            <p><span class="font-weight-bold title-field-bold tils"> Kính gửi: </span>

                                            </p>
                                        </div>
                                        <div class="col-10 ">
                                            <p>
                                                <span class="font-weight-bold title-field-bold tils">Hiệu trưởng Trường Đại học Giao thông vận tải – TP. HCM

                                                </span> <br>
                                                <span class="font-weight-bold title-field-bold tils">Hội đồng Khoa:

                                                </span><br>
                                                <span class="font-weight-bold title-field-bold tils">Phòng Khoa học công
                                                    nghệ, Nghiên cứu và Phát Triển
                                                </span>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="font-weight-bold">
                                                1. Thông tin chung
                                            </p>
                                            
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <span>Tên TLGD: </span>
                                                <span class="font-weight-bold">
                                                    @isset($document->name_doc)
                                                    {{ $document->name_doc }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Chủ biên: </span>
                                                <span class="font-weight-bold">
                                                    @isset($document->user->name)
                                                    {{ $document->user->name }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Đơn vị: </span>
                                                <span class="font-weight-bold">
                                                    @isset($document->user->work_unit_id)
                                                    {{ unit($document->user->work_unit_id) }}
                                                    @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Hợp đồng biên soạn: Số………./HĐBS-TLGD ngày       tháng         năm 20 … </span>
                                                <span></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                Thời gian đăng ký thực hiện:    
                                               <span class="font-weight-bold">
                                                   
                                                Từ @isset($time_process->begin)
                                                    {{  $time_process->begin }}
                                                    @endisset

                                                đến @isset($time_process->finish) 
                                                  {{  $time_process->finish  }}
                                                  @endisset

                                               </span>
                                                                                               
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 2.Nội dung chưa hoàn thành</span>(Theo hợp đồng hoặc theo đề cương):  
                                               <span class="font-weight-bold">
                                                   @isset($extension_doc->content)
                                                   {{ $extension_doc->content }}
                                                   @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 3.Nguyên nhân:  </span>
                                               <span class="font-weight-bold">
                                                   @isset($extension_doc->reason)
                                                   {{ $extension_doc->reason }}
                                                   @endisset
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 4. Đề nghị gia hạn:  </span>(Thời gian gia hạn không quá 6 tháng)
                                               <span class="font-weight-bold">
                                                 @isset($extension_doc->time)  {{ $extension_doc->time }}  tháng @endisset </span>
                                            </p>
                                        </div>
                                    </div>
                                    
                               
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Trân trọng cảm ơn ./.</span>
                                                <span></span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row mt-5 pb-20">
                                        <div class="col-6 text-center ">
                                            <p class="title-field-bold m-0">Ý KIẾN CỦA HỘI ĐỒNG ĐƠN VỊ<br> QUẢN LÝ</p>
                                            <p class="m-0"><i>(Ký tên, đóng dấu)</i></p>
                                        </div>
                                        <div class="col-6 text-center">

                                            <p class="title-field-bold m-0">NGƯỜI ĐỀ NGHỊ</p>
                                            <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                        </div>
                                    </div>
                                    <div class="row mt-5 pb-20">
                                        <div class="col-6 text-center ">
                                            <p class="title-field-bold m-0">PHÊ DUYỆT CỦA HIỆU TRƯỞNG</p>

                                        </div>
                                        <div class="col-6 text-center">

                                            <p class="title-field-bold m-0">Ý KIẾN CỦA PHÒNG KHCN-NC&PT</p>
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
