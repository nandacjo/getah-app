<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('getahs', function (Blueprint $table) {
            $table->string('nama_lokasi', 60)->after('foto_keterangan');
            $table->string('longitude')->after('nama_lokasi');
            $table->string('latitude')->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('getahs', function (Blueprint $table) {
            $table->dropColumn('nama_lokasi');
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
        });
    }
};
