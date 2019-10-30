<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect('/home');
});

Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

Route::resource('user', 'UserController');

















Route::get('/dokter', 'RekmedController@index_dokter');

Route::get('/cari', function () {
    return view('rekmed.dokter.index');
});

Route::get('/admin', function () {
    return view('rekmed.admin.upload');
});
Route::get('/create', function () {
    return view('admin.create');
});
Route::get('/log', function () {
    return view('super.index');
});
