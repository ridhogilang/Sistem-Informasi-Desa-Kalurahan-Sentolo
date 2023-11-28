<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class LogUserAgent
{
    public function handle($request, Closure $next)
    {
        $agent = new Agent();

        $ipAddress = $request->ip();
        $operatingSystem = $agent->platform();
        $browser = $agent->browser();
        $deviceName = $agent->device();
    
        // Menyimpan informasi ke dalam session flash
        session()->flash('ip_address', $ipAddress);
        session()->flash('operating_system', $operatingSystem);
        session()->flash('browser', $browser);
        session()->flash('device_name', $deviceName);
    
        return $next($request);
    }
}
