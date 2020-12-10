<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->unsignedInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->tinyInteger('cantidad');
            $table->decimal('precio',9,2);
            $table->decimal('valorVenta',9,2);
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
        Schema::dropIfExists('detalle_ventas');
    }
}
