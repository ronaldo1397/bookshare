<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\YeuCau;
use App\Sach;
use Illuminate\Http\Request;

class YeuCauController extends Controller
{
	public function index(Request $request, $id) {
		if(isset($request->huy)) {
			return $this->huy($id);
		} else if(isset($request->dongy)) {
			return $this->dongy($id);
		} else if(isset($request->tuchoi)) {
			return $this->tuchoi($id);
		} else if(isset($request->traosach)) {
			return $this->traosach($id);
		} else if(isset($request->trasach)) {
			return $this->trasach($id);
		} else {
			return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
		}
	}
    public function huy($id) {
    	$yeucau = YeuCau::find($id);
    	if($yeucau) {
    		if(Auth::id() == $yeucau->id_user_send) {
    			$yeucau->tinhtrang = -2;
    			$yeucau->updated_at = date('Y-m-d H:i:s',time());
    			$yeucau->save();
	    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã hủy thành công yêu cầu!']))->with('traodoi', 'true');
    		} else {
    		return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
    		}
    	} else {
    		return back()->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Không tồn tại yêu cầu']))->with('traodoi', 'true');
    	}
    }
    public function dongy($id) {
    	$yeucau = YeuCau::find($id);
    	if($yeucau) {
    		if(Auth::id() == $yeucau->id_user_receive) {
    			$user = User::find($yeucau->id_user_send);
    			$sach = Sach::find($yeucau->id_sach);
    			$yeucau->tinhtrang = 1;
    			$yeucau->updated_at = date('Y-m-d H:i:s',time());
    			$yeucau->save();
	    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã đồng ý cho <b>'.$user->linkfull.'</b> mượn '.$sach->link.' !']))->with('traodoi', 'true');
    		} else {
    		return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
    		}
    	} else {
    		return back()->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Không tồn tại yêu cầu']))->with('traodoi', 'true');
    	}
    }
    public function tuchoi($id) {
    	$yeucau = YeuCau::find($id);
    	if($yeucau) {
    		if(Auth::id() == $yeucau->id_user_receive) {
    			$user = User::find($yeucau->id_user_send);
    			$sach = Sach::find($yeucau->id_sach);
    			$yeucau->tinhtrang = -1;
    			$yeucau->updated_at = date('Y-m-d H:i:s',time());
    			$yeucau->save();
	    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã từ chối cho <b>'.$user->linkfull.'</b> mượn '.$sach->link.'!']))->with('traodoi', 'true');
    		} else {
    		return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
    		}
    	} else {
    		return back()->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Không tồn tại yêu cầu']))->with('traodoi', 'true');
    	}
    }
    public function traosach($id) {
    	$yeucau = YeuCau::find($id);
    	if($yeucau) {
    		if(Auth::id() == $yeucau->id_user_receive) {
    			$user = User::find($yeucau->id_user_send);
    			$sach = Sach::find($yeucau->id_sach);
    			$yeucau->tinhtrang = 2;
    			$yeucau->updated_at = date('Y-m-d H:i:s',time());
    			$yeucau->save();
	    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã đưa sách '.$sach->link.' cho <b>'.$user->linkfull.'</b>!']))->with('traodoi', 'true');
    		} else {
    		return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
    		}
    	} else {
    		return back()->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Không tồn tại yêu cầu']))->with('traodoi', 'true');
    	}
    }
    public function trasach($id) {
    	$yeucau = YeuCau::find($id);
    	if($yeucau) {
    		if(Auth::id() == $yeucau->id_user_receive) {
    			$user = User::find($yeucau->id_user_send);
    			$sach = Sach::find($yeucau->id_sach);
    			$yeucau->tinhtrang = 3;
    			$yeucau->updated_at = date('Y-m-d H:i:s',time());
    			$yeucau->save();
	    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã xác nhận <b>'.$user->linkfull.'</b> trả '.$sach->link.' !']))->with('traodoi', 'true');
    		} else {
    		return back()->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Bạn không có quyền thực hiện hành động này!']))->with('traodoi', 'true');
    		}
    	} else {
    		return back()->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Không tồn tại yêu cầu']))->with('traodoi', 'true');
    	}
    }
}
