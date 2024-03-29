@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
       <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thống kê biên soạn tài liệu</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thống kê biên soạn tài liệu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                  <h5 class="card-header">Thống kê biên soạn tài liệu</h5>
                  
                  <div class="card-body" id="product-cart">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"> </h5>
                                <div class="card-body">
                                    <div id="morris_donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                         <div class="table-responsive">
                                      <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Tên tài liệu</th>
                                          <th scope="col">Người đăng ký</th>
                                          <th scope="col">Thể loại</th>
                                          <th scope="col" class="text-center">Thời gian đăng ký</th>
                                          <th scope="col" class="text-center">Tình trạng</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                       @foreach ($all_doc as $key => $doc)
                                       <tr>
                                        {{-- <th scope="row">{{$i++}}</th> --}}
                                        <td >{{ $key + 1 }}</td>
                                        <td >{{ $doc->name_doc }}</td>
                                        <td >{{ $doc->user->name }}</td>
                                        <td >{{ typeDoc($doc->type_doc) }}</td>
                                        <td >
                                          {{ getYear($doc->created_at) }}
                                        </td>
                                        <td class="text-center">
                                          {{  
                                         statusDoc($doc->status, $doc->close, $doc->notice_late )
                                         }}
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
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
                  $('select').selectize({
                    sortField: 'text'
                  });
                });


  (function(window, document, $, undefined) {
    "use strict";
    $(function() {
        if ($('#morris_donut').length) {
            Morris.Donut({
                element: 'morris_donut',
                data: [
                @foreach ($data as $da)
                { value: {{ $da['value'] }}, label: '{{ $da['label'] }}' }, 
                @endforeach
                ],
             
                labelColor: '#2e2f39',
                   gridTextSize: '14px',
                colors: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750"
                               
                ],

                formatter: function(x) { return x + "%" },
                  resize: true
            });
        }

    });

})(window, document, window.jQuery);
    </script>

@endsection

