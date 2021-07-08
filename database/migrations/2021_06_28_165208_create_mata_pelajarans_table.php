<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->increments('id_mapel');
            $table->unsignedInteger('id_tahun_ajaran')->nullable();
            $table->string('mata_pelajaran',10);
        });

        Schema::table('mata_pelajarans', function (Blueprint $table) {
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajarans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_pelajarans');
    }
}
