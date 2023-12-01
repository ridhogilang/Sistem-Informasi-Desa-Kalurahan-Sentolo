<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasimandiriController extends Controller
{
    public function index()
    {
        return view('bo.page.surat.validasi.mandiri',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Verifikasi Surat Mandiri'
        ]);
    }
}
