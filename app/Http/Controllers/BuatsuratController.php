<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatsuratController extends Controller
{
    public function index()
    {
        return view('bo.page.mandiri.buat-surat', [
            'title' => 'Buat Surat Mandiri'
        ]);
    }
}
