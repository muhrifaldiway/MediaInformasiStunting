<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'pertanyaan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function diagnosas()
    {
        return $this->hasMany(Diagnosa::class);
    }
}
