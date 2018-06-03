<div class="row  border border-top-0 border-right-0 border-left-0">
	<div class="col-1">
		<a href="{{route('sach', ['id'=> $yeucau->sach->id]) }}"><img src="{{ $yeucau->sach->img }}" width="70px"></a>
	</div>
	<div class="col-4">
		<div>Tên sách: <b>{!!$yeucau->sach->link!!}</b></div>
		<div>Mượn của: {!!$yeucau->userReceive->linkfull!!}</div>
		<div>Lời nhắn: {{$yeucau->loinhan}}</div>
	</div>
	<div class="col-4">
		<div>Tình trạng: {!! $yeucau->tinhtrangmuon !!}</div>
		<div>Ngày mượn: {!! $yeucau->muon !!}</div>
		<div>Ngày trả: {!! $yeucau->tra !!}</div>
	</div>
	<div class="col-3">
		<form method="POST" action="{{route('yeucau', $yeucau->id)}}">
			@csrf
			{!! $yeucau->actionSend !!}
		</form>
	</div>
</div>
