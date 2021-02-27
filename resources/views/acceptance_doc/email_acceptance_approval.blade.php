<div style="text-align: center;">
<h1>Thẩm định nghiệm thu tài liệu biên soạn</h1>
<img width="200px" src="https://ut.edu.vn/public/img/images/Tin2017/7-11%20Nhan%20dien%20thuong%20hieu.jpg">
<br/>
<h3>Tài liệu nghiệm thu:{{$name_doc}}</h3>
<h4>Tin nhắn:{{$mess}}</h4>
<h4>
    @isset($files)
    @foreach($files as $key => $item)
    <a href="{{ route('downloadfilenghiemthudetai',[$id_doc, $key]) }}">
    {{--  <button type="button" class="btn btn-primary" >  --}}
        <p style="font-size:16px" >
            <span>File {{++$key}} :</span>
            <span class="text-primary">{{ $item['filename'] }}</span>
        </p>
    {{--  </button>  --}}
     
</a>
@endforeach
        
    @endisset
</h4>
<br>
<a href="{{ url('danh-gia-nghiem-thu-tai-lieu',$id_doc) }}">Chi tiết </a>
</div>