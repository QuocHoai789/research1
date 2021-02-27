<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h3 class="modal-title  " id="exampleModalLabel"> {{ $document->name_doc }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="p-r-10 p-rl-0-sr991 p-b-20">
                    <div class="p-b-25 d-flex justify-content-center" style="margin-top: 50px">
            <div class="p-t-15 page"style="width: 794px;height: 1123px;background: #fff">
                         <div class="row font-110 ">
                                <div class="col-6 text-center til">
                                    <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
                                    <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                        <br />tp.hồ chí minh</p>
                                    <hr class="hr-short">
                                </div>
                                <div class="col-6 text-center til">
                                    <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                    </p>
                                    <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                        phúc
                                    </p>
                                    <hr class="hr-short">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                              <p style="padding-right: 17px;"> Thành phố Hồ Chí Minh, ngày...tháng...năm ... </p>
                            </div>
                 <div class="row " style="padding-top: 55px">
                     <div class="col-12 text-center">
                        <p class="text-uppercase font-weight-bold title-page">ĐỀ NGHỊ<br>
                        
                          Về việc xin hủy thực hiện biên soạn tài liệu giảng dạy<br>
                          Năm học 20… - 20…

                        </p>
                        
                    </div>
                    
                </div>
                <div class="page-content font-110">
                    <div class="row p-t-20 " style="padding-left: 32px">
                        <div class="col-2 " style="padding-left: 30px">
                            <p><span class="title-field-bold tils"> Kính gửi: </span> 
                               
                            </p>
                            </div>
                            <div class="col-10 ">
                              <p>
                                <span class="font-weight-bold title-field-bold tils">Hiệu trưởng Trường Đại học Giao thông vận tải – TP. HCM. 

                              </span> <br>
                                <span class="font-weight-bold title-field-bold tils">Hội đồng Khoa:  

                              </span><br>
                              <span class="font-weight-bold title-field-bold tils">Phòng Khoa học công nghệ, Nghiên cứu và Phát Triển
                              </span> 
                               
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-6" style="padding-left: 30px">
                            <p>
                            <span class=" title-field-bold tils" >Tôi tên:</span>
                            <span class="font-weight-bold"  >{{ $document->user->name }}</span>
                          </p>
                          </div>
                           <div class="col-lg-6" style="padding-left: 30px">
                            <p>
                            <span class=" title-field-bold tils" >Học vị:</span>
                            <span class="font-weight-bold"  >{{ degree($document->user->id) }}</span>
                          </p>
                          </div>
                        </div>
                    
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                            <span class=" title-field-bold tils" >Đơn vị công tác:</span>
                            <span class="font-weight-bold" >{{ unit($document->user->work_unit_id) }}</span>
                          </p>
                          </div>
                          
                        </div>
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                            Theo Quyết định số …../QĐ-ĐHGTVT ngày …./…/20… của Hiệu trưởng Trường Đại học Giao thông vận tải Thành phố Hồ Chí Minh về việc Giao nhiệm vụ biên soạn tài liệu giảng dạy (đợt ….) năm học 20….-20…..<br><br>
                            Tôi được phê duyệt thực hiện biên soạn tài liệu giảng dạy (đợt …) năm học 20….- 20… như sau:
                          </p>
                          </div>
                          
                        </div>
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                            <span >Tên tài liệu giảng dạy:</span>
                            <span class="font-weight-bold">{{ $document->name_doc }}</span>
                          </p>
                          </div>
                          
                        </div>
                        
                       
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                            <span >Thời gian đăng ký thực hiện:</span>
                            <span class="font-weight-bold">
                             {{ day_register_doc($document->registerdoc->time_process) }}
                            </span>
                          </p>
                          </div>
                          
                        </div>
                        <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                           Nay làm đơn kính đề nghị Hiệu trưởng và các đơn vị liên quan xem xét cho phép tôi được hủy thực hiện biên soạn tài liệu giảng dạy trên. 
                          </p>
                          </div>
                          
                        </div>
                         <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                          Vì lý do:  
                            <span class="font-weight-bold">
                              {{ $document->cancel->reason }}
                            </span>
                          </p>
                          </div>
                          
                        </div>
                       <div class="row p-t-20 " style="padding-left: 32px">
                          <div class="col-lg-12" style="padding-left: 30px">
                            <p>
                          Trân trọng cảm ơn.
                          </p>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-6 text-center">
                            <p>
                              <span class="text-uppercase font-weight-bold title-page">Ý KIẾN HỘI ĐỒNG KHOA HỌC<br> 
                              ĐƠN VỊ QUẢN LÝ</span><br>
                              <span class="font-italic">(Ký tên, ghi rõ họ tên)</span>
                            </p>
                          </div>
                          <div class="col-6 text-center">
                            <p>
                              <span class="text-uppercase font-weight-bold title-page">CHỦ biên tlgd</span><br>
                              <span class="font-italic">(Ký tên, ghi rõ họ tên)</span>
                            </p>
                          </div>
                        </div>
                        <div class="row " style="margin-top: 50px">
                          <div class="col-6 text-center">
                            <p>
                              <span class="text-uppercase font-weight-bold title-page">Phê duyệt của hiệu trưởng</span>
                              
                            </p>
                          </div>
                          <div class="col-6 text-center">
                            <p>
                              <span class="text-uppercase font-weight-bold title-page">PHÒNG KHCN-NC&PT</span><br>
                              <span class="font-italic">(Ký tên, ghi rõ họ tên)</span>
                            </p>
                          </div>
                        </div>
                        
                        
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
                      <form method="post" action="{{ route('acceptcanceldoc',['id'=>$document->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary" {{-- data-dismiss="modal" --}}>Xác nhận hủy</button>
                      
                      </form>
                  </div>
              </div>
          </div>
      </div>