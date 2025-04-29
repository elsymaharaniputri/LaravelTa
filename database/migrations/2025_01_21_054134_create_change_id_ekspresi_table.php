<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        // 1. Hapus foreign key di tabel 'hasil'
        Schema::table('hasil', function (Blueprint $table) {
            $table->dropForeign(['id_ekspresi']);
        });

        // 2. Ubah tipe data kolom 'id' di tabel 'ekspresi'
        Schema::table('ekspresi', function (Blueprint $table) {
            $table->string('id', 6)->change();
        });

        // 3. Ubah tipe data kolom 'id_ekspresi' di tabel 'hasil'
        Schema::table('hasil', function (Blueprint $table) {
            $table->string('id_ekspresi', 6)->change();
        });

        // 4. Tambahkan kembali foreign key
        Schema::table('hasil', function (Blueprint $table) {
            $table->foreign('id_ekspresi')->references('id')->on('ekspresi')->onDelete('cascade');
        });
    }

     public function down(): void
    {
              // Kembalikan perubahan jika dibutuhkan (rollback)

        // 1. Hapus foreign key
        Schema::table('hasil', function (Blueprint $table) {
            $table->dropForeign(['id_ekspresi']);
        });

        // 2. Ubah tipe data kembali di tabel 'ekspresi'
        Schema::table('ekspresi', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        // 3. Ubah tipe data kembali di tabel 'hasil'
        Schema::table('hasil', function (Blueprint $table) {
            $table->bigInteger('id_ekspresi')->change();
        });

        // 4. Tambahkan kembali foreign key
        Schema::table('hasil', function (Blueprint $table) {
            $table->foreign('id_ekspresi')->references('id')->on('ekspresi')->onDelete('cascade');
        });
    }
};
