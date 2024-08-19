<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->get();
        $kategoris = Kategori::all();
        return view('home', compact('artikels', 'kategoris'));
    }

    public function show($judul)
    {
        // Cari artikel berdasarkan judul
        $artikel = Artikel::where('judul', $judul)->firstOrFail();

        // Ambil kategori terkait dengan artikel
        $kategori = $artikel->kategori;

        return view('homeArtikel', [
            'artikel' => $artikel,
            'kategori' => $kategori,
        ]);         
    }

    public function homeArtikel()
    {
        
        return view('homeArtikel');
    }
    public function aboutus()
    {
        
        return view('aboutus');
    }

    
}
