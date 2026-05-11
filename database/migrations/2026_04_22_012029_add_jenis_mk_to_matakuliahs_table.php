<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->string('jenis_mk')->default('wajib')->after('semester_id');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->dropColumn('jenis_mk');
        });
    }
};
