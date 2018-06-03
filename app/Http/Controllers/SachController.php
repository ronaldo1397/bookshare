<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\TacGia;
use App\Sach;
use App\TheLoai;
use App\SachTheLoai;
use App\TuSach;
use App\YeuCau;
use Illuminate\Http\Request;

class SachController extends Controller
{
    public function __construct()
    {
    }
    public function sach($id) {
    	$sach = Sach::find($id);
    	if($sach) {
    		if($sach->tinhtrang == 0 && $sach->id_user != Auth::id()) {
    			return redirect('/')->with('thongbao', json_encode(['status' => 'warning', 'message' => 'Quyển sách này không tồn tại hoặc chưa được duyệt!']));
    		} else {
				$tacgia = TacGia::find($sach->id_tacgia);
	    		return view('sach.chitiet', ['sach' => $sach, 'tacgia' => $tacgia]);
    		}
    	} else {
    		return redirect('/');
    	}
    }
    public function timsach(Request $request) {
    	isset($request->key) ? $key = $request->key : $key =  '';
    	$sach = Sach::where('tensach', 'like', '%'.$key.'%')->get();
    	return view('sach.timsach', ['key' => $key, 'sach' => $sach]);
    }
    public function themsach(Request $request) {
   		if(($request)) {
    		$tensach = $request->tensach;
    		$tacgia = TacGia::insert($request->tacgia)->id;
    		$nxb = $request->nxb;
    		$giabia = (isset($request->giabia) && $request->giabia > 0) ? $request->giabia : 0;
    		$hinhanh = (isset($request->hinhanh) && $request->hinhanh != '') ? $request->hinhanh : null;
    		$theloai = (isset($request->theloai)) ? $request->theloai : array();
    		$mota = (isset($request->mota)) ? $request->mota : '';
    		$soluong = (isset($request->soluong)) ? $request->soluong : 1;
    		$hinhthuc = (isset($request->hinhthuc)) ? json_encode($request->hinhthuc) : '[]';
    		$sach = Sach::create([
    			'tensach' 	=> $tensach,
    			'id_tacgia' => $tacgia,
    			'id_user'	=> Auth::id(),
    			'nhaxuatban'=> $nxb,
    			'giabia'	=> $giabia,
    			'hinhanh'	=> $hinhanh,
    			'mota'		=> $mota,
    			'tinhtrang'	=> 0
    		]);
    		if($sach) {
	    		foreach ($theloai as $key => $value) {
	    			SachTheLoai::create([
	    				'id_sach'		=>	$sach->id,
	    				'id_theloai'	=>	$value,
	    			]);
	    		}
	    		TuSach::create([
	    			'id_user'	=>	Auth::id(),
	    			'id_sach'	=>	$sach->id,
	    			'soluong'	=>	$soluong,
	    			'hinhthuc'	=>	$hinhthuc,
	    		]);
    		}
    		return redirect('/user/'.Auth::user()->username)->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã thêm sách <b>'.$tensach.'</b> vào tủ!']));
    	}
    	return redirect('/');
    }
    public function themvaotu(Request $request, $id) {
    	$sach = Sach::find($id);
    	if($sach) {
    		$soluong = (isset($request->soluong)) ? $request->soluong : 1;
	    	$hinhthuc = (isset($request->hinhthuc)) ? json_encode($request->hinhthuc) : '[]';
	    	$tusach = TuSach::where('id_sach', $id)->where('id_user', Auth::id())->first();
	    	if($tusach) {
	    		if(isset($request->delete)) {
	    			$tusach->delete();
	    			return redirect(route('user', ['username', Auth::user()->username]))->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã xóa <b>'.$sach->tensach.'</b> trong <a href="'.route('user', ['username' => Auth::user()->username]).'">Tủ sách</a> của bạn.']));
	    		} else if(isset($request->save)) {
	    			$tusach->soluong  = $soluong;
	    			$tusach->hinhthuc = $hinhthuc;
	    			$tusach->save();
	    			return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã chỉnh sửa <b>'.$sach->tensach.'</b> trong <a href="'.route('user', ['username' => Auth::user()->username]).'">Tủ sách</a> của bạn.']));
	    		}
	    	} else if(isset($request->add)) {
		    	TuSach::create([
					'id_user'	=>	Auth::id(),
					'id_sach'	=>	$id,
					'soluong'	=>	$soluong,
					'hinhthuc'	=>	$hinhthuc,
			    ]);
		    	return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Bạn đã thêm <b>'.$sach->tensach.'</b> vào <a href="'.route('user', ['username' => Auth::user()->username]).'">Tủ sách</a> của bạn.']));
	    	}
    	} else {
	    	return redirect('/')->with('thongbao', json_encode(['status' => 'danger', 'message' => 'Quyển sách này không tồn tại hoặc đã bị xóa!']));
    	}
    }
    public function muonsach(Request $request, $username, $id) {
    	if(isset($request->muon)) {
    		$user_receive = User::where('username', $username)->first();
    		$sach = Sach::find($id);
    		if(!$user_receive || !$sach) {
    			return redirect('/')->with('thongbao', json_encode(['status'=>'warning', 'message'=>'Người dùng hoặc cuốn sách này không tồn tại!']));
    		} else {
    			$tusach = TuSach::where('id_sach', $id)->where('id_user', $user_receive->id)->first();
    			if(!$tusach) {
    			return redirect('/')->with('thongbao', json_encode(['status'=>'warning', 'message'=> $user_receive->hoten.' không sở hữu quyển sách này!']));
    			}
    		}
    		if(isset($request->loinhan) &&  isset($request->ngaymuon) && isset($request->ngaytra)) {
    			$loinhan = $request->loinhan;
    			$ngaymuon = $request->ngaymuon;
    			$ngaytra = $request->ngaytra;
    			$id_user_send = Auth::id();
    			$yeucau = YeuCau::create([
    				'id_user_send' => $id_user_send,
    				'id_user_receive' => $user_receive->id,
    				'id_sach'	=>	$id,
    				'hinhthuc'	=>	'["1"]',
    				'loinhan'	=> $loinhan,
    				'ngaymuon'	=> $ngaymuon,
    				'ngaytra'	=> $ngaytra,
    				'tinhtrang'	=> 0,
    			]);
    			if($yeucau) {
	    			return back()->with('thongbao', json_encode(['status'=>'success', 'message'=>'Đã gửi yêu cầu mượn <b>'.$sach->tensach.'</b> tới <b>'.$user_receive->hoten.'</b>. Hãy chờ phản hồi từ <b>'.$user_receive->hoten.'</b> nhé!']));
    			} 
    				return redirect('/')->with('thongbao', json_encode(['status'=>'warning', 'message'=>'Không thể cho mượn!']));

    		} else {
    			return redirect('/')->with('thongbao', json_encode(['status'=>'warning', 'message'=>'Thông tin bạn nhập chưa đầy đủ để mượn sách!']));
    		}
    	}
    }
}
