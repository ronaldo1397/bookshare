@include('header')

<div class="container">
	<div class="row">
		<div class="col-2 d-flex justify-content-end namepage">
			<a href="trangcanhan.php">
				<div class="rounded-circle avatar" >
					<img src="/images/thithi.jpg " width="100px" />
				</div>
			</a>
		</div>
		<div class="col-10 justify-content-start">
			<div class="nameuser">{{ $user->username }}</div>
			<div>Đang sở hữu <b>{{$user->sosach()}}</b> sách</div>
			<div>Giới thiệu: {{ $user->gioithieu }}</div>
		</div>
	</div>
	@if($user->id == Auth::id())
	<div class="row">
		<div class="col-4">
			<a href="chinhsuacanhan.php">
				<button class="btn btn-success ">Chỉnh sửa trang cá nhân</button>
			</a>
		</div>
		<div class="col-8 d-flex justify-content-end">
			<a href="themsach.php">
			<button class="btn btn-success"> Thêm sách</button>
			</a>
		</div>
	</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-sachdadang-tab" data-toggle="tab" href="#nav-sachdadang" role="tab" aria-controls="nav-sachdadang" aria-selected="true">Sách đã đăng</a>
				<a class="nav-item nav-link" id="nav-sachtraodoi-tab" data-toggle="tab" href="#nav-sachtraodoi" role="tab" aria-controls="nav-sachtraodoi" aria-selected="false">Sách đã trao đổi</a>
			</div>
		</div>
		<div class="col-12 tab-content" id="nav-tabContent ">
			<!--SACH ĐÃ ĐĂNG-->
			<div class="tab-pane fade show active mt-3" id="nav-sachdadang" role="tabpanel" aria-labelledby="nav-sachdadang-tab">
				<div class="row">
					@if(count($sach) > 0)
						@each('sach.cuonsach', $sach, 'sach')
					@else
						<div class="col-12"><div class="alert alert-warning">Chưa có sách nào</div></div>
					@endif
				</div>
			</div>
			<!--SÁCH ĐÃ TRAO ĐỔI-->
			<div class="tab-pane fade mt-3" id="nav-sachtraodoi" role="tabpanel" aria-labelledby="nav-sachtraodoi-tab">
				<div class="row">
					<div class="col-md-2 col-sm-6">
						<div class="card">
							<a href="#">
								<img class="card-img-top" src="book/toilamotconlua.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-md-2 col-sm-6">
						<div class="card">
							<a href="#">
								<img class="card-img-top" src="book/dungbaogiodianmotminh.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-md-2 col-sm-6">
						<div class="card">
							<a href="#">
								<img class="card-img-top" src="book/ngayxuacomotconbo.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-md-2 col-sm-6">
						<div class="card">
							<a href="#">
								<img class="card-img-top" src="book/neubiettramnamlahuuhan.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
					<div class="col-md-2 col-sm-6">
						<div class="card">
							<a href="#">
								<img class="card-img-top" src="book/battredongxanh.jpg" alt="Card image cap">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('footer')