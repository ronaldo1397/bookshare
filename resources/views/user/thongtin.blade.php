<div class="row mt-4">
	<div class="col-2 d-flex justify-content-end namepage">
		<a href="{{route('user', ['username' => $user->username])}}">
			<div class="rounded-circle avatar" >
				<img src="{{$user->linkavatar}}" width="100px" />
			</div>
		</a>
	</div>
	<div class="col-10 justify-content-start">
		<div class="nameuser">{{ $user->hoten }} ({{ '@'.$user->username }})
			@if($user->id == Auth::id())
					<a class="badge badge-secondary" style="font-size: 13px;" href="{{route('suatrangcanhan', $user->username)}}">Chỉnh sửa</a>
			@endif
		</div>
		<div>Đang sở hữu <b>{{$user->sosach}}</b> cuốn sách</div>
		<div>Giới thiệu: {{ $user->gioithieu }}</div>
	</div>
</div>