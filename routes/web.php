<?php

use App\Http\Controllers\DataLaundryController;
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


Route::controller(DataLaundryController::class)->group(function(){

    // Route Dahsboard
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard','index');

    // Route Data Transaksi
    Route::get('/list-data-transaksi/masuk','transaksi_masuk');
    Route::get('/list-data-transaksi/keluar','transaksi_keluar');

    // Route Data Laundry
    // Route::get('/list-data-laundry/proses','laundry_proses');
    // Route::get('/list-data-laundry/selesai','laundry_selesai');

    // Route Input Data
    Route::get('/input-data-laundry','insert');
    Route::post('/input-data-laundry', 'store');

    
    // Route Detail Data pending
    Route::get('/list-data-laundry/proses/detail/{id}','detail');

    // Data updated status pembayaran

    Route::put('/list-data-laundry/proses/detail/{data_id/updated}','update_statusPembayaran');

    Route::post('/list-data-laundry/proses/detail/{id}/updated','update_statusPembayaran');

    // Edit Data
    Route::get('/data/{data_id}/edit', 'edit');
    Route::put('/data/{data_id}', 'update');

    // Delete Data
    Route::delete('/data/{data_id}', 'delete');
});
