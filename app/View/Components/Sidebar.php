<?php

namespace App\View\Components;

use App\Models\CmaTabunganTemp;
use App\Models\Deposito;
use App\Models\TabunganB;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Carbon;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $now = Carbon::now();
        $date = $now->format('Ymd');

        $trx_sma = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        $trx_tabungan = 0;

        $deposito = Deposito::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        $tabungan = TabunganB::where('tglbuka', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        $total = $trx_sma + $trx_tabungan + $deposito + $tabungan;

        return view('components.sidebar', [
            'trx_sma'      => $trx_sma,
            'trx_tabungan'  => $trx_tabungan,
            'deposito'      => $deposito,
            'tabungan'      => $tabungan,
            'total'         => $total,
        ]);
    }
}
