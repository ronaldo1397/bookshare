@extends('layouts.app')

@section('content')
<div class="container">
	@include('user.thongtin')
	<div class="row mt-4">
		<div class="col-12">
			<form method="POST">
				@csrf
				<div class="form-group">
					<label for="username">Username<code>*</code></label>
					<input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" required>
				</div>
				<div class="form-group">
					<label for="hoten">Tên hiển thị<code>*</code></label>
					<input type="text" class="form-control" id="hoten" name="hoten" value="{{$user->hoten}}">
				</div>
				<div class="form-group">
					<label for="email">Email<code>*</code></label>
					<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
				</div>
				<div class="form-group">
					<label for="facebook">Trang facebook</label>
					<input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->facebook}}">
				</div>
				<div class="form-group">
					<label for="sdt">Số điện thoại</label>
					<input type="text" class="form-control" id="sdt" name="sdt" value="{{$user->sdt}}">
				</div>
				<div class="form-group">
					<label for="anhdaidien">URL Ảnh đại diện <i>(Hiện tại chưa hỗ trợ upload)</i></label>
					<input type="text" class="form-control" id="anhdaidien" name="anhdaidien" value="{{$user->anhdaidien}}">
				</div>
				<div class="form-group">
					<label for="newpassword">Mật khẩu mới (Bỏ trống nếu không thay đổi)</label>
					<input type="password" class="form-control" id="newpassword" name="newpassword">
				</div>
				<div class="form-group">
					<label for="confirm_newpassword">Nhập lại mật khẩu mới</label>
					<input type="password" class="form-control" id="confirm_newpassword" name="confirm_newpassword">
				</div>
				<div class="form-group">
					<label for="password">Mật khẩu cũ (Bỏ trống nếu không đổi mật khẩu)</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
			<div class="col-8 d-flex justify-content-end">
				<input type="submit" class="btn btn-success" value="Cập nhật" />
			</div>
			</form>
		</div>
	</div>
</div>
@endsection