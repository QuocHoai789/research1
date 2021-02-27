<!DOCTYPE html>
<html>
<head>
    <title>Form đăng ký biên soạn tài liệu </title>
    <meta charset="UTF-8">
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
                                    <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                        <br /> thành phố hồ chí minh<br/><b>Khoa/viện ...</b></p>
                                    <hr class="hr-short">
                                </div>
                                <div class="col-6 text-center">
                                    <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                    </p>
                                    <p class="font-weight-bold mb-1 ">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                        phúc
                                    </p>
                                    <hr class="hr-short">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <p class="font-italic  mb-0 text-right" style="    padding-right: 80px;">Thành phố Hồ Chí Minh, ngày.... tháng.... năm 20....</p>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="text-uppercase title-page">
                                        BẢN ĐĂNG KÝ ĐỀ CƯƠNG BIÊN SOẠN TÀI LIỆU GIẢNG DẠY<br/> 
                                        NĂM HỌC 20… - 20….   
                                    </p>
                                </div>
                            </div>
                            <div class="page-content font-110">
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            <span >Họ và tên:  </span>
                                           <span class="text-uppercase title-field-bold">{{ $document->user->name }}</span>
                                       </p>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            <span >Khoa/Viện:  </span>
                                           <span class="text-uppercase font-weight-bold">{{ unit( $document->user->work_unit_id) }}</span>
                                       </p>
                                    </div>
                                    
                                </div>

                              <div class="row">
                                <div class="col-6">
                                    <p>
                                        <span >Học vị:  </span>
                                        <span class="font-weight-bold">{{ $degree->name }}</span>
                                    </p>
                                    
                                </div>
                                 <div class="col-6">
                                    <p>
                                        <span >Nước đào tạo:</span>
                                        @isset($document->registerdoc->national)
                                        <span class="font-weight-bold">
                                            {{ $document->registerdoc->national }}
                                        </span>
                                        @endisset
                                    </p>
                                    
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                              Giấy công nhận Văn bằng do Cục Quản lý chất lượng - Bộ GDĐT cấp (đối với Văn bằng đào tạo nước ngoài)
                                        </span>
                                        <span >
                                            @isset($document->registerdoc->recognition)
                                            {{ recognition($document->registerdoc->recognition) }}
                                            @endisset
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                             Họ và tên thành viên tham gia: (nếu có)… 
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ implode(', ', $members) }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                              Đơn vị công tác:  
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ unit($document->user->work_unit_id) }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                               <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                             Tên tài liệu giảng dạy:   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ $document->name_doc }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                            Thể loại:   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ typeDoc($document->type_doc) }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-4">
                                    <p>
                                        <span >
                                            Số tín chỉ:   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ $study->number_of_credits }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p>
                                        <span >
                                            Số tiết:   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ $study->number_of_lessons }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p>
                                        <span >
                                            Dự kiến số trang:   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ $document->registerdoc->page_numbers }} trang
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                            Sử dụng cho môn học (học phần):   
                                        </span>
                                        <span class="font-weight-bold">
                                            {{ $study->name_term }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                            Đối tượng sử dụng:   
                                        </span>
                                        <span class="font-weight-bold"> 
                                            @if($document->registerdoc->objects_of_use == 1)
                                            Đại học
                                            @elseif($document->registerdoc->objects_of_use == 2)
                                            Sau đại học
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span >
                                            Thời gian thực hiện:   
                                        </span>
                                        <span class="font-weight-bold">
                                            @isset($day)Từ  
                                                        {{ $day->begin }} đến                                                    {{ $day->finish }}@endisset
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p >
                                        <span >
                                            I. Nội dung 
                                        </span>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >1.Lời nói đầu </span>
                                        <div style="padding-left: 20px" class="font-weight-bold">
                                            {!! $document->registerdoc->preface !!}
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >2.Mục lục </span>
                                       
                                       <div style="padding-left: 20px" class="font-weight-bold">
                                            {!! $document->registerdoc->table_of_contents !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >3.Bảng ký hiệu </span>
                                        
                                         <div style="padding-left: 20px" class="font-weight-bold">
                                            {!! $document->registerdoc->table_of_symbols !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >4.Bảng viết tắt </span>
                                        <div style="padding-left: 20px" class="font-weight-bold">
                                            {!! $document->registerdoc->table_abbreviation !!}
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >5.Các chương của tài liệu giảng dạy </span>
                                        <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->chapters !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >6.Đáp án </span>
                                       
                                        <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->answer !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >7.Tài liệu tham khảo </span>
                                        
                                        <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->references !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >8.Phụ lục </span>
                                        
                                         <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->appendix !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >9.Bảng tra cứu thuật ngữ </span>
                                        
                                         <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->glossary_of_terminology !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span >10.Từ khóa </span>
                                        
                                         <div style="padding-left: 20px" class="font-weight-bold">
                                             {!! $document->registerdoc->key_works !!}
                                        </div>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p >
                                        <span >
                                             II. Mức độ khác biệt tài liệu biên soạn so với tài liệu khác: 
                                        </span>
                                        <span class="font-weight-bold">
                                            @if($document->registerdoc->level_of_difference == 1)
                                            Soạn mới 100%
                                            @elseif($document->registerdoc->level_of_difference == 2)
                                            Trích dẫn tài liệu tham khảo > 50%
                                            @elseif($document->registerdoc->level_of_difference == 3)
                                            Trích dẫn tài liệu tham khảo  ≤ 50%
                                            @endif
                                        </span>
                                        
                                    </p>
                                </div>
                            </div>

                                <div class="row mt-5 pb-20">
                                    <div class="col-4 text-center pt4">
                                        <p class="title-field-bold m-0">TRƯỞNG KHOA/VIỆN </p>
                                        
                                    </div>
                                    <div class="col-4 text-center pt4">
                                        <p class="title-field-bold m-0">TRƯỞNG BỘ MÔN </p>
                                        
                                    </div>
                                    <div class="col-4 text-center pt4">
                                        <p class="title-field-bold m-0">CHỦ BIÊN </p>
                                        
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
