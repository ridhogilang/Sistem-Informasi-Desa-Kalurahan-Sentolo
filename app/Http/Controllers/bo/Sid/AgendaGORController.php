<?php

namespace App\Http\Controllers\bo\Sid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgendaBalai;
use App\Models\AgendaGOR;
use Illuminate\Validation\Rule;


class AgendaGORController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendagor = AgendaGOR::all();
        $agendabalai = AgendaBalai::all();
        return view('bo.page.sid.agenda_gor', [
            "title" => "Agenda GOR & Balai",
            "dropdown1" => "Komponen Website",
            "agendagor" => $agendagor,
            "agendabalai" => $agendabalai,

        ]);
    }

    public function create(Request $request)
    {
        $createData = $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'selesai' => 'required',
            'koordinator' => 'required',
            'nomorhp' => 'required',
        ],[
            'required' => 'Lengkapi Data!',
        ]);

        // Validasi tambahan
        $existingAgendas = AgendaGOR::where('tanggal', $createData['tanggal'])
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

        AgendaGOR::create($createData);

        return redirect()->back()->with('toast_success', 'Agenda GOR Berhasil dibuat!');
    }



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
    
        $agendagor = AgendaGOR::find($id);
    
        // Validasi tambahan
        $existingAgendas = AgendaGOR::where('tanggal', $request->input('tanggal'))
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
    
        $agendagor->kegiatan = $request->input('kegiatan');
        $agendagor->tanggal = $request->input('tanggal');
        $agendagor->waktu = $request->input('waktu');
        $agendagor->selesai = $request->input('selesai');
        $agendagor->koordinator = $request->input('koordinator');
        $agendagor->nomorhp = $request->input('nomorhp');
    
        // Simpan perubahan
        $agendagor->save();
    
        return redirect()->back()->with('toast_success', 'Data Agenda GOR Berhasil diubah!');
    }
    

    public function destroy($id)
    {
        $agendagor = AgendaGOR::find($id);

        if (!$agendagor) {
            return redirect()->back()->with('toast_success', 'Data Agenda GOR Tidak Ditemukan!');
        }

        // Hapus data dari database
        $agendagor->delete();

        return redirect()->back()->with('toast_success', 'Data GOR Berhasil dihapus!');
    }
}
