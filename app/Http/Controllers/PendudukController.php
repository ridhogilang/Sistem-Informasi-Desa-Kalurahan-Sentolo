<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function info($nik)
    {
        $penduduk = Penduduk::where('nik', $nik)->first();

        return response()->json($penduduk);
    }
}
