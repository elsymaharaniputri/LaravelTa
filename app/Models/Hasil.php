<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
      protected $table = 'hasil';
      protected $fillable = [
        'id',
        'image_face',
        'id_ekspresi',
 
       
    ];


    public function ekspresi()
{
    return $this->belongsTo(Ekspresi::class, 'id_ekspresi');
}


}
