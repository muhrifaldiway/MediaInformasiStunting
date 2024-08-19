<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kategori', 'user_id']; // tambahkan kolom user_id ke fillable jika diperlukan

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
