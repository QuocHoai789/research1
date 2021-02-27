
<div class="container">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="p-r-10 p-rl-0-sr991 p-b-20">
                    <div class="p-b-25 d-flex justify-content-center" style="margin-top: 50px">
            <div class="p-t-15 page"style="width: 794px;background: #fff">
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
                 <div class="row " style="padding-top: 55px">
                     <div class="col-12 text-center">
                        <p class="text-uppercase font-weight-bold title-page">PHIẾU ĐĂNG KÝ ĐỀ TÀI
                        </p>
                    </div>
                    
                </div>
                <div class="page-content font-110">
                    <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">1. Tên đề tài: </span> 
                               <span class="text-uppercase">{{ $topic->name_topic }}</span>
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">2. Lĩnh vực nghiên cứu: </span> 
                               <span class="text-uppercase">
                                @php
                                if(isset($researchType)){
                                    $retype = implode(", ", $researchType);
                                    echo $retype; 
                                }
                                                                  
                                @endphp
                                    {{-- @foreach($researchType as $res)
                                    {{ $res }}, 
                                   @endforeach --}}
                               </span>
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">3. Tính cấp thiết: </span> 
                               <span class="text-uppercase">{{ $topic->getRegisterTopic->importance }}</span>
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">4. Mục tiêu: </span> 
                               <span class="text-uppercase">{{ $topic->getRegisterTopic->target }}</span>
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">5. Nội dung chính: </span> 
                               <span class="text-uppercase">{{ $topic->getRegisterTopic->content_topic }}</span>
                            </p>
                            </div>

                        </div>
                        <div class="row p-t-20">
                        <div class="col-12 ">
                            <p><span class="font-weight-bold title-field-bold tils">6. Sản phẩm và kết quả dự kiến: </span> 
                            </p>
                            </div>
                            
                            <div class="page-content1 row">
                                <div class="col-12 ">
                                <p class=" " style="padding-top: 10px"><span class="title-field-bold tils ">6.1) Sản phẩm khoa học: </span></p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="" style="padding-left: 56px;" {{-- style="padding-left: 69px; padding-top: 5px" --}}><span class="title-field-bold tils ">- Số bài báo khoa học đăng tạp chí quốc tế: </span><span class="text-uppercase">{{ $topic->getRegisterTopic->magazine_internation }}</span></p>
                                    </div>
                                    <div class="col-12">
                                        <p class=""style="padding-left: 56px;" ><span class="title-field-bold tils ">- Số bài báo khoa học đăng tạp chí trong nước: </span><span class="text-uppercase">{{ $topic->getRegisterTopic->magazine_domestic }}</span></p>
                                    </div>
                                    <div class="col-12">
                                        <p class="" style="padding-left: 56px;" ><span class="title-field-bold tils ">- Số lượng sách xuất bản: </span><span class="text-uppercase">{{ $topic->getRegisterTopic->publish }}</span></p>
                                    </div>
                                </div>
                                
                            <div class="col-12  ">
                                <p style="padding-top: 10px"  ><span class="title-field-bold tils ">6.2 Sản phẩm đào tạo (số lượng CN, ThS, TS): </span><span class="text-uppercase">{{ $topic->getRegisterTopic->specialized }} chuyên ngành, {{$topic->getRegisterTopic->master  }} thạc sĩ, {{ $topic->getRegisterTopic->doctor }} tiến sĩ </span></p>
                            </div>
                            <div class="col-12 ">
                                <p style="padding-top: 10px" ><span class="title-field-bold tils ">6.3) Sản phẩm ứng dụng: Mô tả tóm tắt về sản phẩm dự kiến, phạm vi, khả năng và địa chỉ ứng dụng): </span><span class="text-uppercase">{{ $topic->getRegisterTopic->application }}</span></p>
                            </div>
                            
                            <div class="col-12 ">
                                <p style="padding-top: 10px"><span class="title-field-bold tils ">6.4) Sản phẩm khác: </span><span class="text-uppercase">{{ $topic->getRegisterTopic->application_diff }}</span></p>
                            </div>

                        </div>
                            </div>
                              
                        <div class="row p-t-20">
                            <div class="col-8 ">
                                <p ><span class="font-weight-bold title-field-bold tils ">7. Hiệu quả dự kiến: </span><span class="text-uppercase">{{ $topic->getRegisterTopic->effective }}</span></p>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-12 ">
                                <p ><span class="font-weight-bold title-field-bold tils ">8. Thời gian nghiên cứu dự kiến: </span><span class="">{{ $topic->getRegisterTopic->time }} tháng </span></p>
                            </div>
                        </div>
                        <div class="row p-t-20" >
                            <div class="col-12 ">
                                <p ><span class="font-weight-bold title-field-bold tils ">9. Nhu cầu kinh phí dự kiến: </span><span class="text-uppercase">{{number_format($topic->getRegisterTopic->expense)  }} đồng</span></p>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

