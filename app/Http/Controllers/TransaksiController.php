<?php

namespace App\Http\Controllers;

use App\Models\CmaTabunganTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function sma_dana()
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        // dd($date);

        $cma_tabungan = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->get();
        // ->paginate(10);

        $cma_tabungan_total = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();


        return view('transaksi.sma.index', [
            'cma_tabungan'        => $cma_tabungan,
            'cma_tabungan_total'  => $cma_tabungan_total,
        ]);
    }
}
