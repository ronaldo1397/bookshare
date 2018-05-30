<?php

namespace App\Http\Controllers;

use App\Sach;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sach_noibat = Sach::take(6)->get();
        $sach_moi = Sach::take(6)->orderBy('updated_at', 'desc')->get();
        $hinh_user = User::take(6)->orderBy('id', 'desc')->get();
        return view('index', ['sach_noibat' => $sach_noibat, 'sach_moi' => $sach_moi, 'hinh_user' => $hinh_user]);
    }
}
