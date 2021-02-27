
@if(isset($id_topic) && !isset($id_doc))
<div style="text-align: center;">
<h1>Xét duyệt đơn đăng ký đề tài khoa học</h1>
<img width="200px" src="https://ut.edu.vn/public/img/images/Tin2017/7-11%20Nhan%20dien%20thuong%20hieu.jpg">
<br/>
<h3>Đề tài đăng ký:{{$name_topic}}</h3>
<h4>Tin nhắn:{{$mess}}</h4>
<br>
<a href="{{ url('xet-duyet',$id_topic) }}">Chi tiết đề tài</a>
</div>
@elseif(isset($id_doc))
<div style="text-align: center;">
<h1>Xét duyệt đơn đăng ký biên soạn tài liệu giảng dạy</h1>
<img width="200px" src="https://ut.edu.vn/public/img/images/Tin2017/7-11%20Nhan%20dien%20thuong%20hieu.jpg">
<br/>
<h3>Tài liệu đăng ký:{{$name_doc}}</h3>
<h4>Tin nhắn:{{$mess}}</h4>
<br>
<a href="{{ url('xet-duyet-tai-lieu',$id_doc) }}">Chi tiết tài liệu</a>
</div>
@endif


            