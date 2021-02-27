<div style="text-align: center;">
<h1>Xem lại tài liệu nghiệm thu chỉnh sửa</h1>
<img width="200px" src="https://ut.edu.vn/public/img/images/Tin2017/7-11%20Nhan%20dien%20thuong%20hieu.jpg">
<br/>
<h3>Tài liệu nghiệm thu chỉnh sửa:{{$name_doc}}</h3>
<h4>Tin nhắn:{{$mess}}</h4>
<h4>
    @isset($files)
    @foreach($files as $key => $item)
    <a href="{{ route('downloadfilenghiemthutailieu',[$id_doc, $key]) }}">
        <p style="font-size:16px" >
            <span>File {{++$key}} :</span>
            <span class="text-primary">{{ $item['filename'] }}</span>
        </p>

</a>
@endforeach
        
    @endisset
</h4>
<a href="">Chi tiết </a>
</div>