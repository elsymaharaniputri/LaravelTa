<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Roles extends Model
{
      use HasFactory;
       protected $table = 'roles';
       protected $fillable = [
       'id',
       'role'
 
    ];
   public function user()
    {
        return $this->hasMany(User::class);
    }
}
