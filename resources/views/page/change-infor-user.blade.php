@extends('master')
@section('content')
    <section class="post bg0 p-t-120">
        <div class="container">
            <div class="row p-t-30">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card ">
                        <form class="p-t-30" method="post" action="{{ route('post_changeInformationUser') }}">
                            @csrf
                            <h3 class="text-center">Cập nhật thông tin cá nhân</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
                                    <label class="font-weight-bold" for="new_username" style="width: 200px;">Họ và
                                        tên</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <input type="text" style="width: 500px" placeholder="Cập nhật họ và tên mới"
                                        class="form-control" name="new_username" id="new_username"
                                        value="{{ $infor_user['name'] }}">
                                </div>
                            </div>

                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
                                    <label class="font-weight-bold" for="new_email" style="width: 200px;">Email</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <input type="text" style="width: 500px" placeholder="Cập nhật email mới"
                                        class="form-control" name="new_email" id="new_email"
                                        value="{{ $infor_user['email'] }}">
                                </div>
                            </div>

                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
                                    <label class="font-weight-bold" for="new_phone" style="width: 200px;">Số điện
                                        thoại</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <input type="text" style="width: 500px" placeholder="Cập nhật số điện thoại mới"
                                        class="form-control" name="new_phone" id="new_phone"
                                        value="{{ $infor_user['phone_number'] }}">
                                </div>
                            </div>

                            
                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
                                    <label class=" font-weight-bold" for="new_more_information" style="width: 200px;">Đơn vị
										công tác
									</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <select style="width: 495px" class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                        name="new_work_unit_id">
                                        @foreach ($list_unit as $unit)
                                            <option value="{{ $unit->id }}" @if ($infor_user->workunit->id == $unit->id) selected
                                        @endif required>{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
							</div>
							
							<div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
									<label class=" font-weight-bold" for="new_degree" style="width: 200px;">
										Học vị
									</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <select style="width: 495px" class="custom-select mr-sm-2" id="inlineFormCustomSelect"
										name="new_degree" required>
										<option value="" required>--Chọn học vị--</option>
										<option value="1" @if($infor_user['degree'] == 1) selected @endif  required>Kỹ sư</option>
										<option value="2" @if($infor_user['degree'] == 2) selected @endif required>Thạc sĩ </option>
										<option value="3" @if($infor_user['degree'] == 3) selected @endif required>Tiến sĩ</option>
                                    </select>
                                </div>
                            </div>
							<div class="form-group row d-flex justify-content-center">
                                <div class="col-md-6 d-flex justify-content-start" style="">
                                    <label class=" font-weight-bold" for="new_more_information" style="width: 200px;">Thông
                                        tin thêm</label>
                                </div>

                            </div>
                            <div class="form-group row  d-flex justify-content-center">

                                <div class="col-sm-10 d-flex justify-content-center">
                                    <textarea name="new_more_information" id="new_more_information"
                                        style="width: 500px;height: 80px ; border: 1px solid #49505745"
                                        placeholder="Thêm thông tin khác">{{ $infor_user['more_user_information'] }}</textarea>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button class="btn btn-danger m-2" style="width: 150px" id="turnback">Quay lại</button>
                                    <button class="btn btn-primary m-2" style="width: 150px"
                                        id="submit_new_user_password">Cập nhật</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#turnback').on('click', function(e) {
                event.preventDefault(e);
                window.location = "{{ route('trangchu') }}";
            });
        })

    </script>
@endsection
