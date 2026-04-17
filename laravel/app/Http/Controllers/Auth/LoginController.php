<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role);
        }

        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectByRole(Auth::user()->role);
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Username atau password salah.']);
    }

    /**
     * Proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Redirect berdasarkan role user.
     */
    private function redirectByRole(string $role)
    {
        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru'  => redirect()->route('guru.dashboard'),
            default => redirect()->route('login'),
        };
    }
}
