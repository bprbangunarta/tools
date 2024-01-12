<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositoController extends Controller
{
    public function index()
    {
        $keyword = request()->input('keyword');
        $user = Auth::user()->name;

        if ($keyword) {
            $logs = Log::where('log', 'Update QQ Deposito')
                ->where('update_user', $user)
                ->where('nama_nasabah', 'like', '%' . $keyword . '%')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $logs = Log::where('log', 'Update QQ Deposito')
                ->where('update_user', $user)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }
        return view('update-deposito.index', [
            'data' => $logs,
        ]);
    }

    public function search(Request $request)
    {
        $user = Auth::user()->name;
        $logs = Log::where('log', 'Update QQ Deposito')
            ->where('update_user', $user)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $request->validate([
            'noacc' => 'required',
        ]);

        $noacc = $request->input('noacc');
        $deposito = Deposito::where('noacc', 'like', '%' . $noacc . '%')->first();

        if ($deposito) {
            return view('update-deposito.search', [
                'deposito' => $deposito,
                'data' => $logs,
            ]);
        } else {
            return redirect('/deposito');
        }
    }

    public function update(Request $request)
    {
        $noacc  = $request->input('noacc');

        $data = [
            'log'          => 'Update QQ Deposito',
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

        DB::connection('sqlsrv')->table('m_deposito')->where('noacc', $noacc)->update(['fnama' => $request->input('nama')]);
        Log::insert($data);
        return redirect('/deposito')->with('success', 'Update QQ Deposito successfully');
    }
}
