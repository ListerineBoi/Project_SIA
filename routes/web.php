<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});
Route::get('/home','HomeController@index')->name('home');
Route::get('/input','inputController@index')->name('input');
Route::post('/input/jual','inputController@tambah')->name('tambah'); 
Route::post('/input/byrpiutang','inputController@tambahP')->name('tambahP'); 

Route::get('/jurnal','jurnalController@jurnal')->name('jurnal');
Route::get('/jurnal/proses','jurnalController@proses')->name('ProsesJ');

Route::get('/posting','postingController@posting')->name('posting');
Route::get('/posting/proses','postingController@proses')->name('ProsesP');

Route::get('/piutang','piutangController@index')->name('piutang');
Route::get('/piutang/proses','piutangController@piutang')->name('ProsesPi');