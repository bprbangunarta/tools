<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\TabunganB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TabunganController extends Controller
{
    public function index()
    {
        $keyword = request()->input('keyword');
        $user = Auth::user()->name;

        if ($keyword) {
            $logs = Log::where('log', 'Update QQ Tabungan')
                ->where('update_user', $user)
                ->where('nama_nasabah', 'like', '%' . $keyword . '%')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $logs = Log::where('log', 'Update QQ Tabungan')
                ->where('update_user', $user)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }

        return view('update-tabungan.index', [
            'data' => $logs,
        ]);
    }

    public function search(Request $request)
    {
        $user = Auth::user()->name;
        $logs = Log::where('log', 'Update QQ Tabungan')
            ->where('update_user', $user)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $request->validate([
            'noacc' => 'required',
        ]);

        $noacc = $request->input('noacc');
        $tabungan = TabunganB::where('noacc', 'like', '%' . $noacc . '%')->first();

        if ($tabungan) {
            return view('update-tabungan.search', [
                'tabungan' => $tabungan,
                'data' => $logs,
            ]);
        } else {
            return redirect('/tabungan');
        }
    }

    public function update(Request $request)
    {
        $noacc  = $request->input('noacc');

        $data = [
            'log'          => 'Update QQ Tabungan',
            'nocif'        => request()->input('nocif'),
            'noacc'        => request()->input('noacc'),
            'nama_nasabah' => request()->input('nama'),
            'nohp'         => '',
            'update_user'  => Auth::user()->name,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];

        $request->validate([
            'nama' => 'required|string',
        ]);

        DB::connection('sqlsrv')->table('m_tabunganb')->where('noacc', $noacc)->update(['fnama' => $request->input('nama')]);
        DB::connection('sqlsrv')->table('m_tabunganc')->where('noacc', $noacc)->update(['fnama' => $request->input('nama')]);
        Log::insert($data);
        return redirect('/tabungan')->with('success', 'Update QQ Tabungan successfully');
    }

    public function cetak_index()
    {
        $keyword = request()->input('keyword');
        $user = Auth::user()->name;

        if ($keyword) {
            $logs = Log::where('log', 'Fix Cetak Tabungan')
                ->where('update_user', $user)
                ->where('nama_nasabah', 'like', '%' . $keyword . '%')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $logs = Log::where('log', 'Fix Cetak Tabungan')
                ->where('update_user', $user)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }

        return view('update-cetak.index', [
            'data' => $logs,
        ]);
    }

    public function cetak_search(Request $request)
    {
        $user = Auth::user()->name;
        $logs = Log::where('log', 'Fix Cetak Tabungan')
            ->where('update_user', $user)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $request->validate([
            'noacc' => 'required',
        ]);

        $noacc = $request->input('noacc');
        $tabungan = TabunganB::where('noacc', 'like', '%' . $noacc . '%')->first();

        if ($tabungan) {
            return view('update-cetak.search', [
                'tabungan' => $tabungan,
                'data' => $logs,
            ]);
        } else {
            return redirect('/cetak/tabungan');
        }
    }

    public function cetak_update(Request $request)
    {
        $noacc  = $request->input('noacc');

        $data = [
            'log'          => 'Fix Cetak Tabungan',
            'nocif'        => request()->input('nocif'),
            'noacc'        => request()->input('noacc'),
            'nama_nasabah' => request()->input('nama'),
            'nohp'         => '',
            'update_user'  => Auth::user()->name,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];

        $request->validate([
            'nama' => 'required|string',
        ]);

        DB::connection('sqlsrv')->table('m_tabunganb')->where('noacc', $noacc)->update(['kodeprd' => $request->input('kodeprd')]);
        DB::connection('sqlsrv')->table('m_tabunganc')->where('noacc', $noacc)->update(['kodeprd' => $request->input('kodeprd')]);
        Log::insert($data);
        return redirect('/cetak/tabungan')->with('success', 'Fix Cetak Tabungan successfully');
    }
}
