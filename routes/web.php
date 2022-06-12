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
    Route::get('/dashboard','dashboard');

    // Route Data Masuk
    Route::get('/data-masuk','index');

    // Route Input Data
    Route::get('/input-data','insert');
    Route::post('/input-data', 'store');

    // Route Detail Data pending
    Route::get('/detail/{data_id}','detail');
});
