<div class="{{$type}} {{$type}}-success pointer" data-toggle="modal" data-target="#muonsach_{{$user->username}}_{{$sach->id}}">Mượn sách</div>
<!-- Modal -->
<div class="modal fade" id="muonsach_{{$user->username}}_{{$sach->id}}" tabindex="-1" role="dialog" aria-labelledby="muonsach_{{$user->username}}_{{$sach->id}}_lable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="amuonsach_{{$user->username}}_{{$sach->id}}_lable">Mượn <b>{{$sach->tensach}}</b> của {{$user->hoten}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	@guest
	      	<div class="modal-body">
	      		Hãy đăng ký làm thành viên để có thể mượn sách nhé!
	      	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		        <a href="{{route('register')}}" class="btn btn-primary">Đăng ký</a>
	      	</div>
	      	@else
    		<form method="POST" action="{{route('muonsach', ['username' => $user->username, 'id' => $sach->id])}}">
	      	<div class="modal-body">
	        	@csrf
				<div class="form-group">
					<label for="loinhan">Lời nhắn<code>*</code></label>
					<textarea name="loinhan" id="loinhan" class="form-control" rows="4" required></textarea>
				</div>
				<div class="form-group">
					<label for="ngaymuon">Ngày mượn<code>*</code></label>
					<input type="date" class="form-control" id="ngaymuon" name="ngaymuon" required>
				</div>
				<div class="form-group">
					<label for="ngaytra">Ngày trả<code>*</code></label>
					<input type="date" class="form-control" id="ngaytra" name="ngaytra" required>
				</div>
	      	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
		        <input type="submit" class="btn btn-primary" name="muon" value="Mượn" />
	      	</div>
  			</form>
  			@endguest
    </div>
  </div>
</div>