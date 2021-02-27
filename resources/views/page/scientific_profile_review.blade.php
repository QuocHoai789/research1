@extends('master')
@section('content')
    <section class="post bg0 p-t-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <div class="p-r-10 p-rl-0-sr991 p-b-20">
                        <div class="p-b-25">
                            <div class="how2 how2-cl1 flex-s-c">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Lý lịch khoa học
                                </h3>
                            </div>
                            @if (Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-12 text-right p-3">
                                    <a class="btn btn-primary" href="{{ route('chinhsuadetaichunhiemdetai') }}"
                                        role="button">Chỉnh sửa</a>
                                    <a class="btn btn-info" href="{{ route('downloaddetaichunhiemdetai') }}"
                                        role="button">Tải
                                        xuống</a>
                                </div>
                            </div>
                            <div class="p-t-15 page" id="page-download">
                                <div class="row font-110">
                                    <div class="col-6 text-center">
                                        <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
                                        <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                            <br />tp.hồ chí minh
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                    <div class="col-6 text-center">
                                        <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                        </p>
                                        <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                            phúc
                                        </p>
                                        <hr class="hr-short">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="text-uppercase title-page">lý lịch khoa học</p>
                                    </div>
                                </div>
                                <div class="page-content font-110">
                                    <div class="row">
                                        <div class="col-8">
                                            <p><span class="title-field-bold">1. Họ và tên:</span> <span
                                                    class="text-uppercase">{{ $data->name }}</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p><span class="title-field-bold">2. Nam/Nữ:</span> <span
                                                    class="text-capitalize">
                                                    @if ($data->gender == 1)
                                                        {{ 'nam' }}
                                                    @elseif($data->gender==0)
                                                        {{ 'Nữ' }}
                                                    @endif
                                                </span></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <p><span class="title-field-bold">3. Năm sinh:
                                                </span><span>{{ date('d/m/Y', strtotime($data->birthday)) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p><span class="title-field-bold">4. Nơi sinh:</span> <span
                                                    class="text-capitalize">{{ $data->birthplace }}</span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <p><span class="title-field-bold">5. Học hàm:
                                                </span><span>@isset($academic->name)
                                                    {{ $academic->name }}@endisset</span></p>
                                        </div>
                                        <div class="col-4">
                                            <p><span class="title-field">Năm được phong hàm:</span> <span
                                                    class="text-capitalize">@isset($academic->time){{ $academic->time }}@endisset</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <p><span class="title-field-bold">6. Học vị: </span>
                                                <span class="text-capitalize">{{ $degree->name }}</span>
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p><span class="title-field">Năm đạt học vị:</span> <span
                                                    class="text-capitalize">{{ $degree->time }}</span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">7. Chức vụ hiện nay:</span> <span
                                                    class="text-capitalize">{{ $data->position }}</span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">8. Liên lạc:</span></p>
                                        </div>
                                        <div class="col-12 pl-5">
                                            <div class="row">
                                                <div class="col">
                                                    <p><span class="title-field">Địa chỉ: {{ $contact->address }}</span>
                                                        <span class="text-capitalize"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p><span class="title-field">Điện thoại:
                                                            {{ $contact->phoneNumber }}</span> <span
                                                            class="text-capitalize"></span></p>

                                                </div>
                                                <div class="col">
                                                    <p><span class="title-field">Email:{{ $contact->email }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">9. Đơn vị công tác hiện nay:</span>
                                            <p>
                                        </div>
                                        <div class="col-12 pl-5">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><span class="title-field">Tên cơ quan:
                                                            {{ $workPlace->nameAgency }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><span class="title-field">Điện thoại:
                                                            {{ $workPlace->phoneNumber }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><span class="title-field">Fax:
                                                            {{ $workPlace->fax }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><span class="title-field text-capitalize">Địa chỉ:
                                                            {{ $workPlace->address }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><span class="title-field">Website:
                                                            {{ $workPlace->website }}</span> <span
                                                            class="text-capitalize"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">10. Quá trình đào tạo:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>Bậc đào tạo</th>
                                                        <th>Nơi đào tạo</th>
                                                        <th>Chuyên môn</th>
                                                        <th>Năm tốt nghiệp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Đại học</td>
                                                        <td class="text-capitalize">
                                                            {{ $eduProcess->university->address }}
                                                        </td>
                                                        <td>{{ $eduProcess->university->specialize }}</td>
                                                        <td>{{ $eduProcess->university->time }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thạc sĩ</td>
                                                        <td class="text-capitalize">{{ $eduProcess->master->address }}
                                                        </td>
                                                        <td>{{ $eduProcess->master->specialize }}</td>
                                                        <td>{{ $eduProcess->master->time }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tiến sĩ</td>
                                                        <td class="text-capitalize">{{ $eduProcess->doctor->address }}
                                                        </td>
                                                        <td>{{ $eduProcess->doctor->specialize }}</td>
                                                        <td>{{ $eduProcess->doctor->time }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Văn bằng 2</td>
                                                        <td class="text-capitalize">{{ $eduProcess->intern->address }}
                                                        </td>
                                                        <td>{{ $eduProcess->intern->specialize }}</td>
                                                        <td>{{ $eduProcess->intern->time }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">11. Ngoại ngữ:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">Thứ tự</th>
                                                        <th>Tên ngoại ngữ</th>
                                                        <th class="w20">Trình độ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($language)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($language as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td class="text-capitalize">
                                                                    {{ $item->name }}
                                                                </td>
                                                                <td>{{ $item->level }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p>
                                                <span class="title-field-bold">12. Quá trình công tác:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>Thời gian(Từ năm đến năm)</th>
                                                        <th>Vị trí công tác</th>
                                                        <th>Lĩnh vực chuyên môn</th>
                                                        <th>Đơn vị/Cơ quan công tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($workProcess)
                                                    @foreach ($workProcess as $item)
                                                        <tr>
                                                            <td>{{ $item->timeBefor }}-{{ $item->timeEnd }}</td>
                                                            <td>{{ $item->workplace }}</td>
                                                            <td>{{ $item->specialize }}</td>
                                                            <td class="text-capitalize">{{ $item->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">13. Các lĩnh vực chuyên môn và hướng nghiên
                                                    cứu:</span>
                                            <p>
                                        </div>
                                        <div class="row pl-3 pb-1">
                                            <div class="col-12">
                                                <p><span class="title-field-bold">13.1.Lĩnh vực chuyên môn:</span>
                                                <p>
                                                <div class="pl-3">
                                                    <p>- Lĩnh vực: <span>{{ $areasOfExpertise->field }}</span></p>
                                                    <p>- Chuyên ngành:
                                                        <span>{{ $areasOfExpertise->specialized }}</span>
                                                    </p>
                                                    <p>- Chuyên môn:
                                                        <span>{{ $areasOfExpertise->expertise }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row pl-3">
                                                <div class="col-12">
                                                    <p><span class="title-field-bold">13.2.Hướng nghiên cứu:</span>
                                                    <p>
                                                    <div class="pl-3">
                                                        <p>{{ $areasOfExpertise->direction }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14. Hoạt động khoa học và công nghệ và giảng
                                                    dạy</span>
                                            <p>
                                        </div>
                                    </div>
                                    <div class="row pl-3 pb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.1. Đề tài nghiên cứu khoa học đã chủ trì
                                                    hoặc là thành viên:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên đề tài, dự án, nhiệm vụ KH&CN</th>
                                                        <th class="w12">Cấp</th>
                                                        <th>Thời gian</th>
                                                        <th>Chủ nhiệm/ tham gia</th>
                                                        <th>Tình trạng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($topicScience)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($topicScience as $key => $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->level }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->position }}</td>
                                                                <td>{{ $item->status }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row pl-3 pb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.2. Hướng dẫn sinh viên, học viên cao học,
                                                    nghiên cứu sinh:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên sinh viên, học viên cao học, nghiên cứu sinh</th>
                                                        <th>Tên luận văn, luận án</th>
                                                        <th>Năm tốt nghiệp</th>
                                                        <th>Bậc đào tạo</th>
                                                        <th>Sản phẩm của đề tài/ dự án</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($guideStudent)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($guideStudent as $key => $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->nameStudent }}</td>
                                                                <td>{{ $item->nameTopic }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->level }}</td>
                                                                <td>{{ $item->product }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row pl-3 pb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.3.Giáo trình, tài liệu học tập đã chủ
                                                    biên hoặc tham gia:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên sách</th>
                                                        <th>Nhà xuất bản</th>
                                                        <th>Năm xuất bản</th>
                                                        <th>Tác giả/ tham gia</th>
                                                        <th>Số hiệu ISBN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($document)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($document as $key => $item)
                                                            <?php if ($key == 'file') {
                                                            break;
                                                            } ?>
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item['name'] }}
                                                                </td>
                                                                <td>{{ $item['publisher'] }}</td>
                                                                <td>{{ $item['time'] }}
                                                                <td>{{ $item['position'] }}</td>
                                                                <td>{{ $item['code'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                        @isset($document['file'])
                                            <div class="col-12 mt-3 ml-3">
                                                <b>File PDF đính kèm:</b> <a
                                                    href="{{ route('downloadfilepdflylichkhoahoc', ['id' => Auth::user()->id, 'type' => 'document']) }}"
                                                    class="text-success"><i>Giáo trình, tài liệu học tập</i></a>
                                            </div>
                                        @endisset
                                    </div>
                                    <div class="row pl-3 pb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.4.Các bài báo đã công bố:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.4.1. Đăng trên tạp chí:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên tác giả, tên bài viết, tên tạp chí và số tạp chí, trang bài
                                                            viết, năm xuất bản </th>
                                                        <th>Sản phẩm của đề tài/ dự án</th>
                                                        <th class="w20">Số hiệu ISSN</th>
                                                        <th class="w7">Điểm IF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($article)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($article as $key => $item)
                                                            <?php if ($key == 'file') {
                                                            continue;
                                                            } ?>
                                                            @if ($item['on'] == 'journal')
                                                                <tr>
                                                                    <td>{{ ++$stt }}</td>
                                                                    <td class="text-left">
                                                                        {{ $item['nameAuthor'] . ', ' . $item['namePost'] . ', ' . $item['nameEvent'] . ', ' . $item['page'] . ', ' . $item['time'] }}
                                                                    </td>
                                                                    <td>{{ $item['product'] }}</td>
                                                                    <td>{{ $item['code'] }}</td>
                                                                    <td></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 pt-3">
                                            <p><span class="title-field-bold">14.4.2. Đăng trên kỷ yếu hội nghị, hội
                                                    thảo:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên tác giả, tên bài viết, tên hội nghị/hội thảo, trang bài
                                                            viết, năm xuất bản</th>
                                                        <th>Sản phẩm của đề tài/ dự án</th>
                                                        <th class="w20">Số hiệu ISBN</th>
                                                        <th class="w7">Ghi chú</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($article)
                                                    
                                                        <?php $stt = 0; ?>
                                                        @foreach ($article as $key => $item)
                                                            <?php if ($key == 'file') {
                                                            continue;
                                                            } ?>
                                                            @if ($item['on'] == 'seminor')
                                                                <tr>
                                                                    <td>{{ ++$stt }}</td>
                                                                    <td class="text-left">
                                                                        {{ $item['nameAuthor'] . ', ' . $item['namePost'] . ', ' . $item['nameEvent'] . ', ' . $item['page'] . ', ' . $item['time'] }}
                                                                    </td>
                                                                    <td>{{ $item['product'] }}</td>
                                                                    <td>{{ $item['code'] }}</td>
                                                                    <td></td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                        @isset($article['file'])

                                                        <div class="col-12 mt-3 ml-3">
                                                            <b>File PDF đính kèm:</b> <a
                                                                href="{{ route('downloadfilepdflylichkhoahoc', ['id' => Auth::user()->id, 'type' => 'article']) }}"
                                                                class="text-success"><i>Các bài báo đã công bố</i></a>
                                                        </div>
                                                    @endisset
                                    </div>
                                    <div class="row pl-3 pb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">14.5. Hướng dẫn sinh viên (học
                                                    viên cao học,
                                                    nghiên cứu sinh) nghiên cứu khoa học:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7" rowspan="2">STT</th>
                                                        <th rowspan="2">Tên đề tài</th>
                                                        <th rowspan="2">Họ tên sinh viên (HVCH, NCS)</th>
                                                        <th colspan="2">Giải thưởng</th>
                                                        <th rowspan="2">Năm đạt giải</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kết quả</th>
                                                        <th>Cấp thưởng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($studentAwards)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($studentAwards as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->nameTopic }}</td>
                                                                <td class="text-capitalize">
                                                                    {{ $item->nameStudent }}
                                                                </td>
                                                                <td>{{ $item->result }}</td>
                                                                <td>{{ $item->prize }}</td>
                                                                <td>{{ $item->time }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">15. Bằng phát minh, sáng chế:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên và nội dung văn bằng</th>
                                                        <th>Sản phẩm của đề tài, dự án</th>
                                                        <th>Số hiệu</th>
                                                        <th>Năm cấp</th>
                                                        <th>Nơi cấp</th>
                                                        <th>Tác giả/đồng tác giả</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($license)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($license as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->product }}</td>
                                                                <td>{{ $item->code }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->address }}</td>
                                                                <td>{{ $item->author }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">16. Các giải pháp hữu ích:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên và nội dung văn bằng</th>
                                                        <th>Sản phẩm của đề tài, dự án</th>
                                                        <th>Số hiệu</th>
                                                        <th>Năm cấp</th>
                                                        <th>Nơi cấp</th>
                                                        <th>Tác giả/đồng tác giả</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($solution)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($solution as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->product }}</td>
                                                                <td>{{ $item->code }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->address }}</td>
                                                                <td>{{ $item->author }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">17. Ứng dụng thực tiễn và thương mại hóa kết
                                                    quả nghiên cứu:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Tên công nghệ/giải pháp đã chuyển giao</th>
                                                        <th>Hình thức, quy mô, địa chỉ áp dụng</th>
                                                        <th>Năm chuyển giao</th>
                                                        <th>Sản phẩm của đề tài/dự án</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($application)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($application as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->forms }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->product }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">18.Giải thưởng về KH&CN, về chất lượng sản
                                                    phẩm,...:<span>
                                                        <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Hình thức và nội dung giải thưởng</th>
                                                        <th>Nơi tặng</th>
                                                        <th>Năm tặng thưởng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($prize)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($prize as $key => $item)
                                                            <?php if ($key == 'file') {
                                                            continue;
                                                            } ?>
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item['content'] }}</td>
                                                                <td class="text-capitalize">
                                                                    {{ $item['address'] }}
                                                                </td>
                                                                <td>{{ $item['time'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                        @isset($prize['file'])
                                        <div class="col-12 mt-3 ml-3">
                                            <b>File PDF đính kèm:</b> <a
                                                href="{{ route('downloadfilepdflylichkhoahoc', ['id' => Auth::user()->id, 'type' => 'prize']) }}"
                                                class="text-success"><i>Các giải thưởng KH&CN</i></a>
                                        </div>
                                    @endisset
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">19. Tham gia các chương trình trong và ngoài
                                                    nước:</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Thời gian</th>
                                                        <th>Tên chương trình</th>
                                                        <th>Chức danh</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($show)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($show as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->title }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">20. Tham gia các Hiệp hội khoa học, Ban biên
                                                    tập các Tạp chí khoa học, Ban tổ chức các Hội nghị về khoa học và công
                                                    nghệ, các hội thảo/ hội nghị trong nước và quốc tế</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Thời gian</th>
                                                        <th>Tên Hiệp hội/tạp chí/hội nghị</th>
                                                        <th>Chức danh</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($seminorShow)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($seminorShow as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->title }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">21. Tham gia làm việc tại các trường Đại
                                                    học/viện/trung tâm nghiên cứu theo lời mời</span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7">STT</th>
                                                        <th>Thời gian</th>
                                                        <th>Trường đại học/viện/trung tâm nghiên cứu</th>
                                                        <th>Nội dung tham gia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($workUniversity)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($workUniversity as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->content }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p><span class="title-field-bold">22. Kinh nghiệm về quản lý, đánh giá KH&CN
                                                </span>
                                            <p>
                                        </div>
                                        <div class="col-12">
                                            <table class="table-custom">
                                                <thead>
                                                    <tr>
                                                        <th class="w7" rowspan="2">STT</th>
                                                        <th rowspan="2">Tên hội đồng, thời gian họp</th>
                                                        <th rowspan="2">Cấp quản lý</th>
                                                        <th colspan="3">Hình thức tham gia</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Chủ tịch</th>
                                                        <th>Phản biện</th>
                                                        <th>Ủy viên</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($experience)
                                                        <?php $stt = 0; ?>
                                                        @foreach ($experience as $item)
                                                            <tr>
                                                                <td>{{ ++$stt }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->level }}</td>
                                                                <td>{{ $item->forms }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-5 pb-20">
                                        <div class="col-6 text-center pt4">
                                            <p class="title-field-bold m-0">Xác nhận của cơ quan quản lý</p>
                                            <p class="m-0"><i>(Ký tên, đóng dấu)</i></p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="m-0"><i><span class="text-capitalize">Tp. hồ chí
                                                        minh,</span><span>
                                                        ngày &nbsp;&nbsp; tháng &nbsp;&nbsp; năm &nbsp;&nbsp;
                                                    </span></i>
                                            </p>
                                            <p class="title-field-bold m-0">Người khai</p>
                                            <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                        </div>
                                    </div>
                                    <div class="row pb-20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <script type="text/javascript">
            function getPDF() {

                var HTML_Width = $("#page-download").width();
                var HTML_Height = $("#page-download").height();
                var top_left_margin = 15;
                // var PDF_Width = HTML_Width+(top_left_margin*2);
                // var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
                var PDF_Width = 595;
                var PDF_Height = 842;
                var canvas_image_width = PDF_Width - 30;
                var canvas_image_height = HTML_Height;
                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


                html2canvas($("#page-download")[0], {
                    allowTaint: true
                }).then(function(canvas) {
                    canvas.getContext('2d');

                    console.log(canvas.height + "  " + canvas.width);


                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'PNG', top_left_margin, top_left_margin, canvas_image_width,
                        canvas_image_height - 100);


                    for (var i = 1; i <= totalPDFPages; i++) {
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4) -
                            50, canvas_image_width, canvas_image_height - 100);
                    }
                    pdf.save("HTML-Document.pdf");
                });

            };

        </script>
    </section>
@endsection
