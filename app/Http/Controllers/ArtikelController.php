<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Artikel::query();

        if ($search) {
            $query->where('judul', 'LIKE', "%{$search}%")
                ->orWhere('isi', 'LIKE', "%{$search}%")
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('username', 'LIKE', "%{$search}%");
                });
        }

        $posts = $query->with(['user', 'kategori'])->paginate(10);
        $categories = Kategori::all(); // Ambil data kategori dari tabel kategori

        return view('artikels', [
            'title' => 'Artikel Page',
            'posts' => $posts,
            'categories' => $categories,
            'search' => $search
        ]);
    }

    public function show($judul)
    {
        // Cari artikel berdasarkan judul
        $artikel = Artikel::where('judul', $judul)->firstOrFail();

        // Ambil kategori terkait dengan artikel
        $kategori = $artikel->kategori;

        return view('artikel', [
            'title' => 'Single Post',
            'artikel' => $artikel,
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'isi' => 'required',
        'user_id' => 'required|exists:users,id',
        'kategori_id' => 'required|exists:kategoris,id', // Pastikan kategori_id diisi dan valid
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('artikel_images', 'public');
        $validatedData['image'] = $imagePath;
    }

    Artikel::create($validatedData);

    return redirect('/artikels')->with('success', 'Artikel berhasil dibuat!');
}


    public function edit(string $id): View
    {
        // Get artikel by ID
        $artikel = Artikel::findOrFail($id);
        $categories = Kategori::all(); // Ambil data kategori dari tabel kategori
        
        // Render view with artikel and categories
        return view('editArtikels', compact('artikel', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validatedData = $request->validate([
            'judul'         => 'required|string|max:255',
            'isi'           => 'required|string',
            'kategori_id'   => 'required|exists:kategoris,id', // Validasi untuk kategori_id yang benar
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096', // Validasi tambahan untuk image
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artikel_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $artikel->update($validatedData);

        return redirect()->route('artikels.index')->with('success', 'Artikel berhasil diperbarui');
    }


   
    public function destroy(Artikel $artikel)
    {
        // Hapus gambar artikel jika ada
        if ($artikel->image) {
            Storage::disk('public')->delete($artikel->image);
        }

        // Hapus artikel dari database
        $artikel->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }

}
