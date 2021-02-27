<style type="text/css">
      .col-12{
        padding-top: 15px;
    }
</style>
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

                            <div class="row " >
                     <div class="col-12 text-center">
                        <p class="text-uppercase font-weight-bold title-page">ĐỀ NGHỊ<br>
                          Về việc xin gia hạn thực hiện đề tài nghiên cứu khoa học 
                          @php 
                          typeTopic($topic->type_topic);
                           @endphp 
                          <br>
                          năm học 20… - 20…
                        </p>
                        
                    </div>
                    
                </div>
                            <div class="page-content font-110">
                                

                                
                               <div class="row p-t-20 " >
                        <div class="col-2 " >
                            <p><span class="font-weight-bold title-field-bold tils"> Kính gửi: </span> 
                               
                            </p>
                            </div>
                            <div class="col-10 ">
                              <p>
                                <span class="font-weight-bold title-field-bold tils">Hiệu trường 

                              </span> <br>
                                <span class="font-weight-bold title-field-bold tils">Hội đồng Khoa:  

                              </span><br>
                              <span class="font-weight-bold title-field-bold tils">Phòng Khoa học công nghệ, Nghiên cứu và Phát Triển
                              </span> 
                               
                            </p>
                            </div>

                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Tôi tên:  </span>
                              <span class="font-weight-bold">
                                @isset($scientific_extension)
                                {{ $scientific_extension->user->name }}
                                @endisset
                              </span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Chức danh:  </span>
                              <span class="font-weight-bold">
                                @isset($scientific_extension->position)
                                {{ $scientific_extension->position }}
                                @endisset
                              </span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Đơn vị công tác:  </span>
                              <span class="font-weight-bold">
                                @isset($topic->scientific_explanation_id)
                                {{ oganizationTopic($topic->scientific_explanation_id) }}
                                @endisset
                              </span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              Theo Quyết định số……/QĐ-ĐHGTVT-KHCN ngày … tháng … năm 20…, của Hiệu trưởng Trường Đại học Giao thông vận tải Thành phố Hồ Chí Minh, tôi được phê duyệt thực hiện đề tài nghiên cứu khoa học cấp Trường như sau:
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Tên đề tài:  </span>
                              <span class="font-weight-bold">
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
                              <span>Mã số:  </span>
                              <span class="font-weight-bold">
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
                              <span>Tổng kinh phí thực hiện:  </span>
                              <span class="font-weight-bold">
                                @isset($topic->getRegisterTopic->expense)
                                {{number_format($topic->getRegisterTopic->expense ) }}
                                @endisset
                                 đồng</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p >
                              Thời gian đăng ký thực hiện từ
                              <span class="font-weight-bold">
                                @isset($time)
                               {{ $time->timeBefor }}
                                đến
                                {{ $time->timeEnd }}
                              @endisset
                              </span>
                              
                            </p>
                          </div>
                        </div>       
                        <div class="row ">
                          <div class="col-12">
                            <p >
                              
                              Thời gian gia hạn từ
                              <span class="font-weight-bold">
                                @isset($time_new['timeBefor'])
                               {{ $time_new['timeBefor'] }}
                               @endisset 
                               đến
                               @isset($time_new['timeEnd'])
                                {{ $time_new['timeEnd']}}
                               @endisset
                              <span>
                              
                               
                            </p>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Nội dung gia hạn:  </span>
                              <span class="font-weight-bold">
                                @isset($scientific_extension->content)
                                {{ $scientific_extension->content }}
                                @endisset
                              </span>
                            </p>
                          </div>
                        </div>       
                                
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Lý do gia hạn:  </span>
                              <span class="font-weight-bold">
                                @isset( $scientific_extension->reason)
                                {{ $scientific_extension->reason }}
                                @endisset
                              </span>
                            </p>
                          </div>
                        </div>        
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Kinh phí chuyển theo phần gia hạn(nếu có):  </span>
                              <span class="font-weight-bold">
                                @isset($scientific_extension->expense_diff)
                                {{ $scientific_extension->expense_diff }} đồng
                                @endisset
                                </span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Trân trọng cảm ơn./.</span>
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
                      <a href="{{ route('xacnhangiahan',['id' => $topic->id]) }}">
                        <button type="submit" class="btn btn-primary" {{-- data-dismiss="modal" --}}>Xác nhận </button>
                      </a>
                      
                  </div>
              </div>
          </div>
      </div>