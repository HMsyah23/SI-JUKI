<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->unsignedInteger('id_tahun_ajaran')->nullable();
            $table->string('kelas',25);
            $table->decimal('jumlah_siswa',3,0);
        });

        Schema::table('kelas', function (Blueprint $table) {
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
        Schema::dropIfExists('kelas');
    }
}
