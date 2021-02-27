@extends('master')
@section('content')
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <section class="post bg0 p-t-50">
        <div class="container">
            <div class="row justify-content-center" style="display: unset">
                <!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
                <div class="col-md-10 col-lg-12">

                    <div class="p-r-10 p-rl-0-sr991 p-b-20">

                        <!-- Entertainment  -->
                        <div class="" style="  border: 1px solid #e6e6e6;">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    @isset($notice->title)
                                    {{ $notice->title }}
                                    @endisset
                                </h3>
                            </div>
                            @if (Session::has('flag_error'))
                                <div class="alert alert-danger w-100">{{ Session::get('flag_error') }}</div>
                            @endif
                            @if (Session::has('flag_success'))
                                <div class="alert alert-success w-100">{{ Session::get('flag_success') }}</div>
                            @endif

                            @isset($notice)
                            <div class="p-l-20">
                                <p >{!! $notice->content !!}</p>
                            </div>
                                
                            @endisset
                        </div>

    </section>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/timeline/js/main.js"></script>


@endsection
