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
        Schema::create('hasil', function (Blueprint $table) {
            $table->bigIncrements('id')->primary(); // Menggunakan id dengan panjang maksimum 6 karakter
            $table->string('image_face'); // Nama pengguna
           $table->unsignedBigInteger('id_ekspresi');  // id_role dengan panjang maksimum 6 karakter
           $table->unsignedBigInteger('id_audio');  // id_role dengan panjang maksimum 6 karakter
         
          // Tambahkan foreign key ke kolom id_ekspresi dan id_audio
            $table->foreign('id_ekspresi')->references('id')->on('ekspresi')->onDelete('cascade');
            $table->foreign('id_audio')->references('id')->on('audio')->onDelete('cascade');
            $table->timestamps(); 
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil');
    }
};
