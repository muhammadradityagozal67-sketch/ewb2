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
        return redirect()->route('portal')->with('active_tab', 'admin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('portal')->with('error_admin', 'Email atau password salah, atau Anda bukan admin.')->withInput()->with('active_tab', 'admin');
    }

    // ===================== ORANG TUA =====================
    public function ortuLoginForm()
    {
        if (Auth::check() && Auth::user()->isOrtu()) {
            return redirect()->route('portal.ortu.dashboard');
        }
        return redirect()->route('portal')->with('active_tab', 'ortu');
    }

    public function ortuLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'ortu'], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('portal.ortu.dashboard');
        }

        return redirect()->route('portal')->with('error_ortu', 'Email atau password salah.')->withInput()->with('active_tab', 'ortu');
    }

    // ===================== SISWA =====================
    public function siswaLoginForm()
    {
        if (Auth::check() && Auth::user()->isSiswa()) {
            return redirect()->route('portal.siswa.dashboard');
        }
        return redirect()->route('portal')->with('active_tab', 'siswa');
    }

    public function siswaLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'siswa'], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('portal.siswa.dashboard');
        }

        return redirect()->route('portal')->with('error_siswa', 'Email atau password salah.')->withInput()->with('active_tab', 'siswa');
    }

    // ===================== LOGOUT =====================
    public function logout(Request $request)
    {
        $role = Auth::user()?->role;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('portal')->with('active_tab', $role ?? 'admin');
    }
}
