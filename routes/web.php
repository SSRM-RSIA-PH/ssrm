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
    
    Route::group(['prefix' => '/rekmed'], function () {
        Route::get('/', 'SuperRekmedController@index')->name('super.rekmed');
        Route::get('/{rek_id}', 'SuperRekmedController@show')->name('super.rekmed.show');


        //show
        //show list
        Route::get('/{rek_id}/igd', 'SuperRekmedController@show_igd')->name('super.rekmed.show.igd');
        Route::get('/{rek_id}/nicu', 'SuperRekmedController@show_nicu')->name('super.rekmed.show.nicu');
        Route::get('/{rek_id}/poli', 'SuperRekmedController@show_poli')->name('super.rekmed.show.poli');
        Route::get('/{rek_id}/ri', 'SuperRekmedController@show_ri')->name('super.rekmed.show.ri');

        //show detail
        Route::get('/{rek_id}/igd/{id}', 'SuperRekmedController@detail_igd')->name('super.rekmed.detail.igd');
        Route::get('/{rek_id}/nicu/{id}', 'SuperRekmedController@detail_nicu')->name('super.rekmed.detail.nicu');
        Route::get('/{rek_id}/poli/{id}', 'SuperRekmedController@detail_poli')->name('super.rekmed.detail.poli');
        Route::get('/{rek_id}/ri/{id}', 'SuperRekmedController@detail_ri')->name('super.rekmed.detail.ri');
        

        //edit
        //edit rekmed
        Route::get('/{rek_id}/edit', 'SuperRekmedController@edit_rekmed')->name('super.rekmed.edit');
        Route::put('/{rek_id}/update', 'SuperRekmedController@update_rekmed')->name('super.rekmed.update');

        //edit detail igd
        Route::get('/{rek_id}/igd/{id}/edit', 'SuperRekmedController@edit_detail_igd')->name('super.rekmed.igd.edit');
        Route::put('/{rek_id}/igd/{id}/update', 'SuperRekmedController@update_detail_igd')->name('super.rekmed.igd.update');
        
        //edit detail nicu
        Route::get('/{rek_id}/nicu/{id}/edit', 'SuperRekmedController@edit_detail_nicu')->name('super.rekmed.nicu.edit');
        Route::put('/{rek_id}/nicu/{id}/update', 'SuperRekmedController@update_detail_nicu')->name('super.rekmed.nicu.update');
        
        //edit detail rawat inap
        Route::get('/{rek_id}/ri/{id}/edit', 'SuperRekmedController@edit_detail_ri')->name('super.rekmed.ri.edit');
        Route::put('/{rek_id}/ri/{id}/update', 'SuperRekmedController@update_detail_ri')->name('super.rekmed.ri.update');
        
        //edit detail poli
        Route::get('/{rek_id}/poli/{id}/edit', 'SuperRekmedController@edit_detail_poli')->name('super.rekmed.poli.edit');
        Route::put('/{rek_id}/poli/{id}/update', 'SuperRekmedController@update_detail_poli')->name('super.rekmed.poli.update');
        

        //delete
        //delete rekmed
        Route::delete('/{rek_id}/destroy', 'SuperRekmedController@destroy_rekmed')->name('super.rekmed.destroy');
        
        //delete ctg
        Route::delete('/{id}/{ctg}/destroy', 'SuperRekmedController@destroy_ctg')->name('super.rekmed.destroy_ctg');
        
        //delete detail
        Route::delete('/{id}/{ctg}/destroy_detail', 'SuperRekmedController@destroy_detail')->name('super.rekmed.destroy_detail');

        //delete detail penunjang
        Route::delete('/{id}/{ctg}/destroy_penunjang', 'SuperRekmedController@destroy_detail_penunjang')->name('super.rekmed.destroy_penunjang');
    });

    Route::get('/log', 'SuperLogController@index')->name('super.log');
});


// admin upload
Route::group(['prefix' => '/admin'], function () {
    //admin controller
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/create', 'AdminController@create')->name('admin.create.rek');
    Route::post('/create/s', 'AdminController@store')->name('admin.store.rek');
    Route::get('/show/{rek_id}', 'AdminController@show')->name('admin.show.rek');

    //admin igd
    Route::get('/igd/{rek_id}/upload', 'AdminIgdController@create')->name('admin.create.igd');
    Route::post('/igd/upload/s', 'AdminIgdController@store')->name('admin.store.igd');
    Route::get('/igd/{id}/validation', 'AdminIgdController@validation')->name('admin.validation.igd');
    Route::post('/igd/validation/cancel', 'AdminIgdController@cancel')->name('admin.validation.igd.cancel');

    //admin poli
    Route::get('/poli/{rek_id}/upload', 'AdminPoliController@create')->name('admin.create.poli');
    Route::post('/poli/upload/s', 'AdminPoliController@store')->name('admin.store.poli');
    Route::get('/poli/{id}/validation', 'AdminPoliController@validation')->name('admin.validation.poli');
    Route::post('/poli/validation/cancel', 'AdminPoliController@cancel')->name('admin.validation.poli.cancel');

    //admin nicu
    Route::get('/nicu/{rek_id}/upload', 'AdminNicuController@create')->name('admin.create.nicu');
    Route::post('/nicu/upload/s', 'AdminNicuController@store')->name('admin.store.nicu');
    Route::get('/nicu/{id}/validation', 'AdminNicuController@validation')->name('admin.validation.nicu');
    Route::post('/nicu/validation/cancel', 'AdminNicuController@cancel')->name('admin.validation.nicu.cancel');

    //admin rawat inap
    Route::get('/ri/{rek_id}/upload', 'AdminRiController@create')->name('admin.create.ri');
    Route::post('/ri/upload/s', 'AdminRiController@store')->name('admin.store.ri');
    Route::get('/ri/{id}/validation', 'AdminRiController@validation')->name('admin.validation.ri');
    Route::post('/ri/validation/cancel', 'AdminRiController@cancel')->name('admin.validation.ri.cancel');
});


// dokter
Route::group(['prefix' => '/dokter'], function () {
    Route::get('/', 'DokterController@index')->name('dokter.index');

    //show list
    Route::get('/{rek_id}', 'DokterController@show')->name('dokter.show');
    Route::get('/{rek_id}/igd', 'DokterController@show_igd')->name('dokter.show.igd');
    Route::get('/{rek_id}/nicu', 'DokterController@show_nicu')->name('dokter.show.nicu');
    Route::get('/{rek_id}/poli', 'DokterController@show_poli')->name('dokter.show.poli');
    Route::get('/{rek_id}/ri', 'DokterController@show_ri')->name('dokter.show.ri');

    //show detail
    Route::get('/{rek_id}/igd/{id}/{ctg}', 'DokterController@detail_igd')->name('dokter.detail.igd');
    Route::get('/{rek_id}/nicu/{id}/{ctg}', 'DokterController@detail_nicu')->name('dokter.detail.nicu');
    Route::get('/{rek_id}/poli/{id}/{ctg}', 'DokterController@detail_poli')->name('dokter.detail.poli');
    Route::get('/{rek_id}/ri/{id}/{ctg}', 'DokterController@detail_ri')->name('dokter.detail.ri');
});

Route::get('archive/{rek_id}', 'Archive@download')->name('archive');

