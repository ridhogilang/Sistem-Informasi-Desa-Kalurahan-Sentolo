<?php

namespace App\Http\Controllers\bo\Surat\validasi;

use App\Http\Controllers\Controller;

use App\Models\Buatsurat;
use Illuminate\Http\Request;

class ValidasimandiriController extends Controller
{
    public function index()
    {
        $buatsurat = Buatsurat::all();
        return view('bo.page.surat.validasi.mandiri',[
            'dropdown1' => '',
            'dropdown2' => '',
            'title' => 'Verifikasi Surat Pelayanan Mandiri'
        ])->with('buatsurat',$buatsurat);
    }
    public function updateStatus(Request $request, $id)
    {
        $record = $request->validate([
            'status_blanko' => 'required',
        ]);
        Buatsurat::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Berhasil mengubah Status!');
    }
}
