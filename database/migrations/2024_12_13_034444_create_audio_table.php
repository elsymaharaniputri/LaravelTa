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
        Schema::create('audio', function (Blueprint $table) {
            $table->bigIncrements('id')->primary(); // Menggunakan id dengan panjang maksimum 6 karakter
            $table->string('name_audio', 255); // Nama pengguna
         
            $table->unsignedBigInteger('id_ekspresi');  // id_role dengan panjang maksimum 6 karakter
            $table->timestamps(); // Created at & updated at
        
             // Tambahkan foreign key ke kolom id_role
            $table->foreign('id_ekspresi')->references('id')->on('ekspresi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
