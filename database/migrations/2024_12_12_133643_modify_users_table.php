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
         Schema::table('users', function (Blueprint $table) {
            // Hapus primary key lama
            $table->dropPrimary('users_id_primary');

            // Ubah kolom 'id' menjadi auto-increment
            $table->bigIncrements('id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
            // Kembalikan kolom 'id' ke tipe string
            $table->dropPrimary('users_id_primary');
            $table->string('id', 6)->primary()->change();
        });
    }
};
