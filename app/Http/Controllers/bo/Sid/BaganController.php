<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBaganRequest;
use App\Models\Agenda;
use App\Models\Jadwal;
use App\Models\Sinergi;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        $sinergi = Sinergi::all();
        $agenda = Agenda::all();
        $statistik = Statistik::all();

        return view('bo.page.sid.bagan', [
            "title" => "Bagan",
            "dropdown1" => "Komponen Website",
            "jadwal" => $jadwal,
            "sinergi" => $sinergi,
            "agenda" => $agenda,
            "statistik" => $statistik,
        ]);
    }

    public function createagenda(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'koordinator' => 'required',
        ]);

        Agenda::create($validateData);

        return redirect()->back()->with('toast_success', 'Header Berhasil di!');
    }

    public function createjadwal(Request $request)
    {
        $validateData = $request->validate([
            'hari' => 'required',
            'waktu' => 'required',
            'note' => 'nullable',
        ]);

        Jadwal::create($validateData);

        return redirect()->back()->with('toast_success', 'Header Berhasil di!');
    }

    public function createsinergi(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'link' => '',
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);

        // Upload dan simpan file gambar
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar-sinergi'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['gambar'] = $gambarPath;

        // dd($validateData);

        Sinergi::create($validateData);

        return redirect()->back()->with('toast_success', 'Poster Pamong Berhasil Di tambahkan');
    }

    public function createstatistik(Request $request)
    {
        $validateData = $request->validate([
            'lk' => 'required',
            'pr' => 'required',
        ]);

        Statistik::create($validateData);

        return redirect()->back()->with('toast_success', 'Data Statistik Berhasil Dibuat!');
    }

    public function updateagenda(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'koordinator' => 'required',
        ]);

        $agenda = Agenda::find($id);
        $agenda->judul = $request->input('judul');
        $agenda->tanggal = $request->input('tanggal');
        $agenda->waktu = $request->input('waktu');
        $agenda->lokasi = $request->input('lokasi');
        $agenda->koordinator = $request->input('koordinator');

        // Simpan perubahan
        $agenda->save();

        return redirect()->back()->with('toast_success', 'Data Agenda Berhasil diubah!');
    }
    public function updatejadwal(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'waktu' => 'required',
            'note' => 'nullable',
        ]);

        $jadwal = Jadwal::find($id);
        $jadwal->hari = $request->input('hari');
        $jadwal->waktu = $request->input('waktu');
        $jadwal->note = $request->input('note');

        // Simpan perubahan
        $jadwal->save();
        return redirect()->back()->with('toast_success', 'Data Jadwal Berhasil diubah!');
    }

    public function updatesinergi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'link' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg', // Mengizinkan format PNG, JPG, dan JPEG
        ], [
            'gambar.mimes' => 'Gambar hanya boleh dalam format PNG, JPG, atau JPEG.',
        ]);

        $sinergi = Sinergi::find($id);

        if (!$sinergi) {
            return redirect()->back()->with('toast_error', 'Data sinergi tidak ditemukan.');
        }

        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($sinergi->gambar)) {
                Storage::delete($sinergi->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/gambar-sinergi');

            // Update kolom 'gambar' dengan path gambar baru
            $sinergi->gambar = $gambarPath;
        } else {
            // Jika tidak ada pembaruan pada gambar, gunakan gambar yang sudah ada
            $sinergi->gambar = $request->input('gambar_existing');
        }

        $sinergi->nama = $request->input('nama');
        $sinergi->link = $request->input('link');
        $sinergi->save();

        return redirect()->back()->with('toast_success', 'Data Sinergi Berhasil diubah!');
    }

    public function updatestatistik(Request $request, $id)
    {
        $request->validate([
            'lk' => 'required',
            'pr' => 'required',
        ]);

        $statistik = Statistik::find($id);
        $statistik->lk = $request->input('lk');
        $statistik->pr = $request->input('pr');

        // Simpan perubahan
        $statistik->save();
        return redirect()->back()->with('toast_success', 'Data Statistik Berhasil diubah!');
    }


    public function destroyagenda($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return redirect()->back()->with('toast_success', 'Data Menu Tidak Ditemukan!');
        }

        // Hapus data dari database
        $agenda->delete();

        return redirect()->back()->with('toast_success', 'Data Agenda Berhasil dihapus!');
    }


    public function destroyjadwal($id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return redirect()->back()->with('toast_success', 'Data Jadwal Tidak Ditemukan!');
            // Hapus data dari database
        }
        $jadwal->delete();
        return redirect()->back()->with('toast_success', 'Data Jadwal Berhasil dihapus!');
    }

    public function destroysinergi($id)

    { {
            $sinergi = Sinergi::find($id);

            if (!$sinergi) {
                return redirect()->back()->with('toast_success', 'Data Menu Tidak Ditemukan!');
            }

            // Hapus gambar terlebih dahulu jika ada
            if (Storage::exists($sinergi->gambar)) {
                Storage::delete($sinergi->gambar);
            }

            // Hapus data dari database
            $sinergi->delete();

            return redirect()->back()->with('toast_success', 'Data Sinergi Berhasil dihapus!');
        }
    }

    public function destroystatistik($id)

    {
        $statistik = Statistik::find($id);

        if (!$statistik) {
            return redirect()->back()->with('toast_success', 'Data Statistik Tidak Ditemukan!');
            // Hapus data dari database
        }
        $statistik->delete();
        return redirect()->back()->with('toast_success', 'Data Statistik Berhasil dihapus!');
    }
}
