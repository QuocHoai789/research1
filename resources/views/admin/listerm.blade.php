@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">

    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách học phần biên soạn tài liệu </h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách học phần biên soạn tài liệu</li>
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
                                    <th scope="col">Mã học phần</th>
                                    <th scope="col">Tên học phần</th>
                                    <th scope="col">Số tín chỉ</th>
                                    <th scope="col">Số tiết</th>
                                    <th scope="col">Ngày đăng ký</th>
                                    <th scope="col" class="text-center">Edit/xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terms as $term)
                                	<tr>
                                    <th scope="row">{{$i++}}</th>
                                    
                                    <td>{{ $term->term_id }}</td>
                                    <td>{{ $term->name_term }}</td>
                                    <td>{{ $term->number_of_credits }}</td>
                                    <td>{{ $term->number_of_lessons }}</td>
                                    <td>{{ $term->created_at }}</td>
                                    <td class="text-center">
                                        
                                        <a  href="{{ route('capnhathocphan',['id'=>$term->id]) }}">edit</a>/<a href="{{ route('xoahocphan',['id'=>$term->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?');">xóa</a>
                                        
                                    </td>
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
@endsection