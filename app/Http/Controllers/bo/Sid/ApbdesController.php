<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApbdesRequest;
use App\Http\Requests\UpdateApbdesRequest;
use App\Models\Apbdes;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apbdes = Apbdes::first();

        return view('bo.page.sid.apbdes', [
            "title" => "APBDes",
            "dropdown1" => "Komponen Website",
            "apbdes" => $apbdes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createterpakai(Request $request)
    {
        $createData = $request->validate([
            'pendapatan_desa' => 'nullable',
            'belanja_desa' => 'nullable',
            'pembiayaan_desa' => 'nullable',
            //
            'hasil_usaha' => 'nullable',
            'hasilaset_desa'=> 'nullable',
            'dana_desa' => 'nullable',
            'bagihasil_pajak'  => 'nullable',
            'alokasidana_desa' => 'nullable',
            'koreksi_kesalahan' => 'nullable',
            'bunga_bank' => 'nullable',
            //
            'bdng_pp_desa' => 'nullable',
            'bdng_p_p_desa' => 'nullable',
            'bdng_p_k_desa' => 'nullable',
            'bdng_pm_desa' => 'nullable',
            'bdng_pbdm_desa' => 'nullable',
        ]);

        Apbdes::create($createData);

        return redirect()->back()->with('toast_success', 'APBDes  Terpakai Berhasil dibuat!');
    }
        
    public function createanggaran(Request $request)
    {
        $createData = $request->validate([
            'tahun' => 'nullable',
            'pendapatan_desa2' => 'nullable',
            'belanja_desa2' => 'nullable',
            'pembiayaan_desa2' => 'nullable',
            //
            'hasil_usaha2' => 'nullable',
            'hasilaset_desa2'=> 'nullable',
            'dana_desa2' => 'nullable',
            'bagihasil_pajak2'  => 'nullable',
            'alokasidana_desa2' => 'nullable',
            'koreksi_kesalahan2' => 'nullable',
            'bunga_bank2' => 'nullable',
            //
            'bdng_pp_desa2'=> 'nullable',
            'bdng_p_p_desa2'=> 'nullable',
            'bdng_p_k_desa2'=> 'nullable',
            'bdng_pm_desa2'=> 'nullable',
            'bdng_pbdm_desa2'=> 'nullable',
        ]);

        Apbdes::create($createData);

        return redirect()->back()->with('toast_success', ' Data Anggaran APBDes Berhasil dibuat!');
    }

  
    public function show(Apbdes $apbdes)
    {
        //
    }

    // APBDes Pelaksanaan
    public function updatepelaksanaan(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'nullable',
            //Terpakai
            'pendapatan_desa' => 'nullable',
            'belanja_desa' => 'nullable',
            'pembiayaan_desa' => 'nullable',
           //Angaran
            'pendapatan_desa2' => 'nullable',
            'belanja_desa2' => 'nullable',
            'pembiayaan_desa2' => 'nullable',
        ]);

        $apbdes = Apbdes::find($id);
        $apbdes->tahun = str_replace(['Rp.', '.'], '', $request->input('tahun'));
        $apbdes->pendapatan_desa = str_replace(['Rp.', '.'], '', $request->input('pendapatan_desa'));
        $apbdes->belanja_desa = str_replace(['Rp.', '.'], '', $request->input('belanja_desa'));
        $apbdes->pembiayaan_desa = str_replace(['Rp.', '.'], '', $request->input('pembiayaan_desa'));
        //
        $apbdes->pendapatan_desa2 = str_replace(['Rp.', '.'], '', $request->input('pendapatan_desa2'));
        $apbdes->belanja_desa2 = str_replace(['Rp.', '.'], '', $request->input('belanja_desa2'));
        $apbdes->pembiayaan_desa2 = str_replace(['Rp.', '.'], '', $request->input('pembiayaan_desa2'));

        // Simpan perubahan
        $apbdes->save();

        return redirect()->back()->with('toast_success', 'Data APBDes Pelaksanaan Berhasil diubah!');
    }

    // APBDes Pendapatan 
    public function updatependapatan(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'nullable',
             //Terpakai
             'hasil_usaha' => 'nullable',
             'hasilaset_desa'=> 'nullable',
             'dana_desa' => 'nullable',
             'bagihasil_pajak'  => 'nullable',
             'alokasidana_desa' => 'nullable',
             'koreksi_kesalahan' => 'nullable',
             'bunga_bank' => 'nullable',
            //Angaran
            'hasil_usaha2' => 'nullable',
            'hasilaset_desa2'=> 'nullable',
            'dana_desa2' => 'nullable',
            'bagihasil_pajak2'  => 'nullable',
            'alokasidana_desa2' => 'nullable',
            'koreksi_kesalahan2' => 'nullable',
            'bunga_bank2' => 'nullable',
        ]);

        $apbdes = Apbdes::find($id);
        $apbdes->tahun = str_replace(['Rp.', '.'], '', $request->input('tahun'));
        $apbdes->hasil_usaha = str_replace(['Rp.', '.'], '', $request->input('hasil_usaha'));
        $apbdes->hasilaset_desa = str_replace(['Rp.', '.'], '', $request->input('hasilaset_desa'));
        $apbdes->dana_desa = str_replace(['Rp.', '.'], '', $request->input('dana_desa'));
        $apbdes->bagihasil_pajak = str_replace(['Rp.', '.'], '', $request->input('bagihasil_pajak'));
        $apbdes->alokasidana_desa = str_replace(['Rp.', '.'], '', $request->input('alokasidana_desa'));
        $apbdes->koreksi_kesalahan = str_replace(['Rp.', '.'], '', $request->input('koreksi_kesalahan'));
        $apbdes->bunga_bank = str_replace(['Rp.', '.'], '', $request->input('bunga_bank'));
        //
        $apbdes->hasil_usaha2 = str_replace(['Rp.', '.'], '', $request->input('hasil_usaha2'));
        $apbdes->hasilaset_desa2 = str_replace(['Rp.', '.'], '', $request->input('hasilaset_desa2'));
        $apbdes->dana_desa2 = str_replace(['Rp.', '.'], '', $request->input('dana_desa2'));
        $apbdes->bagihasil_pajak2 = str_replace(['Rp.', '.'], '', $request->input('bagihasil_pajak2'));
        $apbdes->alokasidana_desa2 = str_replace(['Rp.', '.'], '', $request->input('alokasidana_desa2'));
        $apbdes->koreksi_kesalahan2 = str_replace(['Rp.', '.'], '', $request->input('koreksi_kesalahan2'));
        $apbdes->bunga_bank2 = str_replace(['Rp.', '.'], '', $request->input('bunga_bank2'));
       
        // Simpan perubahan
        $apbdes->save();

        return redirect()->back()->with('toast_success', 'Data APBDes Pendapatan Berhasil diubah!');
    }

    // APBDes Pembelajaan
    public function updatepembelanjaan(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'nullable',
            //Terpakai
            'bdng_pp_desa'=> 'nullable',
            'bdng_p_p_desa'=> 'nullable',
            'bdng_p_k_desa'=> 'nullable',
            'bdng_pm_desa'=> 'nullable',
            'bdng_pbdm_desa'=> 'nullable',
           //Angaran
           'bdng_pp_desa2'=> 'nullable',
           'bdng_p_p_desa2'=> 'nullable',
           'bdng_p_k_desa2'=> 'nullable',
           'bdng_pm_desa2'=> 'nullable',
           'bdng_pbdm_desa2'=> 'nullable',
        ]);

        $apbdes = Apbdes::find($id);
        $apbdes->tahun = str_replace(['Rp.', '.'], '', $request->input('tahun'));
        $apbdes->bdng_pp_desa =   str_replace(['Rp.', '.'], '',$request->input('bdng_pp_desa'));
        $apbdes->bdng_p_p_desa =  str_replace(['Rp.', '.'], '',$request->input('bdng_p_p_desa'));
        $apbdes->bdng_p_k_desa =  str_replace(['Rp.', '.'], '',$request->input('bdng_p_k_desa'));
        $apbdes->bdng_pm_desa =  str_replace(['Rp.', '.'], '',$request->input('bdng_pm_desa'));
        $apbdes->bdng_pbdm_desa =  str_replace(['Rp.', '.'], '',$request->input('bdng_pbdm_desa'));
        //
        $apbdes->bdng_pp_desa2 =   str_replace(['Rp.', '.'], '',$request->input('bdng_pp_desa2'));
        $apbdes->bdng_p_p_desa2 =  str_replace(['Rp.', '.'], '',$request->input('bdng_p_p_desa2'));
        $apbdes->bdng_p_k_desa2 =  str_replace(['Rp.', '.'], '',$request->input('bdng_p_k_desa2'));
        $apbdes->bdng_pm_desa2 =  str_replace(['Rp.', '.'], '',$request->input('bdng_pm_desa2'));
        $apbdes->bdng_pbdm_desa2 =  str_replace(['Rp.', '.'], '',$request->input('bdng_pbdm_desa2'));
        // Simpan perubahan
        $apbdes->save();

        return redirect()->back()->with('toast_success', 'Data APBDes Pelaksanaan Berhasil diubah!');
    }

    public function destroy($id)
    {
        $apbdes = Apbdes::find($id);

        if (!$apbdes) {
            return redirect()->back()->with('toast_success', 'Data APBDes Tidak Ditemukan!');
            // Hapus data dari database
        }
        $apbdes->delete();
        return redirect()->back()->with('toast_success', 'Data APBDes Berhasil dihapus!');
    }
}
