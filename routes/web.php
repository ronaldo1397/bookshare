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

Route::get('/', function () {
    return view('welcome');
});

Route::get('namsinh/{ng}', function($ng){
	$nam= 2018-$ng;
	return $nam;
});
Route::get('sach/{id}','ViDuController@sach');
Route::post('sach','ViDuController@post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
