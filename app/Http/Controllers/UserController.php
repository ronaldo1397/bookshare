<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Sach;
use App\TuSach;
use App\YeuCau;
use Illuminate\Http\Request;
use App\Rules\CheckUsernameRule;

class UserController extends Controller
{
    public function trangcanhan($username)
    {
    	$user = User::where('username', $username)->first();
    	if($user) {
	    	$tusach = TuSach::where('id_user', $user->id)->orderBy('updated_at', 'desc')->get();
	    	$send = YeuCau::where('id_user_send', $user->id)->orderBy('updated_at', 'desc')->get();
	    	$receive = YeuCau::where('id_user_receive', $user->id)->where('tinhtrang', '>', -2)->orderBy('updated_at', 'desc')->get();
	    	$sach = [];
	    	foreach ($tusach as $key => $value) {
	    		$sach[] = Sach::find($value->id_sach);
	    	}
	    	return view('user.trangcanhan', ['user' => $user, 'sach' => $sach, 'send' => $send, 'receive' => $receive]);
	    } else {
	    	return redirect('/');
	    }
    }
    public function chinhsua($username) {
    	$user = User::where('username', $username)->first();
    	if($user && $user->id == Auth::id()) {
    		return view('user.chinhsua', ['user' => $user]);
    	} else {
			return back();
    	}
    } 
    public function luuthongtin(Request $request, $username) {
    	$validatedData = $request->validate([
	        'username' => ['required','string',new CheckUsernameRule(),'max:50'],
	        'hoten'	=>	'required',
            'email' => 'required|string|email|max:191',
	    ]);
	    $user = User::where('username', $request->username)->first();
	    if($user && $user->username != Auth::user()->username) {
	    	return back()->with('thongbao', json_encode(['status' => 'danger','message'=> 'Username '.$request->username.' đã tồn tại']));
	    }
	   	$user = User::where('email',  $request->email)->first();
	    if($user && $user->email != Auth::user()->email) {
	    	return back()->with('thongbao', json_encode(['status' => 'danger','message'=> 'Email '.$request->email.' đã tồn tại']));
	    }
	    if(isset($request->newpassword)) {
	    	$data = array(
        			'username'	=>	$request->username,
        			'password'	=>	$request->password
        		);
	    	if(Auth::attempt($data)){
	    		if($request->confirm_newpassword === $request->newpassword) {
	    			$user->password = bcrypt($request->newpassword);
	    			$user->save();
	    		} else {
	    			return back()->with('thongbao', json_encode(['status' => 'danger','message'=> 'Mật khẩu xác nhận không giống nhau!']));
	    		}
	    	} else {
	    		return back()->with('thongbao', json_encode(['status' => 'danger','message'=> 'Sai mật khẩu hiện tại!']));
	    	}
	    }
	    $user->username = $request->username;
	    $user->hoten = $request->hoten;
	    $user->email = $request->email;
	    $user->facebook = isset($request->facebook) ? $request->facebook : '';
	    $user->sdt = isset($request->sdt) ? $request->sdt : '';
	    $user->anhdaidien = isset($request->anhdaidien) ? $request->anhdaidien : '';
	    $user->save();
	    return redirect(route('user', Auth::user()->username))->with('thongbao', json_encode(['status' => 'success','message'=> 'Thay đổi thông tin thành công!']));
    }
}
