<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_gurus', function (Blueprint $table) {
            $table->increments('id_mapel_guru');
            $table->unsignedInteger('id_guru')->nullable();
            $table->unsignedInteger('id_mapel')->nullable();
            $table->string('jurusan',25);
            $table->string('tingkat',3);
        });

        Schema::table('mapel_gurus', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('mata_pelajarans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_gurus');
    }
}
