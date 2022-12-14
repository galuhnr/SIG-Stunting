<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilRisikoNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_risiko_new', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->integer('tahun_id')->unsigned()->after('id_hasil');
            $table->foreign('tahun_id','fk_tahun_hasil_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kabkota_id')->unsigned()->after('id_hasil');
            $table->foreign('kabkota_id','fk_kabkota_hasil_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->float('pelayanan_kesehatan');
            $table->float('sanitasi');
            $table->float('desa_uci');
            $table->float('asi');
            $table->float('stunting');
            $table->float('defuzzifikasi');
            $table->string('tingkat_risiko');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_risiko_new');
    }
}
