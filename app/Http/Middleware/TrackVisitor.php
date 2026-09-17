<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $sessionId = $request->session()->getId();
        if (!Visitor::where('session_id', $sessionId)->exists()) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'session_id' => $sessionId,
                'user_agent' => $request->userAgent(),
            ]);
        }
        $count = Visitor::count();
        $request->session()->put('visitor_count', $count);
        return $next($request);
    }
}
