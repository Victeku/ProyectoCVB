<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->Increments('id_usuario');
            $table->string('activo');
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('genero');
            $table->string('telefono');
            $table->string('fn');
            $table->string('tipo_u');
            $table->string('archivo');
            $table->string('correo');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
          
            $table->string('direccion');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
