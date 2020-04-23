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

Route::get('/homeviews', function () {
    return view('homeviews');
});

Route::get('/login2', function () {
    return view('login2');
});


Route::get('/belajar', function(){
	return view('belajar',$data);
}); 

Route::get('/ikhwan', function(){

	$data['nama'] = "Ikhwan";

	return view('ikhwan');
});

Route::get('/tyo', function(){
	return view('tyo');
});

Route::get('/skuy', function(){
	return view('skuy');
});

Route::get('/beranda', function(){
	return view('beranda');
}); 

Route::get('/kelas','KelasController@index');
Route::get('/kelas/create','KelasController@create');
Route::post('/kelas','KelasController@store');
Route::get('/kelas/{id}/edit', 'KelasController@edit');
Route::patch('/kelas/{id}', 'KelasController@update');
Route::delete('/kelas/{id}', 'KelasController@destroy');



Route::get('/siswa/create','SiswaController@create');
Route::post('/siswa','SiswaController@store');
Route::get('/siswa','SiswaController@index');
Route::get('/siswa/{id}/edit', 'SiswaController@edit');
Route::patch('/siswa/{id}', 'SiswaController@update');
Route::delete('/siswa/{id}', 'SiswaController@destroy');



Route::get('/guru','GuruController@index');
Route::get('/guru/create','GuruController@create');
Route::post('/guru','GuruController@store');
Route::get('/guru/{id}/edit','GuruController@edit');
Route::patch('/guru/{id}','GuruController@update');
Route::delete('/guru/{id}','GuruController@destroy');

// Route::get('/user', function(){
// 	$data['nama'] = "ikhwan";
// 	$data['jk'] = "laki-Laki";
// 	return view('user', $data);
// });

Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user','UserController@store');
Route::get('/user/{id}/edit','UserController@edit');
Route::patch('/user/{id}','UserController@update');
Route::delete('/user/{id}','UserController@destroy');

Route::get('/transaksi', 'TransaksiController@index');
Route::get('/transaksi/create', 'TransaksiController@create');
Route::post('/transaksi','TransaksiController@store');
Route::get('/transaksi/{id}/edit','TransaksiController@edit');
Route::patch('/transaksi/{id}','TransaksiController@update');
Route::delete('/transaksi/{id}','TransaksiController@destroy');

Route::get('/paket', 'PaketController@index');
Route::get('/paket/create', 'PaketController@create');
Route::post('/paket','PaketController@store');
Route::get('/paket/{id}/edit','PaketController@edit');
Route::patch('/paket/{id}','PaketController@update');
Route::delete('/paket/{id}','PaketController@destroy');


Route::get('/outlet', 'OutletController@index');
Route::get('/outlet/create', 'OutletController@create');
Route::post('/outlet','OutletController@store');
Route::get('/outlet/{id}/edit','OutletController@edit');
Route::patch('/outlet/{id}','OutletController@update');
Route::delete('/outlet/{id}','OutletController@destroy');


Route::get('/member', 'MemberController@index');
Route::get('/member/create', 'MemberController@create');
Route::post('/member','MemberController@store');
Route::get('/member/{id}/edit','MemberController@edit');
Route::patch('/member/{id}','MemberController@update');
Route::delete('/member/{id}','MemberController@destroy');


Route::get('/detail', 'DetailController@index');
Route::get('/detail/create', 'DetailController@create');
Route::post('/detail','DetailController@store');
Route::get('/detail/{id}/edit','DetailController@edit');
Route::patch('/detail/{id}','DetailController@update');
Route::delete('/detail/{id}','DetailController@destroy');


Route::get('/ikhwan','ikhwan@index');
Route::get('/tyo','tyo@index');



Auth::routes();

Route::get('/home', 'HomeController@index');


Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

// Route::get('/home','HomeController@index');
// Route::get('/admin','AdminController@index');


