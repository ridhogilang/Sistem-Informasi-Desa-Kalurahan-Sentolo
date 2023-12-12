<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function index(){
        return view('bo.page.signature', [
            'title' => 'Tanda Tangan Online'
        ]);
    }
    // public function store(Request $request)
    // {
    //     $record = $request->validate([
    //         'nik' => 'required',
    //         'nama' => 'required',
    //         'signature' => [
    //             'required',
    //             'mimes:png',
    //         ],
    //     ], [
    //         'mimes' => 'File tidak valid.',
    //     ]);

    //     // Simpan file di storage lokal
    //     $file = $request->file('signature');
    //     $signature = 'TTD-' . $request->nik . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
    //     $file->storeAs('public/signature', $signature);
    //     $record['signature'] = $signature;

    //     Signature::create($record);
    //     return redirect()->back()->with('success', 'Tanda tangan telah tersimpan!');
    // }
    // public function store(Request $request){
    //     $folderPath = public_path('TTD/');
    //     $image_parts = explode(';base64,',$request->signature);
    //     $image_type_aux = explode('image/',$image_parts[0]);
    //     $image_type = $image_type_aux[1];
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $file = $folderPath . uniqid() . '.' . $image_type;
    //     @file_put_contents($file,$image_base64);
    //     return redirect()->back()->with('success', 'Tanda tangan telah tersimpan!');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $signatureData = $request->input('signature');

        $decodedSignature = base64_decode($signatureData);
        $filename = 'signature_' . time() . '_' . $nik . '.png';
        $folderPath = 'TTD';
        Storage::put($folderPath . '/' . $filename, $decodedSignature);

        Signature::create([
            'nik' => $nik,
            'nama' => $nama,
            'signature' => $folderPath . '/' . $filename,
        ]);

        return redirect()->back()->with('success', 'Signature has been saved successfully!');
    }
}
