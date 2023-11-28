<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Agent\Facades\Agent;



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
        // Mendapatkan nilai session flash "new"
        $ipAddress = $request->session()->get('ip_address');
        $operatingSystem = $request->session()->get('operating_system');
        $browser = $request->session()->get('browser');
        $deviceName = $request->session()->get('device_name');

        // Hapus session flash setelah digunakan (optional)
        $request->session()->forget('ip_address');
        $request->session()->forget('operating_system');
        $request->session()->forget('browser');
        $request->session()->forget('device_name');

        return view('bo.page.sid.ipaddress', [
            "title" => "IP Address User",
            'ipAddress' => $ipAddress,
            'operatingSystem' => $operatingSystem,
            'browser' => $browser,
            'deviceName' => $deviceName,
            "dropdown1" => "",
        ]);
    }
}
