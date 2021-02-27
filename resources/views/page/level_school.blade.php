@extends('master')
@section('content')
<section class="post bg0 p-t-10">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
            <div class="col-md-10 col-lg-12">

                <div class="p-r-10 p-rl-0-sr991 p-b-20">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif
                    <!-- Entertainment  -->
                    <div class="p-b-25">
                        <div class="how2 how2-cl1 flex-s-c">
                            <h3 class="f1-m-2 cl12 tab01-title">
                                Danh mục đề tài nghiên cứu khoa học cấp trường
                            </h3>
                        </div>

                        <div class="flex-wr-sb-s p-t-15">
                            <div class="h3 w-100 text-center">
                                <a class="float-right" href="{{ route('dangkydetaicaptruong') }}"><span
                                        class="h6 text-success">Đăng ký đề tài</span> <i
                                        class='fas fa-plus-circle text-success'></i></a>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên đề tài</th>
                                        <th scope="col" class="text-center">Mã đề tài</th>
                                        <th scope="col " class="text-center">Năm đăng ký</th>
                                        <th scope="col" class="text-center">Tình trạng</th>
                                        <th scope="col" class="text-center">Chi tiết</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($level_school as $value)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $value->name_topic }}</td>
                                            <td class="text-center">{{ $value->id }}</td>
                                            <td class="text-center">{{ date_format($value->created_at,'Y') }}</td>
                                            <td class="text-center">
                                                @php
                                                statusTopic($value->status, $value->close,$value->notice_late);
                                                @endphp
                                            </td>
                                            <td class="text-center"><a
                                                    href="{{ route('theodoidetai',$value->slug_name_topic) }}"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                            <td class="text-center">
                                                @if ($value->close == 0 && $value->status < 8)
                                                    <a href="{{ route('huydetainghiencuu', $value->id) }}" class="messageCancel">Hủy</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="row">{{ $level_school->links() }}</div>
                            <div class="space40">&nbsp;</div>
                        </div>
                    </div>



                </div>
            </div>


        </div>
    </div>
</section>
<script>
    $('.messageCancel').click(function(e){
        if(confirm('Bạn có chắc chắn hủy tài liệu giảng dạy này không')==false){
            e.preventDefault();
        }
    });
</script>
@endsection
