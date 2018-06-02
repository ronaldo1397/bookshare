<?php

namespace App\Http\Controllers;
use Auth;
use App\TacGia;
use App\Sach;
use App\TheLoai;
use App\SachTheLoai;
use App\TuSach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    public function __construct()
    {
    }
    public function sach($id) {
    	$sach = Sach::find($id);
    	if($sach) {
    		$tacgia = TacGia::find($sach->id_tacgia);
    		return view('sach.chitiet', ['sach' => $sach, 'tacgia' => $tacgia]);
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
    		$theloai = $request->theloai;
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
}
