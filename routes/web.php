<?php

// Login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect('/login');
});
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");


// supervisor
Route::group(['prefix' => '/supervisor'], function () {
    Route::get('/', 'SuperController@index')->name('super.index');
    Route::resource('/user', 'SuperUserController');
    Route::get('/rekmed', 'SuperRekmedController@index')->name('super.rekmed');
    Route::post('/rekmed/{id}', 'SuperRekmedController@show')->name('super.rekmed.show');
    Route::post('/rekmed/{id}/{ctg}/{id_ctg}', 'SuperRekmedController@showdetail')->name('super.rekmed.showdetail');

    Route::get('/log', 'LogController@index')->name('super.log');
});


// admin upload
Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::post('/igd/create', 'AdminController@create')->name('admin.create.rek');
    Route::post('/igd/create/s', 'AdminController@store')->name('admin.store.rek');

    Route::get('/igd/{rek_id}/upload', 'AdminIgdController@create')->name('admin.create.igd');
    Route::post('/igd/upload/s', 'AdminIgdController@store')->name('admin.store.igd');
});


// dokter
Route::group(['prefix' => '/dokter'], function () {
    Route::get('/', 'DokterController@index')->name('dokter.index');
});
