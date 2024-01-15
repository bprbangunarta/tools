<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $deposito   = Log::where('log', 'Update QQ Deposito')->count();
        $tabungan   = Log::where('log', 'Update QQ Tabungan')->count();
        $nasabah    = Log::where('log', 'Update Data Nasabah')->count();
        $transaksi  = Transaksi::count();

        $total      = Log::count();
        return view('dashboard', [
            'deposito'  => $deposito,
            'tabungan'  => $tabungan,
            'nasabah'   => $nasabah,
            'transaksi' => $transaksi,
            'total'     => $total,
        ]);
    }
}
