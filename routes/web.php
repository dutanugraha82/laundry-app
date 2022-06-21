<?php

use App\Http\Controllers\DataLaundryController;
use App\Http\Controllers\SampahCT;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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
    Route::get('/list-data-transaksi/masuk/jsonDataMasuk','jsonDataMasuk');
    Route::get('/list-data-transaksi/masuk','transaksi_masuk');
    Route::get('/list-data-transaksi/keluar/jsonDataKeluar','jsonDataKeluar');
    Route::get('/list-data-transaksi/keluar','transaksi_keluar');    

    // Route Input Data
    Route::get('/input-data-laundry','insert');
    Route::post('/input-data-laundry', 'store');

    
    // Route Detail Data pending
    Route::get('/list-data-laundry/proses/detail/{id}','detail');

    // Data updated status pembayaran
    Route::put('/list-data-laundry/proses/detail/{data_id}','update_statusPembayaran');
    
    //Update data proses
    Route::get('/list-data-laundry/proses/detail/{data_id}/selesai','updateProses');

    // Edit Data
    Route::get('/data/{data_id}/edit', 'edit');
    Route::put('/data/{data_id}', 'update');

    // Delete Data
    Route::get('/data/{data_id}', 'delete');

    // Invoice
    Route::get('/data/invoice/{id}','invoice');

    // Laporan Harian
    Route::get('/laporan-harian','laporanHarian');
});

Route::controller(SampahCT::class)->group(function(){
    Route::get('/sampah','index');
    Route::get('/sampah/json','indexJson');
    Route::get('/sampah/destroyall','destroyAll');
    Route::get('/sampah/destroy/{id}','destroy');
    Route::get('/sampah/restore/{id}','restore');
    Route::get('/sampah/restoreall','restoreAll');
});

// Route::get('/laporan-harian', function(){
//     return view('laporan.laporan-harian');
// });