<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Xét duyệt đăng ký đề tài </title>
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
                        <p class="text-uppercase font-weight-bold title-page">PHIẾU ĐÁNH GIÁ ĐỀ CƯƠNG CHI TIẾT TÀI LIỆU GIẢNG DẠY <br/>
                          
                          <span style="font-size: 15px">(Dành cho các thành viên trong Hội đồng đánh giá)</span> 
                             

                        </p>
                        
                    </div>
                    
                </div>
                            <div class="page-content font-110">
                                

                              
                        <div class="row">
                          <div class="col-7">
                            <p>
                              <span>Họ và tên thành viên Hội đồng:  </span>
                              <span class="font-weight-bold">{{ $evalute_doc->user->name }}</span>
                            </p>
                          </div>
                          <div class="col-5">
                            <p>
                              <span>Chức danh HĐ:  </span>
                              <span class="font-weight-bold">
                                @if($position == 'president')
                                Chủ tịch hội đồng
                                @elseif($position == 'uv')
                                Ủy viên
                                @elseif($position == 'pb1')
                                Ủy viên, phản biện 1
                                @elseif($position == 'pb2')
                                Ủy viên, phản biện 2
                                @elseif($position == 'tk')
                                Uỷ viên, Thư ký hội đồng
                                @endif
                              </span>
                            </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-7">
                            <p>
                              <span>Họ và tên Chủ biên:  </span>
                              <span class="font-weight-bold">{{ $doc->user->name }}</span>
                            </p>
                          </div>
                          <div class="col-5">
                            <p>
                              <span>Học vị:  </span>
                              <span class="font-weight-bold">{{ $degree->name }}</span>
                            </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Tên tài liệu giảng dạy:  </span>
                              <span class="font-weight-bold">{{ $doc->name_doc }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Thể loại:  </span>
                              <span class="font-weight-bold">{{ typeDoc($doc->type_doc) }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <p>
                              <span>Học phần:  </span>
                              <span class="font-weight-bold">{{ $study->name_term }}</span>
                            </p>
                          </div>
                          <div class="col-6">
                            <p>
                              <span>Số tín chỉ:  </span>
                              <span class="font-weight-bold">{{ $study->number_of_credits }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Điểm đánh giá của thành viên Hội đồng :  </span>
                              
                            </p>
                          </div>
                          <div class="col-12">
                           <table class="table-custom">
                            <thead>
                              <tr>
                                <th class="w7">STT</th>
                                <th>Nội dung đánh giá</th>
                                <th style="width: 70px">Điểm tối đa</th>
                                <th style="width: 70px">Điểm đánh giá</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                <td>1</td>
                                <td class="font-weight-bold">Cấu trúc giáo trình phù hợp với quy định</td>
                                <td>20</td>
                                <td class="font-weight-bold">{{ $evalute_doc->curriculum_structure }}</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>
                                  <span class="font-weight-bold">Sự phù hợp với khung chương trình và chương trình chi tiết đối với ngành học.</span>
                                  
                                  (So  sánh với  khung chương trình  và  đề cương chi tiết
                                </td>
                                <td>25</td>
                                <td class="font-weight-bold">{{ $evalute_doc->suitability }}</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td  > <span class="font-weight-bold">Tính cấp thiết của giáo trình đối với nhu cầu đào tạo của Nhà trường.</span>
                                </td>
                                <td>35</td>
                                <td class="font-weight-bold">{{ $evalute_doc->urgency }}</td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td><span class="font-weight-bold">Sự trùng lặp với các tài liệu tham khảo khác</span>
                                  (So  sánh  nội dung  TLGD  nghiệm  thu  với  
                                  các  giáo trình,  tài liệu  tham  khảo  đã ban  
                                  hành  để đánh  giá  tính riêng, mức độ tổng 
                                  hợp kiến thức của TLGD)

                                </td>
                                <td>20</td>
                                <td class="font-weight-bold">{{ $evalute_doc->duplication }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>
                                  <span class="font-weight-bold">Cộng</span>
                                  

                                </td>
                                <td>100</td>
                                <td class="font-weight-bold">{{ $evalute_doc->total }}</td>
                              </tr>
                              <tr>
                                <td colspan="3">
                                  <span class="font-weight-bold">Xếp loại</span>
                                 
                                 (Tốt : 80 điểm đến 100 điểm, Khá : 70 điểm đến dưới 80 điểm ; Đạt: 50 điểm)
                               </td> 

                               <td class="font-weight-bold">
                                 @if($evalute_doc->classification == 1)
                                 Tốt
                                 @elseif($evalute_doc->classification == 2)
                                 Khá
                                 @elseif($evalute_doc->classification == 3)
                                 Đạt
                                 @endif
                               </td>
                             </tr>
                           </tbody>
                         </table>
                       </div>

                     </div>
                        
                              <div class="row p-t-15">
                                <div class="col-12">
                                  <p>
                                    <span>Các ý kiến đóng góp :</span>
                                    <span class="font-weight-bold">{{ $evalute_doc->opinion }}</span>
                                   </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span>Kết luận:</span>
                                    <span class="font-weight-bold">
                                      @if($evalute_doc->conclude == 1)
                                      Đồng ý thông qua đề cương (điểm đánh giá ≥ 80 điểm).
                                      @elseif($evalute_doc->conclude == 2)
                                      Biên soạn lại.
                                      @endif
                                    </span>
                                   </p>
                                </div>
                              </div>
                        
                                <div class="row mt-5 pb-20 d-flex justify-content-end">
                                    <div class="col-4  ">
                                        <p class="title-field-bold m-0">Người đánh giá</p>
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
