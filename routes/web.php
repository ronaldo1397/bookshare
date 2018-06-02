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

Route::get('user/{username}', 'UserController@trangcanhan');

Route::get('/timsach', 'SachController@timsach')->name('themsach');
Route::post('/timsach', 'SachController@themsach')->middleware('auth');;

Route::get('sach/{id}','SachController@sach')->name('sach');
Route::post('sach','ViDuController@post');


Route::get('/home', 'HomeController@index')->name('home');
