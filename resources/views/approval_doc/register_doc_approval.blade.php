<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Xét duyệt biên soạn tài liệu giảng dạy</title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


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
            padding: 25px;
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
	<div class="dashboard-header ">
        
		<nav class="navbar navbar-expand-lg bg-white fixed-top">
			<a class="navbar-brand" href="{{ route('admin') }}"><img class="logo-img" width="50" src="cntt/images/icons/logo.png" alt="logo"></a><span class="h7">Xét duyệt đề tài đăng ký</span> 
			<button class="navbar-toggler collapsed button-menu-top" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i style="color:#71748d ;" class="fa fa-angle-down" aria-hidden="true"></i></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto navbar-right-top">
					<li class="nav-item dropdown nav-user">
						<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
						<div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
							<div class="nav-user-info">
								@if (Auth::check())
								<h5 class="mb-0  nav-user-name">{{Auth::user()->name}}</h5>
								@endif
								<span class="status"></span><span class="ml-2">Xét duyệt tài liệu</span>
							</div>
							<a class="dropdown-item" href="{{route('logoutapproval')}}"><i class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="rev-slider">
		<div class="dashboard-wrapper">
			<div class="dashboard-ecommerce">
				<div class="container-fluid dashboard-content ">
					<!-- ============================================================== -->
					<!-- pageheader  -->
					<!-- ============================================================== -->
					<div class="row " style="padding-top: 20px;">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="page-header">
								<h2 class="pageheader-title">Tài liệu:{{$doc->name_doc}} </h2>
								<p class="pageheader-text">.</p>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end pageheader  -->
			<!-- ============================================================== -->
		</div>
		<div class="row">


			{{-- Modal Approval --}}
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form id="form-approval-doc" method="post" action="{{ route('duyettailieu') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" id="id_doc" name="id_doc" value="{{ $doc->id }}" >
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Xét duyệt tài liệu: {{ $doc->name_doc }} </h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

                                    
                                    <div class="form-group">
                                    	<label for="message-text" class="col-form-label">Tin nhắn:</label>
                                    	<textarea class="form-control" name="message" id="message-text" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                	<button type="submit" class="btn btn-success">Duyệt</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end Modal --}}


                

                

               {{-- Modal Cancel --}}
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form id="form-cancel-doc" method="post" action="">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" id="id_doc" name="id_doc">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title font-weight-bold text-danger" id="exampleModalLabel">Hủy xét duyệt tài liệu: {{ $doc->name_doc }} </h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

                                     {{--  <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" id="recipient-name" required>
                                    </div> --}}
                                    <div class="form-group">
                                    	<label for="message-text" class="col-form-label">Tin nhắn:</label>
                                    	<textarea class="form-control" name="message" id="message-text" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                	<button type="submit" class="btn btn-danger">Không duyệt</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                
                {{-- end Modal --}}
                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                	<div class="card">
                		<div class="card-header">
                			{{-- <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ xét duyệt ({{number_format(count($doc))}})</b></h4> --}}
                		</div>
                		<div class="card-body">
                			<div class="table-responsive">
                				<table id="example" class="table table-striped table-bordered second w-100" >
                					<thead>
                						<tr>
                							<th scope="col">Tên tài liệu </th>
                							<th scope="col">Người đăng ký</th>
                							<th scope="col">Đối tượng sử dụng</th>
                							{{-- <th scope="col">Thể loại</th> --}}
                							<th scope="col" class="text-center">Thời gian đăng ký</th>
                							{{-- <th scope="col" class="text-center">Form đăng ký</th> --}}

                							<th scope="col" class="text-center">Tình trạng</th>
                                            
                                            @if($doc->status != 2 && $doc->close != 1)
                							<th scope="col" class="text-center">Duyệt</th>
                							<th scope="col" class="text-center">Không duyệt</th>
                                            @endif
                						</tr>
                					</thead>
                					<tbody>
                						<tr>
                							<td>{{$doc->name_doc}}</td>
                							<td>{{$doc->user->name}}</td>
                							@if($doc->type_doc==1)
                							<td>Đại học</td>
                							@endif
                							@if($doc->type_doc==2)
                							<td>Sau đại học</td>
                							@endif
                							
                							

                							<td class="text-center">{{$doc->created_at}}</td>
                							{{-- <td class="text-center"><a class="text-primary" href="{{ route('xemdetai',$doc->id) }}">(Tải về)</a></td> --}}
                							<td class="text-center">
                								@if($doc->close==1) 
                								<span class="badge-dot badge-danger">Đề tài đã bị hủy</span>
                								@else
                								@if($doc->status==1) 
                								<span class="badge-dot badge-warning rounded-pill">Chờ xét duyệt</span>
                								@endif
                								@if($doc->status!=0&&$doc->status!=1) 
                								<span class="badge-dot badge-success rounded-pill">Đề tài đã được xét duyệt</span>
                								@endif
                                                @endif
                							</td>
                                          
                                            
                                            
                                            @if($doc->status != 2 && $doc->close != 1)
                							<td class="text-center">
                								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$doc->id}}" data-name="{{$doc->name_doc}}">Duyệt</button>
                							</td>
                							<td class="text-center">
                								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-id="{{$doc->id}}" data-name="{{$doc->name_doc}}">Không duyệt</button>
                							</td>
                                            @endif
                							
                						</tr>
                					</tbody>
                				</table>

                			</div>

                		</div>

                	</div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>
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
                                    <p class="font-italic  mb-0 text-right" style="    padding-right: 80px;">Thành phố Hồ Chí Minh, ngày....tháng....năm 20....</p>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="text-uppercase title-page">
                                        BẢN ĐĂNG KÝ ĐỀ CƯƠNG BIÊN SOẠN TÀI LIỆU GIẢNG DẠY<br/> 
                                        NĂM HỌC 20…. - 20….   
                                    </p>
                                </div>
                            </div>
                            <div class="page-content font-110">
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            <span class="title-field-bold">Họ và tên: </span>
                                           <span class="text-uppercase">{{ $doc->user->name }}</span>
                                       </p>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            <span class="title-field-bold">Khoa/Viện:</span>
                                           <span class="text-uppercase"></span>
                                       </p>
                                    </div>
                                    
                                </div>

                              <div class="row">
                                <div class="col-6">
                                    <p>
                                        <span class="title-field-bold">Học vị:</span>
                                        <span>{{ $degree->name }}</span>
                                    </p>
                                    
                                </div>
                                 <div class="col-6">
                                    <p>
                                        <span class="title-field-bold">Nước đào tạo:</span>
                                        @isset($doc->registerdoc->national)
                                        {{ $doc->registerdoc->national }}
                                        @endisset
                                    </p>
                                    
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                              Giấy công nhận Văn bằng do Cục Quản lý chất lượng - Bộ GDĐT cấp (đối với Văn bằng đào tạo nước ngoài)
                                        </span>
                                        <span>
                                            @isset($doc->registerdoc->recognition)
                                            {{ recognition($doc->registerdoc->recognition) }}
                                            @endisset
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                             Họ và tên thành viên tham gia: (nếu có)… 
                                        </span>
                                        <span>
                                            {{ implode(', ', $members) }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                              Đơn vị công tác 
                                        </span>
                                        <span>
                                            
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                               <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                             Tên tài liệu giảng dạy 
                                        </span>
                                        <span>
                                            {{ $doc->name_doc }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                            Thể loại 
                                        </span>
                                        <span>
                                            {{ typeDoc($doc->type_doc) }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-4">
                                    <p>
                                        <span class="title-field-bold">
                                            Số tín chỉ 
                                        </span>
                                        <span>
                                            {{ $study->number_of_credits }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p>
                                        <span class="title-field-bold">
                                            Số tiết 
                                        </span>
                                        <span>
                                            {{ $study->number_of_lessons }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p>
                                        <span class="title-field-bold">
                                            Dự kiến số trang 
                                        </span>
                                        <span>
                                            {{ $doc->registerdoc->page_numbers }} trang
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                            Sử dụng cho môn học (học phần) 
                                        </span>
                                        <span>
                                            {{ $study->name_term }}
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                            Đối tượng sử dụng 
                                        </span>
                                        <span> 
                                            @if($doc->registerdoc->objects_of_use == 1)
                                            Đại học
                                            @elseif($doc->registerdoc->objects_of_use == 2)
                                            Sau đại học
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p>
                                        <span class="title-field-bold">
                                            Thời gian thực hiện 
                                        </span>
                                        <span>
                                            @isset($day)
                                                        {{ $day->begin }} đến                                                    {{ $day->finish }}@endisset
                                        </span>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p >
                                        <span class="title-field-bold">
                                            I. Nội dung 
                                        </span>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">1.Lời nói đầu </span>
                                        <div style="padding-left: 20px">
                                            {!! $doc->registerdoc->preface !!}
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">2.Mục lục </span>
                                       
                                       <div style="padding-left: 20px">
                                            {!! $doc->registerdoc->table_of_contents !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">3.Bảng ký hiệu </span>
                                        
                                         <div style="padding-left: 20px">
                                            {!! $doc->registerdoc->table_of_symbols !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">4.Bảng viết tắt </span>
                                        <div style="padding-left: 20px">
                                            {!! $doc->registerdoc->table_abbreviation !!}
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">5.Các chương của tài liệu giảng dạy </span>
                                        <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->chapters !!}
                                        </div>

                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">6.Đáp án </span>
                                       
                                        <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->answer !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">7.Tài liệu tham khảo </span>
                                        
                                        <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->references !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">8.Phụ lục </span>
                                        
                                         <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->appendix !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">9.Bảng tra cứu thuật ngữ </span>
                                        
                                         <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->glossary_of_terminology !!}
                                        </div>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="p-l-10">
                                        <span class="title-field-bold">10.Từ khóa </span>
                                        
                                         <div style="padding-left: 20px">
                                             {!! $doc->registerdoc->key_works !!}
                                        </div>
                                    </p>
                                </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-12">
                                    <p >
                                        <span class="title-field-bold">
                                             II. Mức độ khác biệt tài liệu biên soạn so với tài liệu khác: 
                                        </span>
                                        <span>
                                            @if($doc->registerdoc->level_of_difference == 1)
                                            Soạn mới 100%
                                            @elseif($doc->registerdoc->level_of_difference == 2)
                                            Trích dẫn tài liệu tham khảo > 50%
                                            @elseif($doc->registerdoc->level_of_difference == 3)
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
            <!-- ============================================================== -->
            <!-- end recent orders  -->



            <!-- ============================================================== -->
            <!-- end sales traffice country public/source  -->
            <!-- ============================================================== -->
          </div>
           
        </div>
</div>
{{-- </div>
</div> --}} <!-- .container -->
<script type="text/javascript">
    
   $(".multi-tag").select2({
    
    maximumSelectionLength: 3,
    
})
   
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_doc = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Duyệt tài liệu: ' + recipient)
              modal.find('#id_doc').val(id_doc)
          });

		$("form-approval-doc").submit(function(){
                    //aler('success')
         });
	});

	$(document).ready(function(){
		$('#exampleModal1').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_doc = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Hủy tài liệu: ' + recipient)
              modal.find('#id_doc').val(id_doc)
          });

		$("form-cancel-doc").submit(function(){
                    //aler('success')
           });
	});
    

       
        // $('#select-state').on('change', function (event) {
        //         @foreach ($users as $u)
        //          var user_id = $(this).val();
        //             if({{ $u->id }} == user_id)
        //             {
        //                 if('{{ $u->email }}' != ''){
        //                     $('#email_user_approve').append('{{ $u->email }}');
        //                     $('.send_email_user_approve').removeAttr('disabled');
        //                 }else{
        //                     $('#email_user_approve').text('Tài khoản chưa có email');
        //                     $('.send_email_user_approve').attr('disabled','disabled');
        //                 }
        //             }
        //         @endforeach
        //         });
       
    });
    
</script>
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script>


</body>
</html>