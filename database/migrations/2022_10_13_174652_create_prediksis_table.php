<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediksi_risiko', function (Blueprint $table) {
            $table->id('id_prediksi');
            $table->integer('tahun_id')->unsigned()->after('id_prediksi');
            $table->foreign('tahun_id','fk_tahun_prediksi_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kabkota_id')->unsigned()->after('id_hasil');
            $table->foreign('kabkota_id','fk_kabkota_prediksi_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('prediksis');
    }
}
