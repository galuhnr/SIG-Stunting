<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananKesehatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan_kesehatan', function (Blueprint $table) {
            $table->id('id_pelayanan');
            $table->integer('kabkota_id')->unsigned()->after('id_pelayanan');
            $table->foreign('kabkota_id','fk_kabkota_pelayanan_id')->references('id_kab')->on('kabupaten_kota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('tahun_id')->unsigned()->after('id_pelayanan');
            $table->foreign('tahun_id','fk_tahun_pelayanan_id')->references('id_tahun')->on('tb_tahun')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jml_balita');
            $table->integer('jml_balita_sehat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan_kesehatan');
    }
}
