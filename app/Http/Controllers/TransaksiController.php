<?php

namespace App\Http\Controllers;

use App\Models\CmaTabunganTemp;
use App\Models\Deposito;
use App\Models\TabunganB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function trx_tabungan()
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        $trx_tabungan = 1;

        return view('transaksi.trx-tabungan', [
            'trx_tabungan' => $trx_tabungan,
        ]);
    }

    public function trx_sma()
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        $trx_sma = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->get();

        $trx_sma_total = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        return view('transaksi.trx-sma', [
            'trx_sma'        => $trx_sma,
            'trx_sma_total'  => $trx_sma_total,
        ]);
    }

    public function pembukaan_deposito()
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        $deposito = Deposito::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->get();

        $deposito_total = Deposito::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        return view('transaksi.pembukaan-deposito', [
            'deposito'          => $deposito,
            'deposito_total'    => $deposito_total,
        ]);
    }

    public function pembukaan_tabungan()
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        $tabungan = TabunganB::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->get();

        $tabungan_total = TabunganB::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        return view('transaksi.pembukaan-tabungan', [
            'tabungan'          => $tabungan,
            'tabungan_total'    => $tabungan_total,
        ]);
    }
}
