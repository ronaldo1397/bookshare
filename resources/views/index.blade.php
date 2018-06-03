@extends('layouts.app')
@section('content')
<!-- slogan -->
		<div class="container">
			<div class="row">
				<div class="col-12 text-center namepage">SHARE YOUR BOOKS</div>
			</div>
			<div class="row">
				<div class="col-12 text-center slogan">Đây là câu slogan hay hehe....</div>
			</div>
			<div class="row">
				<div class="col-12 text-center ">*❂*❂*</div>
			</div>
		</div>
		<!-- SÁCH NỔI BẬT -->
		<div class="container">
			<h3>Sách nổi bật</h3>
			<div class="row">
				@if(count($sach_noibat) > 0)
					@each('sach.cuonsach', $sach_noibat, 'sach')
				@else
					<div class="col-12"><div class="alert alert-warning">Chưa có sách nào</div></div>
				@endif
			</div>
		</div>
		<!-- SÁCH MỚI -->
		<div class="container">
			<h3>Sách mới</h3>
			<div class="row">
				@if(count($sach_moi) > 0)
					@each('sach.cuonsach', $sach_moi, 'sach')
				@else
					<div class="col-12"><div class="alert alert-warning">Chưa có sách nào</div></div>
				@endif
			</div>
		</div>
		<!-- top user -->
		<div class="container">
			<h3>Top người dùng</h3>
			<div class="row mt-4" >
				@if(count($hinh_user) > 0)
					@each('user.hinhuser', $hinh_user, 'user')
				@else
					<div class="col-12"><div class="alert alert-warning">Chưa có người dùng nào</div></div>
				@endif
			</div>
		</div>
@endsection