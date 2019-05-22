<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->nullable();
            $table->integer('estudante_id')->unsigned();
            $table->foreign('estudante_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('bibliotecario_id')->unsigned()->nullable();
            $table->foreign('bibliotecario_id')->references('id')->on('users');
            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
