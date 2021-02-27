<style type="text/css">
    .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    
}
    .title-field-bold {
    font-weight: 600 !important;
}
    dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
li, ul {
    margin: 0;
    list-style-type: none;
}
    .title-field {
    font-weight: 500 !important;
    padding-right: 10px;
}
    .table-custom{
        width: 100%;
        border: 1px solid black;
    }
    .table-custom tr, .table-custom tbody tr td, .table-custom thead tr th {
    border: 1px solid black;
    text-align: center;
    padding: 5px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-9" style="margin: 2rem 10rem 0rem 10rem">
            <a target="_blank" href="{{ route('downloadthuyetminhdetaikhoahoc', $topicM->id) }}"><button class="btn btn-primary col-12 " type="button">Tải xuống</button></a>
        </div>
    </div>
</div>
<div class="p-t-15 page" style="width:794px;margin-top:2rem; margin-bottom:2rem">
    <div class="row font-110">
        <div class="col-6 text-center">
            <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
            <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                <br />tp.hồ chí minh</p>
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
        <div class="col-12 text-center pt-5 pb-5">
            <p class="text-uppercase title-page font-weight-bold">thuyết minh đề tài nghiên cứu khoa học</p>
        </div>
    </div>

    <div class="page-content font-110">

        <div class="row">
            <div class="col-8">
                <p><span class="title-field-bold">1. Tên đề tài:</span> <span
                        class="text-uppercase">{{ $topicM->name_topic }}</span></p>
            </div>
            <div class="col-4">
                <p><span class="title-field-bold">2. Mã số:</span> <span
                        class="text-capitalize">{{ $topicM->id }}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">3. Lĩnh vực nghiên cứu:
                    </span><span>
                        @isset($researchType)
                        {{ implode($researchType, ', ') }}
                       @endisset
                    </span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">4. Loại hình nghiên cứu:
                    </span><span>
                        @isset($researchLevel)
                        {{ implode($researchLevel, ', ')  }}
                        @endisset
                    </span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">5. Thời gian thực hiện:
                    </span><span>
                        @isset($researchTime)
                        Từ 
                            {{ $researchTime->timeBefor }} đến
                        {{ $researchTime->timeEnd }}
                        @endisset
                    </span>
                    </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">6. Đơn vị chủ trì: </span>
            </div>
            <div class="col-12 pl-5">
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Tên đơn
                                vị:</span><span>
                                    @isset($organization->name)
                                    {{ $organization->name }}
                                @endisset
                            </span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Địa
                                chỉ:</span><span>
                                    @isset($organization->address)
                                    {{ $organization->address }}
                                @endisset
                            </span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Điện
                                thoại:</span><span>
                                    @isset($organization->phoneNumber)
                                    {{ $organization->phoneNumber }}
                                @endisset
                            </span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Fax:</span><span>
                            @isset($organization->fax)
                                    {{ $organization->fax }}
                                @endisset</span>
                            </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Email:</span><span>
                            @isset($organization->email)
                                    {{ $organization->email }}
                                @endisset
                            </span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">7. Chủ nhiệm đề tài: </span>
            </div>
            <div class="col-12 pl-5">
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Họ và
                                tên:</span><span>
                                    @isset($topicManager->name)
                                    {{ $topicManager->name }}
                                @endisset
                            </span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Học vị, chức danh
                                KH:</span><span>
                                    @isset($topicManager->degree)
                                    {{ $topicManager->degree }}
                                @endisset
                            </span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Chức
                                vụ:</span><span>
                                    @isset($topicManager->position)
                                    {{ $topicManager->position }}
                                @endisset
                            </span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Địa chỉ cơ
                                quan:</span><span>
                                    @isset($topicManager->addressOrgan)
                                    {{ $topicManager->addressOrgan }}
                                @endisset
                            </span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Địa chỉ nhà
                                riêng:</span><span>
                                    @isset($topicManager->addressHome)
                                    {{ $topicManager->addressHome }}
                                @endisset</span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Điện thoại cơ
                                quan:</span><span>@isset($topicManager->phoneOrgan)
                                    {{ $topicManager->phoneOrgan }}
                                @endisset</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Điện thoại nhà
                                riêng:</span><span>@isset($topicManager->phoneHome)
                                    {{ $topicManager->phoneHome }}
                                @endisset</span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Điện thoại di
                                động:</span><span>@isset($topicManager->phoneMobile)
                                    {{ $topicManager->phoneMobile }}
                                @endisset</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><span class="title-field">Fax:</span><span>@isset($topicManager->fax)
                                    {{ $topicManager->fax }}
                                @endisset</span></p>
                    </div>
                    <div class="col">
                        <p><span class="title-field">Email:</span><span>@isset($topicManager->email)
                                    {{ $topicManager->email }}
                                @endisset</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">8. Những người thực hiện đề tài:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Họ và tên</th>
                            <th>Đơn vị công tác và lĩnh vực chuyên môn</th>
                            <th>Nội dung nghiên cứu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($member)
                            <?php $stt = 0; ?>
                            @foreach ($member as $key => $item)
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->expertise }}</td>
                                    <td>{{ $item->content }}</td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">9. Đơn vị phối hợp chính:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Tên đơn vị trong và ngoài nước</th>
                            <th>Nội dung phối hợp nghiên cứu</th>
                            <th>Họ và tên người đại diện</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($coordination)
                            <?php $stt = 0; ?>
                            @foreach ($coordination as $key => $item)
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->nameUnit }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->nameUser }}</td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">10. Tính cấp thiết của đề tài:</span></p>
                <p class="pl-3"><span>
                        @isset($scientificExplanation->necessity){{ $scientificExplanation->necessity }}@endisset
                    </span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">11. Mục tiêu của đề tài:</span></p>
                <div class="row pl-3">
                    <div class="col-3">11.1. Mục tiêu chung:</div>
                    <div class="col-9">
                        <p class="pl-3"><span>
                                @isset($target->general){{ $target->general }}@endisset
                            </span></p>
                    </div>
                </div>
                <div class="row pl-3">
                    <div class="col-3">11.2. Mục tiêu riêng:</div>
                    <div class="col-9">
                        <p class="pl-3"><span>
                                @isset($target->private){{ $target->private }}@endisset
                            </span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">12. Đối tượng, phạm vi nghiên cứu:</span></p>
                <div class="row pl-3">
                    <div class="col-5">12.1. Đối tượng nghiên cứu:</div>
                    <div class="col-7">
                        <p class="pl-3"><span>
                                @isset($research->object){{ $research->object }}@endisset
                            </span></p>
                    </div>
                </div>
                <div class="row pl-3">
                    <div class="col-5">12.2. Phạm vi nghiên cứu:</div>
                    <div class="col-7">
                        <p class="pl-3"><span>
                                @isset($research->scope){{ $research->scope }}@endisset
                            </span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">13. Các tiếp cận, phương pháp nghiên
                        cứu:</span></p>
                <div class="row pl-3">
                    <div class="col-5">13.1. Cách tiếp cận:</div>
                    <div class="col-7">
                        <p class="pl-3"><span>
                                @isset($research->approach){{ $research->approach }}@endisset
                            </span></p>
                    </div>
                </div>
                <div class="row pl-3">
                    <div class="col-5">13.2. Phương pháp nghiên cứu:</div>
                    <div class="col-7">
                        <p class="pl-3"><span>
                                @isset($research->method){{ $research->method }}@endisset
                            </span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">14. Nội dung nghiên cứu:</span></p>
                <p class="pl-3"><span>
                        @isset($research->content){{ $research->content }}@endisset
                    </span></p>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">15. Tiến độ thực hiện:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Các nội dung, công việc thực hiện</th>
                            <th>Sản phẩm</th>
                            <th>Thời gian</th>
                            <th>Người thực hiện</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($progress)
                            <?php $stt = 0; ?>
                            @foreach ($progress as $key => $item)
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->product }}</td>
                                    <td>{{ $item->timeBefor }} - {{ $item->timeEnd }}</td>
                                    <td>{{ $item->user }}</td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <p><span class="title-field-bold">16. Sản phẩm khoa học:</span></p>
            </div>
            <div class="col-8">
                @isset($productScience)
                    <ul>
                        @foreach ($productScience as $item)
                            <li>- {{ $item }}</li>
                        @endforeach
                    </ul>
                @endisset
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <p><span class="title-field-bold">17. Sản phẩm đào tạo:</span></p>
            </div>
            <div class="col-8">
                @isset($productEducate)
                    <ul>
                        @foreach ($productEducate as $item)
                            <li>- {{ $item }}</li>
                        @endforeach
                    </ul>
                @endisset
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <p><span class="title-field-bold">18. Sản phẩm ứng dụng:</span></p>
            </div>
            <div class="col-8">
                @isset($productApp)
                    <ul>
                        @foreach ($productApp as $item)
                            <li>- {{ $item }}</li>
                        @endforeach
                    </ul>
                @endisset
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">19. Các sản phẩm khác:</span></p>
                <p class="pl-3"><span>
                        @isset($scientificExplanation->product_diff){{ $scientificExplanation->product_diff }}@endisset
                    </span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">20. Hiệu quả:</span></p>
                <p class="pl-3"><span>
                        @isset($scientificExplanation->effective){{ $scientificExplanation->effective }}@endisset
                    </span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><span class="title-field-bold">21. Phương thức chuyển giao kết quả nghiên cứu
                        và địa chỉ ứng dụng:</span></p>
                <p class="pl-3"><span>
                        @isset($scientificExplanation->method){{ $scientificExplanation->method }}@endisset
                    </span></p>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">22. Chi công lao động tham gia trực tiếp thực
                        hiện đề tài:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Nội dung</th>
                            <th>Thời gian trả lương</th>
                            <th>Số ngày công</th>
                            <th>Hệ số</th>
                            <th>Lương cơ bản</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($labor)
                            <?php $stt = 0; ?>
                            @foreach ($labor as $key => $item)
                                <?php if ($key == 'total') {
                                break;
                                } ?>
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ number_format($item->worker) }}</td>
                                    <td>{{ $item->coefficient }}</td>
                                    <td>{{ number_format($item->salary) }}</td>
                                    <td>{{ number_format($item->total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><span class="title-field-bold">Tổng chi phí</span>
                                </td>
                                <td colspan="2">{{ number_format($labor->total) }}</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">23. Chi mua nguyên liệu:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Nội dung</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($resources)
                            <?php $stt = 0; ?>
                            @foreach ($resources as $key => $item)
                                <?php if ($key == 'total') {
                                break;
                                } ?>
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ number_format($item->quantily) }}</td>
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ number_format($item->total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><span class="title-field-bold">Tổng chi phí</span>
                                </td>
                                <td colspan="2">{{ number_format($resources->total) }}</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">24. Chi phí sửa chữa, mua sắm tài sản cố
                        định:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Nội dung</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($repair)
                            <?php $stt = 0; ?>
                            @foreach ($repair as $key => $item)
                                <?php if ($key == 'total') {
                                break;
                                } ?>
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ number_format($item->quantily) }}</td>
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ number_format($item->total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><span class="title-field-bold">Tổng chi phí</span>
                                </td>
                                <td colspan="2">{{ number_format($repair->total) }}</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-12">
                <p><span class="title-field-bold">25. Chi phí khác:</span>
                <p>
            </div>
            <div class="col-12">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th class="w7">STT</th>
                            <th>Nội dung</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($costDiff)
                            <?php $stt = 0; ?>
                            @foreach ($costDiff as $key => $item)
                                <?php if ($key == 'total') {
                                break;
                                } ?>
                                <tr>
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ number_format($item->quantily) }}</td>
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ number_format($item->total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><span class="title-field-bold">Tổng chi phí</span>
                                </td>
                                <td colspan="2">{{ number_format($costDiff->total) }}</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
