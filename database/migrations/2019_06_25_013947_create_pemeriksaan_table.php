<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pemeriksaan', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nama_jenis');
          $table->string('nilai_rujukan')->nullable();
          $table->string('satuan')->nullable();
          $table->integer('harga'); 
          $table->unsignedBigInteger('kategori_pemeriksaan_id');
          $table->foreign('kategori_pemeriksaan_id')->references('id')->on('kategori_pemeriksaan')->onDelete('cascade')->onUpdate('cascade');  
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
        Schema::dropIfExists('jenis_pemeriksaan');
    }
}
