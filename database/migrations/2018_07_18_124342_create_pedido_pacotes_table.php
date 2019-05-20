<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoPacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nr_viajantes');
            $table->string('ponto_partida');
            $table->string('ponto_chegada');
            $table->string('meio_transporte')->nullable();
            $table->string('categoria_meio_transporte')->nullable();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('estado');
            $table->mediumText('detalhes');
            $table->integer('pacote_id')->unsigned()->nullable();
            $table->foreign('pacote_id')->references('id')->on('pacote_viagems');            
            $table->integer('clientes_id')->unsigned();
            $table->foreign('clientes_id')->references('id')->on('clientes');     
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
        Schema::dropIfExists('pedido_pacotes');
    }
}
