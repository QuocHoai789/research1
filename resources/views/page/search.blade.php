@extends('master')
@section('content')
	<!-- Post -->
	<section class="post bg0 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-12">

					<div class="p-r-10 p-rl-0-sr991 p-b-20">

						<!-- Entertainment  -->
						<div class="p-b-25">
							<div class="how2 how2-cl1 flex-s-c">
								<h3 class="f1-m-2 cl12 tab01-title">
									Thông báo chung
								</h3>
								
                            </div>
                            @if(count($notices)>0)
							<div class="col-12 p-t-10" style="  border: 1px solid #e6e6e6;">
								
								@foreach($notices as $notice)
								<div class="p-t-5" style="border-bottom: 1px solid #e6e6e6;">
									<a href="{{ route('chitietthongbao',$notice->id) }}">{{ $notice->title }}</a>
									<p class="p-t-5">Ngày đăng: {{ date_format($notice->updated_at,'d/m/yy')  }}</p>
								</div>
								@endforeach
								
								
							</div>
							<div>
								{{ $notices->links() }}
							</div>
							@endif
						</div>

					</div>
					
				</div>
				<!-- <div class="col-md-12 col-lg-8">aaaaaaa</div> -->
				<div class="col-md-10 col-lg-12">

					<div class="p-r-10 p-rl-0-sr991 p-b-20">

						<!-- Entertainment  -->
						<div class="p-b-25">
							<div class="how2 how2-cl1 flex-s-c">
								<h3 class="f1-m-2 cl12 tab01-title">
									Danh sách đề tài nghiên cứu khoa học và tài liệu giảng dạy
								</h3>
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="p-r-10 p-rl-0-sr991 p-b-10">

						<!-- Entertainment  -->
						<div class="p-b-10">
							<div class=" flex-s-c">
								<h3 class="f1-m-2  tab01-title" style="color: #1c4792">
									Danh sách đề tài khoa học
								</h3>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row d-flex flex-row bd-highlight mb-3">
				@if( count($topics)>0)
				@foreach($topics as $topic)
				<div class="col-md-6 col-lg-6">

					<div class="flex-wr-sb-s p-t-10">

									<!-- Item post -->
									<div class="m-b-30">

										<div class="p-t-10">
											<h5 class="p-b-5">

													{{ $topic->name_topic  }}

											</h5>

											<p class="f1-s-1 cl6 p-t-5">
												{{ $topic->getRegisterTopic->content_topic  }}
											</p>
											<span class="cl8">

												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													 {{ $topic->user->name }}
												</a>

												<span class="f1-s-3 m-rl-3">
													-
												</span>

												<span class="f1-s-3">
													{{ $topic->created_at }}
												</span>
											</span>
										</div>
									</div>

							</div>

				</div>
				@endforeach
                <div>{{ $topics->links() }}</div>
                @endif
			</div>
			
			
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="p-r-10 p-rl-0-sr991 p-b-10">

						<!-- Entertainment  -->
						<div class="p-b-10">
							<div class=" flex-s-c">
								<h3 class="f1-m-2  tab01-title" style="color: #1c4792">
									Danh sách tài liệu giảng dạy
								</h3>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row d-flex flex-row bd-highlight mb-3">
				@if(count($docs) > 0)
				@foreach($docs as $doc)
				<div class="col-md-6 col-lg-6">

					<div class="flex-wr-sb-s p-t-10">

									<!-- Item post -->
									<div class="m-b-30">

										<div class="p-t-10">
											<h5 class="p-b-5">

													{{ $doc->name_doc  }}

											</h5>


											<span class="cl8">

												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													 {{ $doc->user->name }}
												</a>

												<span class="f1-s-3 m-rl-3">
													-
												</span>

												<span class="f1-s-3">
													{{ $doc->created_at }}
												</span>
											</span>
										</div>
									</div>

							</div>

				</div>
				@endforeach
				<div>{{ $docs->links() }}</div>
				@endif
			</div>
		</div>
	</section>



@endsection
