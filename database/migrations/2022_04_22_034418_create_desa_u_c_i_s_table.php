<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaUCISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desaUCI', function (Blueprint $table) {
            $table->id('id_desa');
            $table->integer('kabkota_id')->unsigned()->after('id_desa');
            $table->foreign('kabkota_id','fk_kabkota_desaUCI_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('tahun_id')->unsigned()->after('id_desa');
            $table->foreign('tahun_id','fk_tahun_desaUCI_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_desaUCI');
            $table->float('persentaseUCI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desaUCI');
    }
}
