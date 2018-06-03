@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Danh sách thể loại
	<div class="row">
		@foreach($theloai as $value)
			<div class="col-4" style="font-size: 20px;	"><a href="{{route('theloai', $value->id)}}">{{ $value->tenloai }}</a> <a class="badge badge-primary" href="{{route('sualoai', $value->id)}}">Sửa</a> <a class="badge badge-danger" href="{{route('xoaloai', $value->id)}}">Xóa</a></div>
		@endforeach
	</div>
	<h3>Thêm thể loại</h3>
	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('themloai')}}">
				@csrf
				<div class="form-group">
					<label for="tenloai">Tên loại<code>*</code></label>
					<input type="text" class="form-control" id="tenloai" name="tenloai" required>
				</div>
				<div class="form-group">
					<label for="mota">Mô tả</label>
					<input type="text" class="form-control" id="mota" name="mota">
				</div>
				<input type="submit" class="btn btn-success" value="Thêm" />
			</form>
		</div>
	</div>
</div>
@endsection