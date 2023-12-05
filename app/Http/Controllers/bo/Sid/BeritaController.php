<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Statistik;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Google\Service\Monitoring\CloudFunctionV2Target;
use Illuminate\Support\Facades\DB;


class BeritaController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        $data = Berita::whereIn('kategoriberita_id', [1, 2, 3])
            ->where('tampil', true)
            ->get();
        $kategori = KategoriBerita::whereIn('id', [1, 2, 3])->get();

        return view('bo.page.sid.berita.berita', [
            "title" => "Berita",
            "dropdown1" => "Komponen Berita",
            "berita" => $data,
            "kategori" => $kategori,
        ]);
    }

    public function berita_kontributor()
    {
        $data = Berita::whereIn('kategoriberita_id', [1, 2, 3])
            ->where('tampil', false)
            ->get();
        $kategori = KategoriBerita::whereIn('id', [1, 2, 3])->get();

        return view('bo.page.sid.berita.berita_kontributor', [
            "title" => "Berita Kontributor",
            "dropdown1" => "Komponen Berita",
            "berita" => $data,
            "kategori" => $kategori,
        ]);
    }

    public function artikel()
    {
        $artikel = Berita::where('kategoriberita_id', 4)->get();
        $kategori = KategoriBerita::whereIn('id', [4])->get();

        return view('bo.page.sid.artikel.artikel', [
            "title" => "Artikel",
            "artikel" => $artikel,
            "kategori" => $kategori,
            "dropdown1" => "Komponen Artikel",
        ]);
    }

    public function indexkomentar()
    {
        $data = Komentar::whereIn('kategoriberita_id', [1, 2, 3])
            ->where('status', false)
            ->get();

        $data2 = Komentar::whereIn('kategoriberita_id', [1, 2, 3])
            ->where('status', true)
            ->get();


        return view('bo.page.sid.berita.komentar', [
            "title" => "Komentar Berita",
            "dropdown1" => "Komponen Berita",
            "komentar" => $data,
            "setuju" => $data2,
        ]);
    }

    public function komentarartikel()
    {
        $data = Komentar::whereIn('kategoriberita_id', [4])
            ->where('status', false)
            ->get();

        $data2 = Komentar::whereIn('kategoriberita_id', [4])
            ->where('status', true)
            ->get();


        return view('bo.page.sid.berita.komentar', [
            "title" => "Komentar Artikel",
            "dropdown1" => "Komponen Artikel",
            "komentar" => $data,
            "setuju" => $data2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'gambar' => [
                'required',
                'file',
                'mimes:jpeg,png,gif',
            ],
            'kategoriberita_id' => 'required',
            'artikel' => 'required',
        ], [
            'mimes' => 'Gambar hanya boleh dalam format foto.',
        ]);

        // Upload dan simpan file gambar
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('gambar-berita'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai

        $validateData['gambar'] = $gambarPath;
        $validateData['ringkasan'] = Str::limit(strip_tags($request->artikel, 300));

        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);

        // Memeriksa apakah slug sudah ada dalam basis data
        $existingSlug = Berita::where('slug', $slug)->first();

        if ($existingSlug) {
            // Jika slug sudah ada, tambahkan logika untuk menghasilkan slug yang unik atau tampilkan pesan kesalahan.
            // Misalnya, Anda bisa menambahkan angka ke slug sampai mendapatkan yang unik.
            $counter = 1;
            while ($existingSlug) {
                $slug = $slug . '-' . $counter;
                $existingSlug = Berita::where('slug', $slug)->first();
                $counter++;
            }
        }

        // Simpan data artikel ke basis data dengan slug yang unik
        $validateData['slug'] = $slug;

        // dd($validateData);

        Berita::create($validateData);

        return redirect()->back()->with('toast_success', 'Berita Berhasil di!');
    }

    public function tambah_artikel(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'gambar' => [
                'nullable',
                'file',
                'mimes:jpeg,png,gif',
            ],
            'kategoriberita_id' => 'required',
            'artikel' => 'nullable',
            'link' => 'nullable',
            'kategori_link' => 'nullable',
        ], [
            'mimes' => 'Gambar hanya boleh dalam format foto.',
        ]);

        // Upload dan simpan file gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar-artikel'); // Ganti 'folder-tujuan' dengan direktori penyimpanan yang sesuai
            $validatedData['gambar'] = $gambarPath;
        } else {
            // Jika tidak ada gambar yang diunggah, hilangkan 'gambar' dari array $validatedData
            $validatedData['gambar'] = null; // Set kolom 'gambar' ke null jika tidak ada gambar yang diunggah
        }

        if ($request->has('artikel') && $request->artikel) {
            // Jika ada artikel yang diinput
            $artikel = $request->artikel;
            $validatedData['ringkasan'] = Str::limit(strip_tags($artikel, 300));
        } else {
            // Jika artikel tidak ada atau kosong
            $validatedData['ringkasan'] = null;
        }
        // Menghasilkan slug
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);

        // Memeriksa apakah slug sudah ada dalam basis data
        $existingSlug = Berita::where('slug', $slug)->first();

        if ($existingSlug) {
            // Jika slug sudah ada, tambahkan logika untuk menghasilkan slug yang unik atau tampilkan pesan kesalahan.
            // Misalnya, Anda bisa menambahkan angka ke slug sampai mendapatkan yang unik.
            $counter = 1;
            while ($existingSlug) {
                $slug = $slug . '-' . $counter;
                $existingSlug = Berita::where('slug', $slug)->first();
                $counter++;
            }
        }

        // Simpan data artikel ke basis data dengan slug yang unik
        $validatedData['slug'] = $slug; // Menambahkan slug ke dalam data yang divalidasi

        // dd($validatedData);
        Berita::create($validatedData);

        return redirect()->back()->with('toast_success', 'Artikel Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Berita::find($id);
        $kategori = KategoriBerita::all();

        return view('bo.page.sid.berita.show', [
            "title" => "Berita",
            "dropdown1" => "Komponen Website",
            "berita" => $data,
            "kategori" => $kategori,
        ]);
    }

    public function show_artikel(string $id)
    {
        $data = Berita::find($id);
        $kategori = KategoriBerita::all();

        return view('bo.page.sid.artikel.show', [
            "title" => "Artikel",
            "dropdown1" => "Komponen Website",
            "artikel" => $data,
            "kategori" => $kategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'gambar' => [
                'file',
                'mimes:jpeg,png,gif',
            ],
            'kategoriberita_id' => 'required',
            'artikel' => 'required',
        ], [
            'mimes' => 'Gambar hanya boleh dalam format foto.',
        ]);

        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->back()->with('toast_error', 'Data berita tidak ditemukan.');
        }

        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($berita->gambar)) {
                Storage::delete($berita->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar-berita');

            // Update kolom 'gambar' dengan path gambar baru
            $berita->gambar = $gambarPath;
        } else {
            // Jika tidak ada pembaruan pada gambar, gunakan gambar yang sudah ada
            $berita->gambar = $request->input('gambar_existing');
        }

        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);

        // Memeriksa apakah slug sudah ada dalam basis data
        $existingSlug = Berita::where('slug', $slug)->first();

        if ($existingSlug) {
            // Jika slug sudah ada, tambahkan logika untuk menghasilkan slug yang unik atau tampilkan pesan kesalahan.
            // Misalnya, Anda bisa menambahkan angka ke slug sampai mendapatkan yang unik.
            $counter = 1;
            while ($existingSlug) {
                $slug = $slug . '-' . $counter;
                $existingSlug = Berita::where('slug', $slug)->first();
                $counter++;
            }
        }

        // Simpan data artikel ke basis data dengan slug yang unik
        $berita->slug = $slug;

        $berita->judul = $request->input('judul');
        $berita->slug = $request->input('slug');
        $berita->penulis = $request->input('penulis');
        $berita->ringkasan = Str::limit(strip_tags($request->input('ringkasan')), 300);
        $berita->tanggal = $request->input('tanggal');
        $berita->kategoriberita_id = $request->input('kategoriberita_id');
        $berita->artikel = $request->input('artikel');
        $berita->save();

        return redirect('/admin/sistem-informasi/berita')->with('toast_success', 'Data Berita Berhasil diubah!');
    }

    public function updateStatus(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Mengubah input boolean menjadi 1 atau 0
        $status = $request->input('status') ? 1 : 0;

        $berita->status = $status;
        $berita->save();

        $toastMessage = $status ? 'Berita sudah ditampilkan di Halaman Highlight!' : 'Berita dihapus dari Halaman Highlight!';

        return redirect('/admin/sistem-informasi/berita')->with('toast_success', $toastMessage);
    }

    public function updateSideBerita(Request $request, $id)
    {
        $selectedNewsId = $request->input('news_id');

        // Mengubah status semua berita menjadi false
        Berita::where('id', '!=', $selectedNewsId)->update(['sideberita' => false]);

        // Mengubah status berita yang dipilih menjadi true
        $selectedNews = Berita::find($selectedNewsId);
        $selectedNews->sideberita = true;
        $selectedNews->save();

        return redirect()->back()->with('toast_success', 'Berita "' . $selectedNews->judul . '" sudah menjadi sideberita di halaman utama');
    }

    public function update_artikel(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'gambar' => [
                'nullable',
                'image', // Menggunakan 'image' untuk memeriksa file gambar
                'mimes:jpeg,png,gif',
            ],
            'kategoriberita_id' => 'required',
            'artikel' => 'nullable',
            'link' => 'nullable',
            'kategori_link' => 'nullable',
        ], [
            'mimes' => 'Gambar hanya boleh dalam format foto.',
        ]);

        $artikel = Berita::find($id);

        if (!$artikel) {
            return redirect()->back()->with('toast_error', 'Data artikel tidak ditemukan.');
        }

        // Periksa apakah ada pembaruan pada gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists($artikel->gambar)) {
                Storage::delete($artikel->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar-artikel');

            // Update kolom 'gambar' dengan path gambar baru
            $artikel->gambar = $gambarPath;
        }
        // Jika tidak ada gambar baru, pastikan gambar lama tetap ada
        else {
            $artikel->gambar = $request->input('gambar_existing');
        }

        if ($request->has('artikel')) {
            // Jika ada artikel yang diinput
            $artikel->artikel = $request->input('artikel');
            $artikel->ringkasan = Str::limit(strip_tags($artikel->artikel, 300));
        } else {
            // Jika artikel tidak ada atau kosong
            $artikel->artikel = null;
            $artikel->ringkasan = null;
        }

        if ($request->input('judul') !== $artikel->judul) {
            // Jika judul diubah, cek keberadaan slug yang baru
            $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);

            // Memeriksa apakah slug baru sudah ada dalam basis data
            $existingSlug = Berita::where('slug', $slug)->where('id', '<>', $id)->first();

            if ($existingSlug) {
                // Jika slug baru sudah ada, tambahkan logika untuk menghasilkan slug yang unik.
                $counter = 1;
                while ($existingSlug) {
                    $slug = $request->slug . '-' . $counter;
                    $existingSlug = Berita::where('slug', $slug)->first();
                    $counter++;
                }
            }

            // Setel slug yang baru
            $artikel->slug = $slug;
        }

        $artikel->judul = $request->input('judul');
        $artikel->penulis = $request->input('penulis');
        $artikel->tanggal = $request->input('tanggal');
        $artikel->kategoriberita_id = $request->input('kategoriberita_id');
        $artikel->link = $request->input('link');
        $artikel->kategori_link = $request->input('kategori_link');
        $artikel->save();

        return redirect('/admin/sistem-informasi/berita')->with('toast_success', 'Data Artikel Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Berita::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Artikel Tidak Ditemukan!');
        }

        // Hapus gambar terlebih dahulu jika ada
        if (Storage::exists($data->gambar)) {
            Storage::delete($data->gambar);
        }

        // Hapus data dari database
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Artikel Berhasil dihapus!');
    }

    public function destroy_artikel(string $id)
    {
        $data = Berita::find($id);

        if (!$data) {
            return redirect()->back()->with('toast_success', 'Data Artikel Tidak Ditemukan!');
        }

        // Hapus gambar terlebih dahulu jika ada
        if ($data->gambar && Storage::exists($data->gambar)) {
            Storage::delete($data->gambar);
        }

        // Hapus data dari database
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Artikel Berhasil dihapus!');
    }

    public function TampilkanBerita($id)
    {
        // Temukan berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Ubah nilai kolom 'tampil' menjadi true
        $berita->update(['tampil' => true]);

        return redirect()->back()->with('toast_success', 'Berita Berhasil ditampilkan!');

    }
}
