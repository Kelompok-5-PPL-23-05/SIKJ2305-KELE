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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->float('nilai_angka');
            $table->string('deskripsi', 255)->nullable();
            $table->foreignId('siswa_id')
                  ->constrained('siswas')
                  ->onDelete('cascade');
            $table->foreignId('guru_id')
                  ->constrained('gurus')
                  ->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')
                  ->constrained('mata_pelajarans')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
