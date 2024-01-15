<?php

namespace App\View\Components;

use App\Models\CmaTabunganTemp;
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

        $cma_tabungan_total = CmaTabunganTemp::where('tglproses', $date)
            ->where('stsrec', 'N')
            ->orderBy('inptgljam')
            ->count();

        $tabungan = 1;
        $deposito = 1;
        $total = $cma_tabungan_total + $tabungan + $deposito;

        return view('components.sidebar', [
            'cma_tabungan_total'  => $cma_tabungan_total,
            'tabungan'  => $tabungan,
            'deposito'  => $deposito,
            'total'     => $total,
        ]);
    }
}
