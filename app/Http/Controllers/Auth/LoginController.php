<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Constructor untuk middleware guest
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke tampilan login yang kita buat
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba autentikasi menggunakan email dan password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Jika login berhasil, redirect ke halaman dashboard atau home
            return redirect()->intended('/');
        }

        // Jika login gagal, lempar kembali ke halaman login dengan pesan error
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin.products.index'); // Redirect ke dashboard admin
        }

        return redirect('/'); // Redirect ke halaman user biasa
    }
}
