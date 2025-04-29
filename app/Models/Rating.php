<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'id',
        'id_user',
        'id_audio',
        'rate',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke tabel audios
    public function audio()
    {
        return $this->belongsTo(Audio::class, 'id_audio');
    }
}
