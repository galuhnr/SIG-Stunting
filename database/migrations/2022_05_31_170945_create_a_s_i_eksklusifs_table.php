<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateASIEksklusifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_eksklusif', function (Blueprint $table) {
            $table->id('id_asi');
            $table->integer('tahun_id')->unsigned()->after('id_asi');
            $table->foreign('tahun_id','fk_tahun_asi_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kabkota_id')->unsigned()->after('id_asi');
            $table->foreign('kabkota_id','fk_kabkota_asi_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_bayi');
            $table->integer('jml_diberi_asi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asi_eksklusif');
    }
}
