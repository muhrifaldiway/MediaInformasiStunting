<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Diagnosa;
use App\Models\Kategori;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan konsultasi dan diagnosa yang terkait dengan masyarakat_id dari user yang sedang login
        $konsultasis = Konsultasi::where('user_id', $user->id)->get();
        $diagnosas = Diagnosa::where('masyarakat_id', $user->id)->get();
        $users = User::all(); // Masih dapat menyertakan semua users jika diperlukan untuk tampilan lain

        return view('konsultasi', [
            'konsultasis' => $konsultasis,
            'diagnosas' => $diagnosas,
            'users' => $users // Sertakan variabel users jika memang diperlukan di view
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pertanyaan' => 'required|string',
        ]);

        Konsultasi::create([
            'user_id' => $request->user_id,
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->back()->with('success', 'Pertanyaan Anda telah dikirim.');
    }

    public function update(Request $request, Konsultasi $konsultasi)
    {
        // Validasi input
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
        ]);

        // Update data konsultasi
        $konsultasi->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        // Redirect ke halaman konsultasi dengan pesan sukses
        return redirect()->route('konsultasi')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(Konsultasi $konsultasi)
    {
        $konsultasi->delete();
        return redirect()->route('konsultasi')->with('success', 'Konsultasi berhasil dihapus.');
    }
}
