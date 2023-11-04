<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $today = Carbon::today()->toDateString();
        $visitor = Visitor::where('date', $today)->first();

        if ($visitor) {
            $visitor->increment('count');
        } else {
            Visitor::create([
                'date' => $today,
                'count' => 1,
            ]);
        }

        return $next($request);
    }
}
