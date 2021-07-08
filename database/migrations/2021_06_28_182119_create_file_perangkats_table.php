<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePerangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_perangkats', function (Blueprint $table) {
            $table->increments('id_file');
            $table->unsignedInteger('id_agenda')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
        });

        Schema::table('file_perangkats', function (Blueprint $table) {
            $table->foreign('id_agenda')->references('id_agenda')->on('agendas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_perangkats');
    }
}
