<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id_agenda');
            $table->unsignedInteger('id_guru')->nullable();
            $table->unsignedInteger('id_tahun_ajaran')->nullable();
            $table->unsignedInteger('id_kelas')->nullable();
            $table->unsignedInteger('id_mapel_guru')->nullable();
            $table->string('jam',3);
            $table->text('materi');
            $table->text('hambatan');
            $table->text('pemecahan');
            $table->string('absen',3);
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('agendas', function (Blueprint $table) {
            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tahun_ajaran')->references('id_tahun_ajaran')->on('tahun_ajarans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel_guru')->references('id_mapel_guru')->on('mapel_gurus')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
