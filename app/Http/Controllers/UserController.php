<?php

namespace App\Http\Controllers;
use App\User;
use App\Sach;
use App\TuSach;
use App\YeuCau;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trangcanhan($id)
    {
    	$user = User::find($id);
    	if($user) {
	    	$tusach = TuSach::where('id_user', $user->id)->get();
	    	$lishcutraodoi = YeuCau::where('id_user_send', $user->id)->orWhere('id_user_receive', $user->id)->get();
	    	$sach = [];
	    	foreach ($tusach as $key => $value) {
	    		$sach[] = Sach::find($value->id_sach);
	    	}
	    	return view('user.trangcanhan', ['user' => $user, 'sach' => $sach]);
	    } else {
	    	return redirect('/');
	    }
    }
}
