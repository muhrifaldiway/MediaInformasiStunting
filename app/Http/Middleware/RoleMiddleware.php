<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user->peran !== $role) {
            // Jika pengguna tidak memiliki peran yang sesuai, kembalikan pesan error atau redirect
            if ($user->peran === 'masyarakat') {
                return redirect()->route('konsultasi')->withErrors(['permission' => 'Anda tidak diizinkan mengakses halaman ini.']);
            } elseif ($user->peran === 'petugas') {
                return redirect()->route('admin.dashboard')->withErrors(['permission' => 'Anda tidak diizinkan mengakses halaman ini.']);
            }
        }

        return $next($request);
    }
}
