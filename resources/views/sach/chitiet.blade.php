@extends('layouts.app')
<?php 
if($sach->hinhanh == null || $sach->hinhanh == '') {
	$hinhanh = '/images/sach/no.jpg';
} else {
	$hinhanh = $sach->hinhanh;
}

?>
@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col-12 col-md-3">
						@if($sach->tinhtrang <= 0)
			<div class="top-card">
				<div class="badge badge-warning">Chưa duyệt</div>
			</div>
			@endif
			<img class="card-img-top" src="{{$hinhanh}}" alt="{{$sach->tensach}}" />
		</div>
		<div class="col-12 col-md-9">
			<h1>{{$sach->tensach}}</h1>
			<div>Tác giả: <b>{{$tacgia->butdanh}}</b></div>
			<div>Thể loại: 
				@foreach(App\SachTheLoai::where('id_sach', $sach->id)->get() as $theloai)
				<b>{{App\TheLoai::find($theloai->id_theloai)->tenloai}}, </b>
				@endforeach
			</div>
			<div>Giá bìa: <b>{{number_format($sach->giabia)}} VNĐ</b></div>
			<div>Nhà xuất bản: <b>{{$sach->nhaxuatban}}</b></div><br>
			@guest
			@else
				@if(Auth::user()->sohuu($sach->id))
				<a href="{{route('user', ['username' => Auth::user()->username])}}"><button class="btn btn-primary">Quyển sách này đang nằm trong tủ sách của bạn</button></a>
				@else
				@include('sach.modal_themsach', ['sach' => $sach])
				@endif
			@endguest
			<p>{{$sach->mota}}</p>
		</div>
	</div>
	<h2 class="mt-2">Có <b>{{$sach->sohuu}}</b> người sở hữu quyển sách này</h2>
	<div class="row">
		<div class="col-12">
			@foreach($sach->listsohuu as $tusach)
				@include('user.sohuu', ['user' => $tusach->user])
			@endforeach
		</div>
	</div>
</div>
@endsection