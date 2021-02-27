@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
	<div class="dashboard-ecommerce">
		<div class="container-fluid dashboard-content ">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header">
						<h2 class="pageheader-title">ADMIN </h2>
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
      @if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @elseif(Session::has('error_message'))
                    <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
                    @endif
			<!-- ============================================================== -->
			<!-- end pageheader  -->
			<!-- ============================================================== -->
			<div class="ecommerce-widget">
				<div class="row">
					<!-- ============================================================== -->
					<!-- sales  -->
					<!-- ============================================================== -->
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<div class="card border-3 border-top border-top-primary">
							<div class="card-body">
								<h4 class="text-info">Tổng đề tài</h4>
								<div class="metric-value d-inline-block">
									<h1 class="mb-1 text-info">{{number_format($count_topic)}}</h1>
								</div>
								<div class="metric-label d-inline-block float-right text-info font-weight-bold">
								{{-- </span><span class="ml-1">{{10000}}</span> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- end sales  -->
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="card border-3 border-top border-top-primary">
						<div class="card-body">
							<h4 class="text-success">Đề tài đã hoàn thành</h4>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1 text-success">{{number_format($count_topic_finish)}}</h1>
							</div>

							<div class="metric-label d-inline-block float-right text-success font-weight-bold">
								{{-- <span class=" text-warning "><span class="ml-1">{{number_format(10000)}}</span> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="card border-3 border-top border-top-primary">
						<div class="card-body">
							<h4 class="text-info">Tổng tài liệu biên soạn</h4>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1 text-info">{{number_format($count_doc)}}</h1>
							</div>
                                   {{--  <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                                      </div> --}}
                                    </div>
                                  </div>
                                </div>
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                 <div class="card border-3 border-top border-top-primary">
                                  <div class="card-body">
                                   <h4 class="text-success">Tài liệu biên soạn đã hoàn thành</h4>
                                   <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-success">{{number_format($count_doc_finish)}}</h1>
                                  </div>
                                  {{--   <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                                      </div> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>


                              {{-- Modal Approval --}}
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <form id="form-send-message" method="post" action="{{ route('guixetduyet') }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" id="id_topic" name="id_topic">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                       <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Chủ nhiệm xét duyệt:</label>
                                        <select id="select-state" name="id_user" placeholder="Chọn người xét duyệt..." required>
                                          <option value="">Chọn người xét duyệt...</option>
                                           @foreach ($user as $u)
                                           @if($u->id != Auth::user()->id)
                                          <option value="{{$u->id}}">{{$u->name}} - {{$u->msgv}}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" id="email_user_approve" class="col-form-label">Email:</label>
                                      </div>
                                      <div class="form-group">
                                        <label for="message-text" class="col-form-label">Nội dung:</label>
                                        <textarea class="form-control" name="message" id="message-text"></textarea>
                                      </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                      <button type="submit" class="btn btn-primary send_email_user_approve">Gửi</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>


                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <form id="form-send-message" method="post" action="{{ route('guixetduyetdecuong') }}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" id="id_doc" name="id_doc">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                       <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Chủ nhiệm xét duyệt:</label>
                                        <select id="select-state1" name="id_user" placeholder="Chọn người xét duyệt..." required>
                                          <option value="">Chọn người xét duyệt...</option>
                                           @foreach ($user as $u)
                                           @if($u->id != Auth::user()->id) 
                                          <option value="{{$u->id}}">{{$u->name}} - {{$u->msgv}}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" id="email_user_approve1" class="col-form-label">Email:</label>
                                      </div>
                                      <div class="form-group">
                                        <label for="message-text" class="col-form-label">Nội dung:</label>
                                        <textarea class="form-control" name="message" id="message-text"></textarea>
                                      </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                      <button type="submit" class="btn btn-primary send_email_user_approve1">Gửi</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            {{-- end Modal --}}

                            <div class="row">
                              <!-- ============================================================== -->
                              <!-- data table  -->
                              <!-- ============================================================== -->
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                  <div class="card-header">
                                    <h4 class="mb-0"><b>Danh sách đăng ký đề tài đang chờ xét duyệt ({{number_format(count($topic_m))}})</b></h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table id="example" class=" tabledata table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Tên đề tài</th>
                                          <th scope="col">Người đăng ký</th>
                                          <th scope="col">Mã số</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Cấp đề tài</th>
                                          <th scope="col" class="text-center">Thời gian đăng ký</th>
                                          <th scope="col" class="text-center">Tình trạng</th>
                                          {{-- <th scope="col" class="text-center">Link xét duyệt</th> --}}
                                          <th scope="col" class="text-center">Gửi xét duyệt</th>
                                          <th scope="col" class="text-center">Chi tiết</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       @foreach ($topic_m as $value)
                                       <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$value->name_topic}}</td>
                                        <td>{{$value->user->name}}</td>
                                        <td>{{$value->user->msgv}}</td>
                                        <td>{{$value->user->email}}</td>
                                        <td>
                                          @php
                                            typeTopic($value->type_topic);
                                          @endphp
                                        </td>
                                        <td class="text-center">{{$value->created_at}}</td>
                                        <td class="text-center">
                                         @if($value->status==1 && $value->getRegisterTopic->id_user_approval == 0)
                                         <span class="badge-dot badge-warning rounded-pill">Chờ xét duyệt</span>
                                         @else
                                         <span class="badge-dot badge-primary rounded-pill">Đã gửi xét duyệt</span>
                                         @endif
                                       </td>
                                       {{-- <td class="text-center">
                                        @if($value->status==1 && $value->getRegisterTopic->id_user_approval == 0)

                                        @else
                                           <a href="{{ url('xet-duyet',$value->id) }}" target="_blank">{-link-}</a>
                                        @endif
                                        </td> --}}
                                         <td class="text-center">

                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}" data-name="{{$value->name_topic}}">Gửi xét duyệt</button>

                                        </td>


                                       <td class="text-center"><a href="{{ route('chitietdetai',$value->id) }}"><i class="fas fa-info-circle"></i></a></td>
                                    </tr>
                                     @endforeach
                                   </tbody>
                                 </table>
                               </div>
                             </div>
                           </div>
                         </div>


                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                  <div class="card-header">
                                    <h4 class="mb-0"><b>Danh sách đăng ký biên soạn tài liệu giảng dạy đang chờ xét duyệt ({{number_format(count($documents))}})</b></h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table id="example" class="tabledata table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Tên tài liệu</th>
                                          <th scope="col">Người đăng ký</th>
                                          <th scope="col">Mã số</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Đối tượng sử dụng</th>
                                          <th scope="col" class="text-center">Thời gian đăng ký</th>
                                          <th scope="col" class="text-center">Tình trạng</th>
                                          {{-- <th scope="col" class="text-center">Link xét duyệt</th> --}}
                                          <th scope="col" class="text-center">Gửi xét duyệt</th>
                                          <th scope="col" class="text-center">Chi tiết</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       @foreach ($documents as $doc)
                                       <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$doc->name_doc}}</td>
                                        <td>{{$doc->user->name}}</td>
                                        <td>{{$doc->user->msgv}}</td>
                                        <td>{{$doc->user->email}}</td>
                                        <td>
                                          @if($doc->type_doc == 1)
                                            Đại học
                                          @elseif($doc->type_doc == 2)
                                          Sau đại học
                                          @endif
                                        </td>
                                        <td class="text-center">{{$doc->created_at}}</td>
                                        <td class="text-center">
                                         @if($doc->status==1 && $doc->registerdoc->id_user_approval == 0)
                                         <span class="badge-dot badge-warning rounded-pill">Chờ xét duyệt</span>
                                         @else
                                         <span class="badge-dot badge-primary rounded-pill">Đã gửi xét duyệt</span>
                                         @endif
                                       </td>
                                       {{-- <td class="text-center">
                                        @if($value->status==1 && $value->getRegisterTopic->id_user_approval == 0)

                                        @else
                                           <a href="{{ url('xet-duyet',$value->id) }}" target="_blank">{-link-}</a>
                                        @endif
                                        </td> --}}
                                         <td class="text-center">

                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-id="{{ $doc->id }}" data-name="{{ $doc->name_doc }}">Gửi xét duyệt</button>

                                        </td>


                                       <td class="text-center"><a href="{{ route('chitiettailieu',$doc->id) }}"><i class="fas fa-info-circle"></i></a></td>
                                    </tr>
                                     @endforeach
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

                     </div>
                   </div>
                 </div>
               </div>
               <script type="text/javascript">
                 $(document).ready(function(){

                  $('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_topic = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Gửi xét duyệt đề tài: ' + recipient)
              modal.find('#id_topic').val(id_topic);

              $('#select-state').on('change', function (event) {
                @foreach ($user as $u)
                 var user_id = $(this).val();
                    if({{ $u->id }} == user_id)
                    {
                        if('{{ $u->email }}' != ''){
                            $('#email_user_approve').text('Email: '+'{{ $u->email }}');
                            $('.send_email_user_approve').removeAttr('disabled');
                        }else{
                            $('#email_user_approve').text('Tài khoản chưa có email');
                            $('.send_email_user_approve').attr('disabled','disabled');
                        }
                    }
                @endforeach
                });
            });

                  $("form-send-message").submit(function(){
                    //aler('success')
                  });

                  $('#exampleModal1').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_doc = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Gửi xét duyệt tài liệu: ' + recipient)
              modal.find('#id_doc').val(id_doc);

              $('#select-state1').on('change', function (event) {
                @foreach ($user as $u)
                 var user_id = $(this).val();
                    if({{ $u->id }} == user_id)
                    {
                        if('{{ $u->email }}' != ''){
                            $('#email_user_approve1').text('Email: '+'{{ $u->email }}');
                            $('.send_email_user_approve1').removeAttr('disabled');
                        }else{
                            $('#email_user_approve1').text('Tài khoản chưa có email');
                            $('.send_email_user_approve1').attr('disabled','disabled');
                        }
                    }
                @endforeach
                });
            });
                });

                 $(document).ready(function () {
                  $('select').selectize({
                    sortField: 'text'
                  });
                });
              </script>
              @endsection
