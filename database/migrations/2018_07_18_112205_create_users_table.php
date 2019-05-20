<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('apelido')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telefone')->nullable();
            $table->string('password')->nullable();
            $table->string('sexo')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->string('nr_estudante')->nullable();
            $table->string('nr_bi')->nullable();
            $table->boolean('is_estudante')->nullable();
            $table->boolean('is_bibliotecario')->nullable();
            $table->integer('estado')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
