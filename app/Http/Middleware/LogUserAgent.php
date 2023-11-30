<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Cache;

class LogUserAgent
{
    public function handle($request, Closure $next)
    {
        $agent = new Agent();

        $ipAddress = $request->ip();
        $operatingSystem = $agent->platform();
        $browser = $agent->browser();
        $deviceName = $agent->device();

        // Simpan informasi ke cache
        $userKey = 'user_' . $ipAddress;
        Cache::put($userKey, [
            'deviceName' => $deviceName,
            'ipAddress' => $ipAddress,
            'operatingSystem' => $operatingSystem,
            'browser' => $browser,
        ], 1); // Simpan selama 1 menit

        return $next($request);
    }
}
