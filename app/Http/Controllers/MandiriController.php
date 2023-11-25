<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MandiriController extends Controller
{
    public function index()
    {
        return view('bo.page.mandiri.dashboard', [
            'title' => 'Profile Penduduk'
        ]);
    }
    public function surat()
    {
        return view('bo.page.mandiri.buat-surat', [
            'title' => 'Buat Surat Mandiri'
        ]);
    }
}
