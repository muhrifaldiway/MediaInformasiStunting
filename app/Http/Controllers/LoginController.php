<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Periksa apakah email sudah terdaftar
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email ini belum terdaftar.',
            ])->onlyInput('email');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Arahkan pengguna berdasarkan peran
            if ($user->peran === 'masyarakat') {
                return redirect()->route('konsultasi');
            } elseif ($user->peran === 'petugas') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended('/admin'); // Ganti '/dashboard' dengan route yang diinginkan jika tidak ada peran yang terdefinisi
        }

        return back()->withErrors([
            'email' => 'Gagal Login! Silahkan masukkan data yang sesuai!.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }


}
