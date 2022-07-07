<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuntingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stunting', function (Blueprint $table) {
            $table->id('id_stunting');
            $table->integer('tahun_id')->unsigned()->after('id_stunting');
            $table->foreign('tahun_id','fk_tahun_stunting_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('kabkota_id')->unsigned()->after('id_stunting');
            $table->foreign('kabkota_id','fk_kabkota_stunting_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_balita_diukur');
            $table->integer('jml_balita_stunting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stunting');
    }
}
