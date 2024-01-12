<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositoController extends Controller
{
    public function index()
    {
        return view('update-deposito.index');
    }
}
