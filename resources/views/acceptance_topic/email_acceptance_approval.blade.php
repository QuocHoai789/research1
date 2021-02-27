<div style="text-align: center;">
    <h1>Thẩm định nghiệm thu đề tài cấp trường</h1>
    <img width="200px" src="https://ut.edu.vn/public/img/images/Tin2017/7-11%20Nhan%20dien%20thuong%20hieu.jpg">
    <br/>
    <h3>Đề tài nghiệm thu:{{$name_topic}}</h3>
    <h4>Tin nhắn:{{$mess}}</h4>
    <h4>
        @isset($files)
        @foreach($files as $key => $item)
        <a href="{{ route('downloadfilenghiemthutailieu',[$id_topic, $key]) }}">
            <p style="font-size:16px" >
                <span>File {{++$key}} :</span>
                <span class="text-primary">{{ $item['filename'] }}</span>
            </p>
    
    </a>
    @endforeach
            
        @endisset
    </h4>
    <br>
    <a href="{{ url('danh-gia-nghiem-thu-de-tai',$id_topic) }}">Chi tiết </a>
    </div>