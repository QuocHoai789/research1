<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập xét duyệt đề tài - Phòng khoa học công nghệ - Nghiên cứu và phát triển</title>
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><img class="logo-img"  src="cntt/images/icons/favicon.png" alt="logo"><span class="splash-description"><b>Xét duyệt đề tài - Phòng khoa học công nghệ - Nghiên cứu và phát triển</b></span></div>
            <div class="card-body">
                @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                @endif
                <form action="{{route('loginapproval')}}" method="post">
                	<input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="msgv" id="msgv" type="text" placeholder="Mã Giảng Viên" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Mật khẩu" required>
                    </div>
                    {{-- <div  class="row form-group">@if(Session::has('flag')) {{Session::get('flag')}} @endif </div> --}}
                    {{-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Lưu</span>
                        </label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>

                </form>
            </div>
        </div>
    </div>
    
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>