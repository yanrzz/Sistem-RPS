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
        Schema::create('kurikulums', function (Blueprint $table) {
    $table->id();
    $table->foreignId('prodi_id')
          ->constrained('prodis')   // ⬅️ penting: ke prodis
          ->onDelete('cascade');
     $table->string('nama_kurikulum');
    $table->year('tahun');
    $table->enum('status', ['aktif','nonaktif'])->default('aktif');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulums');
    }
};