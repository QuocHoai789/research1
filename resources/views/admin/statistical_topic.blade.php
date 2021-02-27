@extends('master_admin')
@section('content_admin')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
    	 <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thống kê đề tài</h2>
                    <p class="pageheader-text">.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"
                                        class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thống kê đề tài</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                	<h5 class="card-header">Thống kê đề tài</h5>

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
                                          <th scope="col">Tên đề tài</th>
                                          <th scope="col">Người đăng ký</th>
                                          {{-- <th scope="col">Thể loại</th> --}}
                                          <th scope="col" class="text-center">Thời gian đăng ký</th>
                                          <th scope="col" class="text-center">Tình trạng</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                       @foreach ($all_topic as $key => $topic)
                                       <tr>
                                        {{-- <th scope="row">{{$i++}}</th> --}}
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $topic->name_topic }}</td>
                                        <td class="text-center">{{ $topic->user->name }}</td>
                                        {{-- <td class="text-center">{{ typeTopic($topic->type_topic) }}</td> --}}
                                        <td class="text-center">
                                          {{ getYear($topic->created_at) }}
                                        </td>
                                        <td class="text-center">
                                          {{
                                         statusTopic($topic->status, $topic->close, $topic->notice_late )
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
                @if($da['value']!=0)
                { value: {{ $da['value'] }}, label: "{{ $da['label'] }}" },
                @endif
                @endforeach
                ],

                labelColor: '#2e2f39',
                   gridTextSize: '14px',
                colors: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#dc3545",
                    "#212529",
                    "#17a2b8",
                    "#cc9634",
                    "#21ae41",
                    "#ff0000"

                ],

                formatter: function(x) { return x + "%" },
                  resize: true
            });
        }

    });

})(window, document, window.jQuery);
    </script>

@endsection

