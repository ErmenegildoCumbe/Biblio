<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacaoPedidoPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao_pedido_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->string('descricao');
            $table->integer('estado');
            $table->integer('destinatario');
            $table->integer('pedido_pacotes_id')->unsigned();
            $table->foreign('pedido_pacotes_id')->references('id')->on('pedido_pacotes');
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
        Schema::dropIfExists('notificacao_pedido_pacotes');
    }
}
