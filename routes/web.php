<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('user/{username}', 'UserController@trangcanhan')->name('user');

Route::get('user/{username}/chinhsua', 'UserController@chinhsua')->name('suatrangcanhan')->middleware('auth');
Route::post('user/{username}/chinhsua', 'UserController@luuthongtin')->middleware('auth');

Route::get('user/{username}/muonsach/{id}', function(){return redirect('/');});
Route::post('user/{username}/muonsach/{id}', 'SachController@muonsach')->name('muonsach')->middleware('auth');

Route::get('/timsach', 'SachController@timsach')->name('themsach');
Route::post('/timsach', 'SachController@themsach')->middleware('auth');

Route::get('sach/{id}','SachController@sach')->name('sach');
Route::post('sach/{id}','SachController@themvaotu')->middleware('auth');

Route::post('/yeucau/{id}', 'YeuCauController@index')->name('yeucau')->middleware('auth');

Route::get('/theloai', 'TheLoaiController@view')->middleware('auth');
Route::post('/theloai/them', 'TheLoaiController@insert')->name('themloai')->middleware('auth');

Route::get('/theloai/{id}', 'TheLoaiController@index')->name('theloai');
Route::get('/theloai/{id}/sua', 'TheLoaiController@edit')->name('sualoai')->middleware('auth');
Route::post('/theloai/{id}/sua', 'TheLoaiController@update')->middleware('auth');
Route::get('/theloai/{id}/xoa', 'TheLoaiController@delete')->name('xoaloai')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
