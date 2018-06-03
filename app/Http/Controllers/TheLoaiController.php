<?php

namespace App\Http\Controllers;
use Auth;
use App\TheLoai;
use App\Sach;
use App\SachTheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function index($id) {
    	$theloai = TheLoai::find($id);
    	$sachtheloai = SachTheLoai::where('id_theloai', $theloai->id)->get();
    	if($theloai) {
    		return view('theloai.index', ['theloai' => $theloai, 'sachtheloai' => $sachtheloai]);
    	} else {
    		redirect('/');
    	}
    }
    public function view() {
    	if(Auth::user()->isAdmin){
    		$theloai = TheLoai::orderBy('updated_at', 'desc')->get();
    		return view('theloai.view', ['theloai'=> $theloai]);
    	} else {
    		return redirect('/');
    	}
    }
    public function insert(Request $request) {
    	if(Auth::user()->isAdmin){
    		$theloai = TheLoai::where('tenloai', $request->tenloai)->get();
    		foreach ($theloai as $key => $value) {
    			if(strtolower($value->tenloai) == strtolower($request->tenloai)) {
    				return back()->with('thongbao', json_encode(['status' => 'warrning', 'message' => 'Thể loại '.$request->tenloai.' đã bị trùng']));
    			}
    		}
    		$theloai = TheLoai::create([
				'tenloai'	=>	$request->tenloai,
				'mota'		=> isset($request->mota) ? $request->mota : ''
			]);
    		return back()->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã thêm thành công']));
    	} else {
    		return redirect('/');
    	}
    }
    public function edit($id) {
    	if(Auth::user()->isAdmin){
    		$theloai = TheLoai::orderBy('updated_at', 'desc')->get();
    		$loai = TheLoai::find($id);
    		if($loai) {
    			return view('theloai.edit', ['theloai' => $theloai, 'loai'=>$loai]);
    		} else {
    			return redirect('/theloai');
    		}
    	} else {
    		return redirect('/theloai');
    	}
    }
    public function update(Request $request, $id) {
    	if(Auth::user()->isAdmin){
    		$loai = TheLoai::find($id);
    		if($loai) {
    			$loai->tenloai = $request->tenloai;
    			$loai->mota =  isset($request->mota) ? $request->mota : '';
    			$loai->updated_at = date('Y-m-d H:i:s',time());
    			$loai->save();
    			return redirect('/theloai')->with('thongbao', json_encode(['status' => 'success', 'message' => 'Đã sửa thành công']));
    		} else {
    			return redirect('/theloai');
    		}
    	} else {
    		return redirect('/theloai');
    	}
    }
    public function delete(Request $request, $id) {
		if(Auth::user()->isAdmin){
		   $theloai = TheLoai::find($id);
		   if($theloai) {
		   		$theloai->delete();
		   }
		   return redirect('/theloai');
    	} else {
    		return redirect('/');
    	}
    }
}
