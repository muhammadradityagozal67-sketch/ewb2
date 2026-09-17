<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ===================== ADMIN =====================
    public function adminLoginForm()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'], $request->remember)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah, atau Anda bukan admin.'])->withInput();
    }

    // ===================== ORANG TUA =====================
    public function ortuLoginForm()
    {
        if (Auth::check() && Auth::user()->isOrtu()) {
            return redirect()->route('portal.ortu.dashboard');
        }
        return view('portal.ortu-login');
    }

    public function ortuLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'ortu'], $request->remember)) {
            return redirect()->route('portal.ortu.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // ===================== SISWA =====================
    public function siswaLoginForm()
    {
        if (Auth::check() && Auth::user()->isSiswa()) {
            return redirect()->route('portal.siswa.dashboard');
        }
        return view('portal.siswa-login');
    }

    public function siswaLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'siswa'], $request->remember)) {
            return redirect()->route('portal.siswa.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // ===================== LOGOUT =====================
    public function logout(Request $request)
    {
        $role = Auth::user()?->role;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return match($role) {
            'admin' => redirect()->route('admin.login'),
            'ortu'  => redirect()->route('portal.ortu.login'),
            'siswa' => redirect()->route('portal.siswa.login'),
            default => redirect()->route('home'),
        };
    }
}
