<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('telefone_1');
            $table->string('telefone_2');
            $table->string('cnpj');
            $table->string('situacao_empresa');
            $table->integer('id_endereco')->unsigned();
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::table('enderecos', function (Blueprint $table) {

            $table->dropSoftDeletes();
        });
    }
}
