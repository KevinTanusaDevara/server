<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\BuktiPembayaranController;
use App\Http\Controllers\StatusPembayaranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//*Auth
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout');

//*Profile
Route::get('profile/{id}', 'UserController@profile');
Route::put('profile/update/{id}', 'UserController@update');

//*Transaksi
Route::get('transaksi', 'TransaksiController@index');
Route::get('transaksi/{id}', 'TransaksiController@show');
Route::post('transaksi', 'TransaksiController@store');
Route::put('transaksi/{id}', 'TransaksiController@update');
Route::delete('transaksi/{id}', 'TransaksiController@destroy');
Route::get('transaksi/search/{name}', 'TransaksiController@search');
Route::post('transaksi/searchperiod', 'TransaksiController@searchPeriod');

//*Jenis Transaksi
Route::get('jenistransaksi', 'JenisTransaksiController@index');
Route::get('jenistransaksi/{id}', 'JenisTransaksiController@show');
Route::post('jenistransaksi', 'JenisTransaksiController@store');
Route::put('jenistransaksi/{id}', 'JenisTransaksiController@update');
Route::delete('jenistransaksi/{id}', 'JenisTransaksiController@destroy');
Route::get('jenistransaksi/search/{name}', 'JenisTransaksiController@search');

//*Role
Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');
Route::post('role', 'RoleController@store');
Route::put('role/{id}', 'RoleController@update');
Route::delete('role/{id}', 'RoleController@destroy');
Route::get('role/search/{name}', 'RoleController@search');

//*Bukti Pembayaran
Route::get('buktipembayaran', 'BuktiPembayaranController@index');
Route::get('buktipembayaran/{id}', 'BuktiPembayaranController@show');
Route::post('buktipembayaran', 'BuktiPembayaranController@store');
Route::put('buktipembayaran/{id}', 'BuktiPembayaranController@update');
Route::delete('buktipembayaran/{id}', 'BuktiPembayaranController@destroy');
Route::get('buktipembayaran/search/{name}', 'BuktiPembayaranController@search');

//*Status Pembayaran
Route::get('statuspembayaran', 'StatusPembayaranController@index');
Route::get('statuspembayaran/{id}', 'StatusPembayaranController@show');
Route::post('statuspembayaran', 'StatusPembayaranController@store');
Route::put('statuspembayaran/{id}', 'StatusPembayaranController@update');
Route::delete('statuspembayaran/{id}', 'StatusPembayaranController@destroy');
Route::get('statuspembayaran/search/{name}', 'StatusPembayaranController@search');