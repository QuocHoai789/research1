@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách tài liệu biên soạn </h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách tài liệu biên soạn</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                	<h5 class="card-header">Danh sách học phần biên soạn tài liệu</h5>
                	<div class="card-body" id="product-cart">
                		<div class="table-responsive">
                			<table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên tài liệu</th>
                                    <th scope="col">Tác giả</th>
                                   	<th scope="col">Thể loại</th>
                                    <th scope="col">Ngày đăng ký</th>
                                    <th scope="col" class="text-center">Tình trạng</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $doc)

                                	<tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td >{{ $doc->name_doc }}</td>
                                    <td >{{ $doc->user->name }}</td>
                                    <td >{{ typeDoc($doc->type_doc) }}</td>
                                    <td>{{ $doc->created_at }}</td>
                                    <td class="text-center">
                                    	@php
                                    	statusDoc($doc->status, $doc->close , $doc->notice_late);
                                    	@endphp
                                    </td>
                                    <td class="text-center"><a href="{{ route('chitiettailieu',['id'=>$doc->id]) }}"><i class="fas fa-info-circle"></i></a></td>
                                </tr>
                                @endforeach
                                

                            </tbody>
                            
                        </table>
                        
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });

</script>
@endsection
