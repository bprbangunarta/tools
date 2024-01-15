<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $waktu = now()->format('H:i'); // Hasil 16:00


        $today = now();
        $dayOfWeek = $today->dayOfWeek; // 0 (Minggu) hingga 6 (Sabtu)
        $currentHour = $today->hour;

        // dd($waktu);

        if (date('d') == 'Mon') {
            return response('Akses ditolak. Silakan coba lagi pada hari kerja.', 403)->with('error', 'Akses ditolak. Silakan coba lagi pada hari kerja.');
        }

        // Mencegah akses pada Sabtu dan Minggu atau setelah jam 5 sore
        // if ($dayOfWeek == 6 || $dayOfWeek == 0 || $currentHour >= 16) {
        //     return response('Akses ditolak. Silakan coba lagi pada hari kerja.', 403)->with('error', 'Akses ditolak. Silakan coba lagi pada hari kerja.');
        // }

        return $next($request);
    }
}
