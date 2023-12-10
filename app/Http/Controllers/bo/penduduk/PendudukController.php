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
                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#penduduk'.$row["id"].'"><i class="fa-solid fa-trash-can"></i></button>
                            <div class="modal fade" id="penduduk'.$row["id"].'" tabindex="-1">
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
                                                                            <input type="file" name="dokumen" class="form-control" id="dokumen" accept=".doc, .docx, .pdf" required>
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
    public function bukanpenduduk()
    {
        return view('bo.page.penduduk.table-bukan-penduduk', [
            'title' => 'Data Bukan Penduduk'
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
                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#bukan_penduduk'.$row["id"].'"><i class="fa-solid fa-trash-can"></i></button>
                            <div class="modal fade" id="bukan_penduduk'.$row["id"].'" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="/admin/kependudukan/bukan-penduduk/'.$row["id"].'/delete" method="POST" enctype="multipart/form-data">
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
            'nomor_kk' => 'required|min:16',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'umur' => 'required',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_hubungan_kel' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ], [
            'min' => 'Nomor minimal 16 digit'
        ]);

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
            'nomor_kk' => 'required|min:16',
            'nik' => 'required|min:16',
            'jenis_kelamin' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'umur' => 'required',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_hubungan_kel' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ], [
            'min' => 'Nomor minimal 16 digit'
        ]);

        Penduduk::where('id', $id)->update($record);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Diubah!');
    }
    public function destroy(Request $request, $id)
    {
        $record = $request->validate([
            'catatan' => 'required',
            'dokumen' => 'required|mimes:doc,docx,pdf',
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = 'DPBP-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            // Storage::disk('google')->put('Dokumen Penduduk/' .$fileName, file_get_contents($file));
            $file->storeAs('public/bukan-penduduk', $fileName);
            $record['dokumen'] = $fileName;
        }
        $record['id'] = 'DPBP-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_penduduk'] = $id;
        $record['delete_by'] = auth()->user()->id;

        PenghapusanPenduduk::create($record);
        Penduduk::where('id', $id)->update(['is_active'=> '0']);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Dihapus!');
    }
    public function destroybukanp(Request $request, $id)
    {
        $record = $request->validate([
            'catatan' => 'required',
            'dokumen' => 'required|mimes:doc,docx,pdf',
        ], [
            'mimes' => 'File tidak valid.',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = 'DPBP-' . date('YmdHis') . '-' . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            // Storage::disk('google')->put('Dokumen Penduduk/' .$fileName, file_get_contents($file));
            $file->storeAs('public/penduduk', $fileName);
            $record['dokumen'] = $fileName;
        }
        $record['id'] = 'DPBP-'. date('YmdHis') . '-' . rand(100, 999);
        $record['id_penduduk'] = $id;
        $record['delete_by'] = auth()->user()->id;

        // dd($record);
        PenghapusanPenduduk::create($record);
        Penduduk::where('id', $id)->update(['is_active'=> '1']);
        return redirect('/admin/kependudukan/bukan-penduduk')->with('toast_success', 'Data Dihapus dari Bukan Penduduk!');
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
        $path = Storage::putFileAs('public/import-penduduk', $file, $namaFile);

        Excel::import(new PendudukImport, storage_path('app/' . $path));
        Storage::delete($path);
        return redirect('/admin/kependudukan/penduduk')->with('toast_success', 'Data Berhasil Diimport!');
    }
}
