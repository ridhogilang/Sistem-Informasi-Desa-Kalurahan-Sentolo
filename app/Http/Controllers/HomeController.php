<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Apbdes;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Header;
use App\Models\Jadwal;
use App\Models\Menu;
use App\Models\Pamong;
use App\Models\Runningtext;
use App\Models\Sinergi;
use App\Models\Statistik;
use App\Models\Visitor;
use App\Models\SubHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Contracts\Cache\Store;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        // dd(request('cari'));

        $url = 'https://api.myquran.com/v1/sholat/jadwal/1503/' . date('Y') . '/' . date('m') . '/' . date('d');
        $waktu = json_decode(file_get_contents($url), true);

        $headers = Header::orderBy('urutan')->with('subheader')->get();
        $menu = Menu::orderBy('urutan')->get();

        $berita = Berita::orderBy('tanggal', 'desc')
            ->where(function ($query) {
                $query->whereIn('kategoriberita_id', [1, 2, 3]);
            })
            ->paginate(6);

        $semuaberita = Berita::whereIn('kategoriberita_id', [1, 2, 3])->paginate(12);
        $beritadesa = Berita::where('kategoriberita_id', 1)->paginate(12);
        $beritalokal = Berita::where('kategoriberita_id', 2)->paginate(12);
        $programkerja = Berita::where('kategoriberita_id', 3)->paginate(12);


        // Mengambil jumlah pengunjung hari ini
        $today = Carbon::today()->toDateString();
        $todayy = Carbon::today();
        $oneMonthAgo = $todayy->copy()->subMonth(); // Menghitung satu bulan yang lalu dari tanggal saat ini
        $todayVisitor = Visitor::where('date', $today)->first();
        $todayCount = $todayVisitor ? $todayVisitor->count : 0;

        // Mengambil jumlah pengunjung kemarin
        $yesterday = Carbon::yesterday()->toDateString();
        $yesterdayVisitor = Visitor::where('date', $yesterday)->first();
        $yesterdayCount = $yesterdayVisitor ? $yesterdayVisitor->count : 0;

        $totalVisitors = Visitor::sum('count');

        $highlight = Berita::where('status', true)->get();

        $text = Runningtext::where('id', 1)->first();

        $pamong = Pamong::all();

        $agenda_hari_ini = Agenda::where('tanggal', $today)->get();
        $agenda_yangakandatang = Agenda::where('tanggal', '>', $today)->get();
        $agenda_yangLalu = Agenda::where('tanggal', '>=', $oneMonthAgo)
            ->where('tanggal', '<', $today)
            ->get();
        $jadwal = Jadwal::all();
        $sinergi = Sinergi::all();
        $statistik = Statistik::first();
        $galeri = Galeri::all();
        $apbd = Apbdes::first();

        $sideberita = Berita::where('sideberita', true)->first();

        return view('home.home', [
            "title" => "ꦥꦼꦩꦼꦫꦶꦤ꧀ꦠꦃ ꦏꦭꦸꦫꦃꦲꦤ꧀ ꦱꦼꦤ꧀ꦠꦺꦴꦭꦺꦴ | Kalurahan Sentolo",
            "headers" => $headers,
            "menu" => $menu,
            "beritaterbaru" => $berita,
            "semuaberita" => $semuaberita,
            "beritadesa" => $beritadesa,
            "beritalokal" => $beritalokal,
            "programkerja" => $programkerja,
            "waktu" => $waktu,
            "totalVisitors" => $totalVisitors,
            "todayCount" => $todayCount,
            "yesterdayCount" => $yesterdayCount,
            "highlight" => $highlight,
            "text" => $text,
            "pamong" => $pamong,
            "agendahariini" => $agenda_hari_ini,
            "agendaakandatang" => $agenda_yangakandatang,
            "agendalalu" => $agenda_yangLalu,
            "jadwal" => $jadwal,
            "sinergi" => $sinergi,
            "statistik" => $statistik,
            "galeri" => $galeri,
            "apbd" => $apbd,
            "sideberita" => $sideberita,
        ]);
    }

    public function visi()
    {
        return view('home.visi', [
            "title" => "ꦥꦼꦩꦼꦫꦶꦤ꧀ꦠꦃ ꦏꦭꦸꦫꦃꦲꦤ꧀ ꦱꦼꦤ꧀ꦠꦺꦴꦭꦺꦴ | Visi Misi"
        ]);
    }

    public function beritautama()
    {
        $highlight = Berita::where('status', true)->get();
        foreach ($highlight as $item) {
            $item->gambar = Storage::url($item->gambar);
        }
        return response()->json($highlight);
    }

    public function datapamong()
    {
        $pamong = Pamong::all();
        foreach ($pamong as $item) {
            $item->gambar = Storage::url($item->gambar);
        }
        return response()->json($pamong);
    }

    public function berita($year, $month, $day, $slug)
    {
        $berita = Berita::where('slug', $slug)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->whereDay('tanggal', $day)
            ->first();

        $berita->increment('views_count');
        $judul = $berita->judul;
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();
        $sinergi = Sinergi::all();

        $berita_id = $berita->id;

        $komentar = Komentar::where('berita_id', $berita_id)
            ->where('status', true)
            ->get();

        return view('home.berita', [
            "title" => "Berita - $judul",
            "berita" => $berita,
            "headers" => $header,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
            "komentar" => $komentar,
            "sinergi" => $sinergi,
        ]);
    }

    public function artikel($year, $month, $day, $slug)
    {
        // Cari artikel berdasarkan slug dan tanggal
        $artikel = Berita::where('slug', $slug)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->whereDay('tanggal', $day)
            ->first();

        if (!$artikel) {
            abort(404); // Artikel tidak ditemukan, tampilkan halaman 404 atau sesuaikan dengan kebutuhan Anda.
        }

        $artikel->increment('views_count');
        $judul = $artikel->judul;
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();
        $sinergi = Sinergi::all();

        $berita_id = $artikel->id;

        $komentar = Komentar::where('berita_id', $berita_id)
            ->where('status', true)
            ->get();

        return view('home.artikel', [
            "title" => "Artikel - $judul",
            "artikel" => $artikel,
            "headers" => $header,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
            "komentar" => $komentar,
            "sinergi" => $sinergi,
        ]);
    }

    public function semuaberita()
    {
        $terbaru = Berita::whereIn('kategoriberita_id', [1, 2, 3])->paginate(12);
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();

        return view('home.kategoriberita', [
            "title" => "Berita Kalurahan Sentolo",
            "judul" => "Semua Berita",
            "headers" => $header,
            "berita" => $terbaru,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }

    public function cariberita()
    {
        $terbaru = Berita::whereIn('kategoriberita_id', [1, 2, 3])
            ->filter(request(['cari']))
            ->paginate(12);
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();


        return view('home.kategoriberita', [
            "title" => "Berita Kalurahan Sentolo",
            "judul" => "Cari Berita",
            "headers" => $header,
            "berita" => $terbaru,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }

    public function beritadesa()
    {
        $kategori = Berita::where('kategoriberita_id', 1)->paginate(12);
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();

        return view('home.kategoriberita', [
            "title" => "Berita - Berita Desa",
            "berita" => $kategori,
            "headers" => $header,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }

    public function beritalokal()
    {
        $kategori = Berita::where('kategoriberita_id', 2)->paginate(12);
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();

        return view('home.kategoriberita', [
            "title" => "Berita -  Berita Lokal",
            "berita" => $kategori,
            "headers" => $header,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }

    public function programkerja()
    {
        $kategori = Berita::where('kategoriberita_id', 3)->paginate(12);
        $header = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $statistik = Statistik::first();

        return view('home.kategoriberita', [
            "title" => "Berita - Program Kerja",
            "berita" => $kategori,
            "headers" => $header,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }

    public function galeri()
    {
        $headers = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $galeri = Galeri::paginate(12);
        $statistik = Statistik::first();

        return view('home.showberita', [
            "title" => "Galeri Kalurahan Sentolo",
            "berita" => $galeri,
            "headers" => $headers,
            "pamong" => $pamong,
            "apbd" => $apbd,
            "statistik" => $statistik,
        ]);
    }
    public function show_galeri($year, $month, $day, $nama)
    {
        $headers = Header::all();
        $pamong = Pamong::all();
        $apbd = Apbdes::first();
        $galeri = Galeri::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->whereDay('created_at', $day)
            ->where('nama', $nama)
            ->first();
            $statistik = Statistik::first();
        $sinergi = Sinergi::all();


        return view(
            'home.galeri',
            compact(
                'headers',
                'pamong',
                'apbd',
                'galeri',
                'statistik',
                'sinergi'
            ),
            [
                "title" => "Galeri - $nama",
            ]
        );
    }
}
