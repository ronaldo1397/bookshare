@extends('layouts.app')
@section('content')
<div class="container">
	@include('user.thongtin')
	<div class="row mt-2 justify-content-center">
		<div class="col-12">
			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-sachdadang-tab" data-toggle="tab" href="#nav-sachdadang" role="tab" aria-controls="nav-sachdadang" aria-selected="{{session('dadang')}}">Sách đã đăng</a>
				@if(Auth::id() == $user->id)
				<a class="nav-item nav-link" id="nav-sachtraodoi-tab" data-toggle="tab" href="#nav-sachtraodoi" role="tab" aria-controls="nav-sachtraodoi" aria-selected="{{session('traodoi')}}">Trao đổi sách</a>
				@endif
			</div>
		</div>
		<div class="col-12 tab-content" id="nav-tabContent ">
			<!--SACH ĐÃ ĐĂNG-->
			<div class="tab-pane fade show active mt-3" id="nav-sachdadang" role="tabpanel" aria-labelledby="nav-sachdadang-tab">
				<div class="row">
					@if($user->id == Auth::id())
					<div class="col-md-2 col-sm-6">
						<a href="{{route('themsach')}}">
							<div class="btn btn-outline-success w-100 h-100" style="white-space: pre-wrap;">
								<span style="font-size: 30px;">Thêm sách</span>
							</div>
						</a>
					</div>
					@endif
					@if(count($sach) > 0)
						@foreach($sach as $s)
							@if($s->tinhtrang > 0 )
								@include('sach.cuonsach_canhan', ['sach' => $s])
							@elseif($s->tinhtrang == 0 && Auth::id() == $s->id_user)
								@include('sach.cuonsach_canhan', ['sach' => $s])
							@endif
						@endforeach
					@endif
				</div>
			</div>
			@if(Auth::id() == $user->id)
			<!--SÁCH ĐÃ TRAO ĐỔI-->
			<div class="tab-pane fade mt-3" id="nav-sachtraodoi" role="tabpanel" aria-labelledby="nav-sachtraodoi-tab">
				@include('yeucau.ds_yeucau', ['send' => $send, 'receive' => $receive])
			</div>
			@endif
		</div>
	</div>
@endsection