<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            //$table->string('caminho_imagem');
            //$table->string('nome_imagem');
            $table->string('descricao');
            $table->integer('excluido'); // excluido 0 - sim  || excluido 1 - nao
            $table->integer('id_usuario_inclusao')->unsigned();
            $table->foreign('id_usuario_inclusao')->references('id')->on('users');
            $table->integer('id_usuario_alteracao')->unsigned();
            $table->foreign('id_usuario_alteracao')->references('id')->on('users');
            $table->integer('id_versao')->unsigned();
            $table->foreign('id_versao')->references('id')->on('versaos');
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
        Schema::dropIfExists('sistemas');
    }
}
