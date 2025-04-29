<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audio extends Model
{
  use HasApiTokens, HasFactory, Notifiable;
     protected $table = 'audio';
      protected $fillable = [
        'id',
        'name_audio',
        'id_ekspresi',
        'file_audio',
       
    ];

    public function ekspresiToAudio()
    {
        return $this->belongsTo(Ekspresi::class, 'id_ekspresi', 'id');
    }
   

}
