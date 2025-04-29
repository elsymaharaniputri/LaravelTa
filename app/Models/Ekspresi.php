<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Ekspresi extends Model
{
      use HasApiTokens, HasFactory, Notifiable;
     protected $table = 'ekspresi';
      protected $fillable = [
        'id',
        'name_ekspresi',
        'desc_ekspresi',
        'icon_ekspresi',
       
    ];
    public function hasilDeteksi()
    {
        return $this->hasMany(Hasil::class, 'id_ekspresi');
    }
     public function listAudio()
    {
        return $this->hasMany(Audio::class, 'id_ekspresi', 'id');
    }

    

}
