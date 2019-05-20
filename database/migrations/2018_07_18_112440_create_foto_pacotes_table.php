<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->integer('tipo');
            $table->integer('pacote_viagems_id')->unsigned();
            $table->foreign('pacote_viagems_id')->references('id')->on('pacote_viagems');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_pacotes');
    }
}
