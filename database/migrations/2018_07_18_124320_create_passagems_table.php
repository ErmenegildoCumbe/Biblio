<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->dateTime('data_criaco');
            $table->string('descricao')->nullable();
            $table->integer('estado');
            $table->integer('passagemable_id');
            $table->string('passagemable_type');
            $table->integer('companhia_viagens_id')->unsigned()->nullable();
            $table->foreign('companhia_viagens_id')->references('id')->on('companhia_viagens');
            $table->integer('operadors_id')->unsigned();
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
        Schema::dropIfExists('passagems');
    }
}
