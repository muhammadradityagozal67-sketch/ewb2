<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return match($role) {
                'admin' => redirect()->route('admin.login'),
                'ortu'  => redirect()->route('portal.ortu.login'),
                'siswa' => redirect()->route('portal.siswa.login'),
                default => redirect()->route('home'),
            };
        }

        if (Auth::user()->role !== $role) {
            Auth::logout();
            return redirect()->route('home')->with('error', 'Akses tidak diizinkan.');
        }

        return $next($request);
    }
}
