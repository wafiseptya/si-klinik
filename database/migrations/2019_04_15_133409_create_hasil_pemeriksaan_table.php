<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilPemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_pemeriksaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_rekam_medis')->unsigned();
            $table->string('jenis_pemeriksaan');
            $table->string('hasil')->default('belum terisi');
            $table->timestamps();

            $table->foreign('id_rekam_medis')
                    ->references('id')
                    ->on('rekam_medis')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_pemeriksaan');
    }
}
