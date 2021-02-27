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
                    <h2 class="pageheader-title">
                        CHI TIẾT TÀI LIỆU BIÊN SOẠN
                    </h2>
                    
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item"><a href=""
                                        class="breadcrumb-link">Bảng danh sách tài liệu biên soạn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi Tiết Tài Liệu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @isset($document->document_extension_id)
        @include('common.form_extension_doc');
        @endisset

        <div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('processdoc') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Cho phép báo cáo biên soạn tài liệu ?</p>
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
            <div class="modal fade" id="canceldoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('acceptcanceldoc',$document->id) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Hủy biên soạn tài liệu này ?</p>
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

            <div class="modal fade" id="assignment2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('reprocessdoc') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Cho phép tiếp tục báo cáo biên soạn tài liệu ?</p>
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
            <div class="modal fade" id="complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('completedoc') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Đồng ý thanh lý tài liệu ?</p>
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
            <div class="modal fade" id="agree_acceptance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('dongythanhlytailieu') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Đồng ý nghiệm thu tài liệu ?</p>
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

            <div class="modal fade" id="acceptance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('acceptancedoc') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_doc" name="id_doc" value="{{ $document->id }}">
                        <input type="hidden" id="id_user" name="id_user" value="{{ $document->registerdoc->id_user_approval }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Cho phép tiến hành nghiệm thu biên soạn tài liệu ?</p>
                                </div>
                                {{-- <div>
                                    <label>Tin nhắn:</label>
                                    <textarea name="message" class="form-control"></textarea>
                                </div> --}}
                               

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="compilation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('compilation') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Cho phép thực hiện biên soạn tài liệu ?</p>
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
            <div class="modal fade" id="noticelate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('noticelatedoc',['id'=>$document->id]) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p> Gửi thông báo trễ hạn báo cáo biên soạn ?</p>
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
            @if($document->status == 4)
            <div class="modal fade" id="liquidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('guihoidongthamdinhtailieu') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <input type="hidden" id="id_topic" name="id_user" value="{{ $document->registerdoc->id_user_approval }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">Gửi kiến nghị thành lập hội đồng nghiệm thu tài liệu</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Người nhận: 
                                       
                                        {{ name($document->registerdoc->id_user_approval) }}
            
                                       
                                     </p>
                                </div>
                                <div>
                                    
                                    <label>Tin nhắn:</label>
                                    <textarea name="message" class="form-control"></textarea>
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
            @endif
             <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-send-message" method="post" action="{{ route('liquidation') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_topic" name="id_doc" value="{{ $document->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">New message</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <p>Đồng ý nghiệm thu biên soạn tài liệu ?</p>
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

        <form method="post" action="{{ route('guixetduyetdecuong') }}"> 
            <div class="modal fade" id="sendoutline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id_doc" value="{{$document->id}}">
                                                <input type="hidden" name="id_user" value="{{$document->registerdoc->id_user_approval}}">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                          {{--  <p class="text-center"> Cho phép gửi xét duyệt đề cương ?</p> --}}
                                           
                                               
                                           <textarea class="form-control" name="message">  
                                           
                                              
                                           
                                           
                                               
                                           </textarea>
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
     

       



        <div class="row">
            <!-- ============================================================== -->

           {{-- Modal Approval --}}
           @if($document->close == 1)
           @include('common.form_cancel_doc');
           @endif
           
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <form method="post" action="">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3 class="card-header"><b>Tài liệu:</b> {{$document->name_doc}}
                            {{-- <div class="d-flex justify-content-end"><button type="submit" class="btn btn-rounded btn-success ">Lưu <i class="fas fa-save"></i></button>
                        </div> --}}
                        </h3>

                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label"><b>Tình trạng:</b>
                                    @php
                                    statusDoc($document->status, $document->close , $document->notice_late);
                                    @endphp

                                </label>
                                @if($document->document_cancel_id != null && $document->close != 2)
                                <label class="p-l-10">
                                <a class="text-danger" data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-bottom: 2px solid;">Xác nhận hủy biên soạn</a>
                                @elseif($document->document_cancel_id != null && $document->close == 2)
                                <a target="_blank" class="text-danger" href="{{ route('formhuytailieu',['id'=>$document->id]) }}">Form hủy biên soạn</a>
                            </label>
                                @endif
                                
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Người đăng ký:</b>
                                    <span  class="font-weight-normal">{{ $document->user->name }}</span>
                                    <a target="_blank" class="text-primary font-weight-bold " href="{{ route('formlylichuser',['id_user'=>$document->users_id]) }}">( Form lý lịch khoa học )</a>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Thời gian đăng ký:</b>
                                    <span>{{ $document->created_at }}</span>
                                </label>
                            </div>
                            @if($document->registerdoc->id_user_approval != 0)
                            <div class="form-group col-md-6">
                                <label for="inputText3" class="col-form-label">
                                    <b>Người xét duyệt:</b>
                                    <span>{{ name($document->registerdoc->id_user_approval) }}</span>
                                    <a href="{{ route('documentapproval',$document->id) }}" class="text-primary font-weight-bold ">({{ route('documentapproval',$document->id) }})</a>
                                </label>
                            </div>
                            @endif
                            
                            
                    </form>
                </div>
                <br>
                <h3 class="card-header"><b>Tiến độ biên soạn tài liệu</b></h3>
                

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
                                <div class="cd-timeline__img {{ getActiveStatus($document->status,1) }} js-cd-img">
                                    <img class="color-white" src="assets/images/one.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Đăng ký biên soạn tài liệu</h3>
                                    <hr>
                                    <a href="{{ route('formdktailieu',['id'=>$document->id]) }}" target="_blank" style="color: #fff ; font-weight: bold;">
                                    <button type="button" class="btn-sm btn-primary" >
                                      
                                        Form đăng ký biên soạn
                                      
                                        
                                    </button>
                                    </a>
                                    
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img {{ getActiveStatus($document->status,1) }} js-cd-img">
                                    <img src="assets/images/two.png" alt="Picture">
                                </div>
                                <!-- cd-timeline__img -->
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Xét duyệt đề cương</h3>
                                    <hr>
                                   
                                    @if($document->status ==1 && !isset($document->summary_outline_id) && $document->close != 2)
                                    {{-- <a href="{{ route('guixetduyetdecuong') }}"> --}}
                                      <p class="text-warning">
                                            Đang chờ xét duyệt
                                        </p>
                                    @elseif($document->status == 1 && isset($document->summary_outline_id))
                                        <a target="_blank" href="{{ route('formdecuong',['id'=>$document->id])  }}">
                                         <button class="btn-sm btn-primary" >
                                            Form xét duyệt đề cương
                                        </button>    
                                    </a>
                                    <button style="margin-top: 5px" class="btn-sm btn-primary" data-toggle="modal" data-target="#compilation" >
                                            Cho phép thực hiện biên soạn
                                        </button> 
                                    @endif
                                    @if($document->status > 1)
                                    <a target="_blank" href="{{ route('formdecuong',['id'=>$document->id])  }}">
                                         <button class="btn-sm btn-primary" >
                                            Form xét duyệt đề cương
                                        </button>    
                                    </a>

                                    @endif
                                    {{-- @if ($document->status >= 3)
                                    <a target="_blank" href="{{ route('formdecuong',['id'=>$document->id])  }}">
                                         <button class="btn btn-primary" >
                                            Form xét duyệt đề cương
                                        </button>    
                                    </a>
                                       
                                    @endif --}}
                                    
                                    
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                            <div class="cd-timeline__block js-cd-block">
                                <div class="cd-timeline__img {{ getActiveStatus($document->status,2) }} js-cd-img">
                                    <img src="assets/images/three.png" alt="Picture">
                                </div>
                                <div class="cd-timeline__content js-cd-content">
                                    <h3>Thực hiện biên soạn</h3>

                                    @if($document->status == 2 && $document->close != 2)
                                    <button class="btn-sm btn-primary"  data-id="{{$document->id}}"
                                        data-name="{{$document->name_doc}}"data-toggle="modal" data-target="#assignment">Cho phép báo cáo biên soạn</button>
                                    @elseif($document->status > 2)
                                    <p class="text-success">Đã hoàn thành</p>
                                    @endif
                                </div>
                                <!-- cd-timeline__content -->
                            </div>
                            <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block ">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($document->status, 3) }} js-cd-img">
                                                <img src="assets/images/four.png" alt="Picture">

                                            </div>
                                            <div class="cd-timeline__content js-cd-content step4">
                                               <h3>Kiểm tra tiến độ</h3>
                                                 @if($document->status == 3 && !isset($document->notice_late) && !isset($document->document_extension_id) && $document->close != 2 && !isset($document->deploy_report) )
                                                <button class="btn-sm btn-danger" data-toggle="modal" data-target="#noticelate">Thông báo trễ hạn báo cáo</button>
                                                @elseif(isset($document->document_extension_id) && $document->notice_late == 1)
                                                <button class="btn-sm btn-primary" data-toggle="modal" data-target="#late">Xem đề nghị gia hạn biên soạn</button>
                                                @elseif(isset($document->document_extension_id) && $document->notice_late == 2 && empty($document->deploy_report))
                                                <p class="text-info">Đã gia hạn biên soạn</p>
                                                @elseif( !empty($document->deploy_report))
                                                    @if($document->status >3 && isset($document->document_extension_id) )
                                                    <a target="_blank" href="{{ route('formgiahandocadmin',['id'=>$document->id]) }}">
                                                    <button class="btn-sm btn-primary" >Form đề nghị gia hạn biên soạn</button>
                                                    </a>
                                                    <p class="text-success">Đã hoàn thành</p>
                                                    @else
                                                    <p class="text-success">
                                                    Đã hoàn thành {{ $document->deploy_report }}%</p>
                                                    @if( ($document->status == 3  && $document->deploy_report == 100) || ($document->status == 3 && $document->deploy_report == 100 && $document->notice_report == 2) )
                                                    <button class="btn-sm btn-primary" data-toggle="modal" data-target="#acceptance">Cho phép nghiệm thu</button>
                                                    
                                                    @elseif($document->deploy_report != 100 && !isset($document->notice_report))
                                                        <button class="btn-sm btn-primary" data-toggle="modal" data-target="#assignment2">Cho phép báo cáo lần 2</button>
                                                        @elseif($document->deploy_report != 100 && $document->notice_report == 2)
                                                        <button class="btn-sm btn-danger" data-toggle="modal" data-target="#canceldoc">Hủy biên soạn tài liệu</button>
                                                    @endif
                                                    @endif
                                                @endif
                                               
                                                
                                                
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($document->status, 4) }} js-cd-img">
                                                <img src="assets/images/five.png" alt="Location">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Nghiệm thu tài liệu biên soạn</h3>

                                                
                                                @isset($document->acceptance)
                                                 <div  class="col">
                                                     @foreach($acceptance as $key => $item)
                                                    <a href="{{ route('downloadfilenghiemthutailieu',[$document->id, $key]) }}">
                                                    {{--  <button type="button" class="btn btn-primary" >  --}}
                                                        <p style="font-size:16px" >
                                                            <span>File {{++$key}} :</span>
                                                            <span class="text-primary">{{ $item['filename'] }}</span>
                                                        </p>
                                                    {{--  </button>  --}}
                                                     
                                                </a>
                                                @endforeach
                                                @endisset
                                                  
                                                </div>
                                                <hr/>
                                                @if($document->status == 4)
                                                @if(!isset($document->notice_acceptance) && isset($document->acceptance))
                                                <button class="btn-sm btn-primary" data-toggle="modal" data-target="#liquidation">
                                                    Tiến hành nghiệm thu biên soạn tài liệu
                                                </button>
                                                @elseif($document->notice_acceptance == 1 && !isset($document->registerdoc->greed_council))
                                                <div class="p-t-10">
                                                    <p class="text-info">Đã gửi yêu cầu thành lập hội đồng nghiệm thu tài liệu</p>
                                                    <p>Người nhận: 
                                                        <span class="text-primary">
                                                            {{ name($document->registerdoc->id_user_approval) }}
                                                        </span>
                                                    </p>
                                                    <p>Link: <span class="text-primary">{{route('thanhlapnghiemthutailieu',$document->id)}}</span></p>
                                                </div>
                                                @elseif($document->notice_acceptance == 1 && isset($document->registerdoc->greed_council))
                                                <button class="btn-sm btn-success" data-toggle="modal" data-target="#listgreedcouncil" data-id="" data-name="">
                                                    Danh sách hội đồng nghiệm thu
                                                </button>
                                                @elseif($document->notice_acceptance == 2 && !isset($document->sumary_acc_id) )
                                                <p class="text-success">Đã gửi hội đồng thẩm định nghiệm thu</p>
                                                <p >Danh sách thành viên hội đồng nghiệm thu: </p>
                                                    <div class="row">
                                                        <div class="col-lg-6 text-center font-weight-bold">Họ và tên</div>
                                                       <div class="col-lg-6 text-center font-weight-bold">Chức danh hội đồng</div>
                                                       @isset($list_greed)
                                                       @foreach($list_greed as $key => $greed)
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
                                                    
                                                       
                                                
                                                <span>Link:  {{ route('danhgianghiemthutailieu',$document->id) }}</span>
                                                @elseif($document->notice_acceptance == 2 && isset($document->sumary_acc_id) )
                                                <a target="_blank" href="{{ route('ketquanghiemthu',['id'=>$document->id]) }}">
                                                    <button class="btn-sm btn-success">Form nghiệm thu tài liệu</button>
                                                </a>
                                                
                                                    <button class="btn-sm btn-primary" data-toggle="modal" data-target="#agree_acceptance" data-id="" data-name="">Đồng ý nghiệm thu tài liệu</button>
                                                
                                                @endif
                                                @elseif($document->status > 4)
                                                <a target="_blank" href="{{ route('ketquanghiemthu',['id'=>$document->id]) }}">
                                                    <button class="btn-sm btn-success">Biên bản họp hội đồng nghiệm thu</button>
                                                </a>
                                                <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                                
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>

                                        <!-- cd-timeline__block -->

                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($document->status, 5) }} js-cd-img">
                                                <img src="assets/images/six.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Thanh lý tài liệu biên soạn</h3>
                                                @isset($liquidation)
                                                    <div>
                                                        @foreach ($liquidation as $key=>$item)
                                                        <div class="row">
                                                            <div class="col-2">File {{ $key+1 }}: </div>
                                                            <div class="col-10">
                                                                <a href="{{ route('downloadfilethanhlytailieu',['id'=>$document->id, 'index' => $key]) }}">
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
                                                @if($document->status == 5 && $document->close != 2)
                                                @if(isset($document->liquidation))
                                                
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#thanhly" data-id="" data-name="">Gửi thanh lý tài liệu</button>
                                                @endif
                                                 {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#complete">Đồng ý thanh lý biên soạn tài liệu</button> --}}
                                                @endif
                                                @if($document->status > 5)
                                                {{--  --}}
                                                <p class="text-success">Đã hoàn thành</p>
                                                @endif
                                            </div>
                                            <!-- cd-timeline__content -->
                                        </div>
                                        <!-- cd-timeline__block -->
                                        <div class="cd-timeline__block js-cd-block">
                                            <div
                                                class="cd-timeline__img {{ getActiveStatus($document->status, 5) }} js-cd-img">
                                                <img src="assets/images/seven.png" alt="Movie">
                                            </div>
                                            <!-- cd-timeline__img -->
                                            <div class="cd-timeline__content js-cd-content">
                                                <h3>Hoàn thành biên soạn</h3>
                                                
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
                    <form id="form-approval-doc" method="post" action="{{ route('adminguiyeucauthamdinh') }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_doc" name="id_doc" value="{{ $document->id }}">
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel"> Danh sách thành viên hội đồng nghiệm thu </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w7">STT</th>
                                            <th>Họ và tên</th>
                                            <th >Chức vụ hội đồng</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($list_greed)
                                        @foreach($list_greed as $key => $greed)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $greed }}</td>
                                            <td>
                                          
                                                {{ position_evalute($key) }}

                                               
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        @endisset
                                        

                                    </tbody>
                                </table>
                                <div>
                                    <label>Tin nhắn:</label>
                                    <textarea name="message" class="form-control">
                                        
                                    </textarea>
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
                <div class="modal fade" id="thanhly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="form-approval-doc" method="post" action="{{ route('guithanhlytailieu',['id'=>$document->id]) }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="id_doc" name="id_doc" value="{{ $document->id }}">
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold text-success" id="exampleModalLabel"> Gửi thanh lý tài liệu</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div>
                                    <label>Tin nhắn:</label>
                                    <textarea name="message" class="form-control">
                                        
                                    </textarea>
                                </div>
                                     
                                   

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary" >Gửi Thanh lý</button>
                                    
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
              modal.find('.modal-title').text('Cho phép báo cáo biên soạn tài liệu: ' + recipient)
              modal.find('#id_topic').val(id_topic)
            });

                                  $("form-send-message").submit(function(){
                    //aler('success')
                  });
                                });

                                 $(document).ready(function () {
                                  $('select').selectize({
                                    sortField: 'text'
                                  });
                                  
                                  // $('.alow').on('click',function(){

                                  //   $('.step4').append('<button class="btn btn-primary"></button>');

                                  // });
                                });
                                 @if (session::has('error_message'))
                                 $(document).ready(function () {
                                  alert('{{ session::get('error_message') }}');
                                });
                                 @endif
</script>
@endsection
