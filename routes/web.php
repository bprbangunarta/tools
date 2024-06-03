<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route::middleware(['time.access'])->group(function () {
    // });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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


    Route::controller(TabunganController::class)->group(function () {
        Route::get('/cetak/tabungan', 'cetak_index')->name('tabungan.cetak.index');
        Route::post('/cetak/tabungan/search', 'cetak_search')->name('tabungan.cetak.search');
        Route::put('/cetak/tabungan/update', 'cetak_update')->name('tabungan.cetak.update');
    });

    Route::controller(NasabahController::class)->group(function () {
        Route::get('/nasabah', 'index')->name('nasabah.index');
        Route::post('/nasabah/search', 'search')->name('nasabah.search');
        Route::put('/nasabah/update', 'update')->name('nasabah.update');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi/tabungan', 'trx_tabungan')->name('trx-tabungan.index');
        Route::get('transaksi/sma', 'trx_sma')->name('trx-sama.index');
        Route::get('pembukaan/deposito', 'pembukaan_deposito')->name('pembukaan-deposito.index');
        Route::get('pembukaan/tabungan', 'pembukaan_tabungan')->name('pembukaan-tabungan.index');
    });
});
