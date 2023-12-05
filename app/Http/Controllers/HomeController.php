<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\AgendaGOR;
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
use App\Models\AgendaBalai;
use App\Models\Komentar;
use App\Models\Present;
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
        //
        $nextDay = $todayy->copy()->addDay();
        $startOfWeek = $todayy->startOfWeek();
        $endOfWeek = $todayy->copy()->addWeek()->startOfWeek();
        //
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
        //Agenda
        $agenda_hari_ini = Agenda::where('tanggal', $today)->get();
        $agenda_yangakandatang = Agenda::where('tanggal', '>', $today)->get();
        $agenda_yangLalu = Agenda::where('tanggal', '>=', $oneMonthAgo)
            ->where('tanggal', '<', $today)
            ->get();
        //Agenda GOR
        $agendagor_hari_ini = AgendaGOR::where('tanggal', $today)->get();
        $agendagor_yangakandatang = AgendaGOR::whereDate('tanggal', '=', $nextDay->toDateString())
            ->get();
        $agendagor_mingguini = AgendaGOR::where('tanggal', '>=', $startOfWeek)
            ->where('tanggal', '<', $endOfWeek)
            ->get();
        //Agenda BALAI
        $agendabalai_hari_ini = AgendaBalai::where('tanggal', $today)->get();
        $agendabalai_yangakandatang = AgendaBalai::whereDate('tanggal', '=', $nextDay->toDateString())
            ->get();
        $agendabalai_mingguini = AgendaBalai::where('tanggal', '>=', $startOfWeek)
            ->where('tanggal', '<', $endOfWeek)
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
            //agenda
            "agendahariini" => $agenda_hari_ini,
            "agendaakandatang" => $agenda_yangakandatang,
            "agendalalu" => $agenda_yangLalu,
            //agenda gor
            "agendagorhariini" => $agendagor_hari_ini,
            "agendagorakandatang" => $agendagor_yangakandatang,
            "agendagormingguini" => $agendagor_mingguini,
            //Agenda BALAI
            "agendabalaihariini" => $agendabalai_hari_ini,
            "agendabalaiakandatang" => $agendabalai_yangakandatang,
            "agendabalaimingguini" => $agendabalai_mingguini,
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
            $currentDate = now()->format('Y-m-d');
            $presentModel = Present::where('user_id', $item->user_id)
            ->whereDate('tanggal', $currentDate)
            ->first();
            $item->presentModel = $presentModel;
        }

        // dd($pamong);
    
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

    //AGENDA GOR

    public function hlmnbooking()
    {
        $agendagor = AgendaGOR::all();
        return view('home.booking_gor', [
            "title" => "Agenda GOR",
            "agendagor" => $agendagor,

        ]);
    }

    public function hlmnbooking_balai()
    {
        $agendabalai = AgendaBalai::all();
        return view('home.booking_balai', [
            "title" => "Agenda Balai",
            "agendabalai" => $agendabalai,

        ]);
    }
    public function booking_gor(Request $request)
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

        
        // Ambil num1, num2, dan jawaban CAPTCHA dari input
        $num1 = intval($request->input('num1'));
        $num2 = intval($request->input('num2'));
        $captchaAnswer = intval($request->input('captcha'));

        if ($captchaAnswer === ($num1 + $num2)) {

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
                return redirect()->back()->with('error', 'Konflik waktu! Agenda pada rentang waktu tersebut sudah terdaftar.');
            } else {

                AgendaGOR::create($createData);

                return redirect()->back()->with('toast_success', 'Anda Telah Berhasil Mengajukan Booking GOR!!');
            }
           
        } else {
            // Jawaban CAPTCHA salah, tampilkan pesan kesalahan
            return redirect()->back()->with('error', '!!Jawaban CAPTCHA ANDA SALAH!!');
        }
    }

    //Booking Balai Controller
    public function booking_balai(Request $request)
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

        
        // Ambil num1, num2, dan jawaban CAPTCHA dari input
        $num1 = intval($request->input('num1'));
        $num2 = intval($request->input('num2'));
        $captchaAnswer = intval($request->input('captcha'));

        if ($captchaAnswer === ($num1 + $num2)) {

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
                return redirect()->back()->with('error', 'Konflik waktu! Agenda pada rentang waktu tersebut sudah terdaftar.');
            } else {

                AgendaBalai::create($createData);

                return redirect()->back()->with('toast_success', 'Anda Telah Berhasil Mengajukan Booking Balai!');
            }
           
        } else {
            // Jawaban CAPTCHA salah, tampilkan pesan kesalahan
            return redirect()->back()->with('error', '!!Jawaban CAPTCHA ANDA SALAH!!');
        }
    }

    public function absen()
    {
        $present = Present::whereUserId(auth()->user()->id)->whereTanggal(date('Y-m-d'))->first();
        $url = 'https://kalenderindonesia.com/api/YZ35u6a7sFWN/libur/masehi/'.date('Y/m');
        $kalender = file_get_contents($url);
        $kalender = json_decode($kalender, true);
        $libur = false;
        $holiday = null;
        if ($kalender['data'] != false) {
            if ($kalender['data']['holiday']['data']) {
                foreach ($kalender['data']['holiday']['data'] as $key => $value) {
                    if ($value['date'] == date('Y-m-d')) {
                        $holiday = $value['name'];
                        $libur = true;
                        break;
                    }
                }
            }
        }
        return view('bo.page.absen.presensi', compact('present','libur','holiday'));
    }

}
