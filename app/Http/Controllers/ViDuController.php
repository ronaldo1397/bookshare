<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViDuController extends Controller
{
    public function sach($id)
    {
    	return view('abc', ['ten' => $id, 'ten2' => 'a<br>b']);
    }
    public function post(Request $request)
    {
    	return $request->tensach.'<br>'.$request->tacgia;
    }
}
