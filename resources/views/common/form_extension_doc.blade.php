<style type="text/css">
      .col-12{
        padding-top: 15px;
    }
</style>
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="late">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h3 class="modal-title  " id="exampleModalLabel"> </h3>
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
                      
                        <div class="p-t-15 page" id="page-download">
                            <div class="row font-110">
                                <div class="col-6 text-center">
                                    <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
                                    <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                        <br />tp.hồ chí minh</p>
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
                                                <span class="font-weight-bold">{{ $document->name_doc }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Chủ biên: </span>
                                                <span class="font-weight-bold">{{ $document->user->name }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Đơn vị: </span>
                                                <span class="font-weight-bold">{{ unit($document->user->work_unit_id) }}</span>
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
                                                Từ 
                                                    {{ day_register_doc($document->registerdoc->time_process) }}

                                               </span>
                                                                                               
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 2.Nội dung chưa hoàn thành</span>(Theo hợp đồng hoặc theo đề cương):  
                                               <span class="font-weight-bold">{{ $document->extension->content }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 3.Nguyên nhân:  </span>
                                               <span class="font-weight-bold">{{ $document->extension->reason }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 4. Đề nghị gia hạn:  </span>(Thời gian gia hạn không quá 6 tháng)
                                               <span class="font-weight-bold">{{ $document->extension->time }} tháng</span>
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
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                      <a href="{{ route('xacnhangiahanbiensoan', $document->id) }}">
                        <button type="submit" class="btn btn-primary" {{-- data-dismiss="modal" --}}>Xác nhận </button>
                      </a>
                      
                  </div>
              </div>
          </div>
      </div>