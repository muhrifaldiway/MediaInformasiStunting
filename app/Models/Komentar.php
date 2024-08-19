<?php

namespace App\Models;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'artikel_id', 'kategori_id', 'isi'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
