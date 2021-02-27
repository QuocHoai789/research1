@extends('master')
@section('content')
    <section class="post bg0 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
                <div class="col-md-10 col-lg-12">

                    <div class="p-r-10 p-rl-0-sr991 p-b-20">
                        @if (Session::has('flash_message'))
                            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                        @endif
                        <!-- Entertainment  -->
                        <div class="p-b-25">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Danh mục tài liệu giảng dạy
                                </h3>
                            </div>

                            <div class="flex-wr-sb-s p-t-15">
                                <div class="h3 w-100 text-center">
                                    <a class="float-right" href="{{ route('dangkybiensoantailieugiangday') }}"><span
                                            class="h6 text-success">Biên soạn tài liệu</span> <i
                                            class='fas fa-plus-circle text-success'></i></a>
                                </div>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên tài liệu giảng dạy</th>
                                            <th scope="col " class="text-center">Tác giả</th>
                                            <th scope="col" class="text-center">Thể loại</th>
                                            <th scope="col" class="text-center">Tình trạng</th>
                                            <th scope="col" class="text-center">Chi tiết</th>
                                            <th></th>
                                        </tr>
                                        @isset($documents)
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td scope="col">{{ $i++ }}</td>
                                                <td scope="col">{{ $document->name_doc }}</td>
                                                <td scope="col " class="text-center">{{ Auth::user()->name }}</td>
                                                <td scope="col" class="text-center">
                                                    @php
                                                    typeDoc($document->type_doc);
                                                    @endphp
                                                </td>
                                                <td scope="col" class="text-center">
                                                    @php
                                                    statusDoc($document->status, $document->close,$document->notice_late);
                                                    @endphp
                                                </td>
                                                <td class="text-center">
                                                    @if ($document->close!=1 && $document->close!=2)
                                                    <a
                                                    href="{{ route('theodoitailieu', $document->slug_doc) }}"><i
                                                        class="fas fa-info-circle"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($document->close!=1 && $document->close!=2)
                                                        <a href="{{ route('huytailieubaigiang',$document->id)}}" class="notify-cancel">Hủy</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endisset
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="row"></div>
                                <div class="space40">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('.notify-cancel').click(function(e){
            if(confirm('Bạn có chắc chắn hủy tài liệu giảng dạy này không')==false){
                e.preventDefault();
            }
        });
    </script>
@endsection
