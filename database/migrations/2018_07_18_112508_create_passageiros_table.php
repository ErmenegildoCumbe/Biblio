<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassageirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passageiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('apelido')->nullable();
            $table->string('forma_tratamento')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('sexo');
            $table->integer('tipo');
            $table->integer('passageiroable_id');
            $table->string('passageiroable_type');
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
        Schema::dropIfExists('passageiros');
    }
}
