<?php 
if(isset($user))
{
	$icon = '/images/icon/icon-user-you.png';
	if($user->anhdaidien != '' || $user->anhdaidien != null ) {
		$icon = $user->anhdaidien;
	}
	$hinhthuc = json_decode($tusach->hinhthuc);
?>
<div class="row mt-1 pb-1 border border-top-0 border-right-0 border-left-0">
	<div class="col-2 d-flex justify-content-end ">
	@include('user.avatar', ['user', $user])
	</div>
	<div class="col-10 justify-content-start">
		<div style="font-size: 30px;">{{$user->hoten}}  <a href="{{route('user', ['username' => $user->username])}}">{{ '@'.$user->username }}</a></div>
		<div>Đang sở hữu <b>{{$user->sohuu($sach->id)}}</b> cuốn sách <b>{{$sach->tensach}}</b></div>
		<div>
			@if(Auth::id() != $user->id)
				@foreach($hinhthuc as $ht)
					@include('sach.modal_chomuon', ['type' => 'btn'])
				@endforeach
			@endif
		</div>
	</div>
</div>
<?php
}
?>