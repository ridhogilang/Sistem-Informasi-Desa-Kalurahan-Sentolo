<?php

namespace App\Http\Controllers\bo\Sid;

use Illuminate\Http\Request;
use App\Models\AgendaBalai;
use App\Http\Controllers\Controller;

class AgendaBalaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $agendabalai = AgendaBalai::all();
    //     return view('bo.page.sid.agenda_gor', [
    //         "title" => "Bagan",
    //         "dropdown1" => "Komponen Website",
    //         "agendabalai" => $agendabalai,

    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $createData = $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'selesai' => 'required',
            'koordinator' => 'required',
            'nomorhp' => 'required',
        ]);

        // Validasi tambahan
        $existingAgendas = AgendaBalai::where('tanggal', $createData['tanggal'])
            ->where(function ($query) use ($createData) {
                $query->whereBetween('waktu', [$createData['waktu'], $createData['selesai']])
                    ->orWhereBetween('selesai', [$createData['waktu'], $createData['selesai']])
                    ->orWhere(function ($query) use ($createData) {
                        $query->where('waktu', '<=', $createData['waktu'])
                            ->where('selesai', '>=', $createData['selesai']);
                    });
            })
            ->get();

        if ($existingAgendas->count() > 0) {
            // Jika terdapat konflik waktu, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->with('toast_error', 'Konflik waktu! Agenda pada rentang waktu tersebut sudah terdaftar.');
        }
        AgendaBalai::create($createData);
       

        return redirect()->back()->with('toast_success', 'Agenda Balai Berhasil dibuat!');

    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'selesai' => 'required',
            'koordinator' => 'required',
            'nomorhp' => 'required',
        ]);
    
        $agendabalai = AgendaBalai::find($id);
    
        // Validasi tambahan
        $existingAgendas = AgendaBalai::where('tanggal', $request->input('tanggal'))
            ->where(function ($query) use ($request) {
                $query->whereBetween('waktu', [$request->input('waktu'), $request->input('selesai')])
                      ->orWhereBetween('selesai', [$request->input('waktu'), $request->input('selesai')])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('waktu', '<=', $request->input('waktu'))
                                ->where('selesai', '>=', $request->input('selesai'));
                      });
            })
            ->where('id', '<>', $id) // Exclude the current agenda being edited from the check
            ->get();
    
        if ($existingAgendas->count() > 0) {
            // Jika terdapat konflik waktu, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->with('toast_error', 'Konflik waktu! Agenda pada rentang waktu tersebut sudah terdaftar.');
        }
    
        $agendabalai->kegiatan = $request->input('kegiatan');
        $agendabalai->tanggal = $request->input('tanggal');
        $agendabalai->waktu = $request->input('waktu');
        $agendabalai->selesai = $request->input('selesai');
        $agendabalai->koordinator = $request->input('koordinator');
        $agendabalai->nomorhp = $request->input('nomorhp');
    
        // Simpan perubahan
        $agendabalai->save();
    
        return redirect()->back()->with('toast_success', 'Data Agenda Balai Berhasil diubah!');
    }

    
    public function destroy($id)
    {
        $agendabalai = AgendaBalai::find($id);

        if (!$agendabalai) {
            return redirect()->back()->with('toast_success', 'Data Agenda Balai Tidak Ditemukan!');
        }

        // Hapus data dari database
        $agendabalai->delete();

        return redirect()->back()->with('toast_success', 'Data Balai Berhasil dihapus!');
    }
}
