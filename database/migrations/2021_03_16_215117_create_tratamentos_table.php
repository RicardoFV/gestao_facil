<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt_entrega');
            $table->integer('excluido'); // excluido 0 - sim  || excluido 1 - nao
            $table->enum('situacao', ['novo', 'nao_iniciado', 'em_andamento', 'parado', 'concluido']);
            $table->integer('id_usuario_responsavel')->unsigned();
            $table->foreign('id_usuario_responsavel')->references('id')->on('users');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->integer('id_requisito')->unsigned();
            $table->foreign('id_requisito')->references('id')->on('requisitos');
            $table->integer('id_sistema')->unsigned();
            $table->foreign('id_sistema')->references('id')->on('sistemas');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');
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
        Schema::dropIfExists('tratamentos');
    }
}
