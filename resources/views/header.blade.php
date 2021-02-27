<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="/"><img src="cntt/images/icons/logo.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li>
                    <a href="{{ route('trangchu') }}">TRANG CHỦ</a>
                </li>
                <li>
                    <a href="#">NGHIÊN CỨU KHOA HỌC</a>
                    <ul class="sub-menu-m">
                        <li><a href="{{ route('nghiencuukhoahoccaptruong') }}">Nghiên cứu khoa học cấp trường</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="{{ route('biensoantailieugiangday') }}">BIÊN SOẠN TÀI LIỆU GIẢNG DẠY </a>
                </li>

                <li>
                    <a href="#">SỞ HỮU TRÍ TUỆ</a>
                </li>

                <li>
                    <a href="#">VĂN BẢN BIỂU MẪU</a>
                </li>

                <li>
                    <a href="{{ route('lienhe') }}">LIÊN HỆ</a>
                </li>

            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo no-banner container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{ route('trangchu') }}"><img src="cntt/images/banner.jpg" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop ">
                    <a class="logo-stick" href="index.html">
                        <img src="cntt/images/icons/logo.png" alt="LOGO">
                    </a>

                    <ul class="main-menu justify-content-center">
                        <li class="main-menu-active">
                            <a href="{{ route('trangchu') }}">TRANG CHỦ</a>
                        </li>
                        <li class="main-menu-after">
                            <a href="#">NGHIÊN CỨU KHOA HỌC</a>
                            <ul class="sub-menu ">
                                <li><a href="{{ route('nghiencuukhoahoccaptruong') }}">Nghiên cứu khoa học cấp
                                        trường</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('biensoantailieugiangday') }}">BIÊN SOẠN TÀI LIỆU GIẢNG DẠY</a>
                        </li>
                        <li>
                            <a href="#">SỞ HỮU TRÍ TUỆ</a>
                        </li>
                        <li>
                            <a href="#">VĂN BẢN BIỂU MẪU</a>
                        </li>
                        <li>
                            <a href="{{ route('lienhe') }}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    <div class="row p-t-50  d-flex justify-content-end">
    <div class=" col-lg-5  d-flex justify-content-center">
        <form class="input-group mb-3" action="{{route('timkiemtrangchu') }}" method="get">
            <div class="input-group mb-3 container">

                <input type="text" class="form-control" name="indexsearch" placeholder="Nhập nội dung tìm kiếm..."
                    aria-label="" required aria-describedby="button-addon2" @if(Request::has('indexsearch')) value="{{ Request::get('indexsearch') }}" @endif>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Tìm kiếm</button>
                </div>


            </div>
        </form>
    </div>
    <div class=" col-lg-4 d-flex justify-content-end ">
        @if (Auth::check())
            <div class="  text-dark  ">
                <div class="dropdown container d-flex flex-row-reverse bd-highlight">
                    <button type="button" class="btn btn-primary dropdown-toggle float-right " data-toggle="dropdown">
                        Xin chào {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('dangkydetaichunhiemdetai') }}">Lý lịch khoa học</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('changePasswordUser') }}">Đổi mật khẩu</a>
                        <a class="dropdown-item" href="{{ route('changeInformationUser') }}">Cập nhật thông tin cá
                            nhân</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                    </div>
                </div>
            </div>
        @else
            <div class=" text-dark ">
                <div class="container d-flex flex-row-reverse bd-highlight">
                    <a class="btn btn-primary float-right " href="{{ route('login') }}">Đăng nhập</a>
                </div>
            </div>
        @endif

    </div>
</div>

</header>

