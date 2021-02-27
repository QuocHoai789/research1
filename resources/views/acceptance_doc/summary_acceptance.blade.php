<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Biên bản họp thẩm định nghiệm thu tài liệu </title>
    <base href="{{ asset('') }}">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="cntt/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/util.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/main.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="lib/js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/general.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <style type="text/css">
    .row {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
    }

    .title-field-bold {
    font-weight: 600 !important;
}
    dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
li, ul {
    margin: 0;
    list-style-type: none;
}
    .title-field {
    font-weight: 500 !important;
    padding-right: 10px;
}
    .table-custom{
        width: 100%;
        border: 1px solid black;
    }
    .table-custom tr, .table-custom tbody tr td, .table-custom thead tr th {
    border: 1px solid black;
    text-align: center;
    padding: 5px;
}
        @media(max-width:500px) {

            .page {
                font-size: 35%;
            }
            .card-body{
                font-size: 8px;
            }
            .logo-img{
                display: none;
            }
            .button-menu-top{
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:501px) and (max-width:1023px) {
            .page {
                font-size: 52%;
            }
            .card-body{
                font-size: 8px;
            }
            .logo-img{
                display: none;
            }
            .button-menu-top{
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:1024px) {
            .page {
                font-size: 100%;
            }

        }
        .page{
         margin: 0px auto;
         width: 80%;
         font-family: "Times New Roman";
         border: 1px solid #ccc;
         
        }
        .hr-short {
            width: 45%;
            margin: 0px 0px 0px 28%;
            color: #080707;
            border: 0.5px solid;
        }
        .page-content {
            width: 80%;
            margin: 0px auto;
        }
            .page-content1 {
            width: 90%;
            margin: 0px auto;
        }
        .til{
            padding-top: 15px;
        }
        /*.tils{

                padding-left: 100px;
        }*/
        .dashboard-wrapper{
            margin-left: 0px;
        }
        .dashboard-content{
            padding-bottom: 0px;
        }
    </style>
</head>
<body>
    <div class="rev-slider">
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
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
                      <p class="text-uppercase font-weight-bold title-page">
                        BIÊN BẢN HỌP HỘI ĐỒNG<br/>
                        THẨM ĐỊNH, NGHIỆM THU TÀI LIỆU GIẢNG DẠY
                        </p>
                        
                    </div>
                    
                </div>
                            <div class="page-content font-110">
                                
                              <div class="row">
                                <div class="col-12 font-weight-bold text-uppercase">
                                  I. Thông tin chung:
                                </div>

                              </div>

                              <div class="row p-t-15">
                                <div class="col-12 ">
                                  <p>
                                    <span> 1.1 Tên tài liệu giảng dạy:  </span>
                                    <span class="font-weight-bold">{{ $doc->name_doc }}</span>
                                  </p>
                                 
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span> 1.2.  Thể loại:  </span>
                                    <span class="font-weight-bold">{{ typeDoc($doc->type_doc) }}</span>
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span> 1.3.  Chủ biên:  </span>
                                    <span class="font-weight-bold">
                                      {{ $doc->user->name }}
                                    </span>
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span>  1.4. Quyết định thành  lập  Hội  đồng  thẩm  định, nghiệm thu tài liệu giảng dạy: Quyết định số………./QĐ – ĐHGTVT, ngày………         tháng ………        năm 2020 của Hiệu trưởng Trường Đh GTVT TP.HCM.  </span>
                                    
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span> 1.5. Thời gian và địa điểm họp Hội đồng</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <p>
                                    <span> -  Lúc giờ: …….giờ……..ngày       /      /20…</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <p>
                                    <span> -  Tại phòng</span>
                                    
                                  </p>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span> 1.6. Thành viên Hội đồng</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <p>
                                    <span> -  Tổng số:…..</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <p>
                                    <span> -  Có mặt:……người. Bao gồm:</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <table class="table-custom">
                                    <thead>
                                      <tr>
                                        <th class="w7">STT</th>
                                        <th>Họ và tên</th>
                                        <th >Đơn vị CT</th>
                                        <th >Chức danh hội đồng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($acceptance_doc as $key => $acc )
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $acc->user->name }}</td>
                                        <td>{{ unit($acc->user->work_unit_id) }}</td>
                                        <td>
                                          {{ position_evalute($acc->position_council) }}
                                        </td>

                                      </tr>
                                      @endforeach

                                     
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-12 p-t-20">
                                  <p>
                                    <span>Vắng mặt:…………………Lý do:……</span>
                                    
                                  </p>
                                </div>
                                <div class="col-12">
                                  <p>
                                    <span>1.7.  Khách mời (nếu có):………………………………………………………………….</span>
                                    
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12 font-weight-bold">
                                 <p>
                                 <span>II. NỘI DUNG LÀM VIỆC CỦA HỘI ĐỒNG</span> 
                                 <span></span>
                                 </p>
                                </div>
                                <div class="col-12 font-weight-bold">
                                 <p>
                                 <span>1. Các văn bản liên quan:</span> 
                                 <span></span>
                                 </p>
                                </div>
                                <div class="col-12 ">
                                 <p class="p-l-15">
                                  -  Quyết định thành lập hội đồng thẩm định TLGD “………………………..…..”<br/>
                                   - Bản nhận xét, đánh giá TLGD “……………………………....” của phản biện 1-2.<br/>
                                   - Bản thảo hoàn chỉnh TLGD “……………………………………..….”

                                 </p>
                                </div>
                                <div class="col-12 ">
                                  <p>
                                    <span class="font-weight-bold">2.  Trình tự thực hiện</span>
                                  </p>
                                  <p class="p-l-15">
                                    - Thư ký Hội đồng đọc quyết định thành lập Hội đồng thẩm định TLGD: “………………………………………..” số …/…ngày…/…/….
                                    - Tác giả trình bày tóm tắt TLGD<br/>
                                    - Thành viên Hội đồng phản biện 1 đọc nhận xét, đánh giá TLGD;<br/>
                                    - Thành viên Hội đồng phản biện 2 đọc nhận xét, đánh giá TLGD;<br/>
                                    - Các thành viên trong Hội đồng đóng góp ý kiến

                                  </p>
                                  <p style="font-weight: italic" class="font-weight-bold">
                                    Sau khi đã đóng góp ý kiến, hội đồng đã đi đến kết luận sau:
                                  </p>
                                </div>
                                <div class="col-lg-12">
                                  <p class="font-weight-bold">a) Về hình thức</p>
                                  <p class="p-l-15">
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                  </p>
                                  
                                </div>
                                <div class="col-lg-12">
                                  <p class="font-weight-bold">b) Về nội dung</p>
                                  <p class="p-l-15">
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                  </p>
                                  
                                </div>
                                <div class="col-lg-12">
                                  <p>2.4. Kết quả đánh giá và bỏ phiếu của Hội đồng:</p>
                                  <p class="p-l-15">Hội đồng tiến hành bỏ phiếu, kết quả kiểm phiếu như sau:</p>
                                </div>
                                <div class="col-6">
                                  <p class="p-l-25">Tổng số phiếu phát ra:    phiếu</p>
                                </div>
                                <div class="col-6">
                                  <p class="p-l-15">- Tổng số phiếu thu vào:……phiếu</p>
                                </div>
                                <div class="col-6">
                                  <p class="p-l-25">Số phiếu hợp lệ:…………. phiếu</p>
                                </div>
                                <div class="col-6">
                                  <p class="p-l-15">- Số phiếu không hợp lệ:……phiếu</p>
                                </div>
                                <div class="col-12">
                                  <p class="p-l-15">Điểm số</p>
                                  <table class="table-custom">
                                    <thead>
                                      <th>Phiếu số</th>
                                      <th>CT HĐ</th>
                                      <th>UVPB1</th>
                                      <th>UVPB2</th>
                                      <th>UV</th>
                                      <th>UV TKHĐ</th>
                                    </thead>
                                    <tbody>

                                      <tr>
                                        <td>
                                          
                                        </td>
                                        <td class="font-weight-bold">{{ $score['president'] }}</td>
                                        <td class="font-weight-bold">{{ $score['pb1'] }}</td>
                                        <td class="font-weight-bold">{{ $score['pb2'] }}</td>
                                        <td class="font-weight-bold">{{ $score['uv'] }}</td>
                                        <td class="font-weight-bold">{{ $score['tk'] }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p class="p-l-15 p-t-25 ">Trung bình điểm số: <span class="font-weight-bold">{{ $avg_score }}</span> </p>
                                  <p>2.5. Đề nghị chỉnh sửa: (nếu có)</p>
                                  <p class="p-l-15">
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                  </p>
                                  <p>2.6. Kết luận của Chủ tịch Hội đồng:</p>
                                  <p class="p-l-15">
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                    …………………………………………………………………………………………………………….<br/>
                                  </p>
                                  
                                </div>

                              </div>
                              
                             
                              <div class="row">
                                <div class="col-12">
                                  <p class="font-weight-bold">
                                    IV. KẾT LUẬN CHUNG
                                  </p>
                                  <p class="p-l-20">
                                    Trên cơ sở kết quả Phiếu thẩm định, nghiệm thu TLGD và các nhận xét, đánh giá TLGD của các thành viên. Hội đồng đã thống nhất…………………………………………...<br/>
                                    Đề nghị Tác giả sớm hoàn thiện và gửi Hồ sơ TLGD về Phòng Khoa học Công nghệ và Nghiên cứu phát triển trong vòng 30 ngày kể từ khi kết thúc họp Hội đồng thẩm định. Bao gồm:<br/> 
                                    - TLGD hoàn chỉnh (đã được chỉnh sửa, bổ sung): 02 bản in và 02 bản mềm trên đĩa CD (được format dưới dạng Microsoft Word);<br/>
                                    - Bản giải trình và bàn giao của Tác giả biên soạn đã chỉnh sửa và bổ sung theo yêu cầu của Hội đồng có chữ ký của thư ký Hội đồng và Chủ tịch Hội đồng.<br/>

                                    Hội đồng tuyên bố kết thúc buổi thẩm định TLGD vào lúc…….………..cùng ngày./.


                                   
                                  </p>
                                </div>
                              </div>
                             

                        
                                <div class="row mt-5 pb-20 ">
                                    <div class="col-6  ">
                                        <p class="title-field-bold m-0">Chủ tịch Hội đồng </p>
                                        <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                    </div>
                                    <div class="col-6  ">
                                        <p class="title-field-bold m-0">Thư ký Hội đồng</p>
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
        </div>
    </div>

</body>
</html>
