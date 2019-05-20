<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacaoPedidoPassagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao_pedido_passagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->string('descricao');
            $table->integer('destinatario');
            $table->integer('estado');
            $table->integer('pedido_passagems_id')->unsigned();
            $table->foreign('pedido_passagems_id')->references('id')->on('pedido_passagems');
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
        Schema::dropIfExists('notificacao_pedido_passagems');
    }
}
