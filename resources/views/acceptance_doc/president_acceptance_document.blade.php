<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thẩm định nghiệm thu biên soạn tài liệu giảng dạy - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
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
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script src="lib/js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/general.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>



	<style type="text/css">

        .container{
            padding-top: 60px;
        }
.rate:not(:checked) > input {
    position:absolute;
   /* display: none;*/
    opacity: 0;
    /*top:-9999px;*/
}




		.dashboard-wrapper{
			margin-left: 0px;
		}
		.dashboard-content{
			padding-bottom: 0px;
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
			<a class="navbar-brand"><img class="logo-img" width="50" src="cntt/images/icons/logo.png" alt="logo"></a><span class="h7">Chủ tịch hội đồng thẩm định nghiệm thu biên soạn tài liệu giảng dạy</span> 
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
								<span class="status"></span><span class="ml-2">Đánh giá tài liệu biên soạn</span> 
							</div>
							<a class="dropdown-item" href=""><i class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
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
								<h2 class="pageheader-title">Tài liệu:  {{ $doc->name_doc }} </h2>
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
                        <h3 class="modal-title  " id="exampleModalLabel">Thẩm định nghiệm thu tài liệu:  {{ $doc->name_doc }} </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('sendacceptancedocapproval',['id'=>$doc->id]) }}" method="post" name="">
                        @csrf
                        <input type="hidden" name="id_acceptance_doc" value="{{ $acceptance_doc->id }}">
                        <input type="hidden" name="id_user_acceptance" value="{{ $acceptance_doc->id_user_acceptance }}">
                        <div class="row ">
                            <div class="col-12 ">
                                <div class="form-group">
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
                                                                <td class="font-weight-bold">1</td>
                                                                <td class="font-weight-bold">Đánh giá về nội dung và chất lượng</td>
                                                                <td class="font-weight-bold">80</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.1</td>
                                                                <td>Tính chính xác, tính khoa học và tính cập nhật về nội dung kiến thức
                                                                </td>
                                                                <td>15</td>
                                                                <td><input id="num2" type="number" name="accuracy" class="form-control score" max="15" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.2</td>
                                                                <td  >Sự phù hợp với mục tiêu khung chương trình đào tạo
                                                                </td>
                                                                <td>20</td>
                                                                <td><input id="num3" type="number" name="suitability" class="form-control score" max="20" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.3</td>
                                                                <td>Mức độ đáp ứng chuẩn đầu ra về kiến thức, kỹ năng trong đề cương chi tiết của học phần liên quan

                                                                </td>
                                                                <td>30</td>
                                                                <td><input id="num4" type="number" name="response_level" class="form-control score" max="30" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.4</td>
                                                                <td>Chất lượng bài tập, câu hỏi ôn tập, ví dụ minh họa (nếu có)

                                                                </td>
                                                                <td>15</td>
                                                                <td><input id="num4" type="number" name="exercise_quality" class="form-control score" max="15" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bold">2</td>
                                                                <td class="font-weight-bold">Đánh giá</td>
                                                                <td class="font-weight-bold">20</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.1</td>
                                                                <td>Tính logic và sự phù hợp khi phân chia chương mục

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="logic" class="form-control score" max="5" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.2</td>
                                                                <td>Chất lượng hình ảnh, đồ thị và bảng biểu

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="image_quality" class="form-control score" max="5" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.3</td>
                                                                <td>Chất lượng chế bản và hành văn

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="master_quality" class="form-control score" max="5" min="0" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.4</td>
                                                                <td>Tài liệu tham khảo (Tính cập nhật, số lượng, mức độ uy tín)

                                                                </td>
                                                                <td>5</td>
                                                                <td><input id="num4" type="number" name="references" class="form-control score" max="5" min="0" required></td>
                                                            </tr>
                                                           

                                                            
                                                </tbody>
                                            </table>
                                </div>
                                
                                
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>8. Các ý kiến đóng góp:</label>
                                    <textarea name="opinion" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>9. Kết luận:</label>
                                    <textarea name="conclude" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" {{-- data-dismiss="modal" --}}>Gửi Đánh giá</button>
                        </div>
                    </form>
                </div>


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
                							<th class="text-center" scope="col">Thể loại</th>
                							{{-- <th scope="col">Thể loại</th> --}}
                							<th class="text-center" scope="col" class="text-center">Thời gian đăng ký</th>
                							<th class="text-center" scope="col" class="text-center">Tình trạng</th>
                							<th class="text-center" scope="col" class="text-center">Thẩm định tài liệu</th>
                							
                							<th class="text-center" scope="col" class="text-center">Tổng kết</th>
                							<th class="text-center" scope="col" class="text-center">Kết quả nghiệm thu</th>
                							
                							
                							
                						</tr>
                					</thead>
                					<tbody>
                						<tr>
                                            <td class="text-center">{{ $doc->user->name }}</td>
                                            <td class="text-center">
                                                
                                                {{ typeDoc($doc->type_doc) }}  
                                                 
                                            </td>
                                            <td class="text-center">{{ $doc->created_at }}</td>
                                            <td class="text-center">
                                                {{ statusDoc($doc->status, $doc->close, $doc->notice_late) }}
                                            </td>
                                            <td class="text-center">
                                                @if($acceptance_doc->status == 0)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluate_topic" >Thẩm định</button>
                                                @elseif($acceptance_doc->status == 1)
                                                <a target="_blank" href="{{ route('formthamdinhtailieu',['id'=>$doc->id, 'id_acc'=>$acceptance_doc->id]) }}">
                                                    <button type="button" class="btn btn-success"  >Đã thẩm định</button>
                                                </a>
                                                
                                                @endif

                                            </td>
                                            
                                            <td class="text-center">
                                                @if($flag == 0)
                                            	<a class="btn btn-success" target="_blank" href="{{ route('formtongketthamdinhtailieu',['id'=>$doc->id]) }}">
                                            		
                                            			Form tổng kết nghiệm thu
                                                </a>
                                                @else
                                                <p class="badge-dot badge-danger">Chưa có đủ dữ liệu</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($flag == 0)
                                                
                                                @if( !isset($doc->sumary_acc_id))
                                                <button class="btn btn-primary" data-toggle="modal"
                                                 data-target="#approval" data-id="{{$doc->id}}" data-name="{{$doc->name_doc}}">Gửi kết quả nghiệm thu</button>
                                                @elseif(isset($doc->sumary_acc_id))
                                                <p class="text-success" >Đã gửi kết quả nghiệm thu</p>
                                                @endif
                                                @else
                                                <p class="badge-dot badge-danger">Chưa có đủ dữ liệu</p>

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
            <div class="modal fade" id="approval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-cancel-doc" method="post" action="{{ route('dongynghiemthutaillieu',['id'=>$doc->id]) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_doc" name="id_doc" value="{{ $doc->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Gửi kết quả thẩm định nghiệm thu tài liệu: {{ $doc->name_doc }} </h3>
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
                                        <label for="message-text" class="col-form-label">Gửi kết quả nghiệm thu tài liệu này ?</label>
                                        
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary"> Gửi kết quả</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            	
            	<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-cancel-doc" method="post" action="{{ route('huynghiemthutailieu',['id'=>$doc->id]) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_doc" name="id_doc" value="{{ $doc->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-danger" id="exampleModalLabel">Hủy nghiệm thu tài liệu: {{ $doc->name_doc }} </h3>
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
                                        <label for="message-text" class="col-form-label">Không đồng ý nghiệm thu tài liệu này ?</label>
                                        
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-danger"> Hủy nghiệm thu</button>
                                </div>
                            </div>
                        </form>
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
</div>
</div> <!-- .container -->

<script type="text/javascript">
	$(document).ready(function(){
        // <span class="fa fa-star "></span>
        $('.fa-star').on('click',function(){
            $(this).addClass('checked');

        });

        $('#expense_input').hide();
         
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
  //       var total = 0 ;
  //       //total = $('#num1').val() + $('#num2').val() + $('#num3').val() + $('#num4').val();
		// $('.score').on('change', function(){
          
  //           total += parseInt(this.value);
          
           
  //          alert(total);
  //       } );
	});
</script>
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->


</body>
</html>