<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Kategori::query();

        if ($search) {
            $query->where('kategoris', 'LIKE', "%{$search}%");
        }

        $kategori = $query->paginate(20)->appends(['search' => $search]); // 10 kategori per halaman

        return view('kategoriArtikel', [
            'title' => 'Categories Page',
            'kategori' => $kategori,
            'search' => $search // Sertakan variabel search untuk mempertahankan nilai inputan search pada view
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('kategori', [
            'title' => 'Single Post',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255', // Sesuaikan dengan kebutuhan validasi Anda
        ]);

        // Simpan kategori baru ke dalam database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
   
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
    
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);
    
        $validatedData['kategori'] = Str::slug($request->kategori);

        $kategori->update($validatedData);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        // Hapus kategori dari database
        $kategori->delete();
        // Redirect kembali dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
