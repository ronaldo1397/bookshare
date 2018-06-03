@guest
@elseif(Auth::id() == $user->id)
<div class="badge badge-success pointer" data-toggle="modal" data-target="#edit_library_{{$sach->id}}">Chỉnh sửa</div>
<!-- Modal -->
<div class="modal fade" id="edit_library_{{$sach->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_library__lable_{{$sach->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form method="POST" action="{{route('sach', ['id' => $sach->id])}}">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="edit_library__lable_{{$sach->id}}">Chỉnh sửa <b>{{$sach->tensach}}</b> trong tủ sách!</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	        	@csrf
				<div class="form-group">
					<label for="soluong">Số <b>{{$sach->tensach}}</b> bạn có</label>
					<input type="number" min="1" class="form-control" id="soluong" name="soluong" value="1">
				</div>
				<div class="form-group">
					<label for="hinhthuc">Bạn có muốn cho người khác mượn cuốn sách này?</label>
					<div id="hinhthuc">
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" id="hinhthuc-1" name="hinhthuc[]" value="1" class="custom-control-input" checked>
							  	<label class="custom-control-label" for="hinhthuc-1">Cho mượn</label>
							</div>
					</div>
				</div>
	      	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		        <input type="submit" name="delete" class="btn btn-danger" value="Xóa khỏi tủ" />
		        <input type="submit" name="save" class="btn btn-primary" value="Thay đổi" />
	      	</div>
  		</form>
    </div>
  </div>
</div>
@endguest