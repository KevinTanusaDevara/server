<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\BuktiPembayaranController;

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
Route::get('profile/{id}', 'UserController@user');
Route::update('profile/update/{id}', 'UserController@update');

//*Transaksi
Route::get('transaksi', 'TransaksiController@index');
Route::get('transaksi/{id}', 'TransaksiController@show');
Route::post('transaksi', 'TransaksiController@store');
Route::put('transaksi/{id}', 'TransaksiController@update');
Route::delete('transaksi/{id}', 'TransaksiController@destroy');
Route::get('transaksi/search/{name}', [TransaksiController::class, 'search']);
Route::post('transaksi/searchperiod', [TransaksiController::class, 'searchPeriod']);

//*Jenis Transaksi
Route::get('jenistransaksi', [JenisTransaksiController::class, 'index']);
Route::get('jenistransaksi/{id}', [JenisTransaksiController::class, 'show']);
Route::get('jenistransaksi/search/{name}', [JenisTransaksiController::class, 'search']);
Route::post('jenistransaksi', [JenisTransaksiController::class, 'store']);
Route::put('jenistransaksi/{id}', [JenisTransaksiController::class, 'update']);
Route::delete('jenistransaksi/{id}', [JenisTransaksiController::class, 'destroy']);

//*Role
Route::get('role', [RoleController::class, 'index']);
Route::get('role/{id}', [RoleController::class, 'show']);
Route::get('role/search/{name}', [RoleController::class, 'search']);
Route::post('role', [RoleController::class, 'store']);
Route::put('role/{id}', [RoleController::class, 'update']);
Route::delete('role/{id}', [RoleController::class, 'destroy']);

//*Bukti Pembayaran
Route::get('buktipembayaran', [BuktiPembayaranController::class, 'index']);
Route::get('buktipembayaran/{id}', [BuktiPembayaranController::class, 'show']);
Route::get('buktipembayaran/search/{name}', [BuktiPembayaranController::class, 'search']);
Route::post('buktipembayaran', [BuktiPembayaranController::class, 'store']);
Route::put('buktipembayaran/{id}', [BuktiPembayaranController::class, 'update']);
Route::delete('buktipembayaran/{id}', [BuktiPembayaranController::class, 'destroy']);

//*Status Pembayaran
Route::get('statuspembayaran', [StatusPembayaranController::class, 'index']);
Route::get('statuspembayaran/{id}', [StatusPembayaranController::class, 'show']);
Route::get('statuspembayaran/search/{name}', [StatusPembayaranController::class, 'search']);
Route::post('statuspembayaran', [StatusPembayaranController::class, 'store']);
Route::put('statuspembayaran/{id}', [StatusPembayaranController::class, 'update']);
Route::delete('statuspembayaran/{id}', [StatusPembayaranController::class, 'destroy']);