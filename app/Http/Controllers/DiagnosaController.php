<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diagnosa;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $query = Konsultasi::query()->with('user'); // Memuat relasi 'user' untuk mendapatkan username

    if ($search) {
        $query->where('pertanyaan', 'LIKE', "%{$search}%");
    }

    $konsultasis = $query->latest()->paginate(10)->appends(['search' => $search]); // Mengambil konsultasi terbaru, 10 konsultasi per halaman

    // Mengambil semua user dengan peran 'masyarakat'
    $users = User::where('peran', 'masyarakat')->get();

    // Mengambil diagnosa yang sesuai dengan pertanyaan yang belum didiagnosa
    $konsultasiIds = $konsultasis->pluck('id')->toArray();
    $diagnosas = Diagnosa::whereIn('konsultasi_id', $konsultasiIds)->get();

    return view('diagnosa', [
        'title' => 'Diagnosa Page',
        'konsultasis' => $konsultasis,
        'diagnosas' => $diagnosas,
        'users' => $users,
        'search' => $search // Sertakan variabel search untuk mempertahankan nilai inputan search pada view
    ]);
}


    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required|exists:users,id',
            'masyarakat_id' => 'required|exists:users,id',
            'konsultasi_id' => 'required|exists:konsultasis,id',
            'jawaban' => 'required|string',
        ]);

        Diagnosa::create([
            'petugas_id' => $request->petugas_id,
            'masyarakat_id' => $request->masyarakat_id,
            'konsultasi_id' => $request->konsultasi_id,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back()->with('success', 'Jawaban Anda telah dikirim.');
    }

    // Function to update the diagnosa
    public function update(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|string',
        ]);

        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->update([
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back()->with('success', 'Diagnosa berhasil diperbarui.');
    }

    // Function to delete the diagnosa
    public function destroy($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->delete();

        return redirect()->back()->with('success', 'Diagnosa berhasil dihapus.');
    }

    
}
