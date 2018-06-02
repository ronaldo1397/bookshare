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
		<div class="col-3">
			<img class="card-img-top" src="{{$hinhanh}}" alt="{{$sach->tensach}}">
		</div>
		<div class="col-9">
			<h1>{{$sach->tensach}}</h1>
			<div>Tác giả: <b>{{$tacgia->butdanh}}</b></div>
			<div>Giá bìa: <b>{{number_format($sach->giabia)}} VNĐ</b></div>
			<div>Nhà xuất bản: <b>{{$sach->nhaxuatban}}</b></div><br>
			<button class="btn btn-success">Thêm vào tủ sách</button>
			<p>{{$sach->mota}}</p>
		</div>
	</div>
	<h2>Có <b>{{$sach->sohuu}}</b> người sở hữu quyển sách này</h2>
	<div class="row">
		
	</div>
</div>
@endsection