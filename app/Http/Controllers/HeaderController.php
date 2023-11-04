<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\SubHeader;
use Illuminate\Validation\Rule;
use Carbon\Carbon;



class HeaderController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $data = Header::all();
        $subdata = SubHeader::all();

        return view('admin.header', [
            "title" => "Header",
            "dropdown1" => "Komponen Website",
            "header" => $data,
            "subheader" => $subdata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'header' => 'required',
            'link' => 'required',
            'urutan' => [
                'required',
                'unique:headers,urutan',
            ],
        ], [
            'unique' => 'Nomor Urut Tidak Boleh Sama'
        ]);

        Header::create($validateData);

        return redirect()->back()->with('toast_success', 'Header Berhasil di!');
    }

    public function createsub(Request $request)
    {
        $validateData = $request->validate([
            'subheader' => 'required',
            'link' => 'required',
            'urutan' => [
                'required',
                Rule::unique('sub_headers')->where(function ($query) use ($request) {
                    return $query->where('urutan', $request->urutan)->where('header_id', $request->header_id);
                }),
            ],
            'header_id' => 'required'
        ], [
            'urutan.unique' => 'Nomor Urut tidak boleh sama untuk Header ini'
        ]);

        SubHeader::create($validateData);

        return redirect()->back()->with('toast_success', 'Sub Header Berhasil di!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'header' => 'required',
            'link' => 'required',
            'urutan' => 'required',
        ]);

        // Cek apakah nomor urut yang akan diupdate sudah ada di database
        $existingHeader = Header::where('urutan', $validateData['urutan'])
            ->where('id', '!=', $id) // Exclude the current record being updated
            ->first();

        if ($existingHeader) {
            // Jika ditemukan nomor urut yang sama, tampilkan pesan error
            return redirect()->back()->withErrors(['urutan' => 'Nomor Urut Tidak Boleh Sama'])->withInput();
        }

        Header::where('id', $id)->update([
            'header' => $validateData['header'],
            'link' => $validateData['link'],
            'urutan' => $validateData['urutan'],
        ]);

        return redirect()->back()->with('toast_success', 'Data Header Berhasil diubah!');
    }


    public function updatesub(Request $request, $id)
    {
        $validateData = $request->validate([
            'subheader' => 'required',
            'link' => 'required',
            'urutan' => 'required',
            'header_id' => 'required'
        ]);

        // Mengambil data SubHeader yang akan diupdate
        $subHeaderToUpdate = SubHeader::find($id);

        // Jika nomor urut yang baru sama dengan nomor urut yang lama, tidak perlu validasi tambahan
        if ($subHeaderToUpdate->urutan != $validateData['urutan']) {
            // Cek apakah nomor urut yang akan diupdate sudah ada di database
            $existingHeader = SubHeader::where('urutan', $validateData['urutan'])
                ->where('header_id', $validateData['header_id'])
                ->first();

            if ($existingHeader) {
                // Jika ditemukan nomor urut yang sama, tampilkan pesan error
                return redirect()->back()->withErrors(['urutan' => 'Nomor Urut Tidak Boleh Sama'])->withInput();
            }
        }

        SubHeader::where('id', $id)->update([
            'subheader' => $validateData['subheader'],
            'link' => $validateData['link'],
            'urutan' => $validateData['urutan'],
            'header_id' => $validateData['header_id'],
        ]);

        return redirect()->back()->with('toast_success', 'Data Sub Header Berhasil diubah!');
    }

    public function hapus($id)
    {
        $data = Header::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Header Tidak Ditemukan!');
        }

        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Header Berhasil dihapus!');
    }

    public function destroysub($id)
    {
        $data = SubHeader::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Header Tidak Ditemukan!');
        }

        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Header Berhasil dihapus!');
    }

    public function checkSubheaders($id)
    {
        $header = Header::find($id);

        if (!$header) {
            return response()->json(['hasSubheaders' => false]);
        }

        $hasSubheaders = $header->subheader()->exists();

        return response()->json(['hasSubheaders' => $hasSubheaders]);
    }
}
