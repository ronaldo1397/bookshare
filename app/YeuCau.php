<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Sach;
class YeuCau extends Model
{
	protected $fillable = [
        'id_user_send', 'id_user_receive', 'id_sach', 'hinhthuc', 'loinhan', 'ngaymuon', 'ngaytra', 'tinhtrang',
    ];
    protected $table = 'yeucau';
    public function getuserSendAttribute() {
    	return User::find($this->id_user_send);
    }
    public function getuserReceiveAttribute() {
    	return User::find($this->id_user_receive);
    }
    public function getsachAttribute() {
    	return Sach::find($this->id_sach);
    }
    public function gettinhtrangmuonAttribute() {
    	if($this->tinhtrang == -2) { 
    		return '<span style="font-size: 15px;" class="badge badge-dark">Đã hủy</span>';
    	} else if($this->tinhtrang == -1) { 
    		return '<span style="font-size: 15px;" class="badge badge-secondary">Từ chối cho mượn</span>';
    	} else if($this->tinhtrang == 0) {
    		return '<span style="font-size: 15px;" class="badge badge-warning">Đang chờ...</span>';
    	} else if($this->tinhtrang == 1){
    		return '<span style="font-size: 15px;" class="badge badge-primary">Đã đồng ý</span>';
    	} else if($this->tinhtrang == 2) {
    		$now = time();
    		$quahan = strtotime($this->ngaytra) - $now;
    		if($quahan > 0) { 
    			return '<span style="font-size: 15px;" class="badge badge-success">Đã cho mượn</span>';
    		} else {
    			return '<span style="font-size: 15px;" class="badge badge-danger">Quá hạn trả sách</span>';
    		}
    	} else if($this->tinhtrang == 3) {
			return '<span style="font-size: 15px;" class="badge badge-info">Đã trả</span>';
    	}
    }
    public function getmuonAttribute() {
    	return date('d \t\h\g m, Y', strtotime($this->ngaymuon));
    }
    public function gettraAttribute() {
    	return date('d \t\h\g m, Y', strtotime($this->ngaytra));
    }
    public function getactionSendAttribute() {
    	if($this->tinhtrang == -1 || $this->tinhtrang == -2) {
			return '<a href="'.route('sach', ['id' => $this->id_sach]).'" class="btn btn-info">Gửi yêu cầu khác</a>';
    	} else if($this->tinhtrang == 0) {
    		return '<input type="submit" class="btn btn-danger" name="huy" value="Hủy yêu cầu" />';
    	} else if($this->tinhtrang == 1 || $this->tinhtrang == 2) {
    		if($this->tinhtrang == 1) {
	    		$return = '<div style="font-size: 15px;" class="badge badge-primary">Liên hệ để mượn sách</div>';
    		} else {
    			$return = '<div style="font-size: 15px;" class="badge badge-danger">Liên hệ để trả sách</div>';
    		}
    		$return .= '<div>SĐT: '.$this->getuserReceiveAttribute()->sdt.'</div>';
    		$return .= '<div>Email: '.$this->getuserReceiveAttribute()->email.'</div>';
    		$return .= '<div>Facebook: '.$this->getuserReceiveAttribute()->facebook.'</div>';
    		return $return;
    	}
    }
    public function getactionReceiveAttribute(){
        $thongtinnguoimuon = '<div style="font-size: 15px;" class="badge badge-danger">Thông tin người mượn</div>';
        $thongtinnguoimuon .= '<div>SĐT: '.$this->getuserSendAttribute()->sdt.'</div>';
        $thongtinnguoimuon .= '<div>Email: '.$this->getuserSendAttribute()->email.'</div>';
        $thongtinnguoimuon .= '<div>Facebook: '.$this->getuserSendAttribute()->facebook.'</div>';
    	if($this->tinhtrang == -1) {
            return $thongtinnguoimuon.'<button class="btn btn-secondary">Đã từ chối</button>';
        } else if($this->tinhtrang == 0) {
            return $thongtinnguoimuon.'<input type="submit" class="btn btn-success" name="dongy" value="Đồng ý cho mượn" /> <input type="submit" class="btn btn-danger" name="tuchoi" value="Từ chối" />';
        } else if($this->tinhtrang == 1) {
            return $thongtinnguoimuon.'<input type="submit" class="btn btn-success" name="traosach" value="Đã trao sách" /> <input type="submit" class="btn btn-danger" name="tuchoi" value="Từ chối" />';
        } else if($this->tinhtrang == 2) {
            return $thongtinnguoimuon.'<input type="submit" class="btn btn-success" name="trasach" value="Đã trả sách" />';
        }
    }
}
