<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Xét duyệt đề tài nghiên cứu khoa học</title>
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
            /* .logo-img{
                display: none;
            } */
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
								<h6 class="mb-0 nav-user-name p-2">{{Auth::user()->name}}</h6>
								@endif
								{{-- <span class="status"></span><span class="ml-2">Xét duyệt đề tài</span> --}}
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
								<h2 class="pageheader-title">Xét duyệt đề tài</h2>
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
					<form id="form-approval-topic" method="post" action="{{ route('duyetdetai') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" id="id_topic" name="id_topic">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel"> </h3>
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
					<form id="form-cancel-topic" method="post" action="{{ route('huydetai') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" id="id_topic" name="id_topic">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title font-weight-bold text-danger" id="exampleModalLabel"> </h3>
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
                			{{-- <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ xét duyệt ({{number_format(count($topic))}})</b></h4> --}}
                		</div>
                		<div class="card-body">
                			<div class="table-responsive">
                				<table id="example" class="table table-striped table-bordered second w-100" >
                					<thead>
                						<tr>
                                            <th scope="col">ID</th>
                							<th scope="col">Tên đề tài</th>
                							<th scope="col">Người đăng ký</th>
                							{{-- <th scope="col">Cấp đề tài</th> --}}
                							{{-- <th scope="col">Thể loại</th> --}}
                							<th scope="col" class="text-center">Thời gian đăng ký</th>
                							{{-- <th scope="col" class="text-center">Form đăng ký</th> --}}
                                            <th scope="col" class="text-center">Form đăng ký</th>
                                            <th scope="col" class="text-center">Tình trạng</th>
                                            {{-- @foreach($topic_register as $topic)
                                            @if($topic->status != 2 && $topic->close != 1) --}}
                							<th scope="col" class="text-center">Duyệt</th>
                							<th scope="col" class="text-center">Không duyệt</th>
                                            {{-- @endif
                                            @endforeach --}}
                						</tr>
                					</thead>
                					<tbody>
                                        @foreach($topic_register as $topic)
                						<tr>
                                            <td>{{$topic->id}}</td>
                							<td>{{$topic->name_topic}}</td>
                							<td>{{$topic->user->name}}</td>
                							{{-- @if($topic->type_topic==1)
                							<td>Cấp bộ</td>
                							@endif
                							@if($topic->type_topic==2)
                							<td>Cấp trường</td>
                							@endif
                							@if($topic->type_topic==3)
                							<td>Sinh viên</td>
                							@endif --}}


                							<td class="text-center">{{$topic->created_at}}</td>
                							 <td class="text-center"><a target="_blank" href="{{route('formdkchitietdetaipublic',$topic->id)}}"><i class="fas fa-info-circle"></a></i></td>
                							<td class="text-center">
                								@if($topic->close==1)
                								<span class="badge-dot badge-danger">Đề tài đã bị hủy</span>
                								@else
                								@if($topic->status==1)
                								<span class="badge-dot badge-warning rounded-pill">Chờ xét duyệt</span>
                								@endif
                								@if($topic->status!=0&&$topic->status!=1)
                								<span class="badge-dot badge-success rounded-pill">Đề tài đã được xét duyệt</span>
                								@endif
                                                @endif
                                            </td>

                							<td class="text-center">
                                                @if($topic->status != 2 && $topic->close != 1)
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$topic->id}}" data-name="{{$topic->name_topic}}">Duyệt</button>
                                                @endif
                							</td>
                							<td class="text-center">
                                                @if($topic->status != 2 && $topic->close != 1)
                								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-id="{{$topic->id}}" data-name="{{$topic->name_topic}}">Không duyệt</button>
                                                @endif
                                            </td>

                							{{-- <td  class="text-center"><a href="{{ route('duyetdetai',$topic->id) }}"><span class="badge-dot badge-success rounded-pill">Duyệt</span></a></td>
                							<td class="text-center"><a href="{{ route('huydetai',$topic->id) }}"><span class="badge-dot badge-danger rounded-pill">Hủy</span></a></td> --}}
                                        </tr>
                                        @endforeach
                					</tbody>
                				</table>

                			</div>

                		</div>

                	</div>
                    {{-- /////////////// --}}




            {{-- ///////////////// --}}
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>
           {{-- @include('common.form_register_topic',['topic'=>$topic,'researchType'=>$researchType]) --}}
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
	$(document).ready(function(){
		$('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_topic = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Duyệt đề tài: ' + recipient)
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
              modal.find('.modal-title').text('Hủy đề tài: ' + recipient)
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
{{-- <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script> --}}
<!-- chart chartist js -->
{{-- <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script> --}}
<!-- chart c3 js -->
{{-- <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script> --}}


</body>
</html>
