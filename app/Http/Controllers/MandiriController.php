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
    public function pesan()
    {
        return view('bo.page.mandiri.buat-pesan', [
            'title' => 'Buat Pesan'
        ]);
    }
    public function bantuan()
    {
        return view('bo.page.mandiri.bantuan', [
            'title' => 'Bantuan Penduduk'
        ]);
    }
}
