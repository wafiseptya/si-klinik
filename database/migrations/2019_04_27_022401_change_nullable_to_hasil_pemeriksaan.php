<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableToHasilPemeriksaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil_pemeriksaan', function (Blueprint $table) {
            $table->string('jenis_pemeriksaan')->nullable(true)->change();
            $table->string('hasil')->nullable(true)->change();
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
            $table->dropColoumn('jenis_pemeriksaan');
            $table->dropColoumn('hasil');
        });
    }
}
