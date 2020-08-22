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
    //return view('welcome');
    return Redirect('/register');
});

Auth::routes();

///registrasi
//register fase ke 2
Route::get('/peserta/reg/', 'HomeController@reg');
Route::post('/peserta/regstore', 'HomeController@regcreate');
Route::post('/peserta/profilestore', 'HomeController@regcreate');
Route::post('/peserta/profileupdate', 'HomeController@profileupdate');

///Redirect
//home peserta
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{kd_invite}', 'HomeController@profile');
Route::get('/info-lomba', 'HomeController@infolomba');

//seminar
Route::get('/seminar', function () {
    //return view('welcome');
    return view('/peserta/SeminarRegist');
});
Route::post('/seminar-regist', 'SeminarController@seminar_regist');


//home admin
Route::get('/admin', 'AdminController@index');


///pembayaran peserta
//page pembayaran
Route::get('/pembayaran/{kd_invite}','PembayaranController@show');
Route::get('/pembayaran','PembayaranController@index');
Route::post('/pembayaran/store', 'PembayaranController@store');

///kelompok peserta
//page kelompok
Route::get('/kelompok/{kd_invite}','KelompokController@index')->name('home_kelompok');
//insert kelompok
Route::post('/kelompok/store', 'KelompokController@store')->name('add_kelompok');
//invite anggota
Route::post('/kelompok/invite', 'KelompokController@invitesearch')->name('invite_anggota');
Route::post('/kelompok/invite/{kd_invite}', 'KelompokController@invite')->name('invite_anggota');

///Admin Routes
//pembayaran admin
Route::get('/admin/pembayaran','AdminPembayaranController@index');
Route::get('/admin/pembayaran/{kd_invite}','AdminPembayaranController@show');
Route::get('/admin/pembayaran/accept/{kd_invite}','AdminPembayaranController@update');
Route::get('/admin/pembayaran/reject/{kd_invite}','AdminPembayaranController@rejected');
//peserta admin
Route::get('/admin/peserta','AdminPembayaranController@index');
//announcement admin
Route::get('/admin/announce','AdminPembayaranController@index');


Route::get('payment', function () {
  \QrCode::size(1000)
  ->format('png')
  ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
  return view('/peserta/SeminarPayment');
});