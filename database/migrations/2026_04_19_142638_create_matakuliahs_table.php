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
        Schema::create('matakuliahs', function (Blueprint $table) {
   $table->id();
    $table->foreignId('angkatan_id')
          ->constrained('angkatans') // ⬅️ penting
          ->onDelete('cascade');
    $table->string('kode_mk');
    $table->string('nama_mk');
    $table->integer('sks');
    $table->string('file_rps')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};