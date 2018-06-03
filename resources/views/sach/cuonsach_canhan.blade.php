<div class="col-md-2 col-sm-6">
	<div class="card">
		<a href="/sach/{{$sach->id}}" title="{{$sach->tensach}}">
			<img class="card-img-top" src="{{$sach->img}}" alt="{{$sach->ten}}">
		</a>
		<div class="top-card">
			<div class="badge badge-info">Có {{$user->sohuu($sach->id)}} quyển</div>
			@if($sach->tinhtrang == 0)
			<div class="badge badge-warning">Chưa duyệt</div>
			@endif
			@if(Auth::id() != $user->id)
				@include('sach.modal_chomuon', ['sach' => $sach, 'type' => 'badge'])
			@endif
			@include('sach.modal_chinhsua', ['sach' => $sach])
		</div>
	</div>
</div>