<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('correlativo',6);
            $table->date('fecha');
            $table->decimal('total',9,2);
            $table->decimal('igv',9,2);
            $table->decimal('subtotal',9,2);
            $table->tinyInteger('estado');
            $table->date('fRegistro');
            $table->unsignedInteger('tcomprobante_id');
            $table->foreign('tcomprobante_id')->references('id')->on('tipo_comprobantes');
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedInteger('tpagos_id');
            $table->foreign('tpagos_id')->references('id')->on('tipo_pagos');
            $table->unsignedInteger('turno_id');
            $table->foreign('turno_id')->references('id')->on('turnos');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('ventas');
    }
}
