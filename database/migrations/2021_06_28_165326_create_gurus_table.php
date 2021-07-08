<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_kepegawaian')->nullable();;
            $table->unsignedInteger('id_jabatan')->nullable();
            $table->string('nama',16);
            $table->string('gelar depan',25);
            $table->string('gelar_belakang',25);
            $table->string('jenis_kelamin',1);
            $table->string('nbm',7);
            $table->string('nip',18);
            $table->string('golongan',25)->nullable();
            $table->date('tanggal_lulus');
            $table->date('tanggal_lahir');
            $table->string('email',50)->unique();
            $table->string('universitas',100);
            $table->string('jenjang',15);
            $table->string('jurusan',50);
            $table->text('alamat');
            $table->text('foto');
        });

        Schema::table('gurus', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kepegawaian')->references('id_status_kepegawaian')->on('status_kepegawaians')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
