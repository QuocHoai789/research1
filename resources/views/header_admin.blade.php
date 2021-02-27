<style type="text/css">
    .h7,
    .nav-link1,
    .nav-user-name,
    .dropdown-item {
        font-weight: bold;
    }

    @media screen and (max-width: 770px) {

        .navbar-brand {

            display: none;
        }

        #nav_toggle i {
            margin-top: 5px;
        }


    }

</style>

<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand " href="{{ route('admin') }}"><img class="img-responsive "
                src="cntt/images/icons/logo.png" alt="logo" height="75"></a><span class="h7">Quản trị - Nghiên cứu và
            phát triển</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="nav_toggle"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                {{-- <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Tìm kiếm..">
                    </div>
                </li> --}}


                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-bell"></i>
                        @if($count_all_register != 0)
                        <span
                            style=" font-size: 10px;position: absolute;border-radius: 50%;font-weight: bold;color: white;"
                            class="badge bg-danger ">
                            {{ $count_all_register }}
                        </span>
                        @endif
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Thông báo</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    @foreach($new_register_doc as $new_register)
                                    <a href="{{ route('chitiettailieu',$new_register->id) }}" class="new_register list-group-item list-group-item-action active">
                                        <div class="notification-info">
                                            <div class="notification-list-user-img"><img
                                                    src="public/concept/assets/images/avatar-2.jpg" alt=""
                                                    class="user-avatar-md rounded-circle"></div>
                                            <div class="notification-list-user-block"><span
                                                    class="notification-list-user-name">{{ name($new_register->user->id) }}</span> 
                                                    đã đăng ký biên soạn tài liệu <span class="font-weight-bold" style="color: red">{{ $new_register->name_doc }}</span> .
                                                <div class="notification-date">Vào lúc: <span>  {{ $new_register->created_at->diffForHumans() }}</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    @foreach($new_register_topic as $new_register)
                                    <a href="{{ route('chitietdetai',$new_register->id) }}" class="new_register list-group-item list-group-item-action active">
                                        <div class="notification-info">
                                            <div class="notification-list-user-img"><img
                                                    src="public/concept/assets/images/avatar-2.jpg" alt=""
                                                    class="user-avatar-md rounded-circle"></div>
                                            <div class="notification-list-user-block"><span
                                                    class="notification-list-user-name">{{ name($new_register->user->id) }}</span> 
                                                    đã đăng ký đề tài nghiên cứu khoa học  <span class="font-weight-bold" style="color: red">{{ $new_register->name_topic }}</span> .
                                                <div class="notification-date">Vào lúc:  {{ $new_register->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"> <a href="#">Xem tất cả thông báo</a></div>
                        </li>
                    </ul>
                    
                </li>


                {{-- <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                        <li>
                            <div class="conntection-footer"><a href="#">More</a></div>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown nav-r-u"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            @if (Auth::check())
                                <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                            @endif
                            <span class="status"></span><span class="ml-2">Admin</span>
                        </div>
                        <!-- {{-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a> --}}
                                {{-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> --}} -->
                        <a class="dropdown-item" href="{{ route('changepassword', ['id' => Auth::user()->id]) }}"><i
                                class="fas fa-key mr-2" aria-hidden="true"></i>Đổi mật khẩu</a>
                        <a class="dropdown-item" href="{{ route('logoutadmin') }}"><i
                                class="fas fa-power-off mr-2"></i>Đăng Xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        <a class="nav-link" href=""> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-6" aria-controls="submenu-5">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            Thông báo
                        </a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('lichsuthongbao') }}">Danh sách thông báo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('vietthongbao') }}">Viết thông báo</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-0" aria-controls="submenu-0"><i class="fa fa-fw fa-rocket"></i>Đề tài
                            khoa học</a>
                        <div id="submenu-0" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('danhsachdetaicaptruong') }}">Danh sách đề tài
                                        cấp trường</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i class="far fa-list-alt"></i>Biên soạn
                            tài liệu giảng dạy</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('danhsachtailieu') }}">Danh sách tài liệu giảng
                                        dạy</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-book"></i> Học phần biên
                            soạn</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('danhsachhocphan') }}">Danh sách học phần </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('themhocphan') }}">Thêm học phần biên soạn tài
                                        liệu</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-3"><i class="fa fa-fw fa-rocket"></i>Nghiệm
                            thu đề tài</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="">Đăng ký</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Phân công phản biện</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Báo
                            cáo thống kê</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('thongkedetai') }}">Thống kê đề tài khoa học</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('thongketailieu') }}">Thống kê tài liệu biên
                                        soạn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-user mr-2"></i>Tài
                            khoản</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dangkytaikhoan') }}">Đăng ký tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('danhsachtaikhoan') }}">Danh sách tài khoản</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link1" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-cogs"></i>Cấu hình</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cauhinhthongtin') }}">Thông tin chung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('datlichdangky') }}">Đặt lịch đăng ký</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cauhinhgmailadmin') }}">Gmail</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
</div>
