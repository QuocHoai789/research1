<!DOCTYPE html>
<html>
<head>
	<title> </title>
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
                    <div class="p-b-25 d-flex justify-content-center" style="margin-top: 50px">
            <div class="p-t-15 page"style="width: 794px;background: #fff">
                         <div class="row font-110 ">
                                <div class="col-6 text-center til">
                                    <p class="text-uppercase mb-0 font-weight-bold">TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI<br/>
                                        THÀNH PHỐ HỒ CHÍ MINH<br/>
                                        KHOA/VIỆN….
                                    </p>
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
                        <p class="text-uppercase font-weight-bold title-page">GIỚI THIỆU<br/>
                            DANH SÁCH CÁC THÀNH VIÊN HỘI ĐỒNG THẨM ĐỊNH TLGD<br/>
                            “Tên Giáo trình/Sách chuyên khảo…….”

                        </p>
                    </div>
                    
                </div>
                <div class="page-content font-110">
                    <div class="row p-t-20">
                        <div class="col-12 ">
                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Họ và tên</th>
                                                        <th>Đơn vị công tác</th>
                                                        <th>Chức danh Hội đồng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $key => $u)

                                                    <tr>
                                                        <td>{{$i++ }}</td>
                                                        @if($key == 'president')
                                                        @foreach ($users[$key] as $u)
                                                        <td>{{ $u->name }}</td>
                                                        <td></td>
                                                        <td> Chủ tịch hội đồng</td>
                                                        @endforeach
                                                        @endif
                                                        @if($key == 'uv')
                                                        @foreach ($users[$key] as $u)
                                                        <td>{{ $u->name }}</td>
                                                        <td></td>
                                                        <td> Ủy viên</td>
                                                        @endforeach
                                                        @endif
                                                        @if($key == 'pb1')
                                                        @foreach ($users[$key] as $u)
                                                        <td>{{ $u->name }}</td>
                                                        <td></td>
                                                        <td> Ủy viên, phản biện 1</td>
                                                        @endforeach
                                                        @endif
                                                        @if($key == 'pb2')
                                                        
                                                        <td></td>
                                                        <td></td>
                                                        <td> Ủy viên, phản biện 2</td>
                                                        
                                                        @endif
                                                        
                                                        @if($key == 'tk')
                                                        @foreach ($users[$key] as $u)
                                                        <td>{{ $u->name }}</td>
                                                        <td></td>
                                                        <td> Ủy viên, Thư ký hội đồng</td>
                                                        @endforeach
                                                        @endif
                                                        
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                            </div>

                        </div>
                        <div class="row p-t-20 d-flex justify-content-end">
                            <div class="col-4">
                                <p>
                                    <span class="title-field-bold m-0">Trưởng Khoa/Viện</span>
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
		</div>
	</div>

</body>
</html>
