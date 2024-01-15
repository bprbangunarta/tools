<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $deposito   = Log::where('log', 'Update QQ Deposito')->count();
        $tabungan   = Log::where('log', 'Update QQ Tabungan')->count();
        $nasabah    = Log::where('log', 'Update Data Nasabah')->count();
        $total      = Log::count();
        return view('dashboard', [
            'deposito'  => $deposito,
            'tabungan'  => $tabungan,
            'nasabah'   => $nasabah,
            'total'     => $total,
        ]);
    }
}
