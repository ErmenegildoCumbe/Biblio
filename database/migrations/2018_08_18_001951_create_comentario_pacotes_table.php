<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corpo');
            $table->integer('estado');
            $table->integer('pacote_id')->unsigned();
            $table->foreign('pacote_id')->references('id')->on('pacote_viagems');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('comentario_pacotes');
    }
}
