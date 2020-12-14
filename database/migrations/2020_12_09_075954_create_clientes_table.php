<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_razon',100);
            $table->string('direccion',100);
            $table->char('documento_identi',11);
            $table->string('alias',50);
            $table->text('referencia');
            $table->string('representante',150);
            $table->char('nCelular',9);
            $table->string('email',150);
            $table->date('cumpleanos');
            $table->unsignedInteger('tipoCliente_id');
            $table->foreign('tipoCliente_id')->references('id')->on('tipo_clientes');
            $table->unsignedInteger('identificacion_id');
            $table->foreign('identificacion_id')->references('id')->on('identificacions');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
