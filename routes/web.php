<?php

// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
// Auth::routes();

// /*
// |------------------------------------------------------------------------------------
// | Admin
// |------------------------------------------------------------------------------------
// */
// Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
//     Route::get('/', 'DashboardController@index')->name('dash');
//     Route::resource('users', 'UserController');
// });

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/list-cek', 'PemeriksaanController@index')->name('list-cek');
Route::get('/riwayat', 'PemeriksaanController@history')->name('history');
Route::get('/insert-cek/{id}', 'PemeriksaanController@show')->name('insert-cek');
Route::get('/print/{id}', 'PemeriksaanController@print')->name('print-cek');
Route::get('/edit-cek/{id}', 'PemeriksaanController@edit')->name('edit-cek');
Route::get('/home', 'PemeriksaanController@home')->name('home');
Route::get('/periksa/{id}', 'PemeriksaanController@create')->name('periksa');
Route::post('/kirim-data-pemeriksaan' ,'PemeriksaanController@store')->name('kirim-data-pemeriksaan');
Route::match(['put', 'patch'], 'proses-lab/{id}', 'PemeriksaanController@update')->name('proses-lab');


Route::middleware('role:pendaftaran')->group(function(){
    Route::get('/pendaftaran', 'PendaftaranController@home')->name('pendaftaran.home');
    Route::get('/form-pendaftaran-pasien', 'PendaftaranController@index')->name('pendaftaran.form');
    Route::get('/daftar-list-pasien', 'PendaftaranController@list')->name('pendaftaran.list');
    Route::get('/detail-pasien/{id}', 'PendaftaranController@detail')->name('pendaftaran.detail');
    Route::get('/edit-data-pasien/{id}', 'PendaftaranController@showDataDetailNow')->name('pendaftaran.detail-edit');
    Route::get('/hapus-data-pasien/{id}', 'PendaftaranController@destroy')->name('pendaftaran.delete');
    Route::post('/update-data-pasien/{id}', 'PendaftaranController@update')->name('pendaftaran.update');
    Route::post('tambah-pasien','PendaftaranController@store')->name('pendaftaran.store');
});
