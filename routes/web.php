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
/*
Route::get('/', function () {
    return view('home');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'BerandaController@beranda');
Route::get('daftar', 'BerandaController@daftar');
Route::post('/daftar/anggota', 'BerandaController@kirim')->name('beranda.kirim');
Route::get('daftar/anggota/berhasil', 'BerandaController@showBerhasil')->name('guest.success');
Route::get('faqs', 'FaqController@faq');
Route::resource('user', 'UserController');
Route::resource('jurusan', 'JurusanController');
Route::resource('anggota', 'AnggotaController');
Route::resource('rak', 'RakController');
Route::resource('buku', 'BukuController');
Route::get('/format_buku', 'BukuController@format');
Route::post('/import_buku', 'BukuController@import');
Route::resource('transaksi', 'TransaksiController');
Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');
Route::get('/laporan/buku', 'LaporanController@buku');
Route::get('/laporan/buku/pdf', 'LaporanController@bukuPdf');
Route::get('/laporan/buku/excel', 'LaporanController@bukuExcel');


