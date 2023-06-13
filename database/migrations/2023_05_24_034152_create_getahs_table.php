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
        Schema::create('getahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->longText('uraian');
            $table->string('nama_penyadap');
            $table->string('petak');
            $table->string('luas');
            $table->integer('jml_pohon');
            $table->integer('target');
            $table->integer('realisasi');
            $table->string('foto_keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('getahs');
    }
};
