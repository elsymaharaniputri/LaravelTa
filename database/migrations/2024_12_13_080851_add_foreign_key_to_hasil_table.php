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
              // Tambahkan foreign key untuk id_audio
            $table->foreign('id_audio')->references('id')->on('audio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil', function (Blueprint $table) {
                        // Drop foreign key jika rollback
            $table->dropForeign(['id_audio']);

        });
    }
};
