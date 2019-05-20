<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corpo');
            $table->integer('estado');
            $table->integer('pedido_pacotes_id')->unsigned();
            $table->foreign('pedido_pacotes_id')->references('id')->on('pedido_pacotes');
            $table->integer('operadors_id')->unsigned()->nullable();
            $table->foreign('operadors_id')->references('id')->on('operadors');
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
        Schema::dropIfExists('mensagem_pacotes');
    }
}
