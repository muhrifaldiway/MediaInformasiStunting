<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Diagnosa;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    // Gunakan middleware 'auth' untuk memastikan hanya pengguna yang terotentikasi dapat mengakses metode dalam controller ini
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Hitung jumlah user dengan peran 'masyarakat' dan 'petugas'
        $jumlahMasyarakat = User::where('peran', 'masyarakat')->count();
        $jumlahPetugas = User::where('peran', 'petugas')->count();

        // Hitung jumlah artikel
        $jumlahArtikel = Artikel::count();
        $jumlahKategori = Kategori::count();
        $jumlahKomentar = Komentar::count();
        $jumlahKonsultasi = Konsultasi::count();
        $jumlahDiagnosa = Diagnosa::count();

        return view('admin', [
            'title'             => 'Admin Dashboard',
            'jumlahMasyarakat'  => $jumlahMasyarakat,
            'jumlahPetugas'     => $jumlahPetugas,
            'jumlahArtikel'     => $jumlahArtikel,
            'jumlahKategori'    => $jumlahKategori,
            'jumlahKomentar'    => $jumlahKomentar,
            'jumlahKonsultasi'  => $jumlahKonsultasi,
            'jumlahDiagnosa'    => $jumlahDiagnosa,
        ]);
    }

    
}
