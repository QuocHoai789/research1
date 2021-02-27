<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Phản biện thuyết minh đề tài - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
	<link rel="icon" type="image/png" href="cntt/images/icons/favicon.png"/>
	<base href="{{asset('')}}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/libs/css/style.css">
	<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
	<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    {{--  --}}
    <link href="assets/vendor/bootstrap/css/bootstrap-rating.css" rel="stylesheet">
    <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap-rating.js"></script>
	{{--  --}}



	<style type="text/css">

.rate:not(:checked) > input {
    position:absolute;
   /* display: none;*/
    opacity: 0;
    /*top:-9999px;*/
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:20px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}



		.dashboard-wrapper{
			margin-left: 0px;
		}
		.dashboard-content{
			padding-bottom: 0px;
		}
        .checked{
            color: orange;
        }
         @media screen and (max-width: 365px) and (min-width: 359px){
            .rate{
                 padding-right: 197px;
            }
         }
         @media screen and (max-width: 376px) and (min-width: 370px){
            .rate{
                 padding-right: 214px;
            }
         }
         @media screen and (max-width: 415px) and (min-width: 410px){
            .rate{
                 padding-right: 251px;
            }
         }
         @media screen and (max-width: 321px) and (min-width: 316px){
            .rate{
                 padding-right: 158px;
            }
         }
         @media screen and (max-width: 542px) and (min-width: 537px){
            .rate{
                 padding-right: 376px;
            }
         }

         @media screen and (max-width: 281px) {
            .rate{
                 padding-right: 114px;
            }
         }
         @media screen and (max-width: 780px)  and (min-width: 700px){
            header{
                width: 158px;
            }
            .rate{
                padding-right: 0px;
                margin-left: 35px;
                margin-top: -5px;
            }
            
           .edit-cont textarea{
               width: 456px;
                 
            }
         }
    	</style>
