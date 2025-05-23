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
            // Menambahkan foreign key pada kolom id_role
            $table->foreign('id_role')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade'); // Menambahkan penghapusan cascading jika role dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
              // Menghapus foreign key
            $table->dropForeign(['id_role']);
        });
    }
};

