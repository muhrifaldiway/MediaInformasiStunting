<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Komentar::query();

        if ($search) {
            $query->whereHas('artikel', function ($query) use ($search) {
                $query->where('judul', 'LIKE', "%{$search}%")
                  ->orWhereHas('kategori', function ($query) use ($search) {
                      $query->where('nama_kategori', 'LIKE', "%{$search}%");
                  });
            });
        }

        $comments = $query->paginate(10);

        return view('komentars', [
            'title' => 'Komentar Page',
            'comments' => $comments,
            'search' => $search
        ]);
    }


    

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'artikel_id' => 'required|exists:artikels,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required|string',
        ]);

        Komentar::create([
            'judul' => $request->judul,
            'artikel_id' => $request->artikel_id,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
