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
                        <p class="text-uppercase font-weight-bold title-page">BÁO CÁO TRIỂN KHAI THỰC HIỆN<br> ĐỀ TÀI NGHIÊN CỨU KHOA HỌC 
                          @php 
                          typeTopic($topic->type_topic);
                           @endphp  

                        </p>
                        
                    </div>
                    
                </div>
                            <div class="page-content font-110">
                                

                              <div class="row">
                                <div class="col-12">
                                  <p class="font-weight-bold">I. Thông tin chung.</p>
                                </div>
                              </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>1.Tên đề tài:  </span>
                              <span>{{ $topic->name_topic }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>2.Mã số:  </span>
                              <span>{{ $topic->id }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>3.Chủ nhiệm đề tài:  </span>
                              <span>{{ $topicManager->name }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>4.Đơn vị chủ trì:  </span>
                              <span>{{ $organization->name }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>5.Thời gian thực hiện:  </span>
                              <span> từ {{ $time->timeBefor }} đến {{ $time->timeEnd }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>6.Tổng kinh phí:  </span>
                              <span>{{ number_format($registerTopic->expense) }} đồng</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                                <div class="col-12">
                                  <p class="font-weight-bold">II. Đánh giá tình hình thực hiện đề tài.</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>1.Nội dung nghiên cứu</p>
                                </div>

                                <div class="col-12">
                                  <table class="table-custom">
                                    <thead>
                                      <tr>
                                        <th>STT</th>
                                        <th>Nội dung nghiên cứu theo thuyết minh đề tài</th>
                                        <th>Nội dung nghiên cứu đã thực hiện</th>
                                        <th>Mức độ hoàn thành (%)</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($content as $key => $cont)
                                      <tr>
                                        <td>{{ $key }}</td>
                                        <td class="text-capitalize">
                                          {{ $cont->contentExplanation }}
                                        </td>
                                        <td>{{ $cont->contentCombination }}</td>
                                        <td>{{ $cont->finish }}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>2.Sản phẩm</p>
                                </div>
                                
                                <div class="col-12">
                                  <table class="table-custom">
                                    <thead>
                                      <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm theo thuyết minh đề tài</th>
                                        <th>Sản phẩm đã thực hiện</th>
                                        <th>Mức độ hoàn thành (%)</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($product as $key => $pro)
                                      <tr>
                                        <td>{{ $key }}</td>
                                        <td class="text-capitalize">
                                          {{ $pro->productExplanation }}
                                        </td>
                                        <td>{{ $pro->make }}</td>
                                        <td>{{ $pro->finish }}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                        
                        <div class="row">
                          <div class="col-12">
                            <p>3.Kinh phí đề tài.</p>
                          </div>
                          <div class="col-12">
                            <p>
                              <span>+ Kinh phí đã được cấp:  </span>
                              <span>{{ number_format($expense->provided) }} đồng</span>
                            </p>
                          </div>
                          <div class="col-12">
                            <p>
                            <span>+ Kinh phí đã chi (giải trình các khoản chi):  </span> 
                            <span>{{number_format($expense->spent)  }} đồng</span> 
                          </p>
                          </div>
                          <div class="col-12">
                            <p>
                            <span>+ Kinh phí đã quyết toán:  </span>
                            <span>{{number_format($expense->settlement)  }} đồng</span>
                          </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>4.Mức độ hoàn thành theo tiến độ:  </span>
                              <span>{{ $report->finish }}</span>
                            </p>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p class="font-weight-bold">III.Kế hoạch triển khai tiếp theo</p>
                          </div>
                          <div class="col-12">
                            <p>
                              <span>1.Về nội dung nghiên cứu:  </span>
                              <span>{{ $plan->content }}</span>
                            </p>
                          </div>
                          <div class="col-12">
                            <p>
                              <span>2.Dự thảo kết quả:  </span>
                              <span>{{ $plan->expected }}</span>
                            </p>
                          </div>
                          <div class="col-12">
                            <p>
                              <span>3.Kinh phí:  </span>
                              <span>{{ number_format($plan->expense) }} đồng</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p class="font-weight-bold">IV.Kiến nghị của chủ nhiệm đề tài</p>
                            <p>{{ $report->opinion }}</p>
                          </div>
                        </div>
                              
                              
                                <div class="row mt-5 pb-20">
                                    <div class="col-6 text-center ">
                                        <p class="title-field-bold m-0">Xác nhận của lãnh đạo đơn vị</p>
                                        <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                    </div>
                                    <div class="col-6 text-center">
                                        
                                        <p class="title-field-bold m-0">Chủ nhiệm đề tài</p>
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
