<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Agent\Facades\Agent;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        return view('bo.page.sid.dashboard', [
            "title" => "Dashboard",
            "dropdown1" => "",
        ]);
    }

    public function ip(Request $request)
    {
        $userKey = 'user_' . md5($request->ip()); // Buat kunci unik untuk setiap pengguna berdasarkan alamat IP

        // Cek apakah pengguna sudah ada di cache
        if (Cache::has($userKey)) {
            // Pengguna sudah ada di cache, ambil informasi dari cache
            $userData = Cache::get($userKey);
            $ipAddress = $userData['ipAddress'];
            $browser = $userData['browser'];
            $os = $userData['os'];
            $device = $userData['device'];
        } else {
            // Pengguna belum ada di cache, ambil informasi dan simpan di cache
            $ipAddress = $this->getClientIPFromRequest($request);
            $browser = $this->getClientBrowserFromRequest($request);
            $os = $this->getClientOSFromRequest($request);
            $device = $this->getDeviceNameFromRequest($request);

            Cache::put($userKey, [
                'ipAddress' => $ipAddress,
                'browser' => $browser,
                'os' => $os,
                'device' => $device,
            ], now()->addMinutes(1));
        }

        $onlineUsers = Cache::get('user_', []);
        dd($onlineUsers);

        return view('bo.page.sid.ipaddress', [
            "title" => "IP Address User",
            'ipAddress' => $ipAddress,
            'browser' => $browser,
            'os' => $os,
            "dropdown1" => "",
        ]);
    }

    public function getOnlineUsers()
    {
        $onlineUsers = Cache::get('user_', []);
        return response()->json(['data' => $onlineUsers]);
    }

    private function getDeviceNameFromRequest(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        return $this->detectDevice($userAgent);
    }

    private function detectDevice($userAgent)
    {
        // Beberapa contoh deteksi perangkat, sesuaikan dengan kebutuhan
        if (strpos($userAgent, 'iPhone') !== false) {
            return 'iPhone';
        } elseif (strpos($userAgent, 'Android') !== false) {
            return 'Android';
        } elseif (strpos($userAgent, 'Windows Phone') !== false) {
            return 'Windows Phone';
        } else {
            return 'Unknown';
        }
    }


    private function getClientIPFromRequest(Request $request)
    {
        $ipaddress = $request->ip();

        // Jika Anda ingin mencoba menggunakan metode yang lain,
        // Anda dapat menambahkan logika di sini.
        // ...

        return $ipaddress;
    }

    private function getClientBrowserFromRequest(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        $browser = $this->detectBrowser($userAgent);

        return $browser;
    }

    private function detectBrowser($userAgent)
    {
        if (strpos($userAgent, 'Netscape')) {
            return 'Netscape';
        } elseif (strpos($userAgent, 'Firefox')) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome')) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Opera')) {
            return 'Opera';
        } elseif (strpos($userAgent, 'MSIE')) {
            return 'Internet Explorer';
        } else {
            return 'Other';
        }
    }

    private function getClientOSFromRequest(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        $os = $this->detectOS($userAgent);

        return $os;
    }

    private function detectOS($userAgent)
    {
        $os = 'Unknown';

        if (strpos($userAgent, 'Windows') !== false) {
            $os = 'Windows';
        } elseif (strpos($userAgent, 'Macintosh') !== false) {
            $os = 'Macintosh';
        } elseif (strpos($userAgent, 'Linux') !== false) {
            $os = 'Linux';
        } elseif (strpos($userAgent, 'Android') !== false) {
            $os = 'Android';
        } elseif (strpos($userAgent, 'iOS') !== false) {
            $os = 'iOS';
        }

        return $os;
    }
}
