<!DOCTYPE html>
<html>
<head>
	<title>Form đăng ký đề tài </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xét duyệt đề tài đăng ký - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
	<link rel="icon" type="image/png" href="cntt/images/icons/favicon.png"/>
	<base href="{{asset('')}}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/libs/css/style.css">
	<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
	<link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
	<link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
	<link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
	<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/editor/ckeditor/ckeditor.js"></script>


	<style type="text/css">
        .col-12
        {
            padding-top: 15px;
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
                              <span>{{ $scientific_extension->user->name }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Chức danh:  </span>
                              <span>{{ $scientific_extension->position }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Đơn vị công tác:  </span>
                              <span>{{ $organization->name }}</span>
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
                              <span>{{ $topic->name_topic }}</span>
                            </p>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Mã số:  </span>
                              <span>{{ $topic->id }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Tổng kinh phí thực hiện:  </span>
                              <span>{{number_format($topic->getRegisterTopic->expense ) }} đồng</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              Thời gian đăng ký thực hiện từ {{ $time->timeBefor }} đến {{ $time->timeEnd }}
                            </p>
                          </div>
                        </div>       
                        <div class="row">
                          <div class="col-12">
                            <p>
                              Thời gian gia hạn từ {{ $time_new->timeBefor }} đến {{ $time_new->timeEnd }}
                            </p>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Nội dung gia hạn:  </span>
                              <span>{{ $scientific_extension->content }}</span>
                            </p>
                          </div>
                        </div>       
                                
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Lý do gia hạn:  </span>
                              <span>{{ $scientific_extension->reason }}</span>
                            </p>
                          </div>
                        </div>        
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Kinh phí chuyển theo phần gia hạn(nếu có):  </span>
                              <span>{{ $scientific_extension->expense_diff }} đồng</span>
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
		</div>
	</div>

</body>
</html>
