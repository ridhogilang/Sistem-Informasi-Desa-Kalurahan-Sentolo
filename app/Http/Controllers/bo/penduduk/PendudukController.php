<?php

namespace App\Http\Controllers\bo\penduduk;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PenghapusanPenduduk;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\Facades\Datatables;
use App\Exports\PendudukExport;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    public function info($nik)
    {
        $penduduk = Penduduk::where('nik', $nik)->first();
        return response()->json($penduduk);
    }
    public function index()
    {
        // $penduduk = Penduduk::where('is_active', '=' , '1')->get();
        return view('bo.page.penduduk.table-penduduk', [
            'title' => 'Data Penduduk'
        ]);
    }
    public function datasaktif(Request $request)
    {
        $searchTerm = $request->input('q');
        $penduduk = Penduduk::select('id', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')
                    ->where('nama', 'like', "%$searchTerm%")
                    ->orwhere('nik', 'like', "%$searchTerm%")
                    ->orwhere('jenis_kelamin', 'like', "%$searchTerm%")
                    ->orwhere('tempat_lahir', 'like', "%$searchTerm%")
                    ->orwhere('tanggal_lahir', 'like', "%$searchTerm%")
                    ->where('is_active', '=', '1')
                    ->get();

        return Datatables::of($penduduk)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex"><a class="btn btn-warning mx-1" type="button" href="/admin/kependudukan/penduduk/'.$row["id"].'/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#migrasi_penduduk'.$row["id"].'"><i class="fa-solid fa-trash-can"></i></button>
                            <div class="modal fade" id="migrasi_penduduk'.$row["id"].'" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="/admin/kependudukan/penduduk/'.$row["id"].'/delete" method="POST" enctype="multipart/form-data">
                                                            ' . csrf_field() . '
                                                            ' . method_field("DELETE") . '
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                    '.$row["nama"].' ('.$row["nik"].')
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea type="text" name="catatan" class="form-control" id="catatan" rows="2" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <label for="dokumen" class="col-sm-3 col-form-label">Dokumen</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="file" name="dokumen" class="form-control" id="dokumen" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    public function migrasi()
    {
        return view('bo.page.penduduk.table-migrasi', [
            'title' => 'Data Penduduk Migrasi'
        ]);
    }
    public function datasnonaktif()
    {
        $penduduk = Penduduk::select('id', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')
                    ->where('is_active', '=', '0')
                    ->get();
        return Datatables::of($penduduk)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex"><a class="btn btn-warning mx-1" type="button" href="/admin/kependudukan/penduduk/'.$row["id"].'/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#migrasi_penduduk'.$row["id"].'"><i class="fa-solid fa-trash-can"></i></button>
                            <div class="modal fade" id="migrasi_penduduk'.$row["id"].'" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="/admin/kependudukan/penduduk-migrasi/'.$row["id"].'/delete" method="POST" enctype="multipart/form-data">
                                                            ' . csrf_field() . '
                                                            ' . method_field("DELETE") . '
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                    '.$row["nama"].' ('.$row["nik"].')
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea type="text" name="catatan" class="form-control" id="catatan" rows="2" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <label for="dokumen" class="col-sm-3 col-form-label">Dokumen</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="file" name="dokumen" class="form-control" id="dokumen" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
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
            // Storage::disk('google')->put('Foto Penduduk/' .$fileName, file_get_contents($file));
            $file->storeAs('public/foto_penduduk', $fileName);
            $record['foto_penduduk'] = $fileName;

            // $publicUrl = Storage::disk('google')->url('Foto Penduduk/' . $fileName);
            // $record['link_foto'] = $publicUrl;
        }
        $record['status_nyawa'] = 'Hidup';
        $record['is_active'] = '1';

        //menginputkan data penduduk
        Penduduk::create($record);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Disimpan!');
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
            // Hapus file foto_penduduk lama jika ada
            Storage::delete('public/foto_penduduk/' . $penduduk->foto_penduduk);

            $file = $request->file('foto_penduduk');
            $fileName = 'FOTO-' . $request->nama . '-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_penduduk', $fileName);
            $record['foto_penduduk'] = $fileName;

            // $publicUrl = Storage::disk('google')->url('Foto Penduduk/' . $fileName);
            // $record['link_foto'] = $publicUrl;
        }

        Penduduk::where('id', $id)->update($record);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Diubah!');
    }
    public function destroy(Request $request, $id)
    {
        $record = $request->validate([
            'catatan' => 'required',
            'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = 'DPBP-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            // Storage::disk('google')->put('Dokumen Penduduk/' .$fileName, file_get_contents($file));
            $file->storeAs('public/dokumen_penduduk_migrasi', $fileName);
            $record['dokumen'] = $fileName;

            // $publicUrl = Storage::disk('google')->url('Dokumen Penduduk/' . $fileName);
            // $record['link'] = $publicUrl;
        }
        $record['id'] = 'DPBP-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_penduduk'] = $id;
        $record['delete_by'] = auth()->user()->id;

        // dd($record);
        PenghapusanPenduduk::create($record);
        Penduduk::where('id', $id)->update(['is_active'=> '0']);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Dihapus!');
    }
    public function destroymigrasi(Request $request, $id)
    {
        $record = $request->validate([
            'catatan' => 'required',
            'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = 'DPBP-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            // Storage::disk('google')->put('Dokumen Penduduk/' .$fileName, file_get_contents($file));
            $file->storeAs('public/dokumen_penduduk', $fileName);
            $record['dokumen'] = $fileName;

            // $publicUrl = Storage::disk('google')->url('Dokumen Penduduk/' . $fileName);
            // $record['link'] = $publicUrl;
        }
        $record['id'] = 'DPBP-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_penduduk'] = $id;
        $record['delete_by'] = auth()->user()->id;

        // dd($record);
        PenghapusanPenduduk::create($record);
        Penduduk::where('id', $id)->update(['is_active'=> '1']);
        return redirect('/admin/kependudukan/penduduk-migrasi')->with('toast_success', 'Data Dihapus dari Migrasi!');
    }
    public function pendudukexport()
    {
        $namaFile = 'Penduduk-' . date('Y-m-d H-i-s') . '.xlsx';
        return Excel::download(new PendudukExport, $namaFile);
    }
    public function pendudukimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $path = Storage::putFileAs('public/import_penduduk', $file, $namaFile);

        Excel::import(new PendudukImport, storage_path('app/' . $path));
        Storage::delete($path);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Berhasil Diimport!');
    }
}
