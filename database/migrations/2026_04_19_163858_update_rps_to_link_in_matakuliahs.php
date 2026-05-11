<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('matakuliahs', function (Blueprint $table) {
        $table->dropColumn('file_rps');
        $table->text('link_rps')->nullable();
    });
}

public function down()
{
    Schema::table('matakuliahs', function (Blueprint $table) {
        $table->string('file_rps')->nullable();
        $table->dropColumn('link_rps');
    });
}
};