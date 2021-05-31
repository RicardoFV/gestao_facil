<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('excluido'); // excluido 0 - sim  || excluido 1 - nao
            $table->integer('id_usuario_inclusao')->unsigned();
            $table->foreign('id_usuario_inclusao')->references('id')->on('users');
            $table->integer('id_usuario_alteracao')->unsigned();
            $table->foreign('id_usuario_alteracao')->references('id')->on('users');
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
        Schema::dropIfExists('versaos');
    }
}
