<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $fillable = [
        'petugas_id',
        'masyarakat_id',
        'konsultasi_id',
        'jawaban',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    // Relasi ke model Konsultasi
    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }

   
}
