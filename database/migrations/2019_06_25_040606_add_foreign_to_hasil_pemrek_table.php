<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToHasilPemrekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil_pemeriksaan', function (Blueprint $table) {
            
          $table->unsignedBigInteger('jenis_pemeriksaan_id')->after('id_rekam_medis');
          $table->foreign('jenis_pemeriksaan_id')->references('id')->on('jenis_pemeriksaan')->onDelete('cascade')->onUpdate('cascade');  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_pemeriksaan', function (Blueprint $table) {
          $table->dropColoum('jenis_pemeriksaan_id');
        });
    }
}
