@extends('layouts.app')

@section('content')
<div class="container mt-4">
	<form action="/timsach">
		<input class="form-control form-control-lg" name="key" type="search" placeholder="Tên sách..." value="{{ isset($key) ? $key : ''}}">
	</form>
@if($key == '')
	<div class="mt-2 alert alert-warning">Hãy nhập tên cuốn sách và nhấn Enter!</div>
@else
	@if(isset($sach) && count($sach) > 0)
		<div class="mt-2 alert alert-success">Tìm thấy <b>{{count($sach)}}</b> sách có tên "<b>{{$key}}</b>"</div>
		<div class="row">
			
		</div>
	@else
		<div class="mt-2 alert alert-warning">Không tìm thấy sách có tên "<b>{{$key}}</b>". Hãy kiểm tra lại xem bạn nhập đúng tên chưa nhé!</div>
	@endif
	@guest
	<div class="mt-2 alert alert-primary">Hãy <b><a href="{{route('login')}}">Đăng nhập</a></b> để có thể thêm cuốn sách này</div>
	@else	
		<div class="mt-2 alert alert-info">Bạn có cuốn sách "<b>{{$key}}</b>" nhưng không tìm thấy ở trên? Hãy nhập thông tin ở mẫu dưới đây!</div>
		<div class="card">
			<h5 class="card-header">Thêm sách vào tủ sách của bạn!</h5>
			<div class="card-body">
				<form method="POST">
					@csrf
					<div class="form-group">
						<label for="tensach">Tên sách<code>*</code></label>
						<input type="text" class="form-control" id="tensach" name="tensach" value="{{$key}}" required>
					</div>
					<div class="form-group">
						<label for="tacgia">Tác giả<code>*</code></label>
						<input type="text" class="form-control" id="tacgia" name="tacgia" required>
					</div>
					<div class="form-group">
						<label for="NXB">Nhà xuất bản<code>*</code></label>
						<input type="text" class="form-control" id="NXB" name="nxb" required>
					</div>
					<div class="form-group">
						<label for="giabia">Giá bìa <i>(Vd: 50000)</i></label>
						<input type="number" min="0" class="form-control" id="giabia" name="giabia" value="50000">
					</div>
					<div class="form-group">
						<label for="theloai">Thể loại</label>
						<div id="theloai">
							@foreach(App\TheLoai::all() as $theloai)
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" id="theloai-{{$theloai->id}}" name="theloai[]" value="{{$theloai->id}}" class="custom-control-input">
								  	<label class="custom-control-label" for="theloai-{{$theloai->id}}">{{$theloai->tenloai}}</label>
								</div>
							@endforeach
						</div>
					</div>
					<div class="form-group">
						<label for="hinhanh">URL hình ảnh <i>(Hiện tại chưa hỗ trợ upload)</i></label>
						<input type="text" class="form-control" id="hinhanh" name="hinhanh">
					</div>
					<div class="form-group">
						<label for="soluong">Số sách lượng bạn có</label>
						<input type="number" min="1" class="form-control" id="soluong" name="soluong" value="1">
					</div>
					<div class="form-group">
						<label for="hinhthuc">Bạn có muốn cho người khác mượn cuốn sách này?</label>
						<div id="hinhthuc">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" id="hinhthuc-1" name="hinhthuc[]" value="1" class="custom-control-input" checked>
								  	<label class="custom-control-label" for="hinhthuc-1">Cho mượn</label>
								</div>
						</div>
					</div>
					<div class="form-group">
						<label for="mota"> Giới thiệu nội dung sách này </label>
						<textarea class="form-control" id="mota" name="mota" cols="40" rows="7"></textarea>
					</div>
					<div class="col-8 d-flex justify-content-end">
						<input type="submit" class="btn btn-success" value="Thêm vào tủ sách" />
					</div>
				</form>
			</div>
		</div>
	@endguest
@endif
</div>
@endsection