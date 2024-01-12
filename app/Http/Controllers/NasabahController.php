<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    public function index()
    {
        $keyword = request()->input('keyword');
        $user = Auth::user()->name;

        if ($keyword) {
            $logs = Log::where('log', 'Update QQ Nasabah')
                ->where('update_user', $user)
                ->where('nama_nasabah', 'like', '%' . $keyword . '%')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $logs = Log::where('log', 'Update QQ Nasabah')
                ->where('update_user', $user)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }

        return view('update-nasabah.index', [
            'data' => $logs,
        ]);
    }

    public function search(Request $request)
    {
        $user = Auth::user()->name;
        $logs = Log::where('log', 'Update QQ Nasabah')
            ->where('update_user', $user)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $request->validate([
            'nocif' => 'required',
        ]);

        $nocif = $request->input('nocif');
        $nasabah = Nasabah::where('nocif', 'like', '%' . $nocif . '%')->first();

        if ($nasabah) {
            return view('update-nasabah.search', [
                'nasabah' => $nasabah,
                'data' => $logs,
            ]);
        } else {
            return redirect('/nasabah');
        }
    }

    public function update(Request $request)
    {
        $nocif  = $request->input('nocif');

        $data = [
            'log'          => 'Update QQ Nasabah',
            'nocif'        => request()->input('nocif'),
            'noacc'        => '',
            'nama_nasabah' => request()->input('nama'),
            'nohp'         => request()->input('nohp'),
            'update_user'  => Auth::user()->name,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];

        $request->validate([
            'nohp' => 'required',
        ]);

        DB::connection('sqlsrv')->table('m_cif')->where('nocif', $nocif)->update(['nohp' => $request->input('nohp')]);
        Log::insert($data);
        return redirect('/nasabah')->with('success', 'Update Nomor Telepon successfully');
    }
}
