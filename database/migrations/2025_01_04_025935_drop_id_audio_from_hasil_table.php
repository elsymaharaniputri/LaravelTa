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
        Schema::table('hasil', function (Blueprint $table) {
              // Menghapus foreign key jika ada
            $table->dropForeign(['id_audio']);
            // Menghapus kolom id_audio
            $table->dropColumn('id_audio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil', function (Blueprint $table) {
            // Menambahkan kembali kolom id_audio
            $table->unsignedBigInteger('id_audio')->after('id_ekspresi');
            // Menambahkan kembali foreign key
            $table->foreign('id_audio')->references('id')->on('audio')->onDelete('cascade');
        });
    }
};
