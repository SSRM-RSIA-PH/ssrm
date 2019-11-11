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
    //admin controller
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::post('/create', 'AdminController@create')->name('admin.create.rek');
    Route::post('/create/s', 'AdminController@store')->name('admin.store.rek');
    Route::get('/show/{rek_id}', 'AdminController@show')->name('admin.show.rek');

    //admin igd
    Route::get('/igd/{rek_id}/upload', 'AdminIgdController@create')->name('admin.create.igd');
    Route::post('/igd/upload/s', 'AdminIgdController@store')->name('admin.store.igd');
    Route::get('/igd/{rek_id}/validation', 'AdminIgdController@validation')->name('admin.validation.igd');
    Route::post('/igd/validation/cancel', 'AdminIgdController@cancel')->name('admin.validation.igd.cancel');

    //admin poli
    Route::get('/poli/{rek_id}/upload', 'AdminPoliController@create')->name('admin.create.poli');
    Route::post('/poli/upload/s', 'AdminPoliController@store')->name('admin.store.poli');
    Route::get('/poli/{rek_id}/validation', 'AdminPoliController@validation')->name('admin.validation.poli');
    Route::post('/poli/validation/cancel', 'AdminPoliController@cancel')->name('admin.validation.poli.cancel');

    //admin nicu
    Route::get('/nicu/{rek_id}/upload', 'AdminPoliController@create')->name('admin.create.nicu');
    Route::post('/nicu/upload/s', 'AdminPoliController@store')->name('admin.store.nicu');
    Route::get('/nicu/{rek_id}/validation', 'AdminPoliController@validation')->name('admin.validation.nicu');
    Route::post('/nicu/validation/cancel', 'AdminPoliController@cancel')->name('admin.validation.nicu.cancel');
});


// dokter
Route::group(['prefix' => '/dokter'], function () {
    Route::get('/', 'DokterController@index')->name('dokter.index');
});
