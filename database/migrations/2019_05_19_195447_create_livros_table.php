<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_barras')->nullable();
            $table->string('titulo');
            $table->string('autor');
            $table->string('edicao')->nullable();
            $table->string('editora');
            $table->date('ano_publicacao');
            $table->integer('estado');
            $table->integer('bibliotecario_id')->unsigned();
            $table->foreign('bibliotecario_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
