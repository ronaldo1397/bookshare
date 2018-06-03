@extends('layouts.app')

@section('content')
<div class="container">
	<h3>{{$theloai->tenloai}}</h3>
	<div class="row">
		@foreach($sachtheloai as $value)
			@if($value->Sach->tinhtrang > 0)
				@include('sach.cuonsach', ['sach'=>$value->Sach])
			@endif
		@endforeach
	</div>
</div>
@endsection