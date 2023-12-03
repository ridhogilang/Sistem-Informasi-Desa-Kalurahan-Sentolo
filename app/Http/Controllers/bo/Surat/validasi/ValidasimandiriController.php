<?php

namespace App\Http\Controllers\bo\Surat\validasi;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ValidasimandiriController extends Controller
{
    public function index()
    {
        return view('bo.page.surat.validasi.mandiri',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Verifikasi Surat Pelayanan Mandiri'
        ]);
    }
}
