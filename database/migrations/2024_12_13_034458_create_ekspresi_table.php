<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ekspresi', function (Blueprint $table) {
             $table->bigIncrements('id')->primary(); // Menggunakan id dengan panjang maksimum 6 karakter
            $table->string('name_ekspresi'); // Nama pengguna
              $table->string('desc_ekspresi', 255); // Nama pengguna
            $table->string('icon_ekspresi'); // Nama pengguna
         
         
            $table->timestamps(); // Created at & updated at
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekspresi');
    }
};
