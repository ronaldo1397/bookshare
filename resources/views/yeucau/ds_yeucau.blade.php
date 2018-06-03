<h3>Yêu cầu mượn sách bạn gửi đi</h3>
<div class="row">
	<div class="col-12">
	@foreach($send as $s)
		@include('yeucau.yeucau_send', ['yeucau' => $s])
	@endforeach
	</div>
</div>
<h3>Yêu cầu mượn sách gửi tới bạn</h3>
<div class="row">
	<div class="col-12">
	@foreach($receive as $r)
		@include('yeucau.yeucau_receive', ['yeucau' => $r])
	@endforeach
	</div>
</div>