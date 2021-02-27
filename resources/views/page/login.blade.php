@extends('master')
@section('content')
<section class="post bg0 p-t-50">
	<div class="container">
		<div class="row justify-content-center">
			<!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
			<div class="col-md-10 col-lg-12">

				<div class="p-r-10 p-rl-0-sr991 p-b-20">

					<!-- Entertainment  -->
					<div class="p-b-25">
						<div class="how2 how2-cl1 flex-s-c">
							<h3 class="f1-m-2 cl12 tab01-title">
								Đăng nhập
							</h3>
						</div>

						<div class="flex-wr-sb-s p-t-35">
							<div class="container">
								<div id="content">
								@if(Session::has('flag'))
											<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
											@endif
									<form action="{{ route('login') }}" method="post" >
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="row">
											<div class="col-sm-5 text-center">
												<img src="cntt/images/icons/logo.png" alt="LOGO">
												<p>Đăng nhập trang nghiên cứu khoa học</p>
											</div>

											<div class="col-sm-6">
												<div class="form-block">
													<label for="msgv">Mã giảng viên:</label>
													<input type="text" name="msgv" id="msgv" class="form-control" style="border-style: ridge;" required>
												</div>
												<div class="space20">&nbsp;</div>
												<div class="form-block">
													<label for="phone">Mật khẩu:</label>
													<input type="password" name="password" class="form-control" id="password" style="border-style: ridge;" required>
												</div>
												<div class="space20">&nbsp;</div>
												<div class="form-block">
													<button type="submit" class="btn btn-primary">Đăng Nhập</button>
												</div>
											</div>
										</div>
									</form>
								</div> <!-- #content -->
							</div> <!-- .container -->
						</div>
					</div>



				</div>
			</div>


		</div>
	</div>
</section>

@endsection
