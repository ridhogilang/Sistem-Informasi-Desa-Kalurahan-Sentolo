<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Storage;

class PendudukController extends Controller
{
    public function info($nik)
    {
        $penduduk = Penduduk::where('nik', $nik)->first();
        return response()->json($penduduk);
    }
    public function index()
    {
        $penduduk = Penduduk::all();
        return view('bo.page.penduduk.table-penduduk', [
            'title' => 'Data Penduduk'
        ])->with('penduduk', $penduduk);
    }
    public function create($action) {
        return view('bo.page.penduduk.form-penduduk', [
            'title' => 'Tambah Data Penduduk',
            'action' => $action
        ]);
    }
    public function store(Request $request)
    {
        $record = $request->validate([
            'nik' => 'required|min:16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'nomor_telepon' => 'required',
            'penghasilan' => 'required',
            'foto_penduduk' => 'nullable|mimes:jpg,jpeg,png',
            'nomor_kk' => 'required|min:16',
            'nomor_ktp' => 'required|min:16',
            'kontak_darurat' => 'required',
        ], [
            'mimes' => 'File tidak valid.',
            'min' => 'Nomor minimal 16 digit'
        ]);

        // Upload file ke Google Drive
        if ($request->hasFile('foto_penduduk')) {
            $file = $request->file('foto_penduduk');
            $fileName = 'FOTO-' . $request->nama . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            Storage::disk('google')->put('Foto Penduduk/' .$fileName, file_get_contents($file));
            $record['foto_penduduk'] = $fileName;

            $publicUrl = Storage::disk('google')->url('Foto Penduduk/' . $fileName);
            $record['link_foto'] = $publicUrl;
        }
        $record['status_nyawa'] = 'Hidup';

        //menginputkan data penduduk
        Penduduk::create($record);
        return redirect('/penduduk')->with('toast_success', 'Data Disimpan!');
    }
    public function edit($id, $action)
    {
        $penduduk = Penduduk::find($id);
        return view('bo.page.penduduk.form-penduduk', [
            'title' => 'Edit Data Penduduk',
            'action' => $action
        ])->with('penduduk', $penduduk);
    }
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);

        $record = $request->validate([
            'nik' => 'required|min:16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'nomor_telepon' => 'required',
            'penghasilan' => 'required',
            'foto_penduduk' => 'nullable|mimes:jpg,jpeg,png',
            'nomor_kk' => 'required|min:16',
            'nomor_ktp' => 'required|min:16',
            'status_nyawa' => 'required',
            'kontak_darurat' => 'required',
            'keterangan_kematian' => 'nullable',
            'status_migrasi' => 'nullable',
            'status_pajak' => 'nullable',
        ], [
            'mimes' => 'File tidak valid.',
            'min' => 'Nomor minimal 16 digit'
        ]);

        if ($request->hasFile('foto_penduduk')) {
            // Hapus file foto_penduduk lama di Google Drive jika ada
            Storage::disk('google')->delete('Foto Penduduk/' . $penduduk->foto_penduduk);

            $file = $request->file('foto_penduduk');
            $fileName = 'FOTO-' . $request->nama . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            Storage::disk('google')->put('Foto Penduduk/' . $fileName, file_get_contents($file));
            $record['foto_penduduk'] = $fileName;
            // Dapatkan URL publik ke file di Google Drive
            $publicUrl = Storage::disk('google')->url('Foto Penduduk/' . $fileName);
            $record['link_foto'] = $publicUrl;
        }

        Penduduk::where('id', $id)->update($record);
        return redirect('/penduduk')->with('toast_success', 'Data Diubah!');
    }
    public function destroy($id)
    {
        // Temukan data Surat Masuk berdasarkan ID
        $penduduk = Penduduk::find($id);
        // Hapus file dari Google Drive
        $filePath = 'Surat Masuk/' . $penduduk->dokumen;
        // Periksa apakah file ada di Google Drive dan hapus jika ada
        if (Storage::disk('google')->exists($filePath)) {
            Storage::disk('google')->delete($filePath);
        }
        // Hapus record dari database
        $penduduk->delete();

        return redirect('/penduduk')->with('toast_success', 'Data Dihapus!');
    }
}
