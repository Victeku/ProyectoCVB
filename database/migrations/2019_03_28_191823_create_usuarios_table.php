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
            $table->integer('telefono');
            $table->string('fn');
			      $table->integer('estado');
            //->unsigned();
		        //$table->foreign('id_estado')->references('id_estado')->on('estados');
		        $table->integer('municipio');
            //->unsigned();
		        //$table->foreign('id_municipio')->references('id_municipio')->on('municipios');
            $table->string('direccion');
            $table->string('tipo_u');
            $table->string('archivo');
            $table->string('correo');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
          /*  $table->integer('id_pago')->unsigned();
            $table->foreign('id_pago')->references('id_pago')->on('pagos');
      */  });
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
