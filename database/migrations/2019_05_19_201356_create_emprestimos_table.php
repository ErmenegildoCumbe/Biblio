<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->nullable();
            $table->dateTime('data_entrega');
            $table->integer('estudante_id')->unsigned();
            $table->foreign('estudante_id')->references('id')->on('users');
            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros');
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
        Schema::dropIfExists('emprestimos');
    }
}
