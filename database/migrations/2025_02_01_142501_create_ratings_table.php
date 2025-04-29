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
        Schema::create('ratings', function (Blueprint $table) {
        $table->bigIncrements('id'); // Menggunakan id dengan panjang maksimum 6 karakter
            $table->unsignedBigInteger('id_user'); // Nama pengguna
         
            $table->unsignedBigInteger('id_audio');  // id_role dengan panjang maksimum 6 karakter
           $table->tinyInteger('rate');
            $table->timestamps(); 
           
        // Foreign key constraints
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_audio')->references('id')->on('audio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
