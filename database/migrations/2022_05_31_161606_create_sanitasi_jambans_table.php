<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanitasiJambansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitasi_jamban', function (Blueprint $table) {
            $table->id('id_sanitasi');
            $table->integer('tahun_id')->unsigned()->after('id_sanitasi');
            $table->foreign('tahun_id','fk_tahun_sanitasi_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kabkota_id')->unsigned()->after('id_sanitasi');
            $table->foreign('kabkota_id','fk_kabkota_sanitasi_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_penduduk');
            $table->integer('jml_akses_jamban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanitasi_jamban');
    }
}
