<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            /*
             $table->integer('cargo_id')->autoIncrement();
            $table->string('cargo',45);
            $table->string('descripcion',100)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            */

            /*
             $table->integer('proveedor_id')->autoIncrement();
            $table->string('rason',100);
            $table->char('ruc',11);
            $table->string('direccion',100);
            $table->string('contacto',100);
            $table->string('email',100)->nullable();
            $table->char('nCelula',9);
            $table->char('nFono',9);
            $table->text('referencia');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            /*
            $table->Integer('cargo_id');
            $table->foreign('cargo_id')->references('cargo_id')->on('positions');
            */





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
