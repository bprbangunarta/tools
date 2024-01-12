<?php

use App\Http\Controllers\DepositoController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TabunganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(DepositoController::class)->group(function () {
        Route::get('/deposito', 'index')->name('deposito.index');
        Route::post('/deposito/search', 'search')->name('deposito.search');
        Route::put('/deposito/update', 'update')->name('deposito.update');
    });

    Route::controller(TabunganController::class)->group(function () {
        Route::get('/tabungan', 'index')->name('tabungan.index');
        Route::post('/tabungan/search', 'search')->name('tabungan.search');
        Route::put('/tabungan/update', 'update')->name('tabungan.update');
    });

    Route::controller(NasabahController::class)->group(function () {
        Route::get('/nasabah', 'index')->name('nasabah.index');
    });
});
