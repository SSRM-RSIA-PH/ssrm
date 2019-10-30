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
Route::get('/dokter', function () {
    return view('dokter.show');
});
Route::get('/cari', function () {
    return view('dokter.index');
});
Route::get('/admin', function () {
    return view('admin.upload');
});
Route::get('/create', function () {
    return view('admin.create');
});
Route::get('/log', function () {
    return view('super.index');
});

Auth::routes();
//

Route::get('/home', 'HomeController@index')->name('home');
