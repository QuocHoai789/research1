@extends('master_admin')
@section('content_admin')
<div class="m-t-20"></div>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        @if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @elseif(Session::has('error_message'))
                    <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">CHI TIẾT ĐỀ TÀI</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đề Tài</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>



     <div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('discusstopic') }}">
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
                                    <label for="recipient-name" class="col-form-label">Người biện luận:</label>
                                    <select id="select-state" name="id_user" placeholder="Người biện luận..." required>
                                        <option value="">Người biện luận...</option>
                                        @foreach ($user as $u)
                                        <option value="{{$u->id}}">{{$u->name}} - {{$u->msgv}} - {{$u->email}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Tin nhắn:</label>
                                    <textarea class="form-control" name="message" id="message-text"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>





        <div class="row">
            <!-- ============================================================== -->

            {{-- Modal Approval --}}
            <form method="post" action="{{ route('chothuchien',['id'=>$topic->id]) }}">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">

                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                           <p class="text-center"> Cho phép thực hiện đề tài này ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary alow"
                                            >Đồng ý</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            </form>
                            <form method="post" action="{{ route('chophepbaocao',['id'=>$topic->id]) }}">
            <div class="modal fade" id="alert_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">

                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                           <p class="text-center"> Cho phép báo cáo đề tài này ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary alow"
                                            >Đồng ý</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            </form>

                            <form method="post" action="{{ route('thongbaotrehan',['id'=>$topic->id]) }}">
                                <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                     <p class="text-center"> Thông báo trễ hạn đề tài ?</p>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary alow"
                                    >Đồng ý</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('xacnhanthanhlydetai',['id'=>$topic->id]) }}"> 
                    <div class="modal fade" id="accliquidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                         <p class="text-center"> Xác nhận thanh lý đề tài này ?</p>
                         <div class="form-group">
                             <label>Tin nhắn:</label>
                             <textarea class="form-control" name="message"></textarea>
                         </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary alow"
                        >Đồng ý</button>
                    </div>

                </div>

            </div>
        </div>
    </form>
                      <form method="post" action="{{ route('chonghiemthu',['id'=>$topic->id]) }}"> 
                      
                                <div class="modal fade" id="acceptance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                     <p class="text-center"> Đồng ý nghiệm thu đề tài này ?</p>
                                     <div>
                                       <label>Tin nhắn</label>
                                       <textarea class="form-control" name="message"></textarea>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary alow"
                                    >Đồng ý</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>

                
                <form method="post" action="{{ route('chothanhly',['id'=>$topic->id]) }}"> 

                                <div class="modal fade" id="liquidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                     <p class="text-center"> Cho phép thanh lý đề tài này ?</p>
                                     
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary alow"
                                    >Đồng ý</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('hoanthanh',['id'=>$topic->id]) }}">
                                <div class="modal fade" id="complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                     <p class="text-center"> Đồng ý hoàn thành đề tài này ?</p>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary miss" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary alow"
                                    >Đồng ý</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
           {{-- Modal Approval --}}
           @if($topic->close == 1)
           @include('common.form_cancel_topic');
           @endif
           @if($topic->status == 5 && isset($topic->scientific_deploy_report_id))

           @include('common.form_modal_scientific_deloy_report_topic');
           @elseif($topic->status == 5 && isset($topic->scientific_extension_id))

           @include('common.form_modal_scientific_extension_topic');

           @endif


            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <form method="post" action="">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3 class="card-header"><b>Đề tài:</b> {{$topic->name_topic}}
                            {{-- <div class="d-flex justify-content-end"><button type="submit" class="btn btn-rounded btn-success ">Lưu <i class="fas fa-save"></i></button>
                        </div> --}}
                        </h3>

                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label"><b>Tình trạng:</b>
                                    @php
                                    statusTopic($topic->status, $topic->close, $topic->notice_late);
                                    @endphp
                                </label>
                                @if($topic->scientific_cancel_id != null && $topic->close != 2)
                                <label class="p-l-10">
                                <a class="text-danger" data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-bottom: 2px solid;">Hủy đề tài</a>

                            </label>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Thể loại:</b>
                                    @php
                                    typeTopic($topic->type_topic);
                                    @endphp
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Người đăng ký:</b>
                                    <span  class="font-weight-normal">{{ $topic->user->name }}</span>
                                    <a target="_blank" class="text-primary font-weight-bold " href="{{ route('formlylichuser',['id_user'=>$topic->users_id]) }}">( Form lý lịch khoa học )</a>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Thời gian đăng ký:</b>
                                    <span>{{ $topic->created_at }}</span>
                                </label>
                            </div>


                    </form>
                </div>
                <br>
                <h3 class="card-header"><b>Tiến độ của đề tài</b></h3>


                <div class="flex-wr-sb-s p-t-15">
                    @if(Session::has('flag'))
                    <div class="alert alert-danger w-100">{{Session::get('message')}}</div>
                    @endif
                    @if(Session::has('flag_success'))
                    <div class="alert alert-success w-100">{{Session::get('message')}}</div>
                    @endif
                    <section class="cd-timeline js-cd-timeline">
                        <div class="cd-timeline__container">
                            <!-- 1 -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img {{ getActiveStatus($topic->status,1) }} js-cd-img">
                                    <img class="color-white" src="assets/images/one.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Đăng ký đề tài</h3>
                                    <hr>
                                    @if($user_approval!='')
                                    <p><b>-Người xét duyệt:</b> {{ $user_approval->name }} ({{ $user_approval->msgv }})
                                    </p>
                                    {{-- <p><b>-Link xét duyệt:</b> <a href="{{ url('xet-duyet-de-tai') }}"
                                            target="_blank"><b class="text-primary">{{ $topic->name_topic }}</b></a></p> --}}
                                    <p><b>-Tin nhắn:</b> {{ $topic->message_user_approval }}</p>
                                    @endif
                                    <a href="{{ route('formdkchitietdetai',['id'=>$topic->id]) }}" target="_blank" style="color: #fff ; font-weight: bold;">
                                    <button type="button" class="btn-sm btn-primary" >
                                        Xem chi tiết đăng ký đề tài
                                    </button>
                                     </a>

                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img {{ getActiveStatus($topic->status,2) }} js-cd-img">
                                    <img src="assets/images/two.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Thuyết minh đề cương</h3>
                                    <hr>
                                    {{-- <span class="cd-timeline__date">20 July, 2017</span> --}}
                                    @if($topic->status>2)
                                     <a  href="{{ route('formtmchitietdetai',['id'=>$topic->id]) }}" target="_blank" style="color: #fff ; font-weight: bold;">
                                    <button type="button" class="btn-sm btn-primary" >

                                            Xem đăng ký thuyết minh đề tài

                                    </button>
                                    </a>
                                    @endif
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img {{ getActiveStatus($topic->status,3) }} js-cd-img">
                                    <img src="assets/images/three.png" alt="Picture">
                                </div>
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Biện luận thuyết minh</h3>
                                    @if($topic->status >= 3)
                                    @foreach ($discuss_topic as $dis)
                                    <hr>
                                    <p><b>{{$dis->user->name}}({{$dis->user->msgv}})</b>
                                        @if($dis->status == 1)<b style="color: green" >  Đã đánh giá</b>  @endif</p>
                                    <p>
                                        @if($dis->status == 1)
                                          <a href="{{ route('formdgchitietdetai',['id'=>$topic->id,'id_user'=>$dis->user->id]) }}" target="_blank" style="color: #fff; font-weight: bold" class="btn-sm btn-primary" >
                                            Form đánh giá đề tài
                                          </a>
                                        @else
                                        -Link:
                                        <a
                                            href="{{ url('phan-bien-thuyet-minh',$dis->id) }}">{{ url('phan-bien-thuyet-minh',$dis->id) }}
                                        </a>
                                        @endif
                                    </p>
                                    @endforeach

                                    @endif
                                    @if($topic->status == 3 && count($discuss_topic)<5)
                                    <hr>
                                    <div class="row" style="padding-left: 15px" >
                                        <button type="button" class="btn-sm btn-primary"  data-id="{{$topic->id}}"
                                        data-name="{{$topic->name_topic}}"data-toggle="modal" data-target="#assignment" >Phân công biện luận</button>
                                    </div>
                                   @endif

                                    @if($topic->status == 3 && $flag == 0)
                                    <hr/>
                                    <div class="row " style="margin-top: 15px;padding-left: 15px">

                                        <button type="button"  class="btn-sm btn-success " data-toggle="modal" data-target="#exampleModalCenter">
                                          Cho phép thực hiện đề tài
                                      </button>

                        </div>
                                  @endif



                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block ">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 4) }} js-cd-img">
                                                <img src="assets/images/four.png" alt="Picture">
                                            </div>
                                            <div class="cd-timeline__content js-cd-content step4">
                                               <h3>Thực hiện đề tài</h3>
                                                @if($topic->status == 4)
                                                <a><button class="btn-sm btn-primary"  data-toggle="modal" data-target="#alert_report">
                                                    Cho phép báo cáo tiến độ đề tài</button></a>

                                                @endif

                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 5) }} js-cd-img">
                                                <img src="assets/images/five.png" alt="Location">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Báo cáo tiến độ đề tài</h3>
                                 
                                                @if($topic->status == 5 )

                                                @if(!isset($topic->notice_late) && !isset($topic->scientific_deploy_report_id))
                                                <button class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter4">
                                                    Thông báo trễ hạn đề tài
                                                </button>
                                                @elseif($topic->notice_late == 2 && !isset($topic->scientific_deploy_report_id))
                                                    <a target="_blank" href="{{ route('formgiahandetai',['id'=>$topic->id]) }}">
                                                        <button class="btn-sm btn-info">Xem đề nghị gia hạn đề tài</button>
                                                    </a>
                                                @elseif(isset($topic->scientific_deploy_report_id) && !isset($topic->notice_late))
                                                <button class="btn-sm btn-primary" data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-lg1">
                                                    Xét duyệt báo cáo đề tài
                                                </button>
                                                @elseif(isset($topic->scientific_deploy_report_id) && $topic->notice_late >= 2)
                                                    <a target="_blank" href="{{ route('formgiahandetai',['id'=>$topic->id]) }}">
                                                        <button class="btn-sm btn-info">Xem đề nghị gia hạn đề tài</button>
                                                    </a>
                                                    <button class="btn-sm btn-primary" data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-lg1">
                                                        Xét duyệt báo cáo đề tài
                                                    </button>
                                                @elseif(!isset($topic->scientific_deploy_report_id)  && $topic->notice_late >= 2)
                                                            <a target="_blank" href="{{ route('formgiahandetai',['id'=>$topic->id]) }}">
                                                                <button class="btn-sm btn-info">Xem đề nghị gia hạn đề tài</button>
                                                            </a>
                                                @elseif(isset($topic->scientific_extension_id) &&  $topic->notice_late < 2  )
                                                
                                                    <button class="btn-sm btn-info" data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-lg2">
                                                        Xét duyệt gia hạn đề tài
                                                    </button>
                                                
                                                @endif
                                                @endif
                                                
                                                @if($topic->status > 5 )
                                                 @if($topic->notice_late >= 2  )   
                                                    <a target="_blank" href="{{ route('formgiahandetai',['id'=>$topic->id]) }}">
                                                        <button class="btn-sm btn-info">Xem đề nghị gia hạn đề tài</button>
                                                    </a>
                                                    <a target="_blank" href="{{ route('formbaocaodetai',['id'=>$topic->id]) }}">
                                                        <button class="btn-sm btn-primary">Xem báo cáo triển khai</button>
                                                    </a>
                                                 @else  
                                                    <a target="_blank" href="{{ route('formbaocaodetai',['id'=>$topic->id]) }}">
                                                        <button class="btn-sm btn-primary">Xem báo cáo triển khai</button>
                                                    </a>
                                                 @endif

                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>

                                        <!-- cd-timeline__block -->

                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 6) }} js-cd-img">
                                                <img src="assets/images/six.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Nghiệm thu đề tài</h3>

                                                    @isset($topic->acceptance)
                                                    <div>
                                                        @foreach ($fileAcceptance as $key=>$item)
                                                        <div class="row">
                                                            <div class="col-2">File {{ $key+1 }}: </div>
                                                            <div class="col-10">
                                                                <a href="{{ route('downloadfilenghiemthudetai',[$topic->id, $key]) }}">
                                                                    <p class="text-primary" style="font-size:16px">
                                                                        @isset($item['filename'])
                                                                        {{ $item['filename'] }}
                                                                        @endisset
                                                                    </p>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    </div>

                                                    @endisset
                                                @if ($topic->status == 6 && isset($topic->acceptance) )

                                                    @if(!isset($topic->notice_acceptance) )

                                                    <div style="padding-top: 5px">
                                                        <button class="btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#acceptance">Đề nghị lập hội đồng nghiệm thu</button>
                                                    </div>
                                                    @elseif($topic->notice_acceptance == 1 && !isset($topic->sumary_acc_id))
                                                    <p class="text-info">Đã đề nghị lập hội đồng thẩm định</p>
                                                    <p class="text-primary">Link: {{route('laphoidongdetai',$topic->id)}}</p>
                                                    @elseif($topic->notice_acceptance == 2 && !isset($topic->sumary_acc_id))
                                                      <button class="btn-sm btn-info" data-toggle="modal" data-toggle="modal" data-target="#listgreedcouncil">
                                                          Danh sách hội đồng thẩm định nghiệm thu đề tài
                                                      </button>
                                                      @elseif($topic->notice_acceptance == 3 && !isset($topic->sumary_acc_id))
                                                      <p class="text-info">Đã gửi hội đồng thẩm định nghiệm thu</p>
                                                      <p class=" font-weight-bold " >Danh sách thành viên hội đồng nghiệm thu: </p>
                                                    <div class="row">
                                                       <div class="col-lg-6 text-center font-weight-bold">Họ và tên</div>
                                                       <div class="col-lg-6 text-center font-weight-bold">Chức danh hội đồng</div>
                                                        @isset($council)
                                                        @foreach($council as $key => $greed)
                                                        <div class="col-lg-6 text-center">
                                                            <span class="p-l-10">
                                                                {{ $greed }}
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-6 text-center">
                                                            <span class="p-l-20">
                                                                {{ position_evalute($key) }}
                                                            </span>
                                                        </div>
                                                             
                                                            
                                                            
                                                            
                                                                
                                                        <br/>
                                                        @endforeach
                                                        @endisset
                                                    </div>
                                                        
                                                           
                                                   
                                                      <p><span>Link:</span><span class=" text-primary "> {{ route('danhgianghiemthudetai',$topic->id) }}</span></p>
                                                   @elseif(isset($topic->sumary_acc_id))
                                                   <a target="_blank" href="{{route('xemtongketnghiemthudetai',$topic->id)}}">
                                                    <button class="btn-sm btn-primary">Form tổng kết nghiệm thu đề tài</button>
                                                   </a>
                                                  <div class="row p-t-10 p-l-15">
                                                    <button class="btn-sm btn-primary p-t-10" data-toggle="modal"
                                                    data-target="#liquidation">Cho phép thanh lý đề tài</button>
                                                  </div>
                                                   
                                                @endif
                                                @endif
                                                @if ($topic->status > 6)
                                                <a target="_blank" href="{{route('xemtongketnghiemthudetai',$topic->id)}}">
                                                    <button class="btn-sm btn-primary">Form tổng kết nghiệm thu đề tài</button>
                                                </a>
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 7) }} js-cd-img">
                                                <img src="assets/images/seven.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thanh lý đề tài</h3>
                                                @isset($fileLiquidation)
                                                <div class="mb-3">
                                                    @foreach ($fileLiquidation as $key=>$item)
                                                    <div class="row">
                                                        <div class="col-2">File {{ $key+1 }}: </div>
                                                        <div class="col-10">
                                                            <a href="{{ route('downloadfilethanhlydetai',[$topic->id, $key]) }}">
                                                                <p class="text-primary" style="font-size:16px">
                                                                    {{ $item['filename'] }}
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endisset
                                                @if($topic->status == 7 && isset($fileLiquidation))
                                                 <button class="btn-sm btn-primary" data-toggle="modal"

                                                        data-target="#accliquidation"> Xác nhận thanh lý đề tài</button>  

                                                @endif
                                                @if ($topic->status > 7)
                                                    <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($topic->status, 8) }} js-cd-img">
                                                <img src="assets/images/eight.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Hoàn thành đề tài</h3>
                                                @if($topic->status == 8)
                                                <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block"></div>
                                        <div class="cd-timeline__block"></div>
                                        <!-- cd-timeline__block -->

                            {{--  --}}
                        </div>
                    </section>


                </div>



            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="listgreedcouncil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-approval-doc" method="post" action="{{ route('adminguiyeucauthamdinhdetai') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_topic" value="{{ $topic->id }}">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel"> Danh sách thành viên hội đồng nghiệm thu </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="w7">STT</th>
                                                <th>Họ và tên</th>
                                                <th >Chức vụ hội đồng</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($council)
                                            @foreach($council as $key => $cou)
                                            <tr>
                                                <td></td>
                                                <td>{{ $cou }}</td>
                                                <td>

                                                   {{ position_evalute($key) }}

                                                </td>

                                            </tr>
                                            @endforeach
                                            @endisset


                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Tin nhắn:</label>
                                        <textarea name="message" class="form-control">

                                        </textarea>
                                    </div>
                                </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary" >Gửi thẩm định</button>

                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
                                  $('#assignment').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('name')
              var id_topic = button.data('id') // Extract info from data-* attributes
              var modal = $(this)
              modal.find('.modal-title').text('Phân công biện luận đề tài: ' + recipient)
              modal.find('#id_topic').val(id_topic)
            });

                                  $("form-send-message").submit(function(){
                    
                  });
                                });

                                 $(document).ready(function () {
                                  $('select').selectize({
                                    sortField: 'text'
                                  });

                                  
                                });
                                
</script>
@endsection
