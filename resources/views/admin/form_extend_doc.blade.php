<!DOCTYPE html>
<html>
<head>
  <title>Form gia hạn biên soạn tài liệu </title>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Form gia hạn biên soạn tài liệu </title>
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
         margin-bottom: 50px;
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
                                                <span class="font-weight-bold">{{ $doc->name_doc }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Chủ biên: </span>
                                                <span class="font-weight-bold">{{ $doc->user->name }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <span>Đơn vị: </span>
                                                <span class="font-weight-bold">{{ unit($doc->user->work_unit_id) }}</span>
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
                                                {{ day_register_doc($doc->registerdoc->time_process) }}

                                               </span>
                                                                                               
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 2.Nội dung chưa hoàn thành</span>(Theo hợp đồng hoặc theo đề cương):  
                                               <span class="font-weight-bold">{{ $doc->extension->content }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 3.Nguyên nhân:  </span>
                                               <span class="font-weight-bold">{{ $doc->extension->reason }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                               <span class="font-weight-bold"> 4. Đề nghị gia hạn:  </span>(Thời gian gia hạn không quá 6 tháng)
                                               <span class="font-weight-bold">{{ $doc->extension->time }} tháng</span>
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
    </div>
  </div>

</body>
</html>
