<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmaTabunganTemp extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'cma_tabungan_temp';
}
