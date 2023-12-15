<?php

namespace App\Http\Controllers\bo\Surat\validasi;

use App\Http\Controllers\Controller;

use App\Models\Buatsurat;
use Illuminate\Http\Request;
use Storage;

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
    public function updateFile(Request $request, $id)
    {
        $smandiri = Buatsurat::find($id);
        $record = $request->validate([
            'dokumen' => [
                'required',
                'mimes:pdf',
            ],
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            Storage::delete('public/surat-mandiri/' . $smandiri->dokumen);
            $file = $request->file('dokumen');
            $fileName = 'SURAT-MANDIRI-' . $smandiri->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat-mandiri', $fileName);
            $record['dokumen'] = $fileName;
        }

        Buatsurat::where('id', $id)->update($record);
        return redirect()->back()->with('toast_success', 'Berhasil mengupload File!');
    }
}