</head>
<body>

	<div class="dashboard-header">
		<nav class="navbar navbar-expand-lg bg-white fixed-top">
			<a class="navbar-brand"><img class="logo-img" width="50" src="cntt/images/icons/logo.png" alt="logo"></a><span class="h7">Phản biện thuyết minh đề tài</span> 
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
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
								<span class="status"></span><span class="ml-2">Phản biện thuyết minh đề tài</span> 
							</div>
							<a class="dropdown-item" href="{{route('logoutdiscuss')}}"><i class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
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
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="page-header">
								<h2 class="pageheader-title">Đề tài:{{$topic->name_topic}} </h2>
								<p class="pageheader-text">.</p>
						{{-- <div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a class="breadcrumb-link">Admin</a></li>
								</ol>
							</nav>
						</div> --}}
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end pageheader  -->
			<!-- ============================================================== -->
		</div>
		<div class="row">


			{{-- Modal Approval --}}
                {{-- Modal Đánh giá đề tài --}}
                <div class="modal fade " id="evaluate_topic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header ">
                        <h3 class="modal-title  " id="exampleModalLabel">Đánh giá đề tài: {{ $topic->name_topic }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('discuss',$discuss_topic->id) }}" method="post" name="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="name-title">1.Ý kiến đánh giá theo các nội dung sau</label>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.1 Tổng quan tình hình nghiên cứu thuộc lĩnh vực đề tài</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_1_5" name="overview[rate]" value="5" required @if(json_decode($discuss_topic->overview)!= '') {{ checkedStar(5,json_decode($discuss_topic->overview)->rate) }} @endif/>
                                <label for="star_1_5" title="text">5 stars</label>
                                <input type="radio" id="star_1_4" name="overview[rate]" value="4" required @if(json_decode($discuss_topic->overview)!= '') {{ checkedStar(4,json_decode($discuss_topic->overview)->rate) }} @endif/>
                                <label for="star_1_4" title="text">4 stars</label>
                                <input type="radio" id="star_1_3" name="overview[rate]" value="3" required @if(json_decode($discuss_topic->overview)!= '') {{ checkedStar(3,json_decode($discuss_topic->overview)->rate) }} @endif/>
                                <label for="star_1_3" title="text">3 stars</label>
                                <input type="radio" id="star_1_2" name="overview[rate]" value="2" required  @if(json_decode($discuss_topic->overview)!= '') {{ checkedStar(2,json_decode($discuss_topic->overview)->rate) }} @endif/>
                                <label for="star_1_2" title="text">2 stars</label>
                                <input type="radio" id="star_1_1" name="overview[rate]" value="1" required @if(json_decode($discuss_topic->overview)!= '') {{ checkedStar(1,json_decode($discuss_topic->overview)->rate) }} @endif/>
                                <label for="star_1_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_1" name="overview[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->overview)!= '') {{ json_decode($discuss_topic->overview)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.2 Tính cấp thiết của đề tài</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_2_5" name="urgency[rate]" value="5" required @if(json_decode($discuss_topic->urgency)!= '') {{ checkedStar(5,json_decode($discuss_topic->urgency)->rate) }} @endif/>
                                <label for="star_2_5" title="text">5 stars</label>
                                <input type="radio" id="star_2_4" name="urgency[rate]" value="4" required  @if(json_decode($discuss_topic->urgency)!= '') {{ checkedStar(4,json_decode($discuss_topic->urgency)->rate) }} @endif/>
                                <label for="star_2_4" title="text">4 stars</label>
                                <input type="radio" id="star_2_3" name="urgency[rate]" value="3" required @if(json_decode($discuss_topic->urgency)!= '')  {{ checkedStar(3,json_decode($discuss_topic->urgency)->rate) }} @endif/>
                                <label for="star_2_3" title="text">3 stars</label>
                                <input type="radio" id="star_2_2" name="urgency[rate]" value="2" required  @if(json_decode($discuss_topic->urgency)!= '')  {{ checkedStar(2,json_decode($discuss_topic->urgency)->rate) }} @endif/>
                                <label for="star_2_2" title="text">2 stars</label>
                                <input type="radio" id="star_2_1" name="urgency[rate]" value="1" required  @if(json_decode($discuss_topic->urgency)!= '')  {{ checkedStar(1,json_decode($discuss_topic->urgency)->rate) }} @endif/>
                                <label for="star_2_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_2" name="urgency[content_edit] " class="form-control" required> @if(json_decode($discuss_topic->urgency)!= '') {{ json_decode($discuss_topic->urgency)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.3 Mục tiêu đề tài</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_3_5" name="target[rate]" value="5" required @if(json_decode($discuss_topic->target)!= '')  {{ checkedStar(5,json_decode($discuss_topic->target)->rate) }} @endif/>
                                <label for="star_3_5" title="text">5 stars</label>
                                <input type="radio" id="star_3_4" name="target[rate]" value="4" required @if(json_decode($discuss_topic->target)!= '')   {{ checkedStar(4,json_decode($discuss_topic->target)->rate) }} @endif/>
                                <label for="star_3_4" title="text">4 stars</label>
                                <input type="radio" id="star_3_3" name="target[rate]" value="3" required @if(json_decode($discuss_topic->target)!= '')   {{ checkedStar(3,json_decode($discuss_topic->target)->rate) }} @endif/>
                                <label for="star_3_3" title="text">3 stars</label>
                                <input type="radio" id="star_3_2" name="target[rate]" value="2" required @if(json_decode($discuss_topic->target)!= '')   {{ checkedStar(2,json_decode($discuss_topic->target)->rate) }} @endif/>
                                <label for="star_3_2" title="text">2 stars</label>
                                <input type="radio" id="star_3_1" name="target[rate]" value="1" required @if(json_decode($discuss_topic->target)!= '')   {{ checkedStar(1,json_decode($discuss_topic->target)->rate) }} @endif/>
                                <label for="star_3_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_3" name="target[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->target)!= '')  {{ json_decode($discuss_topic->target)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.4 Cách tiếp cận và phương pháp nghiên cứu</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_4_5" name="approach[rate]" value="5" required @if(json_decode($discuss_topic->approach)!= '')   {{ checkedStar(5,json_decode($discuss_topic->approach)->rate) }} @endif/>
                                <label for="star_4_5" title="text">5 stars</label>
                                <input type="radio" id="star_4_4" name="approach[rate]" value="4" required @if(json_decode($discuss_topic->approach)!= '')   {{ checkedStar(4,json_decode($discuss_topic->approach)->rate) }} @endif/>
                                <label for="star_4_4" title="text">4 stars</label>
                                <input type="radio" id="star_4_3" name="approach[rate]" value="3" required @if(json_decode($discuss_topic->approach)!= '')   {{ checkedStar(3,json_decode($discuss_topic->approach)->rate) }} @endif/>
                                <label for="star_4_3" title="text">3 stars</label>
                                <input type="radio" id="star_4_2" name="approach[rate]" value="2" required @if(json_decode($discuss_topic->approach)!= '')   {{ checkedStar(2,json_decode($discuss_topic->approach)->rate) }} @endif/>
                                <label for="star_4_2" title="text">2 stars</label>
                                <input type="radio" id="star_4_1" name="approach[rate]" value="1" required @if(json_decode($discuss_topic->approach)!= '')   {{ checkedStar(1,json_decode($discuss_topic->approach)->rate) }} @endif/>
                                <label for="star_4_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_4" name="approach[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->approach)!= '')  {{ json_decode($discuss_topic->approach)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.5 Nội dung và tiến độ thực hiện</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_5_5" name="content_and_process[rate]" value="5" required @if(json_decode($discuss_topic->content_and_process)!= '')   {{ checkedStar(5,json_decode($discuss_topic->content_and_process)->rate) }} @endif/>
                                <label for="star_5_5" title="text">5 stars</label>
                                <input type="radio" id="star_5_4" name="content_and_process[rate]" value="4" required @if(json_decode($discuss_topic->content_and_process)!= '')   {{ checkedStar(4,json_decode($discuss_topic->content_and_process)->rate) }} @endif/>
                                <label for="star_5_4" title="text">4 stars</label>
                                <input type="radio" id="star_5_3" name="content_and_process[rate]" value="3" required @if(json_decode($discuss_topic->content_and_process)!= '')   {{ checkedStar(3,json_decode($discuss_topic->content_and_process)->rate) }} @endif/>
                                <label for="star_5_3" title="text">3 stars</label>
                                <input type="radio" id="star_5_2" name="content_and_process[rate]" value="2" required @if(json_decode($discuss_topic->content_and_process)!= '')   {{ checkedStar(2,json_decode($discuss_topic->content_and_process)->rate) }} @endif/>
                                <label for="star_5_2" title="text">2 stars</label>
                                <input type="radio" id="star_5_1" name="content_and_process[rate]" value="1" required @if(json_decode($discuss_topic->content_and_process)!= '')   {{ checkedStar(1,json_decode($discuss_topic->content_and_process)->rate) }} @endif/>
                                <label for="star_5_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_5" name="content_and_process[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->content_and_process)!= '')  {{ json_decode($discuss_topic->content_and_process)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.6 Sản phẩm của đề tài</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_6_5" name="product_of_topic[rate]" value="5" required @if(json_decode($discuss_topic->product_of_topic)!= '')   {{ checkedStar(5,json_decode($discuss_topic->product_of_topic)->rate) }} @endif/>
                                <label for="star_6_5" title="text">5 stars</label>
                                <input type="radio" id="star_6_4" name="product_of_topic[rate]" value="4" required @if(json_decode($discuss_topic->product_of_topic)!= '')   {{ checkedStar(4,json_decode($discuss_topic->product_of_topic)->rate) }} @endif/>
                                <label for="star_6_4" title="text">4 stars</label>
                                <input type="radio" id="star_6_3" name="product_of_topic[rate]" value="3" required @if(json_decode($discuss_topic->product_of_topic)!= '')   {{ checkedStar(3,json_decode($discuss_topic->product_of_topic)->rate) }} @endif/>
                                <label for="star_6_3" title="text">3 stars</label>
                                <input type="radio" id="star_6_2" name="product_of_topic[rate]" value="2" required @if(json_decode($discuss_topic->product_of_topic)!= '')   {{ checkedStar(2,json_decode($discuss_topic->product_of_topic)->rate) }} @endif/>
                                <label for="star_6_2" title="text">2 stars</label>
                                <input type="radio" id="star_6_1" name="product_of_topic[rate]" value="1" required @if(json_decode($discuss_topic->product_of_topic)!= '')   {{ checkedStar(1,json_decode($discuss_topic->product_of_topic)->rate) }} @endif/>
                                <label for="star_6_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_6" name="product_of_topic[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->product_of_topic)!= '')  {{ json_decode($discuss_topic->product_of_topic)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.7 Sản phẩm vượt trội</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group" style="padding-left: 10px">
                                    <label class="ml-3 font-17">1.7.1 Sản phẩm khoa học (Sách chuyên khảo, bài báo, sách, giáo trình)</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_7_1_5" name="product_outstanding_of_topic[rate1]" value="5" required  @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(5,json_decode($discuss_topic->product_outstanding_of_topic)->rate1) }} @endif/>
                                <label for="star_7_1_5" title="text">5 stars</label>
                                <input type="radio" id="star_7_1_4" name="product_outstanding_of_topic[rate1]" value="4" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(4,json_decode($discuss_topic->product_outstanding_of_topic)->rate1) }} @endif/>
                                <label for="star_7_1_4" title="text">4 stars</label>
                                <input type="radio" id="star_7_1_3" name="product_outstanding_of_topic[rate1]" value="3" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(3,json_decode($discuss_topic->product_outstanding_of_topic)->rate1) }} @endif/>
                                <label for="star_7_1_3" title="text">3 stars</label>
                                <input type="radio" id="star_7_1_2" name="product_outstanding_of_topic[rate1]" value="2" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(2,json_decode($discuss_topic->product_outstanding_of_topic)->rate1) }} @endif/>
                                <label for="star_7_1_2" title="text">2 stars</label>
                                <input type="radio" id="star_7_1_1" name="product_outstanding_of_topic[rate1]" value="1" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(1,json_decode($discuss_topic->product_outstanding_of_topic)->rate1) }} @endif/>
                                <label for="star_7_1_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_7_1" name="product_outstanding_of_topic[content_edit1]" class="form-control" required>@if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ json_decode($discuss_topic->product_outstanding_of_topic)->content_edit1 }} @endif</textarea>
                                </div>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group" style="padding-left: 10px">
                                    <label class="ml-3 font-17">1.7.2 Sản phẩm đào tạo (hướng dẫn sinh viên, học viên cao học, nghiên cứu sinh)</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_7_2_5" name="product_outstanding_of_topic[rate2]" value="5" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(5,json_decode($discuss_topic->product_outstanding_of_topic)->rate2) }} @endif/>
                                <label for="star_7_2_5" title="text">5 stars</label>
                                <input type="radio" id="star_7_2_4" name="product_outstanding_of_topic[rate2]" value="4" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(4,json_decode($discuss_topic->product_outstanding_of_topic)->rate2) }} @endif/>
                                <label for="star_7_2_4" title="text">4 stars</label>
                                <input type="radio" id="star_7_2_3" name="product_outstanding_of_topic[rate2]" value="3" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(3,json_decode($discuss_topic->product_outstanding_of_topic)->rate2) }} @endif/>
                                <label for="star_7_2_3" title="text">3 stars</label>
                                <input type="radio" id="star_7_2_2" name="product_outstanding_of_topic[rate2]" value="2" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(2,json_decode($discuss_topic->product_outstanding_of_topic)->rate2) }} @endif/>
                                <label for="star_7_2_2" title="text">2 stars</label>
                                <input type="radio" id="star_7_2_1" name="product_outstanding_of_topic[rate2]" value="1" required @if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ checkedStar(1,json_decode($discuss_topic->product_outstanding_of_topic)->rate2) }} @endif/>
                                <label for="star_7_2_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_7_2" name="product_outstanding_of_topic[content_edit2]" class="form-control" required>@if(json_decode($discuss_topic->product_outstanding_of_topic)!= '')  {{ json_decode($discuss_topic->product_outstanding_of_topic)->content_edit2 }} @endif</textarea>
                                </div>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.8 Hiệu quả, phương thức chuyển giao kết quả nghiên cứu và khả năng ứng dụng</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_8_5" name="effective[rate]" value="5" required @if(json_decode($discuss_topic->effective)!= '')   {{ checkedStar(5,json_decode($discuss_topic->effective)->rate) }} @endif/>
                                <label for="star_8_5" title="text">5 stars</label>
                                <input type="radio" id="star_8_4" name="effective[rate]" value="4" required @if(json_decode($discuss_topic->effective)!= '')   {{ checkedStar(4,json_decode($discuss_topic->effective)->rate) }} @endif/>
                                <label for="star_8_4" title="text">4 stars</label>
                                <input type="radio" id="star_8_3" name="effective[rate]" value="3" required @if(json_decode($discuss_topic->effective)!= '')   {{ checkedStar(3,json_decode($discuss_topic->effective)->rate) }} @endif/>
                                <label for="star_8_3" title="text">3 stars</label>
                                <input type="radio" id="star_8_2" name="effective[rate]" value="2" required @if(json_decode($discuss_topic->effective)!= '')   {{ checkedStar(2,json_decode($discuss_topic->effective)->rate) }} @endif/>
                                <label for="star_8_2" title="text">2 stars</label>
                                <input type="radio" id="star_8_1" name="effective[rate]" value="1" required @if(json_decode($discuss_topic->effective)!= '')   {{ checkedStar(1,json_decode($discuss_topic->effective)->rate) }} @endif/>
                                <label for="star_8_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_8" name="effective[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->effective)!= '')  {{ json_decode($discuss_topic->effective)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.9 Kinh nghiệm nghiên cứu, những thành tích nổi bật và năng lực quản lý của chủ nhiệm đề tài và những người tham gia thực hiện</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_9_5" name="study_experience [rate]" value="5"required  @if(json_decode($discuss_topic->study_experience)!= '')   {{ checkedStar(5,json_decode($discuss_topic->study_experience)->rate) }} @endif/>
                                <label for="star_9_5" title="text">5 stars</label>
                                <input type="radio" id="star_9_4" name="study_experience [rate]" value="4"required  @if(json_decode($discuss_topic->study_experience)!= '')   {{ checkedStar(4,json_decode($discuss_topic->study_experience)->rate) }} @endif/>
                                <label for="star_9_4" title="text">4 stars</label>
                                <input type="radio" id="star_9_3" name="study_experience [rate]" value="3" required @if(json_decode($discuss_topic->study_experience)!= '')   {{ checkedStar(3,json_decode($discuss_topic->study_experience)->rate) }} @endif/>
                                <label for="star_9_3" title="text">3 stars</label>
                                <input type="radio" id="star_9_2" name="study_experience [rate]" value="2" required @if(json_decode($discuss_topic->study_experience)!= '')   {{ checkedStar(2,json_decode($discuss_topic->study_experience)->rate) }} @endif/>
                                <label for="star_9_2" title="text">2 stars</label>
                                <input type="radio" id="star_9_1" name="study_experience [rate]" value="1" required @if(json_decode($discuss_topic->study_experience)!= '')   {{ checkedStar(1,json_decode($discuss_topic->study_experience)->rate) }} @endif/>
                                <label for="star_9_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_9" name="study_experience [content_edit]" class="form-control" required>@if(json_decode($discuss_topic->study_experience)!= '')  {{ json_decode($discuss_topic->study_experience)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="ml-3 font-17">1.10 Tính hợp lý của dự toán kinh phí đề nghị</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <div class="form-group">
                                    <header class="blockquote-header " style="padding-left: 35px">Mức độ đạt yêu cầu:</header>
                                    
                                </div>
                            </div>
                           
                            <div class="col-sm-2 col-md-3 col-lg-2 rate">
                                <input type="radio" id="star_10_5" name="rationality[rate]" value="5" required @if(json_decode($discuss_topic->rationality)!= '')   {{ checkedStar(5,json_decode($discuss_topic->rationality)->rate) }} @endif/>
                                <label for="star_10_5" title="text">5 stars</label>
                                <input type="radio" id="star_10_4" name="rationality[rate]" value="4" required @if(json_decode($discuss_topic->rationality)!= '')   {{ checkedStar(4,json_decode($discuss_topic->rationality)->rate) }} @endif/>
                                <label for="star_10_4" title="text">4 stars</label>
                                <input type="radio" id="star_10_3" name="rationality[rate]" value="3" required @if(json_decode($discuss_topic->rationality)!= '')   {{ checkedStar(3,json_decode($discuss_topic->rationality)->rate) }} @endif/>
                                <label for="star_10_3" title="text">3 stars</label>
                                <input type="radio" id="star_10_2" name="rationality[rate]" value="2" required @if(json_decode($discuss_topic->rationality)!= '')   {{ checkedStar(2,json_decode($discuss_topic->rationality)->rate) }} @endif/>
                                <label for="star_10_2" title="text">2 stars</label>
                                <input type="radio" id="star_10_1" name="rationality[rate]" value="1" required @if(json_decode($discuss_topic->rationality)!= '')   {{ checkedStar(1,json_decode($discuss_topic->rationality)->rate) }} @endif/>
                                <label for="star_10_1" title="text">1 star</label>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-sm-7 col-md-6 col-lg-6 ">
                                <div class="form-group edit-cont">
                                    <header class="blockquote-header  " style="padding-left: 35px">Nội dung chỉnh sửa</header>
                                    <textarea id="content_edit_10" name="rationality[content_edit]" class="form-control" required>@if(json_decode($discuss_topic->rationality)!= '')  {{ json_decode($discuss_topic->rationality)->content_edit }} @endif</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    {{-- <label class="name-title">3.1 Khả năng thực hiện</label> --}}
                                    <p>Lưu ý:  Khả năng thực hiện đề tài:<br/>  
                                        Có thể thực hiện:Từ 35 sao trở lên;<br/>
                                         Có thể thực hiện nhưng phải chỉnh sửa theo góp ý: từ 25 sao đến dưới 35 sao;<br/>
                                          Không thể thực hiện: dưới 25 sao </p>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="name-title">2.Ý kiến khác</label>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                <textarea id="oder_ideal" name="another_opinion" class="form-control" required>@if($discuss_topic->another_opinion!= '')  {{ $discuss_topic->another_opinion }} @endif</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="name-title">3.Kết luận</label>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                <textarea id="conclude" name="conclude" class="form-control" required>@if($discuss_topic->conclude!= '')  {{ $discuss_topic->conclude }} @endif</textarea>
                            </div>
                        </div>
                       
                     
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="name-title">3.2 Kinh phí thực hiện</label>
                                </div>    
                            </div>
                        </div>
                        <div class="row expen">
                            <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="form-check" style=" padding-left: 25px;">
                                  <input class="form-check-input" type="radio" name="expense" id="expense1" value="1" required checked @if($discuss_topic->expense == 1)  checked @endif>
                                  <label class="form-check-label" for="expense1">
                                    Giữ nguyên mức kinh phí đề nghị
                                </label>
                            </div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8 form-group">
                                <div class="form-check" style=" padding-left: 25px;">
                                  <input class="form-check-input" type="radio" name="expense" id="expense2" value="2" required @if($discuss_topic->expense == 2)  checked @endif>
                                  <label class="form-check-label" for="expense2">
                                    Thay đổi mức kinh phí đề nghị (nêu rõ mức kinh phí mới đề nghị)
                                </label>
                            </div>
                            </div>

                            <div class="col-sm-4 col-md-4 col-lg-4 form-group" id="expense_input">
                               <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="value_expense">
                                <option value="0">--Chọn mức kinh phí--</option>
                                 @for($i = 1; $i <= 6; $i++)
                                 <option value="{{ $i*5*1000000 }}" @if (old('value_expense')==$i*5*1000000)
                                 {{ 'selected' }}
                                 @endif required>{{ number_format($i*5*1000000) }} đồng
                             </option>
                                @endfor
                                </select>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" {{-- data-dismiss="modal" --}}>Gửi đánh giá</button>
                            </div>
                        </form>
                        </div>
                        
            
        </div>
    </div>
</div>
                {{-- end Modal --}}


                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                	<div class="card">
                		<div class="card-header">
                			{{-- <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ xét duyệt ({{number_format(count($topic))}})</b></h4> --}}
                		</div>
                		<div class="card-body">
                			<div class="table-responsive">
                				<table id="example" class="table table-striped table-bordered second w-100" >
                					<thead>
                						<tr>
                							<th class="text-center" scope="col">Người đăng ký</th>
                							<th class="text-center" scope="col">Cấp đề tài</th>
                							{{-- <th scope="col">Thể loại</th> --}}
                							<th class="text-center" scope="col" class="text-center">Thời gian đăng ký</th>
                							<th class="text-center" scope="col" class="text-center">Tình trạng</th>
                							<th class="text-center" scope="col" class="text-center">Đánh giá đề tài</th>
                							
                						</tr>
                					</thead>
                					<tbody>
                						<tr>
                                            <td class="text-center">{{ $topic->user->name }}</td>
                                            <td class="text-center">{{ typeTopic($topic->type_topic) }}</td>
                                            <td class="text-center">{{$topic->created_at}}</td>
                                            <td class="text-center">
                                                @if($discuss_topic->status == 0)
                                                <span class="badge-dot badge-warning"> Chưa đánh giá </span>
                                                 @elseif($discuss_topic->status == 1)
                                                 <span class="badge-dot badge-success"> Đã đánh giá </span>
                                                 @endif
                                            </td>
                                            <td class="text-center">
                                                @if($discuss_topic->status == 0)
                                                <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#evaluate_topic" >Đánh giá</button>
                                                @elseif($discuss_topic->status == 1)
                                                <a target="_blank" href="{{ route('formdanhgiadetai',['id'=>$discuss_topic->id] ) }}">
                                                <button type="button" class="btn-sm btn-success"> Form đánh giá</button>
                                                </a>
                                                @endif
                                            </td>
                							
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



            <!-- ============================================================== -->
            <!-- end recent orders  -->



            <!-- ============================================================== -->
            <!-- end sales traffice country public/source  -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>
</div>
</div> <!-- .container -->

<script type="text/javascript">
	$(document).ready(function(){
        // <span class="fa fa-star "></span>
        $('.fa-star').on('click',function(){
            $(this).addClass('checked');

        });

        $('#expense_input').hide();
         @if($discuss_topic->expense == 2)
            $('#expense_input').show();
        @endif
        $('#expense2').on('click',function(){
            $('#expense_input').show();
        });
        $('#expense1').on('click',function(){
            $('#expense_input').hide();
        });
		$('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_topic = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Chấp nhận đề tài: ' + recipient)
              modal.find('#id_topic').val(id_topic)
          });

		$("form-approval-topic").submit(function(){
                    //aler('success')
         });
	});

	$(document).ready(function(){
		$('#exampleModal1').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_topic = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Không chấp nhận đề tài: ' + recipient)
              modal.find('#id_topic').val(id_topic)
          });

		$("form-cancel-topic").submit(function(){
                    //aler('success')
           });
	});
</script>
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->


</body>
</html>