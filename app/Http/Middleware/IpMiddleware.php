<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$ips)
    {
        $access = array_filter(array_map(function ($v) {
            return ($star = strpos($v, "*")) ? (substr(request()->ip(), 0, $star) == substr($v, 0, $star))
                : (request()->ip() == $v);
        }, $ips));

        return $access ? $next($request) : abort(403);
    }
}
