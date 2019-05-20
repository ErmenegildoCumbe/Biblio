<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemPassagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem_passagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corpo');
            $table->integer('estado');
            $table->integer('pedido_passagems_id')->unsigned();
            $table->foreign('pedido_passagems_id')->references('id')->on('pedido_passagems');
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
        Schema::dropIfExists('mensagem_passagems');
    }
}
